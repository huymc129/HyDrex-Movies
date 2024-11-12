<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Genre;
use App\Models\Country;
use App\Models\Movie;
use App\Models\Episode;
use App\Models\Movie_Genre;
use App\Models\CustomerPackage;
use App\Models\Customers;
use App\Models\CustomerBuy;
use App\Models\CustomerBalance;
use App\Models\Napthe;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class IndexController extends Controller
{
    public function xem_nap_the(){
        $napthe = Napthe::with('customer')->orderBy('id','DESC')->get();
        return view('admincp.customer.napthe',compact('napthe'));
    }
    public function nap_the_cao(){
        if (isset($_POST['submit'])) {
            if (!isset($_POST['telco']) || !isset($_POST['amount']) || !isset($_POST['serial']) || !isset($_POST['code'])) {
                $err = 'Bạn cần nhập đầy đủ thông tin';
            } else {
        
                $request_id = rand(100000000, 999999999);  //Mã đơn hàng của bạn
                $command = 'charging';  // Nap the
                $url = 'https://thesieure.com/chargingws/v2';
                $partner_id = '44738308246';
                $partner_key = '01e59d89aa8a2aa34dc18ee5579daf99';
        
                $dataPost = array();
                $dataPost['request_id'] = $request_id;
                $dataPost['code'] = $_POST['code'];
                $dataPost['partner_id'] = $partner_id;
                $dataPost['serial'] = $_POST['serial'];
                $dataPost['telco'] = $_POST['telco'];
                $dataPost['command'] = $command;
                ksort($dataPost);
                $sign = $partner_key;
                foreach ($dataPost as $item) {
                    $sign .= $item;
                }
                
                $mysign = md5($sign);
        
                $dataPost['amount'] = $_POST['amount'];
                $dataPost['sign'] = $mysign;
        
                $data = http_build_query($dataPost);
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $url);
                curl_setopt($ch, CURLOPT_POST, 1);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
                $actual_link = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
                curl_setopt($ch, CURLOPT_REFERER, $actual_link);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                $result = curl_exec($ch);
                curl_close($ch);
        
                $obj = json_decode($result);
        
                if ($obj->status == 99) {
                    //Gửi thẻ thành công, đợi duyệt.
                    echo '<pre>';
                    print_r($obj);
                    echo '</pre>';
                    $napthe = new Napthe();
                    $napthe->request_id = $request_id;
                    $napthe->code = $_POST['code'];
                    $napthe->partner_id = $partner_id;
                    $napthe->serial = $_POST['serial'];
                    $napthe->telco = $_POST['telco'];
                    $napthe->command = $command;
                    $napthe->customer_id = Session::get('customer_id');
                    $napthe->amount =  $_POST['amount'];
                    $napthe->save();
                    session()->flash('message', 'Gửi thẻ thành công, đợi duyệt.');
                    return redirect()->route('nap-the');

                } elseif ($obj->status == 1) {
                    //Thành công
                    echo '<pre>';
                    print_r($obj);
                    echo '</pre>';
                    $napthe = new Napthe();
                    $napthe->request_id = $request_id;
                    $napthe->code = $_POST['code'];
                    $napthe->partner_id = $partner_id;
                    $napthe->serial = $_POST['serial'];
                    $napthe->telco = $_POST['telco'];
                    $napthe->command = $command;
                    $napthe->customer_id = Session::get('customer_id');
                    $napthe->amount =  $_POST['amount'];
                    $napthe->save();
                    session()->flash('message', 'Gửi thẻ thành công, đợi duyệt.');
                    return redirect()->route('nap-the');
                } elseif ($obj->status == 2) {
                    //Thành công nhưng sai mệnh giá
                    echo '<pre>';
                    print_r($obj);
                    echo '</pre>';
                    $napthe = new Napthe();
                    $napthe->request_id = $request_id;
                    $napthe->code = $_POST['code'];
                    $napthe->partner_id = $partner_id;
                    $napthe->serial = $_POST['serial'];
                    $napthe->telco = $_POST['telco'];
                    $napthe->command = $command;
                    $napthe->customer_id = Session::get('customer_id');
                    $napthe->amount =  $_POST['amount'];
                    $napthe->save();
                    session()->flash('message', 'Sai mệnh giá,vui lòng nạp lại');
                    return redirect()->route('nap-the');
                } elseif ($obj->status == 3) {
                    //Thẻ lỗi
                    echo '<pre>';
                    print_r($obj);
                    echo '</pre>';
                    $napthe = new Napthe();
                    $napthe->request_id = $request_id;
                    $napthe->code = $_POST['code'];
                    $napthe->partner_id = $partner_id;
                    $napthe->serial = $_POST['serial'];
                    $napthe->telco = $_POST['telco'];
                    $napthe->command = $command;
                    $napthe->customer_id = Session::get('customer_id');
                    $napthe->amount =  $_POST['amount'];
                    $napthe->save();
                    session()->flash('message', 'Thẻ đã nạp rồi,vui lòng nạp thẻ khác');
                    return redirect()->route('nap-the');
                } elseif ($obj->status == 4) {
                    //Bảo trì
                    echo '<pre>';
                    print_r($obj);
                    echo '</pre>';
                    
                } else {
                    //Lỗi
                    echo '<pre>';
                    print_r($obj);
                    echo '</pre>';
                }
        
        
            }
            session()->flash('message', 'Lỗi trong quá trình nạp thẻ.Vui lòng thử lại');
            return redirect()->route('nap-the');
        }
    }
    public function nap_the(){
         // phimhot - slider
         $phimhot = Movie::where('phim_hot',1)->where('status',1)->orderBy('ngaycapnhat','DESC')->get();
         // phim hot - sidebar
         $phimhot_sidebar = Movie::where('phim_hot',1)->where('status',1)->orderBy('ngaycapnhat','DESC')-> take('5')->get();
         // phim hot - trailer
         $phimhot_trailer = Movie::where('resolution',2)->where('status',1)->orderBy('ngaycapnhat','DESC')-> take('3')->get();
 
         $category = Category::orderBy('id','DESC')->where('status',1)->get();
         $genre = Genre::orderBy('id','DESC')->get();
         $country = Country::orderBy('id','DESC')->get();
         return view('pages.napthe', compact('category', 'genre', 'country', 'phimhot', 'phimhot_sidebar', 'phimhot_trailer'));
    }
    public function change_package($id){
        $customer = Session::get('customer_id');
        $customer_balance = CustomerPackage::find($id);

        if(Session::get('customer_balance')>$customer_balance->price){
            $check = CustomerBuy::where('customer_id',$customer)->first();
            $check->package_id = $id;
            $check->save();    
            Session::forget('customer_id');
            Session::forget('customer_name');
            Session::forget('customer_email');
            Session::forget('package_name');
            Session::forget('customer_balance');
            session()->flash('message', 'Thay gói thành công,đăng nhập lại để xem phim.');
            return redirect()->route('customer-login');
        }else{
            session()->flash('message', 'Số dư không đủ,vui lòng nạp thêm.');
            return redirect()->route('pricing-plan');
        }
        
       
    }

    public function buy_package(Request $request){
        $data = $request->all();
        if(Session::get('customer_balance')>$data['package_price']){
            $check_package  = CustomerBuy::where('customer_id',Session::get('customer_id'))->first();
        
            if($check_package){
                $customer->package_id = $data['package_id'];
                session()->flash('message', 'Bạn đã mua gói,vui lòng gia hạn hoặc gia hạn gói');
            }else{
                $customer = new CustomerBuy();
                $customer->customer_id = Session::get('customer_id');
                $customer->package_id = $data['package_id'];
                $customer->date_created = Carbon::now('Asia/Ho_Chi_Minh');
                $customer->date_expired = Carbon::now('Asia/Ho_Chi_Minh')->addDays(30);
                $customer->status = 1;
                $customer->save();
                session()->flash('message', 'Mua gói thành công. Mời bạn xem phim');
            }
        }else{
            session()->flash('message', 'Số dư không đủ,vui lòng nạp thêm.');
        }
        return redirect()->route('pricing-plan');

    }
    public function logout_customer(){
        Session::forget('customer_id');
        Session::forget('customer_name');
        Session::forget('customer_email');
        Session::forget('package_name');
        Session::forget('customer_balance');
        
        session()->flash('message', 'Đăng xuất thành công.');
        return redirect()->route('customer-login');
    }
    public function login_customer(Request $request){
        $data = $request->all();
        $customer = Customers::with('customer_buy','customer_balance')->where('email',$data['email'])->where('password',md5($data['password']))->where('status',1)->first();
        //dd($customer);
        if($customer){
            Session::put('customer_id',$customer->id);
            Session::put('customer_name',$customer->name);
            Session::put('customer_email',$customer->email);
            Session::put('customer_balance',$customer->customer_balance->balance);
            $check_package  = CustomerBuy::where('customer_id',Session::get('customer_id'))->first();
            if(!$check_package){
                $customer_buy = new CustomerBuy();
                $customer_buy->customer_id = $customer->id;
                $customer_buy->package_id = 0;
                $customer_buy->date_created = Carbon::now('Asia/Ho_Chi_Minh');
                $customer_buy->date_expired = Carbon::now('Asia/Ho_Chi_Minh')->addDays(30);
                $customer_buy->status = 1;
                $customer_buy->save();
                Session::put('package_id',$customer_buy->package_id);
                if($customer_buy->package_id==0){
                    Session::put('package_name','Chưa mua gói');
                }
            }else{
                Session::put('package_id',$check_package->package_id);
                
             $package = CustomerPackage::find($check_package->package_id);
                Session::put('package_name',$package->title);
                
               
            }
            session()->flash('message', 'Đăng nhập thành công.');
            return redirect()->route('pricing-plan');
        }else{
            session()->flash('message', 'Đăng nhập thất bại,tài khoản và mật khẩu bị sai hoặc bị khóa tài khoản.');
            return redirect()->back();
        }
    }
    public function insert_customer(Request $request){
        $data = $request->all();
        $password = md5($data['password']);
        $customer = new Customers();
        $customer->name = $data['name'];
        $customer->email = $data['email'];
        $customer->password = $password;
        $customer->date_created = Carbon::now('Asia/Ho_Chi_Minh');
        $customer->status = 1;
        $customer->save();
        $customer_balance = new CustomerBalance();
        $customer_balance->balance = 0;
        $customer_balance->date_created = Carbon::now('Asia/Ho_Chi_Minh');
        $customer_balance->customer_id = $customer->id;
        $customer_balance->save();
        session()->flash('message', 'Đăng ký thành công,làm ơn đăng nhập.');
        return redirect()->route('customer-login');

    }
    public function customer_login(){
        // phimhot - slider
        $phimhot = Movie::where('phim_hot',1)->where('status',1)->orderBy('ngaycapnhat','DESC')->get();
        // phim hot - sidebar
        $phimhot_sidebar = Movie::where('phim_hot',1)->where('status',1)->orderBy('ngaycapnhat','DESC')-> take('5')->get();
        // phim hot - trailer
        $phimhot_trailer = Movie::where('resolution',2)->where('status',1)->orderBy('ngaycapnhat','DESC')-> take('3')->get();

        $category = Category::orderBy('id','DESC')->where('status',1)->get();
        $genre = Genre::orderBy('id','DESC')->get();
        $country = Country::orderBy('id','DESC')->get();

       
        return view('pages.customer_login', compact('category', 'genre', 'country',  'phimhot', 'phimhot_sidebar', 'phimhot_trailer'));
    }
    public function customer_register(){
         // phimhot - slider
         $phimhot = Movie::where('phim_hot',1)->where('status',1)->orderBy('ngaycapnhat','DESC')->get();
         // phim hot - sidebar
         $phimhot_sidebar = Movie::where('phim_hot',1)->where('status',1)->orderBy('ngaycapnhat','DESC')-> take('5')->get();
         // phim hot - trailer
         $phimhot_trailer = Movie::where('resolution',2)->where('status',1)->orderBy('ngaycapnhat','DESC')-> take('3')->get();
 
         $category = Category::orderBy('id','DESC')->where('status',1)->get();
         $genre = Genre::orderBy('id','DESC')->get();
         $country = Country::orderBy('id','DESC')->get();
 
        
         return view('pages.customer_register', compact('category', 'genre', 'country',  'phimhot', 'phimhot_sidebar', 'phimhot_trailer'));
    }
    public function customer_info(){
         // phimhot - slider
         $phimhot = Movie::where('phim_hot',1)->where('status',1)->orderBy('ngaycapnhat','DESC')->get();
         // phim hot - sidebar
         $phimhot_sidebar = Movie::where('phim_hot',1)->where('status',1)->orderBy('ngaycapnhat','DESC')-> take('5')->get();
         // phim hot - trailer
         $phimhot_trailer = Movie::where('resolution',2)->where('status',1)->orderBy('ngaycapnhat','DESC')-> take('3')->get();
 
         $category = Category::orderBy('id','DESC')->where('status',1)->get();
         $genre = Genre::orderBy('id','DESC')->get();
         $country = Country::orderBy('id','DESC')->get();
 
        
         return view('pages.customer_info', compact('category', 'genre', 'country',  'phimhot', 'phimhot_sidebar', 'phimhot_trailer'));
    }
    public function pricing_plan(){
         // phimhot - slider
         $phimhot = Movie::where('phim_hot',1)->where('status',1)->orderBy('ngaycapnhat','DESC')->get();
         // phim hot - sidebar
         $phimhot_sidebar = Movie::where('phim_hot',1)->where('status',1)->orderBy('ngaycapnhat','DESC')-> take('5')->get();
         // phim hot - trailer
         $phimhot_trailer = Movie::where('resolution',2)->where('status',1)->orderBy('ngaycapnhat','DESC')-> take('3')->get();
 
         $category = Category::orderBy('id','DESC')->where('status',1)->get();
         $genre = Genre::orderBy('id','DESC')->get();
         $country = Country::orderBy('id','DESC')->get();
 
         $list = CustomerPackage::orderBy('id','DESC')->where('status',1)->get();
         return view('pages.pricing_plan', compact('category', 'genre', 'country', 'list', 'phimhot', 'phimhot_sidebar', 'phimhot_trailer'));
    }
    public function home(){
        // phimhot - slider
        $phimhot = Movie::where('phim_hot',1)->where('status',1)->orderBy('ngaycapnhat','DESC')->get();
        // phim hot - sidebar
        $phimhot_sidebar = Movie::where('phim_hot',1)->where('status',1)->orderBy('ngaycapnhat','DESC')-> take('5')->get();
        // phim hot - trailer
        $phimhot_trailer = Movie::where('resolution',2)->where('status',1)->orderBy('ngaycapnhat','DESC')-> take('3')->get();

        $category = Category::orderBy('id','DESC')->where('status',1)->get();
        $genre = Genre::orderBy('id','DESC')->get();
        $country = Country::orderBy('id','DESC')->get();

        $category_home = Category::with('movie')->orderBy('id','ASC')->where('status',1)->get();
        return view('pages.home', compact('category', 'genre', 'country', 'category_home', 'phimhot', 'phimhot_sidebar', 'phimhot_trailer'));
    }
    public function category($slug){

        $phimhot_sidebar = Movie::where('phim_hot',1)->where('status',1)->orderBy('ngaycapnhat','DESC')-> take('5')->get();
        $phimhot = Movie::where('phim_hot',1)->where('status',1)->orderBy('ngaycapnhat','DESC')->get();

        $category = Category::orderBy('id','DESC')->get();
        $genre = Genre::orderBy('id','DESC')->get();
        $country = Country::orderBy('id','DESC')->get();

        $cate_slug = Category::where('slug',$slug)->first(); 
        $movie = Movie::where('category_id',$cate_slug->id)->orderBy('ngaycapnhat','DESC')->paginate(40); 
        return view('pages.category', compact('category', 'genre', 'country', 'cate_slug', 'movie', 'phimhot_sidebar','phimhot'));
    }
    public function year($year){

        $phimhot_sidebar = Movie::where('phim_hot',1)->where('status',1)->orderBy('ngaycapnhat','DESC')-> take('5')->get();

        $category = Category::orderBy('id','DESC')->get();
        $genre = Genre::orderBy('id','DESC')->get();
        $country = Country::orderBy('id','DESC')->get();

        $year = $year; 
        $movie = Movie::where('year',$year)->orderBy('ngaycapnhat','DESC')->paginate(40); 
        return view('pages.year', compact('category', 'genre', 'country', 'year', 'movie', 'phimhot_sidebar'));
    }
    public function tag($tag){

        $phimhot_sidebar = Movie::where('phim_hot',1)->where('status',1)->orderBy('ngaycapnhat','DESC')-> take('5')->get();

        $category = Category::orderBy('id','DESC')->get();
        $genre = Genre::orderBy('id','DESC')->get();
        $country = Country::orderBy('id','DESC')->get();

        $tag = $tag; 
        $movie = Movie::where('tags','LIKE', '%'.$tag.'%' )->orderBy('ngaycapnhat','DESC')->paginate(40); 
        return view('pages.tag', compact('category', 'genre', 'country', 'tag', 'movie', 'phimhot_sidebar'));
    }
    public function genre($slug){

        $phimhot_sidebar = Movie::where('phim_hot',1)->where('status',1)->orderBy('ngaycapnhat','DESC')-> take('5')->get();

        $category = Category::orderBy('id','DESC')->get();
        $genre = Genre::orderBy('id','DESC')->get();
        $country = Country::orderBy('id','DESC')->get();

        $genre_slug = Genre::where('slug',$slug)->first(); 
        
        // nhiều thể loại
        $movie_genre = Movie_Genre::where('genre_id', $genre_slug->id)->get();
        $many_genre = [];
        foreach($movie_genre as $key => $movi){
            $many_genre[] = $movi->movie_id;
        }
        
        $movie = Movie::whereIn('id',$many_genre)->where('status', 1)->orderBy('ngaycapnhat','DESC')->paginate(40); 
        return view('pages.genre', compact('category', 'genre', 'country', 'genre_slug', 'movie', 'phimhot_sidebar'));
    }
    public function country($slug){

        $phimhot_sidebar = Movie::where('phim_hot',1)->where('status',1)->orderBy('ngaycapnhat','DESC')-> take('5')->get();

        $category = Category::orderBy('id','DESC')->get();
        $genre = Genre::orderBy('id','DESC')->get();
        $country = Country::orderBy('id','DESC')->get();

        $country_slug = Country::where('slug',$slug)->first(); 
        $movie = Movie::where('country_id',$country_slug->id)->orderBy('ngaycapnhat','DESC')->paginate(40); 
        return view('pages.country', compact('category', 'genre', 'country', 'country_slug', 'movie', 'phimhot_sidebar'));
    }
    public function movie($slug){

        $phimhot_sidebar = Movie::where('phim_hot',1)->where('status',1)->orderBy('ngaycapnhat','DESC')-> take('5')->get();

        $category = Category::orderBy('id','DESC')->get();
        $genre = Genre::orderBy('id','DESC')->get();
        $country = Country::orderBy('id','DESC')->get();
        $movie = Movie::with('category','genre','country')->where('slug',$slug)->where('status',1)->first(); 
        $episode_tapdau = Episode::with('movie')->where('movie_id',$movie->id)->orderBy('episode','ASC')->take(1)->first();
        $related = Movie::with('category','genre','country','movie_genre')->where('category_id', $movie->category->id)->orderby(DB::raw('RAND()'))->whereNotIn('slug',[$slug])->get();
        // Lấy ra ô tập gần nhất
        $episode = Episode::with('movie')->where('movie_id',$movie->id)->orderBy('episode','DESC')->take(4)->get();
        // lấy tổng tập phim đã thêm
        $episode_current_list = Episode::with('movie')->where('movie_id',$movie->id)->get();
        $episode_current_list_count = $episode_current_list->count();
        return view('pages.movie',compact('category', 'genre', 'country', 'movie', 'related', 'phimhot_sidebar', 'episode'
        , 'episode_tapdau', 'episode_current_list_count'));
    }
    public function watch($slug,$tap){
        
        

        $phimhot_sidebar = Movie::where('phim_hot',1)->where('status',1)->orderBy('ngaycapnhat','DESC')-> take('5')->get();

        $category = Category::orderBy('id','DESC')->get();
        $genre = Genre::orderBy('id','DESC')->get();
        $country = Country::orderBy('id','DESC')->get();
        $movie = Movie::with('category','genre','country','episode','customer_package')->where('slug',$slug)->where('status',1)->first(); 
        //lấy tập 1
        if(isset($tap)){
            $tapphim = $tap;
            $tapphim = substr($tap, 4,20);
            $episode = Episode::where('movie_id',$movie->id)->where('episode',$tapphim)->first();
        }else{
            $tapphim = 1;
            $episode = Episode::where('movie_id',$movie->id)->where('episode',$tapphim)->first();
        }
        
        return view('pages.watch', compact('category', 'genre', 'country', 'movie','phimhot_sidebar','episode','tapphim'));
    }
    public function episode(){
        return view('pages.episode');
    }


    // public function add_customer(Request $request){
    //     $data = array();
    //     $data['customer_name'] = $request->customer_name;
    //     $data['customer_phone'] = $request->customer_phone;
    //     $data['customer_email'] = $request->customer_email;
    //     $data['customer_password'] = $request->customer_password;

    //     $customer_id = DB::table('tbl_customers')->insertGetId($data);

    //     Session::put('customer_id', $customer_id);
    //     Session::put('customer_name', $request->customer_name);

    //     return Redirect('pages.layout');
    // }

}

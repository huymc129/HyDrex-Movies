<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;
use App\Models\Category;
use App\Models\Genre;
use App\Models\Country;
use App\Models\Episode;
use App\Models\Movie_Genre;
use App\Models\CustomerPackage;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list = Movie::with('category','movie_genre','country','customer_package')->orderBy('id','DESC')->get(); 
        // tìm kiếm bằng json
        $path = public_path()."/json/";
        // nếu mà cái path ko tồn tại ở trong public thì mkdir sẽ tạo cho mình file đó
        // 0777 là cấp toàn quyền thêm sửa xóa
        if(!is_dir($path)) {
            mkdir($path,0777,true);
        }
        File::put($path.'movies.json',json_encode($list));

        return view('admincp.movie.index',compact('list'));
    }

    public function update_year(Request $request)
    {
        $data = $request->all();
        $movie = Movie::find($data['id_phim']);
        $movie->year = $data['year'];
        $movie->save();
    }
    public function update_season(Request $request)
    {
        $data = $request->all();
        $movie = Movie::find($data['id_phim']);
        $movie->season = $data['season'];
        $movie->save();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::pluck('title','id');
        $genre = Genre::pluck('title','id');
        $list_genre = Genre::all();
        $country = Country::pluck('title','id');
        $package = CustomerPackage::pluck('title','id');
      
        return view('admincp.movie.form',compact('category','genre','country','list_genre','package'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        
        $movie = new Movie();
        $movie->title = $data['title'];
        $movie->trailer = $data['trailer'];
        $movie->sotap = $data['sotap'];
        $movie->tags = $data['tags'];
        $movie->thoiluong = $data['thoiluong'];
        $movie->resolution = $data['resolution'];
        $movie->sub = $data['sub'];
        $movie->package_id = $data['package_id'];

        $movie->name_eng = $data['name_eng'];
        $movie->phim_hot = $data['phim_hot'];
        $movie->slug = $data['slug'];
        $movie->description = $data['description'];
        $movie->status = $data['status'];
        $movie->category_id = $data['category_id'];
        $movie->thuocphim = $data['thuocphim'];
       
        $movie->country_id = $data['country_id'];

        $movie->ngaytao = Carbon::now('Asia/Ho_Chi_Minh');
        $movie->ngaycapnhat = Carbon::now('Asia/Ho_Chi_Minh');
        // thêm nhiều thể loại phim
        foreach($data['genre'] as $key => $gen){
            $movie->genre_id = $gen[0];
        }
        // $movie->genre_id = $data['genre_id'];
        //them hinh anh
        $get_image = $request->file('image');

        if($get_image){
            $get_name_image = $get_image->getClientOriginalName(); //hinhanh1.jpg
            $name_image = current(explode('.',$get_name_image)); //[0] => hinhanh12624 , [1] => jpg
            $new_image = $name_image.rand(0,9999).'.'.$get_image->getClientOriginalExtension(); // hinhanh12624.jpg
            $get_image->move('uploads/movie/', $new_image);
            $movie->image = $new_image;
        }
        $movie->save();
        // Thêm nhiều thể loại cho phim
        $movie->movie_genre()->attach($data['genre']);
        return redirect()->route('movie.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::pluck('title','id');
        $genre = Genre::pluck('title','id');
        $list_genre = Genre::all();
        $country = Country::pluck('title','id');
        
        $movie = Movie::find($id);
        $movie_genre = $movie->movie_genre;
        $package = CustomerPackage::pluck('title','id');
        return view('admincp.movie.form',compact('category','genre','country','movie','list_genre','movie_genre','package'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all(); 

        $movie = Movie::find($id);
        $movie->title = $data['title'];
        $movie->trailer = $data['trailer'];
        $movie->sotap = $data['sotap'];
        $movie->package_id = $data['package_id'];

        $movie->tags = $data['tags'];
        $movie->thoiluong = $data['thoiluong'];
        $movie->resolution = $data['resolution'];
        $movie->sub = $data['sub'];
        $movie->name_eng = $data['name_eng'];
        $movie->phim_hot = $data['phim_hot'];

        $movie->slug = $data['slug'];
        $movie->description = $data['description'];
        $movie->status = $data['status'];
        $movie->category_id = $data['category_id'];
        $movie->thuocphim = $data['thuocphim'];
        
        $movie->country_id = $data['country_id'];

        $movie->ngaycapnhat = Carbon::now('Asia/Ho_Chi_Minh');

        
        //them hinh anh
        $get_image = $request->file('image');

        if($get_image){
            if(file_exists('uploads/movie/'.$movie->image)){
                unlink('uploads/movie/'.$movie->image);
            }
            $get_name_image = $get_image->getClientOriginalName(); //hinhanh1.jpg
            $name_image = current(explode('.',$get_name_image)); //[0] => hinhanh12624 , [1] => jpg
            $new_image = $name_image.rand(0,9999).'.'.$get_image->getClientOriginalExtension(); // hinhanh12624.jpg
            $get_image->move('uploads/movie/', $new_image);
            $movie->image = $new_image;
            
            
        }
        // thêm phim nhiều thể loại

        foreach($data['genre'] as $key => $gen){
            $movie->genre_id = $gen[0];
        }

        $movie->save();
        $movie->movie_genre()->sync($data['genre']);
        return redirect()->route('movie.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $movie = Movie::find($id);

        // xoa anh
        if(file_exists('uploads/movie/'.$movie->image)){
            unlink('uploads/movie/'.$movie->image);
        }
        // xoa the loai 
        Movie_Genre::whereIn('movie_id',[$movie->id])->delete(); 
        
        // xóa tập phim
        Episode::whereIn('movie_id',[$movie->id])->delete(); 
        $movie->delete();  
        return redirect()->back();
        
    }
}

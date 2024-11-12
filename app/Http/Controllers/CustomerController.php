<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customers;
use Carbon\Carbon;
use App\Models\CustomerBalance;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit_customer($id){
        $customers = Customers::with('customer_balance')->find($id);
        return view('admincp.customer.edit',compact('customers'));
    }
    public function update_customer(Request $request,$id){
        $data = $request->all();
        $password = md5($data['password']);
        $customer = Customers::find($id);
        $customer->name = $data['name'];
        $customer->email = $data['email'];
        if($data['password_update']!=''){
            $customer->password = md5($data['password_update']);
        }
       
        $customer->status = $data['status'];
        $customer->save();
        $customer_balance = CustomerBalance::where('customer_id',$id)->first();
        $customer_balance->balance = $data['balance'];
        if($data['balance_new']!=''){
            $customer_balance->balance = $customer_balance->balance + $data['balance_new'];
        }
        $customer_balance->save();
        session()->flash('message', 'Cập nhật thành công,làm ơn đăng nhập.');
        return redirect()->route('customer.index');
    }
    public function index()
    {
        $customers = Customers::with('customer_balance')->orderBy('id','DESC')->get();
        return view('admincp.customer.form',compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

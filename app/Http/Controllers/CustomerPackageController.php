<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CustomerPackage;
use Carbon\Carbon;
class CustomerPackageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $list = CustomerPackage::orderBy('id','DESC')->get();
        return view('admincp.customer_package.form',compact('list'));
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
        $customer_package = new CustomerPackage();
        $customer_package->price = $data['price'];
        $customer_package->title = $data['title'];
        $customer_package->status = $data['status'];
        $customer_package->description = $data['description'];
        $customer_package->date_package = Carbon::now('Asia/Ho_Chi_Minh');
        $customer_package->save();
        return redirect()->back();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $list = CustomerPackage::orderBy('id','DESC')->get();
        $package = CustomerPackage::find($id);
        return view('admincp.customer_package.form',compact('package','list'));
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
        $customer_package = CustomerPackage::find($id);
        $customer_package->price = $data['price'];
        $customer_package->title = $data['title'];
        $customer_package->status = $data['status'];
        $customer_package->description = $data['description'];
        $customer_package->date_package = Carbon::now('Asia/Ho_Chi_Minh');
        $customer_package->save();
        return redirect()->back();
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

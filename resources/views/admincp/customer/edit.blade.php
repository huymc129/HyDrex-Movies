@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Quản lý khách hàng</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <form method="POST" action="{{route('update-customer',[$customers->id])}}">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Name</label>
                                <input type="text" name="name" value="{{$customers->name}}" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter...">
                               
                              </div>
                            <div class="form-group">
                              <label for="exampleInputEmail1">Email address</label>
                              <input type="email" name="email" value="{{$customers->email}}" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter...">
                              
                            </div>
                            <div class="form-group">
                              <label for="exampleInputPassword1">Password</label>
                              <input type="text" name="password" readonly value="{{$customers->password}}" required class="form-control" id="exampleInputPassword1" placeholder="Password">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Password mới</label>
                                <input type="text" name="password_update" class="form-control" id="exampleInputPassword1" placeholder="Password New">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Nhập Số cũ</label>
                                <input type="text" name="balance" readonly value="{{$customers->customer_balance->balance}}" class="form-control" id="exampleInputPassword1" placeholder="Nhập số dư">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Nhập Số dư mới</label>
                                <input type="text" name="balance_new" class="form-control" id="exampleInputPassword1" placeholder="Nhập số dư">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Kích hoạt</label>
                                <select class="form-control" name="status">
                                    @if($customers->status==0)
                                    <option selected value="0">Không kích hoạt</option>
                                    <option value="1">Kích hoạt</option>
                                    @else
                                    <option value="0">Không kích hoạt</option>
                                    <option selected value="1">Kích hoạt</option>
                                    @endif
                                </select>
                               
                            </div>
                           
                            <button type="submit" class="btn btn-primary">Update</button>
                          </form>

                            
                    </div>
                </div>
              
            </div>
        </div>
    </div>
@endsection

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
               
                <table class="table" id="tablephim">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Tên khách hàng</th>
                            <th scope="col">Số dư</th>
                            <th scope="col">Email</th>
                            <th scope="col">Password</th>
                            <th scope="col">Ngày tạo</th>
                            <th scope="col">Status</th>
                            <th scope="col">Nạp thẻ</th>
                            <th scope="col">Quản lý</th>
                        </tr>
                    </thead>
                    <tbody class="order_position">
                        @foreach ($customers as $key => $cust)
                            <tr id="{{$cust->id}}">
                                <th scope="row">{{ $key }}</th>
                                <td>{{ $cust->name }}</td>
                                <td>{{number_format($cust->customer_balance->balance,0,',','.')}}đ</td>
                                <td>{{ $cust->email }}</td>
                                <td>{{ $cust->password }}</td>
                                <td>{{ $cust->date_created }}</td>
                                <td>
                                    @if ($cust->status)
                                        Kích hoạt
                                    @else
                                        Không kích hoạt
                                    @endif
                                </td>
                                <td><a href="{{route('xem-nap-the')}}" class="btn btn-primary">Xem đã nạp</a></td>
                                <td>
                                   <a href="{{route('edit-customer',[$cust->id])}}" class="btn btn-warning">Edit</a>
                                </td>
                            </tr>
                        @endforeach 
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

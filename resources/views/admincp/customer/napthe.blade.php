@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
               
                <table class="table" id="tablephim">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Request ID</th>
                            <th scope="col">Code</th>
                            <th scope="col">Partner_id</th>
                            <th scope="col">Serial</th>
                            <th scope="col">Telco</th>
                            <th scope="col">Command</th>
                            <th scope="col">Customer</th>
                            <th scope="col">Giá trị</th>
                        </tr>
                    </thead>
                    <tbody class="order_position">
                        @foreach ($napthe as $key => $nap)
                            <tr id="{{$nap->id}}">
                                <th scope="row">{{ $key }}</th>
                                <td>{{ $nap->request_id }}</td>
                                <td>{{ $nap->code }}đ</td>
                                <td>{{ $nap->partner_id }}</td>
                                <td>{{ $nap->serial }}</td>
                                <td>{{ $nap->telco }}</td>
                                <td>{{ $nap->command }}</td>
                                <td>{{ $nap->customer->email }}</td>
                                <td>{{ number_format($nap->amount,0,',','.') }}đ</td>
                            </tr>
                        @endforeach 
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

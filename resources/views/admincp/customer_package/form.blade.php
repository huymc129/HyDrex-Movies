@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Quản lý gói người mua</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        @if(!isset($package))
                            {!! Form::open(['route' => 'customer_package.store', 'method' => 'POST']) !!}
                        @else
                            {!! Form::open(['route' => ['customer_package.update', $package->id], 'method' => 'PUT']) !!}
                        @endif

                        {!! Form::open(['route' => 'customer_package.store', 'method' => 'POST']) !!}
                        <div class="form-group">
                            {!! Form::label('title', 'Title', []) !!}
                            {!! Form::text('title', isset($package) ? $package->title : '', [
                                'class' => 'form-control',
                                'placeholder' => 'Nhập vào dữ liệu...',
                                'required'
                            ]) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('price', 'Price', []) !!}
                            {!! Form::text('price', isset($package) ? $package->price : '', [
                                'class' => 'form-control',
                                'placeholder' => 'Nhập vào dữ liệu...',
                                'required'
                            ]) !!}
                        </div>
                       
                        <div class="form-group">
                            {!! Form::label('description', 'Description', []) !!}
                            {!! Form::textarea('description', isset($package) ? $package->description : '', [
                                'style' => 'resize:none',
                                'class' => 'form-control',
                                'placeholder' => 'Nhập vào dữ liệu...',
                                'id' => 'description',
                                'required'
                            ]) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('active', 'Active', []) !!}
                            {!! Form::select('status', ['1' => 'Hiển thị', '0' => 'Không'], isset($package) ? $package->status : '', ['class' => 'form-control']) !!}
                        </div>

                        @if(!isset($package))
                            {!! Form::submit('Thêm dữ liệu', ['class' => 'btn btn-success']) !!}
                        @else
                            {!! Form::submit('Cập nhật', ['class' => 'btn btn-success']) !!}
                        @endif



                        {!! Form::close() !!}
                    </div>
                </div>
                <table class="table" id="tablephim">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Title</th>
                            <th scope="col">Description</th>
                            <th scope="col">Price</th>
                            <th scope="col">Active</th>
                            <th scope="col">Date</th>
                            <th scope="col">Manage</th>
                        </tr>
                    </thead>
                    <tbody class="order_position">
                        @foreach ($list as $key => $package)
                            <tr id="{{$package->id}}">
                                <th scope="row">{{ $key }}</th>
                                <td>{{ $package->title }}</td>
                                <td>{{ $package->description }}</td>
                                <td>{{ number_format($package->price,0,',','.') }}đ</td>
                                <td>
                                    @if ($package->status)
                                        Hiển thị
                                    @else
                                        Không hiển thị
                                    @endif
                                </td>
                                <td>{{ $package->date_package }}</td>
                                <td>
                                    {!! Form::open([
                                        'method' => 'DELETE',
                                        'route' => ['customer_package.destroy', $package->id],
                                        'onsubmit' => 'return confirm("Bạn có muốn xóa ?")',
                                    ]) !!}
                                    {!! Form::submit('Xóa', ['class' => 'btn btn-danger']) !!}
                                    {!! Form::close() !!}
                                    <a href="{{ route('customer_package.edit', $package->id) }}" class="btn btn-warning">Sửa</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table> 
            </div>
        </div>
    </div>
@endsection

@extends('layout')
@section('content')
<div id="tvshows-slider">
    <div>
        <a href="movie-details.html">
            <div class="shows-img">
                <img src="{{ asset('images/movie-banner/1.jpg') }}" class="w-100" alt="">
                <div class="shows-content">
                    <h4 class="text-white mb-1">Open Dead Shot</h4>
                    <div class="movie-time d-flex align-items-center">
                        <div class="badge badge-secondary p-1 mr-2">13+</div>
                        <span class="text-white">2h 20m</span>
                    </div>
                </div>
            </div>
        </a>
    </div>
    <div>
        <a href="movie-details.html">
            <div class="shows-img">
                <img src="{{ asset('images/movie-banner/2.jpg') }}" class="w-100" alt="">
                <div class="shows-content">
                    <h4 class="text-white mb-1">Jumbo Queen</h4>
                    <div class="movie-time d-flex align-items-center">
                        <div class="badge badge-secondary p-1 mr-2">9+</div>
                        <span class="text-white">2h 40m</span>
                    </div>
                </div>
            </div>
        </a>
    </div>
    <div>
        <a href="movie-details.html">
            <div class="shows-img">
                <img src="{{ asset('images/movie-banner/3.jpg') }}" class="w-100" alt="">
                <div class="shows-content">
                    <h4 class="text-white mb-1">The Lost Journey</h4>
                    <div class="movie-time d-flex align-items-center">
                        <div class="badge badge-secondary p-1 mr-2">20+</div>
                        <span class="text-white">2h 15m</span>
                    </div>
                </div>
            </div>
        </a>
    </div>
</div>
    <!-- MainContent -->
    <div class="main-content">
        <div class="container">
        <div>
            @if (session()->has('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif
        </div>
        <table class="table" id="tablephim">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Description</th>
                    <th scope="col">Price</th>
                    <th scope="col">Active</th>
                   
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
                       
                        <td>
                            @if(!Session::get('customer_email'))
                            
                            <a href="{{ route('customer-login') }}" class="btn btn-success">Mua gói</a>
                            @else
                            <form method="POST" action="{{route('buy-package')}}">
                                @csrf
                                <input type="hidden" value="{{$package->id}}" name="package_id">
                                <input type="hidden" value="{{$package->price}}" name="package_price">
                                @if(Session::get('package_id') != $package->id)
                                <a href="{{route('change-package',[$package->id])}}" class="btn btn-primary">Thay gói này</a>
                                @else
                                <span class="text text-success">Gói đang dùng</span>
                                @endif
                            </form>
                            
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table> 
        </div>
        
        
    </div>
@endsection

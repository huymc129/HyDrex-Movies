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
        <form method="POST" action="{{route('insert-customer')}}">
            @csrf
            <div class="form-group">
                <label for="exampleInputEmail1">Name</label>
                <input type="text" name="name" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter...">
               
              </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Email address</label>
              <input type="email" name="email" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter...">
              
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Password</label>
              <input type="password" name="password" required class="form-control" id="exampleInputPassword1" placeholder="Password">
            </div>
           
            <button type="submit" class="btn btn-primary">Register</button>
          </form>
        
        </div> 
    </div>
@endsection

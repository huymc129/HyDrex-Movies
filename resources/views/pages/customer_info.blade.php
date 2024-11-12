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
       
        
        
    </div>
@endsection

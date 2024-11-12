@extends('layout')
@section('content')
    <section id="home" class="iq-main-slider p-0">
        <div id="home-slider" class="slider m-0 p-0">

            @foreach ($phimhot_trailer as $key => $hot)
            <div class="slide slick-bg s-bg-1" style="background-image: url('{{ asset('uploads/movie/' . $hot->image) }}');">
                <div class="container-fluid position-relative h-100">
                    <div class="slider-inner h-100">
                        <div class="row align-items-center  h-100">
                            <div class="col-xl-6 col-lg-12 col-md-12">
                                <h1 class="slider-text big-title title text-uppercase" data-animation-in="fadeInLeft"
                                    data-delay-in="0.6"><a href="{{ route('movie', $hot->slug) }}">{{ $hot->title }}</a></h1>
                                <div class="trending-list" data-wp_object-in="fadeInUp" data-delay-in="1.2">
                                    <div class="text-primary title ">
                                        Thể Loại: <span class="text-body"><a href="{{ route('genre', [$hot->genre->slug]) }}">{{ $hot->genre->title }}</a></span>
                                    </div>
                                    <div class="text-primary title ">
                                        Quốc Gia: <span class="text-body"><a href="{{ route('country', [$hot->country->slug]) }}">{{ $hot->country->title }}</a></span>
                                    </div>
                                    <div class="text-primary title season">
                                        @if ($hot->season != 0)
                                            Season: <span class="text-body">{{ $hot->season }}</span>
                                        @endif
                                    </div>
                                    <div class="text-primary title Resolution">
                                        Resolution: <span class="text-body">
                                            @if ($hot->resolution == 0)
                                                HD
                                            @elseif ($hot->resolution == 1)
                                                FullHD
                                            @else
                                                Trailer
                                            @endif
                                        </span>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center r-mb-23" data-animation-in="fadeInUp" data-delay-in="1.2">
                                    @if(Session::get('customer_id'))
                                        <a href="{{ url('xem-phim', $hot->slug) }}" class="btn btn-hover iq-button"><i
                                                class="fa fa-play mr-2" aria-hidden="true"></i>Xem Ngay</a>
                                        <a href="{{ route('movie', $hot->slug) }}" class="btn btn-link">CHI TIẾT</a>
                                    @else
                                        <a href="{{route('customer-login')}}" class="btn btn-hover iq-button"><i
                                            class="fa fa-play mr-2" aria-hidden="true"></i>Xem phim</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        
        </div>
        <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
            <symbol xmlns="http://www.w3.org/2000/svg" viewBox="0 0 44 44" width="44px" height="44px" id="circle"
                fill="none" stroke="currentColor">
                <circle r="20" cy="22" cx="22" id="test"></circle>
            </symbol>
        </svg>

    </section>
    <div class="main-content">

        @foreach ($category_home as $key => $cate_home)
            <section id="iq-favorites">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-12 overflow-hidden">
                            <div class="iq-main-header d-flex align-items-center justify-content-between">
                                <h4 class="main-title">{{ $cate_home->title }}</h4>
                                <a class="iq-view-all" href="{{ route('category', $cate_home->slug) }}">Xem thêm</a>
                            </div>
                            <div class="favorites-contens">
                                <ul class="favorites-slider list-inline  row p-0 mb-0">
                                    {{-- item --}}
                                    @foreach ($cate_home->movie->take(5) as $key => $mov)
                                    
                                        <li class="slide-item">

                                            <div class="block-images position-relative">
                                                <div class="img-box">
                                                    <img src="{{ asset('uploads/movie/' . $mov->image) }}"
                                                        class="img-fluid" alt="">
                                                </div>
                                                <div class="block-description">
                                                    <h6 class="iq-title"><a
                                                            href="{{ $mov->title }}">{{ $mov->title }}</a></h6>
                                                    <div class="movie-time d-flex align-items-center my-2">
                                                        <div class="badge badge-secondary p-1 mr-2">
                                                            @if ($mov->resolution == 0)
                                                                HD
                                                            @elseif ($mov->resolution == 1)
                                                                FullHD
                                                            @else
                                                                Trailer
                                                            @endif
                                                        </div>
                                                        {{-- sub --}}
                                                        <div class="badge badge-secondary p-1 mr-2">
                                                            @if ($mov->sub == 0)
                                                                Phụ Đề
                                                            @else
                                                                Thuyết Minh
                                                            @endif
                                                        </div>

                                                        <div class="badge badge-secondary p-1 mr-2">
                                                            @if ($mov->season != 0)
                                                                Season {{ $mov->season }}
                                                            @endif
                                                        </div>
                                                        <span class="text-white">{{ $mov->thoiluong }}</span>
                                                    </div>
                                                    <div class="hover-buttons">
                                                        @if(Session::get('customer_id'))
                                                        <a href="{{ route('movie',$mov->slug )}}">
                                                            <span class="btn btn-hover iq-button">
                                                                <i class="fa fa-play mr-1" aria-hidden="true"></i>
                                                                Xem phim
                                                            </span>
                                                        </a>
                                                        @else
                                                        <a href="{{ route('customer-login')}}">
                                                            <span class="btn btn-hover iq-button">
                                                                <i class="fa fa-play mr-1" aria-hidden="true"></i>
                                                                Xem phim
                                                            </span>
                                                        </a>
                
                
                                                        @endif
                                                       
                                                    </div>
                                                </div>


                                            </div>
                                            </a>
                                        </li>
                                    @endforeach
                                    {{-- end item --}}
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        @endforeach

        {{-- sidebar phim hot --}}
        {{-- @include('pages.include.sidebar') --}}
        {{-- end: sidebar phim hot --}}
    </div>
    <section class="iq-main-slider p-0">
        <div id="tvshows-slider">
            @foreach ($phimhot as $key => $hot) 
            <div>
                <a href="{{ route('movie', ['slug' => $hot->slug]) }}">
                    <div class="shows-img">
                        <img src="{{ asset('uploads/movie/' . $hot->image) }}" class="w-100" alt="{{ $hot->title }}">
                        <div class="shows-content">
                            <h4 class="text-white mb-1">{{ $hot->title }}</h4>
                            <div class="movie-time d-flex align-items-center">
                                <div class="badge badge-secondary p-1 mr-2">
                                    @if ($hot->resolution == 0)
                                        HD
                                    @elseif ($hot->resolution == 1)
                                        FullHD
                                    @else
                                        Trailer
                                    @endif
                                </div>
                                <span class="text-white">{{ $hot->thoiluong }} min</span>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </section>
@endsection

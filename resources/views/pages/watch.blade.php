@extends('layout')
@section('content')

{{-- <div class="video-container iq-main-slider">
    <video class="video d-block" controls loop>
        <source src="video/sample-video.mp4" type="video/mp4">
          
    </video>
    
</div> --}}

<!-- Banner End -->
<!-- MainContent -->
<div class="main-content">
    <div class="main-content">
        <section class="movie-detail container-fluid">
            {{-- @foreach($movie->episode as $ep) --}}
            <style type="text/css">
                .iframe_phim iframe {
                    width: 100%;
                    height: 750px;
                }
            </style>
            @if(Session::get('customer_id'))
                @if($movie->package_id == Session::get('package_id'))
                <div class="iframe_phim">
                    {!! $episode->linkphim !!}
                </div>
                @else
                <h5>Gói bạn chọn không phù hợp, hoặc bạn có thể mua gói phim để xem phim nhé, <a href="{{route('pricing-plan')}}">Mua gói phim</a></h5>
                @endif
            @endif
                
            {{-- @endforeach --}}
        </section>
        <section class="movie-detail container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="trending-info season-info g-border">
                        
                        <h1  style="font-size: 50px; padding: 10px">{{ $movie->title }}</h1>
                        <h6 style="padding: 10px">NỘI DUNG PHIM:</h6>
                        <p style="padding: 10px"> {{ $movie->description }}</p>
                        
                        {{-- <ul class="list-inline p-0 mt-4 share-icons music-play-lists">
                            <li><span><i class="ri-add-line"></i></span></li>
                            <li><span><i class="ri-heart-fill"></i></span></li>
                            <li class="share">
                                <span><i class="ri-share-fill"></i></span>
                                <div class="share-box">
                                    <div class="d-flex align-items-center">
                                        <a href="#" class="share-ico"><i class="ri-facebook-fill"></i></a>
                                        <a href="#" class="share-ico"><i class="ri-twitter-fill"></i></a>
                                        <a href="#" class="share-ico"><i class="ri-links-fill"></i></a>
                                    </div>
                                </div>
                            </li>
                        </ul> --}}
                    </div>
                </div>
            </div>
        </section>
        <section id="iq-favorites">
            <div class="container-fluid">
                <div class="block-space">
                    <div class="row">
                        <div class="col-sm-12 overflow-hidden">
                            <div class="iq-main-header d-flex align-items-center justify-content-between">
                                <h4 class="main-title">Latest Episodes</h4>
                                <a href="show-single.html" class="text-primary">View all</a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        {{-- star: tập phim --}}
                        @foreach($movie->episode as $sotap)
                        <div class="col-1-5 col-md-6 iq-mb-30">
                            {{-- {{$key==0 ? 'active' : ''}} --}}
                            <div class="epi-box">
                                <div class="epi-img position-relative">
                                    <img src="{{ asset('uploads/movie/' . $movie->image) }}" class="img-fluid img-zoom" alt="">
                                    <div class="episode-play-info">
                                        <div class="episode-play">
                                            <a href="{{url('xem-phim/'.$movie->slug.'/tap-'.$sotap->episode)}}">
                                                <i class="fa fa-play mr-1"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="epi-desc p-3">
                                    <a href="show-details.html">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <h6 class="text-white">{{ $movie->title }}</h6>
                                        <span class="text-primary">{{ $movie->thoiluong }}</span>
                                    </div>
                                    
                                        <h6 class="epi-name text-white mb-0"> Tập {{$sotap->episode}}
                                        </h6>
                                    </a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        {{-- end: tập phim --}}

                        {{-- <div class="col-1-5 col-md-6 iq-mb-30">
                            <div class="epi-box">
                                <div class="epi-img position-relative">
                                    <img src="images/episodes/02.jpg" class="img-fluid img-zoom" alt="">

                                    <div class="episode-play-info">
                                        <div class="episode-play">
                                            <a href="show-details.html">
                                                <i class="ri-play-fill"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="epi-desc p-3">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <span class="text-white">11 Aug 20</span>
                                        <span class="text-primary">30m</span>
                                    </div>
                                    <a href="show-details.html">
                                        <h6 class="epi-name text-white mb-0">Lorem Ipsum is simply dummy text
                                        </h6>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-1-5 col-md-6 iq-mb-30">
                            <div class="epi-box">
                                <div class="epi-img position-relative">
                                    <img src="images/episodes/03.jpg" class="img-fluid img-zoom" alt="">

                                    <div class="episode-play-info">
                                        <div class="episode-play">
                                            <a href="show-details.html">
                                                <i class="ri-play-fill"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="epi-desc p-3">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <span class="text-white">11 Aug 20</span>
                                        <span class="text-primary">30m</span>
                                    </div>
                                    <a href="show-details.html">
                                        <h6 class="epi-name text-white mb-0">Lorem Ipsum is simply dummy text
                                        </h6>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-1-5 col-md-6 iq-mb-30">
                            <div class="epi-box">
                                <div class="epi-img position-relative">
                                    <img src="images/episodes/04.jpg" class="img-fluid img-zoom" alt="">

                                    <div class="episode-play-info">
                                        <div class="episode-play">
                                            <a href="show-details.html">
                                                <i class="ri-play-fill"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="epi-desc p-3">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <span class="text-white">11 Aug 20</span>
                                        <span class="text-primary">30m</span>
                                    </div>
                                    <a href="show-details.html">
                                        <h6 class="epi-name text-white mb-0">Lorem Ipsum is simply dummy text
                                        </h6>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-1-5 col-md-6 iq-mb-30">
                            <div class="epi-box">
                                <div class="epi-img position-relative">
                                    <img src="images/episodes/05.jpg" class="img-fluid img-zoom" alt="">

                                    <div class="episode-play-info">
                                        <div class="episode-play">
                                            <a href="show-details.html">
                                                <i class="ri-play-fill"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="epi-desc p-3">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <span class="text-white">11 Aug 20</span>
                                        <span class="text-primary">30m</span>
                                    </div>
                                    <a href="show-details.html">
                                        <h6 class="epi-name text-white mb-0">Lorem Ipsum is simply dummy text
                                        </h6>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-1-5 col-md-6 iq-mb-30">
                            <div class="epi-box">
                                <div class="epi-img position-relative">
                                    <img src="images/episodes/06.jpg" class="img-fluid img-zoom" alt="">

                                    <div class="episode-play-info">
                                        <div class="episode-play">
                                            <a href="show-details.html">
                                                <i class="ri-play-fill"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="epi-desc p-3">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <span class="text-white">11 Aug 20</span>
                                        <span class="text-primary">30m</span>
                                    </div>
                                    <a href="show-details.html">
                                        <h6 class="epi-name text-white mb-0">Lorem Ipsum is simply dummy text
                                        </h6>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-1-5 col-md-6 iq-mb-30">
                            <div class="epi-box">
                                <div class="epi-img position-relative">
                                    <img src="images/episodes/07.jpg" class="img-fluid img-zoom" alt="">

                                    <div class="episode-play-info">
                                        <div class="episode-play">
                                            <a href="show-details.html">
                                                <i class="ri-play-fill"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="epi-desc p-3">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <span class="text-white">11 Aug 20</span>
                                        <span class="text-primary">30m</span>
                                    </div>
                                    <a href="show-details.html">
                                        <h6 class="epi-name text-white mb-0">Lorem Ipsum is simply dummy text
                                        </h6>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-1-5 col-md-6 iq-mb-30">
                            <div class="epi-box">
                                <div class="epi-img position-relative">
                                    <img src="images/episodes/08.jpg" class="img-fluid img-zoom" alt="">

                                    <div class="episode-play-info">
                                        <div class="episode-play">
                                            <a href="show-details.html">
                                                <i class="ri-play-fill"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="epi-desc p-3">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <span class="text-white">11 Aug 20</span>
                                        <span class="text-primary">30m</span>
                                    </div>
                                    <a href="show-details.html">
                                        <h6 class="epi-name text-white mb-0">Lorem Ipsum is simply dummy text
                                        </h6>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-1-5 col-md-6 iq-mb-30">
                            <div class="epi-box">
                                <div class="epi-img position-relative">
                                    <img src="images/episodes/09.jpg" class="img-fluid img-zoom" alt="">

                                    <div class="episode-play-info">
                                        <div class="episode-play">
                                            <a href="show-details.html">
                                                <i class="ri-play-fill"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="epi-desc p-3">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <span class="text-white">11 Aug 20</span>
                                        <span class="text-primary">30m</span>
                                    </div>
                                    <a href="show-details.html">
                                        <h6 class="epi-name text-white mb-0">Lorem Ipsum is simply dummy text
                                        </h6>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-1-5 col-md-6 iq-mb-30">
                            <div class="epi-box">
                                <div class="epi-img position-relative">
                                    <img src="images/episodes/10.jpg" class="img-fluid img-zoom" alt="">

                                    <div class="episode-play-info">
                                        <div class="episode-play">
                                            <a href="show-details.html">
                                                <i class="ri-play-fill"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="epi-desc p-3">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <span class="text-white">11 Aug 20</span>
                                        <span class="text-primary">30m</span>
                                    </div>
                                    <a href="show-details.html">
                                        <h6 class="epi-name text-white mb-0">Lorem Ipsum is simply dummy text
                                        </h6>
                                    </a>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>


@endsection

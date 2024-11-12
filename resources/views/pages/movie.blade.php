@extends('layout')
@section('content')

    <section class=" overlay-wrapper iq-main-slider">
        <div>
            <img src="{{ asset('uploads/movie/' . $movie->image) }}"
                style="padding: 60px 0; z-index: 1; width: 100%; height: 750px;background-position: top left;">
        </div>
        <div class="banner-caption">
            @if($movie->resolution != 2)
            <div class="position-relative mb-4">
                <a href="{{ route('category', [$movie->category->slug]) }}" class="d-flex align-items-center">
                    <div class="play-button">
                        <a href="{{url('xem-phim/'.$movie->slug.'/tap-'.$episode_tapdau->episode)}}">
                            <i class="fa fa-play"></i>
                        </a>
                        
                    </div>
                    <h4 class="w-name text-white font-weight-700">{{ $movie->title }}</h4>
                </a>
            </div>
            @endif 
            {{-- <ul class="list-inline p-0 m-0 share-icons music-play-lists">
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

    </section>
    <!-- Banner End -->
    <!-- MainContent -->
    <div class="main-content">
        <section class="movie-detail container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="trending-info g-border">
                        <h1 class="trending-text list-inline big-title text-uppercase mt-0">{{ $movie->title }}</h1>

                        <h5 class="trending-text big-title mt-0">{{$movie->name_eng}}</h5>



                        <div class="text-primary title" style="padding: 5px">
                            Thể Loại: <span class="text-body">
                                
                                @foreach($movie->movie_genre as $gen)
                                    <a href="{{ route('genre', $gen->slug) }}">{{ $gen->title }}  </a>
                                @endforeach
                            </span>
                        </div>
                        <div class="text-primary title" style="padding: 5px">
                            Danh Mục: <span class="text-body"><a
                                    href="{{ route('category', [$movie->category->slug]) }}">{{ $movie->category->title }}</a></span>
                        </div>
                        <div class="text-primary title" style="padding: 5px">
                            Quốc Gia: <span class="text-body"><a
                                    href="{{ route('country', [$movie->country->slug]) }}">{{ $movie->country->title }}</a></span>
                        </div>
                        <div class="text-primary title thoiluong " style="padding: 5px">
                            Thời lượng: <span class="text-body">{{ $movie->thoiluong }}</span>
                        </div>
                        <div class="text-primary title tapphim " style="padding: 5px">
                            Tập phim: <span class="text-body">{{ $episode_current_list_count }}/{{ $movie->sotap }}</span>
                        </div>
                        <div class="text-primary title Resolution" style="padding: 5px">
                            Resolution: <span class="text-body">
                                @if ($movie->resolution == 0)
                                    HD
                                @elseif ($movie->resolution == 1)
                                    FullHD
                                @else
                                    Trailer
                                @endif
                            </span>
                        </div>
                        <div class="text-primary title Season" style="padding-left: 5px">
                            @if ($movie->season != 0)
                                Season:
                                <span class="text-body">
                                    {{ $movie->season }}
                                </span>
                            @endif
                        </div>
                        <div class="text-primary title Tags" style="padding: 5px">
                            Tags: <span class="text-body">
                                @if ($movie->tags != null)
                                    @php
                                        $tags = [];
                                        $tags = explode(',', $movie->tags);
                                    @endphp
                                    @foreach ($tags as $key => $tag)
                                        <a href="{{ url('tag/' . $tag) }}">{{ $tag }}</a>
                                    @endforeach
                                @else
                                    {{ $movie->title }}
                                @endif
                            </span>
                        </div>
                        @if($movie->thuocphim=='phimbo')
                        <div class="text-primary title tapphim " style="padding: 5px">
                            Tập phim mới cập nhật: 
                                        <ul class="list-inline p-0 m-0 share-icons music-play-lists" style="padding: 10px">
                                            @if($episode)
                                            @foreach($episode as $key =>$ep)
                                                <a href="{{url('xem-phim/'.$ep->movie->slug.'/tap-'.$ep->episode)}}">
                                                    <li><span class="text-primary title" style="font-size: 25px; " style="font-style: italic">{{$ep->episode}}</span></li>
                                                </a>
                                            @endforeach
                                          

                                            @endif
                           
                            
                        </ul>
                    </div>
                        @endif
                        
                        {{-- <div class="d-flex align-items-center text-white text-detail">
                   <span class="badge badge-secondary p-3">18+</span>
                   <span >{{$movie->category->title}}</span>
                   <span class="trending-year">2020</span>
                </div>
                        <div class="d-flex align-items-center series mb-4">
                            <a href="javascript:void();"><img src="images/trending/trending-label.png" class="img-fluid"
                                    alt=""></a>
                            <span class="text-gold ml-3">#2 in Series Today</span>
                        </div> --}}
           
                    
                        <h6 style="padding: 10px">NỘI DUNG PHIM:</h6>
                        <p style="padding: 10px"> {{ $movie->description }}</p>
                        {{-- trailer phim --}}
                        <div class="text-primary title" style="padding: 5px">
                            Trailer: <span class="text-body">
                                <iframe width="100%" height="600"
                                    src="https://www.youtube.com/embed/{{ $movie->trailer }}" title="YouTube video player"
                                    frameborder="0"
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                    allowfullscreen>
                                </iframe>
                            </span>
                        </div>
                        {{-- Bình luận phim --}}
                        <div class="text-primary title" style="padding: 5px">
                            Bình luận: <span class="text-body">
                                @php
                                    $current_url = Request::url();
                                @endphp
                                <div class="fb-comments" data-href="{{$current_url}}" data-width="100%" data-numposts="5"></div>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="container-fluid seasons">
            {{-- <div class="iq-custom-select d-inline-block sea-epi s-margin">
                <select name="cars" class="form-control season-select">
                    <option value="season1">Season 1</option>
                    <option value="season2">Season 2</option>
                    <option value="season3">Season 3</option>
                </select>
            </div>
            <ul class="trending-pills d-flex nav nav-pills align-items-center text-center s-margin" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active show" data-toggle="pill" href="#episodes" role="tab"
                        aria-selected="true">Episodes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="pill" href="#popularclips" role="tab" aria-selected="false">Popular
                        Clips</a>
                </li>
            </ul> --}}
            <div class="tab-content">
                <div id="episodes" class="tab-pane fade active show" role="tabpanel">
                    <div class="block-space">
                        <div class="row">
                           
                            @foreach($episode as $key =>$ep)
                                
                                    <div class="col-1-5 col-md-6 iq-mb-30">
                                        
                                        <div class="epi-box">
                                            
                                            <div class="epi-img position-relative">
                                                <img src="{{ asset('uploads/movie/' . $movie->image) }}" class="img-fluid img-zoom" alt="">
                                                
                                                <div class="episode-play-info">
                                                    <div class="episode-play">
                                                       
                                                        {{-- đường dẫn vào trang xem phim theo tập --}}
                                                        <a href="{{url('xem-phim/'.$ep->movie->slug.'/tap-'.$ep->episode)}}">
                                                            <i class="ri-play-fill"></i>
                                                        </a>
                                                       
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="epi-desc p-3">
                                                
                                                    <div class="d-flex align-items-center justify-content-between">
                                                        <h6 class="text-white">{{ $ep->movie->title }}</h6>
                                                        <span class="text-primary">{{ $ep->movie->thoiluong }}</span>
                                                    </div>
                                                    
                                                        <h6 class="epi-name text-white mb-0"> Tập {{$ep->episode}}
                                                        </h6>
                                                
                                            </div>
                                
                                        </div>
                                    
                                    </div>
                                
                            @endforeach
                          
                        </div>
                    </div>
                </div>
 
            </div>
        </section>
        <section id="iq-tvthrillers" class="s-margin">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12 overflow-hidden">
                        <div class="iq-main-header d-flex align-items-center justify-content-between">
                            <h4 class="main-title">CÓ THỂ BẠN MUỐN XEM</h4>
                            <a class="iq-view-all" href="movie-category.html">Xem thêm</a>
                        </div>
                        <div class="tvthrillers-contens">
                            <ul class="favorites-slider list-inline row p-0 mb-0">
                                @foreach ($related as $key => $hot)
                                    <li class="slide-item">

                                        <div class="block-images position-relative">
                                            <div class="img-box">
                                                <img src="{{ asset('uploads/movie/' . $hot->image) }}" class="img-fluid"
                                                    alt="">
                                            </div>
                                            <div class="block-description">
                                                <h6 class="iq-title"><a
                                                        href="{{ $hot->title }}">{{ $hot->title }}</a></h6>
                                                <div class="movie-time d-flex align-items-center my-2">
                                                    <div class="badge badge-secondary p-1 mr-2">15+</div>
                                                    <span class="text-white">2 Seasons</span>
                                                </div>
                                                <div class="hover-buttons">
                                                    <a href="{{ route('movie',$hot->slug )}}">
                                                    <span class="btn btn-hover iq-button"><i class="fa fa-play mr-1"
                                                            aria-hidden="true"></i>
                                                        Play Now</span>
                                                </div>
                                            </div>
                                            <div class="block-social-info">
                                                <ul class="list-inline p-0 m-0 music-play-lists">
                                                    <li class="share">
                                                        <span><i class="ri-share-fill"></i></span>
                                                        <div class="share-box">
                                                            <div class="d-flex align-items-center">
                                                                <a href="https://www.facebook.com/sharer?u=https://iqonic.design/wp-themes/streamit_wp/movie/shadow/"
                                                                    target="_blank" rel="noopener noreferrer"
                                                                    class="share-ico" tabindex="0"><i
                                                                        class="ri-facebook-fill"></i></a>
                                                                <a href="https://twitter.com/intent/tweet?text=Currentlyreading"
                                                                    target="_blank" rel="noopener noreferrer"
                                                                    class="share-ico" tabindex="0"><i
                                                                        class="ri-twitter-fill"></i></a>
                                                                <a href="#"
                                                                    data-link="https://iqonic.design/wp-themes/streamit_wp/movie/shadow/"
                                                                    class="share-ico iq-copy-link" tabindex="0"><i
                                                                        class="ri-links-fill"></i></a>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li><span><i class="ri-heart-fill"></i></span>
                                                        <span class="count-box">19+</span>
                                                    </li>
                                                    <li><span><i class="ri-add-line"></i></span></li>
                                                </ul>
                                            </div>
                                        </div>

                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

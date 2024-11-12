<section id="iq-topten">

    <div class="container-fluid">

        <div class="row">
            <div class="col-sm-12 overflow-hidden">
                <div class="iq-main-header d-flex align-items-center justify-content-between">
                    <!-- <h4 class="main-title iq-title topten-title-sm">Top 10 in India</h4> -->
                </div>

                <div class="topten-contens">

                    <h4 class="main-title iq-title topten-title">Phim Hot</h4>

                    <ul id="top-ten-slider" class="list-inline p-0 m-0  d-flex align-items-center">
                        @foreach ($phimhot_sidebar as $key => $hot_sidebar)
                            <li class="slick-bg">
                                <a href="{{ route('movie', $hot_sidebar->slug) }}" title="{{ $hot_sidebar->title }}">
                                    <img src="{{ asset('uploads/movie/' . $hot_sidebar->image) }}"
                                        class="img-fluid w-100" alt="">
                                </a>
                            </li>
                        @endforeach
                    </ul>
                    <div class="vertical_s">
                        <ul id="top-ten-slider-nav" class="list-inline p-0 m-0  d-flex align-items-center">
                            @foreach ($phimhot_sidebar as $key => $sidebar)
                                <li>
                                    <div class="block-images position-relative">
                                        <a href="{{ route('movie', $sidebar->slug) }}">
                                            <img src="{{ asset('uploads/movie/' . $sidebar->image) }}"
                                                class="img-fluid w-100" alt="">
                                        </a>
                                        <div class="block-description">
                                            <h5>{{ $sidebar->title }}</h5>
                                            <div class="movie-time d-flex align-items-center my-2">
                                                <div class="badge badge-secondary p-1 mr-2">
                                                    @if ($sidebar->resolution == 0)
                                                        HD
                                                    @elseif ($sidebar->resolution == 1)
                                                        SD
                                                    @elseif ($sidebar->resolution == 2)
                                                        HDCam
                                                    @elseif ($sidebar->resolution == 3)
                                                        Cam
                                                    @else
                                                        FullHD
                                                    @endif
                                                </div>
                                                <span class="text-white">{{ $sidebar->thoiluong }}</span>
                                            </div>
                                            <div class="hover-buttons">
                                                <a href="movie-details.html" class="btn btn-hover" tabindex="0">
                                                    <i class="fa fa-play mr-1" aria-hidden="true"></i> Xem Ngay
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                </div>

            </div>
        </div>

    </div>

</section>

<!doctype html>
<html lang="en-US">

<head>
    <!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>HyDrex Movies</title>
    <!-- Favicon -->
    <link rel="shortcut icon" href='{{ asset('images/movie_favicon.ico') }}' />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href='{{ asset('css/bootstrap.min.css') }}' />
    <!-- Typography CSS -->
    <link rel="stylesheet" href='{{ asset('css/typography.css') }}'>
    <!-- Style -->
    <link rel="stylesheet" href='{{ asset('css/style.css') }}' />
    <!-- Responsive -->
    <link rel="stylesheet" href='{{ asset('css/responsive.css') }}' />
    <!-- font -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css
      " />


</head>

<body>
    <!-- loader Start -->
    <div id="loading">
        <div id="loading-center">
        </div>
    </div>
    <!-- loader END -->
    <!-- Header -->
    <header id="main-header">
        <div class="main-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <nav class="navbar navbar-expand-lg navbar-light p-0">
                            <a href="#" class="navbar-toggler c-toggler" data-toggle="collapse"
                                data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                aria-expanded="false" aria-label="Toggle navigation">
                                <div class="navbar-toggler-icon" data-toggle="collapse">
                                    <span class="navbar-menu-icon navbar-menu-icon--top"></span>
                                    <span class="navbar-menu-icon navbar-menu-icon--middle"></span>
                                    <span class="navbar-menu-icon navbar-menu-icon--bottom"></span>
                                </div>
                            </a>
                            <a class="navbar-brand" href="{{ route('homepage') }}"> <img class="img-fluid logo"
                                    src="{{ asset('images/movie_logo.png') }}" /> </a>
                            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                <div class="menu-main-menu-container">
                                    <ul id="top-menu" class="navbar-nav ml-auto">
                                        <li class="menu-item">
                                            <a href="{{ route('homepage') }}">TRANG CHỦ</a>
                                        </li>

                                        <li class="menu-item">
                                            <a href="#">DANH MỤC</a>
                                            <ul class="sub-menu">
                                                @foreach ($category as $key => $cate)
                                                    <li class="menu-item"><a title="{{ $cate->title }}"
                                                            href="{{ route('category', $cate->slug) }}">{{ $cate->title }}</a>
                                                    </li>
                                                @endforeach
                                            </ul>

                                        </li>



                                        <li class="menu-item">
                                            <a href="#">THỂ LOẠI</a>
                                            <ul class="sub-menu">
                                                @foreach ($genre as $key => $gen)
                                                    <li class="menu-item"><a title="{{ $gen->title }}"
                                                            href="{{ route('genre', $gen->slug) }}">{{ $gen->title }}</a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </li>


                                        <li class="menu-item">
                                            <a href="#">ĐẤT NƯỚC</a>
                                            <ul class="sub-menu">
                                                @foreach ($country as $key => $count)
                                                    <li class="menu-item"><a title="{{ $count->title }}"
                                                            href="{{ route('country', $count->slug) }}">{{ $count->title }}</a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </li>


                                        <li class="menu-item">
                                            <a href="#">NĂM PHIM</a>
                                            <ul class="sub-menu">
                                                @for ($year = 2015; $year <= 2023; $year++)
                                                    <li class="menu-item"><a title="{{ $year }}"
                                                            href="{{ url('nam/' . $year) }}">{{ $year }}</a>
                                                    </li>
                                                @endfor
                                        </li>
                                    </ul>
                                    </li>

                                    </ul>
                                </div>
                            </div>
                            <div class="mobile-more-menu">
                                <a href="javascript:void(0);" class="more-toggle" id="dropdownMenuButton"
                                    data-toggle="more-toggle" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-ellipsis-h"></i>
                                </a>
                                <div class="more-menu" aria-labelledby="dropdownMenuButton">
                                    <div class="navbar-right position-relative">
                                        <ul class="d-flex align-items-center justify-content-end list-inline m-0">
                                            <li>
                                                <a href="#" class="search-toggle">
                                                    <i class="fa fa-search"></i>
                                                </a>
                                               
                                                <div class="search-box iq-search-bar">
                                                    <form action="#" class="searchbox">
                                                        <div class="form-group position-relative">
                                                            <input id="timkiem" type="text" class="text search-input font-size-12"
                                                                placeholder="Tìm kiếm phim...">
                                                            <i class="search-link fa fa-search"></i>
                                                        </div>
                                                        <ul class="list-group" id="result">
                                                        </ul>
                                                    </form>
                                                </div>
                                                
                                            </li>

                                            <li>
                                                <a href="#"
                                                    class="iq-user-dropdown search-toggle d-flex align-items-center">
                                                    <img src="{{ asset('images/user/user.jpg') }}"
                                                        class="img-fluid avatar-40 rounded-circle" alt="user">
                                                </a>
                                                <div class="iq-sub-dropdown iq-user-dropdown">
                                                    <div class="iq-card shadow-none m-0">
                                                        <div class="iq-card-body p-0 pl-3 pr-3">
                                                            <a href="manage-profile.html"
                                                            class="iq-sub-card setting-dropdown">
                                                            <div class="media align-items-center">
                                                                <div class="right-icon">
                                                                    <i class="fa fa-user text-primary"></i>
                                                                </div>
                                                                <div class="media-body ml-3">
                                                                    <h6 class="mb-0 ">Đăng nhập</h6>
                                                                </div>
                                                            </div>
                                                            </a>
                                                            <a href="manage-profile.html"
                                                                class="iq-sub-card setting-dropdown">
                                                                <div class="media align-items-center">
                                                                    <div class="right-icon">
                                                                        <i class="fa fa-user text-primary"></i>
                                                                    </div>
                                                                    <div class="media-body ml-3">
                                                                        <h6 class="mb-0 ">Manage Profile</h6>
                                                                    </div>
                                                                </div>
                                                            </a>
                                                            <a href="setting.html"
                                                                class="iq-sub-card setting-dropdown">
                                                                <div class="media align-items-center">
                                                                    <div class="right-icon">
                                                                        <i class="fa fa-cog text-primary"></i>
                                                                    </div>
                                                                    <div class="media-body ml-3">
                                                                        <h6 class="mb-0 ">Settings</h6>
                                                                    </div>
                                                                </div>
                                                            </a>
                                                            <a href="pricing-plan.html"
                                                                class="iq-sub-card setting-dropdown">
                                                                <div class="media align-items-center">
                                                                    <div class="right-icon">
                                                                        <i class="fa fa-inr text-primary"></i>
                                                                    </div>
                                                                    <div class="media-body ml-3">
                                                                        <h6 class="mb-0 ">Pricing Plan</h6>
                                                                    </div>
                                                                </div>
                                                            </a>
                                                            <a href="{{ route('login') }}" class="iq-sub-card setting-dropdown">
                                                                <div class="media align-items-center">
                                                                    <div class="right-icon">
                                                                        <i class="fa fa-sign-out text-primary"></i>
                                                                    </div>
                                                                    <div class="media-body ml-3">
                                                                        <h6 class="mb-0">Logout</h6>
                                                                    </div>
                                                                </div>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="navbar-right menu-right">
                                <ul class="d-flex align-items-center list-inline m-0">
                                    <li class="nav-item nav-icon">
                                        <a href="#" class="search-toggle device-search">
                                            <i class="fa fa-search"></i>
                                        </a>
                                        {{-- Tìm kiếm phim --}}
                                        <div class="search-box iq-search-bar d-search">
                                            <form action="#" class="searchbox">
                                                <div class="form-group position-relative">
                                                    <input type="text" id="timkiem" class="text search-input font-size-12"
                                                        placeholder="Tìm kiếm phim...">
                                                    <i class="search-link fa fa-search"></i>
                                                </div>
                                                <ul class="list-group" id="result" >
                                               
                                                </ul>
                                            </form>
                                        </div>
                                        

                                    </li>
                                    <li class="nav-item nav-icon">
                                        <a href="#" class="search-toggle" data-toggle="search-toggle">
                                            <i class="fa fa-bell"></i>
                                            <span class="bg-danger dots"></span>
                                        </a>
                                        <div class="iq-sub-dropdown">
                                            <div class="iq-card shadow-none m-0">
                                                <div class="iq-card-body">
                                                    <a href="#" class="iq-sub-card">
                                                        <div class="media align-items-center">
                                                            <img src="{{ asset('images/notify/thumb-1.jpg') }}"
                                                                class="img-fluid mr-3" alt="streamit" />
                                                            <div class="media-body">
                                                                <h6 class="mb-0 ">Boot Bitty</h6>
                                                                <small class="font-size-12"> just now</small>
                                                            </div>
                                                        </div>
                                                    </a>
                                                    <a href="#" class="iq-sub-card">
                                                        <div class="media align-items-center">
                                                            <img src="{{ asset('images/notify/thumb-2.jpg') }}"
                                                                class="img-fluid mr-3" alt="streamit" />
                                                            <div class="media-body">
                                                                <h6 class="mb-0 ">The Last Breath</h6>
                                                                <small class="font-size-12">15 minutes ago</small>
                                                            </div>
                                                        </div>
                                                    </a>
                                                    <a href="#" class="iq-sub-card">
                                                        <div class="media align-items-center">
                                                            <img src="{{ asset('images/notify/thumb-3.jpg') }}"
                                                                class="img-fluid mr-3" alt="streamit" />
                                                            <div class="media-body">
                                                                <h6 class="mb-0 ">The Hero Camp</h6>
                                                                <small class="font-size-12">1 hour ago</small>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="nav-item nav-icon">
                                        <a href="#"
                                            class="iq-user-dropdown search-toggle p-0 d-flex align-items-center"
                                            data-toggle="search-toggle">
                                            <img src="{{ asset('images/user/user.jpg') }}"
                                                class="img-fluid avatar-40 rounded-circle" alt="user">
                                        </a>
                                        <div class="iq-sub-dropdown iq-user-dropdown">
                                            <div class="iq-card shadow-none m-0">
                                                <div class="iq-card-body p-0 pl-3 pr-3">
                                                 
                                                    @if(!Session::get('customer_email'))
                                                   
                                                    <a href="{{route('customer-login')}}"
                                                    class="iq-sub-card setting-dropdown">
                                                    <div class="media align-items-center">
                                                        <div class="right-icon">
                                                            <i class="fa fa-user text-primary"></i>
                                                        </div>
                                                        <div class="media-body ml-3">
                                                            <h6 class="my-0 ">Đăng nhập</h6>
                                                        </div>
                                                    </div>
                                                    </a>
                                                    <a href="{{route('customer-register')}}"
                                                    class="iq-sub-card setting-dropdown">
                                                    <div class="media align-items-center">
                                                        <div class="right-icon">
                                                            <i class="fa fa-user text-primary"></i>
                                                        </div>
                                                        <div class="media-body ml-3">
                                                            <h6 class="my-0 ">Đăng ký</h6>
                                                        </div>
                                                    </div>
                                                    </a>
                                                    @else
                                                    <a href="{{route('customer-info')}}"
                                                    class="iq-sub-card setting-dropdown">
                                                    <div class="media align-items-center">
                                                        <div class="right-icon">
                                                            <i class="fa fa-user text-primary"></i>
                                                        </div>
                                                        <div class="media-body ml-3">
                                                            <h6 class="my-0 ">Profile: {{Session::get('customer_name')}} | {{Session::get('package_name')}}
                                                                 | {{number_format(Session::get('customer_balance'),0,',','.')}}đ</h6>
                                                        </div>
                                                    </div>
                                                    </a>
                                                    <a href="{{route('nap-the')}}"
                                                    class="iq-sub-card setting-dropdown">
                                                        <div class="media align-items-center">
                                                            <div class="right-icon">
                                                                <i class="fa fa-user text-primary"></i>
                                                            </div>
                                                            <div class="media-body ml-3">
                                                                <h6 class="my-0 ">Nạp thẻ</h6>
                                                            </div>
                                                        </div>
                                                    </a>
                                                    <a href="{{route('logout-customer')}}" class="iq-sub-card setting-dropdown">
                                                        <div class="media align-items-center">
                                                            <div class="right-icon">
                                                                <i class="fa fa-sign-out text-primary"></i>
                                                            </div>
                                                            <div class="media-body ml-3">
                                                                <h6 class="my-0 ">Đăng xuất</h6>
                                                            </div>
                                                        </div>
                                                    </a>
                                                    @endif
                                                    {{-- <a href="manage-profile.html"
                                                        class="iq-sub-card setting-dropdown">
                                                        <div class="media align-items-center">
                                                            <div class="right-icon">
                                                                <i class="fa fa-user text-primary"></i>
                                                            </div>
                                                            <div class="media-body ml-3">
                                                                <h6 class="my-0 ">Manage Profile</h6>
                                                            </div>
                                                        </div>
                                                    </a> --}}
                                                    {{-- <a href="setting.html" class="iq-sub-card setting-dropdown">
                                                        <div class="media align-items-center">
                                                            <div class="right-icon">
                                                                <i class="fa fa-cog text-primary"></i>
                                                            </div>
                                                            <div class="media-body ml-3">
                                                                <h6 class="my-0 ">Settings</h6>
                                                            </div>
                                                        </div>
                                                    </a> --}}
                                                    <a href="{{route('pricing-plan')}}" class="iq-sub-card setting-dropdown">
                                                        <div class="media align-items-center">
                                                            <div class="right-icon">
                                                                <i class="fa fa-inr text-primary"></i>
                                                            </div>
                                                            <div class="media-body ml-3">
                                                                <h6 class="my-0 ">Giá gói phim</h6>
                                                            </div>
                                                        </div>
                                                    </a>
                                                   
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </nav>
                        <div class="nav-overlay"></div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Header End -->
    <!-- Slider Start -->
    {{-- <section id="home" class="iq-main-slider p-0">
         <div id="home-slider" class="slider m-0 p-0">
            <div class="slide slick-bg s-bg-1">
               <div class="container-fluid position-relative h-100">
                  <div class="slider-inner h-100">
                     <div class="row align-items-center  h-100">
                        <div class="col-xl-6 col-lg-12 col-md-12">
                           <a href="javascript:void(0);">
                              <div class="channel-logo" data-animation-in="fadeInLeft" data-delay-in="0.5">
                                 <img src="images/logo.png " class="c-logo" alt="streamit">
                              </div>
                           </a>
                           <h1 class="slider-text big-title title text-uppercase" data-animation-in="fadeInLeft"
                              data-delay-in="0.6">bushland</h1>

                              <div class="d-flex flex-wrap align-items-center fadeInLeft animated" data-animation-in="fadeInLeft" style="opacity: 1;">
                                <div class="slider-ratting d-flex align-items-center mr-4 mt-2 mt-md-3">
                                    <ul class="ratting-start p-0 m-0 list-inline text-primary d-flex align-items-center justify-content-left">
                                       <li>
                                          <i class="fa fa-star" aria-hidden="true"></i>
                                       </li>
                                       <li>
                                          <i class="fa fa-star" aria-hidden="true"></i>
                                       </li>
                                       <li>
                                          <i class="fa fa-star" aria-hidden="true"></i>
                                       </li>
                                       <li>
                                          <i class="fa fa-star" aria-hidden="true"></i>
                                       </li>
                                       <li>
                                          <i class="fa fa-star-half" aria-hidden="true"></i>
                                       </li>
                                    </ul>
                                    <span class="text-white ml-2">4.7(lmdb)</span>
                                    </div>
                                    <div class="d-flex align-items-center mt-2 mt-md-3">
                                       <span class="badge badge-secondary p-2">18+</span>
                                       <span class="ml-3">2 Seasons</span>
                                    </div>
                            </div>

                           <!-- <div class="d-flex align-items-center" data-animation-in="fadeInUp" data-delay-in="1">
                               
                              <span class="badge badge-secondary p-2">18+</span>
                              <span class="ml-3">2 Seasons</span>
                           </div> -->
                           <p data-animation-in="fadeInUp" data-delay-in="1.2">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard
                              dummy text ever since the 1500s.
                           </p>
                           <div class="trending-list" data-wp_object-in="fadeInUp" data-delay-in="1.2">
                            <div class="text-primary title starring">
                                Starring: <span class="text-body">Karen Gilchrist, James Earl Jones</span>
                            </div>
                            <div class="text-primary title genres">
                                Genres: <span class="text-body">Action</span>
                            </div>
                            <div class="text-primary title tag">
                                Tag: <span class="text-body">Action, Adventure, Horror</span>
                            </div>
                        </div>
                           <div class="d-flex align-items-center r-mb-23" data-animation-in="fadeInUp" data-delay-in="1.2">
                              <a href="show-details.html" class="btn btn-hover iq-button"><i class="fa fa-play mr-2"
                                 aria-hidden="true"></i>Play Now</a>
                              <a href="show-details.html" class="btn btn-link">More details</a>
                           </div>
                        </div>
                     </div>
                     <div class="col-xl-5 col-lg-12 col-md-12 trailor-video">
                        <a href="video/trailer.mp4" class="video-open playbtn">
                           <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                              x="0px" y="0px" width="80px" height="80px" viewBox="0 0 213.7 213.7"
                              enable-background="new 0 0 213.7 213.7" xml:space="preserve">
                              <polygon class='triangle' fill="none" stroke-width="7" stroke-linecap="round"
                                 stroke-linejoin="round" stroke-miterlimit="10"
                                 points="73.5,62.5 148.5,105.8 73.5,149.1 " />
                              <circle class='circle' fill="none" stroke-width="7" stroke-linecap="round"
                                 stroke-linejoin="round" stroke-miterlimit="10" cx="106.8" cy="106.8" r="103.3" />
                           </svg>
                           <span class="w-trailor">Watch Trailer</span>
                        </a>
                     </div>
                  </div>
               </div>
            </div>
            <div class="slide slick-bg s-bg-2">
               <div class="container-fluid position-relative h-100">
                  <div class="slider-inner h-100">
                     <div class="row align-items-center  h-100">
                        <div class="col-xl-6 col-lg-12 col-md-12">
                           <a href="javascript:void(0);">
                              <div class="channel-logo" data-animation-in="fadeInLeft">
                                 <img src="images/logo.png" class="c-logo" alt="streamit">
                              </div>
                           </a>
                           <h1 class="slider-text big-title title text-uppercase" data-animation-in="fadeInLeft">sail coaster</h1>
                           
                           <div class="d-flex flex-wrap align-items-center fadeInLeft animated" data-animation-in="fadeInLeft" style="opacity: 1;">
                            <div class="slider-ratting d-flex align-items-center mr-4 mt-2 mt-md-3">
                                <ul class="ratting-start p-0 m-0 list-inline text-primary d-flex align-items-center justify-content-left">
                                                                                        <li>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                </li>
                                                                                        <li>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                </li>
                                                                                        <li>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                </li>
                                                                                        <li>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                </li>
                                                                                            <li>
                                        <i class="fa fa-star-half" aria-hidden="true"></i>
                                    </li>
                                                                                    </ul>
                                <span class="text-white ml-2">4.7(lmdb)</span>
                                </div>
                                                            <div class="d-flex align-items-center mt-2 mt-md-3">
                                <span class="badge badge-secondary p-2">16+</span>
                                <span class="ml-3">2h 40m</span>
                            </div>
                        </div>
                           <p data-animation-in="fadeInUp" data-delay-in="0.7">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard
                              dummy text ever since the 1500s.
                           </p>
                           <div class="trending-list" data-wp_object-in="fadeInUp" data-delay-in="1.2">
                            <div class="text-primary title starring">
                                Starring: <span class="text-body">Karen Gilchrist, James Earl Jones</span>
                            </div>
                            <div class="text-primary title genres">
                                Genres: <span class="text-body">Action</span>
                            </div>
                            <div class="text-primary title tag">
                                Tag: <span class="text-body">Action, Adventure, Horror</span>
                            </div>
                        </div>
                           <div class="d-flex align-items-center r-mb-23" data-animation-in="fadeInUp" data-delay-in="1">
                              <a href="movie-details.html" class="btn btn-hover iq-button"><i class="fa fa-play mr-2"
                                 aria-hidden="true"></i>Play Now</a>
                              <a href="movie-details.html" class="btn btn-link">More details</a>
                           </div>
                        </div>
                     </div>
                     <div class="col-xl-5 col-lg-12 col-md-12 trailor-video">
                        <a href="video/trailer.mp4" class="video-open playbtn">
                           <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                              x="0px" y="0px" width="80px" height="80px" viewBox="0 0 213.7 213.7"
                              enable-background="new 0 0 213.7 213.7" xml:space="preserve">
                              <polygon class='triangle' fill="none" stroke-width="7" stroke-linecap="round"
                                 stroke-linejoin="round" stroke-miterlimit="10"
                                 points="73.5,62.5 148.5,105.8 73.5,149.1 " />
                              <circle class='circle' fill="none" stroke-width="7" stroke-linecap="round"
                                 stroke-linejoin="round" stroke-miterlimit="10" cx="106.8" cy="106.8" r="103.3" />
                           </svg>
                           <span class="w-trailor">Watch Trailer</span>
                        </a>
                     </div>
                  </div>
               </div>
            </div>
            <div class="slide slick-bg s-bg-3">
               <div class="container-fluid position-relative h-100">
                  <div class="slider-inner h-100">
                     <div class="row align-items-center  h-100">
                        <div class="col-xl-6 col-lg-12 col-md-12">
                           <a href="javascript:void(0);">
                              <div class="channel-logo" data-animation-in="fadeInLeft">
                                 <img src="images/logo.png" class="c-logo" alt="streamit">
                              </div>
                           </a>
                           <h1 class="slider-text big-title title text-uppercase" data-animation-in="fadeInLeft">the army</h1>
                           
                           <div class="d-flex flex-wrap align-items-center fadeInLeft animated" data-animation-in="fadeInLeft" style="opacity: 1;">
                            <div class="slider-ratting d-flex align-items-center mr-4 mt-2 mt-md-3">
                                <ul class="ratting-start p-0 m-0 list-inline text-primary d-flex align-items-center justify-content-left">
                                                                                        <li>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                </li>
                                                                                        <li>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                </li>
                                                                                        <li>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                </li>
                                                                                        <li>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                </li>
                                                                                            <li>
                                        <i class="fa fa-star-half" aria-hidden="true"></i>
                                    </li>
                                                                                    </ul>
                                <span class="text-white ml-2">4.7(lmdb)</span>
                                </div>
                                                            <div class="d-flex align-items-center mt-2 mt-md-3">
                                <span class="badge badge-secondary p-2">20+</span>
                                <span class="ml-3">3h</span>
                            </div>
                        </div>

                           
                           <p data-animation-in="fadeInUp" data-delay-in="1.2" class="fadeInUp animated" style="opacity: 1; animation-delay: 1.2s;">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard
                              dummy text ever since the 1500s.
                           </p>
                           <div class="trending-list" data-wp_object-in="fadeInUp" data-delay-in="1.2">
                            <div class="text-primary title starring">
                                Starring: <span class="text-body">Karen Gilchrist, James Earl Jones</span>
                            </div>
                            <div class="text-primary title genres">
                                Genres: <span class="text-body">Action</span>
                            </div>
                            <div class="text-primary title tag">
                                Tag: <span class="text-body">Action, Adventure, Horror</span>
                            </div>
                        </div>
                           <div class="d-flex align-items-center r-mb-23" data-animation-in="fadeInUp" data-delay-in="1">
                              <a href="movie-details.html" class="btn btn-hover iq-button"><i class="fa fa-play mr-2"
                                 aria-hidden="true"></i>Play Now</a>
                              <a href="movie-details.html" class="btn btn-link">More details</a>
                           </div>
                        </div>
                     </div>
                     <div class="col-xl-5 col-lg-12 col-md-12 trailor-video">
                        <a href="video/trailer.mp4" class="video-open playbtn">
                           <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                              x="0px" y="0px" width="80px" height="80px" viewBox="0 0 213.7 213.7"
                              enable-background="new 0 0 213.7 213.7" xml:space="preserve">
                              <polygon class='triangle' fill="none" stroke-width="7" stroke-linecap="round"
                                 stroke-linejoin="round" stroke-miterlimit="10"
                                 points="73.5,62.5 148.5,105.8 73.5,149.1 " />
                              <circle class='circle' fill="none" stroke-width="7" stroke-linecap="round"
                                 stroke-linejoin="round" stroke-miterlimit="10" cx="106.8" cy="106.8" r="103.3" />
                           </svg>
                           <span class="w-trailor">Watch Trailer</span>
                        </a>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
            <symbol xmlns="http://www.w3.org/2000/svg" viewBox="0 0 44 44" width="44px" height="44px" id="circle"
               fill="none" stroke="currentColor">
               <circle r="20" cy="22" cx="22" id="test"></circle>
            </symbol>
         </svg>
      </section> --}}
    <!-- Slider End -->
    <!-- -------------------------- MainContent -------------------------- -->
    @include('pages.include.flash-message')
    @yield('content')
   
    <!-- -------------------------- End MainContent -------------------------- -->
    <footer id="contact" class="footer-one iq-bg-dark">

        <!-- Address -->
        <div class="footer-top">
            <div class="container-fluid">
                <div class="row footer-standard">
                    <div class="col-lg-7">
                        {{-- <div class="widget text-left">
                            <div class="menu-footer-link-1-container">
                                <ul id="menu-footer-link-1" class="menu p-0">
                                    <li id="menu-item-7314"
                                        class="menu-item menu-item-type-post_type menu-item-object-page menu-item-7314">
                                        <a href="#">Terms Of Use</a>
                                    </li>
                                    <li id="menu-item-7316"
                                        class="menu-item menu-item-type-post_type menu-item-object-page menu-item-7316">
                                        <a href="../html/privacy-policy.html">Privacy-Policy</a>
                                    </li>
                                    <li id="menu-item-7118"
                                        class="menu-item menu-item-type-post_type menu-item-object-page menu-item-7118">
                                        <a href="../html/faq.html">FAQ</a>
                                    </li>
                                    <li id="menu-item-7118"
                                        class="menu-item menu-item-type-post_type menu-item-object-page menu-item-7118">
                                        <a href="../html/watch-video.html">Watch List</a>
                                    </li>
                                </ul>
                            </div>
                        </div> --}}
                        <div class="widget text-left">
                            <div class="textwidget">
                                <p><small>© 2023 MOVIE1975. All Rights Reserved. All videos and shows on this platform
                                        are trademarks of, and all related images and content are the property of,
                                        MOVIE1975 Inc. Duplication and copy of this is strictly prohibited. All rights
                                        reserved.</small></p>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="col-lg-2 col-md-6 mt-4 mt-lg-0">
                        <h6 class="footer-link-title">
                            Follow Us :
                        </h6>
                        <ul class="info-share">
                            <li><a target="_blank" href="#"><i class="fa fa-instagram"></i></a></li>
                            <li><a target="_blank" href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a target="_blank" href="#"><i class="fa fa-google-plus"></i></a></li>
                            <li><a target="_blank" href="#"><i class="fa fa-github"></i></a></li>
                        </ul>

                    </div>
                    <div class="col-lg-3 col-md-6 mt-4 mt-lg-0">
                        <div class="widget text-left">
                            <div class="textwidget">
                                <h6 class="footer-link-title">Streamit App</h6>
                                <div class="d-flex align-items-center">
                                    <a class="app-image" href="#">
                                        <img src="{{ asset('images/footer/01.jpg') }}" alt="play-store">
                                    </a><br>
                                    <a class="ml-3 app-image" href="#"><img
                                            src="{{ asset('images/footer/02.jpg') }}" alt="app-store"></a>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
        <!-- Address END -->
    </footer>

    <!-- MainContent End-->
    <!-- back-to-top -->
    <div id="back-to-top">
        <a class="top" href="#top" id="top"> <i class="fa fa-angle-up"></i> </a>
    </div>
    <!-- back-to-top End -->
    <!-- jQuery, Popper JS -->
    <script src='{{ asset('js/jquery-3.4.1.min.js') }}'></script>
    <script src='{{ asset('js/popper.min.js') }}'></script>
    <!-- Bootstrap JS -->
    <script src='{{ asset('js/bootstrap.min.js') }}'></script>
    <!-- Slick JS -->
    <script src='{{ asset('js/slick.min.js') }}'></script>
    <!-- owl carousel Js -->
    <script src='{{ asset('js/owl.carousel.min.js') }}'></script>
    <!-- select2 Js -->
    <script src='{{ asset('js/select2.min.js') }}'></script>
    <!-- Magnific Popup-->
    <script src='{{ asset('js/jquery.magnific-popup.min.js') }}'></script>
    <!-- Slick Animation-->
    <script src='{{ asset('js/slick-animation.min.js') }}'></script>
    <!-- Custom JS-->
    <script src='{{ asset('js/custom.js') }}'></script>
    {{-- Comment --}}
    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v16.0"
        nonce="07EB5Z6I"></script>

    {{-- tìm kiếm --}}
    <script type="text/javascript">
        $(document).ready(function(){
            $('#timkiem').keyup(function(){
                $('#result').html('');
                var search = $('#timkiem').val();
                if(search!= ''){
                    var expression = new RegExp(search,"i");
                    $.getJSON('/json/movies.json', function(data){
                        $.each(data, function(key, value){
                            if (value.title.search(expression) != -1) {
                                $('#result').append('<li class="list-group-item" style="cursor:pointer"><img height="40" width="40" src="/uploads/movie/'+value.image+' ">'+value.title+' </li>')
                            }
                        });
                    })
                }
            })

            $('#result').on('click','li', function(){
                var click_text = $(this).text().split('->');
                $('#timkiem').val($.trim(click_text[0]));
                $('#result').html('');
            })


        })

    </script>

</body>

</html>

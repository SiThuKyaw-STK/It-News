<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title',\App\Base::$name)</title>
    <link rel="icon" href="{{asset('images/logos/fav.png')}}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;0,700;1,200&family=Padauk:wght@400;700&display=swap" rel="stylesheet">
    <link href="{{asset('css/blogStyle.css')}}" rel="stylesheet">
    @yield('head')

</head>
<body>
<div class="py-3 mb-5" id="themeHeaderSpacer"></div>

<nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom position-fixed top-0 w-100">
    <div class="container">
        <a class="navbar-brand" href="{{route('index')}}">
            <img src="{{asset(\App\Base::$logo)}}" style="height: 40px" class="me-1" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="feather-align-right"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul id="menu-top-right-menu" class="navbar-nav ms-auto mb-2 mb-md-0 ">
                <li id="menu-item-12"
                    class="menu-item menu-item-type-custom menu-item-object-custom menu-item-home nav-item nav-item-12">
                    <a href="{{route('index')}}" class="nav-link {{request()->url() == route('index') ? 'active' : ''}}">Home</a></li>
                <li id="menu-item-16"
                    class="menu-item menu-item-type-post_type menu-item-object-page nav-item nav-item-16"><a
                        href="{{route('about')}}" class="nav-link {{request()->url() == route('about') ? 'active' : ''}}">About</a></li>
                <li id="menu-item-242"
                    class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children dropdown nav-item nav-item-242">
                    <a href="#" class="nav-link  dropdown-toggle"
                       data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Pages</a>
                    <ul class="dropdown-menu  depth_0">
                        <li id="menu-item-9"
                            class="menu-item menu-item-type-custom menu-item-object-custom nav-item nav-item-9"><a
                                href="http://google.com/" class="dropdown-item ">facebook</a></li>
                        <li id="menu-item-10"
                            class="menu-item menu-item-type-custom menu-item-object-custom nav-item nav-item-10"><a
                                href="http://google.com/" class="dropdown-item ">youtube</a></li>
                    </ul>
                </li>
                <li id="menu-item-11"
                    class="menu-item menu-item-type-custom menu-item-object-custom nav-item nav-item-11"><a
                        href="#" class="nav-link ">Contact Us</a></li>
            </ul>
        </div>
    </div>
</nav>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-12 col-lg-6 align-self-center px-lg-5 px-md-3">
            @yield('content')
        </div>
        <div class="col-12 col-lg-4 border-start" id="sidebarColumn">
            <div class="position-sticky" style="top: 100px">
                <div class="mb-5 sidebar">


                    <div id="search" class="">
                        <form action="" method="get">
                            <div class="d-flex search-box">
                                <input required value="{{request()->search}}" name="search" type="text" class="form-control flex-shrink-1 me-2 search-input" placeholder="Search Anything">
                                <button class="btn btn-primary search-btn">
                                    <i class="feather-search d-block d-xl-none"></i>
                                    <span class="d-none d-xl-block">Search</span>
                                </button>
                            </div>

                        </form>

                    </div>

                    <a href="{{route('index')}}" class="btn btn-outline-secondary my-3">All Articles</a>

                    <div class="mb-5" id="category">
                        <h4 class="fw-bolder">Category Lists</h4>
                        <ul class="list-group">
                            @foreach($categories as $category)
                            <li class="list-group-item">
                                <a
                                    href="{{route('baseOnCategory',$category->id)}}"
                                    class="{{request()->url() == route('baseOnCategory',$category->id) ? 'active' : ''}}">{{$category->title}}</a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    @yield('pagination-place')
                </div>
                <div class="d-none d-lg-block">
                </div>
            </div>
        </div>

        <div class="col-12 border-bottom mb-0 mt-3">
        </div>
        <div class="col-12">
            <div class="container">
                <div class="d-flex justify-content-between align-items-center my-4">
                    <div class="text-center">
                        Copyright © {{date('Y')}} {{\App\Base::$name}}
                    </div>
                    <a href="#themeHeaderSpacer" class="btn btn-primary">
                        <i class="feather-arrow-up"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>


<script src="{{asset('js/blogJs.js')}}"></script>


</body>
</html>

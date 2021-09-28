<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Rumplesandco | Home</title>
    <!-- favicon -->
    <link rel="shortcut icon" type="image/jpg" href="{{ asset('assets/img/SVG/Asset 1RUMPLES.svg') }}"/>
    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/styleo.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/screen.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('main.css' ) }}"> --}}
    <link rel="stylesheet" href="{{ asset('assets/css/menu.css' ) }}">
    <link rel="stylesheet" href="{{ asset('assets/css/responsive.css' ) }}">
    {{-- <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css' ) }}"> --}}
    <link rel="stylesheet" href="{{ asset('assets/fontawesome/css/all.css' ) }}">
    {{-- <link rel="stylesheet" type="text/css" href="{{ asset ('custom.css' ) }}"> --}}
    {{-- MDB link --}}
    <link rel="stylesheet" type="text/css" href="{{ asset ('assets/css/mdb.min.css' ) }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.6.0/mdb.min.css" rel="stylesheet" />
    <!-- animate css -->
    <script src="{{ asset ('assets/js/bootstrap.js') }}"></script>
    <script src="{{ asset ('assets/js/main.js' ) }}"></script>
    <script type="text/javascript" src="{{ asset ('/js/jquery.min.js' ) }}"></script>

    <!-- CustomJs -->
    <script type="text/javascript" src="{{ asset ('/js/custom.js' ) }}"></script>
    <script type="text/javascript" src="{{ asset ('/js/cart.js' ) }}"></script>
    <script type="text/javascript" src="{{ asset ('assets/js/checkout.js' ) }}"></script>

    <style>
        .cart-circle{
            width: 50px;
            height: 50px;
            background: #ffffff;
            border-radius: 100px;
        }
        .cart-circle img{
            margin-left: 14px;
            padding-top: 12px;
        }
        .cart-circle .cart-count{
            width: 18px;
            height: 18px;
            background: red;
            border-radius: 32px;
            margin-left: 33px;
            margin-top: -45px;
            color: #ffffff;
            font-size: 12px;
        }
        .cart-circle p{
            margin-top: -24px;
            margin-left: 38px;
            color: #ffffff;
            font-size: 12px;
        }
        .dropdown-item:hover{
            background: transparent;
        }
    </style>
    @yield('style')
    @stack("style")
</head>
<body>
    <!-- firt section orange -->
    <div class="section color1">
        <div class="">
          <!-- begining of navigation  -->
          <header class="theme-main-header">
            <div class="top-header">
                <div class="container">
                    <div class="clearfix">
                        <div class="float-left">
                            <ul class="left-widget">
                                <li>
                                    <ul class="social-icon clearfix">
                                        <li><a href="#"><i class="fab fa-facebook" aria-hidden="true"></i></a></li>
                                        <li><a href="#"><i class="fab fa-twitter" aria-hidden="true"></i></a></li>
                                        <li><a href="#"><i class="fab fa-linkedin" aria-hidden="true"></i></a></li>
                                        <li><a href="#"><i class="fab fa-pinterest" aria-hidden="true"></i></a></li>
                                    </ul>
                                </li>
                                {{-- <li>
                                    <div id="polyglotLanguageSwitcher">
                                        <form action="#">
                                            <select id="polyglot-language-options">
                                                <option id="en" value="en" selected>En</option>
                                                <option id="fr" value="fr">Fr</option>
                                                <option id="de" value="de">Gr</option>
                                                <option id="it" value="it">It</option>
                                                <option id="es" value="es">Sp</option>
                                            </select>
                                        </form>
                                    </div> <!-- End #polyglotLanguageSwitcher -->
                                </li> --}}
                            </ul>
                        </div>
                        <div class="float-right">
                            <ul class="right-widget clearfix">
                                <li><a href="#"><i class="fa fa-envelope" aria-hidden="true"></i> hello@rumples.co</a></li>
                                <!--<li><a href="#"><i class="fa fa-phone" aria-hidden="true"></i> </a></li>-->
                                @guest
                                    @if(Route::has('login'))
                                        <li class="quote"><a href="{{ route('login')}}">Login</a></li>
                                        
                                        <li class="quote"><a href="{{ route('register')}}">Sign up</a></li>
                                    @endif
                                @else
                                <li class="nav-item dropdown">
                                  <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                      {{ Auth::user()->name }}
                                  </a>

                                  <div class="dropdown-menu" style="background: #3c190d;">
                                    <a href="{{ url('myorder')}}" class="dropdown-item">My order</a>

                                      <a class="dropdown-item rest" href="{{ route('logout') }}"
                                         onclick="event.preventDefault();
                                                       document.getElementById('logout-form').submit();">
                                          {{ __('Logout') }}
                                      </a>

                                      <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                          @csrf
                                      </form>
                                  </div>
                                </li>
                                @endguest
                            </ul>
                        </div>
                    </div> <!-- /.clearfix -->
                </div> <!-- /.container -->
            </div> <!-- /.top-header -->



            <div class="main-menu-wrapper clearfix">
                <div class="container clearfix">
                    <!-- Logo -->
                    <div class="logo float-left"><a href="{{ route('home')}}"><img src="{{ asset('assets/img/SVG/Asset 1RUMPLES.svg') }}" alt="Logo" width="200" height="65"></a></div>

                    <div class="large-search right-widget float-right" style="margin-top: 29px; display: inline-flex;">
                        {{-- <div class="cart-circle">
                            <a href="{{ route('cart') }}">
                            <img src="{{ asset('assets/img/SVG/cart.svg')}}" alt="">
                            </a>
                            <div class="cart-count"></div>
                            <p>0</p>
                        </div> --}}
                        <a href="{{ url('cart')}}" class="btn btn-unique btn-rounded btn-sm">view cart</a>
                      <form class="form-inline md-form mr-auto">
                          {{-- <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search"> --}}
                          <button class="btn btn-unique btn-rounded btn-sm my-0 waves-effect waves-light" type="submit">Search</button>
                        </form>
                    </div>

                    <!-- ============================ Theme Menu ========================= -->
                    <nav class="navbar-expand-lg float-left navbar-light" id="mega-menu-wrapper">
                        <button class="navbar-toggler float-right clearfix" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                            <i class="navbar-toggler-icon"></i>
                        </button>
                        <div class="mobile-search">
                            <a href="{{ url('cart')}}" class="btn btn-unique btn-rounded btn-sm float-right">view cart</a>
                        </div>


                        <div class="collapse navbar-collapse clearfix" id="navbarNav">
                          <div class="mobile-search  right-widget float-right" style="margin-top: 29px;">
                            <form class="form-inline md-form mr-auto">
                                <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
                                <button class="btn btn-unique btn-rounded btn-sm my-0 waves-effect waves-light" type="submit">Search</button>
                              </form>
                           </div> <!-- /.right-widget -->
                          <ul class="navbar-nav nav " style="margin-top: -19px;">
                            <li class="nav-item dot-fix"><a class="nav-link" href="{{ route('home')}}">Home</a></li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link "onclick="myFunction()  role="button">Categories</a>
                                <ul id="myDropdown" class="dropdown-content">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-xl-7 col-lg-7 col-md-7 ">
                                                <div class="row">
                                                    @foreach ($categories as $category)
                                                    <div class="col-lg-3 col-md-3 col-sm-12 navbarhead">
                                                      <h5>{{$category->name}}</h5>
                                                      @if($category->children)
                                                        @foreach ($category->children as $child)
                                                            <li><a href="{{ url('category_detail/'.$child->slug) }}">{{ $child->name }}</a></li>
                                                        @endforeach
                                                      @endif
                                                    </div>
                                                    @endforeach
                                                  </div>
                                            </div>
                                            <div class="col-xl-3 col-lg-3 col-md-3">
                                            @foreach ($trending as $item)
                                                <h4>{{$item->name}}</h4>
                                            @endforeach
                                            <a href="{{ url('findspec')}}" class="btn btn-primary btn-lg">
                                                Find spec
                                            </a>
                                            </div>
                                        </div>
                                    </div>
                                </ul>
                            </li>
                            <li class="nav-item dot-fix"><a class="nav-link" href="">Blog</a></li>
                            <li class="nav-item dot-fix"><a class="nav-link" href="{{ route('about')}}">About</a></li>
                          </ul>

                          {{-- search --}}

                          {{-- search ends here --}}
                        </div>
                    </nav>
                </div> <!-- /.container -->
            </div> <!-- /.main-menu-wrapper -->
            <!-- end of navigation -->
        </div>
    </div>

    @yield('content')

    <footer>
      <div class="container">
        <div class="row">
          <div class="col-md-3">
            <h4>Contact Info</h4>
            <p><b>Phone:</b>0812 729 0291 <br>
              0802 530 3822 <br>
            </p>
            <p><b>Address:</b> Suite 3, Flat 1
              Lydia Close Odlli road
              Port Harcourt.
              We accept:
            </p>
          </div>
          <div class="col-md-3">
            <h4>Get Help</h4>
            <p><a href="{{ route('delivery')}}">Delivery Information</a></p>
            <p><a href="{{ route('terms')}}">Sale Terms & Conditions</a></p>
            <p><a href="{{ route('returns')}}">Returns and Refunds</a></p>
            <p><a href="{{ route('faq')}}">Shopping FAQ's</a></p>
          </div>
          <div class="col-md-3">
            <h4>Popular Categories</h4>
            <p>Shirts (2405) <br>
              Trousers (1278) <br>
              T-shirts (964) <br>
              Jean (1129) <br>
              Belts (300) <br>
              Jackets (300)</p>
          </div>
          <div class="col-md-3">
            <h4>Let’s stay in touch</h4>
            <form class="form-inline md-form mr-auto" style="margin-top: 29px;">
              <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
              <button class="btn btn-unique btn-rounded btn-sm my-0 waves-effect waves-light" type="submit">Search</button>
            </form>
            <p>Keep up to date with our latest
              news and special offers.</p>
          </div>
        </div>
      </div>
    </footer>
<!-- custom script -->
<!-- Scripts -->
{{-- <script src="{{ asset('js/app.js') }}"></script> --}}
{{-- <script src="{{ asset('assets/js/bootstrap.js')}}"></script> --}}
<script src="{{ asset('assets/js/fontawesome.js')}}"></script>
<!-- fontawesome files -->
<script src="{{ asset('assets/fontawesome/js/all.js')}}"></script>
<script src='{{asset("assets/js/jquery.easing.1.3.js")}}'></script>
<script src='{{asset("assets/js/camera.min.js")}}'></script>
<script src="{{asset('assets/js/popper.min.js')}}"></script>
<!-- Language Stitcher -->
<script src="{{asset('assets/js/jquery.polyglot.language.switcher.js')}}"></script>
<script src="{{ asset('js/jquery.min.js')}}"></script>
{{-- <script src="{{ asset('js/popper.js')}}"></script> --}}
<script src="{{ asset('js/bootstrap.min.js')}}"></script>
<script src="{{ asset('js/main.js')}}"></script>
@yield('scripts') <!-- change this to -->
@stack("script")
<script>
    function loadcart()
    {
        $.ajax({
        method: "GET",
        url: "/load-cart-data",
        success: function (response) {
            $('.cart-count').html('');
            $('.cart-count').val(response.count);
            // console.log(response.count);
        }
    });
    }
</script>

</body>
</html>

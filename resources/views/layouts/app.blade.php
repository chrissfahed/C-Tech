<!DOCTYPE html>
<html lang="en">
<head>
<!-- basic -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <!-- mobile metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="viewport" content="initial-scale=1, maximum-scale=1">
  <!-- site metas -->
  <title>C-tech</title>
  <!-- site icons -->

  <link rel="icon" href="{{asset('images/fevicon/fevicon.png')}}" type="image/gif" />
  <!-- bootstrap css -->
  <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}" />
  <!-- Site css -->
  <link rel="stylesheet" href="{{asset('css/style.css')}}" />
  <!-- responsive css -->
  <link rel="stylesheet" href="{{asset('css/responsive.css')}}" />
  <!-- colors css -->
  <link rel="stylesheet" href="{{asset('css/colors1_dark.css')}}" />
  <!-- custom css -->
  <link rel="stylesheet" href="{{asset('css/custom.css')}}" />
  <!-- wow Animation css -->
  <link rel="stylesheet" href="{{asset('css/animate.css')}}" />
  <!-- revolution slider css -->
  <link rel="stylesheet" type="text/css" href="{{asset('revolution/css/settings.css')}}" />
  <link rel="stylesheet" type="text/css" href="{{asset('revolution/css/layers.css')}}" />
  <link rel="stylesheet" type="text/css" href="{{asset('revolution/css/navigation.css')}}" />
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
  <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
  <![endif]-->
  {{-- <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
  <script src="//code.jquery.com/jquery-1.11.1.min.js"></script> --}}
    @yield('extra-css')
</head>         
<body>
    <header id="default_header" class="header_style_1">
        <!-- header top -->
        <div class="header_top">
          <div class="container">
            <div class="row">
              <div class="col-md-8">
                <div class="full">
                  <div class="topbar-left">
                    <ul class="list-inline">
                      <li> <span class="topbar-label"><i class="fa  fa-home"></i></span> <span class="topbar-hightlight">Lebanon,keserwan,Aachqout</span> </li>
                      <li> <span class="topbar-label"><i class="fa fa-envelope-o"></i></span> <span class="topbar-hightlight"><a href="mailto:info@yourdomain.com">C-Tech@gmail.com</a></span> </li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="col-md-4 right_section_header_top">
                <div class="float-left">
                  <div class="social_icon">
                    <ul class="list-inline">
                      <li><a class="fa fa-facebook" href="https://www.facebook.com/" title="Facebook" target="_blank"></a></li>
                      <li><a class="fa fa-google-plus" href="https://plus.google.com/" title="Google+" target="_blank"></a></li>
                      <li><a class="fa fa-twitter" href="https://twitter.com" title="Twitter" target="_blank"></a></li>
                      <li><a class="fa fa-linkedin" href="https://www.linkedin.com" title="LinkedIn" target="_blank"></a></li>
                      <li><a class="fa fa-instagram" href="https://www.instagram.com" title="Instagram" target="_blank"></a></li>
                    </ul>
                  </div>
                </div>
                <div class="float-right">
                  <div class="make_appo"> <a class="btn white_btn" href="/appointment">Make Appointment</a> </div>
                </div>
                
              </div>
            </div>
          </div>
        </div>
        <!-- end header top -->
        <!-- header bottom -->
        <div class="header_bottom">
          <div class="container">
            <div class="row">
              <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
                <!-- logo start -->
                
                <div class="logo"> <a href=""><img src="{{asset('images/logos/logo.jpg')}}" alt="logo" /></a> </div>
                <!-- logo end -->
                

              </div>
              <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
                <!-- menu start -->
                <div class="menu_side">
                  <div id="navbar_menu">
                    <ul class="first-ul">
                      <li>
                        @if (Auth::check())
                        <h1 style="color:grey">Welcome {{ auth()->user()->name }}!</h1></li>
                        @endif
                      <li> <a class="active" href="/">Home</a></li>
                      <li> <a href="/shop">SHOP</a></li>
                      <li> <a href="/cart">cart
                        <span class="cart-count">
                        @if (Cart::instance('default')->count()>0)  
                        <span class="badge badge-secondary badge-pill">{{ Cart::instance('default')->count() }}</span></span>
                        @endif
                        </a>
                      </li> 
                      <li> <a href="/contactus">Contact Us</a></li>
                      <li><a href="/aboutus">About Us</a></li>
                      <li>
                        @if (Auth::check())
                        <a href="/profile">Profile</a>
                        @endif
                      </li>
                      <li>
                        @if (Auth::check())
                        <a href="/Logout">Logout</a>
                        
                        @else
                        <a href="/login">LOGIN/REGISTER</a>
                        @endif
                      </li>
                      
                    </ul>
                  </div>
                  {{-- <div class="search_icon">
                    <ul>
                      <li><a href="#" data-toggle="modal" data-target="#search_bar"><i class="fa fa-search" aria-hidden="true"></i></a></li>
                    </ul>
                  </div> --}}
                </div>
                <!-- menu end -->
              </div>
            </div>
          </div>
        </div>
        <!-- header bottom end -->
      </header>
      <!-- inner page banner -->

  
      {{-- <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img class="d-block w-100" src="{{ asset('images/it_service/gamin_pc_1.jpg') }}" alt="repaire technician">
                <div class="carousel-caption d-none d-md-block">
                    <h5>top qualified technicians</h5>
                    <p>C-Tech repaire everything</p>
                </div>
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" src="{{ asset('images/it_service/slide1.jpg') }}" alt="Second slide">
                <div class="carousel-caption d-none d-md-block">
                    <h5>...</h5>
                    <p>...</p>
                </div>
          </div>
          <div class="carousel-item">
            <img class="d-block w-80" src="{{ asset('images/it_service/slide3.jpg') }}" alt="Third slide">
                <div class="carousel-caption d-none d-md-block">
                    <h5>...</h5>
                    <p>...</p>
                </div>
          </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
      </div> --}}


@yield('content')

@yield('extra-js')
</body>
<footer class="footer_style_2">
    <div class="container-fuild">
      <div class="row">
        <div class="map_section">
          <div id="map"></div>
        </div>
        <div class="footer_blog">
          <div class="row">
            <div class="col-md-6">
              <div class="main-heading left_text">
                <h2>C-Tech Theme</h2>
              </div>
              <p>
                  C-Tech is a small bussines main purpos is to spread technologie every where 
              </p>
              <ul class="social_icons">
                <li class="social-icon fb"><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                <li class="social-icon tw"><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                <li class="social-icon gp"><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
              </ul>
            </div>
            <div class="col-md-6">
              <div class="main-heading left_text">
                <h2>Additional links</h2>
              </div>
              <ul class="footer-menu">
                <li><a href="/aboutus"><i class="fa fa-angle-right"></i> About us</a></li>
                <li><a href=""><i class="fa fa-angle-right"></i> Terms and conditions</a></li>
                <li><a href=""><i class="fa fa-angle-right"></i> Privacy policy</a></li>
                <li><a href=""><i class="fa fa-angle-right"></i> News</a></li>
                <li><a href="/contactus"><i class="fa fa-angle-right"></i> Contact us</a></li>
              </ul>
            </div>
            <div class="col-md-6">
              <div class="main-heading left_text">
                <h2>Services</h2>
              </div>
              <ul class="footer-menu">
                <li><i class="fa fa-angle-right"></i> Data recovery</li>
                <li><i class="fa fa-angle-right"></i> Computer repair</li>
                <li><i class="fa fa-angle-right"></i> Mobile service</li>
                <li><i class="fa fa-angle-right"></i> Network solutions</li>
                <li><i class="fa fa-angle-right"></i> Technical support</li>
              </ul>
            </div>
            <div class="col-md-6">
              <div class="main-heading left_text">
                <h2>Contact us</h2>
              </div>
              <p>123 Second Street Fifth Avenue,<br>
                Manhattan, New York<br>
                <span style="font-size:18px;"><a href="tel:+96170384974">+961384974</a></span></p>
              <div class="footer_mail-section">
                <form>
                  <fieldset>
                  <div class="field">
                    <input placeholder="Email" type="text">
                    <button class="button_custom"><i class="fa fa-envelope" aria-hidden="true"></i></button>
                  </div>
                  </fieldset>
                </form>
              </div>
            </div>
          </div>
        </div>
        <div class="cprt">
          <p>Weclome to our shop </p>
        </div>
      </div>
    </div>
  </footer>

<!-- js section -->
<script src="{{asset('js/jquery.min.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<!-- menu js -->
<script src="{{asset('js/menumaker.js')}}"></script>
<!-- wow animation -->
<script src="{{asset('js/wow.js')}}"></script>
<!-- custom js -->
<script src="{{asset('js/custom.js')}}"></script>
<!-- revolution js files -->
<script src="{{asset('revolution/js/jquery.themepunch.tools.min.js')}}"></script>
<script src="{{asset('revolution/js/jquery.themepunch.revolution.min.js')}}"></script>
<script src="{{asset('revolution/js/extensions/revolution.extension.actions.min.js')}}"></script>
<script src="{{asset('revolution/js/extensions/revolution.extension.carousel.min.js')}}"></script>
<script src="{{asset('revolution/js/extensions/revolution.extension.kenburn.min.js')}}"></script>
<script src="{{asset('revolution/js/extensions/revolution.extension.layeranimation.min.js')}}"></script>
<script src="{{asset('revolution/js/extensions/revolution.extension.migration.min.js')}}"></script>
<script src="{{asset('revolution/js/extensions/revolution.extension.navigation.min.js')}}"></script>
<script src="{{asset('revolution/js/extensions/revolution.extension.parallax.min.js')}}"></script>
<script src="{{asset('revolution/js/extensions/revolution.extension.slideanims.min.js')}}"></script>
<script src="{{asset('revolution/js/extensions/revolution.extension.video.min.js')}}"></script>
<!-- map js -->
<script>

         function initMap() {
           var map = new google.maps.Map(document.getElementById('map'), {
             zoom: 11,
             center: {lat: 33.984411, lng: 35.704406},
         styles: [
                  {
                    elementType: 'geometry',
                    stylers: [{color: '#fefefe'}]
                  },
                  {
                    elementType: 'labels.icon',
                    stylers: [{visibility: 'off'}]
                  },
                  {
                    elementType: 'labels.text.fill',
                    stylers: [{color: '#616161'}]
                  },
                  {
                    elementType: 'labels.text.stroke',
                    stylers: [{color: '#f5f5f5'}]
                  },
                  {
                    featureType: 'administrative.land_parcel',
                    elementType: 'labels.text.fill',
                    stylers: [{color: '#bdbdbd'}]
                  },
                  {
                    featureType: 'poi',
                    elementType: 'geometry',
                    stylers: [{color: '#eeeeee'}]
                  },
                  {
                    featureType: 'poi',
                    elementType: 'labels.text.fill',
                    stylers: [{color: '#757575'}]
                  },
                  {
                    featureType: 'poi.park',
                    elementType: 'geometry',
                    stylers: [{color: '#e5e5e5'}]
                  },
                  {
                    featureType: 'poi.park',
                    elementType: 'labels.text.fill',
                    stylers: [{color: '#9e9e9e'}]
                  },
                  {
                    featureType: 'road',
                    elementType: 'geometry',
                    stylers: [{color: '#eee'}]
                  },
                  {
                    featureType: 'road.arterial',
                    elementType: 'labels.text.fill',
                    stylers: [{color: '#3d3523'}]
                  },
                  {
                    featureType: 'road.highway',
                    elementType: 'geometry',
                    stylers: [{color: '#eee'}]
                  },
                  {
                    featureType: 'road.highway',
                    elementType: 'labels.text.fill',
                    stylers: [{color: '#616161'}]
                  },
                  {
                    featureType: 'road.local',
                    elementType: 'labels.text.fill',
                    stylers: [{color: '#9e9e9e'}]
                  },
                  {
                    featureType: 'transit.line',
                    elementType: 'geometry',
                    stylers: [{color: '#e5e5e5'}]
                  },
                  {
                    featureType: 'transit.station',
                    elementType: 'geometry',
                    stylers: [{color: '#000'}]
                  },
                  {
                    featureType: 'water',
                    elementType: 'geometry',
                    stylers: [{color: '#c8d7d4'}]
                  },
                  {
                    featureType: 'water',
                    elementType: 'labels.text.fill',
                    stylers: [{color: '#b1a481'}]
                  }
                ]
         });
         
           var image = 'images/it_service/location_icon_map_cont.png';
           var beachMarker = new google.maps.Marker({
             position: {lat: 40.645037, lng: -73.880224},
             map: map,
             icon: image
           });
         }
      </script>
<!-- google map js -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA8eaHt9Dh5H57Zh0xVTqxVdBFCvFMqFjQ&callback=initMap"></script>
<!-- end google map js -->

</html>


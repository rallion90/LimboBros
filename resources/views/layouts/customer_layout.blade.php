<?php $Helper = new \Helper; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  
  <title>Aroma Shop - Home</title>
    <link rel="icon" href="img/Fevicon.png" type="image/png">
  <link rel="stylesheet" href="{{ asset('customer_vendor/bootstrap/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('customer_vendor/fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('customer_vendor/themify-icons/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('customer_vendor/linericon/style.css') }}">
  <link rel="stylesheet" href="{{ asset('customer_vendor/nice-select/nice-select.css') }}">
  <link rel="stylesheet" href="{{ asset('customer_vendor/owl-carousel/owl.theme.default.min.css') }}">
  <link rel="stylesheet" href="{{ asset('customer_vendor/owl-carousel/owl.carousel.min.css') }}">
  <link rel="stylesheet" href="{{ asset('customer_vendor/nouislider/nouislider.min.css') }}">


  <link rel="stylesheet" href="{{ asset('customer_vendor/css/style.css') }}">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css">
  <meta name="csrf-token" content="{{ csrf_token() }}" />

  <style>
      .info li{
        display: inline;
        color:white;
        padding-right:30px;
      }
  </style>
</head>
<body>
    <div class="text-right" style="background-color: grey">
        <ul class="info">
            <a href="#"><li>Faqs</li></a>
            <a href="#"><li>Customer Care</li></a>
        @if(Auth::guard('customer')->check())
            <a href="#"><li>{{ ucwords(Auth::guard('customer')->user()->customer_fname) }}'s Account</li></a>
        @else
    
        @endif
        </ul>
    </div>
  <!--================ Start Header Menu Area =================-->
    <header class="header_area">
    <div class="main_menu">
      <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
          <a class="navbar-brand logo_h" href="index.html"><img src="img/logo.png" alt=""></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
            <ul class="nav navbar-nav menu_nav ml-auto mr-auto">
              <li class="nav-item active"><a class="nav-link" href="{{ route('customer.index') }}">Home</a></li>
              <li class="nav-item active"><a class="nav-link" href="{{ route('customer.product') }}">Shop</a></li>
              
              <li class="nav-item submenu dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                  aria-expanded="false">Blog</a>
                <ul class="dropdown-menu">
                  <li class="nav-item"><a class="nav-link" href="blog.html">Blog</a></li>
                  <li class="nav-item"><a class="nav-link" href="single-blog.html">Blog Details</a></li>
                </ul>
                            </li>
                            <li class="nav-item submenu dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                  aria-expanded="false">Pages</a>
                <ul class="dropdown-menu">
                  <li class="nav-item"><a class="nav-link" href="{{ route('customer.login') }}">Login</a></li>
                  <li class="nav-item"><a class="nav-link" href="register.html">Register</a></li>
                  <li class="nav-item"><a class="nav-link" href="tracking-order.html">Tracking</a></li>
                </ul>
              </li>
              <li class="nav-item"><a class="nav-link" href="contact.html">Contact</a></li>
            </ul>

            <ul class="nav-shop">
              <li class="nav-item"><a href="{{ route('customer.cart') }}"><i class="ti-search"></i></a></li>
              <li class="nav-item"><a href="{{ route('customer.cart') }}"><i class="ti-shopping-cart"></i><span class="nav-shop__circle">{{ Helper::cart_number() }}</span></a> </li>
              <li class="nav-item"><a class="button button-header"></a></li>
            </ul>
          </div>
        </div>
      </nav>
    </div>
  </header>
    <!--================ End Header Menu Area =================-->

    <div>
      @yield('content')
    </div>  
  


  <!--================ Start footer Area  =================-->  
    <footer class="footer">
        <div class="footer-area">
            <div class="container">
                <div class="row section_gap">
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="single-footer-widget tp_widgets">
                            <h4 class="footer_title large_title">Our Mission</h4>
                            <p>
                                So seed seed green that winged cattle in. Gathering thing made fly you're no 
                                divided deep moved us lan Gathering thing us land years living.
                            </p>
                            <p>
                                So seed seed green that winged cattle in. Gathering thing made fly you're no divided deep moved 
                            </p>
                        </div>
                    </div>
                    <div class="offset-lg-1 col-lg-2 col-md-6 col-sm-6">
                        <div class="single-footer-widget tp_widgets">
                            <h4 class="footer_title">Quick Links</h4>
                            <ul class="list">
                                <li><a href="#">Home</a></li>
                                <li><a href="#">Shop</a></li>
                                <li><a href="#">Blog</a></li>
                                <li><a href="#">Product</a></li>
                                <li><a href="#">Brand</a></li>
                                <li><a href="#">Contact</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-6 col-sm-6">
                        <div class="single-footer-widget instafeed">
                            <h4 class="footer_title">Gallery</h4>
                            <ul class="list instafeed d-flex flex-wrap">
                                <li><img src="img/gallery/r1.jpg" alt=""></li>
                                <li><img src="img/gallery/r2.jpg" alt=""></li>
                                <li><img src="img/gallery/r3.jpg" alt=""></li>
                                <li><img src="img/gallery/r5.jpg" alt=""></li>
                                <li><img src="img/gallery/r7.jpg" alt=""></li>
                                <li><img src="img/gallery/r8.jpg" alt=""></li>
                            </ul>
                        </div>
                    </div>
                    <div class="offset-lg-1 col-lg-3 col-md-6 col-sm-6">
                        <div class="single-footer-widget tp_widgets">
                            <h4 class="footer_title">Contact Us</h4>
                            <div class="ml-40">
                                <p class="sm-head">
                                    <span class="fa fa-location-arrow"></span>
                                    Head Office
                                </p>
                                <p>123, Main Street, Your City</p>
    
                                <p class="sm-head">
                                    <span class="fa fa-phone"></span>
                                    Phone Number
                                </p>
                                <p>
                                    +123 456 7890 <br>
                                    +123 456 7890
                                </p>
    
                                <p class="sm-head">
                                    <span class="fa fa-envelope"></span>
                                    Email
                                </p>
                                <p>
                                    free@infoexample.com <br>
                                    www.infoexample.com
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="footer-bottom">
            <div class="container">
                <div class="row d-flex">
                    <p class="col-lg-12 footer-text text-center">
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
                </div>
            </div>
        </div>
    </footer>
    <!--================ End footer Area  =================-->



  <script src="{{ asset('customer_vendor/jquery/jquery-3.2.1.min.js') }}"></script>
  <script src="{{ asset('customer_vendor/bootstrap/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('customer_vendor/skrollr.min.js') }}"></script>
  <script src="{{ asset('customer_vendor/owl-carousel/owl.carousel.min.js') }}"></script>
  <script src="{{ asset('customer_vendor/nice-select/jquery.nice-select.min.js') }}"></script>
  <script src="{{ asset('customer_vendor/jquery.ajaxchimp.min.js') }}"></script>
  <script src="{{ asset('customer_vendor/mail-script.js') }}"></script>
  <script src="{{ asset('customer_vendor/js/main.js') }}"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script>


</body>
</html>

@if(Session::has('orderSuccess'))
  <script>
    swal({
        text: "{!! Session::get('orderSuccess') !!}",
        title: "Order Success",
        icon: "success",
        showCloseButton: true,

        // more options
    });
  </script>
@elseif(Session::has('addSuccess')) 
  <script>
    swal("Item Added", "{!! Session::get('addSuccess') !!}", "success", {
      buttons: ['Add more Item?', 'Proceed to Checkout'],
    }).then(function(){
      window.location.href="{{ route('customer.checkout') }}";
    });
  </script>   
@endif

<script type="text/javascript">
  function checkout(){
    var terms = document.getElementById("f-option4").checked;

    if(terms){
      if(document.getElementById('f-option5').checked) {
        //validation

        document.getElementById("checkout_form").action = "{{ route('customer.cod') }}";
        document.getElementById("checkout_form").submit();

      }else if(document.getElementById('f-option6').checked) {
        document.getElementById("checkout_form").action = "#paypal_route";
        document.getElementById("checkout_form").submit();
      }else{
        swal({
          icon: "warning",
          title: "Please Choose Payment Option",
        });
      }

    }else{
      alert('Please Read Terms and Condition Before Proceeding to Checkout');
    }

  }

  function emptyCart(){
    swal({
      icon: "warning",
      title: "Empty Cart!",
    });
  }

  function addCartSuccess(){
    swal({
      icon: "warning",
      title: "Empty Cart!",
    });
  }

</script>
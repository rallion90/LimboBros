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


  <link rel="stylesheet" href="{{ asset('customer_vendor/css/main.css') }}">

  <link rel="stylesheet" href="{{ asset('customer_vendor/css/status.css') }}">

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
            <a href="{{ route('customer.orderTracking') }}"><li>Track your Order</li></a>
        @if(Auth::guard('customer')->check())
           

            <li class="dropdown" style="color:white">
              <a  class="dropdown-toggle" role="button" data-toggle="dropdown"  aria-haspopup="true" aria-expanded="false">{{ ucwords(Auth::guard('customer')->user()->customer_fname) }}'s Account</span></a>
              <ul class="dropdown-menu">
                  <ol>My Orders</ol>
                  <ol>Logout</ol>
                  
              </ul>
          </li>
        @else
            <a href="#"><li>Login</li></a>
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
              
              
              <li class="nav-item"><a class="nav-link" href="contact.html">Contact</a></li>
            </ul>

            <ul class="nav-shop">
              <li class="nav-item"><a href="{{ route('customer.cart') }}"><i class="ti-search"></i></a></li>
              <li class="nav-item"><a href="{{ route('customer.cart') }}"><i class="ti-shopping-cart"></i><span class="nav-shop__circle">{{ Helper::cart_number() }}</span></a> </li>
              <li></li>
              <li></li>
              <li></li>
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
                                To Sell Quality Motorcycle Accesories inside and deliver it faster.
                            <p>
                                And i hankyou 
                            </p>
                        </div>
                    </div>
                    <div class="offset-lg-1 col-lg-2 col-md-6 col-sm-6">
                        <div class="single-footer-widget tp_widgets">
                            <h4 class="footer_title">Quick Links</h4>
                            <ul class="list">
                                <li><a href="#">Home</a></li>
                                <li><a href="#">Shop</a></li>
                                <li><a href="#">Contact</a></li>
                                
                            </ul>
                        </div>
                    </div>
                    
                    <div class="offset-lg-1 col-lg-3 col-md-6 col-sm-6">
                        <div class="single-footer-widget tp_widgets">
                            <h4 class="footer_title">Contact Us</h4>
                            <div class="ml-40">
                                <p class="sm-head">
                                    <span class="fa fa-location-arrow"></span>
                                    Shop
                                </p>
                                <p>Maharlika Hiway, Near Caltex, Sariaya Quezon</p>
    
                                <p class="sm-head">
                                    <span class="fa fa-phone"></span>
                                    Phone Number
                                </p>
                                <p>
                                    +63 916 3966 529 <br>
                                    +63 919 3556 609
                                </p>
    
                                <p class="sm-head">
                                    <span class="fa fa-envelope"></span>
                                    Email
                                </p>
                                <p>
                                    iankirbycorcolon@gmail.com <br>
                                    philip.limbo@gmail.com
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        
    </footer>
    <!--================ End footer Area  =================-->



  <script src="{{ asset('customer_vendor/jquery/jquery-3.2.1.min.js') }}"></script>
  <script src="{{ asset('customer_vendor/bootstrap/bootstrap.bundle.min.js') }}"></script>
  <!--<script src="{{ asset('customer_vendor/skrollr.min.js') }}"></script>-->
  <script src="{{ asset('customer_vendor/owl-carousel/owl.carousel.min.js') }}"></script>
  <script src="{{ asset('customer_vendor/nice-select/jquery.nice-select.min.js') }}"></script>
  <script src="{{ asset('customer_vendor/jquery.ajaxchimp.min.js') }}"></script>
  <script src="{{ asset('customer_vendor/mail-script.js') }}"></script>
  <script src="{{ asset('customer_vendor/js/main.js') }}"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script src="https://www.paypalobjects.com/api/checkout.js"></script>
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script>
  
  


</body>
</html>

<script>
  paypal.Button.render({
    env: 'sandbox', // Or 'production'
    style: {
      size: 'medium'
    },
    // Set up the payment:
    // 1. Add a payment callback

    payment: function(data, actions) {
      // 2. Make a request to your server
      return actions.request.post('/customer/payment_create', 
      {
        _token: '{{csrf_token()}}',
        first_name: $('#first').val(),
        last_name: $('#last').val(),
        email: $('#email').val(),
        number: $('#number').val(),
        zipcode: $('#zipcode').val(),
        first_name: $('#first').val(),
        province: $('#province').val(),
        municipality: $('#municipality').val(),
        barangay: $('#barangay').val(),
        street: $('#street').val()
      })
        .then(function(res) {
          // 3. Return res.id from the response

          return res.id;
        });
    },
    // Execute the payment:
    // 1. Add an onAuthorize callback
    onAuthorize: function(data, actions) {
      // 2. Make a request to your server
      return actions.request.post('/customer/payment_execute', {
        _token: '{{csrf_token()}}',
        paymentID: data.paymentID,
        payerID:   data.payerID,
        first_name: $('#first').val(),
        last_name: $('#last').val(),
        email: $('#email').val(),
        province: $('#province').val(),
        municipality: $('#municipality').val(),
        barangay: $('#barangay').val(),
        number: $('#number').val(),
        zipcode: $('#zipcode').val(),
        first_name: $('#first').val(),
        
        street: $('#street').val()
      })
        .then(function(res) {
          window.location.href = "{{ route('customer.index') }}";
        });
    }
  }, '#paypal-button');
</script>

<script>
  $(document).ready(function(){
    $('#municipality').on('change', function(){
      var mun_id = $(this).val();

      if(mun_id){
        $.ajax({
          url: '/customer/barangay/'+mun_id,
          type: 'GET',
          dataType: 'json',
          success: function(data){
            console.log(data);

            $('#barangay').empty();

            $.each(data, function(key, value){
              $('#barangay').append('<option value="'+value+'">'+key+'</option>');
            });

            $('#barangay').niceSelect('update');
          }
        });
      }else{

        $('#barangay').empty();
      }
    });

    $('#province').on('change', function(){
      var prov_id = $(this).val();

      if(prov_id){
        $.ajax({
          url: '/customer/municipality/'+prov_id,
          type: 'GET',
          dataType: 'json',
          success: function(data){
            console.log(data);

            $('#municipality').empty();

            $.each(data, function(key, value){
              $('#municipality').append('<option value="'+value+'">'+key+'</option>');
            });

            $('#municipality').niceSelect('update');
          }

        });
      }else{
        $('#municipality').empty();
        $('#barangay').empty();
      }
    });

    

  });
</script>



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
      window.location.href="{{ route('customer.cart') }}";
    });
  </script>   
@endif

<script type="text/javascript">
  function checkout(){
    var terms = document.getElementById("f-option4").checked;

    if(terms){
      document.getElementById("checkout_form").action = "{{ route('customer.cod') }}";
       
      document.getElementById("checkout_form").submit();
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

  function update(id){
    var quantity = $('#quantity').val();
    $.ajax({
      type: 'POST',
      url: '{{ route("customer.updateCart") }}',
      data: {
        '_token': '{{ csrf_token() }}',
        'id': id,
        'quantity': quantity
      },
      success: function(response){
        location.reload();
        swal({
          text: response,
          title: "Success",
          icon: "success",
          showCloseButton: true,
        });
      }
    });
  }

  function remove(id){
    window.location.href='/customer/removeCart/'+id;
  }

  
</script>







@extends('layouts.customer_layout')

@section('content')


  <!-- breadcrumb start-->
  <section class="breadcrumb breadcrumb_bg">
      <div class="container">
          <div class="row justify-content-center">
              <div class="col-lg-12">
                  <div class="breadcrumb_iner">
                      <div class="breadcrumb_iner_item">
                          <p>Home/Shop/Single product/Cart list</p>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </section>
  <!-- breadcrumb start-->

  <!--================Cart Area =================-->
  <section class="cart_area section_padding">
    <div class="container">
      <div class="cart_inner">
        <div class="table-responsive">
          <table class="table">
            <thead>
              <tr>
                <th scope="col">Product</th>
                <th scope="col">Price</th>
                <th scope="col">Quantity</th>
                <th scope="col">Total</th>
                <th scope="col"></th>
              </tr>
            </thead>
            <tbody> 
              
            @foreach($cart_content as $content)  
              <tr>
                <td>
                  <div class="media">
                    <div class="d-flex">
                      <img src="img/arrivel/arrivel_1.png" alt="" />
                    </div>
                    <div class="media-body">
                      <p>{{ ucwords($content->name) }}</p>
                    </div>
                  </div>
                </td>
                <td>
                  <h5>₱{{ number_format($content->price) }}</h5>
                </td>
                <td>
                  <div class="product_count">
                    <!-- <input type="text" value="1" min="0" max="10" title="Quantity:"
                      class="input-text qty input-number" />
                    <button
                      class="increase input-number-increment items-count" type="button">
                      <i class="ti-angle-up"></i>
                    </button>
                    <button
                      class="reduced input-number-decrement items-count" type="button">
                      <i class="ti-angle-down"></i>
                    </button> -->
                    
                    <input type="number" id="quantity" value="{{ $content->quantity }}">
                    
                  </div>
                </td>
                <td>
                  <h5>₱{{ number_format($content->price * $content->quantity) }}.00</h5>
                </td>
                <td>
                  <td>
                    <a href="#" onclick="update('{{ $content->id }}')" class="btn_1" >Update</a>  <a href="#" onclick="remove('{{ $content->id }}')" class="btn_1" >Remove</a>
                  </td>
                </td>
              </tr>
            @endforeach
              <tr class="bottom_button">
                <td>
                  
                </td>
                <td></td>
                <td></td>
                <td>
                  
                </td>
                <td></td>
                <td></td>
              </tr>
              <tr>
                <td></td>
                <td></td>
                <td>
                  <h5>Subtotal</h5>
                </td>
                <td>
                  <h5>₱{{ number_format(Cart::getSubTotal()) }}.00</h5>
                </td>
                <td></td>
                <td></td>
              </tr>
              <tr class="shipping_area">
                <td></td>
                <td></td>
                <td>
                  
                </td>
                <td></td>
                <td></td>
                <td></td>
              </tr>
           
            </tbody>
          </table>
          <div class="checkout_btn_inner float-right">
            <a class="btn_1" href="#">Continue Shopping</a>
          @if(Auth::guard('customer')->check())
            @if(Cart::isEmpty())
              <a class="btn_1 checkout_btn_1" href="#" onclick="emptyCart()">Proceed to checkout</a>
            @else
              <a class="btn_1 checkout_btn_1" href="{{ route('customer.checkout') }}">Proceed to checkout</a>
            @endif
          @else
            <a class="btn_1 checkout_btn_1" href="{{ route('customer.login') }}">Proceed to checkout</a>
          @endif  
          </div>
        </div>
      </div>
  </section>
  <!--================End Cart Area =================-->

 @endsection 
@extends('layouts.customer_layout')
@section('content')
<?php $Helper = new \Helper; ?>
<!--================Checkout Area =================-->
<section class="checkout_area section-margin--small">
    <div class="container">
        
        <!--<div class="cupon_area">
            <div class="check_title">
                <h2>Have a coupon? <a href="#">Click here to enter your code</a></h2>
            </div>
            <input type="text" placeholder="Enter coupon code">
            <a class="button button-coupon" href="#">Apply Coupon</a>
        </div>-->
        <div class="billing_details">
            <div class="row">
                <div class="col-lg-8">
                    <h3>Billing Details</h3>
                    <form class="row contact_form" name="checkoutForm" id="checkout_form" action="#" method="post">
                        @csrf
                        
                        <div class="col-md-6 form-group p_star">
                            <input type="text" class="form-control" id="first" name="firstname" placeholder="Firstname">
                            <span class="placeholder" data-placeholder="First name"></span>
                            @error('firstname')
                                <span style="color:red"><p>{{ ucwords($message) }}</p></span>
                            @enderror
                        </div>
                        <div class="col-md-6 form-group p_star">
                            <input type="text" class="form-control" id="last" name="lastname" placeholder="Lastname">
                            <span class="placeholder" data-placeholder="Last name"></span>
                            @error('lastname')
                                <span style="color:red"><p>{{ ucwords($message) }}</p></span>
                            @enderror
                        </div>
                        <div class="col-md-4 form-group p_star">
                            <input type="text" class="form-control" id="email" name="email" placeholder="Email">
                            <span class="placeholder" data-placeholder="Phone number"></span>
                            @error('email')
                                <span style="color:red"><p>{{ ucwords($message) }}</p></span>
                            @enderror
                        </div>
                        <div class="col-md-4 form-group p_star">
                            <input type="text" class="form-control" id="number" name="phone" placeholder="Phone Number ex. 09">
                            <span class="placeholder" data-placeholder="Phone number"></span>
                            @error('phone')
                                <span style="color:red"><p>{{ ucwords($message) }}</p></span>
                            @enderror
                        </div>
                        <div class="col-md-4 form-group p_star">
                            <input type="text" class="form-control" id="zipcode" name="zipcode" placeholder="Zip Code">
                            <span class="placeholder" data-placeholder="Email Address"></span>
                            @error('zipcode')
                                <span style="color:red"><p>{{ ucwords($message) }}</p></span>
                            @enderror
                        </div>

                        
                        <div class="col-md-12 form-group p_star">
                            <select name="province" id="province" class="country_select province">
                                <option value="null">Choose Province</option>
                            @foreach($Helper::province() as $province)
                                <option value="{{ $province->provCode }}">{{ $province->provDesc }}</option>
                            @endforeach
                            
                            </select>
                            @error('province')
                                <span style="color:red"><p>{{ ucwords($message) }}</p></span>
                            @enderror
                        </div>

                        <div class="col-md-12 form-group p_star">
                            <select name="municipality" id="municipality" class="country_select municipality">
                               <option value="null">Choose Municipality</option>
                            </select>
                        </div>

                        <div class="col-md-12 form-group p_star">
                            <select name="barangay" id="barangay" class="country_select barangay">
                                <option value="null">Choose Barangay</option>
                            </select>    
                        </div>

                        
                        

                        <div class="col-md-12 form-group p_star">
                            <input type="text" class="form-control" id="street" name="street" placeholder="Street Address">
                            <span class="placeholder" data-placeholder="Address line 01"></span>
                            @error('street')
                                <span style="color:red"><p>{{ ucwords($message) }}</p></span>
                            @enderror
                        </div>

                        <!--hidden orders-->
                        
                       
                        
                    </form>
                </div>
                <div class="col-lg-4">
                    <div class="order_box">
                        <h2>Your Order</h2>
                        <ul class="list">
                            <li><a href="#"><h4>Product <span>Total</span></h4></a></li>
                        @foreach(Cart::getContent() as $cart)    
                            <li><a href="#">{{ ucwords($cart->name) }} <span class="middle">x {{ $cart->quantity }}</span> <span class="last">₱{{ number_format($cart->price) }}.00</span></a></li>
                        @endforeach    
                           
                        </ul>
                        <ul class="list list_2">
                            <li><a href="#">Subtotal <span>₱{{ number_format(Cart::getSubTotal()) }}.00</span></a></li>
                            <li><a href="#">Shipping <span style="color:red">Outside Quezon Distric 1 and 2 will be deducted 150 pesos for shipping fee</span></a></li>
                            <li><a href="#">Total <span>₱{{ number_format(Cart::getTotal()) }}.00</span></a></li>
                        </ul>
                        <div class="payment_item">
                            
                            <p>Buy via Cash on Delivery. *Important Note Cash on delivery dont get any of your important details like credit card.</p>
                        </div>
                        <div class="payment_item active">
                            
                            <p>Pay via PayPal; you can pay with your paypal account if you don’t want to buy on door to door.</p>
                        </div>
                        <div class="creat_account">
                            <input type="checkbox" id="f-option4">
                            <label for="f-option4">I’ve read and accept the </label>
                            <a href="#">terms & conditions*</a>
                        </div>

                        <div class="text-center">
                            <button class="button button-paypal" onclick="checkout()">Cash on Delivery</button>
                        </div>
                        <p class="text-center">Or</p>
                        <div class="text-center">
                            <div id="paypal-button"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================End Checkout Area =================-->
@endsection
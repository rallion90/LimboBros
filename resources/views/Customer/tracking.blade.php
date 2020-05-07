@extends('layouts.customer_layout')
@section('content')

<!--================Tracking Box Area =================-->
  <section class="tracking_box_area section-margin--small">
      <div class="container">
          <div class="tracking_box_inner">
              <p>To track your order please enter your Order Number in the box below and press the "Track" button. This
                  was given to you on your confirmation email you should have received.</p>
                  @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                  @endif
                  @if(Session::has('notFound'))
                    <div class="alert alert-danger">
                        <ul>
                            
                          <li>{{ Session::get('notFound') }}</li>
                            
                        </ul>
                    </div>
                  @endif
              <form class="row tracking_form" action="{{ route('customer.trackingTrigger') }}" method="post" novalidate="novalidate">
                @csrf

                  <div class="col-md-12 form-group">
                      <input type="text" class="form-control" id="order" name="order_number" placeholder="Order ID" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Order ID'">
                  </div>
                  <div class="col-md-12 form-group">
                      <input type="email" class="form-control" id="email" name="email" placeholder="Billing Email Address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Billing Email Address'">
                  </div>
                  <div class="col-md-12 form-group">
                      <button type="submit" value="submit" class="button button-tracking">Track Order</button>
                  </div>
              </form>
          </div>
      </div>
  </section>
  <!--================End Tracking Box Area =================-->

@endsection
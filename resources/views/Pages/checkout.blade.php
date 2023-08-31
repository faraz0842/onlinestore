
@extends('Master.master')
@section('content')
    <!-- Breadcrumb Section Begin -->
    <div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text product-more">
                        <a href="/home"><i class="fa fa-home"></i> Home</a>
                        <a href="/shop">Shop</a>
                        <span>Check Out</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section Begin -->

    <!-- Shopping Cart Section Begin -->
    <section class="checkout-section spad">
        <div class="container">
            <form action="{{Route('thankyou')}}" method="post" class="checkout-form">
            @csrf
                @if (session('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                @endif
                <div class="row">
                    <div class="col-lg-6">
                        {{-- <div class="checkout-content">
                            <a href="#" class="content-btn"><i class="fa fa-google" aria-hidden="true"></i> Login With Google</a>
                        </div> --}}
                        <h4>Biling Details</h4>
                        <div class="row">
                            <div class="col-lg-6">
                                <label for="fir">First Name<span>*</span></label>
                                <input type="text" id="fir" name="first_name">
                                @if ($errors->has('first_name'))
                                    <div class="text-danger">{{ $errors->first('first_name') }}</div>
                                @endif
                            </div>
                            <div class="col-lg-6">
                                <label for="last">Last Name<span>*</span></label>
                                <input type="text" id="last" name="last_name">
                                @if ($errors->has('last_name'))
                                    <div class="text-danger">{{ $errors->first('last_name') }}</div>
                                @endif
                            </div>
                            <div class="col-lg-6">
                                <label for="street">Email<span>*</span></label>
                                <input type="text" id="street" class="street-first" name="email">
                                @if ($errors->has('email'))
                                    <div class="text-danger">{{ $errors->first('email') }}</div>
                                @endif
                            </div>
                            <div class="col-lg-6">
                                <label for="zip">Postcode / ZIP (optional)</label>
                                <input type="text" id="zip" name="zip">
                                @if ($errors->has('zip'))
                                    <div class="text-danger">{{ $errors->first('zip') }}</div>
                                @endif
                            </div>
                            <div class="col-lg-12">
                                <label for="street">Street Address<span>*</span></label>
                                <input type="text" id="street" class="street-first" name="address">
                                @if ($errors->has('address'))
                                    <div class="text-danger">{{ $errors->first('address') }}</div>
                                @endif
                            </div>

                            <div class="col-lg-12">
                                <label for="town">Town / City<span>*</span></label>
                                <input type="text" id="town" name="city">
                                @if ($errors->has('city'))
                                    <div class="text-danger">{{ $errors->first('city') }}</div>
                                @endif
                            </div>

                            <div class="col-lg-6">
                                <label for="phone">Phone<span>*</span></label>
                                <input type="text" id="phone" name="phone">
                                @if ($errors->has('phone'))
                                    <div class="text-danger">{{ $errors->first('phone') }}</div>
                                @endif
                            </div>
                        </div>
                        <div class="order-btn">
                            <button type="submit" class="site-btn place-btn">Place Order</button>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        {{-- <div class="checkout-content">
                            <input type="text" placeholder="Enter Your Coupon Code">
                        </div> --}}
                        <div class="place-order">
                            <h4>Your Order</h4>
                            <div class="order-total">
                                <ul class="order-table">
                                    <li>Product <span>Total</span></li>
                                    @php $sub_total = 0 @endphp
                                    @if(session('cart'))
                                        @foreach(session('cart') as $id => $details)
                                            @php $sub_total += $details['price'] * $details['quantity'] @endphp

                                    <li class="fw-normal"><img src="{{URL::asset($details['image'])}}" width="50" height="50" class="img-responsive"/> X {{ $details['quantity'] }} <span>{{ $details['price'] * $details['quantity'] }}</span></li>
                                    @endforeach
                                    @endif
                                    <li class="total-price">Subtotal <span>PKR {{ $sub_total }}</span></li>

                                    <li class="total-price">Total <span>PKR {{ $sub_total+150 }}</span></li>

                                    <input type="hidden"  value="{{$sub_total}}" name="sub_total">
                                </ul>
                                {{-- <div class="payment-check">
                                    <div class="pc-item">
                                        <label for="pc-check">
                                            Cash on delivery
                                            <input type="checkbox" id="pc-check">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <div class="pc-item">
                                        <label for="pc-paypal">
                                            Bank transfer
                                            <input type="checkbox" id="pc-paypal">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                </div> --}}

                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
    <!-- Shopping Cart Section End -->
    @endsection

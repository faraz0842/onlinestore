@extends('Master.master')
@section('content')

    <!-- Breadcrumb Section Begin -->
    <div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text product-more">
                        <a href="/usertheme"><i class="fa fa-home"></i> Home</a>
                        <a href="/shop">Shop</a>
                        <span>Shopping Cart</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section Begin -->

    <!-- Shopping Cart Section Begin -->
    <section class="shopping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <form action="" method="post">
                        <div class="cart-table">
                            <table>
                                <thead>
                                    <tr>
                                        <th style="width:50%">Product</th>
                                        <th style="width:10%">Price</th>
                                        <th style="width:8%">Quantity</th>
                                        <th style="width:22%" class="text-center">Subtotal</th>
                                        <th style="width:10%"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $sub_total = 0 @endphp
                                    @if(session('cart'))
                                        @foreach(session('cart') as $id => $details)
                                            @php $sub_total += $details['price'] * $details['quantity'] @endphp
                                            <tr data-id="{{ $id }}">
                                                <td data-th="Product">
                                                    <div class="row">
                                                        <div class="col-sm-3 hidden-xs"><img src="{{$details['image']}}" width="100" height="100" class="img-responsive"/></div>
                                                        <div class="col-sm-9" style="display: flex; justify-content: center; align-items: center">
                                                            <h5 class="nomargin">{{ $details['product_name'] }}</h5>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td data-th="Price">${{ $details['price'] }}</td>
                                                <td data-th="Quantity">
                                                    <input type="number" value="{{ $details['quantity'] }}"  class="form-control quantity update-cart" />
                                                </td>
                                                <td data-th="Subtotal" class="text-center">{{ $details['price'] * $details['quantity'] }}</td>
                                                <td class="actions" data-th="">
                                                    <button class="btn btn-danger btn-sm remove-from-cart"><i class="fa fa-trash-o"></i></button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                                <tfoot>
                                    {{-- <tr>
                                        <td colspan="5" class="text-right"><h3><strong>Total ${{ $sub_total }}</strong></h3></td>
                                    </tr> --}}
                                    <tr>
                                        <td colspan="5" class="text-right cart-buttons">
                                            <a href="{{ url('/home') }}" class="primary-btn continue-shop"><i class="fa fa-angle-left"></i> Continue Shopping</a>
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </form>
                    <div class="row">
                        <div class="col-lg-4">
                            {{-- <div class="discount-coupon">
                                <h6>Discount Codes</h6>
                                <form action="#" class="coupon-form">
                                    <input type="text" placeholder="Enter your codes">
                                    <button type="submit" class="site-btn coupon-btn">Apply</button>
                                </form>
                            </div> --}}
                        </div>
                        <div class="col-lg-4 offset-lg-4">
                            <div class="proceed-checkout">
                                <ul>
                                    <li class="subtotal">Subtotal :<span>PKR {{ $sub_total }}</span></li>
                                    <li class="subtotal">Shipping(Only Local Shipment) <h5>PKR 150</h5></li>
                                    <li class="cart-total">Total :<span>PKR {{ $sub_total+150 }}</span></li>
                                </ul>
                                <a href="{{Route('checkout')}}" class="proceed-btn">PROCEED TO CHECK OUT</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shopping Cart Section End -->

@endsection



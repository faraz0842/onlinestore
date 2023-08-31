@extends('Master.master')
@section('content')

    <!-- Breadcrumb Section Begin -->
    <div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <a href="/home"><i class="fa fa-home"></i> Home</a>
                        <span>Women</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section Begin -->
@if (session('success'))
            <div class="text-center mt-3 d-flex justify-content-center">
                <div class="alert alert-success" style="width: 50%;">
                    <a href="#" class="close" data-dismiss="alert">&times;</a>
                    {{ session('success') }}
                </div>
            </div>
            @endif
    <!-- Swiper -->
    <div class="swiper mySwiper">
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <img src="{{ asset('User/img/banner-4.jpg') }}" alt="" style="padding: 10px; height: 80vh;">
            </div>
            <div class="swiper-slide">
                <img src="{{ asset('User/img/268115_10151440305233864_1311094699_n.jpg') }}" alt=""
                    style="padding: 10px; height: 80vh;">
            </div>
            <div class="swiper-slide">
                <img src="{{ asset('User/img/Untitled-1.jpg') }}" alt="" style="padding: 10px; height: 80vh;">
            </div>
        </div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
    </div>

    <!-- Product Shop Section Begin -->
    <section class="product-shop spad">
        <div class="container">
            <div style="border-bottom: black 1px solid; margin-bottom: 15px; display: flex; justify-content: center">
                <h3 style="color: #dfad51">Dress Section</h3>
            </div>

            <div class="row">
                @foreach ($women_cloth as $item)
                <div class="col-lg-3 col-sm-6">

                    <div class="product-item">
                        <div class="pi-pic">
                            <img src="{{ URL::asset($item->product_image_path.$item->product_image_name) }}" style="height: 350px;" alt="Women's Img">
                            <ul>
                                <li class="w-icon active"><a href="{{ route('add.to.cart', $item->product_id) }}"><i class="fa fa-shopping-cart"></i></a></li>
                                <li class="quick-view"><a href="{{Route('user.product.detail', $item->product_id)}}">+ Quick View</a></li>
                            </ul>
                        </div>
                        <div class="pi-text">
                            <div class="catagory-name">{{$item->cat_name}}</div>
                            <a href="#">
                                <h5>{{$item->product_name}}</h5>
                            </a>
                            <div class="product-price">
                                {{$item->price}}
                                {{-- <span>$35.00</span> --}}
                            </div>
                        </div>
                    </div>

                </div>
                @endforeach
            </div>

            <div style="border-bottom: black 1px solid; margin: 25px 0px; display: flex; justify-content: center">
                <h3 style="color: #dfad51">Handbags Section</h3>
            </div>
                <div class="row">
                @foreach ($women_bag as $women_bags)
                <div class="col-lg-4 col-sm-6">
                    <div class="product-item">
                        <div class="pi-pic">
                            <img src="{{ URL::asset($women_bags->product_image_path.$women_bags->product_image_name) }}" style="height: 350px;" alt="Women's Img">
                            <ul>
                                <li class="w-icon active"><a href="{{ route('add.to.cart', $women_bags->product_id) }}"><i class="fa fa-shopping-cart"></i></a></li>
                                <li class="quick-view"><a href="{{Route('user.product.detail', $women_bags->product_id)}}">+ Quick View</a></li>
                            </ul>
                        </div>
                        <div class="pi-text">
                            <div class="catagory-name">{{$women_bags->cat_name}}</div>
                            <a href="#">
                                <h5>{{$women_bags->product_name}}</h5>
                            </a>
                            <div class="product-price">
                                {{$women_bags->price}}
                                {{-- <span>$35.00</span> --}}
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                </div>

                <div style="border-bottom: black 1px solid; margin: 25px 0px; display: flex; justify-content: center">
                    <h3 style="color: #dfad51">Accessories Section</h3>
                </div>
                <div class="row">
                    @foreach ($women_accessories as $items)
                <div class="col-lg-3 col-sm-6">
                    <div class="product-item">
                        <div class="pi-pic">
                            <img src="{{ URL::asset($items->product_image_path.$items->product_image_name) }}" style="height: 350px;" alt="Women's Img">
                            <ul>
                                <li class="w-icon active"><a href="{{ route('add.to.cart', $items->product_id) }}"><i class="fa fa-shopping-cart"></i></a></li>
                                <li class="quick-view"><a href="{{Route('user.product.detail', $items->product_id)}}">+ Quick View</a></li>
                            </ul>
                        </div>
                        <div class="pi-text">
                            <div class="catagory-name">{{$items->cat_name}}</div>
                            <a href="#">
                                <h5>{{$items->product_name}}</h5>
                            </a>
                            <div class="product-price">
                                {{$items->price}}
                                {{-- <span>$35.00</span> --}}
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                </div>

                <div style="border-bottom: black 1px solid; margin: 25px 0px; display: flex; justify-content: center">
                    <h3 style="color: #dfad51">Shoes Section</h3>
                </div>
                    <div class="row">
                        @foreach ($women_shoe as $women_shoes)
                    <div class="col-lg-4 col-sm-6">
                        <div class="product-item">
                            <div class="pi-pic">
                                <img src="{{ URL::asset($women_shoes->product_image_path.$women_shoes->product_image_name) }}" style="height: 350px;" alt="Women's Img">
                                <div class="icon">
                                    <i class="icon_heart_alt"></i>
                                </div>
                                <ul>
                                    <li class="w-icon active"><a href="{{ route('add.to.cart', $women_shoes->product_id) }}"><i class="fa fa-shopping-cart"></i></a></li>
                                    <li class="quick-view"><a href="{{Route('user.product.detail', $women_shoes->product_id)}}">+ Quick View</a></li>
                                </ul>
                            </div>
                            <div class="pi-text">
                                <div class="catagory-name">{{$women_shoes->cat_name}}</div>
                                <a href="#">
                                    <h5>{{$women_shoes->product_name}}</h5>
                                </a>
                                <div class="product-price">
                                    {{$women_shoes->price}}
                                    {{-- <span>$35.00</span> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    </div>

        </div>
    </section>
    <!-- Product Shop Section End -->
    <!-- Initialize Swiper -->
    <script>
        var swiper = new Swiper(".mySwiper", {
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
        });
    </script>
@endsection

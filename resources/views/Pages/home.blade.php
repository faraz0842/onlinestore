@extends('Master.master')
@section('content')

@if (session('success'))
            <div class="text-center mt-3 d-flex justify-content-center">
                <div class="alert alert-success" style="width: 50%;">
                    <a href="#" class="close" data-dismiss="alert">&times;</a>
                    {{ session('success') }}
                </div>
            </div>
            @endif
    <!-- Hero Section Begin -->
    <section class="hero-section">
        <div class="hero-items owl-carousel">
            <div class="single-hero-items set-bg" data-setbg="{{ asset('User/img/hero-1.jpg') }}">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-5">
                            <span>Bag,kids</span>
                            <h1>Black friday</h1>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                incididunt ut labore et dolore</p>
                            <a href="#" class="primary-btn">Shop Now</a>
                        </div>
                    </div>
                    <div class="off-card">
                        <h2>Sale <span>50%</span></h2>
                    </div>
                </div>
            </div>
            <div class="single-hero-items set-bg" data-setbg="{{ asset('User/img/hero-2.jpg') }}">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-5">
                            <span>Bag,kids</span>
                            <h1>Black friday</h1>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                incididunt ut labore et dolore</p>
                            <a href="#" class="primary-btn">Shop Now</a>
                        </div>
                    </div>
                    <div class="off-card">
                        <h2>Sale <span>50%</span></h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->

    <!-- Banner Section Begin -->
    <div class="banner-section spad">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-4">
                    <div class="single-banner">
                        <img src="{{ asset('User/img/banner-1.jpg') }}" alt="">
                        <div class="inner-text">
                            <h4>Men’s</h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="single-banner">
                        <img src="{{ asset('User/img/banner-2.jpg') }}" alt="">
                        <div class="inner-text">
                            <h4>Women’s</h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="single-banner">
                        <img src="{{ asset('User/img/banner-3.jpg') }}" alt="">
                        <div class="inner-text">
                            <h4>Kid’s</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Banner Section End -->

    <!-- Women Banner Section Begin -->
    <section class="women-banner spad">
        <div class="section-title">
            <h2>Women's Section</h2>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3">
                    <div class="product-large set-bg" data-setbg="{{ asset('User/img/products/women-large.jpg') }}">
                        <h2>Women’s</h2>
                        <a href="{{Route('women')}}">Discover More</a>
                    </div>
                </div>
                <div class="col-lg-8 offset-lg-1">
                    <div class="filter-control">
                        <ul>
                            <div class="tab">
                                <li onclick="openCity(event, 'Cloth')" id="defaultOpen" class="tablinks active">Clothings
                                </li>
                                <li onclick="openCity(event, 'London')" class="tablinks">HandBag</li>
                                <li onclick="openCity(event, 'Paris')" class="tablinks">Shoes</li>
                                <li class="tablinks" onclick="openCity(event, 'Tokyo')">Accessories</li>
                            </div>
                        </ul>
                    </div>

                    <div id="Cloth" class="tabcontent active">
                        <div class="product-slider owl-carousel">
                            @foreach ($women_cloth as $item)
                            <div class="product-item active">
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
                                        RS. {{$item->price}}
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>

                    <div id="London" class="tabcontent">
                        <div class="product-slider owl-carousel">
                            @foreach ($women_bag as $items)
                            <div class="product-item">
                                <div class="pi-pic">
                                    <img src="{{ URL::asset($items->product_image_path.$items->product_image_name) }}" style="height: 350px;" alt="">
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
                                        RS. {{$items->price}}
                                        {{-- <span>$35.00</span> --}}
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div id="Paris" class="tabcontent">
                        <div class="product-slider owl-carousel">
                            @foreach ($women_shoe as $women_shoes)
                            <div class="product-item">
                                <div class="pi-pic">
                                    <img src="{{ URL::asset($women_shoes->product_image_path.$women_shoes->product_image_name) }}" style="height: 350px;" alt="">
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
                                        RS. {{$women_shoes->price}}
                                        {{-- <span>$35.00</span> --}}
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div id="Tokyo" class="tabcontent">
                        <div class="product-slider owl-carousel">
                            @foreach ($women_accessories as $women_accessoriess)
                            <div class="product-item">
                                <div class="pi-pic">
                                    <img src="{{ URL::asset($women_accessoriess->product_image_path.$women_accessoriess->product_image_name) }}" style="height: 350px;" alt="">
                                    <ul>
                                        <li class="w-icon active"><a href="{{ route('add.to.cart', $women_accessoriess->product_id) }}"><i class="fa fa-shopping-cart"></i></a></li>
                                        <li class="quick-view"><a href="{{Route('user.product.detail', $women_accessoriess->product_id)}}">+ Quick View</a></li>
                                    </ul>
                                </div>
                                <div class="pi-text">
                                    <div class="catagory-name">{{$women_accessoriess->cat_name}}</div>
                                    <a href="#">
                                        <h5>{{$women_accessoriess->product_name}}</h5>
                                    </a>
                                    <div class="product-price">
                                        RS. {{$women_accessoriess->price}}
                                        {{-- <span>$35.00</span> --}}
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Women Banner Section End -->

    <!-- Man Banner Section Begin -->
    <section class="man-banner spad">
        <div class="section-title">
            <h2>Men's Section</h2>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8">
                    <div class="filter-control">
                        <ul>
                            <div class="tab">
                                <li onclick="openMen(event, 'MenCloth')" id="mendefaultOpen" class="tablinksmen active">Clothings</li>
                                <li onclick="openMen(event, 'Perfumes')" class="tablinks">Perfumes</li>
                                <li onclick="openMen(event, 'shoes')" class="tablinks">Shoes</li>
                            </div>
                        </ul>
                    </div>
                    <div id="MenCloth" class="tabcontentmen active">
                        <div class="product-slider owl-carousel">
                            @foreach ($men_cloth as $men_cloths)
                            <div class="product-item active">
                                <div class="pi-pic">
                                    <img src="{{ URL::asset($men_cloths->product_image_path.$men_cloths->product_image_name) }}" style="height: 350px;" alt="">
                                    <ul>
                                        <li class="w-icon active"><a href="{{ route('add.to.cart', $men_cloths->product_id) }}"><i class="fa fa-shopping-cart"></i></a></li>
                                        <li class="quick-view"><a href="{{Route('user.product.detail', $men_cloths->product_id)}}">+ Quick View</a></li>
                                    </ul>
                                </div>
                                <div class="pi-text">
                                    <div class="catagory-name">{{$men_cloths->cat_name}}</div>
                                    <a href="#">
                                        <h5>{{$men_cloths->product_name}}</h5>
                                    </a>
                                    <div class="product-price">
                                        RS. {{$men_cloths->price}}
                                        {{-- <span>$35.00</span> --}}
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div id="Perfumes" class="tabcontentmen">
                        <div class="product-slider owl-carousel">
                            @foreach ($men_perfume as $men_perfumes)
                            <div class="product-item">
                                <div class="pi-pic">
                                    <img src="{{ URL::asset($men_perfumes->product_image_path.$men_perfumes->product_image_name) }}" style="height: 350px;" alt="">
                                    <ul>
                                        <li class="w-icon active"><a href="{{ route('add.to.cart', $men_perfumes->product_id) }}"><i class="fa fa-shopping-cart"></i></a></li>
                                        <li class="quick-view"><a href="{{Route('user.product.detail', $men_perfumes->product_id)}}">+ Quick View</a></li>
                                    </ul>
                                </div>
                                <div class="pi-text">
                                    <div class="catagory-name">{{$men_perfumes->cat_name}}</div>
                                    <a href="#">
                                        <h5>{{$men_perfumes->product_name}}</h5>
                                    </a>
                                    <div class="product-price">
                                        {{$men_perfumes->price}}
                                        {{-- <span>$35.00</span> --}}
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div id="shoes" class="tabcontentmen">
                        <div class="product-slider owl-carousel">
                            @foreach ($men_shoe as $men_shoes)
                            <div class="product-item">
                                <div class="pi-pic">
                                    <img src="{{ URL::asset($men_shoes->product_image_path.$men_shoes->product_image_name) }}" style="height: 350px;" alt="">
                                    <ul>
                                        <li class="w-icon active"><a href="{{ route('add.to.cart', $men_shoes->product_id) }}"><i class="fa fa-shopping-cart"></i></a></li>
                                        <li class="quick-view"><a href="{{Route('user.product.detail', $men_shoes->product_id)}}">+ Quick View</a></li>
                                    </ul>
                                </div>
                                <div class="pi-text">
                                    <div class="catagory-name">{{$men_shoes->cat_name}}</div>
                                    <a href="#">
                                        <h5>{{$men_shoes->product_name}}</h5>
                                    </a>
                                    <div class="product-price">
                                        {{$men_shoes->price}}
                                        {{-- <span>$35.00</span> --}}
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 offset-lg-1">
                    <div class="product-large set-bg m-large"
                        data-setbg="{{ asset('User/img/products/man-large.jpg') }}">
                        <h2>Men’s</h2>
                        <a href="{{Route('men')}}">Discover More</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Man Banner Section End -->

<!-- Kid Banner Section Begin -->
    <section class="women-banner spad">
        <div class="section-title">
            <h2>Kid's Section</h2>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3">
                    <div class="product-large set-bg" data-setbg="{{ asset('User/img/products/kids-large.jpg') }}">
                        <h2>Kid's</h2>
                        <a href="{{Route('kid')}}">Discover More</a>
                    </div>
                </div>
                <div class="col-lg-8 offset-lg-1">
                    <div class="filter-control">
                        <ul>
                            <div class="tab">
                                <li onclick="openkid(event, 'kidCloth')" id="kiddefaultOpen" class="tablinkskid active">Clothings
                                </li>
                                <li onclick="openkid(event, 'kidShoes')" class="tablinkskid">Shoes</li>
                                <li class="tablinkskid" onclick="openkid(event, 'kidAccessories')">Accessories</li>
                            </div>
                        </ul>
                    </div>
                    <div id="kidCloth" class="tabcontentkid active">
                        <div class="product-slider owl-carousel">
                            @foreach ($kid_cloth as $kid_cloths)
                            <div class="product-item active">
                                <div class="pi-pic">
                                    <img src="{{ URL::asset($kid_cloths->product_image_path.$kid_cloths->product_image_name) }}" style="height: 350px;" alt="">
                                    <ul>
                                        <li class="w-icon active"><a href="{{ route('add.to.cart', $kid_cloths->product_id) }}"><i class="fa fa-shopping-cart"></i></a></li>
                                        <li class="quick-view"><a href="{{Route('user.product.detail', $kid_cloths->product_id)}}">+ Quick View</a></li>
                                    </ul>
                                </div>
                                <div class="pi-text">
                                    <div class="catagory-name">{{$kid_cloths->cat_name}}</div>
                                    <a href="#">
                                        <h5>{{$kid_cloths->product_name}}</h5>
                                    </a>
                                    <div class="product-price">
                                       RS. {{$kid_cloths->price}}
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div id="kidShoes" class="tabcontentkid">
                        <div class="product-slider owl-carousel">
                            @foreach ($kid_shoe as $kid_shoes)
                            <div class="product-item">
                                <div class="pi-pic">
                                    <img src="{{ URL::asset($kid_shoes->product_image_path.$kid_shoes->product_image_name) }}" style="height: 350px;" alt="">
                                    <ul>
                                        <li class="w-icon active"><a href="{{ route('add.to.cart', $kid_shoes->product_id) }}"><i class="fa fa-shopping-cart"></i></a></li>
                                        <li class="quick-view"><a href="{{Route('user.product.detail', $kid_shoes->product_id)}}">+ Quick View</a></li>
                                    </ul>
                                </div>
                                <div class="pi-text">
                                    <div class="catagory-name">{{$kid_shoes->cat_name}}</div>
                                    <a href="#">
                                        <h5>{{$kid_shoes->product_name}}</h5>
                                    </a>
                                    <div class="product-price">
                                        RS. {{$kid_shoes->price}}
                                        {{-- <span>$35.00</span> --}}
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div id="kidAccessories" class="tabcontentkid">
                        <div class="product-slider owl-carousel">
                            @foreach ($kid_accessory as $accessories)
                            <div class="product-item">
                                <div class="pi-pic">
                                    <img src="{{ URL::asset($accessories->product_image_path.$accessories->product_image_name) }}" style="height: 350px;" alt="">
                                    <ul>
                                        <li class="w-icon active"><a href="{{ route('add.to.cart', $accessories->product_id) }}"><i class="fa fa-shopping-cart"></i></a></li>
                                        <li class="quick-view"><a href="{{Route('user.product.detail', $accessories->product_id)}}">+ Quick View</a></li>
                                    </ul>
                                </div>
                                <div class="pi-text">
                                    <div class="catagory-name">{{$accessories->cat_name}}</div>
                                    <a href="#">
                                        <h5>{{$accessories->product_name}}</h5>
                                    </a>
                                    <div class="product-price">
                                        RS. {{$accessories->price}}
                                        {{-- <span>$35.00</span> --}}
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Kid Banner Section End -->

    <!-- Instagram Section Begin -->
    <div class="instagram-photo mb-2">
        <div class="insta-item set-bg" data-setbg="{{ asset('User/img/insta-1.jpg') }}">
            <div class="inside-text">
                <i class="ti-instagram"></i>
                <h5><a href="#">colorlib_Collection</a></h5>
            </div>
        </div>
        <div class="insta-item set-bg" data-setbg="{{ asset('User/img/insta-2.jpg') }}">
            <div class="inside-text">
                <i class="ti-instagram"></i>
                <h5><a href="#">colorlib_Collection</a></h5>
            </div>
        </div>
        <div class="insta-item set-bg" data-setbg="{{ asset('User/img/insta-3.jpg') }}">
            <div class="inside-text">
                <i class="ti-instagram"></i>
                <h5><a href="#">colorlib_Collection</a></h5>
            </div>
        </div>
        <div class="insta-item set-bg" data-setbg="{{ asset('User/img/insta-4.jpg') }}">
            <div class="inside-text">
                <i class="ti-instagram"></i>
                <h5><a href="#">colorlib_Collection</a></h5>
            </div>
        </div>
        <div class="insta-item set-bg" data-setbg="{{ asset('User/img/insta-5.jpg') }}">
            <div class="inside-text">
                <i class="ti-instagram"></i>
                <h5><a href="#">colorlib_Collection</a></h5>
            </div>
        </div>
        <div class="insta-item set-bg" data-setbg="{{ asset('User/img/insta-6.jpg') }}">
            <div class="inside-text">
                <i class="ti-instagram"></i>
                <h5><a href="#">colorlib_Collection</a></h5>
            </div>
        </div>
    </div>
    <!-- Instagram Section End -->

    </section>
    <script>
        function openCity(evt, cityName) {
            var i, tabcontent, tablinks;
            tabcontent = document.getElementsByClassName("tabcontent");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }
            tablinks = document.getElementsByClassName("tablinks");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" active", "");
            }
            document.getElementById(cityName).style.display = "block";
            evt.currentTarget.className += " active";
        }
    </script>
    <script>
        function openMen(evt, cityName) {
            var i, tabcontent, tablinks;
            tabcontent = document.getElementsByClassName("tabcontentmen");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }
            tablinks = document.getElementsByClassName("tablinksmen");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" active", "");
            }
            document.getElementById(cityName).style.display = "block";
            evt.currentTarget.className += " active";
        }
    </script>
    <script>
        function openkid(evt, cityName) {
            var i, tabcontent, tablinks;
            tabcontent = document.getElementsByClassName("tabcontentkid");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }
            tablinks = document.getElementsByClassName("tablinkskid");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" active", "");
            }
            document.getElementById(cityName).style.display = "block";
            evt.currentTarget.className += " active";
        }
    </script>

@endsection

@section('script')

<script>
     $(document).ready(function(e) {



    });

</script>

@endsection

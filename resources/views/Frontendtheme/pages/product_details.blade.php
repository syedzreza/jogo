@extends('Frontendtheme.layouts.master')

@section('content')

<div class="container">
    <div class="breadcrumb-wrapper">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">


                <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>


                <li class="breadcrumb-item"><a href="product-listing.html">All products</a></li>

                <li class="breadcrumb-item active" aria-current="page">product details</li>


            </ol>
        </nav>
    </div>
</div>

<!-- product-details page  -->
<section class="product-details">
    <div class="container">
        <div class="p-details">
            <div class="row">
                <div class="col-md-6 ">
                    <div class="left-side">
                        @if(!empty($productsimage))
                        <div id="custCarousel" class="carousel slide" data-ride="carousel">
                            <!-- slides -->
                            <div class="carousel-inner">
                                @foreach($productsimage as $key => $productsimg)
                                <div class="carousel-item {{ $key ? '' : 'active' }}"><img  class="image1 myimage" src="{{url('/')}}/Product/images/{{$productsimg->images}}" data-zoom-image="{{url('/')}}/Product/images/{{$productsimg->images}}"> </div>
                                @endforeach
                            </div>

                            <!-- Thumbnails -->
                            <ol class="carousel-indicators list-inline">

                                    @foreach($productsimage as $key => $productsimg)
                                <li class="list-inline-item {{ $key ? '' : 'active' }}"> <a id="carousel-selector-{{$loop->index}}" {{ $key ? '' : new Illuminate\Support\HtmlString('class="selected"') }}  data-slide-to="{{$loop->index}}" data-target="#custCarousel">
                                        <img src="{{url('/')}}/Product/images/{{$productsimg->images}}" class="img-fluid"> </a> </li>
                                    @endforeach

                            </ol>
                        </div>
                        @endif
                        <ul class="cart-buy">
                            <li>
                                <form class="form-horizontal qtyFrm" action="" method="post">
                                    <input type="hidden" name="product_id" id="pro_id" value="{{$productdetails->id}}">
                                    <button type="button" class="btn1" id="addcart" style="">Add to Cart <i data-feather="shopping-cart"></i></button>
                                </form>
                            </li>
                            <li>
                                <form class="form-horizontal qtyFrm" action="" method="">
                                    <a href="{{route('home')}}" type="button" class="btn1" style="">SHOP NOW</a>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="products">
                        <h2>{{$productdetails->product_name}}</h2>
                        <div class="price">
                            <h4>Price : <span>₦ {{$productdetails->regular_price}}</span></h4>
                            <h4>Our Price : <span>₦ {{$productdetails->sale_price}}</span></h4>
                            @php $save = $productdetails->regular_price - $productdetails->sale_price @endphp
                            <h5>You Save : <span>₦ {{$save}}</span></h5>
                        </div>
                        {{--<p>Size</p>--}}
                        {{--<ul class="select-value gap">--}}
                            {{--<li>--}}
                                {{--<a href="#">S</a>--}}
                            {{--</li>--}}
                            {{--<li>--}}
                                {{--<a href="#">M</a>--}}
                            {{--</li>--}}
                            {{--<li>--}}
                                {{--<a href="#">L</a>--}}
                            {{--</li>--}}
                            {{--<li>--}}
                                {{--<a href="#">XL</a>--}}
                            {{--</li>--}}
                            {{--<li class="active">--}}
                                {{--<a href="#">XXL</a>--}}
                            {{--</li>--}}
                        {{--</ul>--}}
                        {{--<p>colour</p>--}}
                        {{--<div class="color-area gap">--}}
                            {{--<a href="#" class="color color1"></a>--}}
                            {{--<a href="#" class="color color2"></a>--}}
                            {{--<a href="#" class="color color3"></a>--}}
                            {{--<a href="#" class="color color4"></a>--}}
                            {{--<a href="#" class="active color color5"></a>--}}
                        {{--</div>--}}

                        {{--<div class="accordion" id="accordionExample">--}}
                            {{--<div class="card1">--}}
                                {{--<div class="card-header" id="headingOne">--}}
                                    {{--<h2 class="mb-0">--}}
                                        {{--<button class="text-left" type="button" data-toggle="collapse" data-target="#collapseOne"--}}
                                                {{--aria-expanded="true" aria-controls="collapseOne">--}}
                                            {{--product details--}}

                                        {{--</button>--}}
                                        {{--<i data-feather="chevron-down"></i>--}}
                                    {{--</h2>--}}
                                {{--</div>--}}

                                {{--<div id="collapseOne" class="collapse show" aria-labelledby="headingOne"--}}
                                     {{--data-parent="#accordionExample">--}}
                                    {{--<div class="card-body">--}}
                                        {{--<ul>--}}
                                            {{--<li>--}}
                                                {{--<h6>color <span>black</span></h6>--}}
                                                {{--<h6>fabric <span>cotton</span></h6>--}}
                                                {{--<h6>pack of <span>1</span></h6>--}}
                                                {{--<h6>ideal for <span>male</span></h6>--}}
                                                {{--<h6>care instruction <span>Machine-wash</span></h6>--}}
                                            {{--</li>--}}
                                        {{--</ul>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        <div class="delivery-area">
                            <div class="row">
                                {{--<div class="col-md-5">--}}
                                    {{--<p><i data-feather="map-pin"></i>Deliver to</p>--}}
                                    {{--<div class="dropdown">--}}
                                        {{--<a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown"--}}
                                           {{--aria-expanded="false">--}}
                                            {{--Deliver to 00000--}}
                                        {{--</a>--}}

                                        {{--<div class="dropdown-menu" aria-labelledby="dropdownMenuLink">--}}
                                            {{--<a class="dropdown-item" href="#">saved address</a>--}}

                                            {{--<a class="dropdown-item" href="#">--}}
                                                {{--<input type="text" class="form-control" id="exampleFormControlInput1"--}}
                                                       {{--placeholder="enter pincode">--}}
                                                {{--<span>check</span>--}}
                                            {{--</a>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                    {{--<h6>Delivery by Tomorrow, Sunday <span>$5</span></h6>--}}
                                {{--</div>--}}
                                <div class="col-md-7">
                                    <div class="service">
                                        <p>Services</p>
                                        <ul>
                                            <li><i data-feather="dollar-sign"></i>
                                                <p>pay on delivery is available</p>
                                            </li>
                                            <li><i data-feather="repeat"></i>
                                                <p>easy 15 days return & exchange available</p>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>

<!-- similar procuct section  -->
<section class="catergory-section similar-product">
    <div class="container">
        <h3>similar product</h3>
        <a href="#">
            <h5>view more</h5>
        </a>
        <div class="row">
            @foreach($relate_products as $relate_product)
                <div class="col-md-3">
                    <a href="{{route('productdetails',$relate_product->slug)}}">
                        <div class="category">
                            <div class="image">
                                <img src={{url('/')}}/Product/image/{{$relate_product->product_image}}  alt="" style="object-fit: cover">
                            </div>
                            <div class="details">
                                <div class="left">
                                    <h4>{{$relate_product->product_name}}</h4>
                                    {{--<p>24 Products</p>--}}
                                </div>
                                <div class="right">
                                    <i data-feather="arrow-right"></i>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</section>

<script>
    $(document).ready(function () {
        $('#addcart').on('click',function () {
            var pro = $('#pro_id').val();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                method: "POST",
                url: "{{route('cartsave')}}",
                data: {
                    'product_id': pro
                },
                success: function (response) {
                    swal.fire(response.msg);
                }
            })
        })
    })
</script>

<!-- similar procuct section  end  -->

<!-- product-details page end -->
 @endsection

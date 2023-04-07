@extends('Frontendtheme.layouts.master')

@section('content')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>
    <style>
        .cart .price-details .size-qty .qty .decreases  {
            /*background-color: white;*/
            /*background-color: black;*/
            /*cursor: pointer;*/
            /*display: inline-block;*/
            /*vertical-align: top;*/
            width: 24px;
            /*width:8%;*/
            height: 24px;
            /*border: 10px solid #ced4da;*/
            /*text-align: center;*/
            /*border-radius: 23%;*/
            /*background-clip: padding-box;*/
            margin-top: 5px;
        }
        .cart .price-details .size-qty .qty .increases {
            /*background-color: black;*/
            /*cursor: pointer;*/
            /*display: inline-block;*/
            /*vertical-align: top;*/
            width: 24px;
            height: 24px;
            /*border: 10px solid #ced4da;*/
            /*text-align: center;*/
            /*border-radius: 23%;*/
            margin-top: 5px;
        }
        .cart .price-details .size-qty .qty .count {
            /*background-color: black;*/
            /*cursor: pointer;*/
            /*display: inline-block;*/
            /*vertical-align: top;*/
            /*width: 24px;*/
            /*height: 24px;*/
            /*border: 10px solid #ced4da;*/
            /*text-align: center;*/
            /*border-radius: 23%;*/
            margin-top: 5px;
        }
    </style>

<div class="container">
    <div class="breadcrumb-wrapper">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">

                <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>

                <li class="breadcrumb-item"><a href="{{route('productdetails','slug')}}">product details</a></li>

                <li class="breadcrumb-item active" aria-current="page">my cart</li>

            </ol>
        </nav>
    </div>
</div>
    <!-- shoppng cart page  -->
<section class="shopping-cart">
    <div class="container">
        <div class="row">
            @if(\Illuminate\Support\Facades\Auth::check())
                @if(count($cart_items)>0)
                    <div class="col-md-7">
                        <div class="left-side">
                            <div class="cart">
                                @php  $subtotal = 0 @endphp
                                @php  $discount = 0 @endphp
                                @php  $total = 0 @endphp
                                @foreach($cart_items as $cart)
                                @php $subtotal = $subtotal + $cart->quantity * $cart->product->sale_price @endphp
                                @php $discount = $discount + $cart->quantity * ($cart->product->regular_price - $cart->product->sale_price) @endphp
                                @php $total =  $subtotal - $discount @endphp
                                <div class="row">
                                    <div class="col-md-5 image-class">
                                        <div class="image">
                                            <img src={{url('/')}}/Product/image/{{$cart->product['product_image']}} alt="logo" loading="lazy">
                                        </div>
                                    </div>
                                    <div class="col-md-7">
                                        <div class="price-details">
                                            <a href="{{route('productdetails',$cart->slug)}}">
                                                <h4>{{$cart->product['product_name']}}</h4>
                                            </a>
                                            <p>{{$cart->product['product_description']}}</p>
                                            <h5><i class="fa fa-inr" ></i>{{$cart->product->sale_price}} <span><i class="fa fa-inr" ></i>{{$cart->product->regular_price}}</span></h5>
                                            <div class="size-qty">
                                                {{--<button type="button" data-toggle="modal" data-target="#exampleModal1">--}}
                                                    {{--Size <i data-feather="chevron-down"></i>--}}
                                                {{--</button>--}}

                                                <div class="qty">
                                                    <input type="button" class="decreases" onclick="decrement({{$cart["id"]}})" value="-" />
                                                    <input type="number"  name="quantity" class="count" id="qty-{{$cart["id"]}}" value="{{$cart->quantity}}"  onchange="update_cart('{{$cart["id"]}}')" min="1" max="{{$cart->product->in_stock}}">
                                                    <input type="button" class="increases" onclick="increment({{$cart["id"]}})" value="+" />
                                                </div>
                                            </div>
                                            {{--<h6>Delivery by Tomorrow, Sunday <span>$5</span></h6>--}}
                                        </div>
                                        <div class="cross">
                                            <button type="button" id="remove{{$cart->id}}" value="{{$cart->id}}" onclick="remove_cart({{$cart->id}})" data-toggle="modal" data-target="#exampleModal">
                                                <i data-feather="x"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                {{--<div class="add-more">--}}
                                    {{--<a href="index.html">--}}
                                        {{--<h4 class="mb-0">add more products <i data-feather="plus"></i></h4>--}}
                                    {{--</a>--}}
                                {{--</div>--}}
                                @endforeach
                            </div>

                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="amount">
                            <h3 style="color: forestgreen;">price details</h3>
                            <ul>
                                <li>
                                    <h5>main price  <span  id="sub_total"><i class="fa fa-inr" ></i>{{$subtotal}}</span></h5>
                                </li>
                                <li>
                                    <h5>discount <span class="green" id="discount"><i class="fa fa-inr" ></i>{{$discount}}</span></h5>
                                </li>
                            </ul>
                            <h4>total price <span id="total"><i class="fa fa-inr" ></i>{{$total}}</span></h4>
                        </div>
                        <div class="place-order">
                            <a href="{{route('checkout')}}" class="btn1">checkout</a>
                        </div>
                    </div>
                @else
                    <div class="col-md-12" style="text-align: center;margin-top: -62px;">
                       <img src = "{{url('/')}}/Frontend/assets/images/add-cart.jpg" style="margin-bottom: 5px;height: 350px;width: 350px">
                    </div>
                    <div class="col-md-12" style="text-align: center;margin-top: 10px">
                        Missing Cart items?
                    </div>
                    <div class="col-md-12" style="text-align: center;margin-top: 10px">
                        <button style="background-color:darkred"><a href="{{route('home')}}" style="color: white">Shop Now</a></button>
                    </div>
                @endif
            @elseif(count($cart_items)>0)
                <div class="col-md-7">
                    <div class="left-side">
                        <div class="cart">
                            @php  $subtotal = 0 @endphp
                            @php  $discount = 0 @endphp
                            @php  $total = 0 @endphp
                            @foreach($cart_items as $cart)
                                @php $subtotal = $subtotal + $cart->quantity * $cart->product->sale_price @endphp
                                @php $discount = $discount + $cart->quantity * ($cart->product->regular_price - $cart->product->sale_price) @endphp
                                @php $total =  $subtotal - $discount @endphp
                                <div class="row">
                                    <div class="col-md-5 image-class">
                                        <div class="image">
                                            <img src={{url('/')}}/Product/image/{{$cart->product['product_image']}} alt="logo" loading="lazy">
                                        </div>
                                    </div>
                                    <div class="col-md-7">
                                        <div class="price-details">
                                            <a href="{{route('productdetails',$cart->slug)}}">
                                                <h4>{{$cart->product['product_name']}}</h4>
                                            </a>
                                            <p>{{$cart->product['product_description']}}</p>
                                            <h5><i class="fa fa-inr" ></i>{{$cart->product->sale_price}} <span><i class="fa fa-inr" ></i>{{$cart->product->regular_price}}</span></h5>
                                            <div class="size-qty">
                                                <button type="button" data-toggle="modal" data-target="#exampleModal1">
                                                    Size <i data-feather="chevron-down"></i>
                                                </button>

                                                <div class="qty">

                                                    <input type="button" class="decreases" onclick="decrement({{$cart["id"]}})" value="-" />
                                                    <input type="number"  name="quantity" class="count" id="qty-{{$cart["id"]}}" value="{{$cart->quantity}}"  onchange="update_cart('{{$cart["id"]}}')"  min="1" max="{{$cart->product->in_stock}}">
                                                    <input type="button" class="increases" onclick="increment({{$cart["id"]}})" value="+" />
                                                </div>
                                            </div>
                                            {{--<h6>Delivery by Tomorrow, Sunday <span>$5</span></h6>--}}
                                        </div>
                                        <div class="cross">
                                            <button type="button" id="remove{{$cart->id}}" value="{{$cart->id}}" onclick="remove_cart({{$cart->id}})" data-toggle="modal" data-target="#exampleModal">
                                                <i data-feather="x"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                {{--<div class="add-more">--}}
                                {{--<a href="index.html">--}}
                                {{--<h4 class="mb-0">add more products <i data-feather="plus"></i></h4>--}}
                                {{--</a>--}}
                                {{--</div>--}}
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="amount">
                        <h3 style="color: forestgreen;">price details</h3>
                        <ul>
                            <li>
                                <h5>main price  <span  id="sub_total">{{$subtotal}}</span></h5>
                            </li>
                            <li>
                                <h5>discount <span class="green" id="discount">{{$discount}}</span></h5>
                            </li>
                        </ul>
                        <h4>total price <span id="total">{{$total}}</span></h4>
                    </div>
                    <div class="place-order">
                        <a href="{{route('checkout')}}" class="btn1">checkout</a>
                    </div>
                </div>
            @else
            <div class="col-md-12" style="text-align: center;margin-top: -62px;">
                <img src = "{{url('/')}}/Frontend/assets/images/add-cart.jpg" style="margin-bottom: 5px;height: 350px;width: 350px">
            </div>
            <div class="col-md-12" style="text-align: center;margin-top: 10px">
                Missing Cart items?
            </div>
            <div class="col-md-12" style="text-align: center;margin-top: 10px">
                Please Login First
                <div class="col-md-12" style="text-align: center;margin-top: 10px">
                <button style="background-color:darkred"><a href="{{route('loginfront')}}" style="color: white">Login</a></button>
                </div>
            </div>
        @endif
        </div>
    </div>
</section>

<script>
    function decrement(id) {
        var quat = $('#qty-'+ id).val();
        if(quat > 1)
        {
            quat--;
            $('#qty-'+ id).val(quat);
            update_cart(id);
        }
    }
    function increment(id) {
        var quat = $('#qty-'+ id).val();
        if(quat >= 1)
        {
            quat++;
            $('#qty-'+ id).val(quat);
            update_cart(id);
        }
    }

    function update_cart(id) {
        var quantity = $('#qty-'+id).val();
        var cart_id=id;

        $.ajax({
            type: "post",
            url: "{{route('updatecart')}}",
            data: {_token: '<?php echo csrf_token();?>',id:cart_id,quantity:quantity},
            success: function(data) {
                if(data.status=='failed'){
                    swal.fire(data.msg);
                     // $('#qty-'+id).val(quantity);
                    setTimeout(function(){ location.reload(); }, 400);
                }else {
                    $('#qty-' + id).val(quantity);
                    $('#sub_total').html(data.sub_total);
                    $('#discount').html(data.discount);
                    $('#total').html(data.totalAmounts);
                    swal.fire(data.msg);
                }
            }
        });
    }
</script>

<script>
    function remove_cart(id) {
        var remove = $('#remove'+id).val();
        var cart_id = id;

        $.ajax({
            url:"{{route('removecart')}}",
            method:"POST",
            data:{_token: '<?php echo csrf_token();?>',
                id:cart_id,
                remove: remove
            },
            success:function (response) {
                window.location.reload();
                toastr.success(response.msg);
            }
        })
    }
</script>

@endsection

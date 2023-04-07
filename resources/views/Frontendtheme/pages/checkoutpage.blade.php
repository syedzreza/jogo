@extends('Frontendtheme.layouts.master')

@section('content')
    <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
    <script src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<div class="container">
    <div class="breadcrumb-wrapper">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">


                <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>



                <li class="breadcrumb-item active" aria-current="page">Checkout</li>


            </ol>
        </nav>
    </div>
</div>
<!-- checkout page open-->
<section class="checkout-area section">
    <section class="container">
        <section class="row">
            <section class="col-md-5 col-lg-5">
                @foreach($useraddress as $useraddres)
                <div class="parts active">
                    <ul class="address-area">
                        <input type="radio" name="user_address" id="user_address" style="float: right; margin-top: 70px;" value="{{$useraddres->id}}"/>
                        <li><h4>{{$useraddres->name}}</h4></li>
                        <li><h4><span>Email:</span> {{$useraddres->user['email']}}</h4></li>
                        <li><h4><span>Phone:</span> {{$useraddres->phone}}</h4></li>
                        <li><h4>{{$useraddres->address}}</h4></li>
                        <li><h4>{{$useraddres->city}}</h4></li>
                        <li><h4>{{$useraddres->state}}</h4></li>
                    </ul>
                </div>
                @endforeach
                <div class="parts">
                    <a href="#" type="button" class="button btn1" style="display: inline;" data-toggle="modal" data-target="#addressModal">add new address</a>
                </div>
            </section>
            <section class="col-md-7 col-lg-7">
                <section class="order-area">
                    <h3>Order Summary</h3>
                    @php $subtotal = 0 @endphp
                    @php  $discount = 0 @endphp
                    @php  $total = 0 @endphp
                    @foreach($cart_items as $cart)
                    @php $subtotal = $subtotal + $cart->quantity * $cart->product->sale_price @endphp
                    @php $discount = $discount + $cart->quantity * ($cart->product->regular_price - $cart->product->sale_price) @endphp
                    @php $total =  $subtotal - $discount @endphp
                    <ul class="order-ul">
                        <li>
                            <a href="#"><img src="{{url('/')}}/Product/image/{{$cart->product->product_image}}" alt="" style="width:135px;"></a>
                        </li>
                        <li>
                            <ul class="order-text">
                                {{--<li><small>Category Name</small></li>--}}
                                <li><a href="#"><h2>{{$cart->product->product_name}}</h2></a></li>
                                <li><p>{{$cart->product->product_name}}</p></li>
                                {{--@php $quantity = $cart @endphp--}}
                                <li><h6>{{$cart->product->sale_price}}<span>{{$cart->product->regular_price}}</span></h6></li>
                            </ul>
                        </li>
                    </ul>
                    @endforeach
                </section>
                <ul class="address-area">
                    <li><h5>Items Subtotal : <span>$ {{$subtotal}}</span></h5></li>
                    <li><h5>Estimated Discount : <span>$ {{$discount}}</span></h5></li>
                    <li><h5>Total : <span>$ {{$total}}</span></h5></li>
                    <input type="hidden" name="total_amount" id="total_amount" value="{{$total}}">
                </ul>
                <ul class="payment-ul">
                    <li class="cstm-check-radio d-flex align-items-center mr-5">
                        <span class="radio">
                            <input type="radio" id="op" value="online" name="paymethod">
                            <label for="op"> Online Payment</label>
                        </span>
                    </li>
                    <li class="cstm-check-radio d-flex align-items-center">
                        <span class="radio">
                            <input type="radio" id="cod" value="cod" name="paymethod">
                            <label for="cod"> Cash On Delivery</label>
                        </span>
                    </li>
                </ul>
                <form action="" method="post">
                    <input type="hidden" name="total_amount" id="total_amountd"  value="">
                    <input type="hidden" name="shipping_id" id="shipping_id" value="">
                    <input type="hidden" name="payment_method" id="payment_method" value="">
                    <input type="hidden" name="id" id="order_id" value="">
                <ul class="checkout-btn">
                    <li><a type="button" id="placeorder"  class="button btn1" style="display: inline;" >Place Order</a></li>
                </ul>
                </form>
            </section>
        </section>
    </section>
</section>
<!-- Modal -->
<div class="modal fade" id="addressModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add new address</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('saveUseraddress')}}" method="POST">
                {{@csrf_field()}}
            <div class="modal-body">
                <div class="form-group">
                    <label for="exampleInputText">Name</label>
                    <input type="text" class="form-control" id="exampleInputText" name="name">
                </div>
                <div class="form-group">
                    <label for="exampleInputPhone">Phone</label>
                    <input type="number" class="form-control" id="exampleInputPhone" name="phone">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Address</label>
                    <textarea class="form-control" rows="4" name="address"></textarea>
                </div>
                <div class="form-group">
                    <label for="exampleInputCity">City</label>
                    <input type="text" class="form-control" id="city" name="city">
                </div>
                <div class="form-group">
                    <label for="exampleInputPinCode">Pin Code</label>
                    <input type="number" class="form-control" id="pincode" name="pincode">
                </div>
                <div class="form-group">
                    <label for="exampleInputState">State</label>
                    <input type="text" class="form-control" id="state" name="state">
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary btn1">Save Now</button>
            </div>
            </form>
        </div>
    </div>
</div>

<script>
$(document).ready(function () {
    $('#placeorder').on('click',function () {
        var radioValue1 = $("input[name='user_address']:checked").val();
        var opvalue = $("input[name='paymethod']:checked").val();
        if(radioValue1 == undefined) {
            $("#placeorder").prop('disabled', true);
            toastr.error("Select Delivery Address!!" ,{timeOut: 20},{autohide: false});
            // window.location.reload();
        }else if(opvalue == undefined){
            toastr.error("Please Select Payment Option" ,{timeOut: 20},{autohide: false});
        }
        else{
            var total_amount = $('#total_amount').val();

            if (opvalue == "cod"){
                $.ajax({
                    url : "{{route('saveorder')}}",
                    method : "POST",
                    data : {
                        _token : "<?php echo csrf_token(); ?>",
                        shipping_id : radioValue1,
                        total_amount : total_amount,
                        payment_method : opvalue
                    },
                    success:function (response) {
                        toastr.success(response.msg);
                        setTimeout(function () {
                            location.reload();
                        },5000);
                        window.location.href='{{route('myaccount')}}#v-pills-my-orders'
                    }
                })
            }
            else
            {
                $.ajax({
                    url:"{{route('payonline')}}",
                    type:"post",
                    data:{
                        _token : "<?php echo csrf_token(); ?>",
                        shipping_id :  radioValue1,
                        total_amount : total_amount,
                        payment_method : opvalue
                    },
                    success:function (response) {
                        $('#order_id').val(response.order_id);
                        var options = {
                            "key": "rzp_test_yNNZjJQCWvJUkS", // Enter the Key ID generated from the Dashboard
                            "amount": response.total *100, // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
                            "currency": "INR",
                            "name": response.name,
                            "description": "Thanku For Choosing Us",
                            // "image": "https://example.com/your_logo",
                            // "order_id": response.id, //This is a sample Order ID. Pass the `id` obtained in the response of Step 1
                            "handler": function (responsea){
                                var order_id = $('#order_id').val();
                                var trans_id = responsea.razorpay_payment_id;

                                $.ajax({
                                    url : "{{route('updatepayonline')}}",
                                    type: "POST",
                                    data:{
                                        _token : "{{csrf_token()}}",
                                        order_id:order_id,
                                        pay_trans_no:trans_id
                                    },
                                    success:function (data) {
                                        toastr.success(response.msg);
                                        setTimeout(function () {
                                            location.reload();
                                        },3000);
                                        window.location.href='{{route('myaccount')}}#v-pills-my-orders'
                                    }
                                });
                                // alert(responsea.razorpay_payment_id);
                            },
                            "prefill": {
                                "name":  response.name,
                                "email": response.email,
                                "contact": response.phone
                            },
                            "theme": {
                                "color": "#3399cc"
                            }
                        };
                        var rzp1 = new Razorpay(options);
                        rzp1.open();
                    }
                })
            }
        }
    })
})
</script>
@endsection

@extends('Frontendtheme.layouts.master')

@section('content')
    <?php
    $url=\Request::segment('2');
    ?>

    <div class="container">
        <div class="breadcrumb-wrapper">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">

                    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>

                    <li class="breadcrumb-item active" aria-current="page">category products</li>

                </ol>
            </nav>
        </div>
    </div>

<!-- product listing page --><section class="p-listing">
    <div class="container">
        <div class="p-listing-in">
            <div class="row">
                <div class="col-md-3">
                    <div class="left-list">
                        <h4>filter by</h4>
                        <form>
                            {{--<div class="accordion" id="accordion1">--}}
                                {{--<div class="card">--}}
                                    {{--<div id="heading1">--}}
                                        {{--<h5>--}}
                                            {{--<button class="acc-btn dropdown-toggle text-left bs-placeholder"--}}
                                                    {{--type="button" data-toggle="collapse" data-target="#collapse1"--}}
                                                    {{--aria-expanded="true" aria-controls="collapse1">--}}
                                                {{--price--}}
                                            {{--</button>--}}
                                        {{--</h5>--}}
                                    {{--</div>--}}

                                    {{--<div id="collapse1" class="collapse-show" aria-labelledby="heading1"--}}
                                         {{--data-parent="#accordion1">--}}
                                        {{--<div class="card-body">--}}
                                            {{--<ul>--}}
                                                {{--<li><a href="#">--}}
                                                        {{--<div class="form-check">--}}
                                                            {{--<input class="form-check-input" onclick="categoryCheckbox(1)" name="sale_price" type="radio" value="1"--}}
                                                                   {{--id="defaultCheck1">--}}
                                                            {{--<label class="form-check-label" for="defaultCheck1">--}}
                                                                {{--$1-$9--}}
                                                            {{--</label>--}}
                                                        {{--</div>--}}
                                                    {{--</a></li>--}}
                                                {{--<li><a href="">--}}
                                                        {{--<div class="form-check">--}}
                                                            {{--<input class="form-check-input" onclick="price(1)" name="sale_price" type="radio" value="2"--}}
                                                                   {{--id="defaultCheck2">--}}
                                                            {{--<label class="form-check-label" for="defaultCheck2">--}}
                                                                {{--$10-$19--}}
                                                            {{--</label>--}}
                                                        {{--</div>--}}
                                                    {{--</a></li>--}}
                                                {{--<li><a href="#">--}}
                                                        {{--<div class="form-check">--}}
                                                            {{--<input class="form-check-input" onclick="price(1)" name="sale_price" type="radio" value="3"--}}
                                                                   {{--id="defaultCheck3">--}}
                                                            {{--<label class="form-check-label" for="defaultCheck3">--}}
                                                                {{--$20-$29--}}
                                                            {{--</label>--}}
                                                        {{--</div>--}}
                                                    {{--</a></li>--}}
                                                {{--<li>--}}
                                                    {{--<a href="#">--}}
                                                        {{--<div class="form-check">--}}
                                                            {{--<input class="form-check-input" onclick="price(1)" name="sale_price" type="radio" value="4"--}}
                                                                   {{--id="defaultCheck4">--}}
                                                            {{--<label class="form-check-label" for="defaultCheck4">--}}
                                                                {{--$30-$39--}}
                                                            {{--</label>--}}
                                                        {{--</div>--}}
                                                    {{--</a>--}}
                                                {{--</li>--}}
                                            {{--</ul>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            <div class="accordion" id="accordion2">
                                <div class="card">
                                    <div id="heading2">
                                        <h5>
                                            <button class="acc-btn dropdown-toggle text-left bs-placeholder"
                                                    type="button" data-toggle="collapse" data-target="#collapse2"
                                                    aria-expanded="true" aria-controls="collapse2">
                                                category
                                            </button>
                                        </h5>
                                    </div>

                                    <div id="collapse2" class="collapse-show" aria-labelledby="heading2"
                                         data-parent="#accordion2">
                                        <div class="card-body">
                                            <ul>
                                                <li>
                                                    @foreach($categories as $category)
                                                    <a href="{{route('products',$category->slug)}}">
                                                        <div class="form-radio">
                                                            <input class="form-radio-input" type="radio"  name="Categorie" value="{{$category->category_name}}" @if($category->slug == $url) checked @endif id="{{$category->id}}">
                                                            <label class="form-radio-label" for="defaultCheck11">
                                                                {{$category->category_name}}
                                                            </label>
                                                        </div>
                                                    </a>
                                                    @endforeach
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="row">
                        @foreach($products as $product)
                        <div class="col-md-3">
                            <div class="product-list">
                                <a href="{{route('productdetails',$product->slug)}}">
                                <div class="image">
                                    <img src="{{url('/')}}/Product/image/{{$product->product_image}}" style="object-fit:fill" alt="">
                                </div>
                                <div class="details">
                                    <h4 style="font-size: 21px;">{{$product->product_name}}</h4>
                                    <h6>${{$product->sale_price}}</h6>
                                </div>
                                </a>
                                <form method="POST" action="">
                                <div class="shop-cart">
                                    <input type="hidden" name="product_id" id="pro_id" value="{{$product->id}}">
                                    <input type="hidden" name="quantity" value="1">
                                    @if($product->in_stock>0)
                                    <button type="button" class="btn1" id="addcart{{$product->id}}" value="{{$product->id}}" onclick="add_cart({{$product->id}})">Add to Cart <i data-feather="shopping-cart"></i></button>
                                    @else
                                        <button type="button" class="btn1">Out Of Stock</button>
                                    @endif
                                </div>
                                </form>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="numbering">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination">
                                {{$products->links('Frontendtheme.pages.pagination')}}
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<script>
function add_cart(id) {
    var pro = id;

    $.ajax({
        method: "POST",
        url: "{{route('cartsave')}}",
        data: {_token: '<?php echo csrf_token();?>',
            'product_id': pro,
        },
        success: function (response) {
            swal.fire(response.msg);
            $('#cart_count').html(response.html);
        }
    })
}
{{--$(document).ready(function () {--}}
    {{--categoryCheckbox(1);--}}
{{--});--}}
{{--function categoryCheckbox(page) {--}}
    {{--var a=[];--}}
    {{--var page=page;--}}
    {{--$("input:checkbox[name='categories']:checked").each(function(){--}}
        {{--a.push($(this).val());--}}
    {{--});--}}
    {{--var price =  $("input:radio[name='sale_price']:checked").val();--}}
    {{--$.ajax({--}}
        {{--type: 'GET',--}}
        {{--url: "{{route('getCategoryCourse')}}",--}}
        {{--data: {--}}
            {{--cat_id: a,--}}
            {{--page:page,--}}
            {{--price: price--}}
        {{--},--}}
        {{--success: function (response) {--}}
            {{--$('#appenddata').html(response.html);--}}
            {{--$('#pagination').html(response.pagination);--}}
        {{--},--}}
    {{--});--}}
{{--}--}}
{{--$(document).on("click", ".pagination li a", function(e){--}}
    {{--e.preventDefault();--}}
    {{--var pageId = $(this).attr("data-page");--}}
    {{--categoryCheckbox(pageId);--}}
{{--});--}}
</script>

@endsection



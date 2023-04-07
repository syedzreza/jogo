@extends('Frontendtheme.layouts.master')

@section('content')

@foreach($datas as $product)
    <div class="col-md-3" >
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
<div class="numbering">
    <nav aria-label="Page navigation example">
        <ul class="pagination">
            {{$datas->links('Frontendtheme.pages.custom')}}
        </ul>
    </nav>
</div>

@endsection

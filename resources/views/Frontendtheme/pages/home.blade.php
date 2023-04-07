@extends('Frontendtheme.layouts.master')

@section('content')

<section class="banner">
    @if (session()->has('success'))
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            @if(is_array(session('success')))
                <ul>
                    @foreach (session('success') as $message)
                        <li>{{ $message }}</li>
                    @endforeach
                </ul>
            @else
                {{ session('success') }}
            @endif
        </div>
    @endif
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6">
                @foreach($homepages as $homepage)
                <div class="text">
                    <h3>{{$homepage->title}}</h3>
                    <p>{!! $homepage->description !!}</p>
                    <div class="cta">
                        <a href="{{$homepage->link}}" class="btn">{{$homepage->button_name}}</a>
                        <div>
                            <div class="icon"><i data-feather="truck"></i></div>
                            <span>{{$homepage->delivery}} ₦</span>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="col-md-6">
                <div id="carouselExampleIndicators" style="margin-bottom: 67px" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        @foreach($homepageimages as $homepageimage)
                        {{--@if($homepageimage->status == "Active")--}}
                        <li data-target="#carouselExampleIndicators" data-slide-to="{{$loop->index}}" class="{{ $loop->first ? 'active' : '' }}"></li>
                        {{--@endif--}}
                        @endforeach
                    </ol>
                    <div class="carousel-inner">
                        @if($homepageimages)
                        @foreach($homepageimages as $homepageimage)
                        {{--@if($homepageimage->status == "Active")--}}
                        <div class="carousel-item {{$loop->first ? 'active' : '' }}">
                            <img class="d-block w-100"  src="{{url('/')}}/Image/{{$homepageimage->image}}" alt="First slide">
                        </div>
                        {{--@endif--}}
                        @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="catergory-section">
    <div class="container">
        <h3>Category</h3>
        <div class="row">
            @foreach($categories as $categorie)
            <div class="col-md-3">
                <a href="{{route('products',$categorie->slug)}}">
                    <div class="category">
                        <div class="image">
                            <img src="{{url('/')}}/Category/image/{{$categorie->image}}" style="object-fit: cover" alt="">
                        </div>
                        <div class="details">
                            <div class="left">
                                <h4>{{$categorie->category_name}}</h4>
                                <p style="color: blue">{{$categorie->products->count()}} Products</p>
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

<section class="testimonial">
    <div class="container">
        <div class="owl-carousel owl-theme">
            <div class="item">
                <img src="{{url('/')}}/Frontend/assets/images/avatar.png" alt="">
                <div class="rvw">
                    <ul>
                        <li>
                            <i data-feather="star"></i>
                        </li>
                        <li>
                            <i data-feather="star"></i>
                        </li>
                        <li>
                            <i data-feather="star"></i>
                        </li>
                        <li>
                            <i data-feather="star"></i>
                        </li>
                    </ul>
                </div>
                <div class="text">
                    <h3>“Quick Delivery”</h3>
                    <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. </p>
                    <h5><span>by</span>Customer Name</h5>
                </div>
            </div>
            <div class="item">
                <img src="{{url('/')}}/Frontend/assets/images/avatar.png" alt="">
                <div class="rvw">
                    <ul>
                        <li>
                            <i data-feather="star"></i>
                        </li>
                        <li>
                            <i data-feather="star"></i>
                        </li>
                        <li>
                            <i data-feather="star"></i>
                        </li>
                        <li>
                            <i data-feather="star"></i>
                        </li>
                    </ul>
                </div>
                <div class="text">
                    <h3>“Quick Delivery”</h3>
                    <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. </p>
                    <h5><span>by</span>Customer Name</h5>
                </div>
            </div>
            <div class="item">
                <img src="{{url('/')}}/Frontend/assets/images/avatar.png" alt="">
                <div class="rvw">
                    <ul>
                        <li>
                            <i data-feather="star"></i>
                        </li>
                        <li>
                            <i data-feather="star"></i>
                        </li>
                        <li>
                            <i data-feather="star"></i>
                        </li>
                        <li>
                            <i data-feather="star"></i>
                        </li>
                    </ul>
                </div>
                <div class="text">
                    <h3>“Quick Delivery”</h3>
                    <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. </p>
                    <h5><span>by</span>Customer Name</h5>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    $(document).ready(function(){
        $("#carouselExampleIndicators").carousel({
            interval: false,
            wrap: false
        });
    });
</script>

@endsection

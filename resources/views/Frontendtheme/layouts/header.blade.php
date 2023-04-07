
<div class="nav_area">
    <div class="container">
        <div class="row">
            <nav class="navbar navbar-expand-lg navbar-light w-100">
                <a class="navbar-brand" href="{{route('home')}}">
                    <img src="{{url('/')}}/Frontend/assets/images/logo.png" alt="Logo">
                    <h6>JOOF Computer Centre AGSI</h6>
                </a>
                <!-- <h6>JOOF Computer Centre AGSI</h6> -->
                <!-- <div class="search">
                    <form>
                        <i data-feather="search"></i>
                    <input type="search" placeholder="Search product">
                </form>
                </div> -->
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
                        {{--<li class="nav-item active">--}}
                            {{--<a class="nav-link" href="{{route('productlist')}}">About</a>--}}
                        {{--</li>--}}
                        <li class="nav-item active">
                            <a class="nav-link" href="{{route('productlist')}}">All Product</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Category
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                @foreach($categories as $category)
                                <a class="dropdown-item" href="{{route('products',$category->slug)}}">{{$category->category_name}}</a>
                                @endforeach
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="nav-itemBtn">
                    @if(\Illuminate\Support\Facades\Auth::check())
                        {{\Illuminate\Support\Facades\Auth::user()->f_name}}
                    @else
                        <a class="nav-link btn" href="{{route('loginfront')}}">Login/Signup</a>
                    @endif
                </div>
                <div class="my-account">
                    @if(!Auth::check())
                    @else
                    <a href="{{route('myaccount')}}">
                        <i data-feather="user"></i>
                    </a>
                    @endif
                </div>
                <div class="cart">
                    <a href="{{route('cart')}}">
                        <div class="icon"><i data-feather="shopping-bag"></i></div>
                        <span id="cart_count">{{$cart_items->count()}}</span>
                    </a>
                </div>
            </nav>
        </div>
    </div>
</div>




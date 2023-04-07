@extends('Frontendtheme.layouts.master')

@section('content')


{{--@include('Frontendtheme.pages.myaccount')--}}
<section class="my-account">
    <div class="container">
        <div class="my-account-in">
            <div class="row account-row">
                <div class="col-md-3">
                    <div class="nav flex-column nav-pills my_account" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <a class="nav-link active" data-toggle="pill" href="#v-pills-dashboard" role="tab1" aria-controls="v-pills-dashboard" aria-selected="true"><i data-feather="align-center"></i>dashboard</a>
                        <a class="nav-link" data-toggle="pill" href="#v-pills-my-orders" role="tab2" aria-controls="v-pills-my-orders" aria-selected="false"><i data-feather="shopping-bag"></i>my orders</a>
                        <a class="nav-link" data-toggle="pill" href="#v-pills-account-details" role="tab3" aria-controls="v-pills-account-details" aria-selected="true"><i data-feather="user"></i>account details</a>
                        <a class="nav-link" data-toggle="pill" href="#v-pills-address-details" role="tab4" aria-controls="v-pills-address-details" aria-selected="true"><i class="fa fa-address-card" aria-hidden="true"></i></i> address details</a>
                        <a class="nav-link" data-toggle="pill" href="#v-pills-change-password" role="tab5" aria-controls="v-pills-change-password" aria-selected="true"><i class="fa fa-key" aria-hidden="true"></i>  Password</a>
                        <a class="nav-link" href="{{route('ulogout')}}"><i data-feather="log-out"></i>log out</a>
                    </div>
                </div>
                <div class="col-md-9 my-right">
                    <div class="tab-content" id="v-pills-tabContent">
                        <a style="margin-bottom: 12px;" id="back" class="btn btn-primary" href="{{route('myaccount')}}#v-pills-my-orders"><-Back</a>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead class="thead-dark">
                                <tr>
                                    <th scope="col">Product Image</th>
                                    <th scope="col">Product Name</th>
                                    <th scope="col">Product Price</th>
                                    <th scope="col">Product Quantity</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php $i = 0 @endphp
                                @foreach($orderdetails->orderdetail as $ordered)
                                    @php $i++ @endphp
                                    <tr>
                                        <td><img style="height: 50px;width: 50px" src="{{url('/')}}/Product/image/{{$ordered->productsdetails['product_image']}}"></td>
                                        <td>{{$ordered->productsdetails['product_name']}}</td>
                                        <td>{{$ordered->product_price}}</td>
                                        <td>{{$ordered->product_quantity}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    $(document).ready(function(){
        $('a[data-toggle="pill"]').on('show.bs.tab', function(e) {
            localStorage.setItem('activeTab', $(e.target).attr('href'));
        });
        var activeTab = localStorage.getItem('activeTab');
        if(activeTab){
            $('.my_account a[href="' + activeTab + '"]').tab('show');
        }
    });
</script>
@endsection

@extends('Frontendtheme.layouts.master')

@section('content')
<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<div class="container">
    <div class="breadcrumb-wrapper">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">

                <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>

                <li class="breadcrumb-item active" aria-current="page">my account</li>

            </ol>
        </nav>
    </div>
</div>
@if(Session::has('success'))
    <div class="alert alert-success">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
        <strong>{{Session::get('success')}}</strong>
    </div>
@endif
@if(Session::has('error'))
    <div class="alert alert-danger">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
        <strong>{{Session::get('error')}}</strong>
    </div>
@endif
<!-- my-account page -->
<section class="my-account">
    <div class="container">
        <div class="my-account-in">
            <div class="row account-row">
                <div class="col-md-3">
                    <div class="nav flex-column nav-pills my_account" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <a class="nav-link" data-toggle="pill" href="#v-pills-dashboard" role="tab1" aria-controls="v-pills-dashboard" aria-selected="true"><i data-feather="align-center"></i>dashboard</a>
                        <a class="nav-link" data-toggle="pill" href="#v-pills-my-orders" role="tab2" aria-controls="v-pills-my-orders" aria-selected="false"><i data-feather="shopping-bag"></i>my orders</a>
                        <a class="nav-link" data-toggle="pill" href="#v-pills-account-details" role="tab3" aria-controls="v-pills-account-details" aria-selected="true"><i data-feather="user"></i>account details</a>
                        <a class="nav-link" data-toggle="pill" href="#v-pills-address-details" role="tab4" aria-controls="v-pills-address-details" aria-selected="true"><i class="fa fa-address-card" aria-hidden="true"></i></i> address details</a>
                        <a class="nav-link" data-toggle="pill" href="#v-pills-change-password" role="tab5" aria-controls="v-pills-change-password" aria-selected="true"><i class="fa fa-key" aria-hidden="true"></i>  Password</a>
                        <a class="nav-link" href="{{route('ulogout')}}"><i data-feather="log-out"></i>log out</a>
                    </div>
                </div>
                <div class="col-md-9 my-right">
                    <div class="tab-content" id="v-pills-tabContent">
                        <div class="tab-pane fade" id="v-pills-dashboard" role="tabpanel" aria-labelledby="v-pills-dashboard-tab">
                            <div class="picture">
                                @if(\Illuminate\Support\Facades\Auth::user()->profile_image>0)
                                    <img src="{{url('/')}}/Frontend/Profile/{{\Illuminate\Support\Facades\Auth::user()->profile_image}}" style="width:80px;height:80px;border-radius: 50%">
                                @else
                                    <img src="{{url('/')}}/Frontend/Profile/avatar.jpg" style="width:80px;height:80px;border-radius: 50%">
                                @endif
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <table class="table ">
                                        <tbody>
                                        <tr>
                                            <td>name</td>
                                            <td>{{$userdetails->f_name.' '.$userdetails->l_name}}</td>
                                        </tr>
                                        <tr>
                                            <td>phone number</td>
                                            <td>{{$userdetails->phone ?? ''}}</td>
                                        </tr>
                                        <tr>
                                            <td>mail id</td>
                                            <td>{{$userdetails->email}}</td>
                                        </tr>
                                        <tr>
                                            <td>address</td>
                                            <td>{{$userdetails->uaddress->first()->address ?? '' }} {{$userdetails->uaddress->first()->city ?? '' }} {{$userdetails->uaddress->first()->pincode ?? ''}} {{$userdetails->uaddress->first()->state ?? ''}}</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                    <p>
                                        Through your account dashboard you can easily check your <span>recent orders</span> and manage your <span>account details</span>.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="v-pills-my-orders" role="tabpanel" aria-labelledby="v-pills-my-orders-tab">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">Order No.</th>
                                        <th scope="col">Order status</th>
                                        <th scope="col">Payment Method</th>
                                        <th scope="col">Payment status</th>
                                        <th scope="col">Order Date</th>
                                        <th scope="col">total</th>
                                        <th scope="col">view</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    {{--@php $i = 0 @endphp--}}
                                    @foreach($orders as $order)
                                        {{--@php $i++ @endphp--}}
                                    <tr>
                                        <td>{{isset($order['order_no']) ? $order['order_no'] : ''}}</td>
                                        <td>{{isset($order['order_status']) ? $order['order_status'] : ''}}</td>
                                        <td>{{isset($order['payment_method']) ? $order['payment_method'] : ''}}</td>
                                        <td>{{isset($order['payment_status']) ? $order['payment_status'] : ''}}</td>
                                        <td>{{date_format($order['created_at'],"d-m-Y")}}</td>
                                        <td>{{isset($order['order_total']) ? $order['order_total'] : ''}}</td>
                                        <td><a href="{{route('orderdetails',$order->id)}}">Order Detail</a></td>
                                    </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- Button trigger modal -->
                        <div class="tab-pane fade" id="v-pills-account-details" role="tabpanel" aria-labelledby="v-pills-account-details-tab">
                            <h3>account details</h3>
                            <form action="{{route('profileupdate')}}" method="post" enctype="multipart/form-data">
                                {{@csrf_field()}}
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputName1">First Name</label>
                                            <input type="text" name="first_name" class="form-control" id="first_name" value="{{\Illuminate\Support\Facades\Auth::user()->f_name}}" aria-describedby="nameHelp">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputNumber1">Phone Number</label>
                                            <input type="number" name="phone" class="form-control" id="phone" value="{{\Illuminate\Support\Facades\Auth::user()->phone}}" aria-describedby="numberHelp">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputName1">Last Name</label>
                                            <input type="text" name="last_name" class="form-control" value="{{\Illuminate\Support\Facades\Auth::user()->l_name}}" id="last_name" aria-describedby="nameHelp">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlFile1">Profile Image</label>
                                            <input type="file" name="profile_image" class="form-control-file" id="image">
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn1">Submit</button>
                            </form>
                        </div>
                        <div class="tab-pane fade" id="v-pills-address-details" role="tabpanel" aria-labelledby="v-pills-address-details">
                            <div class="row">
                                <div class="col-md-12">
                                    <table class="table ">
                                        <tbody>
                                        <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Phone</th>
                                            <th>State</th>
                                            <th>City</th>
                                            <th>Address</th>
                                            <th>Pin Code</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($useraddress as $userdetail)
                                            <tr>
                                                <td>{{isset($userdetail['name']) ? $userdetail['name'] : ''}}</td>
                                                <td>{{isset($userdetail['phone']) ? $userdetail['phone'] : ''}}</td>
                                                <td>{{isset($userdetail['state']) ? $userdetail['state'] : ''}}</td>
                                                <td>{{isset($userdetail['city']) ? $userdetail['city'] : ''}}</td>
                                                <td>{{isset($userdetail['address']) ? $userdetail['address'] : ''}}</td>
                                                <td>{{isset($userdetail['pincode']) ? $userdetail['pincode'] : ''}}</td>
                                                <td><button onclick="edit_address({{$userdetail->id}})" id="editaddressModal({{$userdetail->id}})" class=" btn btn-primary" style="display: inline;" data-toggle="modal" data-target="#editaddressModal"><span class="glyphicon glyphicon-edit"></span><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
                                                <button style="height: 34px;" value="{{$userdetail->id}}"  id="deleteaddressModal({{$userdetail->id}})" class="btn btn-danger" onclick="getDeleteRoute({{$userdetail->id}})"><span class="glyphicon glyphicon-trash"></span><i class="fa fa-trash-o" aria-hidden="true"></i></button>&emsp;</td>
                                                {{--<td><a href=""  class=" btn btn-primary"><span class="glyphicon glyphicon-edit"></span><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>--}}
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="v-pills-change-password" role="tabpanel" aria-labelledby="v-pills-change-password">
                            <h3>password change</h3>
                            <form action="{{route('updatepassword')}}" method="post">
                                {{@csrf_field()}}
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Current Password</label>
                                            <input type="password" name="current_password" class="form-control" id="exampleInputPassword1">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">New Password</label>
                                            <input type="password" name="new_password" class="form-control" id="exampleInputPassword2">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1"> Conform Password</label>
                                            <input type="password" name="confirm_password" class="form-control" id="exampleInputPassword3">
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" onclick="update_password()" class="btn1">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

    {{--edit modal--}}

<div class="modal fade" id="editaddressModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update address</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="" method="POST">
                {{@csrf_field()}}
                <input type="hidden" name="edit_uaddress" id="edit_uaddress">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="exampleInputText">Name</label>
                        <input type="text" class="form-control" id="Inputname"  name="name">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPhone">Phone</label>
                        <input type="number" class="form-control" id="InputPhone" name="phone">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Address</label>
                        <textarea class="form-control" rows="4" id="InputAddress" name="address"></textarea>
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
                    <button type="button" class="btn btn-primary btn1" onclick="update_uaddress()">Update Now</button>
                </div>
            </form>
        </div>
    </div>
</div>

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
  function edit_address(id) {
      $('#editaddressModal').toggle();
      $.get("{{action('Backend\UserAddress\UserAddressController@editUserForm')}}", {"id": id})
          .done(function (response) {
              $('#edit_uaddress').val(id);
              $('#Inputname').val(response.e_u_address.name);
              $('#InputPhone').val(response.e_u_address.phone);
              $('#InputAddress').val(response.e_u_address.address);
              $('#city').val(response.e_u_address.city);
              $('#pincode').val(response.e_u_address.pincode);
              $('#state').val(response.e_u_address.state);
          });
  }

  function update_uaddress() {
      let id = $('#edit_uaddress').val();
     let Inputname = $('#Inputname').val();
     let InputPhone = $('#InputPhone').val();
     let InputAddress = $('#InputAddress').val();
     let city = $('#city').val();
     let pincode = $('#pincode').val();
     let state = $('#state').val();

      $.ajax({
          url: '{{route('updateUseraddress')}}',
          type: 'POST',
          data: {
              _token: '<?php echo csrf_token();?>',
              name: Inputname,
              phone: InputPhone,
              address: InputAddress,
              city: city,
              pincode: pincode,
              state: state,
              id: id,
          },
          success: function (response) {
              if ((response.status == 'success')) {
                  $('#editaddressModal').toggle();
                  toastr.success(response.msg);
                  setTimeout(function(){
                      window.location.reload(1);
                  }, 2000);
                  // window.location.reload();
              } else {
                  // console.log(response);
                  printErrorMsg(response.error);
              }
          }
      });
  }

  function getDeleteRoute(id) {
      // let del_id = $('#deleteaddressModal'+ id).val();
      let d_id = id;

      $.ajax({
          url : "{{route('delUseraddress')}}",
          methode: "POST",
          data: {
              _token: '<?php echo csrf_token();?>',
              id : d_id
          },
          success:function (response) {
              window.location.reload();
              toastr.success(response.msg);
          }
      })
  }

</script>

@endsection

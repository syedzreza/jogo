@extends('admin.layouts.adminlayout')
@section('content')
    <div id="content" class="content">
        <!-- begin breadcrumb -->
        <ol class="breadcrumb pull-right">
            <li><a href="javascript:;">Home</a></li>
            <li><a href="javascript:;">Users</a></li>
            <li class="active">Manage Users</li>
        </ol>
        <!-- end breadcrumb -->
        <!-- begin page-header -->
        <h1 class="page-header">Manage Users</h1>
        <!-- end page-header -->
        <!-- begin row -->
        <div class="row">
            <!-- begin col-12 -->
            <div class="col-md-12">
                <!-- begin panel -->
                <div class="panel panel-inverse">
                    <div class="panel-heading">
                        <div class="panel-heading-btn">
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                            {{--<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>--}}
                        </div>
                        <h4 class="panel-title">Users</h4>
                    </div>
                    {{--<div style="padding: 10px;"><a  class="btn btn-success  fancybox fancybox.iframe"  style="float: right;margin-bottom: 10px" href="{{route('admin::addHomePageImage')}}"><i class="fa fa-plus"></i> Add</a></div>--}}
                    <div class="panel-body">
                        <table id="data-table" class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th>Sl No</th>
                                <th>Product Id</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $i=0?>
                            @foreach($productsimage as $user)
                                <?php $i++;
                                if($i%2==0){
                                    $class='even gradeC';
                                }else{
                                    $class='odd gradeX';
                                }
                                ?>
                                <tr class="{{$class}}">
                                    <td>{{$i}}</td>
                                    <td>{{$user->product_id}}</td>
                                    <td><img src="{{url('/')}}/Product/images/{{$user->images}}" style="height: 80px;width: 80px"></td>
                                    <td>
                                        <a data-toggle="modal" data-target="#confirmDelete" class="btn btn-danger" onclick="getDeleteRoute('{{route('admin::deleteProductimage',['id'=>$user->id])}}}}')"><span class="glyphicon glyphicon-trash"></span></a>&emsp;
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>Sl No</th>
                                <th>Product Id</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
                <!-- end panel -->
            </div>
            <!-- end col-12 -->
        </div>
        <!-- end row -->
    </div>
    @push('scripts')
        <script>
            var Inactive='Inactive';
            var Active='Active';
            function active_inactive_user(id,status) {
                $.ajax({
                    type: "post",
                    url: '{{route('admin::active_inactive_user')}}',
                    data: {
                        _token: '<?php echo csrf_token();?>',
                        id: id,
                        status: status
                    },
                    success: function (data) {
                        var resp = JSON.parse(data);
                        $('#status' + resp.id).html(resp.html);
                        $(document).find('.child #status' + resp.id).html(resp.html);
                    }

                });
            }
        </script>
    @endpush
@endsection

{{--<section class="faq-area section">--}}
    {{--<div class="container">--}}
        {{--<div class="row d-flex justify-content-center">--}}
            {{--<div class="col-lg-10">--}}
                {{--<div id="accordion" class="accordion">--}}
                    {{--<div class="card mb-0">--}}
                        {{--<div style="display:none"> {{$i=0}}</div>--}}
                        {{--@foreach($desc as $desc)--}}
                            {{--<a class="card-header collapsed" data-toggle="collapse" href="#s{{$i}}" data-parent="#s{{$i}}">--}}
                                {{--{{$desc->title??''}}--}}
                            {{--</a>--}}
                            {{--<div id="s{{$i}}" class="collapse" data-parent="#accordion">--}}
                                {{--<div class="card-body">--}}
                                    {{--{!!$desc->description??''!!}--}}
                                    {{--<div style="display:none"> {{$i++}}</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--@endforeach--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--</section>--}}

@extends('admin.layouts.adminlayout')
@section('content')
    <div id="content" class="content">
        <!-- begin breadcrumb -->
        <ol class="breadcrumb pull-right">
            <li><a href="javascript:;">Home</a></li>
            <li class="active">Home Page</li>
        </ol>
        <!-- end breadcrumb -->
        <!-- begin page-header -->
        <h1 class="page-header">Manage Home Page</h1>
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
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                        </div>
                        <h4 class="panel-title">Home Page</h4>
                    </div>
                    {{--<div style="padding: 10px;"><a  class="btn btn-success  fancybox fancybox.iframe"  style="float: right;margin-bottom: 10px" href="{{route('admin::addHomePage')}}"><i class="fa fa-plus"></i> Add</a></div>--}}
                    <div class="panel-body">
                        <table id="data-table" class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th>Sl No</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Button Name</th>
                                <th>Link</th>
                                <th>Delivery</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $i=0?>
                            @foreach($homepages as $user)
                                <?php $i++;
                                if($i%2==0){
                                    $class='even gradeC';
                                }else{
                                    $class='odd gradeX';
                                }
                                ?>
                                <tr class="{{$class}}">
                                    <td>{{$i}}</td>
                                    <td>{{isset($user['title']) ? $user['title'] : ''}}</td>
                                    <td>{!! isset($user['description']) ? $user['description'] : ''   !!}</td>
                                    <td>{{isset($user['button_name']) ? $user['button_name'] : '' }}</td>
                                    <td>{{isset($user['link']) ? $user['link'] : '' }}</td>
                                    <td>{{isset($user['delivery']) ? $user['delivery'] : '' }}</td>
                                    <td>
                                    <span id="status{{$user->id}}">
                                        <?php if($user->status=='Active'){?>
                                        <a href="javascript:active_inactive_user('<?php echo $user->id; ?>','<?php echo $user->status; ?>');" class="btn btn-success"><span class="glyphicon glyphicon-ok-circle"></span> </a>&emsp;
                                        <?php } else{?>
                                        <a href="javascript:active_inactive_user('<?php echo $user->id; ?>','<?php echo $user->status; ?>');" class="btn btn-warning" ><span class="glyphicon glyphicon-ban-circle"></span> </a>&emsp;
                                        <?php } ?>
                                            </span>
                                        <a href="{{route('admin::editHomePage',['id'=>$user->id])}}" class="fancybox fancybox.iframe btn btn-primary"><span class="glyphicon glyphicon-edit"></span></a>&emsp;
                                        <a data-toggle="modal" data-target="#confirmDelete" class="btn btn-danger" onclick="getDeleteRoute('{{route('admin::deleteHomePage',['id'=>$user->id])}}')"><span class="glyphicon glyphicon-trash"></span></a>&emsp;
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>Sl No</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Button Name</th>
                                <th>Shop</th>
                                <th>Delivery</th>
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
                    url: '{{route('admin::statusHomePage')}}',
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

@extends('admin.layouts.adminlayout')
@section('content')
    <div id="content" class="content">
        <!-- begin breadcrumb -->
        <ol class="breadcrumb pull-right">
            <li><a href="javascript:;">Home</a></li>
            <li><a href="javascript:;">All Category</a></li>
            <li class="active">Manage Category</li>
        </ol>
        <!-- end breadcrumb -->
        <!-- begin page-header -->
        <h1 class="page-header">Manage Category</h1>
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
                        <h4 class="panel-title">Category</h4>
                    </div>
                    <div style="padding: 10px;"><a  class="btn btn-success  fancybox fancybox.iframe"  style="float: right;margin-bottom: 10px" href="{{route('admin::addCategory')}}"><i class="fa fa-plus"></i> Add</a></div>
                    <div class="panel-body">
                        <table id="data-table" class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th>Sl No</th>
                                <th>Category Name</th>
                                <th>Category Image</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $i=0?>
                            @foreach($categories as $cat)
                                <?php $i++;
                                if($i%2==0){
                                    $class='even gradeC';
                                }else{
                                    $class='odd gradeX';
                                }
                                ?>
                                <tr class="{{$class}}">
                                    <td>{{$i}}</td>
                                    <td>{{isset($cat['category_name']) ? $cat['category_name'] : ''}}</td>
                                    <td><img src="{{url('/')}}/Category/image/{{isset($cat['image']) ? $cat['image'] : ''}}" style="width: 60px;height: 60px"></td>
                                    <td>
                                    <span id="status{{$cat->id}}">
                                        <?php if($cat->status == 'Active'){?>
                                        <a href="javascript:active_inactive_user('<?php echo $cat->id; ?>','<?php echo $cat->status; ?>');" class="btn btn-success"><span class="glyphicon glyphicon-ok-circle"></span> </a>&emsp;
                                        <?php } else{?>
                                        <a href="javascript:active_inactive_user('<?php echo $cat->id; ?>','<?php echo $cat->status; ?>');" class="btn btn-warning" ><span class="glyphicon glyphicon-ban-circle"></span> </a>&emsp;
                                        <?php } ?>
                                            </span>
                                        <a href="{{route('admin::editCategory',['id'=>$cat->id])}}" class="fancybox fancybox.iframe btn btn-primary"><span class="glyphicon glyphicon-edit"></span></a>&emsp;
                                        <a data-toggle="modal" data-target="#confirmDelete" class="btn btn-danger" onclick="getDeleteRoute('{{route('admin::deleteCategory',['id'=>$cat->id])}}')"><span class="glyphicon glyphicon-trash"></span></a>&emsp;


                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>Sl No</th>
                                <th>Category Name</th>
                                <th>Category Image</th>
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
                    url: '{{route('admin::status')}}',
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

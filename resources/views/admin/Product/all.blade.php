@extends('admin.layouts.adminlayout')
@section('content')
    <div id="content" class="content">
        <!-- begin breadcrumb -->
        <ol class="breadcrumb pull-right">
            <li><a href="javascript:;">Home</a></li>
            <li><a href="javascript:;">All Product</a></li>
            <li class="active">Manage Product</li>
        </ol>
        <!-- end breadcrumb -->
        <!-- begin page-header -->
        <h1 class="page-header">Manage Product</h1>
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
                        <h4 class="panel-title">Product</h4>
                    </div>
                    <div style="padding: 10px;"><a  class="btn btn-success  fancybox fancybox.iframe"  style="float: right;margin-bottom: 10px" href="{{route('admin::addProduct')}}"><i class="fa fa-plus"></i> Add</a></div>
                    <div class="panel-body">
                        <table id="data-table" class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th>Sl No</th>
                                <th>Category</th>
                                <th>Name</th>
                                <th>Image</th>
                                <th>Title</th>
                                <th>Price</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $i=0?>
                            @foreach($products as $ca)
                                <?php $i++;
                                if($i%2==0){
                                    $class='even gradeC';
                                }else{
                                    $class='odd gradeX';
                                }
                                ?>
                                <tr class="{{$class}}">
                                    <td>{{$i}}</td>
                                    <td>{{isset($ca->category['category_name']) ? $ca->category['category_name'] : ''}}</td>
                                    <td>{{isset($ca['product_name']) ? $ca['product_name'] : ''}}</td>
                                    <td><img src="{{url('/')}}/Product/image/{{isset($ca['product_image']) ? $ca['product_image'] : ''}}" width="80pxl;" height="80pxl;"></td>
                                    <td>{{isset($ca['product_title']) ? $ca['product_title'] : ''}}</td>
                                    <td>Rs.{{isset($ca['sale_price']) ? $ca['sale_price'] : ''}}</td>
                                    <td>
                                    <span id="status{{$ca->id}}">
                                        <?php if($ca->status == 'Active'){?>
                                        <a href="javascript:active_inactive_user('<?php echo $ca->id; ?>','<?php echo $ca->status; ?>');" class="btn btn-success"><span class="glyphicon glyphicon-ok-circle"></span> </a>&emsp;
                                        <?php } else{?>
                                        <a href="javascript:active_inactive_user('<?php echo $ca->id; ?>','<?php echo $ca->status; ?>');" class="btn btn-warning" ><span class="glyphicon glyphicon-ban-circle"></span> </a>&emsp;
                                        <?php } ?>
                                            </span>
                                        <a href="{{route('admin::editProduct',['id'=>$ca->id])}}" class="fancybox fancybox.iframe btn btn-primary"><span class="glyphicon glyphicon-edit"></span></a>&emsp;
                                        <a data-toggle="modal" data-target="#confirmDelete" class="btn btn-danger" onclick="getDeleteRoute('{{route('admin::deleteProduct',['id'=>$ca->id])}}')"><span class="glyphicon glyphicon-trash"></span></a>&emsp;
                                        <a class="btn btn-success fancybox fancybox.iframe"  style="float: right;margin-bottom: 10px" href="{{route('admin::addProductimage',['id'=>$ca->id])}}"><i class="fa  fa-plus-circle "></i></a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>Sl No</th>
                                <th>Category</th>
                                <th>Name</th>
                                <th>Image</th>
                                <th>Title</th>
                                <th>Price</th>
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
                    url: '{{route('admin::statusProduct')}}',
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

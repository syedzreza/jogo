@extends('admin.layouts.fancybox')
@section('content')

    <div id="content" class="content">
        <!-- begin page-header -->
        <h1 class="page-header">Add Product Images</h1>
        <!-- end page-header -->

        <!-- begin row -->
        <div class="row">
            <!-- begin col-6 -->
            <div class="col-md-12">
                <!-- begin panel -->
                <div class="panel panel-inverse" data-sortable-id="form-stuff-1">
                    <div class="panel-heading">
                        <div class="panel-heading-btn">
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                        </div>
                        <h4 class="panel-title">Product Images</h4>
                    </div>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div><br />
                    @endif
                    @if(Session::has('success'))
                        <div class="alert alert-success">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                            <strong>{{Session::get('success')}}</strong>
                        </div>
                    @endif
                    <div class="panel-body">
                        <form class="form-horizontal" action="{{route('admin::saveProductimage')}}" method="post" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <input type="hidden" id="pro_id" name="product_id" value="{{$id}}">
                            <div class="form-group">
                                <label class="col-md-3 control-label" >Product Images:</label>
                                <div class="col-md-6">
                                    <small id="imagesize">max size 2mb</small>
                                    <input type="file" class="form-control" id="image" name="images[]" placeholder="Enter Your Image" multiple/>
                                </div>
                            </div>
                            {{--<div class="col-md-12 mb-2">--}}
                                {{--<img id="preview-image-before-upload" src=""--}}
                                     {{--alt="preview image" style="max-height: 100px;">--}}
                            {{--</div>--}}
                            <div class="form-group">
                                <div class="col-md-12" style="text-align: center">
                                    <button type="submit" class="btn btn-sm btn-success">Submit</button>
                                </div>
                            </div>
                        </form>
                        <div>
                            {{--<spam>Image Dimension = 1920 * 1220</spam>--}}
                            <table class="table table-striped table-bordered">
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
                                @foreach($product_images as $user)
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
                                            <a data-toggle="modal" data-target="#confirmDelete" class="btn btn-danger" onclick="getDeleteRoute('{{route('admin::deleteProductimage',['id'=>$user->id])}}')"><span class="glyphicon glyphicon-trash"></span></a>&emsp;
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
                </div>
                <!-- end panel -->
            </div>
            <!-- end col-6 -->
        </div>
    </div>

    @push('scripts')
        <script type="text/javascript">
            $(document).ready(function (e) {
                // $('#image').change(function(){
                //     let reader = new FileReader();
                //     reader.onload = (e) => {
                //         $('#preview-image-before-upload').attr('src', e.target.result);
                //     };
                //     reader.readAsDataURL(this.files[0]);
                // });
            });

                //iamge validation
                $("#image").change(function () {
                    $("#imagesize").val("");
                    var image_size = $("#image")[0].files[0].size;
                    //alert(image_size);
                    if(image_size>2000000){
                        $("#image").val('');
                        $("#imagesize").css({"background-color": "red","color": "white"});
                        return false;
                    }
                    return true;
                });
        </script>
    @endpush
@endsection

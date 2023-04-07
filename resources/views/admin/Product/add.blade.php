@extends('admin.layouts.fancybox')
@section('content')
    <div id="content" class="content">

        <!-- begin page-header -->
        <h1 class="page-header">Add Product</h1>
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
                        <h4 class="panel-title">Product</h4>
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
                        <form class="form-horizontal" action="{{route('admin::saveProduct')}}" method="post" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label class="col-md-3 control-label">Category:</label>
                                <div class="col-md-6">
                                    <select name="cat_id" value="" class="form-control">
                                        <option value="">Select</option>
                                        @foreach($categories as $cat)
                                            <option value="{{$cat->id}}">{{$cat->category_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Product Name:</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="product_name" placeholder="Enter Your Name" />
                                </div>
                                {{--<span class="text-danger">@if($errors->has('product_name')) {{$message}} @endif</span>--}}
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Product Image:</label>
                                <div class="col-md-6">
                                    <input type="file" class="form-control" id="image" name="product_image" placeholder="Enter Your Image" />
                                </div>
                            </div>
                            <div class="col-md-12 mb-2">
                                <img id="preview-image-before-upload" src=""
                                     alt="preview image" style="max-height: 100px;">
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Product Title:</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="product_title" placeholder="Enter Your Title" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Product Description:</label>
                                <div class="col-md-6">
                                    <textarea type="text" class="form-control" name="product_description" placeholder="Enter Your Title" ></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Product Regular Price:</label>
                                <div class="col-md-6">
                                    <input type="number" class="form-control" name="regular_price" placeholder="Enter Your Regular Price" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Product Sale Price:</label>
                                <div class="col-md-6">
                                    <input type="number" class="form-control" name="sale_price" placeholder="Enter Your Sale Price" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Product Stock:</label>
                                <div class="col-md-6">
                                    <input type="number" class="form-control" name="in_stock" placeholder="Enter Stock" />
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12" style="text-align: center">
                                    <button type="submit" class="btn btn-sm btn-success">Submit</button>
                                </div>
                            </div>
                        </form>
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
                $('#image').change(function(){
                    let reader = new FileReader();
                    reader.onload = (e) => {
                        $('#preview-image-before-upload').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(this.files[0]);
                });
            });
        </script>
        <script type="text/javascript">
            $(document).ready(function (e) {
                $('#image1').change(function(){
                    let reader = new FileReader();
                    reader.onload = (e) => {
                        $('#preview-image-before-upload').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(this.files[0]);
                });
            });
        </script>
    @endpush
@endsection

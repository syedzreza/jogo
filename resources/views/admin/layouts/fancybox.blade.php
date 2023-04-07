<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<head>
    <meta charset="utf-8" />
    <title>Color Admin | Dashboard</title>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />

    <!-- ================== BEGIN BASE CSS STYLE ================== -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <link href="{{url('/')}}/admintheme/assets/plugins/jquery-ui/themes/base/minified/jquery-ui.min.css" rel="stylesheet" />
    <link href="{{url('/')}}/admintheme/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
    <link href="{{url('/')}}/admintheme/assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
    <link href="{{url('/')}}/admintheme/assets/css/animate.min.css" rel="stylesheet" />
    <link href="{{url('/')}}/admintheme/assets/css/style.min.css" rel="stylesheet" />
    <link href="{{url('/')}}/admintheme/assets/css/style-responsive.min.css" rel="stylesheet" />
    <link href="{{url('/')}}/admintheme/assets/css/theme/default.css" rel="stylesheet" id="theme" />
    <!-- ================== END BASE CSS STYLE ================== -->

    <!-- ================== BEGIN PAGE CSS ================== -->
    <link href="{{url('/')}}/admintheme/assets/plugins/summernote/summernote.css" rel="stylesheet" />
    <!-- ================== END PAGE CSS ================== -->

    <!-- ================== BEGIN PAGE LEVEL STYLE ================== -->
    <link href="{{url('/')}}/admintheme/assets/plugins/jquery-jvectormap/jquery-jvectormap.css" rel="stylesheet" />
    <link href="{{url('/')}}/admintheme/assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.css" rel="stylesheet" />
    <link href="{{url('/')}}/admintheme/assets/plugins/gritter/css/jquery.gritter.css" rel="stylesheet" />
    <link href="{{url('/')}}/admintheme/assets/plugins/DataTables/media/css/dataTables.bootstrap.min.css" rel="stylesheet" />
    <link href="{{url('/')}}/admintheme/assets/plugins/DataTables/extensions/Responsive/css/responsive.bootstrap.min.css" rel="stylesheet" />

    <link href="{{url('/')}}/admintheme/assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.css" rel="stylesheet" />
    <link href="{{url('/')}}/admintheme/assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.css" rel="stylesheet" />
    <link href="{{url('/')}}/admintheme/assets/plugins/ionRangeSlider/css/ion.rangeSlider.css" rel="stylesheet" />
    <link href="{{url('/')}}/admintheme/assets/plugins/ionRangeSlider/css/ion.rangeSlider.skinNice.css" rel="stylesheet" />
    <link href="{{url('/')}}/admintheme/assets/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css" rel="stylesheet" />
    <link href="{{url('/')}}/admintheme/assets/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css" rel="stylesheet" />
    <link href="{{url('/')}}/admintheme/assets/plugins/password-indicator/css/password-indicator.css" rel="stylesheet" />
    <link href="{{url('/')}}/admintheme/assets/plugins/bootstrap-combobox/css/bootstrap-combobox.css" rel="stylesheet" />
    <link href="{{url('/')}}/admintheme/assets/plugins/bootstrap-select/bootstrap-select.min.css" rel="stylesheet" />
    <link href="{{url('/')}}/admintheme/assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css" rel="stylesheet" />
    <link href="{{url('/')}}/admintheme/assets/plugins/jquery-tag-it/css/jquery.tagit.css" rel="stylesheet" />
    <link href="{{url('/')}}/admintheme/assets/plugins/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet" />
    <link href="{{url('/')}}/admintheme/assets/plugins/select2/dist/css/select2.min.css" rel="stylesheet" />
    <link href="{{url('/')}}/admintheme/assets/plugins/bootstrap-eonasdan-datetimepicker/build/css/bootstrap-datetimepicker.min.css" rel="stylesheet" />
    <link href="{{url('/')}}/admintheme/assets/plugins/bootstrap-colorpalette/css/bootstrap-colorpalette.css" rel="stylesheet" />
    <link href="{{url('/')}}/admintheme/assets/plugins/jquery-simplecolorpicker/jquery.simplecolorpicker.css" rel="stylesheet" />
    <link href="{{url('/')}}/admintheme/assets/plugins/jquery-simplecolorpicker/jquery.simplecolorpicker-fontawesome.css" rel="stylesheet" />
    <link href="{{url('/')}}/admintheme/assets/plugins/jquery-simplecolorpicker/jquery.simplecolorpicker-glyphicons.css" rel="stylesheet" />
    <!-- ================== END PAGE LEVEL STYLE ================== -->

    <!-- ================== BEGIN BASE JS ================== -->
    <script src="{{url('/')}}/admintheme/assets/plugins/pace/pace.min.js"></script>
    <!-- ================== END BASE JS ================== -->
    <!-- Froala Text Editor-->
    {{--<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />--}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.25.0/codemirror.min.css">
    <!-- Include Editor style. -->
    <link href="https://cdn.jsdelivr.net/npm/froala-editor@2.9.4/css/froala_editor.pkgd.min.css" rel="stylesheet" type="text/css" />
    <link href="https://cdn.jsdelivr.net/npm/froala-editor@2.9.4/css/froala_style.min.css" rel="stylesheet" type="text/css" />
</head>
<style>
    .content {
         margin-left: 0px !important;
    }
</style>
<body>

<div class="modal fade" id="confirmDelete" role="dialog" aria-labelledby="confirmDeleteLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Delete Parmanently</h4>
            </div>
            <div class="modal-body">
                <p>Are you sure about this ?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <a href="" class="btn btn-danger" id="confirm_del">Delete</a>
            </div>
        </div>
    </div>
</div>

<!-- begin #page-loader -->
{{--<div id="page-loader" class="fade in"><span class="spinner"></span></div>--}}
<!-- end #page-loader -->

<!-- begin #page-container -->
@yield('content')
<!-- end page container -->
<script src="//code.jquery.com/jquery-3.3.1.min.js"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.2.5/jquery.fancybox.min.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.2.5/jquery.fancybox.min.js"></script>
<script>
    $('[data-fancybox]').fancybox({
        buttons : [
            'zoom',
            'close'
        ]
    });
</script>
<!-- ================== BEGIN BASE JS ================== -->
<script src="{{url('/')}}/admintheme/assets/plugins/jquery/jquery-1.9.1.min.js"></script>
{{--<script src="//code.jquery.com/jquery-3.3.1.min.js"></script>--}}
<script src="{{url('/')}}/admintheme/assets/plugins/jquery/jquery-migrate-1.1.0.min.js"></script>
<script src="{{url('/')}}/admintheme/assets/plugins/jquery-ui/ui/minified/jquery-ui.min.js"></script>
<script src="{{url('/')}}/admintheme/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
<!--[if lt IE 9]>
<script src="{{url('/')}}/admintheme/assets/crossbrowserjs/html5shiv.js"></script>
<script src="{{url('/')}}/admintheme/assets/crossbrowserjs/respond.min.js"></script>
<script src="{{url('/')}}/admintheme/assets/crossbrowserjs/excanvas.min.js"></script>
<![endif]-->
<script src="{{url('/')}}/admintheme/assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
<script src="{{url('/')}}/admintheme/assets/plugins/jquery-cookie/jquery.cookie.js"></script>
<!-- ================== END BASE JS ================== -->

<!-- ================== BEGIN PAGE LEVEL JS ================== -->
<script src="{{url('/')}}/admintheme/assets/plugins/gritter/js/jquery.gritter.js"></script>
<script src="{{url('/')}}/admintheme/assets/plugins/flot/jquery.flot.min.js"></script>
<script src="{{url('/')}}/admintheme/assets/plugins/flot/jquery.flot.time.min.js"></script>
<script src="{{url('/')}}/admintheme/assets/plugins/flot/jquery.flot.resize.min.js"></script>
<script src="{{url('/')}}/admintheme/assets/plugins/flot/jquery.flot.pie.min.js"></script>
<script src="{{url('/')}}/admintheme/assets/plugins/sparkline/jquery.sparkline.js"></script>
<script src="{{url('/')}}/admintheme/assets/plugins/jquery-jvectormap/jquery-jvectormap.min.js"></script>
<script src="{{url('/')}}/admintheme/assets/plugins/jquery-jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<script src="{{url('/')}}/admintheme/assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script src="{{url('/')}}/admintheme/assets/plugins/DataTables/media/js/jquery.dataTables.js"></script>
<script src="{{url('/')}}/admintheme/assets/plugins/DataTables/media/js/dataTables.bootstrap.min.js"></script>
<script src="{{url('/')}}/admintheme/assets/plugins/DataTables/extensions/Responsive/js/dataTables.responsive.min.js"></script>
<script src="{{url('/')}}/admintheme/assets/js/table-manage-default.demo.min.js"></script>
<script src="{{url('/')}}/admintheme/assets/js/dashboard.min.js"></script>
<script src="{{url('/')}}/admintheme/assets/plugins/summernote/summernote.min.js"></script>
<script src="{{url('/')}}/admintheme/assets/js/form-summernote.demo.min.js"></script>

<script src="{{url('/')}}/admintheme/assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script src="{{url('/')}}/admintheme/assets/plugins/ionRangeSlider/js/ion-rangeSlider/ion.rangeSlider.min.js"></script>
<script src="{{url('/')}}/admintheme/assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
<script src="{{url('/')}}/admintheme/assets/plugins/masked-input/masked-input.min.js"></script>
<script src="{{url('/')}}/admintheme/assets/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js"></script>
<script src="{{url('/')}}/admintheme/assets/plugins/password-indicator/js/password-indicator.js"></script>
<script src="{{url('/')}}/admintheme/assets/plugins/bootstrap-combobox/js/bootstrap-combobox.js"></script>
<script src="{{url('/')}}/admintheme/assets/plugins/bootstrap-select/bootstrap-select.min.js"></script>
<script src="{{url('/')}}/admintheme/assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.min.js"></script>
<script src="{{url('/')}}/admintheme/assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput-typeahead.js"></script>
<script src="{{url('/')}}/admintheme/assets/plugins/jquery-tag-it/js/tag-it.min.js"></script>
<script src="{{url('/')}}/admintheme/assets/plugins/bootstrap-daterangepicker/moment.js"></script>
<script src="{{url('/')}}/admintheme/assets/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>
<script src="{{url('/')}}/admintheme/assets/plugins/select2/dist/js/select2.min.js"></script>
<script src="{{url('/')}}/admintheme/assets/plugins/bootstrap-eonasdan-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
<script src="{{url('/')}}/admintheme/assets/plugins/bootstrap-show-password/bootstrap-show-password.js"></script>
<script src="{{url('/')}}/admintheme/assets/plugins/bootstrap-colorpalette/js/bootstrap-colorpalette.js"></script>
<script src="{{url('/')}}/admintheme/assets/plugins/jquery-simplecolorpicker/jquery.simplecolorpicker.js"></script>
<script src="{{url('/')}}/admintheme/assets/js/form-plugins.demo.min.js"></script>
<script src="{{url('/')}}/admintheme/assets/js/apps.min.js"></script>
<!-- ================== END PAGE LEVEL JS ================== -->
{{--<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>--}}
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.25.0/codemirror.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.25.0/mode/xml/xml.min.js"></script>
<!-- Include Editor JS files. -->
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/froala-editor@2.9.4/js/froala_editor.pkgd.min.js"></script>

<script>
    $(document).ready(function() {
        App.init();
        // Dashboard.init();
        TableManageDefault.init();
        FormPlugins.init();
//        $(".summernote").summernote({
//            placeholder: 'Enter Your Address.',
//            tabsize: 2,
//            height: 100
//            });
        $('.datepicker').datepicker({
            format: 'yyyy-mm-dd',
            todayHighlight:'true',
             autoclose:true,
        });
    });
</script>
<script> $(function() { $('.summernote').froalaEditor() }); </script>
<script>
    function getDeleteRoute($route)
    {
        $('#confirm_del').attr('href',$route);
    }
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-53034621-1', 'auto');
    ga('send', 'pageview');

    $(document).ready(function() {
        $('.number').keypress(function (event) {
            return isNumber(event, this)
        });
    });
    function isNumber(evt, element) {
        var charCode = (evt.which) ? evt.which : event.keyCode
        if ((charCode != 45 || $(element).val().indexOf('-') != -1) &&
            (charCode != 46 || $(element).val().indexOf('.') != -1) &&
            (charCode < 48 || charCode > 57))
            return false;
        return true;
    }
</script>
@stack('scripts')
</body>
</html>

<!DOCTYPE html>
<html lang="en_US" class="js">
    <head>

        <meta charset="utf-8" />
        <meta name="author" content="" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <!-- csrf-token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="description" content="" />
        <!-- Fav Icon  -->
        <link rel="shortcut icon" href="{{asset(@$globalSettings->favicon)}}" />
        <!-- Page Title  -->
        <title>IAS STUDYHUB</title>
        <!-- StyleSheets  -->
        <link rel="stylesheet" href="{{asset('backend/assets/css/dashlite.css?ver=2.3.0')}}" />
        <link rel="stylesheet" href="{{asset('backend/assets/css/body.css?ver=1')}}" />
        <link id="skin-default" rel="stylesheet" href="{{asset('backend/assets/css/theme.css?ver=2.3.0')}}" />
        <link rel="stylesheet" href="{{asset('backend/assets/css/loader.css')}}" />
        <link href="{{asset('fontawesome/css/all.css')}}" rel="stylesheet" />

        <style>
        .sort-class{
             cursor: pointer;
        }
        </style>
        @yield('stylesheet')
    </head>

    <body class="nk-body bg-lighter npc-default has-sidebar {{ (Auth::guard('admin')->user()->theme ==2)?'dark-mode':'' }}">
        <div class="nk-app-root">
            <div class="nk-main">
                @include('admin.layouts.sidebar')
                <div class="nk-wrap">
                    @include('admin.layouts.header')
                    <div class="nk-content">
                        <div class="container-fluid">
                            <div class="nk-content-inner">
                                <div class="nk-content-body">
                                    <div id="loader" style="display: none" class="loader text-center">
                                        <img src='{{asset(@$globalSettings->favicon)}}' class="loader-image" width='32px' height='32px'>
                                    </div>
                                    @yield('content')
                                </div>
                            </div>
                        </div>
                    </div>
                    @include('admin.layouts.footer')
                </div>
            </div>
        </div>


        <!-- JavaScript -->

        <script src="{{asset('backend/assets/js/bundle.js?ver=2.3.0')}}"></script>
        <script src="{{asset('backend/assets/js/scripts.js?ver=2.3.0')}}"></script>

        <script src="{{asset('backend/assets/js/charts/chart-ecommerce.js?ver=2.3.0')}}"></script>
        <script src="{{asset('backend/assets/js/example-sweetalert.js?ver=2.3.0')}}"></script>
        @yield('javascript')

        <script src="{{url('backend/assets/js/admin_side.js')}}"></script>

        <script src="{{asset('tinymce/tinymce.min.js')}}"></script>
        <script>
            var fileUploadUrl = "{{route('fileUploadEditor')}}";
            const editor_config = {
                force_p_newlines: false,
                remove_linebreaks: false,
                forced_root_block: "",
                path_absolute: "{{ url('/') }}/",
                selector: "textarea.tinymce-editor",
                extended_valid_elements: false,
                height: 300,
                readonly: false,
                menubar: false,
                plugins: [
                    "codesample advlist autolink lists link image charmap print preview hr anchor pagebreak",
                    "searchreplace wordcount visualblocks visualchars  code fullscreen",
                    "insertdatetime media nonbreaking save table contextmenu directionality",
                    "emoticons paste textcolor colorpicker textpattern ",
                ],
                toolbar: "insertfile undo redo | codesample| styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",

                relative_urls: false,
                convert_urls: false,
                images_upload_handler: function (blobInfo, success, failure) {
                    var xhr, formData;
                    xhr = new XMLHttpRequest();
                    xhr.withCredentials = false;
                    xhr.open("POST", fileUploadUrl);
                    var token = "{{ csrf_token() }}"; //document.getElementById("_token").value;
                    xhr.setRequestHeader("X-CSRF-Token", token);
                    xhr.onload = function () {
                        var json;
                        if (xhr.status != 200) {
                            failure("HTTP Error: " + xhr.status);
                            return;
                        }
                        json = JSON.parse(xhr.responseText);

                        if (!json || typeof json.location != "string") {
                            failure(xhr.responseText);
                            return;
                        }
                        success(json.location);
                    };
                    formData = new FormData();
                    formData.append("file", blobInfo.blob(), blobInfo.filename());
                    xhr.send(formData);
                },
            };
            tinymce.init(editor_config);
        </script>



<script>
    $.extend(true, $.fn.dataTable.defaults, {
    "lengthMenu": [[ 10, 20,30,40, 50, 60,70,80,90,100], [10, 20,30,40, 50, 60,70,80,90,100]],
    "pageLength": 100

});
</script>


    </body>
</html>

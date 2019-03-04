@extends('layouts.dash')

@section('main')
    <div class="container-fluid">
        @if ( $errors->any() )
            <div class="col-md-12 col-xs-12">
                <div class="card">
                    <div class="header bg-red">
                        <h2>
                            Error: You Have A Mistaje With Data You Entered
                        </h2>
                    </div>
                    <div class="body">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        @endif
    </div>
    <div class="container-fluid">
        <!-- Input -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2> Add Page </h2>
                    </div>
                    <form  class="body" method="post" action="{{ route('dash.addpage.p') }}" novalidate>
                        @csrf
                        <div class="row clearfix">
                            <div class="col-md-9">
                                <div class="form-group">
                                    <label class="control-label">Page Name</label>
                                    <div class="form-line">
                                        <input autofocus type="text" class="form-control" name="pagetitle" placeholder="title" id="pagetitle">
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-12 col-md-3">
                                <!-- Switch -->
                                <div class="form-group">
                                    <label class="control-label">Statues</label>
                                    <div class="switch">
                                    <label>
                                        deactivate
                                        <input name="statues" checked type="checkbox">
                                        <span class="lever"></span>
                                        activate
                                    </label>
                                </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label">Page Description</label>
                                    <div class="form-line">
                                        <input type="text" name="pagedesc" class="form-control" placeholder="page. Description" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label">keywords</label>
                                    <div class="form-line">
                                        <input type="text" data-role="tagsinput"  id="keyword" required name="keyword" class="form-control" placeholder="keywords">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Page Information</label>
                                    <textarea id="summernote" rows="5" class="form-control my-editor"  name="pagecont" required></textarea>
                                </div>
                            </div>

                            <div class="col-md-4 pull-right">
                                <input  class="btn btn-block btn-warning" type="submit" value="ADD">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@push("js")
    <script src="{{ asset('dash/plugins/bootstrap-tagsinput/js/bootstrap-tagsinput.js') }}"></script>
    <script src="{{ asset('dash/plugins/jquery-datatable/extensions/export/pdfmake.min.js') }}"></script>
    <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
    <script>
        var editor_config = {
            height:250,
            path_absolute : "/",
            selector: "textarea#summernote",
            plugins: [
                "advlist autolink lists link image charmap print preview hr anchor pagebreak",
                "searchreplace wordcount visualblocks visualchars code fullscreen",
                "insertdatetime media nonbreaking save table contextmenu directionality",
                "emoticons template paste textcolor colorpicker textpattern"
            ],
            toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
            relative_urls: false,
            setup: function (editor) {
                editor.on('submit', function (e) {
                    if ($(this.getContent()).find('img').length == 0){

                        if(confirm('There Is No Image Inserted ! Do you need to continue without it ?') == true){

                        }else {
                            e.preventDefault();
                        }
                    }
                });
            },
            file_browser_callback : function(field_name, url, type, win) {
                var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
                var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;

                var cmsURL = editor_config.path_absolute + 'filemanager?field_name=' + field_name;


                tinyMCE.activeEditor.windowManager.open({
                    file : cmsURL,
                    title : 'Filemanager',
                    width : x * 0.8,
                    height : y * 0.8,
                    resizable : "yes",
                    close_previous : "no"
                });
            }
        };

        tinymce.init(editor_config);

        $("#pagetitle").keyup(function () {
            if ($(this).val().length < 1){
                $("title").text("Add Page > ");
            }else {
                $("title").text('Add Page > '+$(this).val());
            }
        });
    </script>
@endpush

@push("css")
    @include("layouts.editorscss")
    <style>
        .btn:not(.btn-link):not(.btn-circle) i {
            font-size: 13px !important;
            position: initial !important;
        }
        .note-form-control {
            border: 1px solid #d8d7d7 !important;
            padding: 13px !important;
            width: 100% !important;
        }
    </style>
@endpush

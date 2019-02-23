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
                            <h2> Add Project </h2>
                        </div>
                        <form class="body" method="post" action="{{ route('dash.addpro.p') }}">
                           @csrf
                            <div class="row clearfix">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label class="control-label">Project Name</label>
                                        <div class="form-line">
                                            <input autofocus type="text" class="form-control" name="protitle" placeholder="title" id="protitle">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">Project Language</label>
                                        <select class="form-control show-tick" name="prolang" required data-live-search="true">
                                            <option value="None">None</option> <option disabled>--- POPULAR LANGUAGES ---</option> <option value="Bash">Bash</option> <option value="C">C</option> <option value="C#">C#</option> <option value="C++">C++</option> <option value="CSS">CSS</option> <option value="HTML">HTML</option> <option value="Java">Java</option> <option value="JavaScript">JavaScript</option> <option value="JSON">JSON</option> <option value="Lua">Lua</option> <option value="Markdown">Markdown</option> <option value="Objective C">Objective C</option> <option value="Perl">Perl</option> <option value="PHP">PHP</option> <option value="Python">Python</option> <option value="Ruby">Ruby</option> <option value="Swift">Swift</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label">Project Description</label>
                                        <div class="form-line">
                                            <input type="text" name="prodesc" class="form-control" placeholder="Pro. Description" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Project Demo URL</label>
                                        <div class="form-line">
                                            <input type="url" name="demourl" class="form-control" placeholder="Demo URL">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Project Github URL</label>
                                        <div class="form-line">
                                            <input type="url" name="giturl" class="form-control" placeholder="Github URL">
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
                                        <label>Project Information</label>
                                        <textarea id="summernote" class="form-control my-editor"
                                                  name="procont"></textarea>
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
                        confirm('There Is No Image Inserted !')
                        e.preventDefault();
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

        $("#protitle").keyup(function () {
            if ($(this).val().length < 1){
                $("title").text("Add Project > ");
            }else {
                $("title").text('Add Project > '+$(this).val());
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

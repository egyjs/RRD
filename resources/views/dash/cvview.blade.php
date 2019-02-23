@extends('layouts.dash')

@section('main')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="container-fluid">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        CVs
                        <small>Select Or upload your CV in <span style="color: red;">.zip</span> file (html cv project)
                        </small>
                    </h2>

                </div>
                <div class="body">
                    <div class="row">
                        @if($path != null)
                            <div class="col-sm-6 col-md-4">
                                <div class="thumbnail">
                                    <img style="height: 150px;width: 100%;" src="{{ $screen  }}">
                                    <div class="caption">
                                        <h3>{{ strtoupper($path) }}</h3>
                                        <a href="javascript:void(0);" class="btn btn-primary waves-effect   right"
                                           role="button">Update</a>
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="col-sm-6 col-md-4">
                            <div class="thumbnail">
                                <div class="caption text-center">
                                    <h2>Add a cv theme</h2>
                                    <p>
                                        <a href="javascript:void(0);" class="btn btn-primary waves-effect right"
                                           data-toggle="modal" data-target="#uploadcv">Add</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div id="uploadcv" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <form class="modal-content" action="{{ route('AddCVview') }}"  method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Upload Zip</h4>
                </div>
                <div class="modal-body">
                    <input class="form-control" name="html-zip" required type="file" accept="application/zip,application/x-zip,application/x-zip-compressed">
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" >Upload</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </form>

        </div>
    </div>
@endsection

@push("css")
@endpush

@push("js")
@endpush

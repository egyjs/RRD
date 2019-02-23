@extends('layouts.dash')

@section('main')
    <div class="container-fluid">
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
            <!-- Input -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2> Add Service
                                <small>with icons</small>  </h2>
                        </div>
                        <form enctype="multipart/form-data" class="body" method="post" action="{{ route('dash.addservice.p') }}">
                           @csrf
                            {{--<h2 class="card-inside-title">Different Widths</h2>--}}
                            <div class="row clearfix">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <input type="hidden" id="icon" name="icon" value="fas fa-spinner fa-spin" />
                                            <div class="btn-group ">
                                                <button type="button" class="btn btn-primary iconpicker-component">
                                                    <i class="fas fa-spinner fa-spin"></i></button>
                                                <button type="button" class="icp icp-dd btn btn-primary dropdown-toggle" data-selected="fa-car" data-toggle="dropdown">
                                                    <i class="fas fa-sort-down"></i>
                                                </button>
                                                <div class="dropdown-menu"></div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group ">
                                                <div class="form-line">
                                                    <input type="file" class="form-control-file" name="icon" placeholder="Icon Image" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-10">
                                    <div class="form-group ">
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="title" placeholder="Title Of Service" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <textarea rows="4" name="content" class="form-control no-resize" placeholder="Please type what you want..."></textarea>
                                        </div>
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

    <script>
        $('.icp').iconpicker({
            title: 'Choose Icon',
        }).data('iconpicker').show();
        $('.icp').on('iconpickerSelected', function (e) {
            $('#icon').val(e.iconpickerInstance.options.fullClassFormatter(e.iconpickerValue))
        });
    </script>
@endpush


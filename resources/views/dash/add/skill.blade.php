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
                            <h2> Add Skill
                                <small>with icons</small>  </h2>
                        </div>
                        <form class="body" method="post" action="{{ route('dash.addskill.p') }}">
                           @csrf
                            {{--<h2 class="card-inside-title">Different Widths</h2>--}}
                            <div class="row clearfix">

                                <div class="col-md-4">
                                    <div class="form-group ">
                                        <div class="form-line">
                                            <input type="number" class="form-control" name="percent" placeholder="Professional Range ex. 80%" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-5">
                                    <div class="form-group ">
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="title" placeholder="Skill Name" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-3">
                                    <!-- Switch -->
                                    <div class="switch">
                                        <label>
                                            Off
                                            <input name="statues" type="checkbox">
                                            <span class="lever"></span>
                                            On
                                        </label>
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


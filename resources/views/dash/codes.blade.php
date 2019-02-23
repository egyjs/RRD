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
            @if ( session()->has('statues') )
                <div class="col-md-12 col-xs-12">
                    <div class="card">
                        <h5 class="alert alert-{{ session('statues') }}">
                            {{ session('msg') }}
                        </h5>
                    </div>
                </div>
        @endif
        <!-- Input -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2><i style="position: relative; top: 5px;" class="material-icons">verified_user </i>
                                Registration Codes</h2>
                            <button type="button" id="newCode"
                                    class="btn header-dropdown m-r--5 bg-primary waves-effect m-r-20">
                                <i class="material-icons">add</i>
                                <span>Create One</span>
                            </button>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Code</th>
                                        <th>statues</th>
                                        <th>Delete</th>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th>ID</th>
                                        <th>Code</th>
                                        <th>statues</th>
                                        <th>Delete</th>
                                    </tr>
                                    </tfoot>
                                    <tbody class="allcodes">
                                    @foreach($codes as $key => $r )
                                        <tr>
                                            <td>{{ $key+1 }}</td>
                                            <td>{{ $r->code }}</td>
                                            <td>
                                                @if($r->statues == 0)
                                                    <button class="btn btn-success">Not Used</button>
                                                @elseif($r->statues == 1)
                                                    <button class="btn btn-danger">Used</button>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="javascript:void(0);"
                                                   onclick="event.preventDefault();document.getElementById('removeCode-form{{ $r->id }}').submit();"
                                                   class="btn btn-danger btn-circle waves-effect m-r-20">
                                                    <i style="top: 5px" class="material-icons mt-1">delete</i></a>
                                                <form method="post"
                                                      action="{{ route('dash.register-code.delete',$r->id) }}"
                                                      style="display: none" id="removeCode-form{{ $r->id }}">
                                                    @csrf
                                                    {!! method_field('delete') !!}
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>


        @endsection

        @push("css")
            <style>
                .modal-title i, .modal-body i {
                    position: relative;
                    top: 6px;
                }

                #newCode:hover {
                    text-decoration: none;
                    color: #fff;
                }

                #newCode i {
                    color: white;
                }
            </style>
            <link rel="stylesheet" href="{{ asset('dash/plugins/sweetalert/sweetalert.css') }}">
            @include("layouts.datatablecss")
        @endpush
        @push("js")
            @include("layouts.datatablejs")
            <script src="{{ asset('dash/plugins/sweetalert/sweetalert.min.js') }}"></script>

            <script>
                var newCodeNumber = $(".allcodes tr").length + 1;
                $("#newCode").click(function () {
                    $.ajax({
                        url: "{{ route("dash.register-code.add") }}",
                        type: "POST",
                        data: {_token: "{{ csrf_token() }}"},
                        success: function (data, response) {
                            console.log(data);
                            swal({
                                title: "Great! The Code Is " + data,
                                type: "success"
                            });
                            $(".allcodes").load("{{ route('dash.component.registerCodesTable') }}");
                        }
                    });
                });
            </script>
    @endpush

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
                            <h2> hrs

                            </h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>statues</th>
                                        <th>More Info</th>
                                        <th>Delete</th>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>statues</th>
                                        <th>More Info</th>
                                        <th>Delete</th>
                                    </tr>
                                    </tfoot>
                                    <tbody class="allHrs">
                                    @foreach($requests as $key => $r )
                                        <tr>
                                            <td>{{ $key+1 }}</td>
                                            <td>{{ $r->fullname }}</td>
                                            <td>{{ $r->email }}</td>
                                            <td>{{ $r->phone }}</td>
                                            <td>
                                                @if($r->statues == 0)
                                                    <button class="btn btn-warning">Wait List</button>
                                                @elseif($r->statues == 1)
                                                    <button class="btn btn-success">Approved</button>
                                                @else
                                                    <button class="btn btn-danger">Rejected</button>
                                                @endif
                                            </td>
                                            <td>
                                                <button type="button"
                                                        class="btn btnmodel bg-green btn-circle waves-effect m-r-20"
                                                        data-toggle="modal" data-target="#request{{ $r->id }}">
                                                    <i class="material-icons">call_missed_outgoing</i></button>
                                            </td>
                                            <td>
                                                <button type="button" data-id="{{ $r->id }}"
                                                        class="removerequest btn bg-red btn-circle waves-effect m-r-20">
                                                    <i style="top:2px; " class="material-icons">delete</i></button>
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

        {{-- Requests Models --}}
        <div class="hrs-models">
            @foreach($requests as $request)
            <div class="modal animated bounceIn" id="request{{ $request->id }}" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="largeModalLabel"><i class="material-icons">person</i>{{ $request->fullname }}</h4>
                        </div>
                        <div class="modal-body">
                            <h5>
                                <i class="material-icons">email</i> Email : <a href="mailto:{{ $request->email }}"> {{ $request->email }}</a>
                            </h5>
                            <h5>
                                <i class="material-icons">phone</i> Phone :<a href="tel:{{ $request->phone }}"> {{ $request->phone }}</a>
                            </h5>
                            <h5>
                                <i class="material-icons">attachment</i> CV :<a target="_blank" href="{{ $request->cv }}">View CV</a>
                            </h5>
                            <h5>
                                <i class="material-icons">remove_red_eye</i> Tracks :<a href="javascript:void(0);">{{ $request->track }}</a>
                            </h5>
                            <h5>
                                <i class="material-icons">speaker_notes</i> Additional Notes : <br><br> <textarea class="form-control" readonly="" disabled=""> {{ $request->notes }}</textarea>
                            </h5>
                            <hr style="height:5px;background: #eee;">
                            <div class="row">
                                <div class="container">
                                    <h4>Actions: </h4>
                                    <button data-id="{{ $request->email }}" data-name="{{ $request->fullname }}" type="button" class="btn btn-success waves-effect accept">
                                        <i class="material-icons">done</i>
                                        <span>Approve</span>
                                    </button>
                                    <button data-id="{{ $request->email }}" data-name="{{ $request->fullname }}" type="button" class="btn btn-danger waves-effect reject">
                                        <i class="material-icons">thumb_down</i>
                                        <span>Reject Request</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        </div>


    @endsection

        @push("css")
            <style>
                .modal-title i , .modal-body i{
                    position: relative;
                    top: 6px;
                }
            </style>
            <link rel="stylesheet" href="{{ asset('dash/plugins/sweetalert/sweetalert.css') }}">
        @include("layouts.datatablecss")
        @endpush
    @push("js")
        <!-- Bootstrap Notify Plugin Js -->
            @include("layouts.datatablejs")
            {{-- <script src="{{ asset('dash/plugins/bootstrap-notify/bootstrap-notify.js') }}"></script>
           --}} <!-- Waves Effect Plugin Js -->
            <script src="{{ asset('dash/plugins/sweetalert/sweetalert.min.js') }}"></script>
            <script>
                $(".accept").click(function(){
                    let id = $(this).attr('data-id');
                    let name = $(this).attr('data-name');
                    swal({
                        title: "Are You Sure To Approve "+name+" Work Request" ,
                        text: "Submit To Approve And Send Email To "+name,
                        type: "info",
                        showCancelButton: true,
                        closeOnConfirm: false,
                        showLoaderOnConfirm: true,
                    }, function () {
                        $.ajax({
                            url: "{{ route("dash.hr.accept") }}",
                            type:"POST",
                            data:{ _token:"{{ csrf_token() }}",email:id},
                            success: function (data,response) {
                                swal("Good job!", "the Email has been Sent To Him Successfully !", "success");
                                $(".allHrs").load("{{ route('dash.component.HrsTable') }}");
                            }
                        });
                    });
                });
                $(".reject").click(function(){
                    let id = $(this).attr('data-id');
                    let name = $(this).attr('data-name');
                    swal({
                        title: "Are You Sure To Reject "+name+" Work Request" ,
                        text: "Submit To Reject And Send Email To"+name,
                        type: "error",
                        showCancelButton: true,
                        closeOnConfirm: false,
                        showLoaderOnConfirm: true,
                    }, function () {
                        $.ajax({
                            url: "{{ route("dash.hr.reject") }}",
                            type:"POST",
                            data:{ _token:"{{ csrf_token() }}",email:id},
                            success: function (data,response) {
                                swal("OK!", "The Email has been  Sent To Him Successfully !", "success");
                                $(".allHrs").load("{{ route('dash.component.HrsTable') }}");
                            }
                        });
                    });
                });
                $(".removerequest").click(function () {
                    let id = $(this).attr('data-id');
                    let element = $(this).parent().parent();
                    $.ajax({
                        url:"{{ route('dash.hr.delete') }}",
                        type:"POST",
                        data:{_token:"{{ csrf_token() }}",id:id},
                        success: function (data,response) {
                            element.slideUp(500);
                            element.remove();
                        },
                        fail:function (error) {
                            console.log(error);
                        }
                    });
                });
            </script>

    @endpush

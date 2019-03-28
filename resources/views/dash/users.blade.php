@extends('layouts.dash')

@section('main')

    <div class="container-fluid">
        <div class="container-fluid">
            @if ( $errors->any() )
                <div class="col-md-12 col-xs-12">
                    <div class="card">
                        <div class="header bg-red">
                            <h2>
                                Error: You Have A Mistake With Data You Entered
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
                            <h2><i style="position: relative; top: 5px;" class="material-icons">person_pin_circle  </i>
                                Mange Users</h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                    <tr>
                                        <th>Username</th>
                                        <th>Current Jop</th>
                                        <th>Modify Jop</th>
                                        <th>Delete</th>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th>User</th>
                                        <th>Current Jop</th>
                                        <th>Modify Jop</th>
                                        <th>Delete</th>
                                    </tr>
                                    </tfoot>
                                    <tbody class="allcodes">
                                    @foreach($users as $key => $user )
                                        <tr>
                                            <td>{{ $user->username }}</td>
                                            <td>
                                                @foreach($user->roles()->get() as $role)
                                                    <button class="btn role"
                                                            onclick="removerole({{ $role->id }},{{ $user->id }})">{{ $role->name }}</button>
                                                @endforeach
                                            </td>
                                            <td>
                                                <select onchange="changeType({{ $user->id }},$(this).val())" class="form-control show-tick">
                                                    <option value="">-- Please select --</option>
                                                    <option value="User">Normal User</option>
                                                    <option value="Writer">Writer</option>
                                                    <option value="Users manager">Users Manger</option>
                                                </select>
                                            </td>
                                            <td>
                                                <a href="javascript:void(0);"
                                                   onclick="event.preventDefault();document.getElementById('removeCode-form{{ $user->id }}').submit();"
                                                   class="btn btn-danger btn-circle waves-effect m-r-20">
                                                    <i style="top: 5px" class="material-icons mt-1">delete</i></a>
                                                <form method="post"
                                                      action="{{ route('dash.user.delete',$user->id) }}"
                                                      style="display: none" id="removeCode-form{{ $user->id }}">
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
                .role{
                    margin-bottom: 3px;
                    -webkit-transition: ease 0.3s  ;
                    -moz-transition: ease 0.3s  ;
                    -ms-transition: ease 0.3s  ;
                    -o-transition: ease 0.3s  ;
                    transition: ease 0.3s  ;
                    color: white;
                }
                .role:hover{
                    color: #fff;
                    background: darkred !important;
                }
            </style>
            <link rel="stylesheet" href="{{ asset('dash/plugins/sweetalert/sweetalert.css') }}">
            @include("layouts.datatablecss")
        @endpush
        @push("js")
            @include("layouts.datatablejs")
            <script src="{{ asset('dash/plugins/sweetalert/sweetalert.min.js') }}"></script>

            <script>

                function changeColor () {
                    $(".role").each(function (index) {
                        let myArray = ['#1abc9c', '#3498db', '#7f8c8d', '#9c88ff', '#4cd137'];
                        let rand = myArray[Math.floor(Math.random() * myArray.length)];
                        $(this).css("background-color", rand);
                    });
                }
                setTimeout(function () {
                    changeColor()
                },500);



                function changeType(id,type){
                    $.ajax({
                        url: "{{ route("dash.change.user.type") }}",
                        type: "POST",
                        data: {_token: "{{ csrf_token() }}",id:id,type:type},
                        success: function (data, response) {
                            swal({
                                title: "Great! User' Type Has Changed  ",
                                type: "success"
                            });
                            $(".allcodes").load("{{ route('dash.component.users') }}");
                            setTimeout(function () {
                                changeColor()
                            },500);
                        }
                    });
               }
               function removerole(role,user) {
                   $.ajax({
                       url: "{{ route("dash.user.role.delete") }}",
                       type: "POST",
                       data: {_token: "{{ csrf_token() }}",id:user,role:role},
                       success: function (data, response) {
                           swal({
                               title: "Successfully: Remove Access From User",
                               type: "success"
                           });
                           $(".allcodes").load("{{ route('dash.component.users') }}");
                           setTimeout(function () {
                               changeColor()
                           },500);
                       }
                   });
               }
            </script>
    @endpush

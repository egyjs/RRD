@extends('layouts.dash')
@section('main')
    <div class="container-fluid">
        <div class="block-header">
            <h2>DASHBOARD</h2>
        </div>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if(session()->has('statues'))
            <div class="alert alert-success">
                <h4>{{ session()->get('msg') }}</h4>
            </div>
        @endif

        <div class="container-fluid">
            <!-- Input -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2> Add Menus </h2>
                        </div>
                        {!! Menu::render() !!}
                    </div>
                </div>
            </div>
        </div>

@endsection

@push('js')
    {!! Menu::scripts() !!}
@endpush

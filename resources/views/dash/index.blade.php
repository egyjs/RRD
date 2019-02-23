<?php use \Illuminate\Support\Facades\Auth as Auth; use \App\User as User; ?>
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

        <!-- Widgets -->

        <a href="{{ route('dash.visits') }}" class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="info-box bg-orange hover-expand-effect">
                    <div class="icon">
                        <i class="material-icons">face</i>
                    </div>
                    <div class="content">
                        <div class="text">TOTAL VISITORS</div>
                        <div class="number count-to" data-from="0" data-to="{{ $visits }}" data-speed="1000" data-fresh-interval="20">{{ $visits  }}</div>
                    </div>
                </div>
        </a>

        @if(hasRole('manager'))

        @endif



@endsection

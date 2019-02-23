@extends('layouts.dash')
@inject('function', 'App\Http\Controllers\Functions')

@section('main')
    @if ( session('statues') )
        <div class="col-md-12">
            <div class="alert alert-{{ session('statues') }}"><strong>Well done!</strong> {{ session('msg') }}</div>
        </div>
    @endif
    {{--{!! $pro->content !!}--}}
    <div class="row">
       @forelse($projects as $pro)
           <!-- With Captions -->
               <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                   <div class="card">
                       <div class="header">
                           <a href="#{{ $pro->id }}"><h2>{{ $pro->title }}
                                   <small>{{ $pro->user->fullname }} : <i
                                               class="fab fa-{{ strtolower($pro->language) }}"></i> {{ $pro->language }}
                                   </small>
                           </h2></a>
                           <ul class="header-dropdown m-r--5">
                               <li class="dropdown">
                                   <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                       <i class="material-icons">more_vert</i>
                                   </a>
                                   <ul class="dropdown-menu pull-right">
                                       <li><a href="{{ route('dash.editproject',$pro->id) }}">Edit</a></li>
                                       <li><a href="{{ route('dash.deleteproject',$pro->id) }}">delete</a></li>
                                   </ul>
                               </li>
                           </ul>
                       </div>
                       <div class="body">

                           <div id="carousel-img-{{ $pro->id }}" class="carousel slide" data-ride="carousel">

                               <!-- Wrapper for slides -->
                               <div class="carousel-inner" role="listbox">
                                   @foreach(json_decode($pro->imgs) as  $index => $img)
                                        <div class="item @if($index == 0) active @endif">
                                       <img src="{{ $img }}" />
                                       <div class="carousel-caption">
                                           <h4 class="ellipsis">{{ $pro->description }}</h4>

                                           <p class="">{{ $function->shorter($pro->content,80) }}</p>
                                       </div>
                                   </div>
                                   @endforeach
                               </div>
                               <!-- Controls -->
                               <a class="left carousel-control" href="#carousel-img-{{ $pro->id }}" role="button" data-slide="prev">
                                   <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                                   <span class="sr-only">Previous</span>
                               </a>
                               <a class="right carousel-control" href="#carousel-img-{{ $pro->id }}" role="button" data-slide="next">
                                   <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                                   <span class="sr-only">Next</span>
                               </a>
                           </div>

                       </div>
                   </div>
               </div>
               <!-- #END# With Captions -->
       @empty
           <div class="card col-md-12">
               <div class="body">
                   There is No Projects yet
               </div>
           </div>
       @endforelse
    </div>
@endsection

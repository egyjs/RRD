@extends('layouts.dash')
@inject('function', 'App\Http\Controllers\Functions')

@section('main')
    @if ( session('statues') )
        <div class="col-md-12">
            <div class="alert alert-{{ session('statues') }}"><strong>Well done!</strong> {{ session('msg') }}</div>
        </div>
    @endif
    <div class="row">
       @forelse($social as $soc)

           <div class="col-md-4">
                    <div class="card {{ ($soc->statues == 0) ? "bg-amber" : "" }}">
                        <div class="header">
                            <small>{{ $function->user($soc->by)->fullname }}</small>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="{{ route("dash.edit.social",$soc->id) }}">Edit</a></li>
                                        <li><a href="{{ route('dash.deletesocial',$soc->id) }}">delete</a></li>
                                    </ul>
                                </li>
                                {!! ($soc->statues == 0) ? '<li title="not live"><a href="#"><i class="material-icons">sentiment_very_dissatisfied</i></a></li>' : "" !!}
                            </ul>
                        </div>
                        <div class="body ellipsis">
                            <h3 class="white-text" style="display:inline;"><i class="{{$soc->icon}}"></i> :</h3>
                            <small><a class="btn btn-link" href="{{$soc->url}}" target="_blank">{{ str_replace('https://',' ',$soc->url) }}</a></small>
                        </div>
                    </div>
           </div>
       @empty
           <div class="card col-md-12">
               <div class="body">
                   there is no social yet
               </div>
           </div>
       @endforelse
    </div>
@endsection

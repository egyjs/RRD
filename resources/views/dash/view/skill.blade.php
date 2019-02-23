@extends('layouts.dash')
@inject('function', 'App\Http\Controllers\Functions')

@section('main')
    @if ( session('statues') )
        <div class="col-md-12">
            <div class="alert alert-{{ session('statues') }}"><strong>Well done!</strong> {{ session('msg') }}</div>
        </div>
    @endif
    <div class="row">
       @forelse($skills as $skill)

           <div class="col-md-4">
                    <div class="card {{ ($skill->statues == 0) ? "bg-amber" : "" }}">
                        <div class="header">
                            <small>{{ $function->user($skill->by)->fullname }}</small>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="{{ route('dash.edit.skill',$skill->id) }}">Edit</a></li>
                                        <li><a href="{{ route('dash.deleteskill',$skill->id) }}">delete</a></li>

                                    </ul>
                                </li>
                                {!! ($skill->statues == 0) ? '<li title="not live"><a href="#"><i class="material-icons">sentiment_very_dissatisfied</i></a></li>' : "" !!}
                            </ul>
                        </div>
                        <div class="body ">
                            <div class="row">
                                <div class="col-md-2">{{ $skill->title }}</div>
                                <div class="col-md-10">
                                    <div class="progress">
                                        <div class="progress-bar bg-green" role="progressbar" aria-valuenow="{{ $skill->percent }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ $skill->percent }}%">{{ $skill->percent }}%</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
           </div>
       @empty
           <div class="card">
               <div class="body">
                   there is no Skills yet
               </div>
           </div>
       @endforelse
    </div>
@endsection

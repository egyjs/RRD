@extends('layouts.dash')
@inject('function', 'App\Http\Controllers\Functions')

@section('main')
    @if ( session('statues') )
        <div class="col-md-12">
            <div class="alert alert-{{ session('statues') }}"><strong>Well done!</strong> {{ session('msg') }}</div>
        </div>
    @endif


   <div class="row">
       @forelse($Posts as $pg)
           <div class="col-md-4">
               <div class="card @if( session('type') || session('type') == 'updated') flash @endif @if($pg->statues == 0) bg-amber @endif">
                   <div class="header">
                       <h2>  {{  $pg->title  }} </h2>
                       <ul class="header-dropdown m-r--5">
                           <li>
                               <a href=" {{ route('dash.edit.post', $pg->id)  }}">
                                   <i class="material-icons">edit</i>
                               </a>
                           </li>
                           <li>
                               <a href="{{ route('dash.deletepost',$pg->id) }}">
                                   <i class="material-icons text-danger">remove_circle</i>
                               </a>
                           </li>

                       </ul>
                   </div>
               </div>
           </div>
       @empty
           <div class="card col-md-12">
               <div class="body">
                   there is no posts yet
               </div>
           </div>
       @endforelse
    </div>
@endsection

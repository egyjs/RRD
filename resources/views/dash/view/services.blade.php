@extends('layouts.dash')
@inject('function', 'App\Http\Controllers\Functions')

@section('main')
    @if ( session('statues') )
        <div class="col-md-12">
            <div class="alert alert-{{ session('statues') }}"><strong>Well done!</strong> {{ session('msg') }}</div>
        </div>
    @endif


   <div class="row">
       @forelse($servces as $serv)
       <div class="col-md-4">
             <div class="card @if( session('type') || session('type') == 'updated') flash @endif">
            <div class="header">
                @if(!filter_var($serv->icon,FILTER_VALIDATE_URL))
                    <h2><i style="font-size: 30px" class="{{ $serv->icon }}"></i> | {{  $serv->title  }} </h2>
                @else
                    <h2><img style="height: 55px" src="{{ $serv->icon }}" alt=""> | {{  $serv->title  }} </h2>
                @endif
                <ul class="header-dropdown m-r--5">
                    <li>
                        <a href=" {{ route('dash.edit.service', $serv->id)  }}">
                            <i class="material-icons">edit</i>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('dash.deleteservice',$serv->id) }}">
                            <i class="material-icons text-danger">remove_circle</i>
                        </a>
                    </li>

                </ul>
            </div>
            <div class="body">
                {{  $serv->content  }}
            </div>
        </div>
       </div>
       @empty
           <div class="card col-md-12">
               <div class="body">
                   there is no servces yet
               </div>
           </div>
       @endforelse
</div>
@endsection

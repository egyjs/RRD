<div class="menu">
    <ul class="list">
        <li class="header">MAIN NAVIGATION</li>
        <li><a href="{{ route('dash.home') }}"><i class="material-icons">home</i><span>Home</span></a></li>
        {{--view--}}
        @if(hasRole('manager') or  hasRole('Writer'))
        <li><a href="javascript:void(0);" class="menu-toggle"><i class="material-icons">visibility</i><span>View</span></a>
            <ul class="ml-menu">
                @if(hasRole('manager') or hasRole('Writer'))
                <li><a href="{{route('dash.view.project')}}"><i class="material-icons">view_compact</i><span class="fix-nav">View Project</span></a></li>
                @endif
                @if(hasRole('manager') or hasRole('Writer'))
                <li><a href="{{route('dash.view.pages')}}"><i class="material-icons">pages</i><span class="fix-nav">View Pages</span></a></li>
                <li><a href="{{route('dash.view.posts')}}"><i class="icofont-letter material-icons"></i><span class="fix-nav">View Posts</span></a></li>
                @endif
            </ul>
        </li>
        @endif

        {{--add--}}
        @if(hasRole('manager') or hasRole('Writer'))
        <li><a href="javascript:void(0);" class="menu-toggle"><i class="material-icons">add</i><span>Add</span></a>
            <ul class="ml-menu">
                @if(hasRole('manager') or hasRole('Writer'))
                    <li><a href="{{route('dash.add.post')}}"><i class="icofont-letter material-icons"></i><span class="fix-nav">Add Post</span></a></li>
                    <li><a href="{{route('dash.add.page')}}"><i class="material-icons">pages</i><span class="fix-nav">Add Page</span></a></li>
                    <li><a href="{{route('dash.add.project')}}"><i class="material-icons">view_compact</i><span class="fix-nav">Add Project</span></a></li>
                @endif
            </ul>
        </li>
        @endif

        {{-- Hr Requests --}}
        @if(hasRole('manager') or hasRole('Users manager'))
        <li><a href="{{ route('dash.mange.users') }}"><i class="material-icons">person_pin_circle </i><span class="fix-nav"> Mange Users</span></a></li>
        @endif
    </ul>
</div>

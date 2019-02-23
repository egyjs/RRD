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

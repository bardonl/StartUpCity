@foreach($usersData as $user)
    <tr>
        <td>{{$user->id}}</td>
        <td><a href="/profile/{{$user->id}}">{{$user->username}}</a></td>
        <td>
            <img src="{{$user->picture}}@if(strpos($user->picture, 'google')){{'?sz=50'}}@else{{'?type=normal'}}@endif" onerror="this.onerror=null;this.src='{{ asset('css/gfx/no_profile.png') }}'"/>
        </td>
        <td>
            @if (isset($user->friendshipStatus['additionalMessage']))
                {{$user->friendshipStatus['additionalMessage']}}
            @endif
        </td>
        <td>
            @if ($user->id !== auth()->user()->id)
                <a href="/users/{{$user->id}}/{{$user->friendshipStatus['action']}}" style="border: none; background: none;">
                    {{ $user->friendshipStatus['message'] }}
                </a>
            @endif
        </td>
    </tr>
@endforeach

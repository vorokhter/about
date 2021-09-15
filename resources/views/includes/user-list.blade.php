@foreach($users as $user)
<li class="list-group-item user-name" style="cursor: pointer;" data-user-id="{{$user->id}}">{{$user->name}}</li>
@endforeach
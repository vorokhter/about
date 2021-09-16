@foreach($users as $user)
<div class="container list-group-item user-name mt-2 w-100">
    <div>{{$user->name}}</div>
    <div class="text-muted open-thread" style="cursor: pointer; font-size: 12.5px;" data-user-id="{{$user->id}}">Написать сообщение</div>
</div>
@endforeach
@foreach($users as $user)
<div class="container list-group-item user-name w-100 d-flex">
    <img id="header-avatar" src="{{ $user->avatar }}" alt="аватар пользователя" style="width: 80px; height: 80px; border-radius: 50%; margin-right: 16px;">
    <div class="w-100">
        <div>{{$user->name}}</div>
        <div class="text-muted open-thread" style="cursor: pointer; font-size: 12.5px;" data-user-id="{{$user->id}}">Написать сообщение</div>
    </div>
</div>
@endforeach
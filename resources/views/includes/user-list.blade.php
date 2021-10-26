@foreach($users as $user)
<div class="container list-group-item user-name w-100 d-flex">
    <div>
        <img id="header-avatar" src="{{ $user->avatar }}" alt="аватар пользователя" style="width: 80px; height: 80px; border-radius: 50%;">
    </div>

    <div class="w-100" style="margin-left: 16px;">
        <div>{{$user->name}}</div>
        <div class="text-muted open-thread" style="cursor: pointer; font-size: 12.5px;" data-user-id="{{$user->id}}">Написать сообщение</div>
    </div>
</div>
@endforeach
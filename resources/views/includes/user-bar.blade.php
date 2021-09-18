<div class="container w-100">
    <div class="d-flex flex-nowrap align-items-center justify-content-between">
        <div></div>
        <div data-user-id="{{$user->id}}">{{$user->name}}</div>
        <img id="header-avatar" src="{{ $user->avatar }}" alt="аватар пользователя" style="width: 30px; height: 30px; border-radius: 50%;">
    </div>
</div>
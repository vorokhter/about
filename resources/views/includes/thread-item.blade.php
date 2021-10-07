<div class="w-100 d-flex flex-nowrap">
    <div class="d-flex justify-content-start" style="min-width: 66px;">
        <img id="header-avatar" src="{{$user->avatar}}" alt="аватар пользователя" style="width: 50px; height: 50px; border-radius: 50%;">
    </div>
    <div>
        <div class="d-flex flex-nowrap text-primary">
            <div>{{$user->name}}</div>
        </div>
        <div class="text-muted text-break">сообщение...</div>
    </div>
</div>
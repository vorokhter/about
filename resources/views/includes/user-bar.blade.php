<div class="container w-100">
    <div class="row flex-nowrap">
        <div class="col d-flex flex-nowrap align-items-center justify-content-start text-muted thread-back" style="font-size: 14px; cursor: pointer;">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16" style="margin-right: 5px;">
                <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z" />
            </svg>
            Назад
        </div>
        <div class="col d-flex align-items-center justify-content-center" data-user-id="{{$user->id}}">{{$user->name}}</div>
        <div class="col d-flex align-items-center justify-content-end">
            <img id="header-avatar" src="{{ $user->avatar }}" alt="аватар пользователя" style="width: 30px; height: 30px; border-radius: 50%;">
        </div>
    </div>
</div>
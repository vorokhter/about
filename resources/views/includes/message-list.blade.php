@if(count($messages) > 0)
@foreach($messages as $message)
<div class="container mt-2 w-100 d-flex flex-nowrap">
    <img id="header-avatar" src="{{\App\Models\User::getUserAvatarById($message->user_id)}}" alt="аватар пользователя" style="width: 36px; height: 36px; border-radius: 50%; margin-right: 16px;">
    <div>
        <div class="d-flex flex-nowrap" style="font-size: 12.5px;">
            <div class="text-primary">{{\App\Models\User::getUserNameById($message->user_id)}}</div>
            <div class="text-muted" style="margin-left: 5px;">{{date("H:i d.m.y", strtotime($message->created_at))}}</div>
        </div>
        <div>{{$message->text}}</div>
    </div>
</div>
@endforeach
@else
<div class="container mt-2 w-100">
    <div class="text-muted">Пока что нет сообщений</div>
</div>
@endif
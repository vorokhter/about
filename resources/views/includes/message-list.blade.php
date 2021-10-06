@if(count($messages) > 0)
<?php
$last_time = 0;
$last_id = -1;
?>
@foreach($messages as $message)
<?php
$next_time = strtotime($message->created_at);
$difference = ceil(($next_time - $last_time) / 60);
?>
<div class="container mt-2 w-100 d-flex flex-nowrap">
    @if($message->user_id != $last_id or $difference > 5) <img id="header-avatar" src="{{\App\Models\User::getUserAvatarById($message->user_id)}}" alt="аватар пользователя" style="width: 36px; height: 36px; border-radius: 50%; margin-right: 16px;">
    @else
    <div style="width: 52px;"></div>
    @endif
    <div>
        @if($message->user_id != $last_id or $difference > 5) <div class="d-flex flex-nowrap" style="font-size: 12.5px;">
            <div class="text-primary">{{\App\Models\User::getUserNameById($message->user_id)}}</div>
            <div class="text-muted" style="margin-left: 5px;">{{date("H:i d.m.y", strtotime($message->created_at))}}</div>
        </div>
        @endif
        <div>{{$message->text}}</div>
    </div>
</div>
<?php
$last_time = strtotime($message->created_at);
$last_id = $message->user_id;
?>
@endforeach
@else
<div class="container mt-2 w-100">
    <div class="text-muted">Пока что нет сообщений</div>
</div>
@endif
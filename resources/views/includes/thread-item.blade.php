<?php
$last_message = App\Http\Controllers\ThreadController::getLastMessage($thread->id, $current_user_id);
?>

<div class="list-group-item thread-item d-flex flex-nowrap align-items-center" style="cursor: pointer;" data-thread-id="{{$thread->id}}">
    <div class="w-100 d-flex flex-nowrap">
        <div class="d-flex justify-content-start" style="min-width: 66px;">
            <img id="header-avatar" src="{{$user->avatar}}" alt="аватар пользователя" style="width: 50px; height: 50px; border-radius: 50%;">
        </div>
        <div class="w-100">
            <div class="d-flex flex-nowrap justify-content-between">
                <div class="d-flex flex-nowrap text-primary">{{$user->name}}</div>
                @if($last_message->user_id != -1)
                <div class="text-muted">{{date("H:i d.m.y", strtotime($last_message->created_at))}}</div>
                @endif
            </div>
            <div class="d-flex overflow-hidden text-muted text-break thread-message" style="max-height: 20px;">{{$last_message->text}}</div>
        </div>
    </div>
</div>
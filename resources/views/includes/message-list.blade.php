@foreach($messages as $message)
<div class="container mt-2">
    <div class="d-flex flex-nowrap" style="font-size: 12.5px">
        <div class="text-primary">{{\App\Models\User::getUserNameById($message->user_id)}}</div>
        <div class="text-muted" style="margin-left: 5px;">{{date("H:i d.m.y", strtotime($message->created_at))}}</div>
    </div>
    <div>{{$message->text}}</div>
</div>
@endforeach
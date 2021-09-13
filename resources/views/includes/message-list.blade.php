@foreach($messages as $message)
<!-- <div class="d-flex w-100 p-2 ">
    <div class="card">
        <div class="card-body">
            <span class="text-primary" style="font-size: 12.5px">{{\App\Models\User::getUserNameById($message->user_id)}}</span>
            <div>{{$message->text}}</div>
        </div>
    </div>
</div> -->

<div class="container mt-2">
    <div>
        <div class="text-primary">{{\App\Models\User::getUserNameById($message->user_id)}}</div>
        <div class="text-muted">{{$message->created_at}}</div>
    </div>

    <div>{{$message->text}}</div>

</div>
@endforeach

<!-- {{ $currentUserId != $message->user_id ? 'justify-content-start' : 'justify-content-end' }} -->
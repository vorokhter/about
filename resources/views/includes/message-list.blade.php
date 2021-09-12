@foreach($messages as $message)
<div class="d-flex w-100 p-2 {{ $currentUserId != $message->user_id ? 'justify-content-start' : 'justify-content-end' }}">
    <div class="card" style="max-width: 45%">
        <div class="card-body">
            {{$message->text}}
        </div>
    </div>
</div>
@endforeach
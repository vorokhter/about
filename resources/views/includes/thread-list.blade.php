@if(count($threads) > 0)
<div class="border rounded-1 list-group-flush p-3 bg-white shadow" style="max-height: 45vh;">
    @foreach($threads as $thread)
    <div class="list-group-item thread-title" style="cursor: pointer;" data-thread-id="{{$thread->id}}">{{\App\Http\Controllers\ThreadController::getThreadTitle($current_user, $thread)}}</div>
    @endforeach
</div>
@endif
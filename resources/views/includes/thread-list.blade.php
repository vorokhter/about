@if(count($threads) > 0)
<div class="border rounded-1 list-group-flush p-2 bg-white shadow" style="max-height: 45vh;">
    @foreach($threads as $thread)
    <div class="list-group-item thread-title" style="cursor: pointer;" data-thread-id="{{$thread->id}}">{{\App\Http\Controllers\ThreadController::getThreadTitle($current_user, $thread)}}</div>
    @endforeach
</div>
@else
<div class="border rounded-1 p-2 bg-white shadow">
    <p class="text-center m-0">Список чатов пуст</p>
</div>
@endif
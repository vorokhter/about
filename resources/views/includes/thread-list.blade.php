@if(count($threads) > 0)
<div class="border rounded-1 list-group-flush p-2 bg-white">
    @foreach($threads as $thread)
    <div class="list-group-item thread-item d-flex flex-nowrap align-items-center" style="cursor: pointer;" data-thread-id="{{$thread->id}}">
        {{\App\Http\Controllers\ThreadController::getThreadBar($current_user, $thread)}}
    </div>
    @endforeach
</div>
@else
<div class="border rounded-1 p-2 bg-white shadow">
    <p class="text-center m-0">Список чатов пуст</p>
</div>
@endif
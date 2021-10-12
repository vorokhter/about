@if(count($threads) > 0)
<div class="border rounded-1 list-group-flush p-2 bg-white overflow-auto shadow" style="max-height: 80vh;">
    @foreach($threads as $thread)
    {{\App\Http\Controllers\ThreadController::getThreadItem($current_user, $thread)}}
    @endforeach
</div>
@else
<div class="border rounded-1 p-2 bg-white shadow">
    <div class="text-center text-muted" style="font-size: 14px;">Список чатов пуст</div>
</div>
@endif
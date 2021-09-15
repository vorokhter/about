@foreach($threads as $thread)
<li class="list-group-item thread-title" style="cursor: pointer;" data-thread-id="{{$thread->id}}">{{\App\Http\Controllers\ThreadController::getThreadTitle($currentUser, $thread)}}</li>
@endforeach
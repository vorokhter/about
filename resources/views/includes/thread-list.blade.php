@foreach($threads as $thread)
<button class="nav-link thread-title w-100" data-thread-id="{{$thread->id}}" data-bs-toggle="pill" type="button" role="tab">{{\App\Http\Controllers\ThreadController::getThreadTitle($current_user, $thread)}}</button>
@endforeach
@extends('layouts.main-layout')

@section('title', 'about')

@section('content')

<script>
    $(document).ready(function() {

        let currentThreadId;
        let timerId;

        function startMessagesInterval() {
            getMessageList()

            timerId = setInterval(() => {
                getMessageList()
            }, 2000);
        }

        function getMessageList() {
            api.post({
                    url: "/thread/message-list",
                    body: JSON.stringify({
                        threadId: currentThreadId,
                    }),
                    dataType: "text",
                })
                .then(result => {
                    $('#message-list').html(result);
                    $('#message-list').scrollTop($('#message-list').prop("scrollHeight"));
                });
        }

        $(".thread-title").on("click", function(event) {

            currentThreadId = $(this).attr("data-thread-id");

            clearInterval(timerId);
            startMessagesInterval();

            // api.post({
            //     url: "/thread/personal",
            //     body: JSON.stringify({
            //         userId: $(this).attr("data-user-id")
            //     }),
            // }).then((result) => {
            //     currentThreadId = result.id;
            //     clearInterval(timerId);
            //     startMessagesInterval();
            // })
        });

        $("#inputMessage").on("keypress", function(event) {
            if (event.which != 13) return;

            api.post({
                url: "/thread/send-message",
                body: JSON.stringify({
                    threadId: currentThreadId,
                    text: $('#inputMessage').val(),
                }),
            }).then(result => {
                $('#inputMessage').val('');
            });
        });

        $("#inputSearch").on("keypress", function(event) {
            api.post({
                url: "/user/search-user",
                body: JSON.stringify({
                    text: $('#inputSearch').val(),
                }),
                dataType: "text",
            }).then(result => {
                $("#searchResult").empty();
                $('#searchResult').html(result);
            });
        });
    });
</script>

@include('includes.header')

<main>
    <div class="container" style="max-width: 960px;">
        <div class="row">
            <div class="col-md-3">

                <input autocomplete="off" class="form-control mt-3" value="" type="search" id="inputSearch" placeholder="Поиск пользователя" aria-label="Поиск" list="searchResult">
                <datalist id="searchResult" class="bg-white" style="cursor: pointer"></datalist>

                <ul class="list-group mt-3">
                    @foreach($threads as $thread)
                    <li class="list-group-item thread-title" style="cursor: pointer;" data-thread-id="{{$thread->id}}">{{\App\Http\Controllers\ThreadController::getThreadTitle($currentUser, $thread)}}</li>
                    @endforeach
                </ul>

            </div>
            <div class="col-md-9">

                <div id="message-list" class="border rounded-2 mt-3 overflow-auto bg-white pt-2 pb-3" style="width: 100%; height: 50vh;"></div>

                <input type="text" class="form-control mt-3" id="inputMessage" name="message" placeholder="Введите сообщение">

            </div>
        </div>
    </div>
</main>

@endsection
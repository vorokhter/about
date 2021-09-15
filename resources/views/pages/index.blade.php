@extends('layouts.main-layout')

@section('title', 'about')

@section('content')

<script>
    $(document).ready(function() {

        getThreadList();

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

        function getThreadList() {
            api.get({
                    url: "/thread/thread-list",
                    dataType: "text",
                })
                .then(result => {
                    $('#thread-list').html(result);

                    $(".thread-title").on("click", function(event) {

                        currentThreadId = $(this).attr("data-thread-id");

                        clearInterval(timerId);
                        startMessagesInterval();
                    });
                });
        }

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
                $("#search-list").empty();
                $('#search-list').html(result);

                $(".user-name").on("click", function(event) {
                    api.post({
                        url: "/thread/personal",
                        body: JSON.stringify({
                            userId: $(this).attr("data-user-id")
                        }),
                    }).then((result) => {
                        $('#inputSearch').val('');
                        $("#search-list").empty();

                        getThreadList();
                    });
                });
            });
        });
    });
</script>

@include('includes.header')

<main>
    <div class="container" style="max-width: 960px;">
        <div class="row">
            <div class="col-md-3">

                <input class="form-control mt-3" type="search" id="inputSearch" placeholder="Поиск">
                <ul id="search-list" class="list-group"></ul>

                <ul id="thread-list" class="list-group mt-3"></ul>

            </div>
            <div class="col-md-9">

                <div id="message-list" class="border rounded-2 mt-3 overflow-auto bg-white pt-2 pb-3" style="width: 100%; height: 50vh;"></div>

                <input type="text" class="form-control mt-3" id="inputMessage" name="message" placeholder="Введите сообщение">

            </div>
        </div>
    </div>
</main>

@endsection
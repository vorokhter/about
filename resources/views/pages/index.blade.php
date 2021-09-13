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

        $(".user-title").on("click", function(event) {
            api.post({
                url: "/thread/personal",
                body: JSON.stringify({
                    userId: $(this).attr("data-user-id")
                }),
            }).then((result) => {
                currentThreadId = result.id;
                clearInterval(timerId);
                startMessagesInterval();
            })
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
        })
    });
</script>

@include('includes.header')

<main>
    <div class="container" style="max-width: 960px;">
        <div class="row">
            <div class="col-md-3">
                <ul class="list-group mt-3">
                    @foreach($users as $user)
                    <li class="list-group-item user-title" data-user-id="{{$user->id}}">{{ $user->name }}</li>
                    @endforeach
                </ul>
            </div>
            <div class="col-md-9">

                <div id="message-list" class="border rounded-2 mt-3 overflow-auto bg-white pt-2 pb-3" style="width: 100%; height: 50vh;"></div>

                <div class="form-floating mb-3 mt-3">
                    <input type="text" class="form-control" id="inputMessage" name="message" placeholder="Введите сообщение">
                    <label for="inputMessage" class="form-label">Введите сообщение</label>
                </div>

            </div>
        </div>
    </div>
</main>

@endsection
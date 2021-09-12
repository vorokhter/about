@extends('layouts.main-layout')

@section('title', 'about')

@section('content')

<script>
    $(document).ready(function() {

        $(".user-title").on("click", function(event) {
            event.preventDefault();

            api.post({
                url: "/thread/personal",
                body: JSON.stringify({
                    userId: $(this).attr("data-user-id")
                }),
                onSuccess: data => console.log(data),
            })
        });

    });
</script>

@foreach($users as $user)
<p class="user-title" data-user-id="{{$user->id}}">{{ $user->name }}</p>
@endforeach

@endsection
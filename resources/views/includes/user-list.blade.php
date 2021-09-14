<!-- <ul class="list-group">
    @foreach($users as $user)
    <li class="list-group-item user-name" style="cursor: pointer;" data-user-id="{{$user->id}}">{{$user->name}}</li>
    @endforeach
</ul> -->

@foreach($users as $user)
<option value="{{$user->name}}" data-user-id="{{$user->id}}"></option>
@endforeach
<form action="{{route('groups.store')}}" method="POST">
{{ csrf_field() }}
    <div class="form-group">
        <label for="group_name">グループ名</label>
        <input type="text" class="form-control" id="group_name" name="name">
    </div>
    <div class="form-group">
        <label for="user_id">メンバー</label>
        @isset($memberUsers)
            @foreach($memberUsers as $key => $memberUser)
                <input readonly type="text" class="form-control bg-white" id="user_id" name="user_id" value="{{$memberUser->name}}">
                <input type="hidden" value="{{$memberUser->id}}" name='user_id_{{$key}}'>
            @endforeach
        @else
        @endisset
    </div>
    <button type="submit" class="btn btn-primary">上記のメンバーでグループを作成する</button>
    <input type="hidden" name="searchQuery" value="createGroup">
</form>
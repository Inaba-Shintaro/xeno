<form action="{{route('groups.search')}}" method="post">
{{ csrf_field() }}
    <input name="user_id_0" type="text" class="form-control input-lg" value="{{ old('user_id_0') }}">
    @isset($memberUsers)
        @foreach($memberUsers as $key => $memberUser)
        <input readonly type="hidden" class="form-control input-lg bg-white" name="user_id_{{$key + 1}}" value="{{$memberUser->id}}">
        @endforeach
    @else
    @endisset
    <button type="submit" class="btn btn-primary">メンバーをIDで追加する<i class="fas fa-search"></i></button>
    <input type="hidden" name="searchQuery" value="memberSearch">
</form>
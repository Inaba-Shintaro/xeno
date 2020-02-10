@extends('layouts.app')

@section('content')
<div class="container">
    <div class="jumbotron jumbotron-fluid">

        <form action="{{route('groups.search')}}" method="get">
        {{ csrf_field() }}
            <input type="text" class="form-control input-lg" name="user_id_0">
            @isset($memberUsers)
                @foreach($memberUsers as $key => $memberUser)
                <input readonly type="hidden" class="form-control input-lg bg-white" name="user_id_{{$key + 1}}" value="{{$memberUser->id}}">
                @endforeach
            @else
            @endisset
            <button type="submit" class="btn btn-primary">メンバーをIDで追加する<i class="fas fa-search"></i></button>
        </form>

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
                        <input readonly type="text" class="form-control bg-white" id="user_id" value="{{$memberUser->name}}">
                        <input type="hidden" value="{{$memberUser->id}}" name='user_id_{{$key}}'>
                    @endforeach
                @else
                @endisset
            </div>
            <button type="submit" class="btn btn-primary">上記のメンバーでグループを作成する</button>
        </form>

    </div>
</div>
@endsection

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="jumbotron mb-5">
    @isset($errorMessage)
    <a class="btn btn-primary" href="{{route('groups.create')}}" role="button">グループを作成する</a>
    @else
        @foreach($auth->groups as $auth_group)
            <h1 class="display-4">{{$auth_group->name}}</h1>
            <hr class="my-4">
            <a class="btn btn-primary btn-lg" href="{{route('xenos.roomEnter',$auth_group->id)}}" role="button">入室する</a>
        @endforeach
    @endisset
    </div>
</div>
@endsection

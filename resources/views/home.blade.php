@extends('layouts.app')

@section('content')
<div class="container">
    <div class="jumbotron jumbotron-fluid">
        <h1 class="display-4">XENOを始める</h1>
        <a class="btn btn-primary" href="{{route('groups.create')}}" role="button">スタート</a>
    </div>
</div>
@endsection

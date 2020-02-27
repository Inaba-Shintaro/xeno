@extends('layouts.app')

@section('content')
<div class="container">
    <div class="jumbotron jumbotron-fluid">
    @include('groups.search_form', ['memberUsers'=>$memberUsers ?? null])
    @include('groups.store_form', ['memberUsers'=>$memberUsers ?? null])
    </div>
</div>
@endsection

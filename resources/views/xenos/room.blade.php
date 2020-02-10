@extends('layouts.app')

@section('content')
<div class="container">
    <p>{{$group->name}}</p>

    <div class="jumbotron mb-5 bg-danger">
        <a class="btn btn-primary btn-lg" href="{{route('xenos.ready',$group->id)}}" role="button">準備完了</a>
    </div>

    <!-- 以下チャット関連 -->
    <div class="chat">
    <!-- line風 -->
    <div class="line-bc"><!--①LINE会話全体を囲う-->
    <!-- 多分ここからforeach -->
    <div class="tests">
    @foreach($chatMessages as $chatMessage)
    <div class="test">
    @if($chatMessage->user_id !== Auth::id())
        <!--②左コメント始 相手-->
        <div class="balloon6">
        <div class="faceicon">
            <p class="text-light mr-1">{{$chatMessage->user->name}}</p>
        </div>
        <div class="chatting">
            <div class="says">
            <p>{{$chatMessage->message}}</p>
            </div>
        </div>
        </div>
    <!--②/左コメント終 相手-->
    @else
    <!--③右コメント始 自分--> 
        <div class="mycomment">
        <p>{{$chatMessage->message}}</p>
        </div>
        
    <!--/③右コメント終 自分-->
    @endif
    </div>
    @endforeach
    </div>

    <!-- 多分ここまでforeach -->
    </div><!--/①LINE会話終了-->
    <form class="messageInputForm">
    @csrf
    <input type="text" data-behavior="chat_message" class="messageInputForm_input" placeholder="メッセージを入力...">  
    </form>
    </div>

</div>
@endsection

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Group;
use App\Chatmessage;
use App\Events\ChatPusher;

class XenoController extends Controller
{
    public function roomEnter($id)
    {
        $group = Group::find($id);
        $chatMessages = Chatmessage::where('group_id',$group->id)->get();
        $chatMessages->load('user');
        $readyCount = []; 
        $readyCount = count($readyCount);
        return view('xenos.room',compact('group','chatMessages','readyCount'));
    }

    public function gameStart()
    {
        $group = Group::find($id);
        $chatMessages = Chatmessage::where('group_id',$group->id)->get();
        $chatMessages->load('user'); 
        $readyCount = []; 
        $readyCount = count($readyCount);
        return view('xenos.room',compact('group','chatMessages','readyCount'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public static function chat(Request $request){

        // $chat = new ChatMessage();
        $chat = new Chatmessage();
        $chat->group_id = $request->chat_room_id;
        $chat->user_id = $request->user_id;
        $chat->message = $request->message;
        $chat->save();
        event(new ChatPusher($chat));
    }

    public static function ready($id){
    
    $ready = 1;
    $readyCount[] = 1;
    $readyCount = count($readyCount);
    $group = Group::find($id);
    $chatMessages = Chatmessage::where('group_id',$group->id)->get();
    $chatMessages->load('user'); 
    return view('xenos.room',compact('group','chatMessages','ready','readyCount'));
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Group;
use App\GroupUser;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Http\Requests\GroupRequest;
use Illuminate\Routing\Redirector;
use App\Helpers\SearchFromUsersTable;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $auth = Auth::user();
        $auth->load('groups');
        $existGroup = $auth->groups->first();
        if($existGroup){
            return view('groups.index',compact('auth'));
        }
        $errorMessage = '参加しているグループはありません。';
        return view('groups.index',['errorMessage'=>$errorMessage]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('groups.create');
    }

    public function search(GroupRequest $request)
    {
        if($request->user_id_0 == Auth::id()){
            $errorMessage = '自分はメンバーに追加できません。'; 
            return view('groups.create',['errorMessage'=>$errorMessage]);
        } else {
            try{
                $memberUsers = SearchFromUsersTable($request);
            } catch (ModelNotFoundException $e) {
                $errorMessage = 'そのIDのユーザーは見つかりません。';
                return view('groups.create',['errorMessage'=>$errorMessage]);
            }
            return view('groups.create',['memberUsers'=>$memberUsers]);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GroupRequest $request)
    {
        $group = new Group;
        $group->name = $request->name;
        $group->save();

        $group_users =new GroupUser;
        $group_users->group_id = $group->id;
        $group_users->user_id = Auth::id();
        $group_users->save();

        if(isset($request->user_id_0)){
            $group_users =new GroupUser;
            $group_users->group_id = $group->id;
            $group_users->user_id = $request->user_id_0;
            $group_users->save();
        }
        if(isset($request->user_id_1)){
            $group_users =new GroupUser;
            $group_users->group_id = $group->id;
            $group_users->user_id = $request->user_id_1;
            $group_users->save();
        }
        if(isset($request->user_id_2)){
            $group_users =new GroupUser;
            $group_users->group_id = $group->id;
            $group_users->user_id = $request->user_id_2;
            $group_users->save();
        }

        $auth = Auth::user();
        $auth->load('groups');
        return view('groups.index',compact('auth'));
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
    public function update(GroupRequest $request, $id)
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


}

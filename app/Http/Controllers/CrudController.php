<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class CrudController extends Controller
{
    
    public function index()
    {
        //
    }

    
    public function create()
    {
        //
    }

    
    public function store(Request $request)
    {
        //
    }

    
    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
        //
    }

    
    public function update(Request $req,$id){
        $upvote = $req->story;
        echo $upvote['upvote'];
    
        $sav = User::find($id);
        $sav->upvote = $upvote['upvote'];
        $sav->save();
    }

    
    public function destroy($id)
    {
        User::find($id)->delete();
    }
}

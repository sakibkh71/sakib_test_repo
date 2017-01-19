<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class ResourceCrud extends Controller
{
    
    public function index()
    {
        return view('basic.resource_crud');
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

    
    public function update(Request $req, $id)
    {
        $sav = User::find($id);
        $sav->upvote = $req->upvote;
        $sav->save();
    }

    
    public function destroy($id)
    {
        User::find($id)->delete();
    }
}

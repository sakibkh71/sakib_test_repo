<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function basic(){

    	return view('basic.basic_of_vue');
    }

    public function page_39(){

    	return view('basic.page_39');
    }

    public function vue_crud()
    {
    	return view('basic.vue_crud');
    }

    public function update(Request $req,$id){
    	$upvote = 90;
    	echo $upvote;
	    $sav = App\User::find($id);
	    $sav->upvote = $upvote;
	    $sav->save();
    }

    public function test_case(Request $req){

        var_dump($req->select_box_1);
        echo "<br/><br/>";
        echo $req->select_box_2;
    }
}

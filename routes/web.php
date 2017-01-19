<?php

Route::get('/', function () {
    return view('welcome');

    // $redis = app()->make('redis');

    // $redis->set('val1','test value');
    // return $redis->get('val1');
});

Route::get('test_case', function(){

	$test = ["sakib1","rakib2","samim3","sakib","rakib","samim"];
	$jsonDataRxList = json_encode($test);

	//var_dump($jsonDataRxList); die();
	
	return view('basic.test_case')->with('rxListForAutoComp', $jsonDataRxList);
});

Route::post('test_case', 'HomeController@test_case');

Route::get('basic_of_vue', 'HomeController@basic');
Route::get('page_39', 'HomeController@page_39');
Route::get('vue_crud', 'HomeController@vue_crud');

Route::patch('api/users_upvote/{id}', 'HomeController@update');

Route::resource('crud_vue', 'CrudController');

Route::get('doctor_cupon', function () {
    
    ini_set('memory_limit', '1024M');

	// $result2 = App\DoctorCupon::select('cupon_code')->get();
	// $result7 = App\CampaignCoupon::select('coupon_code')->get();

	// Cache::forever('r_result2', $result2);
	// Cache::forever('r_result7', $result7);

	$result2 = Cache::get('r_result2');
	$result7 = Cache::get('r_result7');

	foreach ($result2 as $key) 
	{
		$ary_2[] = $key['cupon_code'];
	}

	var_dump(count($ary_2));

	foreach ($result7 as $key) 
	{
		$ary_7[] = $key['coupon_code'];
	}

	var_dump(count($ary_7));

	$result_diff = array_intersect($ary_2,$ary_7);
	print_r($result_diff);
});

//API ...

Route::get('api/users', function(){
    
    return App\User::all();
});

//===========vue resource ================

Route::resource('resource_crud', 'ResourceCrud');

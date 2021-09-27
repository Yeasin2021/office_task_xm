<?php

use Illuminate\Http\Request;
use App\Comment;
use Spatie\Analytics\Period;
use Carbon\Carbon;





/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/curd','CurdController@show');


Route::get('/analytics-data',function(){
    $date = Carbon::now();
    $analyticsData = Analytics::fetchVisitorsAndPageViews(Period::days(7));
    //dd($analyticsData);
    foreach($analyticsData as $data)
    {
        //dd($data['pageViews']);
        // if($date == $data['date']){
        //     echo '<pre>'.print_r($data['pageTitle']).'</pre>';

        // }
        // else{
        //     echo '<pre>'. $date['date'] . '</pre>';
        // }

        //dd($data[64]);


        // echo '<pre>'.print_r($data['pageViews']).'</pre>';
         echo '<pre>'.print_r($data['pageTitle']).'</pre>';
    }
    //dd($analyticsData);
    //$now = $analyticsData[]['date'];
    // if($now == $date){
    //     dd($analyticsData['visitors']);
    // }
});


Route::post('login', 'API\UserController@login');
Route::post('register', 'API\UserController@register');
Route::group(['middleware' => 'auth:api'], function(){
Route::post('details', 'API\UserController@details');
Route::post('/dataadd','CurdController@store');
});

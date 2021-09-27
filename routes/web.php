<?php


use App\Comment;
use Spatie\Analytics\Period;
use Carbon\Carbon;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('/curd','CurdController@index')->name('/dataAdd');

// Route::get('/curd', function () {
//     return view('Curd/curd');
// });

Route::post('/dataadd','CurdController@store')->name('/dataAdd');
//Route::get('/datashow','CurdController@show');

//edit Route
Route::get('/edit/{id}','CurdController@edit');
//update data 
Route::post('/update/{id}','CurdController@update');


//delete Route
Route::get('/delete/{id}','CurdController@destroy');



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
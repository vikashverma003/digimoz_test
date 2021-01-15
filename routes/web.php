<?php
use Illuminate\Http\Request;


use Illuminate\Support\Facades\Mail;
use App\Mail\OrderShipped;

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

Auth::routes();
Route::namespace("Admin")->prefix('admin')->group(function(){
	Route::get('/', 'HomeController@index')->name('admin.home');
    Route::get('/download_csv', 'HomeController@download_csv')->name('admin.download_csv');

	Route::namespace('Auth')->group(function(){
		Route::get('/login', 'LoginController@showLoginForm')->name('admin.login');
		Route::post('/login', 'LoginController@login');
		Route::post('logout', 'LoginController@logout')->name('admin.logout');
	});
});

Route::get('/home', 'HomeController@index')->name('home');

Route::get('testing', function(){

	$data1 = [
           'email' => 'vikasv087@gmail.com',
           'password' => 657575987,
       ];
       $email = 'vikasv087@gmail.com';
       //echo $data1['email'];
      \Mail::send(['text'=>'mail'], $data1, function($message) use ($email) {
        $message->to($email, 'fumes')->subject('test email');
        $message->from('vikashverma003@gmail.com', 'check');

    });
});

Route::get('markdown',function(){
	    $order=['a'=>'sd','c'=>'qwqw'];
	    $m="vikasv087@gmail.com";
        Mail::to($m)->send(new OrderShipped($order));


});

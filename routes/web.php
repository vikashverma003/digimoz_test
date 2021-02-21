<?php
use Illuminate\Http\Request;


use Illuminate\Support\Facades\Mail;
use App\Mail\OrderShipped;
use App\User;
use App\Post;

use App\Profile;

use App\Author;
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
Route::get("addmoney/stripe/{id}/{sponsor_id?}", array("as" => "addmoney.paywithstripe","uses" => "AddMoneyController@payWithStripe"));
Route::post("addmoney/stripe/{id}/{sponsor_id?}", array("as" => "addmoney.stripe","uses" => "AddMoneyController@postPaymentWithStripe"));

Route::namespace("Admin")->prefix('admin')->group(function(){
   
	  Route::namespace('Auth')->group(function(){
		Route::get('/login', 'LoginController@showLoginForm')->name('admin.login');
		Route::post('/login', 'LoginController@login');
		Route::post('logout', 'LoginController@logout')->name('admin.logout');
	  });


    Route::middleware(['auth:admin','isSuper'])->group(function(){
    Route::get('/', 'HomeController@index')->name('admin.home');
    Route::get('/download_csv', 'HomeController@download_csv')->name('admin.download_csv');
    Route::get('/dashboard', 'HomeController@show_sidebar')->name('admin.dashboard');

    Route::get('/group_by', 'HomeController@group_by')->name('admin.group_by')->middleware('isSuper');

    Route::get('/sub_admin', 'HomeController@sub_admin')->name('admin.sub_admin');

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
	    $order=User::find(1);
	    $m="vikasv087@gmail.com";
        Mail::to($m)->send(new OrderShipped($order));


});


/* For the queue system we use the following commands
php artisan queue:table and then migrate the job table
php artisan queue:work  for queue server  and just use implements ShouldQueue inside the ordershipped for proper working

and change the QUEUE_CONNECTION =sync to database 

  */

Route::get('get_a',function(){

// // get data from the posts side there has to be author_id inside the posts table for proper working

//$post=Post::with('author')->get();echo "<pre>";
// $post->map(function ($post) {
//     echo $post->author->name ."<br>";

//  }); 

// get data from the profile side there has to be author_id inside the Profile table for proper working
/*$post=Profile::with('author')->get();echo "<pre>";
$post->map(function ($post) {
    echo $post->author->name ."<br>";
 }); */

// In both the tabel author_id must be present .
//$post=Author::with(['profile','posts'])->get();echo "<pre>";
// $post->map(function ($post) {
//     echo $post->author->name ."<br>";
//  });
//$post=Author::with(['profile','posts'])->get()->toArray();echo "<pre>";
//$post=Profile::with('author')->get();

//echo "<pre>";


// $post->map(function ($post) {
//     echo $post->author->name ."<br>";
//  }); 

// Inner query for author
/*$products = Post::whereHas('author', function($q) {
   $q->where('id','<=',5);
})->get();*/


// Inner query for post

$products = Post::with('author')->where('id','>',5)->get();


echo "<pre>";

print_r($products);

});


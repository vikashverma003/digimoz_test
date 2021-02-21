<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Company;
use App\User;
use Response;
use DB;
use File;
use App\Post;

use App\Author;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.home');
    }

    public function download_csv(Request $request){
           $com=Company::get();
           foreach($com as $comes){
                $comes->budget=User::where('company',$comes->id)->sum('budget');
                $comes->users=User::where('company',$comes->id)->count();
             }         
            $c_file="Companies_data";
            $filename = $c_file.".csv";
            $handle = fopen($filename, 'w+');
            fputcsv($handle, array( 'Company','Budget', 'Users_count'));
            foreach($com as $row) {
                fputcsv($handle, array($row['company_name'], $row['budget'], $row['users']));
            }
            fclose($handle);
            $headers = array(
                'Content-Type' => 'text/csv',
            );
            return Response::download($filename, $c_file.".csv", $headers);
    }

    public function group_by(Request $request){

           //  $matches =  Post::select(DB::raw('title AS AuthorPosts'))
           // ->groupBy('author_id')
           // ->get();

        $t=Author::select(DB::raw('MONTH(created_at) as month'),DB::raw('count(name) as names'),DB::raw('count(id) as `data`') )->groupBy(DB::raw('MONTH(created_at)'))->get();
        echo "<pre>";
           print_r($t);

    }

    public function show_sidebar(){

        return view('sidebar');
    }
    public function sub_admin(){

        return view('sub_admin_sidebar');
    }






}
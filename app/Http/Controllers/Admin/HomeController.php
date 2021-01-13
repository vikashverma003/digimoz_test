<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Company;
use App\User;
use Response;
use DB;
use File;

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
}
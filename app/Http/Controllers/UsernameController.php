<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use DB;
use Mail;

class UsernameController extends Controller{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    public function getIndex()
    {
        return view('auth.username', [ 'page_name' => 'username']);
    }

    public function postIndex(Request $request)
    {
        $userEmail = $request->only('email');

        $results = DB::select('SELECT user FROM users WHERE email = :em', ['em' => $userEmail['email']]);

        $eMessage = "Your username is ".$results[0]['user'];

        if($results){
            Mail::raw($eMessage, function($message) use ($userEmail){

                $message->to($userEmail['email'])->subject('User Name Retrieval!');
            });
            return view('auth.login', [ 'page_name' => 'login']);
        }
        else{
            return view('auth.username', [ 'page_name' => 'username']);
        }

    }

}
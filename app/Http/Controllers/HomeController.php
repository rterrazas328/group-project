<?php namespace App\Http\Controllers;

use DB;

class HomeController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Home Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders your application's "dashboard" for users that
	| are authenticated. Of course, you are free to change or remove the
	| controller as you wish. It is just here to get your app started!
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		//make sure user is authenticated else redirect to login
		$this->middleware('auth');
	}

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view('home');
	}

	public function editProfile(){
		return view('editProfile');
	}

	/*public function adminPage(){

		$userlist = DB::select('SELECT * from users');

		/*foreach ($userlist as $user){
			$cur = $user->name;
			$cur2 = $user['last'];//wrong
		}//*/

		//return view('admin', ['data' => $userlist]);
	//}//*/

}

<?php namespace App\Http\Controllers;

use App\UserProfile;
use App\User;
use Request;
use DB;
use Auth;
use Illuminate\Http\RedirectResponse;
use Storage;

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
		return view('home', ['page_name' => 'home']);
	}

	public function editProfile(){
		$userID = Auth::user()['id'];

		$user = User::find($userID);

		$profile = [ 'page_name' => 'profile', 'name' => $user->name, 'last' => $user->last, 'user' => $user->user, 'email' => $user->email ];

		$userProfile = UserProfile::find($userID);

		if($userProfile != null){
			$profile['address'] = $userProfile->address;
			$profile['city'] = $userProfile->city;
			$profile['state'] = $userProfile->state;
			$profile['country'] = $userProfile->country;
			$profile['birthdate'] = $userProfile->birthdate;
			$profile['phone'] = $userProfile->phone;
			$profile['profile_picture'] = $userProfile->profile_picture;
			$profile['about_me'] = $userProfile->about_me;
		}
		else{
			$profile['address'] = '';
			$profile['city'] = '';
			$profile['state'] = '';
			$profile['country'] = '';
			$profile['birthdate'] = '';
			$profile['phone'] = '';
			$profile['profile_picture'] = '';
			$profile['about_me'] = '';
		}

		return view('editprofile', $profile);
	}

	public function saveProfile(Request $request){
		$userID = Auth::user()['id'];
		$user = User::find($userID);
		$userProfile = UserProfile::find($userID);
		if($userProfile == null){
			//create new row
			$userProfile = new UserProfile;
		}
		//fill in fields
		$userProfile->id = $userID;
		$user->name = Request::input('firstname');
		$user->last = Request::input('lastname');
		$user->user = Request::input('username');
		$userProfile->address = Request::input('address');
		$userProfile->city = Request::input('city');
		$userProfile->state = Request::input('state');
		$userProfile->country = Request::input('country');
		$userProfile->birthdate = Request::input('bday') == '' ?  null : Request::input('bday');
		$userProfile->phone = Request::input('phone');
		$user->email = Request::input('email');

		//insert the rows
		$user->save();
		$userProfile->save();

		return new RedirectResponse(url('/editprofile'));
	}

	public function savePicture(Request $request){
		$userID = Auth::user()['id'];

		if (Request::hasFile('image')){
			$file = Request::file('image');
			if ($file->isValid()){
				$target_dir = "pictures/".$userID;
				//check if /storage/app/pictures/userid is a real directory that exists
				if(!is_dir($file)){
					Storage::makeDirectory($target_dir);
				}
				//should be try catch not if else
				//move file to proper user storage dir
				if($file->move(storage_path() . "/app/" .$target_dir, $file->getClientOriginalName()	)){//error: moves to /public dir
					//successfully uploaded and moved

					//now save entire filepath to DB
					$userProfile = UserProfile::find($userID);

					//$file = $request->input('image');
					if($userProfile == null) {
						$userProfile = new UserProfile;
						$userProfile->id = $userID;
					}
					//fill in fields
					$userProfile->profile_picture = storage_path() . "/app/" . $target_dir . "/" . $file->getClientOriginalName();

					$userProfile->save();
					return new RedirectResponse(url('/editprofile'));
				}
			}
		}

		return new RedirectResponse(url('/editprofile'));
	}

	public function saveAboutMe(Request $request){
		$userID = Auth::user()['id'];
		$userProfile = UserProfile::find($userID);
		if($userProfile == null){
			//create new row
			$userProfile = new UserProfile;
			$userProfile->id = $userID;
		}

		//fill in fields
		$userProfile->about_me = Request::input('aboutme');
		$userProfile->save();
		return new RedirectResponse(url('/editprofile'));
	}

}

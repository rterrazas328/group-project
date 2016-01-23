<?php namespace App\Http\Controllers;

use App\UserProfile;
use App\User;
use RequestF;
use Illuminate\Http\Request;
use Validator;
use DB;
use Auth;
use Illuminate\Http\RedirectResponse;
use Storage;

class UserController extends Controller {

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

	public function getProfile(){
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

		return view('profile', $profile);
	}

	public function saveProfile(Request $request){

		$this->validate($request, [
			'honeypot' => 'required|in:IS-421-RRZ',
			'firstname' => 'alpha|between:2,30',
			'lastname' => 'alpha|between:2,30',
			'username' => 'alpha_dash|between:4,30',
			'address' => 'string|between:2,30',
			'city' => 'alpha|between:2,30',
			'state' => 'alpha|between:2,20',
			'country' => 'alpha|between:2,30',
			'bday' => 'date',
			'phone' => 'alpha_dash|between:7,25',
			'email' => 'email|max:50',
		]);

		$userID = Auth::user()['id'];
		$user = User::find($userID);
		$userProfile = UserProfile::find($userID);
		if($userProfile == null){
			//create new row
			$userProfile = new UserProfile;
		}
		//fill in fields
		$userProfile->id = $userID;
		$user->name = RequestF::input('firstname');
		$user->last = RequestF::input('lastname');
		$user->user = RequestF::input('username');
		$userProfile->address = RequestF::input('address');
		$userProfile->city = RequestF::input('city');
		$userProfile->state = RequestF::input('state');
		$userProfile->country = RequestF::input('country');
		$bday = RequestF::input('bday') == '' ?  null : RequestF::input('bday');
		$userProfile->birthdate = $bday == null ? null : date("Y-m-d", strtotime($bday));

		$userProfile->phone = RequestF::input('phone');
		$user->email = RequestF::input('email');

		//insert the rows
		$user->save();
		$userProfile->save();

		return new RedirectResponse(url('/profile'));
	}

	public function savePicture(Request $request){
		$this->validate($request, [
			'image' => 'image|max:8000'
		]);

		$userID = Auth::user()['id'];

		if (RequestF::hasFile('image')){
			$file = RequestF::file('image');
			if ($file->isValid()){
				$target_dir = "images/".$userID;
				//check if /storage/app/images/userid is a real directory that exists
				if(!is_dir($target_dir)){
					Storage::makeDirectory($target_dir);
				}
				//should be try catch not if else
				//move file to proper user storage dir
				if($file->move(storage_path() . "/app/" .$target_dir, $file->getClientOriginalName()	)){//error: moves to /public dir
					//successfully uploaded and moved

					//now save entire filepath to DB
					$userProfile = UserProfile::find($userID);

					$file = RequestF::file('image');
					if($userProfile == null) {
						$userProfile = new UserProfile;
						$userProfile->id = $userID;
					}
					//fill in fields
					$userProfile->profile_picture = storage_path() . "/app/" . $target_dir . "/" . $file->getClientOriginalName();

					$userProfile->save();
					return new RedirectResponse(url('/profile'));
				}
			}
		}

		return new RedirectResponse(url('/profile'));
	}

	public function saveAboutMe(Request $request){
		$this->validate($request, [
			'aboutme' => 'string|max:500',
		]);


		$userID = Auth::user()['id'];
		$userProfile = UserProfile::find($userID);
		if($userProfile == null){
			//create new row
			$userProfile = new UserProfile;
			$userProfile->id = $userID;
		}

		//fill in fields
		$userProfile->about_me = RequestF::input('aboutme');
		$userProfile->save();
		return new RedirectResponse(url('/profile'));
	}


}

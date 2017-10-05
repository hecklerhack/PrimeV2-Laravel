<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use App\Location;
use App\Educ_attainment;
use App\Latest_Position;
use App\Candidate;
use App\Resume;
use App\Links;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = 'dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        //probably no need for a validator since we have one in semantic2, I guess?
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    public function showRegistrationForm()
    {
        $locations = Location::all();
        $educ_attain = Educ_attainment::all();
        $position = Latest_Position::all();
        $data = array('locations' => $locations, 'educ_attain' =>$educ_attain, 'position' => $position);
        return view('auth.register')->with($data);
    }

    public function register(Request $request)
    {
        $candidate = new Candidate;
        $candidate->dp_link = "";
       $candidate->first_name = $request->input('first-name');
       $candidate->last_name = $request->input('last-name');
       $candidate->mobile_no = $request->input('contact');
       $candidate->tel_no = $request->input('tel');
      // $candidate->location = $request->input('location');
       $candidate->expected_salary = $request->input('expected_salary');
       $candidate->position = $request->input('latest_position');
      // $candidate->educ_attain = $request->input('educ_attain');

       $location = Location::find($request->input('location'));
       $candidate->location = $location->city.','.$location->province;
       $educ_attain = Educ_attainment::find($request->input('educ_attain'));
       $candidate->educ_attain = $educ_attain->educ_attain;

       //email and password
       $user = new User;
       $user->email = $request->input('email');
       $user->password = bcrypt($request->input('pass'));

       $user->user_type = 1;
       $user->is_active = 1;
       $user->last_active = date("Y/m/d");
       $user->date_created = date("Y/m/d");
       $user->save();
       $candidate->user_id = $user->id;
       $candidate->save();

       $resume = new Resume;
       $resume->candidate_id = $candidate->candidate_id;
       $resume->resume_1 = 'Resume 1';
       $resume->resume_2 = 'Resume 2';
       $resume->resume_3 = 'Resume 3';
       $resume->educ_attain = $candidate->educ_attain;
       $resume->intro = '';
       $resume->url = '';
       $resume->public_url = '';
       $resume->current_position = $candidate->position;
       $resume->last_resume_update = date("Y/m/d");
       $resume->save();
       
   /*    $links = new Links;
       $links->user_id = $user->id;
       $links->website = '';
       $links->link = '';
       $links->save();*/

       event(new Registered($user));

       $this->guard()->login($user);
   //    $redirect = redirect($this->redirectTo);
       return view('dashboard')->with(['user' => $user, 'candidate' => $candidate, 'resume' => $resume, 'links' => $links]);
     //  return redirect($this->redirectTo)->with(['user' => $user, 'candidate' => $candidate]);
   //  return $this->registered($request, $user) ?: redirect($this->redirectPath());
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        
    }
}

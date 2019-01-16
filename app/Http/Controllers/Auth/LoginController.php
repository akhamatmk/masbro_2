<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Models\UserSocialApp;
use App\Mail\ForgotPassword;
use Illuminate\Support\Facades\Mail;
use Auth;
use Session;
use Socialite;
use Image;

class LoginController extends Controller
{
   /*
   |--------------------------------------------------------------------------
   | Login Controller
   |--------------------------------------------------------------------------
   |
   | This controller handles authenticating users for the application and
   | redirecting them to your home screen. The controller uses a trait
   | to conveniently provide its functionality to your applications.
   |
   */

   use AuthenticatesUsers;

   /**
   * Where to redirect users after login.
   *
   * @var string
   */
   protected $redirectTo = '/home';

   /**
   * Create a new controller instance.
   *
   * @return void
   */
   public function __construct()
   {
      $this->middleware('guest')->except('logout');
   }

   public function index()
   {
      return view('login');
   }

   public function check_login (Request $request)
   {
      $validatedData = $request->validate([
         'email' => 'required|max:255',
         'password' => 'required',
      ]);

      $userdata = array(
         'email' => $request->email ,
         'password' => $request->password
      );

      $userdata2 = array(
         'phone' => $request->email ,
         'password' => $request->password
      );
       
      if (Auth::attempt($userdata))
         return redirect('home');

      if (Auth::attempt($userdata2))
         return redirect('home');      

      Session::flash('message', 'Wrong email or No telepon or password');
      return redirect('login');
      
   }

   public function redirectToProvider($provider, Request $request)
   {
        try {
            $forAuth = $request->input('authFor') ? $request->input('authFor') : null;
            if(isset($forAuth))        
               $request->session()->put('state_form', 'register');
            else
               $request->session()->put('state_form', 'login');
                
            return Socialite::driver($provider)->redirect();    
        } catch (Exception $e) {
            dd($e);
        }
        
    }

    public function handleProviderCallback($provider, Request $request)
    {        
        try {
            $authFor = $request->session()->get('state_form');
            $resultQuery = $this->generateQuery($_SERVER['REQUEST_URI']);
            if(isset($resultQuery["code"]))
               $request->merge(["code" => $resultQuery["code"]]);

            $dataProvider = Socialite::driver($provider)->stateless()->user();

            $request->session()->forget('state_form');
            if($authFor == 'register')
            {
               $user = User::where('email', $dataProvider->email)->first();
               if($user)
               {
                  Session::flash('message', 'Email Sudah Terdaftar'); 
                  return redirect('register');
               }

               $name = explode(" ", $dataProvider->name);
               $maxName = count($name);
               $path = $dataProvider->avatar_original;
               $filename = date("Ymdhis").rand(0, 1000).basename($path);
               Image::make($path)->save(public_path('images/profile-picture-user/' . $filename));

               $user = new User;
               $user->email = $dataProvider->email;
               $user->first_name = $name[0];
               $user->last_name = $name[$maxName-1];
               $user->name = $dataProvider->name;
               $user->profile_image = $filename;
               $user->password = 'admin123';
               $user->save();

               $social = new UserSocialApp;
               $social->user_id = $user->id;
               $social->provider = $provider;
               $social->provider_id = $dataProvider->id;
               $social->save();

               Auth::loginUsingId($user->id);
               return redirect('user/new/password');
            } else {

               $social = UserSocialApp::where('provider_id', $dataProvider->id)->first();
               if(! $social){
                  Session::flash('message', 'Social link tidak ditemukan'); 
                  return redirect('login');
               }

               $user = User::find($social->user_id);
               if(! $user){
                  Session::flash('message', 'User Tidak ditemukan'); 
                  return redirect('login');
               }

               Auth::loginUsingId($user->id);
               return redirect('home');
            }            
        } catch (Exception $e) {
            dd($e);
        } 
    }

    public function generateQuery($url)
    {
         $temp = explode("?", $url);
         if(! isset($temp[1]))
            return [];

         $temp2 = explode("&", $temp[1]);
         $result = [];
         foreach ($temp2 as $key => $value) {
            $temp3 = explode("=", $value);

            if(isset($temp3[0]) AND $temp3[1])
            {
               $result[$temp3[0]] = $temp3[1];
            }
         }

         return $result;
    }

   public function forgotPassword(Request $request)
   {
      $user = User::where('email', $request->email)->first();
      if($user)
      {
         $user->remember_token = md5(date('Ydmhis'));
         $user->save();
         Mail::to($request->email)->send(new ForgotPassword($user));
      }
      
      Session::flash('message', 'Already send email for reset password');
      return redirect('login');
   }

   public function resetPassword($token, $email)
   {
      $user = User::where('email', $email)->where('remember_token', $token)->first();
      if(! $user)
      {
         return redirect('home');
      }

      return view('reset_password')
            ->with('user', $user);
   }

   public function setNewPassword(Request $request)
   {
      $user = User::where('email', $request->email)->where('remember_token', $request->token)->first();
      if(! $user)
      {
         return redirect('home');
      }

      $user->password = $request->password;
      $user->remember_token = md5(date('Ydmhis'));
      $user->save();
      Session::flash('message', 'Password already set go login');
      return redirect('login');
   }
}
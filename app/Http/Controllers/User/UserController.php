<?php
namespace App\Http\Controllers\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Mail\EmailVerification;
use Session;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;

class UserController extends Controller
{
    /**
     * [user registarion]
     * @param  Request $request [get signup form request]
     * @return [type]           [null]
     */
     public function signup(Request $request){
        $request->validate([
            'first_name' => 'required|max:191',
            'last_name' => 'required|max:191',
            'email_address' =>'required|email|unique:user,email',
            'password' => 'min:6|required_with:confirmed|same:confirmed',
            'confirmed' => 'required|max:20',
            'city' => 'required|max:191',
            'state' => 'required|max:191',
            'postal_code' => 'required|max:10',
            'country' => 'required|max:191',
            'address' => 'required|max:191',
        ]);
        $user= new User;
        $user->first_name = $request->input('first_name');
        $user->last_name = $request->input('last_name');
        $user->email = $request->input('email_address');
        $user->phone_no = ($request->input('phone_no'))?$request->input('phone_no'):'';
        $user->city = $request->input('city');
        $user->state = $request->input('state');
        $user->country = $request->input('country');
        $user->zip_code = $request->input('postal_code');
        $user->address = $request->input('address');
        $user->password = bcrypt($request->input('password'));
        $user->created_by =0;
        $user->updated_by =0;
        $user->is_deleted =0;
        $user->user_type =3;
        $user->status =0;
        $user->account_activation_token =md5(Carbon::now().$request->input('email'));
        $user->is_account_activated =0;
        $user->created_at =Carbon::now();
        if($user->save()){
            $email = new \stdClass();
            $email->receiver =$user->first_name.' '.$user->last_name;
            $email->url = route('email-verification',$user->account_activation_token);
            Mail::to($user->email)->send(new EmailVerification($email));

            Session::flash('user_registration', 'Your account created successfully. We have sent a verification to your email account. Please verify your account before continuing. If you do not see the email, please wait a few minutes and also check your spam folder.');
            Session::flash('alert-class', 'alert alert-success alert-dismissible fade show');

        }else{
            Session::flash('user_registration', 'There are some error try again !');
            Session::flash('alert-class', 'alert alert-danger alert-dismissible fade show');
        }
        return redirect('/');
    }

    
    
    public function CheckEmail(Request $request){
    	if(isset($request->email)){
    		if (User::where('email', '=', $request->email)->count() > 0) {
			  	if(isset($request->page) && $request->page=='password')
                return 'true';
                else
                return 'false';    
			}else if(isset($request->page) && $request->page=='password'){
                return 'false'; 
            }
    	}
    	return 'true';
    	
    }
    /**
     * [generatepassword for ne user created by admin]
     * @param  Request $request [geting dynamic created token]
     * @return [void] 
     */
    public function generatePassword(Request $request){
        if(isset($request->password) && !empty($request->password)){
            $user=User::where('account_activation_token', '=', $request->token)->first();
            if($user->is_account_activated){
                Session::flash('password_message', 'Password already generated for this account!'); 
                Session::flash('alert-class', 'alert alert-danger alert-dismissible fade show'); 
                return  view('user.home',['token'=>$request->token]);
            }else{
                $user->password=bcrypt($request->password);
                $user->is_account_activated=1;
                $user->status=1;
                if($user->save()){
                    Session::flash('password_message', 'password generated successfully Please login'); 
                    Session::flash('alert-class', 'alert alert-success alert-dismissible fade show'); 
                }else{
                    Session::flash('password_message', 'There are some error please try again later!'); 
                    Session::flash('alert-class', 'alert alert-danger alert-dismissible fade show'); 
                }
            }
        }
        
        return  view('user.home',['token'=>$request->token]);
    }

    /**
     * [user verified our email by this]
     * @param  Request $request [varification code]
     * @return [type]           [verify email]
     */
    public function emailVerification(Request $request){
        if(isset($request->code) && !empty($request->code)){
            $user=User::where('account_activation_token', '=', $request->code)->first();
            if($user->is_account_activated){
                Session::flash('verification_message', 'Your account is allready activated!'); 
                Session::flash('verification_success', 'error'); 
                
            }else{
                //$user->password=bcrypt($request->password);
                $user->is_account_activated=1;
                $user->status=1;
                if($user->save()){
                    Session::flash('verification_message', 'Your account activated successfully Please login'); 
                    Session::flash('verification_success', 'success'); 
                }else{
                    Session::flash('verification_message', 'There are some error please try again later!'); 
                    Session::flash('verification_success', 'error'); 
                }
            }
            
        }
        return redirect('/');
    }
    public function UserProfile(){
        if(Auth::user()->user_id){
            $user_id=Auth::user()->user_id;
            $user= User::findOrFail($user_id);
            return  view('user.profile-setting', ['user' => $user]);
        }
    }
      /**
     * Update profile for user detail
     * get user detail form user form
     * return void
    */
    public function UpdateProfile(Request $request){
        $user = user::find(Auth::user()->user_id);
        $user->first_name=$request->first_name;
        $user->last_name=$request->last_name;
        $user->phone_no=$request->phone_no;
        $user->city=$request->city;
        $user->state=$request->state;
        $user->zip_code=$request->postal_code;
        $user->country=$request->country;
        $user->address=$request->address;
        if($user->save()){
            Session::flash('user_profile', 'Profile updated successfully !'); 
            
            Session::flash('alert-class', 'alert alert-success alert-dismissible fade show');
        }else{
            Session::flash('user_profile', 'There are some error try again !'); 
            
            Session::flash('alert-class', 'alert alert-danger alert-dismissible fade show');
        }
         return redirect('/user/profile');
    }
}

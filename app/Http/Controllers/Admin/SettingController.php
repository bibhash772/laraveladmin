<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Session;

class SettingController extends Controller
{
    public function index(){
    	if(Auth::user()->user_id){
    		$user_id=Auth::user()->user_id;
    		$user= User::findOrFail($user_id);
    		return  view('admin.user.profile-setting', ['user' => $user]);
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
    	$user->zip_code=$request->zip_code;
    	$user->country=$request->country;
    	$user->address=$request->address;
    	if($user->save()){
    		Session::flash('message', 'Profile updated successfully !'); 
            
            Session::flash('alert-class', 'alert alert-success alert-dismissible fade show');
    	}else{
    		Session::flash('message', 'There are some error try again !'); 
            
            Session::flash('alert-class', 'alert alert-danger alert-dismissible fade show');
    	}
    	 return redirect('/admin/profile-setting');
    }

    /**
     *  Change password for admin and lab executive
     @ input valiable: current password , new password
     @ return void
    */
    public function ChangePaaword(Request $request){
        
        if(isset($request->password) && !empty($request->password)){
             
            $user = user::find(Auth::user()->user_id);
            if (Hash::check($request->current_password, $user->password)){
                if($request->password==$request->cpassword){
                    $user->password=bcrypt($request->password);
                    if($user->save()){
                        Session::flash('message', 'password chnaged successfully !'); 
                        
                        Session::flash('alert-class', 'alert alert-success alert-dismissible fade show');
                    }else{
                        Session::flash('message', 'There are some error try again !'); 
                        
                        Session::flash('alert-class', 'alert alert-danger alert-dismissible fade show');
                    }
                 }else{
                    Session::flash('message', 'Current password and new password not match!'); 
                
                    Session::flash('alert-class', 'alert alert-danger alert-dismissible fade show');
                 }
            }else{
                Session::flash('message', 'not a valid current password!'); 
                
                Session::flash('alert-class', 'alert alert-danger alert-dismissible fade show');
            }
        }
        
        return  view('admin.user.change-password');
    }
}   

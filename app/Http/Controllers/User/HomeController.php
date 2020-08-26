<?php

namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ContactUs;
use Illuminate\Support\Facades\Mail;
use App\Mail\EmailContactUs;
use App\Mail\EmailContactUsReply;
class HomeController extends Controller
{
	
    public function index()
    {
        
     	return  view('user.home');
    }

    public function TermsAndCondition()
    {
     	return  view('user.terms-condition');
    }
    public function PrivacyPolicy()
    {
     	return  view('user.privacy-policy');
    }
    public function ContactUs(Request $request)
    {
         $request->validate([
            'first_name' => 'required|max:191',
            'last_name' => 'required|max:191',
            'email_address' =>'required|email',
            'phone_no' => 'required|max:20|regex:/^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/',
            'message' => 'required|max:500',
        ]);

        $contactus= new ContactUs;
        $contactus->first_name=$request->input('first_name');
        $contactus->last_name=$request->input('last_name');
        $contactus->email=$request->input('email_address');
        $contactus->message=$request->input('message');
        $contactus->phone_no=$request->input('phone_no');
        if($contactus->save()){
            $email = new \stdClass();
            $email->receiver ='Admin';
            $email->first_name=$request->input('first_name');
            $email->last_name=$request->input('last_name');
            $email->email_address=$request->input('email_address');
            $email->message=$request->input('message');
            $email->phone_no=$request->input('phone_no');
            Mail::to(ADMINEMAIL)->send(new EmailContactUs($email));
            return response()->json(['status' =>true,'message'=>'Thank you for contacting us. We will get back to you soon.']);
        }else{
            return response()->json(['status' =>false,'message'=>'There are some error please try again.']);
        }
    }
    public function ReplyContactUs(Request $request){
        if(isset($request->id) && !empty($request->message)){
            $contact=ContactUs::where('id', '=', $request->id)->first();
            $email = new \stdClass();
            $email->receiver =$contact->first_name.' '.$contact->last_name;
            $email->message =$request->message;
            $email->subject='jonah ventures reply';
            Mail::to($contact->email)->send(new EmailContactUsReply($email));
            return response()->json(['status' =>true,'message'=>'reply send successfully.']);
        }else{
            return response()->json(['status' =>false,'message'=>'Please send proper request.']);
        }
    }
}

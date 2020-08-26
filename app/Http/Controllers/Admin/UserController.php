<?php
namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Mail\UserRegistration;
use Illuminate\Support\Facades\Mail;
use App\Models\User;
use Carbon\Carbon;
use Session;
use Response;

class UserController extends Controller
{

	/**
	 * display user list
	*/
   function __construct(){
        $this->middleware(function ($request, $next) {
          $this->user= Auth::user();
          if($this->user->user_type!=1){
            return redirect('/admin/home');
          }
          return $next($request);
        });
    }
    
	public function index(){
    	return  view('admin.user.list');
    }
    /**
     * [Addnew user]
    */
   	/**
    * [Addnew user list]
    */
   	public  function userlist(Request $request){


   		try {

            if ($request->ajax()) {

                $model = User::where('is_deleted', 0)->WhereIn('user_type',['3','4']);
                if($request->has('order')){
                    $orderColumn = $request->columns[$request->order[0]["column"]]["data"];
                    $model->orderBy($orderColumn,$request->order[0]['dir']);
                }

                return datatables()->eloquent($model)
                    ->filter(function ($query) use ($request) {

                    	if ($search = strtolower(trim(request()->search['value']))) {

		                    $query->where(function ($query) use ($search) {
		                        $query->where('first_name', 'like', "%" . $search . "%")
		                        ->orWhere('last_name', 'like', "%" . $search . "%")
		                        ->orWhere('email', 'like', "%" . $search . "%")
		                        ->orWhere('city', 'like', "%" . $search . "%")
		                        ->orWhere('phone_no', 'like', "%" . $search . "%");
		                    });
                  		}
                    })
                    ->toJson();
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
   	}
    /**
     * Chnage user status
     */
    public function ChnageUserStatus(Request $request){
        try {
              if ($request->ajax()) {

                $user = User::where('user_id',$request->id)->first();
                if($user->status==0){
                    $user->status=1;
                    if($user->save()){
                        return response()->json(['user_status' => 'Active', 'status_class' => 'label-success label label-default ustatus']);
                    }
                }else{
                  $user->status=0;
                    if($user->save()){
                        return response()->json(['user_status' => 'Inactive', 'status_class' => 'label-danger label label-default ustatus']);
                    }
                }
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
    
    public function Addnew(){
    	return  view('admin.user.add-new');
    }
    /**
     * [Adduser add new user]
     * @param Request $request [get user detail]
    */
    public function Adduser(Request $request){
    	$user= new User;
    	$user->first_name = $request->input('first_name');
  		$user->last_name = $request->input('last_name');
  		$user->email = $request->input('email');
  		$user->phone_no = $request->input('phone_no');
  		$user->city = $request->input('city');
  		$user->state = $request->input('state');
  		$user->country = $request->input('country');
  		$user->zip_code = $request->input('zip_code');
  		$user->address = $request->input('address');
  		$user->created_by =Auth::user()->user_id;
  		$user->updated_by =Auth::user()->user_id;
  		$user->is_deleted =0;
  		$user->user_type =3;
  		$user->status =0;
  		$user->account_activation_token =md5(Carbon::now().$request->input('email'));
  		$user->is_account_activated =0;
  		$user->created_at =Carbon::now();
  		if($user->save()){
  			    $email = new \stdClass();
         		$email->receiver =$user->first_name.' '.$user->last_name;
          	$email->account_type = 'user';
          	$email->email_id = $user->email;
          	$email->url = route('generate-password',$user->account_activation_token);
   			    Mail::to($user->email)->send(new UserRegistration($email));

      		    Session::flash('message', 'User added successfully please check email id!'); 
              Session::flash('alert-class', 'alert alert-success alert-dismissible fade show');
              return  view('admin.user.add-new');
      	}else{
      		Session::flash('message', 'There are some error try again !'); 
              Session::flash('alert-class', 'alert alert-danger alert-dismissible fade show');
              return  view('admin.user.add-new', ['user' => $user]);
      	}

	}
      /**
     * [Adduser add new user]
     * @param Request $request [get user detail]
    */
    public function Edituser(Request $request){
      $user = User::where('user_id',$request->user_id)->first();
      if(isset($request->first_name)){
        $user->first_name = $request->input('first_name');
        $user->last_name = $request->input('last_name');
        $user->phone_no = $request->input('phone_no');
        $user->city = $request->input('city');
        $user->state = $request->input('state');
        $user->country = $request->input('country');
        $user->zip_code = $request->input('zip_code');
        $user->address = $request->input('address');
        $user->created_by =Auth::user()->user_id;
        $user->updated_by =Auth::user()->user_id;
        $user->created_at =Carbon::now();
        $user->updated_at =Carbon::now();
        if($user->save()){
                Session::flash('message', 'User Updated successfully'); 
                Session::flash('alert-class', 'alert alert-success alert-dismissible fade show');
               return  view('admin.user.edit-user', ['user' => $user]);
          }else{
            Session::flash('message', 'There are some error try again !'); 
                Session::flash('alert-class', 'alert alert-danger alert-dismissible fade show');
                return  view('admin.user.edit-user', ['user' => $user]);
          }
      }
    return  view('admin.user.edit-user', ['user' => $user]);  
  }
}

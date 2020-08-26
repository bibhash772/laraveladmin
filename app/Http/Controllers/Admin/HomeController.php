<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ContactUs;
use App\Models\Kit;
use App\Models\Sample;
use App\Models\SampleReport;
use App\Models\UserKit;
use App\Models\User;
use Illuminate\Support\Facades\DB;
class HomeController extends Controller
{
	
    public function index()
    {
        $total_active_kit=Kit::where(['kit_status_id'=>1,'is_deleted'=>0])->count();
        $total_kit=Kit::where(['is_deleted'=>0])->count();
        $total_user=User::where(['is_deleted'=>0,'user_type'=>3])->count();
        $total_fish=SampleReport::where(['test_id'=>'Fish'])->count();
        $total_algae=SampleReport::where(['test_id'=>'Algae'])->count();

        $user_sample=DB::table('user_kit')
        ->join('user', function ($join) {
            $join->on('user_kit.user_id', '=', 'user.user_id');
        })
        ->where('user_kit.is_deleted', '=', 0)
        ->select(DB::raw('count(*) as kit_count, sv_user.state'))
        ->groupBy('user.state')
        ->orderBy('kit_count', 'desc')
        ->limit(5)
        ->get();
     	return  view('admin.home',['total_active_kit'=>$total_active_kit,'total_user'=>$total_user,'total_fish'=>$total_fish,'total_algae'=>$total_algae,'total_kit'=>$total_kit,'user_sample'=>$user_sample]);
    }
    /**
	 *  Funtion to display all contact us list with status
	*/
    public function ContactUs(){
    	return  view('admin.contactus');
    }
     /**
     * [Get the list of all Contact us]
     * @param  Request $request [request contain search data]
     * @return [type]           [description]
     */
    public  function ContactList(Request $request){
   		try {

            if ($request->ajax()) {
                 $model = ContactUs::where('is_deleted', 0);
                if($request->has('order')){
                    $orderColumn = $request->columns[$request->order[0]["column"]]["data"];
                    $model->orderBy($orderColumn,$request->order[0]['dir']);
                }

                return datatables()->eloquent($model)
                    ->filter(function ($query) use ($request) {

                    	if ($search = strtolower(trim(request()->search['value']))) {

		                    $query->where(function ($query) use ($search) {
		                        $query->where('email', 'like', "%" . $search . "%")
		                        ->orWhere('last_name', 'like', "%" . $search . "%")
		                        ->orWhere('first_name', 'like', "%" . $search . "%")
		                        ->orWhere('phone_no', 'like', "%" . $search . "%")
		                        ->orWhere('message', 'like', "%" . $search . "%");
		                    });
                  		}
                    })
                    ->toJson();
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
   	}
}

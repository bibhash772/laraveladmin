<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\KitMaster;
use App\Models\Kit;
use Carbon\Carbon;
use Session;
class KitController extends Controller
{
	/**
	 *  Funtion to display all kit list with status
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
    public function Index(){
    	return  view('admin.kit.list');
    }
    /**
     * [Get the list of all kit]
     * @param  Request $request [request contain search data]
     * @return [type]           [description]
     */
    public  function kitlist(Request $request){
   		try {

            if ($request->ajax()) {

                $model = Kit::where('is_deleted', 0);
                if($request->has('order')){
                    $orderColumn = $request->columns[$request->order[0]["column"]]["data"];
                    $model->orderBy($orderColumn,$request->order[0]['dir']);
                }

                return datatables()->eloquent($model)
                    ->filter(function ($query) use ($request) {

                    	if ($search = strtolower(trim(request()->search['value']))) {

		                    $query->where(function ($query) use ($search) {
		                        $query->where('kit_code', 'like', "%" . $search . "%");
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
   	 * Add new kit
   	 */
   	public function Addnew(){
    	return  view('admin.kit.add-new');
    }

    public function Addkit(Request $request){
    	$kit_count=Kit::where('kit_code',$request->kit_code)->count();
        if($kit_count==0){
        $kit=new Kit;  
      	$kit->kit_code=$request->kit_code;
      	$kit->kit_status_id=1;
      	$kit->created_by=Auth::user()->user_id;
      	$kit->updated_by=Auth::user()->user_id;
      	$kit->is_deleted=0;
      	$kit->created_at =Carbon::now();
      	if($kit->save()){
    			Session::flash('message', 'Kit created successfully!'); 
              Session::flash('alert-class', 'alert alert-success alert-dismissible fade show');
              return redirect('/admin/add-kit');
        }else{
        		Session::flash('message', 'There are some error try again !'); 
              Session::flash('alert-class', 'alert alert-danger alert-dismissible fade show');
              return  view('admin.kit.add-new', ['kit' => $kit]);
        }
      }else{
        Session::flash('message', 'Kit code already exit !'); 
        Session::flash('alert-class', 'alert alert-danger alert-dismissible fade show');
        return  view('admin.kit.add-new', ['kit' => $request]);
      }
    }

        /**
     * [Edit kit]
     * @param Request $request [get kit detail with status]
    */
    public function Editkit(Request $request){
      $kit = Kit::where('kit_id',$request->kit_id)->first();
      $kitstatus = KitMaster::all(['kit_m_status_id', 'status_title']);
      if(isset($request->kit_code)){
        $kit->kit_code=$request->kit_code;
        $kit->kit_status_id=$request->status;
        $kit->updated_by =Auth::user()->user_id;
        $kit->updated_at =Carbon::now();
        if($kit->save()){
                Session::flash('message', 'kit Updated successfully'); 
                Session::flash('alert-class', 'alert alert-success alert-dismissible fade show');
				return redirect('/admin/kit-edit/'.$request->kit_id.'');
          }else{
            Session::flash('message', 'There are some error try again !'); 
                Session::flash('alert-class', 'alert alert-danger alert-dismissible fade show');
                return  view('admin.kit.edit-kit', ['kit' => $kit]);
          }
      }
    	return  view('admin.kit.edit-kit', ['kit' => $kit,'kitstatus'=>$kitstatus]);  
  	}

   /**
     * Chnage user status
     */
    public function DeleteKit(Request $request){
        try {
              if ($request->ajax()) {

                $kit = Kit::where('kit_id',$request->id)->first();
                if($kit->is_deleted==0){
                    $kit->is_deleted=1;
                    if($kit->save()){
                        return response()->json(['status' =>true]);
                    }
                }
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
    /**
     * [Function to upload kits by csv file]
     * @param Request $request [get csv data]
     */
    public function UploadKit(Request $request){
        $filename=time().'_'.Auth::user()->user_id.'.csv';
        $path = $request->file('kitfile')->storeAs('kits',$filename);
        $file = storage_path("app/$path");
        $kitdata = $this->csvToArray($file);
        if(count($kitdata)>0){
          foreach($kitdata as $kit ){

            $kit_data= Kit::where('kit_code',$kit['KitCode'])->first();
            if(!isset($kit_data->kit_code)){
                $kit_data=new Kit;
                $kit_data->kit_code=$kit['KitCode'];
                $kit_data->kit_status_id=1;
                $kit_data->created_by=Auth::user()->user_id;
                $kit_data->updated_by=Auth::user()->user_id;
                $kit_data->is_deleted=0;
                $kit_data->created_at =Carbon::now();
                $kit_data->save();
            }
          }
          
          Session::flash('message', 'File uploaded successfully!'); 
          Session::flash('alert-class', 'alert alert-success alert-dismissible fade show');
        }else{
          Session::flash('message', 'There are some error try again !'); 
          Session::flash('alert-class', 'alert alert-danger alert-dismissible fade show');
        }
    return redirect('/admin/kit');
    }
    
    private function  csvToArray($filename = '', $delimiter = ','){
      if (!file_exists($filename) || !is_readable($filename))
          return false;

      $header = null;
      $data = array();
      if (($handle = fopen($filename, 'r')) !== false)
      {
          while (($row = fgetcsv($handle, 1000, $delimiter)) !== false)
          {
              if (!$header)
                  $header = $row;
              else
                  $data[] = array_combine($header, $row);
          }
          fclose($handle);
      }

      return $data;
  }
}

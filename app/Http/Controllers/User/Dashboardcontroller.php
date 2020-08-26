<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Kit;
use App\Models\UserKit;
use App\Models\Sample;
use App\Models\Esv;
use App\Models\SampleReport;
use Carbon\Carbon;
use Session;
use Charts;
class Dashboardcontroller extends Controller
{
    public function Index(){
    	return  view('user.dashboard');
    }

    public function ActivateKit(){
    	return  view('user.activateKit');
    }
   
    public function ExploreData(){

        $sampledata=Sample::where(array('is_deleted'=>0,'user_id'=>Auth::user()->user_id))->get();
    	return  view('user.exploreData',['sampledata' => $sampledata]);
    }
   
   	public function ExploreAllData(){
        $sampledata=Sample::where('user_id', '!=' ,Auth::user()->user_id)->where('is_deleted',0)->where('status',2)->where('is_public',1)->where('sample_report', '!=' ,null)->get();
        $array_lat_lng=array();
        $lable=array();
        $sampleid=array();
        foreach($sampledata as $key => $data ){
            array_push($array_lat_lng,['lat'=>(float)$data->latitude,'lng'=>(float)$data->longitude]);
            array_push($lable,$data->site_name);
            array_push($sampleid,$data->id);
        }
        return  view('user.exploreAllData',['sampledata' => $array_lat_lng,'lable'=>$lable,'sampleid'=>$sampleid]);
    }
    
    public function SampleDetail(Request $request){
       
        $sampledetail=Sample::where(array('is_deleted'=>0,'user_id'=>Auth::user()->user_id,'id'=>$request->sample_id))->firstOrFail();

        $sample_report=SampleReport::where(['sample_id'=>$sampledetail->sample_code,'replicate'=>1])
        ->join('esv', function ($join) {
            $join->on('esv.test_id', '=', 'sample_report.test_id')
                 ->on('esv.esv_id', '=', 'sample_report.esv_id');
        })
        ->select('sample_report.*', 'esv.kingdom', 'esv.phylum', 'esv.class', 'esv.order','esv.family', 'esv.genus', 'esv.species', 'esv.common_name', 'esv.perc_match', 'esv.sequence','esv.species_img', 'esv.map_img', 'esv.description')
        ->get();
        $sample_data=array();
        $algaegenus=array();
        $array_lable=array();
        $array_value=array();
        if(count($sample_report)){
            $sample_data = $sample_report->groupBy('test_id');
             if(isset($sample_data['Algae'])){
                $algaegenus=$sample_data['Algae']->groupBy('genus');
             }
            
        }
        foreach($algaegenus as $key => $genusdata ){
            array_push($array_lable, $key);
            array_push($array_value, $genusdata->sum('perc_reads'));
        }
        $pie  =  Charts::create('pie', 'chartjs')
                    ->title(false)
                    ->legend('{display:none}')
                    ->labels($array_lable)
                    ->values($array_value)
                    ->dimensions(400,400)
                    ->responsive(false);
        return  view('user.sample-detail',['sampledetail' =>$sampledetail,'sample_data'=>$sample_data,'algaegenus'=>$algaegenus,'pie'=>$pie]);
    }
    /*
        Public map sample detail
    */
    public function PublicSampleDetail(Request $request){
       
        $sampledetail=Sample::where(array('is_deleted'=>0,'is_public'=>1,'id'=>$request->sample_id))->firstOrFail();

        $sample_report=SampleReport::where(['sample_id'=>$sampledetail->sample_code,'replicate'=>1])
        ->join('esv', function ($join) {
            $join->on('esv.test_id', '=', 'sample_report.test_id')
                 ->on('esv.esv_id', '=', 'sample_report.esv_id');
        })
        ->select('sample_report.*', 'esv.kingdom', 'esv.phylum', 'esv.class', 'esv.order','esv.family', 'esv.genus', 'esv.species', 'esv.common_name', 'esv.perc_match', 'esv.sequence','esv.species_img', 'esv.map_img', 'esv.description')
        ->get();
        $sample_data=array();
        $algaegenus=array();
        $array_lable=array();
        $array_value=array();
        if(count($sample_report)){
            $sample_data = $sample_report->groupBy('test_id');
             if(isset($sample_data['Algae'])){
                $algaegenus=$sample_data['Algae']->groupBy('genus');
             }
            
        }
        foreach($algaegenus as $key => $genusdata ){
            array_push($array_lable, $key);
            array_push($array_value, $genusdata->sum('perc_reads'));
        }
        $pie  =  Charts::create('pie', 'chartjs')
                    ->title(false)
                    ->legend('{display:none}')
                    ->labels($array_lable)
                    ->values($array_value)
                    ->dimensions(400,400)
                    ->responsive(false);
        return  view('user.sample-detail',['sampledetail' =>$sampledetail,'sample_data'=>$sample_data,'algaegenus'=>$algaegenus,'pie'=>$pie]);
    }
    /*
        Filtered sample detail as per evs id    
    */
    public function GetFilteredSample(Request $request){
        if($request->evs_id){
            $sampledata=Sample::where('user_id', '!=' ,Auth::user()->user_id)->where('is_deleted',0)->where('status',2)->where('is_public',1)->where('sample_report', '!=' ,null)
                 ->join('sample_report', function ($join) {
                    $join->on('sample.sample_code', '=', 'sample_report.sample_id');
                })
                ->where('sample_report.esv_id',"$request->evs_id")
                ->where('sample_report.test_id','Fish')
                ->groupBy('sample.id')
                ->select('sample.*')
                ->get();
                $array_lat_lng=array();
                $lable=array();
                $sampleid=array();
                foreach($sampledata as $key => $data ){
                    array_push($array_lat_lng,['lat'=>(float)$data->latitude,'lng'=>(float)$data->longitude]);
                    array_push($lable,$data->site_name);
                    array_push($sampleid,$data->id);
                }
         return response()->json(['status'=>true,'sampledata'=>$array_lat_lng,'lable'=>$lable,'sampleid'=>$sampleid]);
        }else{
             return response()->json(['status'=>false]);
        }
    }
    /**
     * [This function is used to chnage pie chart as per algae type]
     * @param Request $request [In request We get sample code and type]
     */
    public function SampledetailByAttribute(Request $request){
        if(isset($request->type)){
            if(isset($request->code)){
                $sample_report=SampleReport::where(['sample_id'=>$request->code,'replicate'=>1])
                    ->join('esv', function ($join) {
                        $join->on('esv.test_id', '=', 'sample_report.test_id')
                             ->on('esv.esv_id', '=', 'sample_report.esv_id');
                    })
                    ->select('sample_report.*', 'esv.kingdom', 'esv.phylum', 'esv.class', 'esv.order','esv.family', 'esv.genus', 'esv.species', 'esv.common_name', 'esv.perc_match', 'esv.sequence')
                    ->get();
                    if($sample_report){
                        $sample_data = $sample_report->groupBy('test_id');
                        $algaetype=$sample_data['Algae']->groupBy($request->type);
                        $array_lable=array();
                        $array_value=array();
                        foreach($algaetype as $key => $algaesdata ){
                            array_push($array_lable, $key);
                            array_push($array_value, $algaesdata->sum('perc_reads'));
                        }
                        $pie  =  Charts::create('pie', 'chartjs')
                        ->title('')
                        ->labels($array_lable)
                        ->values($array_value)
                        ->dimensions(400,400)
                        ->responsive(false);
                        $view = view("user.sample-detail-ajaxview",['sample_data'=>$sample_data,'algaetype'=>$algaetype,'pie'=>$pie])->render();
                        return response()->json(['status'=>true,'html'=>$view]);
                    }else{
                        return response()->json(['status' =>false,'message'=>'No sample report data found']);
                    }
            }else{
                return response()->json(['status' =>false,'message'=>'Sample code not found']);
            }
        }else{
            return response()->json(['status' =>false,'message'=>'Request type not found']);
        }
    }
   	/**
   	 * This function will use to activate key by user we also insert value in sv_user_kit table here
   	 * @param Request $request [kit code]
   	 */
    public function ChnageKitStatus(Request $request){
    	 $request->validate([
            'kit_code' => 'required|min:8',
            'CaptchaCode' => 'required|valid_captcha' 
        ]);
    	$kit=Kit::whereKitCode($request->kit_code)->whereIsDeleted(0)->first();
    	if($kit){
    		if($kit->kit_status_id==KIT_STATUS_ACTIVE){
    			Session::flash('message', 'Kit already activated !'); 
           		Session::flash('alert-class', 'alert alert-danger alert-dismissible fade show');
            	return redirect('/user/activate-kit');
    		}else{
    			$kit->kit_status_id=KIT_STATUS_ACTIVE;
    			DB::beginTransaction();
    			if($kit->save()){
    				$user_kit= new UserKit;
    				$user_kit->user_id=Auth::user()->user_id;
    				$user_kit->is_activated=KIT_STATUS_ACTIVE;
    				$user_kit->kit_code=$kit->kit_code;
    				$user_kit->kit_id=$kit->kit_id;
    				$user_kit->created_at =Carbon::now();
    				$user_kit->created_by =Auth::user()->user_id;
    				$user_kit->is_deleted =0;
    				if($user_kit->save()){
    					DB::commit();
    					Session::flash('message', 'Kit activated successfully !'); 
              			Session::flash('alert-class', 'alert alert-success alert-dismissible fade show');
              			return redirect('/user/activate-kit');
    				}else{
    					DB::rollBack();
    					Session::flash('message', 'There are some error try again !'); 
              			Session::flash('alert-class', 'alert alert-danger alert-dismissible fade show');
              			return redirect('/user/activate-kit');
    				}
    			}else{
    				Session::flash('message', 'There are some error try again !'); 
              		Session::flash('alert-class', 'alert alert-danger alert-dismissible fade show');
              		return redirect('/user/activate-kit');
    			}
    		}
    	}else{
    		Session::flash('message', 'Kit Id is not available !'); 
            Session::flash('alert-class', 'alert alert-danger alert-dismissible fade show');
            return redirect('/user/activate-kit');
    	}
    }

    public function EditSampleDetail(Request $request){
        if(isset($request->code) && isset($request->value) && isset($request->name)){
            $sampledata=Sample::where(array('is_deleted'=>0,'sample_code'=>$request->code))->first();
            if(isset($sampledata->site_name)){
                $name=$request->name;
                if($request->type=='date'){
                 
                    $value=date('Y-m-d',strtotime($request->value)).',';
             
                }else if($request->type=='time'){
                    $value=date("H:i", strtotime($request->value));
                }else{
                    $value=$request->value;
                }
                $sampledata->$name=$value;
                if($sampledata->save()){
                     return response()->json(['status'=>true]);
                }else{
                    return response()->json(['status' =>false,'message'=>'There are some error try again !']);
                }
            }else{
                return response()->json(['status' =>false,'message'=>'Sample detail not found']);
            }
        }else{
            return response()->json(['status' =>false,'message'=>'There are some error with this request']);
        }
    }
    public function GetSpicesName(Request $request){
        if(!empty($request->term)){
            $spicesdetail=Esv::where('test_id','fish')->where('is_deleted',0)->where('common_name', 'like', '%'.$request->term.'%')->orWhere('genus', 'like', '%'.$request->term.'%')->orWhere('species', 'like', '%'.$request->term.'%')->groupBy('id')->select('id','common_name','species','genus','esv_id')->get();
                return response()->json(['status'=>true,'spicesdetail'=>$spicesdetail]);

        }
    }
}

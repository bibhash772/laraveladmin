<?php

namespace App\Http\Controllers\Labexecutive;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Kit;
use App\Models\Sample;
use App\Models\SampleReport;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Mail\SampleReceived;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;
use Session;
class SampleController extends Controller
{
    public function Index(){
        return  view('labexecutive.sample');
    }
    
    public function SampleList(Request $request){
        try {

            if ($request->ajax()) {

                $model = Sample::where('is_deleted',0)->with('user:user_id,first_name,last_name','kit:kit_id,kit_code')->withCount('sample_report');
                if($request->has('order')){
                    $orderColumn = $request->columns[$request->order[0]["column"]]["data"];
                    $model->orderBy($orderColumn,$request->order[0]['dir']);
                }

                return datatables()->eloquent($model)
                    ->filter(function ($query) use ($request) {

                        if ($search = strtolower(trim(request()->search['value']))) {

                            $query->where(function ($query) use ($search) {
                                $query->where('kitcode', 'like', "%" . $search . "%");
                            });
                        }
                    })
                    ->toJson();
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function ChnageSampleStatus(Request $request){
        try { 
           if ($request->ajax()) {
                 $sample = Sample::where('id',$request->id)->with('user:user_id,first_name,last_name,email','kit:kit_id,kit_code')->first();
                if($sample->status==1){
                    $sample->status=2;
                    $sample->sample_received_date=Carbon::today()->toDateString();
                    if($sample->save()){
                        $email = new \stdClass();
                        $email->receiver =$sample->user->first_name.' '.$sample->user->last_name;
                        $email->kit_code=$sample->kit->kit_code;
                        $email->sample_code=$sample->sample_code;
                        Mail::to($sample->user->email)->send(new SampleReceived($email));
                        return response()->json(['sample_status' => 'Received', 'status_class' => 'btn btn-success sweet-success']);
                    }
                }
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function UploadSampleReport(Request $request){
            $filename=time().'_'.Auth::user()->user_id.'.csv';
            $path = $request->file('taxanomyfile')->storeAs('sample_report',$filename);
            $file = storage_path("app/$path");
            $sample_data = $this->csvToArray($file);
            $error=0;
            DB::beginTransaction();
            if(count($sample_data)>0){
                foreach($sample_data as $data){
                    $kit=Kit::where('kit_code',$data['kitCode'])->first();
                    if(!$kit){
                        $kit=new Kit;
                        $kit->kit_code=$data['kitCode'];
                        $kit->kit_status_id=KIT_STATUS_ACTIVE;
                        $kit->kit_status_id=KIT_STATUS_ACTIVE;
                        $kit->kit_status_id=1;
                        $kit->created_by=Auth::user()->user_id;
                        $kit->updated_by=Auth::user()->user_id;
                        $kit->is_deleted=0;
                        $kit->created_at =Carbon::now();
                        if(!$kit->save()){
                            $error=1;
                        }
                    }
                    $sample=Sample::where('kitcode',$data['kitCode'])->first();
                        if(!$sample){
                            $sample=new Sample;
                            $sample->sample_code=strtoupper(substr(md5(time()), 0,8).$kit->kit_id);
                            $sample->kit_id=$kit->kit_id;
                            $sample->user_id=Auth::user()->user_id;
                            $sample->site_name='';
                            $sample->water_value=0;
                            $sample->latitude=0;
                            $sample->longitude=0;
                            $sample->sample_date=date('Y-m-d');
                            $sample->sample_time=date('h:i:s');
                            $sample->sample_received_date=date('Y-m-d');
                            $sample->is_public=1;
                            $sample->sample_notes='';
                            $sample->created_by=Auth::user()->user_id;
                            $sample->updated_by=Auth::user()->user_id;
                            $sample->is_deleted=0;
                            $sample->sample_report='';
                            $sample->status=2;
                            $sample->dispatch_traking_code='';
                            $sample->kitcode=$kit->kit_code;
                            if(!$sample->save()){
                                 $error=1;
                            }
                        }
                        
                        if(empty($sample->sample_report)){
                           /* save sample report path*/
                            $sample->sample_report=$path;
                            $sample->save();
                        }

                        $sample_rep=SampleReport::where(['sample_id'=>$sample->sample_code,'replicate'=>$data['Replicate'],'test_id'=>$data['TestID'],'esv_id'=>$data['ESVID']])->first();
                        if(!isset($sample_rep->sample_id)){
                        $sample_rep=new SampleReport;
                        }
                        $sample_rep->sample_id=$sample->sample_code;
                        $sample_rep->replicate=$data['Replicate'];
                        $sample_rep->test_id=$data['TestID'];
                        $sample_rep->esv_id=$data['ESVID'];
                        $sample_rep->perc_reads=$data['PercReads'];
                        $sample_rep->created_at=Carbon::now();
                        $sample_rep->save();
                        Session::flash('message', 'Report uploaded successfully!'); 
                        Session::flash('alert-class', 'alert alert-success alert-dismissible fade show');
                
                }
                 /*check if all transaction completed successfully*/
                if($error){
                    Session::flash('message', 'There are some error try again !'); 
                            Session::flash('alert-class', 'alert alert-danger alert-dismissible fade show');
                    DB::rollBack();
                }else{
                    DB::commit();
                }
            }else{
                Session::flash('message', 'There are some error try again !'); 
                Session::flash('alert-class', 'alert alert-danger alert-dismissible fade show');
            }
            return redirect('/labexecutive/sample');
    }
    private function  csvToArray($filename = '', $delimiter = ',')
    {
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
    public function EditSample(Request $request){
        $sample=Sample::where('id',$request->sample_id)->findOrFail($request->sample_id);
        if(isset($request->sample_date)){
            $sample->sample_date=$request->sample_date;
            $sample->sample_time=$request->sample_time.':00';
            $sample->latitude=$request->latitude;
            $sample->longitude=$request->longitude;
            $sample->site_name=$request->site_name;
            $sample->is_public=$request->is_public;
            $sample->sample_notes=$request->sample_notes;
            $sample->sample_received_date=$request->sample_received_date;
            if($sample->save()){
                Session::flash('message', 'Sample updated successfully!'); 
                Session::flash('alert-class', 'alert alert-success alert-dismissible fade show');
              return redirect('/labexecutive/sample-edit/'.$request->sample_id);  
            }else{
                Session::flash('message', 'There are some error try again !'); 
                Session::flash('alert-class', 'alert alert-danger alert-dismissible fade show');
                return redirect('/labexecutive/sample-edit/'.$request->sample_id);  
            }
        }

        return  view('labexecutive.sampleiedit',['sample' => $sample]);
    }


    public function SampleReport(Request $request){
        if(isset($request->sample_id)){

            $sampledetail=Sample::where(array('is_deleted'=>0,'id'=>$request->sample_id))->firstOrFail();

            $sample_report=SampleReport::where(['sample_id'=>$sampledetail->sample_code,'replicate'=>1])
            ->join('esv', function ($join) {
                $join->on('esv.test_id', '=', 'sample_report.test_id')
                     ->on('esv.esv_id', '=', 'sample_report.esv_id');
            })
            ->select('sample_report.*', 'esv.kingdom', 'esv.phylum', 'esv.class', 'esv.order','esv.family', 'esv.genus', 'esv.species', 'esv.common_name', 'esv.perc_match', 'esv.sequence')
            ->get();
            $sample_data=array();
            $algaegenus=array();
            $algaeorder=array();
            $algaefamily=array();
            $algaephylum=array();
            if(count($sample_report)){
                $sample_data = $sample_report->groupBy('test_id');
                if(isset($sample_data['Algae'])){
                    $algaegenus=$sample_data['Algae']->groupBy('genus');
                    $algaeorder=$sample_data['Algae']->groupBy('order');
                    $algaefamily=$sample_data['Algae']->groupBy('family');
                    $algaephylum=$sample_data['Algae']->groupBy('phylum');
                }  
            }

            return  view('labexecutive.sample-detail',['sampledetail' =>$sampledetail,'sample_data'=>$sample_data,'algaegenus'=>$algaegenus,'algaeorder'=>$algaeorder,'algaefamily'=>$algaefamily,'algaephylum'=>$algaephylum]);

        }else{
            Session::flash('message', 'There are some error try again !'); 
            Session::flash('alert-class', 'alert alert-danger alert-dismissible fade show');
            return redirect('/labexecutive/sample');
        }
    }
     public function EditSampleReport(Request $request){
        if(isset($request->sample_id)){
            if(isset($request->test_id)){
                $data_id=explode('-',$request->test_id);
                $sample_report=SampleReport::where(['id'=>$data_id[1]])->firstOrFail();
                if($sample_report){
                    $sample_report->replicate=$request->replicate;
                    $sample_report->esv_id=$request->evs_id;
                    $sample_report->perc_reads=$request->perc_reads;
                    $sample_report->test_id=$data_id[0];
                     if($sample_report->save()){
                            return response()->json(['status'=>true]);
                        }else{
                            return response()->json(['status' =>false,'message'=>'There are some error try again !']);
                    }

                }
            }
            $sampledetail=Sample::where(array('is_deleted'=>0,'id'=>$request->sample_id))->firstOrFail();

            $sample_report=SampleReport::where(['sample_id'=>$sampledetail->sample_code])->get();
            
            return  view('labexecutive.edit-sample-report',['sample_report' => $sample_report,'sampledetail'=>$sampledetail]);

        }else{
            Session::flash('message', 'There are some error try again !'); 
            Session::flash('alert-class', 'alert alert-danger alert-dismissible fade show');
            return redirect('/labexecutive/sample');
        }
    }
}

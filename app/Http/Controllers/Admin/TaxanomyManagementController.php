<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Esv;
use Carbon\Carbon;
use Session;
use Tymon\JWTAuth\Contracts\Providers\Storage;

class TaxanomyManagementController extends Controller
{

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
      return view('admin.taxanomy.list');
    }
    /**
     * display list of taxanomy
     * @param filter variable
     */
    public function TaxanomyList(Request $request){
      try {

            if ($request->ajax()) {

                $model = Esv::where('is_deleted', 0);
                if($request->has('order')){
                    $orderColumn = $request->columns[$request->order[0]["column"]]["data"];
                    $model->orderBy($orderColumn,$request->order[0]['dir']);
                }

                return datatables()->eloquent($model)
                    ->filter(function ($query) use ($request) {

                      if ($search = strtolower(trim(request()->search['value']))) {

                        $query->where(function ($query) use ($search) {
                            $query->where('test_id', 'like', "%" . $search . "%")
                            ->orWhere('esv_id', 'like', "%" . $search . "%")
                            ->orWhere('common_name', 'like', "%" . $search . "%")
                            ->orWhere('family', 'like', "%" . $search . "%");
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
     * Upload texanomy file
     * @param Request $request [csv file in post request]
     */
    public function Upload(Request $request){
        $filename=time().'_'.Auth::user()->user_id.'.csv';
        $path = $request->file('taxanomyfile')->storeAs('csv_file',$filename);
        $file = storage_path("app/$path");
      $taxanomydata = $this->csvToArray($file);
      if(count($taxanomydata)>0){
        foreach($taxanomydata as $taxanomy ){

          $esv=Esv::where(['test_id'=>$taxanomy['TestID'],'esv_id'=>$taxanomy['ESVID']])->first();
          if(!isset($esv->test_id)){
            $esv=new Esv;
          }
          $esv->test_id=$taxanomy['TestID'];
          $esv->esv_id=$taxanomy['ESVID'];
          $esv->kingdom=$taxanomy['Kingdom'];
          $esv->phylum=$taxanomy['Phylum'];
          $esv->order=$taxanomy['Order'];
          $esv->family=$taxanomy['Family'];
          $esv->genus=$taxanomy['Genus'];
          $esv->species=$taxanomy['Species'];
          $esv->common_name=$taxanomy['CommonName'];
          $esv->perc_match=$taxanomy['PercMatch'];
          $esv->sequence=$taxanomy['Sequence'];
          $esv->class=$taxanomy['Class'];
          $esv->species_img=$taxanomy['species_img'];
          $esv->map_img=$taxanomy['map_img'];
          $esv->description=$taxanomy['description'];
          $esv->created_by=Auth::user()->user_id;
          $esv->updated_by=Auth::user()->user_id;
          $esv->is_deleted=0;
          $esv->created_at=Carbon::now();
          $esv->save();
        }
        Session::flash('message', 'File uploaded successfully!');
                Session::flash('alert-class', 'alert alert-success alert-dismissible fade show');
      }else{
        Session::flash('message', 'There are some error try again !');
                Session::flash('alert-class', 'alert alert-danger alert-dismissible fade show');
      }
    return redirect('/admin/taxonomy');
    }
    /**
     * [This function for edit taxanomy]
     * @param  Request $request [taxanomy id]
     * @return [type]           [none]
     */
    public function edit(Request $request){
      $esv = Esv::where(array('is_deleted'=>0,'id'=>$request->id))->firstOrFail();
      $map_images= \File::allFiles(public_path('esv_images/map'));
      $spices_images=\File::allFiles(public_path('esv_images/species'));;
      if($esv){
        if(isset($request->sequence)){
          $esv->test_id=$request->test_id;
          $esv->esv_id=$request->esv_id;
          $esv->kingdom=$request->kingdom;
          $esv->phylum=$request->phylum;
          $esv->order=$request->order;
          $esv->family=$request->family;
          $esv->genus=$request->genus;
          $esv->species=$request->species;
          $esv->common_name=$request->common_name;
          $esv->perc_match=$request->perc_match;
          $esv->sequence=$request->sequence;
          $esv->class=$request->class;
          if($esv->test_id == 'Fish'){
            $esv->species_img=$request->species_image;
            $esv->map_img=$request->map_image;
            $esv->description=$request->description;
          }else{
            $esv->species_image=NULL;
            $esv->map_image=NULL;
            $esv->description=NULL;
          }
          $esv->updated_by=Auth::user()->user_id;
          $esv->updated_at=Carbon::now();
        if($esv->save()){
          Session::flash('message', 'Taxanomy updated successfully!');
                  Session::flash('alert-class', 'alert alert-success alert-dismissible fade show');
                  return redirect('admin/taxonomy/edit/'.$request->id.'');
        }else{
          Session::flash('message', 'There are some error try again !');
                Session::flash('alert-class', 'alert alert-danger alert-dismissible fade show');
            return redirect('admin/taxonomy/edit/'.$request->id.'');
        }

        }
        return view('admin.taxanomy.edit',['esv' =>$esv,'map_images'=>$map_images,'spices_images'=>$spices_images]);
      }else{
        Session::flash('message', 'There are some error try again !');
            Session::flash('alert-class', 'alert alert-danger alert-dismissible fade show');
        return redirect('/admin/taxonomy');
      }
    }
    public function DeleteTaxanomy(Request $request){
      try {
            if ($request->ajax()) {
        $evs = Esv::where('id',$request->id)->first();
                if($evs->is_deleted==0){
                    $evs->is_deleted=1;
                    if($evs->save()){
                        return response()->json(['status' =>true]);
                    }
                }
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
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
}

<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserKit;
use App\Models\Kit;
use App\Models\Sample;
use Illuminate\Support\Facades\Validator;
use JWTAuth;
 use Tymon\JWTAuth\Exceptions\JWTException;
class MobileApi extends Controller
{
	public function Login(Request $request)
	{
		try{
			if($request->isMethod('post')){
				$validator = Validator::make($request->all(),[
					'email'  => 'required',
					'password'  => 'required',
				]);
				if($validator->fails()) {
					$message = $validator->errors()->all()[0];
					return ['status'=>0,'message'=>$message,'resultData'=> array()];
				}
				$userdata = User::where(['email' => $request->email,'is_deleted' => '0'])->first();

				if($userdata && \Hash::check($request->password, $userdata->password)){

					if($userdata->status == 1){

						$usertoken  =  JWTAuth::fromUser($userdata);;
						return response()->json(['status' => 1,'message' => 'Success','resultData' => $userdata,'token'=>$usertoken],200);
					}
					return response()->json(['status' => 0,'message' => 'Your account has not been activated. Please check your email to activate your account. If problems persist, please contact support@jonahventures.com','resultData' => ''],200);
				}
				return response()->json(['status' => 0,'message' => 'Login credentials are invalid.','resultData' => ''],200);
			}
			return response()->json(['status' => 0,'message' => 'Invalid request','resultData' => ''],400);
		}catch(\Exception $e){
			return response()->json(['status' => 0,'message' => [$e->getMessage()],'resultData' => ''],404);
		} 
	}
	/**
	 * Mobile api to submitted sample
	 * @param Request $request [sample detail]
	 */
	public function Sample(Request $request)
	{
		//dd($request->all());
			try {

                if (! $user = JWTAuth::parseToken()->authenticate()) {
                   	return response()->json(['status' => 0,'message' => 'user not found','resultData' => ''],404);
                }

                if($request->isMethod('post')){
                	$validator = Validator::make($request->all(),[
						'kitcode'     => 'required|max:20',
						'site_name'   => 'required|max:191',
						'water_value' => 'required|max:191',
						'latitude'    => 'required|max:191',
						'longitude'   => 'required|max:191',
						'sample_date' => 'required',
						'sample_time' => 'required',
						'is_pubilc'   => 'required',
						'notes'       => 'required'
					]);
					if($validator->fails()) {
						$message = $validator->errors()->all()[0];
						return response()->json(['status' => 0,'message' => $message]);
						
					}
					$kit=Kit::where(['kit_code'=>$request->kitcode,'kit_status_id'=>1,'is_deleted'=>0])->first();
					/*$kit_detail=UserKit::where(['kit_code'=>$request->kitcode,'user_id'=>$user->user_id])->with('kit:kit_status_id,is_deleted,kit_id')->first();*/
					 if(isset($kit)){

					 	$semple_detail=Sample::where(['kitcode'=>$request->kitcode])->count();
					 	
					 	if($semple_detail==0){
					 		$sample=new Sample;
                            $sample->sample_code=strtoupper(substr(md5(time()), 0,8).$request->kitcode);
                            $sample->kit_id=$kit->kit_id;
                            $sample->user_id=$user->user_id;
                            $sample->site_name=$request->site_name;
                            $sample->water_value=$request->water_value;
                            $sample->latitude=$request->latitude;
                            $sample->longitude=$request->longitude;
                            $sample->sample_date=date('Y-m-d',strtotime($request->sample_date));
                            $sample->sample_time=$request->sample_time;
                            $sample->is_public=($request->is_pubilc=='yes')?1:0;
                            $sample->sample_notes=$request->notes;
                            $sample->created_by=$user->user_id;
                            $sample->updated_by=$user->user_id;
                            $sample->is_deleted=0;
                            $sample->sample_report='';
                            $sample->status=1;
                            $sample->dispatch_traking_code='';
                            $sample->kitcode=$request->kitcode;
                            if($sample->save()){
                                return response()->json(['status' => 1,'message' => 'Sample Submitted Successfully'],200);
                            }else{
                            	return response()->json(['status' => 1,'message' => 'There are some error please try again later'],500);
                            }
					 	}
					 	return response()->json(['status' => 0,'message' => 'Sample already submitted for this kit','resultData' => ''],400);
					 }
					 return response()->json(['status' => 0,'message' => 'Kit code not found','resultData' => ''],400);
                }
                return response()->json(['status' => 0,'message' => 'Invalid request','resultData' => ''],400);

            } catch (Tymon\JWTAuth\Exceptions\TokenExpiredException $e) {
            	return response()->json(['status' => 0,'message' => 'token_expired','resultData' => ''],$e->getStatusCode());          
            } catch (Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {
               	return response()->json(['status' => 0,'message' => 'token_invalid','resultData' => ''],$e->getStatusCode());
            } catch (Tymon\JWTAuth\Exceptions\JWTException $e) {
                return response()->json(['status' => 0,'message' => 'token_absent','resultData' => ''],$e->getStatusCode());
            }catch (\Exception $e) {
                return response()->json(['status' => 0,'message' => $e->getMessage(),'resultData' => '']);
            }
	}
}

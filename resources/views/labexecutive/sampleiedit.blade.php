<!-- [ Main Content ] start -->
@extends('layouts.default')
@section('content')
<section class="pcoded-main-container">
   <div class="pcoded-wrapper">
   <div class="pcoded-content">
      <div class="pcoded-inner-content">
         <div class="main-body">
            <div class="page-wrapper">
               <!-- [ breadcrumb ] start -->
               <div class="page-block">
                  <div class="row align-items-center">
                     <div class="col-md-12">
                        <ul class="breadcrumb">
                           <li class="breadcrumb-item"><a href="index.html"><i class="feather icon-home"></i></a></li>
                           <li class="breadcrumb-item"><a href="/admin/home">Home</a></li>
                           <li class="breadcrumb-item"><a href="/labexecutive/sample">Sample</a></li>
                           <li class="breadcrumb-item"><a >Sample Edit</a></li>
                        </ul>
                     </div>
                  </div>
               </div>
               <!-- [ breadcrumb ] end -->
               <!-- [ Main Content ] start -->
               <div class="row">
                  <!-- [ Form Validation ] start -->
                  <div class="col-sm-12">
                     <div class="card">
                        <div class="card-header">
                           <h5>Edit Sample</h5>
                        </div>
                        <div class="card-body">
                           @if(Session::has('message'))
                           <div class="{{ Session::get('alert-class', 'alert-info') }}" role="alert">
                              {{ Session::get('message') }}
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                           </div>
                           @endif
                           <form id="sample-edit" action="/labexecutive/sample-edit" method="post">
                              {{csrf_field()}}
                              <div class="row">
                                 <input type="hidden" value="{{@$sample->id}}" name="sample_id"/>
                                 <div class="col-md-6">
                                    <div class="form-group">
                                       <label class="form-label">Sample Date</label>
                                       <input type="text" class="form-control dateclass" name="sample_date" placeholder="Sample Date" value="{{@$sample->sample_date}}">
                                    </div>
                                 </div>
                                 <div class="col-md-6">
                                    <div class="form-group">
                                       <label class="form-label">Sample Time</label>
                                       <input type="text" class="form-control timeclass" name="sample_time" placeholder="Sample Time" value="{{date('H:i' ,strtotime(@$sample->sample_date.' '.@$sample->sample_time))}}">
                                    </div>
                                 </div>
                                 <div class="col-md-6">
                                    <div class="form-group">
                                       <label class="form-label">Latitude</label>
                                       <input type="text" class="form-control" name="latitude" placeholder="Latitude" value="{{@$sample->latitude}}">
                                    </div>
                                 </div>
                                 <div class="col-md-6">
                                    <div class="form-group">
                                       <label class="form-label">Longitude</label>
                                       <input type="text" class="form-control" name="longitude" placeholder="Longitude" value="{{@$sample->longitude}}">
                                    </div>
                                 </div>
                                 <div class="col-md-6">
                                    <div class="form-group">
                                       <label class="form-label">Public Status</label>
                                       <div>
                                          <select class="form-control" name="is_public">
                                             <option value="0" {{ ( $sample->is_public == 1) ? 'selected' : '' }}>Public</option>
                                             <option value="0" {{ ( $sample->is_public == 0) ? 'selected' : '' }}>Private</option>
                                          </select>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-md-6">
                                    <div class="form-group">
                                       <label class="form-label">Site Name</label>
                                       <div>
                                          <input type="text" class="form-control" name="site_name" value="{{@$sample->site_name}}" placeholder="Site Name">
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-md-6">
                                    <div class="form-group">
                                       <label class="form-label">Sample Note</label>
                                       <div>
                                          <input type="text" class="form-control" name="sample_notes" value="{{@$sample->sample_notes}}" placeholder="Sample Note">
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-md-6">
                                    <div class="form-group">
                                       <label class="form-label">Date Recieved</label>
                                       <div>
                                          <input type="text" class="form-control dateclass" name="sample_received_date" value="{{@$sample->sample_received_date}}" placeholder="Date Recieved">
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-md-12">
                                    <button type="submit" name="taxanomy_submit" class="btn btn-primary">Submit</button>
                                 </div>
                           </form>
                           </div>
                        </div>
                     </div>
                     <!-- [ Form Validation ] end -->
                  </div>
                  <!-- [ Main Content ] end -->
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
@endsection
<!-- [ Main Content ] start -->
@extends('layouts.default')
@section('content')
<div class="pcoded-main-container">
   <div class="pcoded-wrapper">
      <div class="pcoded-content">
         <div class="pcoded-inner-content">
            <div class="main-body">
               <div class="page-wrapper">
                  <!-- [ breadcrumb ] start -->
                  <div class="page-header">
                     <div class="page-block">
                        <div class="row align-items-center">
                           <div class="col-md-12">
                              <div class="page-header-title">
                                 <h5>Home</h5>
                              </div>
                              <ul class="breadcrumb">
                                 <li class="breadcrumb-item"><a href="/admin/home"><i class="feather icon-home"></i></a></li>
                                 <li class="breadcrumb-item"><a href="#!">Analytics Dashboard</a></li>
                              </ul>
                           </div>
                        </div>
                     </div>
                  </div>
                  <!-- [ breadcrumb ] end -->
                  <!-- [ Main Content ] start -->
                  <div class="row">
                    
                     <div class="col-xl-12 col-md-12">
                        <div class="row">
                           <div class="col-md-3">
                              <div class="card bg-c-blue order-card">
                                 <div class="card-body">
                                    <h6 class="m-b-20">Total Active Kit</h6>
                                    <h2 class="text-left"><span>{{$total_active_kit}}</span><i class="fas fa-medkit float-right"></i></h2>
                                    <!-- <p class="m-b-0 text-right">Total Kit<span class="float-left">{{$total_kit}}</span></p> -->
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-3">
                              <div class="card bg-c-green order-card">
                                 <div class="card-body">
                                    <h6 class="m-b-20">Total User</h6>
                                    <h2 class="text-left"><span>{{$total_user}}</span><i class="feather icon-user float-right"></i></h2>
                                    <!-- <p class="m-b-0 text-right">This Month<span class="float-left">213</span></p> -->
                                 </div>
                              </div>
                           </div>
                            <div class="col-md-3">
                              <div class="card bg-c-purple order-card">
                                 <div class="card-body">
                                    <h6 class="m-b-20">Total Fish Species</h6>
                                    <h2 class="text-left"><span>{{$total_fish}}</span><i class="fas fa-fish float-right"></i></h2>
                                    <!-- <p class="m-b-0 text-right">This Month<span class="float-left">213</span></p> -->
                                 </div>
                              </div>
                           </div>
                            <div class="col-md-3">
                              <div class="card bg-c-yellow order-card">
                                 <div class="card-body">
                                    <h6 class="m-b-20">Total Algae Species</h6>
                                    <h2 class="text-left"><span>{{$total_algae}}</span><i class="fas fa-feather float-right"></i></h2>
                                    <!-- <p class="m-b-0 text-right">This Month<span class="float-left">213</span></p> -->
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  
                   
                     
                     <!-- sessions-section start -->
                     <div class="col-xl-12 col-md-6">
                        <div class="card table-card">
                           <div class="card-header">
                              <h5>Kit record by state</h5>
                           </div>
                           <div class="card-body px-0 py-0">
                              <div class="table-responsive">
                                 <div class="session-scroll" style="position:relative;">
                                    <table class="table table-hover m-b-0">
                                       <thead>
                                          <tr>
                                             <th><span>State</span></th>
                                             <th><span>Total Kit</span></th>
                                             
                                          </tr>
                                       </thead>
                                       <tbody>
                                       @foreach($user_sample as $sampledata)
                                          <tr>
                                             <td>{{$sampledata->state}}</td>
                                             <td>{{$sampledata->kit_count}}</td>
                                          </tr>
                                       @endforeach
                                       </tbody>
                                    </table>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                    
                  </div>

                  <!-- [ Main Content ] end -->
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection
@section('footer-script')
 <script src="{{asset('js/pages/dashboard-analytics.js') }}"></script> 
@endsection
<!-- [ Main Content ] end -->


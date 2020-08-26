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
                                            <li class="breadcrumb-item"><a href="/admin/home"><i class="feather icon-home"></i></a></li>
                                            <li class="breadcrumb-item"><a href="/home">Home</a></li>
                                             <li class="breadcrumb-item"><a >Change Password</a></li>
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
                                        <h5>Change Password</h5>
                                    </div>
                                    <div class="card-body">
                                           @if(Session::has('message'))
                                                <div class="{{ Session::get('alert-class', 'alert-info') }}" role="alert">
                                                    {{ Session::get('message') }}
                                                   <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                                </div>
                                            @endif
                                        <form id="chnage-password" action="change-password" method="post">
                                            {{csrf_field()}}
                                            <div class="row w-50">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="form-label">Current password</label>
                                                        <input type="password" class="form-control" name="current_password" placeholder="Current Password">
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="form-label">New Password</label>
                                                        <input type="password" class="form-control" name="password" placeholder="New Password" value="{{@$user->last_name}}">
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="form-label">Re-Type New Password</label>
                                                        <input type="password" class="form-control" name="cpassword" placeholder="Re-Type New Password">
                                                    </div>
                                                </div>
                                                 <div class="col-md-12">
                                                    <button type="submit" class="btn btn-primary">Submit</button>
                                            	</div>
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
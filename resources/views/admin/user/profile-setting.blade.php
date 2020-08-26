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
                                             <li class="breadcrumb-item"><a >Profile Setting</a></li>
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
                                        <h5>Profile Setting</h5>
                                    </div>
                                    <div class="card-body">
                                           @if(Session::has('message'))
                                                <div class="{{ Session::get('alert-class', 'alert-info') }}" role="alert">
                                                    {{ Session::get('message') }}
                                                   <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                                </div>
                                            @endif
                                        <form id="profile-setting" action="update-profile" method="post">
                                            {{csrf_field()}}
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label">First Name</label>
                                                        <input type="text" class="form-control" name="first_name" placeholder="First Name" value="{{@$user->first_name}}">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label">Last name</label>
                                                        <input type="text" class="form-control" name="last_name" placeholder="Last Name" value="{{@$user->last_name}}">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label">Phone Number</label>
                                                        <input type="text" class="form-control" name="phone_no" placeholder="Phone Number" value="{{@$user->phone_no}}">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label">City</label>
                                                        <input type="text" class="form-control" name="city" placeholder="City" value="{{@$user->city}}">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label">State</label>
                                                        <input type="text" class="form-control" name="state" placeholder="State" value="{{@$user->state}}">
                                                    </div>
                                                </div>
                                              
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label">Zip Code</label>
                                                        <div>
                                                            <input type="zip_code" class="form-control" name="zip_code" value="{{@$user->zip_code}}">
                                                        </div>
                                                    </div>
                                                </div>
                                                 <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label">Country</label>
                                                        <div>
                                                            <input type="country" class="form-control" name="country" value="{{@$user->country}}">
                                                        </div>
                                                    </div>
                                                </div>
                                                  <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label">Address</label>
                                                        <div>
                                                            <input type="address" class="form-control" name="address" value="{{@$user->address}}">
                                                        </div>
                                                    </div>
                                                </div>
                                             <div class="col-md-6">
                                            <button type="submit" class="btn btn-primary">Submit</button>
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
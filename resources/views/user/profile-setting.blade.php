@extends('layouts.user')
@section('content')  
    <section class="db_sec_2">
        <div class="container">
            <h3 class="hm_headng">PROFILE</h3>
            <div class="db_content">
                <div class="profile_info">
                    <h3>
                        <img src="{{asset('images/user-image/db-icon-3.png')}}" alt="image">
                        <span>Personal Information</span>
                    </h3>
                    <div class="mt-4">
                        <div class="form-group">
                            <span class="gr_clr">First Name</span>
                            <span>{{$user->first_name}}</span>
                        </div>
                        <div class="form-group">
                            <span class="gr_clr">Last Name</span>
                            <span>{{$user->last_name}}</span>
                        </div>
                        <div class="form-group">
                            <span class="gr_clr">Email Address</span>
                            <span>{{$user->email}}</span>
                        </div>
                        <div class="form-group">
                            <span class="gr_clr">Phone Number</span>
                            <span>{{$user->phone_no}}</span>
                        </div>
                    </div>
                    <h3 class="ml_add">
                        <img src="{{asset('images/user-image/db-icon-4.png')}}" alt="image">
                        <span>Mailing Address</span>
                    </h3>
                    <div class="mt-4">
                        <div class="form-group">
                            <span class="gr_clr">Address</span>
                            <span>{{$user->address}}</span>
                        </div>
                        <div class="form-group">
                            <span class="gr_clr">City</span>
                            <span>{{$user->city}}</span>
                        </div>
                        <div class="form-group">
                            <span class="gr_clr">State</span>
                            <span>{{$user->state}}</span>
                        </div>
                        <div class="form-group">
                            <span class="gr_clr">Postal Code</span>
                            <span>{{$user->zip_code}}</span>
                        </div>
                        <div class="form-group">
                            <span class="gr_clr">Country</span>
                            <span>{{$user->country}}</span>
                        </div>
                    </div>
                    <button class="btn btn-primary mn-120" data-toggle="modal" data-target="#profilesetting">Edit</button>
                    <a class="btn btn-success mn-120" href="/user/dashboard">Cancel</a>
                </div>
            </div>
        </div>
    </section>
     <div class="modal" id="profilesetting">
      <div class="modal-dialog modal-1000 modal_bg">
        <div class="modal-content">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <div class="modal_txt text-right">
                <h3>Profile Setting</h3>
            </div>
            <div class="modal_left mobile-overlow">
                <span class="web_txt">Please fill out following fields</span>
                    @if ($errors->any())
                        {!! implode('', $errors->all("<div style='color:#d81616;'>:message</div>")) !!}
                    @endif
                    @if(Session::has('user_profile'))
                        <div class="{{ Session::get('alert-class', 'alert-info') }}">
                            {{ Session::get('user_profile') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                        </div>
                    @endif
                <form class="mt-5" id="profile-setting" method="post" action="update-profile">
                    {{csrf_field()}}
                    <div class="row">
                        <div class="col-12 col-xl-6">
                            <div class="form-group">
                                <input type="text" id="first_name" class="material-input"  placeholder="First Name" name="first_name" value="{{$user->first_name}}">
                                <label for="first_name" class="form__label">First Name</label>
                            </div>
                        </div>
                        <div class="col-12 col-xl-6">
                            <div class="form-group">
                                <input type="text" id="last_name" class="material-input"  placeholder="Last Name" name="last_name" value="{{$user->last_name}}">
                                <label for="last_name" class="form__label">Last Name</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-xl-6">
                            <div class="form-group">
                                <input type="number" id="phone_no" name="phone_no" class="material-input"  placeholder="Phone No."  value="{{$user->phone_no}}">
                                <label for="phoneno" class="form__label">Phone No.</label>
                            </div>
                        </div>
                         <div class="col-12 col-xl-6">
                            <div class="form-group">
                                <input type="text" id="Address"  value="{{$user->address}}" name="address" class="material-input"  placeholder="Address">
                                <label for="Address" class="form__label">Address</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-xl-6">
                            <div class="form-group">
                                <input type="text" id="City" class="material-input"  name="city" placeholder="City" value="{{$user->city}}">
                                <label for="City" class="form__label">City</label>
                            </div>
                        </div>
                        <div class="col-12 col-xl-6">
                            <div class="form-group">
                                <input type="text" id="State" name="state" class="material-input"  placeholder="State" value="{{$user->state}}">
                                <label for="State" class="form__label">State</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-xl-6">
                            <div class="form-group">
                                <input type="text" id="postal_code" name="postal_code" class="material-input"  placeholder="Postal Code" value="{{$user->zip_code}}">
                                <label for="postal_code" class="form__label">Postal Code</label>
                            </div>
                        </div>
                        <div class="col-12 col-xl-6">
                            <div class="form-group">
                                <input type="text" id="Country" name="country" value="{{$user->country}}" class="material-input"  placeholder="Country">
                                <label for="Country" class="form__label">Country</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary transition">SUBMIT</button>
                    </div>
                </form> 
            </div>
        </div>
      </div>
    </div>

@endsection

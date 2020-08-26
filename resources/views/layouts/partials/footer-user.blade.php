
    <div class="container-fluid p-0">
        <footer>
            <div class="d-flex flex-wrap align-items-center h_40">
                <div class="col-12 col-xl-4 res_center">
                    <span>© {{@date('Y')}} jonahventures</span>
                </div>
                <div class="col-12 col-xl-4">
                    <ul class="ft_links">
                        <li><a href="/terms-conditions" class="transition">Terms of Use</a></li>
                        <li><a href="/privacy-policy" class="transition">Privacy Policy</a></li>
                    </ul>
                </div>
               <!--  <div class="col-12 col-xl-4 text-right">
                    <span class="ft_txt">Website Designed & Developed by <a href="https://www.flexsin.com/">Flexsin</a></span>
                </div> -->
            </div>
        </footer>
    </div>




    <!-- Login Popup  -->

    @if(!Auth::guard('user')->check())
    <div class="modal" id="loginPopup">
      <div class="modal-dialog modal-1000 modal_bg">
        <div class="modal-content">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <div class="modal_txt text-right">
                <h3>LOGIN</h3>

            </div>
            <div class="modal_left">
                <h3 class="md_headng">Welcome</h3>
                <span class="web_txt">Enter Your Login Details Below</span>
                 @if(Session::has('login_error'))
                    <div class="{{ Session::get('alert-class', 'alert-info') }}">
                        {{ Session::get('login_error') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                    </div>
                @endif
                 <form id="loginform" action="/user/login" method="post" class="mt-5">
                    {{csrf_field()}}
                    <div class="form-group">
                        <input type="text" name="email" class="material-input" id="email" placeholder="Email Address">
                        <label for="email" class="form__label">Email Address</label>
                    </div>
                    <div class="form-group">
                        <input type="password" id="password" class="material-input" name="password" placeholder="Password">
                        <label for="emalapassworddress" class="form__label">Password</label>
                    </div>
                    <div class="form-group d-flex justify-content-between align-items-center">
                        <div>
                            <label class="chk-container">Remember Me
                              <input type="checkbox" checked="checked" name="remember_me" id="remember_me">
                              <span class="checkmark"></span>
                            </label>
                        </div>
                        <div>
                            <a href="javascript:;" onclick="openforgotpassword();">Forgot Password?</a>
                        </div>
                    </div>
                    <input type="hidden" id="auth_guard" class="material-input" name="auth_guard" value='3'>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary transition">SUBMIT</button>
                    </div>
                    <div class="lg_info">
                        Don't have an account? <a href="javascript:;" onclick="opensignuppopup()">SignUp</a>
                    </div>
                </form>
            </div>
        </div>
      </div>
    </div>

    <!-- Signup Popup  -->


    <div class="modal" id="signupPopup">
      <div class="modal-dialog modal-1000 modal_bg">
        <div class="modal-content">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <div class="modal_txt text-right">
                <h3>SIGNUP</h3>

            </div>
            <div class="modal_left mobile-overlow">
                <h3 class="md_headng">Welcome</h3>
                <span class="web_txt">Please fill out the following fields</span>
                    @if ($errors->any())
                        {!! implode('', $errors->all("<div style='color:#d81616;'>:message</div>")) !!}
                    @endif
                    @if(Session::has('user_registration'))
                        <div class="{{ Session::get('alert-class', 'alert-info') }}">
                            {{ Session::get('user_registration') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                        </div>
                    @endif
                <form class="mt-5" id="signup_form" method="post" action="/user/signup">
                    {{csrf_field()}}
                    <div class="row">
                        <div class="col-12 col-xl-6">
                            <div class="form-group">
                                <input type="text" id="first_name" class="material-input"  placeholder="First Name" name="first_name" value="{{old('first_name')}}">
                                <label for="first_name" class="form__label">First Name</label>
                            </div>
                        </div>
                        <div class="col-12 col-xl-6">
                            <div class="form-group">
                                <input type="text" id="last_name" class="material-input"  placeholder="Last Name" name="last_name" value="{{old('last_name')}}">
                                <label for="last_name" class="form__label">Last Name</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-xl-6">
                            <div class="form-group">
                                <input type="text" id="emailaddress" class="material-input"  placeholder="Email Address" name="email_address" value="{{old('email_address')}}">
                                <label for="email_address" class="form__label">Email Address</label>
                            </div>
                        </div>
                        <div class="col-12 col-xl-6">
                            <div class="form-group">
                                <input type="number" id="phone_no" name="phone_no" class="material-input"  placeholder="Phone No."  value="{{old('phone_no')}}">
                                <label for="phoneno" class="form__label">Phone No.</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-xl-6">
                            <div class="form-group">
                                <input type="password" id="user-Password" name="password" class="material-input"  placeholder="Password" value="{{old('password')}}">
                                <label for="user-Password" class="form__label">Password</label>
                            </div>
                        </div>
                        <div class="col-12 col-xl-6">
                            <div class="form-group">
                                <input type="password" id="user-confirmpassword" name="confirmed" class="material-input"  placeholder="Confirm Password" value="{{old('confirmed')}}">
                                <label for="user-confirmpassword" class="form__label">Confirm Password</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-xl-12">
                            <div class="form-group">
                                <input type="text" id="Address"  value="{{old('address')}}" name="address" class="material-input"  placeholder="Address">
                                <label for="Address" class="form__label">Address</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-xl-6">
                            <div class="form-group">
                                <input type="text" id="City" class="material-input"  name="city" placeholder="City" value="{{old('city')}}">
                                <label for="City" class="form__label">City</label>
                            </div>
                        </div>
                        <div class="col-12 col-xl-6">
                            <div class="form-group">
                                <input type="text" id="State" name="state" class="material-input"  placeholder="State" value="{{old('state')}}">
                                <label for="State" class="form__label">State</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-xl-6">
                            <div class="form-group">
                                <input type="text" id="postal_code" name="postal_code" class="material-input"  placeholder="Postal Code" value="{{old('postal_code')}}">
                                <label for="postal_code" class="form__label">Postal Code</label>
                            </div>
                        </div>
                        <div class="col-12 col-xl-6">
                            <div class="form-group">
                                <input type="text" id="Country" name="country" value="{{old('country')}}" class="material-input"  placeholder="Country">
                                <label for="Country" class="form__label">Country</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary transition">SUBMIT</button>
                    </div>
                    <div class="lg_info ">
                        Already have an account? <a href="javascript:;" onclick="onpenloginpopup()">Login</a>
                    </div>
                </form>
            </div>
        </div>
      </div>
    </div>
     <!-- Login Popup  -->


    <div class="modal" id="generate-password">
      <div class="modal-dialog modal-1000 modal_bg">
        <div class="modal-content">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <div class="modal_txt text-right">
                <h3>Generate Password</h3>
                <span>Generate password and activate your account</span>
            </div>
            <div class="modal_left">
                <h3 class="md_headng">Welcome</h3>
                <span class="web_txt">Enter Your password Details Below</span>
                 @if(Session::has('password_message'))
                    <div class="{{ Session::get('alert-class', 'alert-info') }}">
                        {{ Session::get('password_message') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                    </div>
                @endif
                 <form id="generatepassword" action="" method="post" class="mt-5">
                    {{csrf_field()}}
                    <div class="form-group">
                        <input type="password" id="user-password" class="material-input" name="password" placeholder="Password">
                        <label for="emalapassworddress" class="form__label">Password</label>
                    </div>
                     <div class="form-group">
                         <input type="password" id="user-confirmpassword" name="confirmpassword" class="material-input"  placeholder="Confirm Password">
                         <label for="user-confirmpassword" class="form__label">Confirm Password</label>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary transition">SUBMIT</button>
                    </div>
                </form>
            </div>
        </div>
      </div>
    </div>
    @if(isset($forgot_passworrd))
    <div class="modal" id="reset-password">
      <div class="modal-dialog modal-1000 modal_bg">
        <div class="modal-content">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <div class="modal_txt text-right">
                <h3>Reset Password</h3>
                <span>Reset password for your account</span>
            </div>
            <div class="modal_left">
                <h3 class="md_headng">Welcome</h3>
                <span class="web_txt">Enter Your password Details Below</span>
                @if ($errors->any())
                        {!! implode('', $errors->all("<div style='color:#d81616;'>:message</div>")) !!}
                @endif
                @if(Session::has('status'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ Session::get('status') }}
                               <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                            </div>
                @endif
                 <form id="generatepassword" action="{{route('password.request')}}" method="post" class="mt-5">
                    {{csrf_field()}}
                    <input type="hidden" name="token" value="{{$token}}" >
                    <div class="form-group">
                        <input type="hidden" class="form-control" name="email" placeholder="Email" id="email" value="{{$email}}">

                        <input type="password" id="user-password" class="material-input" name="password" placeholder="Password">
                        <label for="emalapassworddress" class="form__label">Password</label>
                    </div>
                     <div class="form-group">
                         <input type="password" id="password_confirmation" name="password_confirmation" class="material-input"  placeholder="Confirm Password">
                         <label for="user-confirmpassword" class="form__label">Confirm Password</label>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary transition">SUBMIT</button>
                    </div>
                </form>
            </div>
        </div>
      </div>
    </div>
     @endif
    <div class="modal" id="forgotpassword">
      <div class="modal-dialog modal-1000 modal_bg">
        <div class="modal-content">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <div class="modal_txt text-right">
                <h3>Forgot Password</h3>
                <span>Generate new  and login your account</span>
            </div>
            <div class="modal_left">
                <h3 class="md_headng">Welcome</h3>
                <span class="web_txt">Enter Your Email Details Below</span>
                  @if(Session::has('status'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ Session::get('status') }}
                               <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                            </div>
                     @endif
                 <form id="forgotpassword_form" action="/password/email" method="post" class="mt-5">
                    {{csrf_field()}}
                    <div class="form-group">
                        <input type="text" id="emailaddress_password" class="material-input"  placeholder="Email Address" name="email" value="{{old('email_address')}}">

                        <label for="email_address" class="form__label">Email Address</label>
                     </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary transition">SUBMIT</button>
                    </div>
                </form>
            </div>
        </div>
      </div>
    </div>
    @endif



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

<script src="{{asset('js/user/function.js')}}"></script>
<script src="{{asset('js/user/slick.min.js')}}"></script>
<script src="{{asset('plugins/jquery-validation/js/jquery.validate.min.js') }}"></script>
<script src="{{asset('js/user/form-validation.js') }}"></script>
<script src="{{asset('plugins/sweetalert/js/sweetalert.min.js') }}"></script>
<script src="http://momentjs.com/downloads/moment-with-locales.min.js"></script>
<script src="{{asset('plugins/material-datetimepicker/js/bootstrap-material-datetimepicker.js') }}"></script>
@if(Session::has('login_error'))
<script>
$(function() {
    $('#loginPopup').modal('show');
});
</script>
@endif

@if(Session::has('status') && !isset($forgot_passworrd))
<script>
$('#forgotpassword').modal('show');
</script>
@endif

@if(isset($token) && !isset($forgot_passworrd))
<script>
$(function() {
    $('#generate-password').modal('show');
});
</script>

@endif
@if(isset($forgot_passworrd))
<script>
$(function() {
    $('#reset-password').modal('show');
});
</script>
@endif

@if ($errors->any() && !isset($forgot_passworrd))
<script>
    $(function() {
        $('#signupPopup').modal('show');
    });
</script>
@endif
@if(Session::has('user_registration'))
<script>
$(function() {
    Swal.fire("Registration Successful","{{Session::get('user_registration')}}", "success");
    //$('#signupPopup').modal('show');
});
</script>
@endif

 @if(Session::has('password-reset-done'))
    <script>
        Swal.fire("Password Reset","{{Session::get('password-reset-done')}}", "success");
    </script>
 @endif
@if(Session::has('user_profile'))
<script>
$(function() {
    $('#profilesetting').modal('show');
});
</script>
@endif
<!--
sweet alert popup on email verification
-->
@if(Session::has('verification_message'))
<script>
Swal.fire("Email Verification","{{Session::get('verification_message')}}", "{{Session::get('verification_success')}}");
</script>
@endif
<script>
	$('.bannerSlider').slick({
		dots: true,
		speed: 600,
		slidesToShow: 1,
		slidesToScroll: 1,
		arrows: false,
		autoplay:false,
		autoplaySpeed:5000,

	});
    $("a[title ~= 'BotDetect']").removeAttr("style");
    $("a[title ~= 'BotDetect']").removeAttr("href");
    $("a[title ~= 'BotDetect']").css('visibility', 'hidden');

</script>
<script>
    function onpenloginpopup(){
        $('#signupPopup').modal('hide');
        $('#loginPopup').modal('show');
    }
    function opensignuppopup(){
         $('#signupPopup').modal('show');
        $('#loginPopup').modal('hide');
    }
    function openforgotpassword(){
        $('#signupPopup').modal('hide');
        $('#loginPopup').modal('hide');
        $('#forgotpassword').modal('show');
    }
</script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
 <script>
    jQuery("#search").autocomplete({
        source: function (request, response) {
             $.ajax({
                 url: "/api/get-spices-name",
                 type: "GET",
                 data: request,
                 success: function (data) {
                     response($.map(data.spicesdetail, function (el) {
                         return {
                             label: el.genus+' '+el.species+' / ' +el.common_name,
                             value: el.esv_id
                         };
                     }));
                 }
             });
        },
        select: function (event, ui) {
            // Prevent value from being put in the input:
            this.value = ui.item.label;
            // Set the next input's value to the "value" of the item.
            $(this).next("input").val(ui.item.value);
            $.ajax({
                url: "/api/get-filtered-sample",
                type: "GET",
                data: {evs_id:ui.item.value},
                success: function (data) {
                    if(data.status){
                        var location_data=data.sampledata;
                        var markers=[];  
                        for(var i=0;i<location_data.length;i++){
                            var latLng = new google.maps.LatLng(location_data[i].lat,location_data[i].lng);
                            if(markers.length != 0) {
                                for (j=0; j < markers.length; j++) {
                                    var existingMarker = markers[j];
                                    var pos = existingMarker.getPosition();
                                        if (latLng.equals(pos)) {
                                            var a = 360.0 / markers.length;
                                            var newLat = pos.lat() + -.00004 * Math.cos((+a*i) / 180 * Math.PI);  //x
                                            var newLng = pos.lng() + -.00004 * Math.sin((+a*i) / 180 * Math.PI);  //Y
                                            latLng = new google.maps.LatLng(newLat,newLng);
                                        }
                                    }
                            }
                            marker = new google.maps.Marker({
                            position: latLng,
                            
                            });
                                // Add info window to marker    
                                    google.maps.event.addListener(marker, 'click', (function(marker, i) {
                                        return function() {
                                            location.href='/user/public-sample-detail/'+data.sampleid[i % data.sampleid.length]
                                        }
                                    })(marker, i));
                                 markers.push(marker);
                        }
                        if (markerCluster)
                            markerCluster.clearMarkers();

                        //2.init marker cluster
                        markerCluster = new MarkerClusterer(map, markers,
                            { imagePath: 'https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/m' });

                    }
                }
             });
            event.preventDefault();
        }
    });
</script>
</body>
</html>

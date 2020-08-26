@extends('layouts.user')
@section('content')
     <section class="db_sec">
        <div class="container">
            <h3 class="hm_headng">ACTIVATE YOUR KIT</h3>
            <div class="db_content">
                <div class="profile_info">
                    <form id="activate-kit" action="/user/activate-kit" method="post">
                        <!-- Display validation message-->
                        @if ($errors->any())
                            {!! implode('', $errors->all("<div style='color:#d81616;'>:message</div>")) !!}
                        @endif
                        {{csrf_field()}}
                        <!-- Display error message-->
                        @if(Session::has('message'))
                            <div class="{{ Session::get('alert-class', 'alert-info') }}">
                                {{ Session::get('message') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                            </div>
                        @endif
                        <div class="row align-items-center">
                            <div class="col-12 col-lg-9">
                                <div class="form-group">
                                    <span class="d-block mb-2">Enter the kit's 8-character ID here. This will associate this kit with your account</span>
                                    <input type="text" name="kit_code" class="form_cntrl2 transition" value="{{old('kit_code')}}" >
                                </div>
                                <div class="form-group">
                                    <span class="d-block mb-2">CAPTCHA</span>
                                    <span class="d-block mb-3">
                                       {!! captcha_image_html('ContactCaptcha') !!}
                                    </span>
                                    <input type="text" class="form_cntrl2 transition" id="CaptchaCode" name="CaptchaCode">
                                </div>
                                <div class="res-gap">
                                    <button class="btn btn-primary mn-120" type="submit">CONTINUE</button>
                                    <a class="btn btn-success mn-120" href="/user/dashboard">CANCEL & RETURN</a>
                                </div>
                            </div>
                            <div class="col-12 col-lg-3">
                                <img src="{{asset('images/user-image/sample.png')}}" alt="image" class="w-100">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('footer-script')

@endsection
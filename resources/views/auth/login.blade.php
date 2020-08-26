@extends('layouts.auth')

@section('content')
<section >
    <div class="auth-wrapper">
    <div class="auth-content loginNew container">
        <div class="card">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <div class="card-body">
                        <img src="{{asset('images/logo-dark.png')}}" alt="" class="img-fluid mb-4">
                        @if(Session::has('login_error'))
                            <div class="{{ Session::get('alert-class', 'alert-info') }}">
                                {{ Session::get('login_error') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                            </div>
                        @endif
                        <h4 class="mb-3 f-w-400">Login into your account</h4>
                         <form id="loginform" action="/login" method="post">
                                {{csrf_field()}}
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="feather icon-mail"></i></span>
                                </div>
                                <input type="text" class="form-control" name="email" placeholder="Email">
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="feather icon-lock"></i></span>
                                </div>
                                <input type="password" class="form-control" name="password" placeholder="Password">
                            </div>
                            <!-- <div class="saprator"><span>OR</span></div>
                            <button class="btn btn-facebook mb-2 mr-2"><i class="fab fa-facebook-f"></i>facebook</button>
                            <button class="btn btn-googleplus mb-2 mr-2"><i class="fab fa-google-plus-g"></i>Google</button>
                            <button class="btn btn-twitter mb-2 mr-2"><i class="fab fa-twitter"></i>Twitter</button> -->
                            <div class="form-group text-left mt-2">
                                <div class="checkbox checkbox-primary d-inline">
                                     <input type="checkbox" name="remember_me" id="remember_me">
                                    <label for="remember_me" class="cr"> Remember me</label>
                                </div>
                            </div>
                             <button type="submit" class="btn btn-primary">Submit</button>
                         </form>
                        <p class="mb-2 text-muted">Forgot password? <a href="/password/reset" class="f-w-400">Reset</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</section>

@endsection


<style type="text/css">
    .loginNew .card{max-width: 360px; margin: 0 auto; width: 100%;}
</style>
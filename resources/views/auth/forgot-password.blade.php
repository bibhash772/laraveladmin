@extends('layouts.auth')

@section('content')
<div class="auth-wrapper">
    <!-- [ reset-password ] start -->
    <div class="auth-content loginNew container">
        <div class="card">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <div class="card-body">
                        <img src="{{asset('images/logo-dark.png')}}" alt="" class="img-fluid mb-4">
                        <h4 class="mb-3 f-w-400">Reset your password</h4>
                         @if(Session::has('status'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ Session::get('status') }}
                               <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                            </div>
                        @endif
                        <form id="forgot-password-form" action="/password/email" method="post">
                            {{csrf_field()}}
                            <div class="input-group mb-4">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="feather icon-mail"></i></span>
                                </div>
                                <input type="email" class="form-control" placeholder="Email address" name=email>
                            </div>
                            <button class="btn btn-primary mb-4" tyle="submit">Reset password</button>
                        </form>
                    </div>
                </div>
                <!-- <div class="col-md-6 d-none d-md-block">
                    <img src="{{asset('images/auth-bg.jpg')}}" alt="" class="img-fluid">
                </div> -->
            </div>
        </div>
    </div>
    <!-- [ reset-password ] end -->
</div>
@endsection
<style type="text/css">
    .loginNew .card{max-width: 360px; margin: 0 auto; width: 100%;}
</style>
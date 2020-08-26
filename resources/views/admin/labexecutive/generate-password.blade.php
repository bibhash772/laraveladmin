@extends('layouts.auth')

@section('content')
<style type="text/css">
    .loginNew .card{max-width: 360px; margin: 0 auto; width: 100%;}
</style>
<div class="auth-wrapper">
	<!-- [ change-password ] start -->
	<div class="auth-content loginNew container">
		<div class="card">
			<div class="row align-items-center">
				<div class="col-md-12">
					
					<div class="card-body">
						<img src="{{asset('images/logo-dark.png')}}" alt="" class="img-fluid mb-4">
						<h4 class="mb-4 f-w-400">Generate Password</h4>
						@if(Session::has('password_message'))
		                    <div class="{{ Session::get('alert-class', 'alert-info') }}">
		                        {{ Session::get('password_message') }}
		                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
		                    </div>
			            @endif
						 <form id="generatepassword" action="" method="post">
                            {{csrf_field()}}
                             <input type="hidden" name="token" value="{{$token}}" >
                   			 <div class="input-group mb-2">
								 <input type="password" id="password" name="password" placeholder="Password" class="form-control" >
							</div>
                            <div class="input-group mb-2">
								<input type="password" id="confirmpassword" name="confirmpassword" class="form-control"  placeholder="Confirm Password">
							</div>
							<button class="btn btn-primary mb-4" tyle="submit">Submit</button>
						</form>
						 <p class="mb-2 text-muted">Generate Password ? <a href="/admin" class="f-w-400"> Login</a></p>
					</div>
				</div>
				<!-- <div class="col-md-6 d-none d-md-block">
					<img src="{{asset('images/auth-bg.jpg')}}" alt="" class="img-fluid">
				</div> -->
			</div>
		</div>
	</div>
	<!-- [ change-password ] end -->
</div>
@endsection
@extends('layouts.auth')

@section('content')

<div class="auth-wrapper">
	<!-- [ change-password ] start -->
	<div class="auth-content container">
		<div class="card">
			<div class="row align-items-center">
				<div class="col-md-6">
					 {{ Session::get('status') }}
					 
					 @if(count($errors))
					 	{{$errors}}
					 @endif
					<div class="card-body">
						<img src="{{asset('images/logo-dark.png')}}" alt="" class="img-fluid mb-4">
						<h4 class="mb-4 f-w-400">Reset your password</h4>
						 <form id="reset_password" action="{{route('password.request')}}" method="post">
                            {{csrf_field()}}
                             <input type="hidden" name="token" value="{{$token}}" >
                   			 <div class="input-group mb-2">
								<input type="email" class="form-control" name="email" placeholder="Email" id="email" value="{{$email}}">
							</div>
                            <div class="input-group mb-2">
								<input type="password" class="form-control" name="password" placeholder="New Password" id="password">
							</div>
							<div class="input-group mb-4">
								<input type="password" class="form-control" name="password_confirmation" id="password_confirmation" placeholder="Re-Type New Password" id="cpassword">
							</div>
							<button class="btn btn-primary mb-4" tyle="submit">Reset password</button>
						</form>
					</div>
				</div>
				<div class="col-md-6 d-none d-md-block">
					<img src="{{asset('images/auth-bg.jpg')}}" alt="" class="img-fluid">
				</div>
			</div>
		</div>
	</div>
	<!-- [ change-password ] end -->
</div>
@endsection
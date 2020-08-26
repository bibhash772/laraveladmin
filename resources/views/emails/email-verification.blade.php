@extends('layouts.emailer')
@section('content')
<tr>
	<td>
		<table  border="0" cellspacing="0" width="100%" cellpadding="0"  >
			<tr><td style="height:20px"></td></tr>
			<tr>
				<td >  
					<table  border="0" cellspacing="0" width="100%" cellpadding="0" style=" color: #000; margin:0 auto; font-family:Arial, Helvetica, sans-serif;" >
						<tr>
							<td style="padding: 0 20px;" > 
								<span style="color: #000000; font-size: 17px;font-family:Arial, Helvetica, sans-serif;  font-weight: 600">Hi {{ $data->receiver }}, </span>
								<p style="color: #333333; line-height: 24px; font-family:Arial, Helvetica, sans-serif; padding-top: 5px; font-size: 13px; margin: 0;">
									Your account has been created successfully.  Please click <a href="{{ $data->url}}">here</a> or copy and paste the link below to activate your account.</p>
								<p style="color: #333333; line-height: 24px; font-family:Arial, Helvetica, sans-serif; padding-top: 5px; font-size: 13px; margin: 0;">
									{{$data->url}}
								</p>
									

							</td>
						</tr>
					</table>	
				</td>
			</tr>
			<tr><td style="height:20px"></td></tr>
		</table>	
	</td>
</tr>
@endsection
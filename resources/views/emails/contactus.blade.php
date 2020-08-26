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
								<span style="color: #000000; font-size: 17px;font-family:Arial, Helvetica, sans-serif;  font-weight: 600">Dear {{ $data->receiver }}, </span>
								<p style="color: #333333; line-height: 24px; font-family:Arial, Helvetica, sans-serif; padding-top: 5px; font-size: 13px; margin: 0;">
									We get a contact us request detail has given below.</p>
								<table border="0" cellspacing="0" width="100%" cellpadding="0" style=" color: #000; margin:0 auto; font-family:Arial, Helvetica, sans-serif;">
									<tr> 
										<td style="padding: 0 20px;" >First Name :</td>
										<td style="padding: 0 20px;" >{{ $data->first_name }}</td>
									</tr>
									<tr> 
										<td style="padding: 0 20px;" >Last Name :</td>
										<td style="padding: 0 20px;" >{{ $data->last_name }}</td>
									</tr>
									<tr> 
										<td style="padding: 0 20px;" >Email :</td>
										<td style="padding: 0 20px;" >{{ $data->email_address }}</td>
									</tr>
									<tr> 
										<td style="padding: 0 20px;" >Phone :</td>
										<td style="padding: 0 20px;" >{{ $data->phone_no }}</td>
									</tr>
									<tr> 
										<td style="padding: 0 20px;" >Message :</td>
										<td style="padding: 0 20px;" >{{ $data->message }}</td>
									</tr>
								</table>	
						
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
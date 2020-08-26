<!DOCTYPE html>
<html lang="en">
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<style>
		@media only screen and (max-width: 600px) {
		.tableCon {width:100% !important;}
		.logo {width:180px !important; margin: 0 auto!important;}
		.bannerImg img {width:100% !important;}
		.mainHd {font-size:18px !important;}
		.subHd {font-size:17px !important;}
		.pad80{padding: 0 40px!important;}
		}
	</style>
	</head>
	<body>
		<table border="0" cellspacing="0" cellpadding="0" class="tableCon" style="width:600px;margin:0 auto;font-family:Arial, Helvetica, sans-serif; border:#e5e5e5 solid 1px;">
			<tbody>
				<tr>
					<td>
						<table  border="0" cellspacing="0" width="100%" cellpadding="0" bgcolor="#08101b" >
							<tr><td style="height:25px"></td></tr>
							<tr>
								<td style="text-align: center;" > 
									<img class="logo" src="{{asset('images/logo.png')}}">
								</td>
							</tr>
							<tr><td style="height:25px"></td></tr>
						</table>	
					</td>
				</tr>
				
				 @yield('content')	
			
				<tr>
					<td>
						<table  border="0" cellspacing="0" width="100%" cellpadding="0" bgcolor="#28303c" >
							<tr> 
								<td style="padding: 10px 25px; text-align: center;" > 
									 <a style="padding: 0 5px" href="javascipt:;"><img src="{{asset('images/emailer/face.png')}}"></a>
									 <a style="padding: 0 5px" href="javascipt:;"><img src="{{asset('images/emailer/tw.png')}}"></a>
									 <a style="padding: 0 5px" href="javascipt:;"><img src="{{asset('images/emailer/instra.png')}}"></a>
									 <a style="padding: 0 5px" href="javascipt:;"><img src="{{asset('images/emailer/youtube.png')}}"></a>
									 <a style="padding: 0 5px" href="javascipt:;"><img src="{{asset('images/emailer/link.png')}}"></a>
								</td> 
							</tr>
						</table>	
					</td>
				</tr>	
				<tr>
					<td>
						<table  border="0" cellspacing="0" width="100%" cellpadding="0" bgcolor="#fff" >
							<tr>
								<td style="width: 20px;"></td>
								<td style="padding: 20px 0;" > 
									 <table  border="0" cellspacing="0" width="100%" cellpadding="0" style=" color: #000; margin:0 auto; font-family:Arial, Helvetica, sans-serif;" >
										<tr>
											<td style="font-size: 12px;font-family:Arial, Helvetica, sans-serif; color: #111928;">{{date('Y')}} © jonahventures.com All rights reserved</td>
											<td align="right"  style="font-size: 12px;text-decoration: none;color: #ed7c44;"> 
												<a href="javascipt:;" style="font-size: 12px;font-family:Arial, Helvetica, sans-serif;text-decoration: none;color: #ed7c44;"> Privacy Policy</a>
												  /
												<a href="javascipt:;" style="font-size: 12px;font-family:Arial, Helvetica, sans-serif;text-decoration: none;color: #ed7c44;">Terms and Conditions</a>
											</td>
										</tr>
									</table>	
								</td>
								<td style="width: 20px;"></td>
							</tr>
						</table>	
					</td>
				</tr>	
			</tbody>
		</table>

	</body>
</html>

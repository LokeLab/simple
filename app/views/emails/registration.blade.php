<!DOCTYPE html>
<html  >
	<head>
		<meta charset="utf-8">
		<style>
		body {
			font-family: 'Open Sans', sans-serif;
			font-size: 11px;
		}
		p {
			font-size: 11px;
		}
		h2 {
			font-size: 18px;
		}
		h3 {
			font-size: 16px;
		}
		
		</style>
	</head>
	<body>
	
		<h2>Confirm registration - {{Config::get('app.url')}} </h2>

		<h3>Dear {{$name}} </h3>
			<p>Welcome to {{Config::get('app.url')}}
		<p> You have successfully registered to the internal web tool of the {{Config::get('app.header')}}.</p>
		<p> Your access is: 
		<p> Username: {{$email}}
		<p> Password: {{$password}}
			
		<p> Now you can sign in on system. Consider change your password at first sign in.<br/>
			
		<p> For any need you can contact us through our online support system.</p>
		<p> Have a good day!</p>
		<p > <em>{{Config::get('app.site')}}</em></p>
	</body>

</html>

    
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
	
		<h2>{{Lang::get('emails.confirm')}} - {{Config::get('app.url')}} </h2>

		<h3>{{Lang::get('emails.confirm')}} {{$name}} </h3>
			<p>{{Lang::get('emails.welcometo')}} {{Config::get('app.url')}}
		<p> {{Lang::get('emails.succreg')}} {{Config::get('app.header')}}.</p>
		<p> {{Lang::get('emails.access')}}: 
		<p> {{Lang::get('users.username')}}: {{$email}}
		<p> {{Lang::get('users.password')}}: {{$password}}
			
		<p> {{Lang::get('emails.changepwd')}}<br/>
			
		<p> {{Lang::get('emails.support')}}</p>
		<p> {{Lang::get('emails.goodday')}}</p>
		<p > <em>{{Config::get('app.site')}}</em></p>
	</body>

</html>

    
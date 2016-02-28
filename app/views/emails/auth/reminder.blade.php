<!DOCTYPE html>
<html lang="en-US">
	<head>
		<meta charset="utf-8">
	</head>
	<body>
		<h2>You need recover your password?</h2>

		<div>
			Please click this link: {{ URL::to('password/reset', array($token)) }}.<br/>
			You can use this link for  {{ Config::get('auth.reminder.expire', 60) }} minute. If you dont want change your password, ingore this message. 
		</div>
	</body>
</html>

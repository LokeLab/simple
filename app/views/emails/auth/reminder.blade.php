<!DOCTYPE html>
<html lang="en-US">
	<head>
		<meta charset="utf-8">
	</head>
	<body>
		<h2>Hai chiesto di recuperare la password?</h2>

		<div>
			Per recuperare la password puoi utilizzare questo link: {{ URL::to('password/reset', array($token)) }}.<br/>
			Hai a disposizione  {{ Config::get('auth.reminder.expire', 60) }} minuti. Se non hai richiesto alcun cambio password, ignora questa segnalazione. 
		</div>
	</body>
</html>

<?php

class RemindersController extends Controller {

	/**
	 * Display the password reminder view.
	 *
	 * @return Response
	 */
	public function getRemind()
	{
		return View::make('password.remind');
	}

	/**
	 * Handle a POST request to remind a user of their password.
	 *
	 * @return Response
	 */
	public function postRemind()
	{
		switch ($response = User::setPasswordChangeRequest(Input::only('email')))
		{
			case Password::INVALID_USER:
				return Redirect::back()->withErrors(Lang::get($response));
			case Password::REMINDER_SENT:
				return Redirect::back()->with('message',Lang::get($response));
		}
	}

	/**
	 * Display the password reset view for the given token.
	 *
	 * @param  string  $token
	 * @return Response
	 */
	public function getReset($token = null)
	{
		if (is_null($token)) App::abort(404);

		return View::make('password.reset')->with('token', $token);
	}

	/**
	 * Handle a POST request to reset a user's password.
	 *
	 * @return Response
	 */
	public function postReset()
	{
		$credentials = Input::only(
			'email', 'password', 'password_confirmation', 'token'
		);

		switch ($response = User::resetPassword($credentials))
		{
			case Password::INVALID_PASSWORD:
				return Redirect::back()->withErrors(Lang::get($response));
			case Password::INVALID_TOKEN:
				return Redirect::back()->withErrors(Lang::get($response));
			case Password::INVALID_USER:
				return Redirect::back()->withErrors(Lang::get($response));
			case Password::PASSWORD_RESET:

				$user = User::where ( 'username', '=', $credentials['email'])->first();
				$maildata = array(
							'email'  =>  $credentials['email'],
							'name' => $user['name'],
							'surname' => $user['surname']
							);

				Mail::send('emails.auth.change_pwd_success', $maildata, function($message)
						{
						    $message->to(Input::get('email'), '')
						    ->subject(Lang::get('emails.subject_change_pwd'));
						});
				
				return Redirect::to('/login')->with('message', Lang::get($response));
		}

		
	}

}
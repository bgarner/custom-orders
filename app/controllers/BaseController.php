<?php

class BaseController extends Controller {

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	protected function setupLayout()
	{
		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
		}
	}

	protected function showLogin(){
		return View::make('login/index');
	}

	protected function doLogin(){

		$fail_redirect = "/";
		$success_redirect = "/orders";

		// validate the info, create rules for the inputs
		$rules = array(
			'email'    => 'required|email', // make sure the email is an actual email
			'password' => 'required|alphaNum|min:3' // password can only be alphanumeric and has to be greater than 3 characters
		);

		// run the validation rules on the inputs from the form
		$validator = Validator::make(Input::all(), $rules);

		// if the validator fails, redirect back to the form
		if ($validator->fails()) {
			return Redirect::to($fail_redirect)
				->withErrors($validator) // send back all errors to the login form
				->withInput(Input::except('password')); // send back the input (not the password) so that we can repopulate the form
		} else {
			// create our user data for the authentication
			$userdata = array(
				'email'     => Input::get('email'),
				'password'  => Input::get('password')
			);

			if (Auth::attempt($userdata)) {
				// validation successful!
				// redirect them to the secure section or whatever
				return Redirect::to($success_redirect);

			} else {
				// validation not successful, send back to form
				return Redirect::to($fail_redirect);
			}
		}
	}

	protected function doLogout(){
		Auth::logout();
		return Redirect::to('/');
	}


}

<?php

namespace App\Controllers;

use App\Libraries\Auth;

class Secure extends BaseController
{

	public function __construct()
	{
		$this->auth = new Auth();
		$this->auth0 = $this->auth->initialize();
	}

	public function index()
	{
		echo "this is a secure page";

		d($_SESSION);
	}

	public function login()
	{
		$this->auth0->login();
	}


	public function logout()
	{
		$this->auth0->logout();
	}

	public function callback()
	{
		echo "Callback";
		$userInfo = $this->auth0->getUser();

		if (!$userInfo) {
			// We have no user info
			// See below for how to add a login link
		} else {

			d($userInfo);

			// User is authenticated
			// See below for how to display user information
		}
	}

	//--------------------------------------------------------------------

}

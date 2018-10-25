<?php

class User extends Controller
{

	function __construct()
	{
		parent::__construct();
	}
	
	public function login()
	{
		$this->model->login();
	}
	
	public function logout()
	{
		session::destroy();
		header('Location:'.URL);
	}

}

?>
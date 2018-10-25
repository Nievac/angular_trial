<?php

class Home extends Controller
{

	function __construct()
	{
		parent::__construct();
	}
	
	public function index()
	{

		$this->view->render('views/home/index.php', true);
	}

	public function login() {
		$postdata = file_get_contents("php://input");
		$request = json_decode($postdata);
		print_r($request);
		print_r($_FILES);
	}

}

?>
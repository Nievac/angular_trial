<?php

class user_model extends Model
{

	function __construct()
	{
		parent::__construct();
	}
	
	function login()
	{
		$username = $_POST['username'];
		$password = $_POST['password'];
		
		
		$accounts = DAOFactory::getTblUserDAO()->queryByUsername($username);
		
		if(!empty($accounts))
		{
			
			foreach($accounts as $each)
			{
				if($each->password == $password)
				{
					$user = Controller::objToArray($each);
					Session::setSession('user',$user);
					header('Location: '.URL);
					exit;
				}
			}
		}
		else
		{
			header('Location: '.URL);
		}
	}
	


}

?>

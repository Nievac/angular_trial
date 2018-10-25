<?php

class Index extends Controller
{

	function __construct()
	{
		parent::__construct();
	}
	
	public function index()
	{
		$this->view->render('views/index/index.php');
	}

	public function getData() {
		echo json_encode(
			[
				[
					'fname' => 'Christian',
					'lname' => 'Nieva'
				],
				[
					'fname' => 'Rolei',
					'lname' => 'Garzota'
				],
				[
					'fname' => 'Marianne Angelica',
					'lname' => 'Bunyi'
				],
				[
					'fname' => 'Angel',
					'lname' => 'Locsin'
				],
				[
					'fname' => 'Christian',
					'lname' => 'Nieva'
				],
				[
					'fname' => 'Rolei',
					'lname' => 'Garzota'
				],
				[
					'fname' => 'Marianne Angelica',
					'lname' => 'Bunyi'
				],
				[
					'fname' => 'Angel',
					'lname' => 'Locsin'
				],
				[
					'fname' => 'Christian',
					'lname' => 'Nieva'
				],
				[
					'fname' => 'Rolei',
					'lname' => 'Garzota'
				],
				[
					'fname' => 'Marianne Angelica',
					'lname' => 'Bunyi'
				],
				[
					'fname' => 'Angel',
					'lname' => 'Locsin'
				],
				[
					'fname' => 'Christian',
					'lname' => 'Nieva'
				],
				[
					'fname' => 'Rolei',
					'lname' => 'Garzota'
				],
				[
					'fname' => 'Marianne Angelica',
					'lname' => 'Bunyi'
				],
				[
					'fname' => 'Angel',
					'lname' => 'Locsin'
				],
				[
					'fname' => 'Christian',
					'lname' => 'Nieva'
				],
				[
					'fname' => 'Rolei',
					'lname' => 'Garzota'
				],
				[
					'fname' => 'Marianne Angelica',
					'lname' => 'Bunyi'
				],
				[
					'fname' => 'Angel',
					'lname' => 'Locsin'
				],[
					'fname' => 'Angel',
					'lname' => 'Locsin'
				],
				[
					'fname' => 'Rolei',
					'lname' => 'Garzota'
				],
				[
					'fname' => 'Rolei',
					'lname' => 'Garzota'
				],
				[
					'fname' => 'Rolei',
					'lname' => 'Garzota'
				],
				[
					'fname' => 'Rolei',
					'lname' => 'Garzota'
				],
				[
					'fname' => 'Rolei',
					'lname' => 'Garzota'
				],
				[
					'fname' => 'Rolei',
					'lname' => 'Garzota'
				],
				[
					'fname' => 'Rolei',
					'lname' => 'Garzota'
				],
				[
					'fname' => 'Rolei',
					'lname' => 'Garzota'
				],
				[
					'fname' => 'Rolei',
					'lname' => 'Garzota'
				],
				[
					'fname' => 'Rolei',
					'lname' => 'Garzota'
				],
				[
					'fname' => 'Rolei',
					'lname' => 'Garzota'
				],
				[
					'fname' => 'Rolei',
					'lname' => 'Garzota'
				],
				[
					'fname' => 'Rolei',
					'lname' => 'Garzota'
				],
				[
					'fname' => 'Rolei',
					'lname' => 'Garzota'
				],
				[
					'fname' => 'Rolei',
					'lname' => 'Garzota'
				],
				[
					'fname' => 'Rolei',
					'lname' => 'Garzota'
				],
				[
					'fname' => 'Rolei',
					'lname' => 'Garzota'
				],
				[
					'fname' => 'Rolei',
					'lname' => 'Garzota'
				],
				[
					'fname' => 'Rolei',
					'lname' => 'Garzota'
				],
				[
					'fname' => 'Rolei',
					'lname' => 'Garzota'
				],
				[
					'fname' => 'Rolei',
					'lname' => 'Garzota'
				],
				[
					'fname' => 'Rolei',
					'lname' => 'Garzota'
				]
			]
		);
	}

}
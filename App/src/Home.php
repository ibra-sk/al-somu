<?php
class Home
{

	public function __construct()
	{
		session_start();
		//$this->db = new MysqliDb(DB_HOST, DB_USER, DB_PASS, DB_NAME);
	}

	protected function render($view_file, $view_data)
	{
		$this->view_file = $view_file;
		$this->view_data = $view_data;
		if (file_exists(APP . 'view/' . $view_file . '.phtml')) {
			include APP . 'view/' . $view_file . '.phtml';
		}
	}


	public function index()
	{
		$this->render('shared/header', []);
		$this->render('shared/navbar', []);
		$this->render('about',  []);
		$this->render('shared/footer', []);
	}

	public function aboutPage()
	{
		$this->render('shared/header', []);
		$this->render('shared/navbar', []);
		$this->render('about',  []);
		$this->render('shared/footer', []);
	}

	public function contactPage()
	{
		$this->render('shared/header', []);
		$this->render('shared/navbar', []);
		$this->render('contact',  []);
		$this->render('shared/footer', []);
	}
}

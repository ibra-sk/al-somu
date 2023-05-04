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
		$this->render('shared/navbar', ['is_faded' => true]);
		$this->render('home',  []);
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

	public function servicesPage()
	{
		$this->render('shared/header', []);
		$this->render('shared/navbar', []);
		$this->render('services',  []);
		$this->render('shared/footer', []);
	}

	public function postContactForm()
	{
		///var_dump($_POST);
		if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['message'])) {
			$name = $_POST['name'];
			$email = $_POST['email'];
			$message = $_POST['message'];
			$result = $this->sendMail($name, $email, '', $message);
			echo json_encode($result);
		}
	}

	public function postNewsletterForm()
	{
		//var_dump($_POST);
		if (isset($_POST['email'])) {

			$email = $_POST['email'];
			$result = $this->sendMail('Webapp Newsletter Form', $email, 'New Newsletter Subscriber', '');
			echo json_encode($result);
		}
	}

	protected function sendMail($name, $email, $subject, $message)
	{
		$ourMail = ""; //Insert your email address here
		$pre_messagebody_info = "";
		$errors = array();

		$result = array(
			"is_errors" => 0,
			"info" => ""
		);

		if (!empty($errors)) {
			$result['is_errors'] = 1;
			$result['info'] = $errors;
			return $result;
		}

		$headers = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
		$headers .= "From: " . $email . "\r\n";
		$pre_messagebody_info .= "<strong>Name</strong>" . ": " . $name . "<br />";
		if (!empty($email)) {
			$pre_messagebody_info .= "<strong>E-mail</strong>" . ": " . $email . "<br />";
		}
		if (empty($subject)) {
			$subject = "Website Contact Form";
		}
		$after_message = "\r\n<br />--------------------------------------------------------------------------------------------------\r\n<br /> This mail was sent via contact form";

		//if (mail($ourMail, $subject, $pre_messagebody_info .= "<strong>Message</strong>" . ": " . $message . $after_message, $headers)) {
		if (true) {
			$result['is_errors'] = 0;
			$result["info"] = "success";
		} else {
			$result['is_errors'] = 1;
			$result["info"] = "server_fail";
		}
		return $result;
	}
}

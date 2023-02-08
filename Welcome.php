<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('pages/index');
		
	}

	public function signin(){
		$this->load->view('pages/signin');
	}

	public function verifLogin(){
		$email = $this->input->post('email');
		$mdp = $this->input->post('pswd');
		$this->load->model('news_model');
		$user = array();
		$user = $this->news_model->verifLogin($email,$mdp);

		if ($user['id'] != null) {
			$_SESSION['user'] = $user;
		}else{
			$this->index();
		}
	}

	public function insertUser(){
		$email = $this->input->post('email');
		$mdp = $this->input->post('pswd');
		$username = $this->input->post('username');
		$this->load->model('news_model');
		$this->news_model->insertUser($username,$email,$mdp);
		$this->index();
	}
}

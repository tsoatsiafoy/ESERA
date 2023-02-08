<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{

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
	public function index()	{
		$this->load->view('login');
	}
	public function signin(){
		$this->load->view('pages/signin');
	}

	public function verifyLogin(){
		$mail = $this->input->post('email');
		$pswd = $this->input->post('pass');
		$this->load->model('user_model');
		$tab = $this->user_model->verifyLogin($mail,$pswd);
		if ($tab == null) {
			// $this->site_url('welcome/index');
			$message['erreur'] = 'Verifier votre Mail ou votre mot de passe';
			$this->load->view('login',$message);
		}else{
			$this->session->set_userdata('user',$tab);
			if ($tab['isAdmin'] == 1){
				redirect('home/getAllCategories');
			}else{
				redirect('example/show');
			}
		}
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

	public function deconexion(){
		$this->session->unset_userdata('user');
		$this->index();
	} 

}

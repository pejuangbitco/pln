<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MY_Controller
{

	private $data = [];

	public function __construct()
	{
		parent::__construct();
		$this->data['username'] = $this->session->userdata('username');
		if (isset($this->data['username']))
		{
			$this->data['role'] = $this->session->userdata('role');
			switch ($this->data['role'])
			{
				case 1:
					redirect('admin');
					exit;
				case 2:
					redirect('pegawai');
					exit;
			}
		}
	}

	public function index()
	{
		if ($this->POST('login'))
		{
			$this->load->model('user_m');
			// if (!$this->user_m->required_input(['username','password'])) 
			// {
			// 	$this->flashmsg('Data harus lengkap','warning');
			// 	redirect('login');
			// 	exit;
			// }
			
			$this->data = [
				'username'	=> $this->POST('username'),
				'password'	=> md5($this->POST('password'))
				// 'password'	=> $this->POST('password')
			];

			$result = $this->user_m->login($this->data['username'], $this->data['password']);
			if (!isset($result)) 
			{
				$this->flashmsg('username atau password salah','danger');
			}

			redirect('login');
			exit;
		}
		
		$this->data['title'] = 'LOGIN' . $this->title;
		$this->load->view('login', $this->data);
	}
}

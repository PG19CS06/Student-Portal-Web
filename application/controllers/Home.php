<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{


	public function index()
	{
		$this->load->view('home');
	}

	public function login_check()
	{

		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$data = $this->Home_model->login($username, $password);


		//$this->session->set_userdata('username',$username);


		if (count($data) > 0) {$row = $data[0];
			switch ($row['role_id']) {

				case 1:
					// $this->session->set_userdata('admin_username', $row['username']);
					// $this->session->set_userdata('admin_user_id', $row['user_id']);
					// $this->load->view('admin/admin.php');
					$this->dashboard();
					break;
				case 2:
					// $this->session->set_userdata('teacher_username', $row['username']);
					// $this->session->set_userdata('teacher_user_id', $row['user_id']);
					$this->dashboard();
					break;
				case 3:
					// $this->session->set_userdata('student_username', $row['username']);
					// $this->session->set_userdata('student_user_id', $row['user_id']);
					$this->dashboard();
					break;
			}

		} else {
			// $this->load->view('error');
			$this->index();
			// redirect(base_url(), 'refresh');
		}
	}

	public function dashboard()
	{
		$this->load->view('dashboard.php');
	}
}

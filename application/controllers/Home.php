<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{


	public function index()
	{
		$this->load->view('home');
/* 		if ($this->sesssion->has_userdata('username') && $this->sesssion->has_userdata('user_id')) {
			$user_id = $this->sesssion->userdata('user_id');
			switch ($user_id) {

				case 1:
					// $this->load->view('admin/admin.php');
					$this->load->view('dashboard.php');
					break;
				case 2:
					$this->load->view('dashboard.php');
					break;
				case 3:
					$this->load->view('dashboard.php');
					break;
			}
		} else
			$this->load->view('home');
 */	}
	public function login_check()
	{

		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$data = $this->Home_model->login($username, $password);


		//$this->session->set_userdata('username',$username);

		if (count($data) > 0) {


			foreach ($data as $row) {
				// $this->session->set_userdata('username', $row['username']);
				// $this->session->set_userdata('user_id', $row['user_id']);
				switch ($row['role_id']) {

					case 1:
						// $this->session->set_userdata('admin_username', $row['username']);
						// $this->session->set_userdata('admin_user_id', $row['user_id']);
						// $this->load->view('admin/admin.php');
						$this->load->view('dashboard.php');
						break;
					case 2:
						// $this->session->set_userdata('teacher_username', $row['username']);
						// $this->session->set_userdata('teacher_user_id', $row['user_id']);
						$this->load->view('dashboard.php');
						break;
					case 3:
						// $this->session->set_userdata('student_username', $row['username']);
						// $this->session->set_userdata('student_user_id', $row['user_id']);
						$this->load->view('dashboard.php');
						break;
				}
			}
		} else {
			// $this->load->view('error');
			$this->load->view('home');
			// redirect(base_url(), 'refresh');
		}
	}
}

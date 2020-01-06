<?php
class Login extends CI_Controller{
	function __construct(){
		parent::__construct();/*
		$this->load->model('login_model');*/
	}

	function index(){
		$data['contents'] = 'admin/content/login';
		$this->load->view('admin/login_admin',$data);
	}

	function auth(){
        $username=htmlspecialchars($this->input->post('username',TRUE),ENT_QUOTES);
        $password=htmlspecialchars($this->input->post('password',TRUE),ENT_QUOTES);

        /*$cek_pelabuhan=$this->login_model->auth_($username,$password);*/
/*
        if($cek_pelabuhan->num_rows() > 0){ //jika login sebagai dosen*/
/*						$data=$cek_pelabuhan->row_array();*/
        if($username != null && $password != null){ //jika login sebagai dosen
        		$this->session->set_userdata('masuk',TRUE);

		         if($username =='admin' && $password == 'admin'){ //Akses pelabuhan
		            $this->session->set_userdata('akses','ADMIN');
					$this->session->set_userdata('ses_id','1');
		            $this->session->set_userdata('ses_nama','admin');
		            redirect('admin_controller');

		         }
		         else if($username !='daus@daus.com' && $password != 'daus'){ //Akses pelabuhan
		            	redirect('login');


		         }
        }else{ 
			
							$url=base_url();
							echo $this->session->set_flashdata('msg','Username Atau Password Salah !!!');
							redirect($url);
					
        }
    }
    function logout(){
        $this->session->sess_destroy();
        $url=base_url('index.php/Login');
        redirect($url);
    }
}

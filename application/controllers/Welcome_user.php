<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome_user extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('user');
	}
	public function index()
	{
		$data['contents'] = 'templete_user/content/content_header';
		$this->load->view('templete_user/index',$data);
		}
		function upload(){		
			date_default_timezone_set("Asia/Jakarta");
			$data['tanggal'] = date("Y-m-d");
			$data['nama'] = $_POST['nama'];
			$data['isisaran'] = $_POST['saran'];
			$this->load->model('user');
			$this->user->save($data);
			$data['message'] = "uploaded";
			$data['contents'] = 'templete_user/content/content_header';
		  	$this->load->view('templete_user/index',$data);
	}
	
	public function profile()
	{
		$data['contents'] = 'templete_user/content/profile';
		$this->load->view('templete_user/index',$data);
	}

	public function detailsaran()
	{
		$data['contents'] = 'templete_user/content/detailsaran';
		$this->load->view('templete_user/index',$data);
	}

	public function pimpinandprd()
	{
		$data['contents'] = 'templete_user/content/pimpinandprd';
		$this->load->view('templete_user/index',$data);
	}

	public function detpimpinandprd()
	{
		$data['contents'] = 'templete_user/content/detpimpinandprd';
		$this->load->view('templete_user/index',$data);
	}

	public function listsaran()
	{
		$data['contents'] = 'templete_user/content/listsarantemp';
		$this->load->view('templete_user/index',$data);
		$x['data']=$this->user->get_all_saran();
		$this->load->view('templete_user/content/listsaran',$x,$data);
	}


		function view_listsaran(){
		$data['contents'] = 'templete_user/content/beritainfotemp';
		$this->load->view('templete_user/index',$data);
		$kode=$this->uri->segment(3);
		$kode1=$this->uri->segment(3);
		$data['a']=$this->uri->segment(3);
		$data['data1']=$this->user->get_berita_by_kode_listsaran($kode);
		$data['data2']=$this->user->get_komentar_listsaran($kode1);
		$this->load->view('templete_user/content/listsarandet',$data);
	}	
	function upload_listsaran(){		
			date_default_timezone_set("Asia/Jakarta");
			$data['tanggal'] = date("Y-m-d");
			$data['kd_komentar'] = $_POST['kd_komentar'].'tbl_saran';
			$data['nama'] = $_POST['nama'];
			$data['isikomentar'] = $_POST['isi'];
			$this->load->model('user');
			$this->user->save_komentar($data);
				$data['message'] = "uploaded";
			$data['contents'] = 'templete_user/content/listsarantemp';
			$this->load->view('templete_user/index',$data);

			$a = $_POST['a'];
			$url=base_url().'index.php/welcome_user/view_listsaran/'.$a;
			redirect($url);



	}



























	public function listanggota()
	{
		$data['contents'] = 'templete_user/content/profileanggotadprdtemp';
		$this->load->view('templete_user/index',$data);
		$x['data']=$this->user->get_all_anggota();
		$this->load->view('templete_user/content/profileanggotadprd',$x,$data);
	}
		function view_anggota(){
		$data['contents'] = 'templete_user/content/profileanggotadprdtemp';
		$this->load->view('templete_user/index',$data);
		$kode=$this->uri->segment(3);
		$kode1=$this->uri->segment(3);
		$data['data1']=$this->user->get_berita_by_kode_anggota($kode);
		$this->load->view('templete_user/content/profileanggotadprddet',$data);
	}
	public function detailinfo()
	{
		$data['contents'] = 'templete_user/content/detailinfo';
		$this->load->view('templete_user/index',$data);
	}

	public function progja()
	{
		$data['contents'] = 'templete_user/content/progjatemp';		
		$this->load->view('templete_user/index',$data);
		$x['data']=$this->user->get_all_berita3();
		$this->load->view('templete_user/content/progja',$x,$data);

	}
		function view3(){
		$data['contents'] = 'templete_user/content/progjatemp';
		$this->load->view('templete_user/index',$data);
		$kode=$this->uri->segment(3);
		$kode1=$this->uri->segment(3);
		$data['data1']=$this->user->get_berita_by_kode3($kode);
		$data['data2']=$this->user->get_komentar_tbl_p($kode1);
		$this->load->view('templete_user/content/progjadet',$data);
	}	
	function upload_p(){		
			date_default_timezone_set("Asia/Jakarta");
			$data['tanggal'] = date("Y-m-d");
			$data['kd_komentar'] = $_POST['kd_komentar'].'tbl_p';
			$data['nama'] = $_POST['nama'];
			$data['isikomentar'] = $_POST['isi'];
			$this->load->model('user');
			$this->user->save_komentar($data);
				$data['message'] = "uploaded";
			$data['contents'] = 'templete_user/content/progjatemp';
			$this->load->view('templete_user/index',$data);
			$x['data']=$this->user->get_all_berita3();
			$this->load->view('templete_user/content/progja',$x,$data);
	}

	public function beritainfo()
	{
		$data['contents'] = 'templete_user/content/beritainfotemp';
		$this->load->view('templete_user/index',$data);
		$x['data']=$this->user->get_all_berita2();
		$this->load->view('templete_user/content/beritainfo',$x,$data);
	}
		function view2(){
		$data['contents'] = 'templete_user/content/beritainfotemp';
		$this->load->view('templete_user/index',$data);
		$kode=$this->uri->segment(3);
		$kode1=$this->uri->segment(3);
		$data['a']=$this->uri->segment(3);
		$data['data1']=$this->user->get_berita_by_kode2($kode);
		$data['data2']=$this->user->get_komentar_tbl_b($kode1);
		$this->load->view('templete_user/content/beritainfodet',$data);
	}	
	function upload_b(){		
			date_default_timezone_set("Asia/Jakarta");
			$data['tanggal'] = date("Y-m-d");
			$data['kd_komentar'] = $_POST['kd_komentar'].'tbl_b';
			$data['nama'] = $_POST['nama'];
			$data['isikomentar'] = $_POST['isi'];
			$this->load->model('user');
			$this->user->save_komentar($data);
				$data['message'] = "uploaded";
			$data['contents'] = 'templete_user/content/beritainfotemp';
			$this->load->view('templete_user/index',$data);

			$a = $_POST['a'];
			$url=base_url().'index.php/welcome_user/view2/'.$a;
			redirect($url);



	}

	public function alatkelengkapan()
	{
		$data['contents'] = 'templete_user/content/alatkelengkapantemp';
		$this->load->view('templete_user/index',$data);
		$x['data']=$this->user->get_all_berita1();
		$this->load->view('templete_user/content/alatkelengkapan',$x,$data);

	}
		function view1(){
		$data['contents'] = 'templete_user/content/alatkelengkapantemp';
		$this->load->view('templete_user/index',$data);
		$kode=$this->uri->segment(3);
		$kode1=$this->uri->segment(3);
		$data['data1']=$this->user->get_berita_by_kode1($kode);
		$data['data2']=$this->user->get_komentar_tbl_k($kode1);
		$this->load->view('templete_user/content/alatkelengkapandet',$data);
	}	
	function upload_alatk(){		
			date_default_timezone_set("Asia/Jakarta");
			$data['tanggal'] = date("Y-m-d");
			$data['kd_komentar'] = $_POST['kd_komentar'].'tbl_k';
			$data['nama'] = $_POST['nama'];
			$data['isikomentar'] = $_POST['isi'];
			$this->load->model('user');
			$this->user->save_komentar($data);
				$data['message'] = "uploaded";
			$data['contents'] = 'templete_user/content/alatkelengkapantemp';
			$this->load->view('templete_user/index',$data);
			$x['data']=$this->user->get_all_berita1();
			$this->load->view('templete_user/content/alatkelengkapan',$x,$data);
	}	

	public function beranda()
	{
		$data['contents'] = 'templete_user/content/beritainfo';
		$this->load->view('templete_user/index',$data);
	}

	public function agenda()
	{
		$data['contents'] = 'templete_user/content/agendatemp';
		$this->load->view('templete_user/index',$data);
		$x['data']=$this->user->get_all_berita();
		$this->load->view('templete_user/content/agenda',$x,$data);

	}
		function view(){
		$data['contents'] = 'templete_user/content/agendatemp';
		$this->load->view('templete_user/index',$data);
		$kode=$this->uri->segment(3);
		$kode1=$this->uri->segment(3);
		$data['data1']=$this->user->get_berita_by_kode($kode);
		$data['data2']=$this->user->get_komentar_tbl_a($kode1);
		$this->load->view('templete_user/content/agendadet',$data);
	}		
	function upload_agenda(){		
			date_default_timezone_set("Asia/Jakarta");
			$data['tanggal'] = date("Y-m-d");
			$data['kd_komentar'] = $_POST['kd_komentar'].'tbl_a';
			$data['nama'] = $_POST['nama'];
			$data['isikomentar'] = $_POST['isi'];
			$this->load->model('user');
			$this->user->save_komentar($data);
			$data['message'] = "uploaded";
		$data['contents'] = 'templete_user/content/agendatemp';
		$this->load->view('templete_user/index',$data);
		$x['data']=$this->user->get_all_berita();
		$this->load->view('templete_user/content/agenda',$x,$data);
	}
	

}

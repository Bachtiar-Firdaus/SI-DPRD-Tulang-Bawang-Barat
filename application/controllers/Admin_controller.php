<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_controller extends CI_Controller {


	public function __construct()
	{
		parent::__construct();
		
		if($this->session->userdata('akses') != "ADMIN"){
			$url=base_url();
			redirect($url);
		}

		$this->load->model('m_saran');
		$this->load->model('m_komentar');
		$this->load->model('m_alatk');
		$this->load->model('upload_images');
		$this->load->helper('url');
		$this->load->model('m_a');
		$this->load->model('m_b');
		$this->load->model('m_p');
		$this->load->model('m_c');
	}

	public function index()
	{
		$data['contents'] = 'admin/content/dashboard';
		$this->load->view('admin/index',$data);
	}
	public function profil_anggota()
	{
		$data['contents'] = 'admin/content/profil_anggota';
		$this->load->view('admin/index',$data);
	}
	public function ajax_list7()
	{
		$this->load->helper('url');

		$list = $this->m_c->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $m_c) {
			$row = array();
			$row[] = $no++;
			$row[] = $m_c->judul;
			if($m_c->photo)
			$row[] = '<a href="'.base_url('upload/'.$m_c->photo).'" target="_blank"><img src="'.base_url('upload/'.$m_c->photo).'" class="img-responsive" /></a>';
			else
				$row[] = '(No photo)';
			$row[] = $m_c->isi;

			//add html for action
			$row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_m_c('."'".$m_c->no."'".')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
				  <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_m_c('."'".$m_c->no."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
		
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->m_c->count_all(),
						"recordsFiltered" => $this->m_c->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}

	public function ajax_edit7($id)
	{
		$data = $this->m_c->get_by_id($id);
		echo json_encode($data);
	}

	public function ajax_update7()
	{
		$this->_validate7();
		$data = array(
				'judul' => $this->input->post('judul'),
				'isi' => $this->input->post('isi'),
			);

		if($this->input->post('remove_photo')) // if remove photo checked
		{
			if(file_exists('upload/'.$this->input->post('remove_photo')) && $this->input->post('remove_photo'))
				unlink('upload/'.$this->input->post('remove_photo'));
			$data['photo'] = '';
		}

		if(!empty($_FILES['photo']['name']))
		{
			$upload = $this->_do_upload7();
			
			//delete file
			$m_c = $this->m_c->get_by_id($this->input->post('no'));
			if(file_exists('upload/'.$m_c->photo) && $m_c->photo)
				unlink('upload/'.$m_c->photo);

			$data['photo'] = $upload;
		}

		$this->m_c->update(array('no' => $this->input->post('no')), $data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_delete7($id)
	{
		//delete file
		$m_c = $this->m_c->get_by_id($id);
		if(file_exists('upload/'.$m_c->photo) && $m_c->photo)
			unlink('upload/'.$m_c->photo);
		
		$this->m_c->delete_by_id($id);
		echo json_encode(array("status" => TRUE));
	}

	private function _do_upload7()
	{
		$config['upload_path']          = 'upload/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 10000000; //set max size allowed in Kilobyte
        $config['max_width']            = 1000000; // set max width image allowed
        $config['max_height']           = 1000000; // set max height allowed
        $config['file_name']            = round(microtime(true) * 1000); //just milisecond timestamp fot unique name

        $this->load->library('upload', $config);

        if(!$this->upload->do_upload('photo')) //upload and validate
        {
            $data['inputerror'][] = 'photo';
			$data['error_string'][] = 'Upload error: '.$this->upload->display_errors('',''); //show ajax error
			$data['status'] = FALSE;
			echo json_encode($data);
			exit();
		}
		return $this->upload->data('file_name');
	}

	private function _validate7()
	{
		$data = array();
		$data['error_string'] = array();
		$data['inputerror'] = array();
		$data['status'] = TRUE;

		if($this->input->post('tanggal') == '')
		{
			$data['inputerror'][] = 'tanggal';
			$data['error_string'][] = 'tanggal is required';
			$data['status'] = FALSE;
		}


		if($this->input->post('judul') == '')
		{
			$data['inputerror'][] = 'judul';
			$data['error_string'][] = 'judul is required';
			$data['status'] = FALSE;
		}

		if($this->input->post('isi') == '')
		{
			$data['inputerror'][] = 'isi';
			$data['error_string'][] = 'isi is required';
			$data['status'] = FALSE;
		}

		if($data['status'] === FALSE)
		{
			echo json_encode($data);
			exit();
		}
	}
//////////////// 
public function tambah_pimpinan()
	{
		$data['contents'] = 'admin/content/tambah_pimpinan';
		$this->load->view('admin/index',$data);
	}

	public function tambah_profil()
	{
		$data['contents'] = 'admin/content/tambah_profil';
		$this->load->view('admin/index',$data);
	}
	function upload_tambah_profil(){

		$filename = md5(uniqid(rand(), true));
		$config = array(
			'upload_path' => 'upload',
			'allowed_types' => "gif|jpg|png|jpeg",
			'file_name' => $filename
		);
				
		$this->load->library('upload', $config);
		if($this->upload->do_upload())
			{
			$file_data = $this->upload->data();
			
			$data['photo'] = $file_data['file_name'];
			$data['judul'] = $_POST['judul'];
			$data['isi'] = $_POST['isi'];

			$this->load->model('upload_images');
			$this->upload_images->save_image4($data);
			
			$data['message'] = "uploaded";
		
		$data['contents'] = 'admin/content/tambah_profil';
		$this->load->view('admin/index',$data);
			}
			else
			{
			$data = array();	
			$this->load->model('upload_images');			
			$data['uploaded_images'] = $this->upload_images->get_images();
			
			$error = $this->upload->display_errors();
			$data['errors'] = $error;
		$data['contents'] = 'admin/content/tambah_profil';
		$this->load->view('admin/index',$data);
			}
	}
//////////////// alat kelengkapan ajax list6	
	public function berita()
	{
		$data['contents'] = 'admin/content/berita';
		$this->load->view('admin/index',$data);
	}
	public function ajax_list6()
	{
		$this->load->helper('url');

		$list = $this->m_b->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $m_b) {
			$row = array();
			$row[] = $no++;
			$row[] = $m_b->tanggal;
			if($m_b->photo)
			$row[] = '<a href="'.base_url('upload/'.$m_b->photo).'" target="_blank"><img src="'.base_url('upload/'.$m_b->photo).'" class="img-responsive" /></a>';
			else
				$row[] = '(No photo)';
			$row[] = $m_b->judul;
			$row[] = $m_b->isi;

			//add html for action
			$row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_m_b('."'".$m_b->no."'".')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
				  <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_m_b('."'".$m_b->no."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
		
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->m_b->count_all(),
						"recordsFiltered" => $this->m_b->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}

	public function ajax_edit6($id)
	{
		$data = $this->m_b->get_by_id($id);
		echo json_encode($data);
	}

	public function ajax_update6()
	{
		$this->_validate6();
		$data = array(
				'tanggal' => $this->input->post('tanggal'),
				'judul' => $this->input->post('judul'),
				'isi' => $this->input->post('isi'),
			);

		if($this->input->post('remove_photo')) // if remove photo checked
		{
			if(file_exists('upload/'.$this->input->post('remove_photo')) && $this->input->post('remove_photo'))
				unlink('upload/'.$this->input->post('remove_photo'));
			$data['photo'] = '';
		}

		if(!empty($_FILES['photo']['name']))
		{
			$upload = $this->_do_upload6();
			
			//delete file
			$m_b = $this->m_b->get_by_id($this->input->post('no'));
			if(file_exists('upload/'.$m_b->photo) && $m_b->photo)
				unlink('upload/'.$m_b->photo);

			$data['photo'] = $upload;
		}

		$this->m_b->update(array('no' => $this->input->post('no')), $data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_delete6($id)
	{
		//delete file
		$m_b = $this->m_b->get_by_id($id);
		if(file_exists('upload/'.$m_b->photo) && $m_b->photo)
			unlink('upload/'.$m_b->photo);
		
		$this->m_b->delete_by_id($id);
		echo json_encode(array("status" => TRUE));
	}

	private function _do_upload6()
	{
		$config['upload_path']          = 'upload/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 10000000; //set max size allowed in Kilobyte
        $config['max_width']            = 1000000; // set max width image allowed
        $config['max_height']           = 1000000; // set max height allowed
        $config['file_name']            = round(microtime(true) * 1000); //just milisecond timestamp fot unique name

        $this->load->library('upload', $config);

        if(!$this->upload->do_upload('photo')) //upload and validate
        {
            $data['inputerror'][] = 'photo';
			$data['error_string'][] = 'Upload error: '.$this->upload->display_errors('',''); //show ajax error
			$data['status'] = FALSE;
			echo json_encode($data);
			exit();
		}
		return $this->upload->data('file_name');
	}

	private function _validate6()
	{
		$data = array();
		$data['error_string'] = array();
		$data['inputerror'] = array();
		$data['status'] = TRUE;

		if($this->input->post('tanggal') == '')
		{
			$data['inputerror'][] = 'tanggal';
			$data['error_string'][] = 'tanggal is required';
			$data['status'] = FALSE;
		}


		if($this->input->post('judul') == '')
		{
			$data['inputerror'][] = 'judul';
			$data['error_string'][] = 'judul is required';
			$data['status'] = FALSE;
		}

		if($this->input->post('isi') == '')
		{
			$data['inputerror'][] = 'isi';
			$data['error_string'][] = 'isi is required';
			$data['status'] = FALSE;
		}

		if($data['status'] === FALSE)
		{
			echo json_encode($data);
			exit();
		}
	}
//////////////// 
//////////////// alat kelengkapan ajax list5
	public function progja()
	{
		$data['contents'] = 'admin/content/progja';
		$this->load->view('admin/index',$data);
	}	
	public function ajax_list5()
	{
		$this->load->helper('url');

		$list = $this->m_p->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $m_p) {
			$row = array();
			$row[] = $no++;
			$row[] = $m_p->tanggal;
			if($m_p->photo)
			$row[] = '<a href="'.base_url('upload/'.$m_p->photo).'" target="_blank"><img src="'.base_url('upload/'.$m_p->photo).'" class="img-responsive" /></a>';
			else
				$row[] = '(No photo)';
			$row[] = $m_p->judul;
			$row[] = $m_p->isi;

			//add html for action
			$row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_m_p('."'".$m_p->no."'".')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
				  <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_m_p('."'".$m_p->no."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
		
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->m_p->count_all(),
						"recordsFiltered" => $this->m_p->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}

	public function ajax_edit5($id)
	{
		$data = $this->m_p->get_by_id($id);
		echo json_encode($data);
	}

	public function ajax_update5()
	{
		$this->_validate5();
		$data = array(
				'tanggal' => $this->input->post('tanggal'),
				'judul' => $this->input->post('judul'),
				'isi' => $this->input->post('isi'),
			);

		if($this->input->post('remove_photo')) // if remove photo checked
		{
			if(file_exists('upload/'.$this->input->post('remove_photo')) && $this->input->post('remove_photo'))
				unlink('upload/'.$this->input->post('remove_photo'));
			$data['photo'] = '';
		}

		if(!empty($_FILES['photo']['name']))
		{
			$upload = $this->_do_upload5();
			
			//delete file
			$m_p = $this->m_p->get_by_id($this->input->post('no'));
			if(file_exists('upload/'.$m_p->photo) && $m_p->photo)
				unlink('upload/'.$m_p->photo);

			$data['photo'] = $upload;
		}

		$this->m_p->update(array('no' => $this->input->post('no')), $data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_delete5($id)
	{
		//delete file
		$m_p = $this->m_p->get_by_id($id);
		if(file_exists('upload/'.$m_p->photo) && $m_p->photo)
			unlink('upload/'.$m_p->photo);
		
		$this->m_p->delete_by_id($id);
		echo json_encode(array("status" => TRUE));
	}

	private function _do_upload5()
	{
		$config['upload_path']          = 'upload/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 10000000; //set max size allowed in Kilobyte
        $config['max_width']            = 1000000; // set max width image allowed
        $config['max_height']           = 1000000; // set max height allowed
        $config['file_name']            = round(microtime(true) * 1000); //just milisecond timestamp fot unique name

        $this->load->library('upload', $config);

        if(!$this->upload->do_upload('photo')) //upload and validate
        {
            $data['inputerror'][] = 'photo';
			$data['error_string'][] = 'Upload error: '.$this->upload->display_errors('',''); //show ajax error
			$data['status'] = FALSE;
			echo json_encode($data);
			exit();
		}
		return $this->upload->data('file_name');
	}

	private function _validate5()
	{
		$data = array();
		$data['error_string'] = array();
		$data['inputerror'] = array();
		$data['status'] = TRUE;

		if($this->input->post('tanggal') == '')
		{
			$data['inputerror'][] = 'tanggal';
			$data['error_string'][] = 'tanggal is required';
			$data['status'] = FALSE;
		}


		if($this->input->post('judul') == '')
		{
			$data['inputerror'][] = 'judul';
			$data['error_string'][] = 'judul is required';
			$data['status'] = FALSE;
		}

		if($this->input->post('isi') == '')
		{
			$data['inputerror'][] = 'isi';
			$data['error_string'][] = 'isi is required';
			$data['status'] = FALSE;
		}

		if($data['status'] === FALSE)
		{
			echo json_encode($data);
			exit();
		}
	}
//////////////// 

//////////////// alat kelengkapan ajax list4
	public function agenda()
	{
		$data['contents'] = 'admin/content/agenda';
		$this->load->view('admin/index',$data);
	}
	public function ajax_list4()
	{
		$this->load->helper('url');

		$list = $this->m_a->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $m_a) {
			$row = array();
			$row[] = $no++;
			$row[] = $m_a->tanggal;
			if($m_a->photo)
			$row[] = '<a href="'.base_url('upload/'.$m_a->photo).'" target="_blank"><img src="'.base_url('upload/'.$m_a->photo).'" class="img-responsive" /></a>';
			else
				$row[] = '(No photo)';
			$row[] = $m_a->judul;
			$row[] = $m_a->isi;

			//add html for action
			$row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_m_a('."'".$m_a->no."'".')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
				  <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_m_a('."'".$m_a->no."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
		
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->m_a->count_all(),
						"recordsFiltered" => $this->m_a->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}

	public function ajax_edit4($id)
	{
		$data = $this->m_a->get_by_id($id);
		echo json_encode($data);
	}

	public function ajax_update4()
	{
		$this->_validate4();
		$data = array(
				'tanggal' => $this->input->post('tanggal'),
				'judul' => $this->input->post('judul'),
				'isi' => $this->input->post('isi'),
			);

		if($this->input->post('remove_photo')) // if remove photo checked
		{
			if(file_exists('upload/'.$this->input->post('remove_photo')) && $this->input->post('remove_photo'))
				unlink('upload/'.$this->input->post('remove_photo'));
			$data['photo'] = '';
		}

		if(!empty($_FILES['photo']['name']))
		{
			$upload = $this->_do_upload4();
			
			//delete file
			$m_a = $this->m_a->get_by_id($this->input->post('no'));
			if(file_exists('upload/'.$m_a->photo) && $m_a->photo)
				unlink('upload/'.$m_a->photo);

			$data['photo'] = $upload;
		}

		$this->m_a->update(array('no' => $this->input->post('no')), $data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_delete4($id)
	{
		//delete file
		$m_a = $this->m_a->get_by_id($id);
		if(file_exists('upload/'.$m_a->photo) && $m_a->photo)
			unlink('upload/'.$m_a->photo);
		
		$this->m_a->delete_by_id($id);
		echo json_encode(array("status" => TRUE));
	}

	private function _do_upload4()
	{
		$config['upload_path']          = 'upload/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 10000000; //set max size allowed in Kilobyte
        $config['max_width']            = 1000000; // set max width image allowed
        $config['max_height']           = 1000000; // set max height allowed
        $config['file_name']            = round(microtime(true) * 1000); //just milisecond timestamp fot unique name

        $this->load->library('upload', $config);

        if(!$this->upload->do_upload('photo')) //upload and validate
        {
            $data['inputerror'][] = 'photo';
			$data['error_string'][] = 'Upload error: '.$this->upload->display_errors('',''); //show ajax error
			$data['status'] = FALSE;
			echo json_encode($data);
			exit();
		}
		return $this->upload->data('file_name');
	}

	private function _validate4()
	{
		$data = array();
		$data['error_string'] = array();
		$data['inputerror'] = array();
		$data['status'] = TRUE;

		if($this->input->post('tanggal') == '')
		{
			$data['inputerror'][] = 'tanggal';
			$data['error_string'][] = 'tanggal is required';
			$data['status'] = FALSE;
		}


		if($this->input->post('judul') == '')
		{
			$data['inputerror'][] = 'judul';
			$data['error_string'][] = 'judul is required';
			$data['status'] = FALSE;
		}

		if($this->input->post('isi') == '')
		{
			$data['inputerror'][] = 'isi';
			$data['error_string'][] = 'isi is required';
			$data['status'] = FALSE;
		}

		if($data['status'] === FALSE)
		{
			echo json_encode($data);
			exit();
		}
	}
////////////////

//////////////// alat kelengkapan ajax list3
	public function alat_kelengkapan()
	{
		$data['contents'] = 'admin/content/alat_kelengkapan';
		$this->load->view('admin/index',$data);
	}
	public function ajax_list3()
	{
		$this->load->helper('url');

		$list = $this->m_alatk->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $m_alatk) {
			$row = array();
			$row[] = $no++;
			if($m_alatk->photo)
			$row[] = '<a href="'.base_url('upload/'.$m_alatk->photo).'" target="_blank"><img src="'.base_url('upload/'.$m_alatk->photo).'" class="img-responsive" /></a>';
			else
				$row[] = '(No photo)';
			$row[] = $m_alatk->judul;
			$row[] = $m_alatk->isi;

			//add html for action
			$row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_m_alatk('."'".$m_alatk->no."'".')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
				  <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_m_alatk('."'".$m_alatk->no."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
		
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->m_alatk->count_all(),
						"recordsFiltered" => $this->m_alatk->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}

	public function ajax_edit3($id)
	{
		$data = $this->m_alatk->get_by_id($id);
		echo json_encode($data);
	}

	public function ajax_update3()
	{
		$this->_validate3();
		$data = array(
				'judul' => $this->input->post('judul'),
				'isi' => $this->input->post('isi'),
			);

		if($this->input->post('remove_photo')) // if remove photo checked
		{
			if(file_exists('upload/'.$this->input->post('remove_photo')) && $this->input->post('remove_photo'))
				unlink('upload/'.$this->input->post('remove_photo'));
			$data['photo'] = '';
		}

		if(!empty($_FILES['photo']['name']))
		{
			$upload = $this->_do_upload3();
			
			//delete file
			$m_alatk = $this->m_alatk->get_by_id($this->input->post('no'));
			if(file_exists('upload/'.$m_alatk->photo) && $m_alatk->photo)
				unlink('upload/'.$m_alatk->photo);

			$data['photo'] = $upload;
		}

		$this->m_alatk->update(array('no' => $this->input->post('no')), $data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_delete3($id)
	{
		//delete file
		$m_alatk = $this->m_alatk->get_by_id($id);
		if(file_exists('upload/'.$m_alatk->photo) && $m_alatk->photo)
			unlink('upload/'.$m_alatk->photo);
		
		$this->m_alatk->delete_by_id($id);
		echo json_encode(array("status" => TRUE));
	}

	private function _do_upload3()
	{
		$config['upload_path']          = 'upload/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 10000000; //set max size allowed in Kilobyte
        $config['max_width']            = 1000000; // set max width image allowed
        $config['max_height']           = 1000000; // set max height allowed
        $config['file_name']            = round(microtime(true) * 1000); //just milisecond timestamp fot unique name

        $this->load->library('upload', $config);

        if(!$this->upload->do_upload('photo')) //upload and validate
        {
            $data['inputerror'][] = 'photo';
			$data['error_string'][] = 'Upload error: '.$this->upload->display_errors('',''); //show ajax error
			$data['status'] = FALSE;
			echo json_encode($data);
			exit();
		}
		return $this->upload->data('file_name');
	}

	private function _validate3()
	{
		$data = array();
		$data['error_string'] = array();
		$data['inputerror'] = array();
		$data['status'] = TRUE;

		

		if($this->input->post('judul') == '')
		{
			$data['inputerror'][] = 'judul';
			$data['error_string'][] = 'judul is required';
			$data['status'] = FALSE;
		}

		if($this->input->post('isi') == '')
		{
			$data['inputerror'][] = 'isi';
			$data['error_string'][] = 'isi is required';
			$data['status'] = FALSE;
		}

		if($data['status'] === FALSE)
		{
			echo json_encode($data);
			exit();
		}
	}
	public function pimpinan_dprd()
	{
		$data['contents'] = 'admin/content/pimpinan_dprd';
		$this->load->view('admin/index',$data);
	}


//////////////// komentar ajax list2	
	public function komentar()
	{
		$data['contents'] = 'admin/content/komentar';
		$this->load->view('admin/index',$data);
	}

	public function ajax_list2()
	{
		$list = $this->m_komentar->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $m_komentar) {
			$row = array();			
            $row[] = $no++;
            $row[] = $m_komentar->kd_komentar;
            $row[] = $m_komentar->tanggal;
            $row[] = $m_komentar->nama;
            $row[] = $m_komentar->isikomentar;

			//add html for action
			$row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Balas" onclick="edit_saran('."'".$m_komentar->no."'".')"><i class="glyphicon glyphicon-pencil"></i> Balas</a>
			<a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_saran('."'".$m_komentar->no."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
		
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->m_komentar->count_all(),
						"recordsFiltered" => $this->m_komentar->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}
		public function ajax_edit2($id)
	{
		$data = $this->m_komentar->get_by_id($id);
		echo json_encode($data);
	}
		public function ajax_update2()
	{
				date_default_timezone_set("Asia/Jakarta");
		$data = array(
				'kd_komentar' => $this->input->post('kd_komentar'),
				'tanggal' => date("Y-m-d"),
				'nama' => "ADMIN",
				'isikomentar' => "<b>@".$this->input->post('nama')."</b>"." ".$this->input->post('isikomentar'),
				);
		$insert = $this->m_komentar->save($data);
		echo json_encode(array("status" => TRUE));
	}
	public function ajax_delete2($id)
	{
		$this->m_komentar->delete_by_id($id);
		echo json_encode(array("status" => TRUE));
	}

////////////////

//////////////// saran ajax list 
	public function saran()
	{
		$data['contents'] = 'admin/content/saran';
		$this->load->view('admin/index',$data);
	}

	public function ajax_list()
	{
		$list = $this->m_saran->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $m_saran) {
			$row = array();			
            $row[] = $no++;
            $row[] = $m_saran->tanggal;
            $row[] = $m_saran->nama;
            $row[] = $m_saran->isisaran;

			//add html for action
			$row[] = '<a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_saran('."'".$m_saran->no."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
		
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->m_saran->count_all(),
						"recordsFiltered" => $this->m_saran->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}
	public function ajax_delete($id)
	{
		$this->m_saran->delete_by_id($id);
		echo json_encode(array("status" => TRUE));
	}

////////////////
	public function tambah_berita()
	{
		$data['contents'] = 'admin/content/tambah_berita';
		$this->load->view('admin/index',$data);
	}

		function upload7(){

		$filename = md5(uniqid(rand(), true));
		$config = array(
			'upload_path' => 'upload',
			'allowed_types' => "gif|jpg|png|jpeg",
			'file_name' => $filename
		);
		
		$this->load->library('upload', $config);
		if($this->upload->do_upload())
			{
			$file_data = $this->upload->data();
			
			$data['tanggal'] = $_POST['tanggal'];
			$data['photo'] = $file_data['file_name'];
			$data['judul'] = $_POST['judul'];
			$data['isi'] = $_POST['isi'];
			$this->load->model('upload_images');
			$this->upload_images->save_image3($data);
			
			$data['message'] = "uploaded";
		
		$data['contents'] = 'admin/content/tambah_berita';
		$this->load->view('admin/index',$data);
			}
			else
			{
			$data = array();	
			$this->load->model('upload_images');			
			$data['uploaded_images'] = $this->upload_images->get_images();
			
			$error = $this->upload->display_errors();
			$data['errors'] = $error;

		$data['contents'] = 'admin/content/tambah_berita';
		$this->load->view('admin/index',$data);
			}
	}

	public function tambah_progja()
	{
		$data['contents'] = 'admin/content/tambah_progja';
		$this->load->view('admin/index',$data);
	}
		function upload6(){

		$filename = md5(uniqid(rand(), true));
		$config = array(
			'upload_path' => 'upload',
			'allowed_types' => "gif|jpg|png|jpeg",
			'file_name' => $filename
		);
		
		
		$this->load->library('upload', $config);
		if($this->upload->do_upload())
			{
			$file_data = $this->upload->data();
			
			$data['tanggal'] = $_POST['tanggal'];
			$data['photo'] = $file_data['file_name'];
			$data['judul'] = $_POST['judul'];
			$data['isi'] = $_POST['isi'];
			$this->load->model('upload_images');
			$this->upload_images->save_image2($data);
			
			$data['message'] = "uploaded";
		
		$data['contents'] = 'admin/content/tambah_progja';
		$this->load->view('admin/index',$data);
			}
			else
			{
			$data = array();	
			$this->load->model('upload_images');			
			$data['uploaded_images'] = $this->upload_images->get_images();
			
			$error = $this->upload->display_errors();
			$data['errors'] = $error;
		$data['contents'] = 'admin/content/tambah_progja';
		$this->load->view('admin/index',$data);
			}
	}
//////////////index 5
	public function tambah_agenda()
	{
		$data['contents'] = 'admin/content/tambah_agenda';
		$this->load->view('admin/index',$data);
	}
		function upload5(){

		$filename = md5(uniqid(rand(), true));
		$config = array(
			'upload_path' => 'upload',
			'allowed_types' => "gif|jpg|png|jpeg",
			'file_name' => $filename
		);
		$this->load->library('upload', $config);
		if($this->upload->do_upload())
			{
			$file_data = $this->upload->data();
			$data['tanggal'] = $_POST['tanggal'];
			$data['photo'] = $file_data['file_name'];
			$data['judul'] = $_POST['judul'];
			$data['isi'] = $_POST['isi'];
			$this->load->model('upload_images');
			$this->upload_images->save_image1($data);		
			$data['message'] = "uploaded";
			$data['contents'] = 'admin/content/tambah_agenda';
			$this->load->view('admin/index',$data);
			}
			else
			{
			$data = array();	
			$this->load->model('upload_images');			
			$data['uploaded_images'] = $this->upload_images->get_images();
			
			$error = $this->upload->display_errors();
			$data['errors'] = $error;

		$data['contents'] = 'admin/content/tambah_agenda';
		$this->load->view('admin/index',$data);
			}
	}
//////////////index 4
	public function tambah_alat_kelengkapan()
	{
		$data['contents'] = 'admin/content/tambah_alat_kelengkapan';
		$this->load->view('admin/index',$data);
	}

	function upload4(){

		$filename = md5(uniqid(rand(), true));
		$config = array(
			'upload_path' => 'upload',
			'allowed_types' => "gif|jpg|png|jpeg",
			'file_name' => $filename
		);	
		$this->load->library('upload', $config);
		if($this->upload->do_upload())
			{
			$file_data = $this->upload->data();
			
			$data['photo'] = $file_data['file_name'];
			$data['judul'] = $_POST['judul'];
			$data['isi'] = $_POST['isi'];
			$this->load->model('upload_images');
			$this->upload_images->save_image($data);
			$data['message'] = "uploaded";
			$data['contents'] = 'admin/content/tambah_alat_kelengkapan';
			$this->load->view('admin/index',$data);
			}
			else
			{
			$data = array();	
			$this->load->model('upload_images');			
			$data['uploaded_images'] = $this->upload_images->get_images();		
			$error = $this->upload->display_errors();
			$data['errors'] = $error;
			$data['contents'] = 'admin/content/tambah_alat_kelengkapan';
			$this->load->view('admin/index',$data);
			}
	}
}

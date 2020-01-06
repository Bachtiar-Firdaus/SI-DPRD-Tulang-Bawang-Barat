<?php 
Class upload_images extends CI_Model{

	function save_image($data){		
		$this->db->insert('tbl_k',$data);
	}

	function save_image1($data){		
		$this->db->insert('tbl_a',$data);
	}
	function save_image2($data){		
		$this->db->insert('tbl_p',$data);
	}
	function save_image3($data){		
		$this->db->insert('tbl_b',$data);
	}
	function save_image4($data){		
		$this->db->insert('tbl_anggota',$data);
	}
	
	function get_images(){
		$this->db->from('uploaded_images');
		$this->db->order_by('date_uploaded', 'asc');
		$query = $this->db->get();
		
		return $query->result();		

	}

}
?>
<?php 
Class User extends CI_Model{

	function save($data){		
		$this->db->insert('tbl_saran',$data);
	}	
	function save_komentar($data){		
		$this->db->insert('tbl_komentar',$data);
	}


	function get_berita_by_kode($kode){
		$hsl=$this->db->query("SELECT * FROM tbl_a WHERE no='$kode'");
		return $hsl;
	}
	function get_berita_by_kode1($kode){
		$hsl=$this->db->query("SELECT * FROM tbl_k WHERE no='$kode'");
		return $hsl;
	}
	function get_berita_by_kode2($kode){
		$hsl=$this->db->query("SELECT * FROM tbl_b WHERE no='$kode'");
		return $hsl;
	}
	function get_berita_by_kode3($kode){
		$hsl=$this->db->query("SELECT * FROM tbl_p WHERE no='$kode'");
		return $hsl;
	}





	function get_berita_by_kode_listsaran($kode){
		$hsl=$this->db->query("SELECT * FROM tbl_saran WHERE no='$kode'");
		return $hsl;
	}
    public function get_komentar_listsaran($kode1){
    	$h=$kode1.'tbl_saran';
    	$hsl = $this->db->query("SELECT * FROM tbl_komentar WHERE KD_KOMENTAR='$h'");
        return $hsl->result();
    }










    
	function get_berita_by_kode_anggota($kode){
		$hsl=$this->db->query("SELECT * FROM tbl_anggota WHERE no='$kode'");
		return $hsl;
	}
    public function get_komentar_tbl_a($kode1){
    	$h=$kode1.'tbl_a';
    	$hsl = $this->db->query("SELECT * FROM tbl_komentar WHERE KD_KOMENTAR='$h'");
        return $hsl->result();
    }
    public function get_komentar_tbl_k($kode1){
    	$h=$kode1.'tbl_k';
    	$hsl = $this->db->query("SELECT * FROM tbl_komentar WHERE KD_KOMENTAR='$h'");
        return $hsl->result();
    }
    public function get_komentar_tbl_b($kode1){
    	$h=$kode1.'tbl_b';
    	$hsl = $this->db->query("SELECT * FROM tbl_komentar WHERE KD_KOMENTAR='$h'");
        return $hsl->result();
    }
    public function get_komentar_tbl_p($kode1){
    	$h=$kode1.'tbl_p';
    	$hsl = $this->db->query("SELECT * FROM tbl_komentar WHERE KD_KOMENTAR='$h'");
        return $hsl->result();
    }

	function get_all_berita(){
		$hsl=$this->db->query("SELECT * FROM tbl_a ORDER BY no DESC");
		return $hsl;
	}	
	function get_all_berita1(){
		$hsl=$this->db->query("SELECT * FROM tbl_k ORDER BY no DESC");
		return $hsl;
	}
	function get_all_berita2(){
		$hsl=$this->db->query("SELECT * FROM tbl_b ORDER BY no DESC");
		return $hsl;
	}
	function get_all_berita3(){
		$hsl=$this->db->query("SELECT * FROM tbl_p ORDER BY no DESC");
		return $hsl;
	}
	function get_all_saran(){
		$hsl=$this->db->query("SELECT * FROM tbl_saran ORDER BY no DESC");
		return $hsl;
	}
	function get_all_anggota(){
		$hsl=$this->db->query("SELECT * FROM tbl_anggota ORDER BY no DESC");
		return $hsl;
	}
}
?>
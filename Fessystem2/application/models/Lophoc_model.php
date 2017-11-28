<?php
	Class Lophoc_model extends MY_Model
	{
    function __construct()
    {
      parent::__construct();
    }
    	var $table = 'lophoc';
    	var $key = 'lophoc_id';
      function Get_lop()
     {
       $query = $this->db->get('lophoc');
       return $query->result_array();
     }
		 function checklop($idl)
		{
			$this->db->select('*')
			->from('lophoc as l');
      $this->db->where('l.tenlop', $idl);
      $query = $this->db->get();
      if ($query->num_rows() > 0) {
        return $query->row_array();
      }else {
        $this->db->set('tenlop', $idl);
        $this->db->insert('lophoc');
				$this->db->select('*')
  			->from('lophoc as l');
        $this->db->where('l.tenlop', $idl);
        $query = $this->db->get();
  			return $query->row_array();
      }
		}
    function Get_lopbyidk($idk)
    {
      $this->db->select('*')
        ->from('lophoc as l')
        ->join('khoahoc as k', 'l.khoahoc_id = k.khoahoc_id')
      ->where('k.khoahoc_id',$idk);
      $query = $this->db->get();
      return $query->result_array();
    }
    function Get_lopbyid($idl)
    {

      $this->db->where('lophoc_id',$idl);
      $query = $this->db->get('lophoc');
      return $query->row_array();
    }
		function get_lop_mon($idm)
    {
      $this->db->where('monhoc_id',$idm);
      $query = $this->db->get('lophoc');
      return $query->result_array();
    }
    function Check_Lop($tenlop)
    {
      $this->db->select('*')
      ->from('lophoc as l')
      ->where('l.tenlop', $tenlop);
      $query = $this->db->get();
      if ($query->num_rows() > 0) 
      {
       return true;
      }
    }
    // function Get_nganhbyidk($idn)
    // {
    //   $this->db->select('*')
    //     ->from('lophoc as l')
    //     ->join('khoahoc as k', 'l.khoahoc_id = k.khoahoc_id')
    //     ->join('nganhhoc as n', 'l.khoahoc_id = n.khoahoc_id')
    //   ->where('k.khoahoc_id',$idn);
    //   $query = $this->db->get();
    //   return $query->result_array();
    // }
	}
?>
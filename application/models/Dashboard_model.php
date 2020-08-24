<?php
class Dashboard_model extends CI_Model{

    public function __construct()
    {
        parent::__construct();
    }

  public function get_all()
  {

      $this->db->where('musteri_id = 5');
      $query = $this->db->get('musteriler');

      foreach ($query->result() as $row) {

          return $row->musteri_adi;
      }
  }




}
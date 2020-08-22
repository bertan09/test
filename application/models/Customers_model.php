<?php
class Customers_model extends CI_Model{

    public $tableName = "musteriler";
    public function __construct()
    {
        parent::__construct();
    }

  public function get_all($data){

        $sql = $this->db->get($this->tableName);

      $where =[];
      $order = ['musteri_id', 'DESC'];
      $column = $data['order'][0]['column'];
      $columnName = $data['columns'][$column]['data'];
      $columnOrder = $data['order'][0]['dir'];

      if (isset($columnName) && !empty($columnName) && isset($columnOrder) && !empty($columnOrder)) {
          $order[0] = $columnName;
          $order[1] = $columnOrder;
      }

      if (!empty($data['search']['value'])){
          foreach ($data['columns'] as $column){
              $where[] = $column['data'] . ' LIKE "%' . $data['search']['value']. '%"';
          }
      }
      if (count($where) >0){

          $sql->where(implode(' || ', $where));

      }
     $sql .= $this->db->order_by($order[0], $order[1]);
      $this->db->limit($data['length'],$data['start']);
      $total= $this->db->count_all_results($this->tableName);


      if (count($where) >0){

          $getFilteredTotal = $this->db->table($this->builder);
          $getFilteredTotal->where(implode(' || ', $where));
          $filteredTotal= $getFilteredTotal->countAllResults();

      }
      else{
          $filteredTotal = $total;
      }



      $response = [];
      $response['data'] = [];
      $response['recordsTotal'] = 100;
      $response['recordsFiltered'] = 100;


      $results = $this->db->get("musteriler");
      foreach ($results->result() as $user)
      {
          $response['data'][]= [
              'musteri_id' => $user->musteri_id,
              'musteri_adi' => $user->musteri_adi,
              'musteri_cep_tel' => $user->musteri_cep_tel,
              'actions' => [
                  [
                      'title'=> 'Düzenle',
                      'url' => 'edit.php?id=' . $user->musteri_id,
                      'class' => 'btn btn-primary btn-sm update',
                      'id' => $user->musteri_id
                  ],
                  [
                      'title'=> 'Sil',
                      'url' => 'delete.php?id=' . $user->musteri_id,
                      'class' => 'btn btn-danger btn-sm',
                      'id' => $user->musteri_id
                  ]

              ]

          ];
      }

      return $response;
    }



}
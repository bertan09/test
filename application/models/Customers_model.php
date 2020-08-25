<?php
class Customers_model extends CI_Model{

    public $tableName = "musteriler";
    public function __construct()
    {
        parent::__construct();
    }

  public function get_all($data){

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

          $this->db->where(implode(' || ', $where));

      }


      $this->db->order_by($order[0], $order[1]);
      $this->db->limit($data['length'],$data['start']);
      $query = $this->db->get('musteriler');

    $total = $this->db->count_all('musteriler');




      if (count($where) >0){



          $this->db->where(implode(' || ', $where));
          $this->db->from('musteriler');
          $filteredTotal = $this->db->count_all_results();

      }
      else{
          $filteredTotal = $total;
      }



      $response = [];
      $response['data'] = [];
      $response['recordsTotal'] = $total;
      $response['recordsFiltered'] = $filteredTotal;



      foreach ($query->result() as $user)
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
                      'id' => $user->musteri_id,
                      'mission' => 'editCustomer'
                  ],
                  [
                      'title'=> 'Sil',
                      'url' => 'delete.php?id=' . $user->musteri_id,
                      'class' => 'btn btn-danger btn-sm',
                      'id' => $user->musteri_id,
                      'mission' => 'deleteCustomer'

                  ]

              ]

          ];
      }

      return $response;
    }

    function fetch_single_data($data)
    {
        $this->db->where('musteri_id', $data); // Produces: WHERE name = 'Joe'

        $query = $this->db->get('musteriler');
        foreach ($query->result() as $user){
            $output=[
                'musteri_id' => $user->musteri_id,
                'musteri_adi' => $user->musteri_adi,

            ];
        }
        return $output;

    }

    function deleteCustomer($data)
    {

        $this->db->where('musteri_id', $data);
        $this->db->delete('musteriler');
    }

}
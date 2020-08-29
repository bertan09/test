<?php
class Customers_model extends CI_Model{

    public $tableName = "customers";
    public function __construct()
    {
        parent::__construct();
    }

  public function get($where = array()){
     return   $this->db->where($where)->get($this->tableName)->row();
  }


  public function get_all($data){

      $where =[];
      $order = ['customer_id', 'DESC'];
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
      $query = $this->db->get('customers');
      $total = $this->db->count_all('customers');

      if (count($where) >0){

          $this->db->where(implode(' || ', $where));
          $this->db->from('customers');
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
              'customer_id' => $user->customer_id,
              'customer_name' => $user->customer_name,
              'customer_gsm' => $user->customer_gsm,
              'edit' => '<a href="" class="btn btn-primary btn-sm">Düzenle </a>'. ' '.'<button class="btn btn-danger btn-sm remove-btn">Sil </button>',
              'actions' => [
                  [
                      'title'=> 'Düzenle',
                      'url' => 'customers/update_form/' . $user->customer_id,
                      'class' => 'btn btn-primary btn-sm update',
                      'id' => $user->customer_id,
                      'mission' => 'editCustomer'
                  ],
                  [
                      'title'=> 'Sil',
                      'url' => 'customers/delete/' . $user->customer_id,
                      'class' => 'btn btn-danger btn-sm remove-btn',
                      'id' => $user->customer_id,
                      'mission' => 'deleteCustomer'

                  ]

              ]

          ];
      }

      return $response;
    }


    public function add($data = array()){

    return    $this->db->insert($this->tableName, $data);
    }

    public function update($where = array(),$data = array()){
        return $this->db->where($where)->update($this->tableName , $data);
    }
    public function delete($where = array()){
        return $this->db->where($where)->delete($this->tableName);
    }
}
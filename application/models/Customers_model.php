<?php
class Customers_model extends CI_Model{

    public $tableName = "customers";
    public function __construct()
    {
        parent::__construct();
    }

  public function get($where = array()){
     return   $this->db->where($where)
         ->join('cities', 'customers.customer_city = cities.city_id', 'LEFT')
         ->join('towns', 'customers.customer_town = towns.town_id', 'LEFT')
         ->get($this->tableName)->row();



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
              'actions' => [
                  [
                      'title'=> 'Düzenle',
                      'url' => 'customers/update_form/' . $user->customer_id,
                      'class' => 'btn btn-primary btn-sm update',
                      'id' => $user->customer_id,
                      'type' => 'a',
                      'method' => 'editCustomer'
                  ],
                  [
                      'title'=> 'Sil',
                      'url' => 'customers/delete/' . $user->customer_id,
                      'class' => 'btn btn-danger btn-sm remove-btn',
                      'id' => $user->customer_id,
                      'type' => 'button',
                      'method' => 'deleteCustomer'

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

    public function getCity (){
        $this->db->order_by("city_name", "ASC");
        $query = $this->db->get("cities");
        return $query->result();
    }

    public function getTown($city_id)
    {
        $this->db->where('city_id', $city_id);
        $this->db->order_by('town_name', 'ASC');
        $query = $this->db->get('towns');
        $output = '<option value="">İlçe Seçin</option>';
        foreach($query->result() as $row)
        {
            $output .= '<option value="'.$row->town_id.'">'.$row->town_name.'</option>';
        }
        return $output;
    }

    public function getTownFetch ($city_id){
        $this->db->where('city_id', $city_id);
        $this->db->order_by("town_name", "ASC");
        $query = $this->db->get("towns");
        return $query->result();
    }
}
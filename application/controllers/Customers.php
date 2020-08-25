<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customers extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        $this->load->model('customers_model');
    }

    public function index()
	{
	    $data = new stdClass();
	   // $data->customers= $this->customers_model->get_all();
        $data->title =  "Müşteriler";
        $data->button = "Müşteri Ekle";
        $data->modal =  "costumerModal";


        $this->load->view('static/header', $data);
		$this->load->view('customers', $data);
        $this->load->view('static/footer', $data);

    }

    public function getAll()
    {
        {
            $data = array(
                'order'     =>    $this->input->post("order"),
                'columns'   =>    $this->input->post('columns'),
                'search'    =>    $this->input->post('search'),
                'start'     =>    $this->input->post('start'),
                'length'    =>    $this->input->post('length'),
            );

            $response = $this->customers_model->get_all($data);

            echo json_encode($response, true);

        }
    }
    function fetch_single_data()
    {
        if($this->input->post('customer_id'))
        {
            $output = $this->customers_model->fetch_single_data($this->input->post('customer_id'));
            echo json_encode($output);
        }
    }
    function delete_data()
    {

        if($this->input->post('customer_id'))
        {
            $this->customers_model->deleteCustomer($this->input->post('customer_id'));
            echo json_encode('Silindi');
        }
    }
}

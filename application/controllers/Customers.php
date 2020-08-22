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
        $data->title = "Müşteriler";


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


}

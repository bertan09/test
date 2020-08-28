<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customers extends CI_Controller {

    public $viewfolder = "";

    public function __construct()
    {
        parent::__construct();
        $this->viewfolder = "customer_v";

        $this->load->model('customers_model');
    }

    public function index()
	{
        $viewData = new stdClass();
        $viewData->title = "Müşteriler";
        $viewData->viewfolder = $this->viewfolder;
        $viewData->subviewfolder = "list";

        $this->load->view("{$viewData->viewfolder}/{$viewData->subviewfolder}/index" , $viewData);

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


        }
    }

    function save(){

        $viewData = new stdClass();
        $viewData->title = "Müşteri Ekle";
        $viewData->viewfolder = $this->viewfolder;
        $viewData->subviewfolder = "add";

        $this->load->view("{$viewData->viewfolder}/{$viewData->subviewfolder}/index" , $viewData);



        $this->load->library('form_validation');
        $this->form_validation->set_rules('customer_name','Müşteri Adı','required|trim');
        $this->form_validation->set_message(
            array(
                "required" => "{field} Adı Giriniz"
            )
        );

        $validate= $this->form_validation->run();
        if($validate){
            echo "işlem Başarılı";
        }
        else{
            echo validation_errors();
        }

    }
}

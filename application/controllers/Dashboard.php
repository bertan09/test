<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        $this->load->model('dashboard_model');
    }
	public function index()
	{
	    $data = $this->dashboard_model->get_all();

       print_r($data) ;

	  /*  $data =[
	        'title' => 'Ana Sayfa'
	        ];
        $this->load->view('static/header', $data);
		$this->load->view('dashboard', $data);
        $this->load->view('static/footer', $data);

*/

    }
}

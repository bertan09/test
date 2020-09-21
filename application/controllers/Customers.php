<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customers extends CI_Controller {

    public $viewFolder = "";

    public function __construct()
    {
        parent::__construct();
        $this->viewFolder = "customer_v";

        $this->load->model('customers_model');
    }

    public function index()
	{
        $viewData = new stdClass();
        $viewData->title = "Müşteriler";
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "list";

        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index" , $viewData);

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


    public function new_form(){

        $viewData = new stdClass();

        /** View'e gönderilecek Değişkenlerin Set Edilmesi.. */
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "add";

        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);

    }

    public function save(){

        $this->load->library("form_validation");

        // Kurallar yazilir..
        $this->form_validation->set_rules("customer_name", "Müşteri Adı", "required|trim");
      //  $this->form_validation->set_rules("customer_gsm", "Telefon Numarası", "required|trim|regex_match[/^[0-9]{10}$/]'");

        $this->form_validation->set_message(
            array(
                "required"  => "* {field} girin.",
            //    "regex_match"  => "* Geçerli bir {field} girin",

            )
        );

        $validate = $this->form_validation->run();

        if($validate){

          $insert =  $this->customers_model->add(
              array(
                  "customer_name" => $this->input->post("customer_name"),
                  "customer_gsm" => $this->input->post("customer_gsm"),
                  "customer_phone" => $this->input->post("customer_phone"),
                  "customer_fax" => $this->input->post("customer_fax"),
                  "customer_email" => $this->input->post("customer_email"),
                  "customer_identity" => $this->input->post("customer_identity"),
                  "customer_address" => $this->input->post("customer_address"),
                  "customer_city" => $this->input->post("customer_city"),
                  "customer_town" => $this->input->post("customer_town"),
                  "company_name" => $this->input->post("company_name"),
                  "tax_office" => $this->input->post("tax_office"),
                  "tax_number" => $this->input->post("tax_number")
              )
            );
          if ($insert){
              $alert = array (
                  'text' => 'Müşteri Eklendi.',
                  'type' => 'success'
              );
          }
          else {
              $alert = array (
                  'text' => 'İşlem Başarısız.',
                  'type' => 'error'
              );
          }
            // İşlemin Sonucunu Session'a yazma işlemi...
            $this->session->set_flashdata("alert", $alert);

            redirect(base_url("customers"));
        } else {

            $viewData = new stdClass();

            /** View'e gönderilecek Değişkenlerin Set Edilmesi.. */
            $viewData->viewFolder = $this->viewFolder;
            $viewData->subViewFolder = "add";
            $viewData->form_error = true;

            $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
        }

    }

    public function update_form ($id){

        $item = $this->customers_model->get(
            array(
                'customer_id' => $id
            )
        );
        $city = $this->customers_model->getCity();
        $town = $this->customers_model->getTownFetch($item->city_id);

        $viewData = new stdClass();

        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "update";
        $viewData->item=$item;
        $viewData->city=$city;
        $viewData->town=$town;


        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);

    }

    public function update($id){

        $this->load->library("form_validation");

        // Kurallar yazilir..
        $this->form_validation->set_rules("customer_name", "Müşteri Adı", "required|trim");
        $this->form_validation->set_rules('customer_email', 'E-Posta', 'trim|valid_email');


        $this->form_validation->set_message(
            array(
                "required"  => "* {field} girin.",
                "valid_email"  => "Geçerli bir {field} adresi girin",

            )
        );

        // Form Validation Calistirilir..
        // TRUE - FALSE
        $validate = $this->form_validation->run();

        if($validate){

            $update =  $this->customers_model->update(
                array(
                    'customer_id' => $id
                ),
                array(
                    "customer_name" => $this->input->post("customer_name"),
                    "customer_gsm" => $this->input->post("customer_gsm"),
                    "customer_phone" => $this->input->post("customer_phone"),
                    "customer_fax" => $this->input->post("customer_fax"),
                    "customer_email" => $this->input->post("customer_email"),
                    "customer_identity" => $this->input->post("customer_identity"),
                    "customer_address" => $this->input->post("customer_address"),
                    "customer_city" => $this->input->post("customer_city"),
                    "customer_town" => $this->input->post("customer_town"),
                    "company_name" => $this->input->post("company_name"),
                    "tax_office" => $this->input->post("tax_office"),
                    "tax_number" => $this->input->post("tax_number")
                )
            );
            if ($update){
                $alert = array (
                    'text' => 'Kayıt Güncellendi.',
                    'type' => 'success'
                );
            }
            else {
                $alert = array (
                    'text' => 'İşlem Başarısız.',
                    'type' => 'error'
                );
            }
            // İşlemin Sonucunu Session'a yazma işlemi...
            $this->session->set_flashdata("alert", $alert);

            redirect(base_url("customers"));
        } else {
            $item = $this->customers_model->get(
                array(
                    'customer_id' => $id
                )
            );
            $viewData = new stdClass();

            /** View'e gönderilecek Değişkenlerin Set Edilmesi.. */
            $viewData->viewFolder = $this->viewFolder;
            $viewData->subViewFolder = "update";
            $viewData->form_error = true;
            $viewData->item = $item;

            $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
        }

    }

    public function delete($id){
        $delete = $this->customers_model->delete(
            array(
                'customer_id' => $id
            )
        );
        if ($delete){
            $alert = array (
                'text' => 'Kayıt Silindi.',
                'type' => 'success'
            );
        }
        else {
            $alert = array (
                'text' => 'İşlem Başarısız.',
                'type' => 'error'
            );
        }
        // İşlemin Sonucunu Session'a yazma işlemi...
        $this->session->set_flashdata("alert", $alert);

        redirect(base_url("customers"));
    }

    function getTown()
    {
        if($this->input->post('city_id'))
        {
            echo $this->customers_model->getTown($this->input->post('city_id'));
        }
    }

}

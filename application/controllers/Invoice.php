<?php
class Invoice extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('invoice_model');
        $this->load->model('customer_model');
        $this->load->model('product_model');
        $this->load->model('orderDetail_model');
        $this->load->model('Auth_model', 'auth');
        $this->load->library('form_validation');
        $this->load->library('session');
    }

    function index(){
        if ($this->session->userdata('ci_seesion_key') !== null  && $this->session->userdata('ci_seesion_key')['is_authenticate_user'] == TRUE) {  
            $this->load->view('invoice_view');
        } else {
            redirect('auth/login');
        }
    }
     
    function invoice_data(){
        $data=$this->invoice_model->invoice_list();
        echo json_encode($data);
    }
 
    function save(){
        $data=$this->invoice_model->save_invoice();
        echo json_encode($data);
    }
 
    function update(){
        $data=$this->invoice_model->update_invoice();
        echo json_encode($data);
    }
 
    function delete(){
        $data=$this->invoice_model->delete_invoice();
        echo json_encode($data);
    }

    function getCustomer()
    {
        $data=$this->customer_model->customer_list();
        echo json_encode($data);
    }

    function getProduct()
    {
        $data=$this->product_model->product_list();
        echo json_encode($data);
    }

    function getDetailList()
    {
        $data=$this->orderDetail_model->detail_list();
        echo json_encode($data);
    }

    function saveDetail()
    {
        $data=$this->orderDetail_model->save_detail();
        echo json_encode($data);
    }

    function deleteDetail()
    {
        $data=$this->orderDetail_model->delete_detail();
        echo json_encode($data);
    }
}
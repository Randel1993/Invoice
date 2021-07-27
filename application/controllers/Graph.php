<?php
class Graph extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('invoice_model');
        $this->load->model('customer_model');
        $this->load->model('product_model');
        $this->load->model('orderDetail_model');
        $this->load->library('session');
    }

    function index() {
        if ($this->session->userdata('ci_seesion_key') !== null  && $this->session->userdata('ci_seesion_key')['is_authenticate_user'] == TRUE) {  
            $this->load->view('graph_view');
        } else {
            redirect('auth/login');
        }
    }

    function fetchYear() {
        //select
        $this->db->select('YEAR(date_created) as DATE');
        $this->db->select('SUM(quantity*product_price) as TOTAL');
        //where
        $where = "order_detail.product_code is  NOT NULL";
        $this->db->where($where);

        //join
        $this->db->from('invoice');
        $this->db->join('order_detail', 'invoice.invoice_code = order_detail.invoice_code', 'LEFT');
        $this->db->join('product', 'order_detail.product_code = product.product_code', 'RIGHT');

        //group
        $this->db->group_by('YEAR(date_created)'); 
        $this->db->order_by('YEAR(date_created)', 'asc');

        $query = $this->db->get();

        echo json_encode($query->result());
    }

    function fetchMonthly() {
        //select
        $this->db->select('CONCAT(YEAR(date_created), "-", RIGHT(CONCAT("00", MONTH(date_created)), 2)) AS DATE');
        $this->db->select('SUM(quantity*product_price) as TOTAL');
        //where
        $where = "order_detail.product_code is  NOT NULL";
        $this->db->where($where);

        //join
        $this->db->from('invoice');
        $this->db->join('order_detail', 'invoice.invoice_code = order_detail.invoice_code', 'LEFT');
        $this->db->join('product', 'order_detail.product_code = product.product_code', 'RIGHT');

        //group
        $this->db->group_by('DATE'); 
        $this->db->order_by('DATE', 'asc');

        $query = $this->db->get();

        echo json_encode($query->result());

    }

    function fetchDay() {
        //select
        $this->db->select('date_created as DATE');
        $this->db->select('SUM(quantity*product_price) as TOTAL');
        //where
        $where = "order_detail.product_code is  NOT NULL";
        $this->db->where($where);

        //join
        $this->db->from('invoice');
        $this->db->join('order_detail', 'invoice.invoice_code = order_detail.invoice_code', 'LEFT');
        $this->db->join('product', 'order_detail.product_code = product.product_code', 'RIGHT');

        //group
        $this->db->group_by('date_created'); 
        $this->db->order_by('date_created', 'asc');

        $query = $this->db->get();

        echo json_encode($query->result());

    }
}
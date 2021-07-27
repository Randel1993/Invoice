<?php
class Invoice_model extends CI_Model{
 
    function invoice_list(){
        $query=$this->db->get('invoice');
        return $query->result();
    }
 
    function save_invoice(){
        $data = array(
                'customer_id'  => $this->input->post('customer_id')
            );

        $result=$this->db->insert('invoice',$data);
        return $this->db->insert_id();
    }
 
    function delete_invoice(){
        $invoice_code=$this->input->post('invoice_code');
        $array = array('invoice_code' => $invoice_code);

        $this->db->where($array);
        $result=$this->db->delete('invoice');
        return $result;
    }
     
}
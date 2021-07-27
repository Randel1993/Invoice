<?php
class OrderDetail_model extends CI_Model{
 
    function detail_list(){
        $invoice_code=$this->input->post('invoice_code');
        $array = array('invoice_code' => $invoice_code);
        $this->db->where($array);
        $query =$this->db->get('order_detail');
        return $query ->result();
    }
 
    function save_detail(){
        $invoice_code=$this->input->post('invoice_code');
        $product_code=$this->input->post('product_code');
        $quantity=$this->input->post('quantity');
        
        //check if exist
        $filter = array('invoice_code' => $invoice_code, 'product_code'  => $product_code);
        $this->db->where($filter);
        $query =$this->db->get('order_detail');

        $data = array(
                'invoice_code'  => $invoice_code,
                'product_code'  => $product_code,
                'quantity'  => $quantity
        );

        if ($query->num_rows() > 0){
            $result=$this->db->update('order_detail',$data);
        }
        else{
            $result=$this->db->insert('order_detail',$data);
        }
        return $result;
    }
 
    function update_detail(){
        $customer_id=$this->input->post('customer_id');
        $customer_name=$this->input->post('customer_name');

        $array = array('customer_id' => $customer_id);
 
        $this->db->set('customer_name', $customer_name);
        $this->db->where($array);
        $result=$this->db->update('order_detail');
        return $result;
    }
 
    function delete_detail(){
        $invoice_code=$this->input->post('invoice_code');
        $product_code=$this->input->post('product_code');
        $filter = array('invoice_code' => $invoice_code, 'product_code'  => $product_code);
        $this->db->where($filter);
        $result=$this->db->delete('order_detail');
        return $result;
    }
     
}
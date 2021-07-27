<?php
class product_model extends CI_Model{
 
    function product_list(){
        $query=$this->db->get('product');
        return $query->result();
    }
 
    function save_product(){
        $data = array(
                'product_code'  => $this->input->post('product_code'),
                'product_name'  => $this->input->post('product_name'),
                'product_price'  => $this->input->post('product_price')
            );

        $result=$this->db->insert('product',$data);
        return $this->db->insert_id();
    }
 
    function update_product(){
        $product_code=$this->input->post('product_code');
        $product_name=$this->input->post('product_name');
        $product_price=$this->input->post('product_price');

        $array = array('product_code' => $product_code);
 
        $this->db->set('product_name', $product_name);
        $this->db->set('product_price', $product_price);
        $this->db->where($array);
        $result=$this->db->update('product');
        return $result;
    }
 
    function delete_product(){
        $product_code=$this->input->post('product_code');
        $array = array('product_code' => $product_code);

        $this->db->where($array);
        $result=$this->db->delete('product');
        return $result;
    }
     
}
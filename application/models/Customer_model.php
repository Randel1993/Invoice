<?php
class Customer_model extends CI_Model{
 
    function customer_list(){
        $query=$this->db->get('customer');
        return $query->result();
    }
 
    function save_customer(){
        $data = array(
                'customer_id'  => $this->input->post('customer_id'),
                'customer_name'  => $this->input->post('customer_name')
            );

        $result=$this->db->insert('customer',$data);
        return $this->db->insert_id();
    }
 
    function update_customer(){
        $customer_id=$this->input->post('customer_id');
        $customer_name=$this->input->post('customer_name');

        $array = array('customer_id' => $customer_id);
 
        $this->db->set('customer_name', $customer_name);
        $this->db->where($array);
        $result=$this->db->update('customer');
        return $result;
    }
 
    function delete_customer(){
        $customer_code=$this->input->post('customer_code');
        $array = array('customer_code' => $customer_code);

        $this->db->where($array);
        $result=$this->db->delete('customer');
        return $result;
    }
     
}
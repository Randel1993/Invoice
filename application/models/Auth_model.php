<?php
class Auth_model extends CI_Model {
    // Declaration of a variables
    private $_userID;
    private $_userName;
    private $_firstName;
    private $_lastName;
    private $_email;
    private $_password;
    private $_contactNo;
    private $_address;
    private $_dob;
    private $_verificationCode;
    private $_timeStamp;
    private $_status;
 
    //Declaration of a methods
    public function setUserID($userID) {
        $this->_userID = $userID;
    }
 
    public function setUserName($userName) {
        $this->_userName = $userName;
    }
 
    public function setPassword($password) {
        $this->_password = $password;
    }
 
    public function setFirstname($firstName) {
        $this->_firstName = $firstName;
    }
 
    public function setLastName($lastName) {
        $this->_lastName = $lastName;
    }
 
    public function setEmail($email) {
        $this->_email = $email;
    }
 
    public function setContactNo($contactNo) {
        $this->_contactNo = $contactNo;
    }
 
 
    public function setAddress($address) {
        $this->_address = $address;
    }
 
    public function setDOB($dob) {
        $this->_dob = $dob;
    }
 
    public function setVerificationCode($verificationCode) {
        $this->_verificationCode = $verificationCode;
    }
 
    public function setTimeStamp($timeStamp) {
        $this->_timeStamp = $timeStamp;
    }
 
    public function setStatus($status) {
        $this->_status = $status;
    }
 
    //create new user
    public function create() {
        $hash = $this->hash($this->_password);
        $data = array(
            'user_name' => $this->_userName,
            'first_name' => $this->_firstName,
            'last_name' => $this->_lastName,
            'email' => $this->_email,
            'password' => $hash,
            'contact_no' => $this->_contactNo,
            'address' => $this->_address,
            'dob' => $this->_dob,
            'verification_code' => $this->_verificationCode,
            'created_date' => $this->_timeStamp,
            'modified_date' => $this->_timeStamp,
            'status' => $this->_status
        );
        $this->db->insert('users', $data);
        if (!empty($this->db->insert_id()) && $this->db->insert_id() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
       
    // login method and password verify
    function login() {
        $this->db->select('id as user_id, user_name, email, first_name, password');
        $this->db->from('users');
        $this->db->where('email', $this->_userName);
        $this->db->where('verification_code', 1);
        $this->db->where('status', 1);
        //{OR}
        $this->db->or_where('user_name', $this->_userName);
        $this->db->where('verification_code', 1);
        $this->db->where('status', 1);
        $this->db->limit(1);
        $query = $this->db->get();
        if ($query->num_rows() == 1) {
            $result = $query->result();
            foreach ($result as $row) {
                if ($this->verifyHash($this->_password, $row->password) == TRUE) {
                    return $result;
                } else {
                    return FALSE;
                }
            }
        } else {
            return FALSE;
        }
    }
    
    // password hash
    public function hash($password) {
        $hash = password_hash($password, PASSWORD_DEFAULT);
        return $hash;
    }
 
    // password verify
    public function verifyHash($password, $vpassword) {
        if (password_verify($password, $vpassword)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
 
    // generate Unique Username
    public function generateUniqueUserName($tableName, $string, $field, $key = NULL, $value = NULL) {
        $slug = $this->cleanUserName($string);
        $i = 0;
        $params = array();
        $params[$field] = $slug;
        if ($key)
            $params["$key !="] = $value;
        while ($this->db->where($params)->get($tableName)->num_rows()) {
            if (!preg_match('/[0-9]+$/', $slug))
                $slug .= '' . ++$i;
            else
                $slug = preg_replace('/[0-9]+$/', ++$i, $slug);
            $params [$field] = $slug;
        }
        return $slug;
    }
 
    // clean Username
    public function cleanUserName($string) {
        //Lower case everything
        $string = strtolower(trim($string));
        //Make alphanumeric (removes all other characters)
        $string = preg_replace("/[^a-z0-9_\s-]/", "", $string);
        //Clean up multiple dashes or whitespaces
        $string = preg_replace("/[\s-]+/", " ", $string);
        //Convert whitespaces and underscore to dash
        $string = preg_replace("/[\s_]/", "", $string);
        $string = rtrim($string, '');
        return $string;
    }
 
}
 
?>
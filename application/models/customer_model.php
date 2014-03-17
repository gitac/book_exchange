<?php

class Customer_model extends CI_Model {
    
    function updateMailCheck($username){
        
        $data = array(
            'customer_status' => "active"
            );
        $this->db->where('customer_username',$username);
        $this->db->update('customer',$data);

        $this->db->where('customer_username', $username);
        
        $query = $this->db->get('customer');

        if($query->num_rows == 1){
            $q = $query->row();
            return $q->customer_id;
        }
    }

    function insertCustomerInfo($username, $password, $email){
        $new_member_insert_data = array(
            'customer_username' => $username,
            'customer_email' => $email,
            'customer_password' => md5($password),
            'customer_status' => "pending"
        );

        $insert = $this->db->insert('customer',$new_member_insert_data );
        return $insert;
    }
    function checkPassword($username, $password) {
        $this->db->select('*');
        $this->db->from('customer');
        $this->db->where('customer_username', $username);
        $this->db->where('customer_password', $password);

        $query = $this->db->get();

        if ($query->num_rows() == 1) {
            return $query->result();
        } else {
            return false;
        }
    }
    
    function checkValidUser($username, $password){
        $this->db->select('*');
        $this->db->from('customer');
        $this->db->where('customer_username', $username);
        $this->db->where('customer_password', $password);
        $this->db->where('customer_status', "active");
        $query = $this->db->get();

        if ($query->num_rows() == 1) {
            return $query->result();
        } else {
            return false;
        }
    }

    function updatePw($email, $password) {
        $data = array(
            'customer_password' => $password
        );

        $this->db->where('customer_email', $email);
        $this->db->update('customer', $data);
    }

    function getUserID($username, $password) {
        $this->db->select('customer_id');
        $this->db->from('customer');
        $this->db->where('customer_username', $username);
        $this->db->where('customer_password', $password);

        $query = $this->db->get();

        if ($query->num_rows() == 1) {
            foreach ($query->result_array() as $row) {
                return $row;
            }
        } else {
            return NULL;
        }
    }

    function checkUsername($username) {
        $this->db->select('*');
        $this->db->from('customer');
        $this->db->where('customer_username', $username);
        $query = $this->db->get();

        if ($query->num_rows() == 1) {
            return $query->result();
        } else {
            return false;
        }
    }

    function checkEmail($email) {
        $this->db->select('*');
        $this->db->from('customer');
        $this->db->where('customer_email', $email);
        $query = $this->db->get();

        if ($query->num_rows() == 1) {
            return $query->result();
        } else {
            return false;
        }
    }

}

?>

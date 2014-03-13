<?php

class Customer_model extends CI_Model {

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

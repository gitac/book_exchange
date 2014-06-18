<?php

class Customer_model extends CI_Model {

    function detailInboxMsg($sender_id,$receiver_id){
             
                $query = $this->db->query("SELECT * 
                FROM msg, customer
                WHERE receiver_id = '". $receiver_id. "'
                AND sender_id = '". $sender_id. "'
                AND  sender_id = customer_id
                ORDER BY msg_time DESC");
        
                if ($query->num_rows >= 1) {
            foreach ($query->result_array() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        else
            return null;
    }


    function detailOutboxMsg($id,$receiver_id){
        
                $query = $this->db->query("SELECT * 
                FROM msg, customer
                WHERE receiver_id = '". $receiver_id. "'
                AND sender_id = '". $id. "'
                AND  receiver_id = customer_id
                ORDER BY msg_time DESC");
        
                if ($query->num_rows >= 1) {
            foreach ($query->result_array() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        else
            return null;
    }

    function getAllReceivemsg($id) {
        $query = $this->db->query("SELECT * 
                FROM msg, customer
                WHERE sender_id
                IN (

                SELECT DISTINCT (
                sender_id
                )
                FROM msg
                WHERE receiver_id = '". $id. "'
                ORDER BY msg_time DESC
                )
                AND receiver_id = '". $id. "'
                AND sender_id = customer_id
                GROUP BY sender_id");

        if ($query->num_rows >= 1) {
            foreach ($query->result_array() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        else
            return null;
    }

    function getAllSendmsg($id) {
        
        $query = $this->db->query("SELECT * 
                FROM msg, customer
                WHERE receiver_id
                IN (
                SELECT DISTINCT (receiver_id)
                FROM msg
                WHERE sender_id = '". $id. "'
                ORDER BY msg_time DESC
                )
                AND sender_id = '". $id. "'
                AND  receiver_id = customer_id
                GROUP BY  receiver_id");
        
                if ($query->num_rows >= 1) {
            foreach ($query->result_array() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        else
            return null;
        
    }

    function msg($msg, $sender_id, $receiver_id) {
        $new_msg_insert_data = array(
            'msg_details' => $msg,
            'sender_id' => $sender_id,
            'receiver_id' => $receiver_id
        );

        $this->db->insert('msg', $new_msg_insert_data);
    }

    function updateMailCheck($username) {

        $data = array(
            'customer_status' => "active"
        );
        $this->db->where('customer_username', $username);
        $this->db->update('customer', $data);

        $this->db->where('customer_username', $username);

        $query = $this->db->get('customer');

        if ($query->num_rows == 1) {
            $q = $query->row();
            return $q->customer_id;
        }
    }

    function getCustomerInfo($id) {
        $this->db->select('*');
        $this->db->from('customer');
        $this->db->where('customer_id', $id);

        $query = $this->db->get();

        if ($query->num_rows() == 1) {
            foreach ($query->result_array() as $row) {
                $data[] = $row;
                return $data;
            }
        } else {
            return NULL;
        }
    }

    function getNearAreaId($selected_neighborhood) {
        $this->db->select('near_area_id');
        $this->db->from('near_area');
        $this->db->where('near_area_name', $selected_neighborhood);
        $query = $this->db->get();

        if ($query->result() > 0) {
            foreach ($query->result() as $row) {
                $id = $row->near_area_id;
            }
        }
        return $id;
    }

    function getInsId($institute, $ins_name) {
        $this->db->select('institute_id');
        $this->db->from('institute');
        $this->db->where('institute_type', $institute);
        $this->db->where('institute_name', $ins_name);
        $query = $this->db->get();
        $id = NULL;
        if ($query->result() > 0) {
            foreach ($query->result() as $row) {
                $id = $row->institute_id;
                return $id;
            }
        } if ($id == NULL) {
            $new_institute_insert_data = array(
                'institute_type' => $institute,
                'institute_name' => $ins_name
            );

            $this->db->trans_start();
            $this->db->insert('institute', $new_institute_insert_data);
            $insert_id = $this->db->insert_id();
            $this->db->trans_complete();
            return $insert_id;
        }
    }

    function getProPic($cid) {
        $this->db->select('customer_photo');
        $this->db->from('customer');
        $this->db->where('customer_id', $cid);
        $query = $this->db->get();
        if ($query->result() > 0) {
            foreach ($query->result() as $row) {
                $title = $row->customer_photo;
            }
        }
        return $title;
    }

    function insertProInfo($f_name, $l_name, $gender, $phone, $selected_neighborhood, $address, $institute, $ins_name, $about_me, $interests, $image_path, $u_id) {

        //$n_id
        $n_id = $this->getNearAreaId($selected_neighborhood);
        //i_id
        $i_id = $this->getInsId($institute, $ins_name);
        $new_member_insert_data = array(
            'customer_first_name' => $f_name,
            'customer_last_name' => $l_name,
            'customer_gender' => $gender,
            'customer_about_me' => $about_me,
            'customer_interest' => $interests,
            'customer_photo' => $image_path,
            'customer_phn_no' => $phone,
            'customer_near_area_id' => $n_id,
            'customer_address' => $address,
            'customer_ins_id' => $i_id,
            'user_type' => "customer"
        );
        $this->db->where('customer_id', $u_id);
        $this->db->update('customer', $new_member_insert_data);
    }

    function insertCustomerInfo($username, $password, $email) {
        $new_member_insert_data = array(
            'customer_username' => $username,
            'customer_email' => $email,
            'customer_password' => md5($password),
            'customer_status' => "pending"
        );

        $insert = $this->db->insert('customer', $new_member_insert_data);
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

    function checkValidUser($username, $password) {
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
            'customer_password' => md5($password)
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

    function getUserType($username, $password) {
        $this->db->select('user_type');
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

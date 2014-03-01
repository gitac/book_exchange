<?php

class Book_model extends CI_Model {

    function getFullBookList() {
        $this->db->select('*');


        $this->db->from('BOOK');
        // $this->db->order_by("CATEGORY_NAME");

        $query = $this->db->get();
        if ($query->num_rows >= 1) {
            foreach ($query->result_array() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        else
            return null;
    }

    function getMostlyViewedBookList() {
        $this->db->select('*');
        $this->db->from('BOOK');
        $this->db->order_by("book_view_count");
        $query = $this->db->get();
        if ($query->num_rows >= 1) {
            foreach ($query->result_array() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        else
            return null;
    }

}

?>

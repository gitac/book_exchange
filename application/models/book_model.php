<?php

class Book_model extends CI_Model {

    function getFullRecentlyAddedBookList() {
        $this->db->select('*');
        $this->db->from('author_book');
        $this->db->join('author', 'author.author_id = author_book.a_id');
        $this->db->join('book', 'book.book_id = author_book.b_id');
        $this->db->order_by("date_time");
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
        $this->db->from('author_book');
        $this->db->join('author', 'author.author_id = author_book.a_id');
        $this->db->join('book', 'book.book_id = author_book.b_id');
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
    function getAllBookList($cid){
        $this->db->select('*');
        $this->db->from('book');
        
        $this->db->join('category', 'category.category_id = book.book_id');
        $this->db->join('author_book', 'book.book_id = author_book.b_id');
        $this->db->join('author', 'author.author_id = author_book.a_id');
        $this->db->where('book.b_category_id', $cid);
        $this->db->order_by("date_time");
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

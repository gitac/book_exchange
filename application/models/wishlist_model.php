<?php

class Wishlist_model extends CI_Model {

    function getWishlistBook($id) {

        $this->db->select('*');
        $this->db->from('book_info');
        $this->db->join('author_book', 'book_info.book_id = author_book.b_id');
        $this->db->join('author', 'author.author_id = author_book.a_id');
        $this->db->join('wishlist', 'wishlist.w_book_id = book_info.book_id');
        $this->db->where('wishlist.w_customer_id', $id);
        $this->db->order_by("w_book_id");
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
    
    function getWishlistBookInfo($wid){
        $query = $this->db->query("SELECT * 
FROM wishlist, book_info
WHERE wishlist_id =$wid
                and book_id = w_book_id");
        if ($query->num_rows >= 1) {
            foreach ($query->result_array() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        else
            return NULL;
    }

    function getWishlistBookDetail($wid) {
//        $this->db->select('*');
//        $this->db->from('book_info');
//        $this->db->join('author_book', 'book_info.book_id = author_book.b_id');
//        $this->db->join('author', 'author.author_id = author_book.a_id');
//        $this->db->join('wishlist', 'wishlist.w_book_id = book_info.book_id');
//        $this->db->join('post', 'post_book_id = wishlist.w_book_id');
//        $this->db->where('wishlist.wishlist_id', $wid);
        // $this->db->order_by("book_name");

        $query = $this->db->query("SELECT * 
FROM post, book_info, author_book, author, wishlist
WHERE w_book_id = book_id
AND book_id = b_id
AND author_id = a_id
AND post_book_id = w_book_id
AND wishlist_id =$wid
                order by post_id");
        if ($query->num_rows >= 1) {
            foreach ($query->result_array() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        else
            return NULL;
    }

    function getBookDetails($bid) {

        $this->db->select('*');
        $this->db->from('book_info');
        $this->db->join('author_book', 'book_info.book_id = author_book.b_id');
        $this->db->join('author', 'author.author_id = author_book.a_id');
        $this->db->join('wishlist', 'wishlist.w_book_id = book_info.book_id');
        $this->db->where('wishlist.w_book_id', $bid);
        $this->db->order_by("book_name");
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

    function insertBookInfo($book_id, $id) {

        $data = array(
            'w_book_id' => $book_id,
            'w_customer_id' => $id
        );

        $this->db->insert('wishlist', $data);
    }

}

?>

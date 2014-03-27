<?php

class Wishlist_model extends CI_Model {
    
    function getWishlistBook($id){
    
        $this->db->select('*');
        $this->db->from('book_info');
        $this->db->join('author_book', 'book_info.book_id = author_book.b_id');
        $this->db->join('author', 'author.author_id = author_book.a_id');
        $this->db->join('wishlist', 'wishlist.w_book_id = book_info.book_id');        
        $this->db->where('wishlist.w_customer_id', $id);        
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
    
    function getWishlistBookDetail($id,$bid) {
        $this->db->select('*');
        $this->db->from('book_info');
        $this->db->join('author_book', 'book_info.book_id = author_book.b_id');
        $this->db->join('author', 'author.author_id = author_book.a_id');
        $this->db->join('wishlist', 'wishlist.w_book_id = book_info.book_id');        
        $this->db->where('wishlist.w_customer_id', $id);
         $this->db->where('wishlist.w_book_id', $bid);
       // $this->db->order_by("book_name");
        $query = $this->db->get();
        if ($query->num_rows >= 1) {
            foreach ($query->result_array() as $row) {
                $data[] = $row;
            }
            return $data;
        
    }
    function getBookDetails($bid){
            
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
        
    function insertBookInfo($book_id,$id) {
             
              $data= array(
             'w_book_id' => $book_id,
             'w_customer_id' => $id
         );
                    
        $insert = $this->db->insert('wishlist',$data);
        return $insert;
    }
    
        function getBookId($book_name, $cateogry_id) {
        $this->db->select('book_id');
        $this->db->from('book_info');
        $this->db->where('book_category_id', $cateogry_id);
        $this->db->where('book_name', $book_name);
        
        $query = $this->db->get();
        $id = NULL;
        if ($query->result() > 0) {
            foreach ($query->result() as $row) {
                $id = $row->book_id;
            }
            return $id;
        } else {
            $new_book_insert_data = array(
                'book_category_id' => $cateogry_id,
                'book_name' => $book_name
            );

            $this->db->trans_start();
            $this->db->insert('book_info', $new_book_insert_data);
            $insert_id = $this->db->insert_id();
            $this->db->trans_complete();
            return $insert_id;
        }
    }
}
}
?>

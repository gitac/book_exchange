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
    
    
    
    function book($cid , $bname){
        $this->db->select('book_id');
        $this->db->from('book_info');
        $this->db->where('book_category_id',$cid);
        $this->db->where('book_name',$bname);
        $query = $this->db->get();
        
      if ($query->num_rows >= 1) {
            foreach ($query->result_array() as $row) {
                $data[] = $row;
            }
            return $data;
        }
    }

    function addBook($book_name,$cid) {
        $data = array(
            'book_name' => $book_name,
            'book_category_id' => $cid
        );
        $this->db->insert('book_info',$data);
    }
    
    function getBookId($param) {
        
    }
    
    function insertBookInfo($book_name,$id,$cid) {
         
        $this->db->select('*');
        $this->db->from('book_info');
        $this->db->where('book_category_id',$cid);
        $this->db->where('book_name',$book_name);
        $query = $this->db->get();
        
      if ($query->num_rows >= 1) {
            foreach ($query->result_array() as $row) {
               
              $data= array(
             'w_book_id' => $row->book_id,
             'w_customer_id' => $id
         );
            }
      }
         
        $insert = $this->db->insert('wishlist',$data);
        return $insert;
    }
}
}
?>

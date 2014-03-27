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
    
    function getCategoryId($selected_category){
        $this->db->select('*');
        $this->db->from('category');
        $this->db->where('category_name',$selected_category);
        $query = $this->db->get();
        
        if($query->num_rows() == 1){
            foreach ($query->result_array() as $row) {
                return $row->category_id;
            }
    
}
       
    }
    
    function book($cid , $bname){
        $this->db->select('book_id');
        $this->db->from('book_info');
        $this->db->where('book_category_id',$cid);
        $this->db->where('book_name',$bname);
        $query = $this->db->get();
        
       return $query->result();
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
    
    function insertBookInfo($book_id,$image,$id) {
         $bookinfo = array(
            'w_customer_id' => $id,
            'w_book_id' => $book_id,
            
            'w_book_image'=> $image
        );
        $insert = $this->db->insert('wishlist',$bookinfo);
        return $insert;
    }
}

?>

<?php

class Post_model extends CI_Model {
    
        function getBookName($bookid) 
    {
        
        $this->db->select('book_name');
        $this->db->from('book_info');
        $this->db->where('book_id',$bookid);
     
                     
        $query = $this->db->get();
        
             
        if ($query->result() > 0) {
            foreach ($query->result_array() as $row) {
                $data[]=$row;
                
            }
        }
        
        
        return $data;                
    }
    
    function getPostList() {
        
        $p_status="pending";
        $this->db->select('*');
        $this->db->from('post');
        $this->db->where('post_status',$p_status);
        
        $query = $this->db->get();
        if ($query->num_rows >= 1) {
            foreach ($query->result_array() as $row) {
                $data[] = $row;
                
                
            }
              return $data;
        }
      
    }
    
    function getBookNames($p_status) {
        
         $this->db->select('book_name');
        $this->db->from('book_info');
        $this->db->join('post', 'post.post_book_id = book_info.book_id');
        $this->db->where('post.post_status', $p_status);
        $query = $this->db->get();
        if ($query->result() >=1 ) {
            foreach ($query->result_array() as $row) {
                $title[] = $row;
            }
         
        }
           return $title;
    }
    
    
    function getBookId($pid) 
    {
        $this->db->select('post_book_id');
        $this->db->from('post');     
        $this->db->where( 'post_id', $pid);

        
        
        $query = $this->db->get();
        if ($query->result() > 0) {
            foreach ($query->result() as $row) {
                $post_book_id = $row->post_book_id;
            }
        }
        return $post_book_id;
    }
    
    function getCategoryId($bookid) 
    {
        $this->db->select('book_category_id');
        $this->db->from('book_info');
        $this->db->where('book_id',$bookid);
     
                     
        $query = $this->db->get();
        
             
        if ($query->result() > 0) {
            foreach ($query->result() as $row) {
                $book_c_id=$row->book_category_id;
                
            }
        }
        
    return $book_c_id;    
    }
    
    
    function getCategoryName($c_id) 
    {
        $this->db->select('category_name');
        $this->db->from('category');
        $this->db->where('category_id',$c_id);
     
                     
        $query = $this->db->get();
        
             
        if ($query->result() > 0) {
            foreach ($query->result_array() as $row) {
                $data[]=$row;
           
            }
        }
        
        
        return $data;                
    }
    
    
    function getAuthorId($bookid) 
    {
        $this->db->select('a_id');
        $this->db->from('author_book');
        $this->db->where('b_id',$bookid);
     
                     
        $query = $this->db->get();
        
             
        if ($query->result() > 0) {
            foreach ($query->result() as $row) {
                $book_a_id=$row->a_id;
                
            }
        }
        
    return $book_a_id;   
    }
    
    
    function getAuthorName($a_id) 
    {
      $this->db->select('author_name');
        $this->db->from('author');
        $this->db->where('author_id',$a_id);
     
                     
        $query = $this->db->get();
        
             
        if ($query->result() > 0) {
            foreach ($query->result_array() as $row) {
                $data[]=$row;
           
            }
        }
        
        
        return $data;    
    }
    
    function getBookEdition($pid) 
    {
        $this->db->select('*');
        $this->db->from('post');     
        $this->db->where( 'post_id', $pid);

        
        
        $query = $this->db->get();
        
         if ($query->result() > 0) {
            foreach ($query->result_array() as $row) {
                $data[]=$row;
           
            }
        }       
        
        return $data;
       
    }
    
    
    function adGiverId($pid) 
    {
        $this->db->select('post_ad_giver_id');
        $this->db->from('post');
        $this->db->where('post_id',$pid);
     
                     
        $query = $this->db->get();
        
             
        if ($query->result() > 0) {
            foreach ($query->result() as $row) {
                $post_giver_id=$row->post_ad_giver_id;
                
            }
        }
        
    return $post_giver_id;
    }
    
    
    function postGiverDetail($post_giver_id) 
    {
        
        $this->db->select('*');
        $this->db->from('ad_giver');     
        $this->db->where( 'ad_giver_id', $post_giver_id);

        
        
        $query = $this->db->get();
        
         if ($query->result() > 0) {
            foreach ($query->result_array() as $row) {
                $data[]=$row;
           
            }
        }       
        
        return $data;
       
    }
    
    function getLocationName($giver_id) 
    {
         $this->db->select('division_name');
        $this->db->from('division');     
       $this->db->join('ad_giver', 'ad_giver_div_id = division_id');

        
        
        $query = $this->db->get();
        
         if ($query->result() > 0) {
            foreach ($query->result_array() as $row) {
                $data[]=$row;
           
            }
        }       
        
        return $data;
       
    }
    
    function getInstituteName($giver_id) 
    {
       $this->db->select('institute_name');
       $this->db->from('institute');     
       $this->db->join('ad_giver', 'ad_giver.ad_giver_ins_id =institute.institute_id');
       $this->db->where('ad_giver_id',$giver_id);

        
        
        $query = $this->db->get();
        
         if ($query->result() > 0) {
            foreach ($query->result_array() as $row) {
                $data[]=$row;
           
            }
        }       
        
        return $data;
       
    }
    
    
    function isStudent($pid) 
    {
        $this->db->select('ad_giver_occupation');
        $this->db->from('ad_giver');
        $this->db->where('ad_giver_id',$pid);
     
                     
        $query = $this->db->get();
        
             
        if ($query->result() > 0) {
            foreach ($query->result() as $row) {
                $is_student=$row->ad_giver_occupation;
                
            }
        }
        
    return $is_student;
    }

    
    function approveAd($post_id) 
    {
        $stat = 'active';
        $data = array(
            'post_status' => $stat 
        );
      //$new_status = "active";
      $this->db->where('post_id',$post_id);
      $this->db->update('post',$data);    
    }
    
    
    
    function rejectAd($post_id) 
    {
        $stat = 'discard';
        $data = array(
            'post_status' => $stat 
        );
      //$new_status = "active";
      $this->db->where('post_id',$post_id);
      $this->db->update('post',$data);    
    }
    
}
?>

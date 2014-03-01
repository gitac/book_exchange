<?php
class Category_model extends CI_Model{
    
 /*   function createNewPost($post_detail, $user_id, $category_id, $post_title, $date){
        
        $table_row_count = $this->db->count_all('POST');
            $data = array(
            'POST_ID' => $table_row_count + 1,   
            'POST_DETAIL' => $post_detail,
            'USER_ID' => $user_id,
            'CATEGORY_ID' => $category_id,
            'POST_TITLE' => $post_title,
            'POST_DATE'=>$date
         );
            
        $this->db->insert('POST', $data); 
    }
    
   */ 
    function getCategoryName($cid){
        $this -> db -> select('category_name');
        $this->db->from('category');
        $this->db->where('category_id', $cid);
        $query = $this->db->get();
        if ($query->result() > 0) {
            foreach ($query->result() as $row) {
                $title = $row->category_name;
            }
        }
        return $title;
    }
    function getAuthorName($aid){
        $this -> db -> select('author_name');
        $this->db->from('author');
        $this->db->where('author_id', $aid);
        $query = $this->db->get();
        if ($query->result() > 0) {
            foreach ($query->result() as $row) {
                $title = $row->author_name;
            }
        }
        return $title;
    }
    function getFullList($type){
        $this -> db -> select('*');
        
        if($type == "category"){
            $this -> db -> from('CATEGORY');
            $this->db->order_by("CATEGORY_NAME");
        } else if($type == "division"){
            $this -> db -> from('DIVISION');
            $this->db->order_by("DIVISION_NAME");
        } else if($type == "author"){
            $this -> db -> from('AUTHOR');
            $this->db->order_by("AUTHOR_NAME");
        }else {
            $this -> db -> from('INSTITUTE');
            $this->db->where('INSTITUTE_TYPE', $type);
        } 
        $query = $this->db->get();
        if ($query->num_rows >= 1){
            foreach($query->result_array() as $row){
                $data[] = $row;
            }
            return $data;
        }
        else
            return null;
    }   
    
    
    
    
}
?>

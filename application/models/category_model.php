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
    function getFullList($type){
            $this -> db -> select('*');
            $this -> db -> from('INSTITUTE');
            $this->db->where('INSTITUTE_TYPE', $type);
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

<?php

class Book_model extends CI_Model {
    
    function search($book_name, $category, $author, $campus, $district){
        if($category == 0 && $author == 0 && $campus == 0 && $district ==0 ){ //0 0 0 0
            $query = $this->db->query("SELECT * 
            FROM author, author_book, book_info, post
            WHERE post.post_book_id = book_info.book_id
            AND book_info.book_name LIKE '%" .$book_name. "%'
            AND book_info.book_id = author_book.b_id
            AND author.author_id = author_book.a_id
            AND author.author_id = author_book.a_id
            AND post.post_status =  'Active'
            ORDER BY date_time, post_id");
        } else if($category == 0 && $author == 0 && $campus == 0 && $district !=0 ){ // 0 0 0 1
            $query = $this->db->query("SELECT * 
            FROM author, author_book, book_info, post, customer, near_area, district
            WHERE post.post_book_id = book_info.book_id
            AND post.post_ad_giver_id = customer.customer_id
            AND customer_near_area_id = near_area_id
            AND near_area_dis_id = district_id
            AND district_id = ". $district ."
            AND book_info.book_name LIKE '%" .$book_name. "%'
            AND book_info.book_id = author_book.b_id
            AND author.author_id = author_book.a_id
            AND author.author_id = author_book.a_id
            AND post.post_status =  'Active'
            ORDER BY date_time, post_id");
        } else if($category == 0 && $author == 0 && $campus != 0 && $district ==0 ){//0 0 1 0
            $query = $this->db->query("SELECT * 
            FROM author, author_book, book_info, post, customer, institute
            WHERE post.post_book_id = book_info.book_id
            AND post.post_ad_giver_id = customer.customer_id
            AND customer_ins_id = institute_id
            AND institute_id = ". $campus ."
            AND book_info.book_name LIKE  '%".$book_name."%'
            AND book_info.book_id = author_book.b_id
            AND author.author_id = author_book.a_id
            AND author.author_id = author_book.a_id
            AND post.post_status =  'Active'
            ORDER BY date_time, post_id");
        }else if($category == 0 && $author == 0 && $campus != 0 && $district !=0 ){//0 0 1 1
            $query = $this->db->query("SELECT * 
            FROM author, author_book, book_info, post, customer, institute, near_area, district
            WHERE post.post_book_id = book_info.book_id
            AND post.post_ad_giver_id = customer.customer_id
            AND customer_near_area_id = near_area_id
            AND near_area_dis_id = district_id
            AND district_id = ". $district ."
            AND customer_ins_id = institute_id
            AND institute_id = ". $campus ."
            AND book_info.book_name LIKE  '%".$book_name."%'
            AND book_info.book_id = author_book.b_id
            AND author.author_id = author_book.a_id
            AND author.author_id = author_book.a_id
            AND post.post_status =  'Active'
            ORDER BY date_time, post_id");
        } else if($category == 0 && $author != 0 && $campus == 0 && $district ==0 ){//0 1 0 0
            $query = $this->db->query("SELECT * 
            FROM author, author_book, book_info, post
            WHERE post.post_book_id = book_info.book_id
            AND book_info.book_name LIKE  '%".$book_name."%'
            AND book_info.book_id = author_book.b_id
            AND author.author_id = author_book.a_id
            AND author.author_id = author_book.a_id
            AND author_id = $author
            AND post.post_status =  'Active'
            ORDER BY date_time, post_id");
        } else if($category == 0 && $author != 0 && $campus == 0 && $district !=0 ){//0 1 0 1 
            $query = $this->db->query("SELECT * 
            FROM author, author_book, book_info, post, customer, near_area, district
            WHERE post.post_book_id = book_info.book_id
            AND post.post_ad_giver_id = customer.customer_id
            AND customer_near_area_id = near_area_id
            AND near_area_dis_id = district_id
            AND district_id = $district
            AND book_info.book_name LIKE  '%".$book_name."%'
            AND book_info.book_id = author_book.b_id
            AND author.author_id = author_book.a_id
            AND author_id = $author
            AND post.post_status =  'Active'
            ORDER BY date_time, post_id");
        }else if($category == 0 && $author != 0 && $campus != 0 && $district ==0 ){//0 1 1 0 
            $query = $this->db->query("SELECT * 
            FROM author, author_book, book_info, post, customer, institute
            WHERE post.post_book_id = book_info.book_id
            AND post.post_ad_giver_id = customer.customer_id
            AND customer_ins_id = institute_id
            AND institute_id = ". $campus ."
            AND book_info.book_name LIKE  '%".$book_name."%'
            AND book_info.book_id = author_book.b_id
            AND author.author_id = author_book.a_id
            AND author_id = $author
            AND post.post_status =  'Active'
            ORDER BY date_time, post_id");
        }else if($category == 0 && $author != 0 && $campus != 0 && $district !=0 ){//0 1 1 1 
            $query = $this->db->query("SELECT * 
            FROM author, author_book, book_info, post, customer, institute, near_area, district
            WHERE post.post_book_id = book_info.book_id
            AND post.post_ad_giver_id = customer.customer_id
            AND customer_ins_id = institute_id
            AND institute_id = ". $campus ."
            AND customer_near_area_id = near_area_id
            AND near_area_dis_id = district_id
            AND district_id = ". $district ."
            AND book_info.book_name LIKE  '%".$book_name."%'
            AND book_info.book_id = author_book.b_id
            AND author.author_id = author_book.a_id
            AND author_id = $author
            AND post.post_status =  'Active'
            ORDER BY date_time, post_id");
        } // do more
        else if($category != 0 && $author == 0 && $campus == 0 && $district ==0 ){//1 0 0 0
            $query = $this->db->query("SELECT * 
            FROM author, author_book, book_info, post
            WHERE post.post_book_id = book_info.book_id
            AND book_info.book_name LIKE  '%".$book_name."%'
            AND book_info.book_id = author_book.b_id
            AND author.author_id = author_book.a_id
            AND author.author_id = author_book.a_id
            AND book_category_id = $category
            AND post.post_status =  'Active'
            ORDER BY date_time, post_id");
        }else if($category == 0 && $author != 0 && $campus != 0 && $district !=0 ){//1 1 1 1 
            $query = $this->db->query("SELECT * 
            FROM author, author_book, book_info, post, customer, institute, near_area, district
            WHERE post.post_book_id = book_info.book_id
            AND post.post_ad_giver_id = customer.customer_id
            AND customer_ins_id = institute_id
            AND institute_id = ". $campus ."
            AND customer_near_area_id = near_area_id
            AND near_area_dis_id = district_id
            AND district_id = ". $district ."
            AND book_info.book_name LIKE  '%".$book_name."%'
            AND book_info.book_id = author_book.b_id
            AND author.author_id = author_book.a_id
            AND author_id = $author
            AND book_category_id = $category
            AND post.post_status =  'Active'
            ORDER BY date_time, post_id");
        }
        if ($query->num_rows >= 1) {
            foreach ($query->result_array() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        else
            return null;
    }


    function getAllBookArea($id){
        $query = $this->db->query("SELECT * 
FROM author, author_book, book_info, post, customer
WHERE post.post_ad_giver_id = customer.customer_id
AND customer_near_area_id = " . $id . "
AND post.post_book_id = book_info.book_id
AND book_info.book_id = author_book.b_id
AND author.author_id = author_book.a_id
AND author.author_id = author_book.a_id
AND post.post_status =  'Active'
ORDER BY date_time, post_id");
        if ($query->num_rows >= 1) {
            foreach ($query->result_array() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        else
            return null;
    }
    
    function insertBookInfo($book_id,$image_path, $id) {

            $data = array(
                'w_book_id' => $book_id,
                'w_book_image'=>$image_path,
                'w_customer_id' => $id
            );

            $this->db->insert('wishlist', $data);
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
        }
        return $id;
    }

    function getAuthorId($author_name) {

        $this->db->select('author_id');
        $this->db->from('author');
        $this->db->where('author_name', $author_name);

        $query = $this->db->get();
        $id = NULL;
        if ($query->result() > 0) {
            foreach ($query->result() as $row) {
                echo $id = $row->author_id;
                return $id;
            }
        } if ($id == NULL) {
            $new_author_insert_data = array(
                'author_name' => $author_name
            );


            $q = $this->db->insert('author', $new_author_insert_data);
            echo $id = $this->db->insert_id();

            return $id;
        }
    }

    function getBookIdAfterInsert($book_name, $c_id) {

        $new_book_insert_data = array(
            'book_category_id' => $c_id,
            'book_name' => $book_name
        );

        $this->db->trans_start();
        $this->db->insert('book_info', $new_book_insert_data);
        $id = $this->db->insert_id();
        $this->db->trans_complete();
        return $id;
    }
   
    
    

    function getAuthorIdAfterInsert($author_name) {

        $new_author_insert_data = array(
            //'book_category_id' => $c_id,
            'author_name' => $author_name
        );

        $this->db->trans_start();
        $this->db->insert('author', $new_author_insert_data);
        $id = $this->db->insert_id();
        $this->db->trans_complete();
        return $id;
    }
    
    
    function insertAuthorBook($bid, $aid) {
        $a_b_insert_data = array(
            'b_id' => $bid,
            'a_id' => $aid
        );

        $this->db->insert('author_book', $a_b_insert_data);
    }

    function insertPost($book_name, $c_id, $author_name1, $author_name2, $author_name3, $author_name4, $author_name5, $edition, $book_des, $book_price, $image_path, $u_id) {
        $b_id = $this->getBookId($book_name, $c_id);
        if ($b_id == NULL) {
            $b_id = $this->getBookIdAfterInsert($book_name, $c_id);
            $a_id_1 = $this->getAuthorId($author_name1);
            $this->insertAuthorBook($b_id, $a_id_1);
            if ($author_name2 != NULL && $author_name2 != "") {
                $a_id_2 = $this->getAuthorId($author_name2);
                $this->insertAuthorBook($b_id, $a_id_2);
                if ($author_name3 != NULL && $author_name3 != "") {
                    $a_id_3 = $this->getAuthorId($author_name3);
                    $this->insertAuthorBook($b_id, $a_id_3);
                    if ($author_name4 != NULL && $author_name4 != "") {
                        $a_id_4 = $this->getAuthorId($author_name4);
                        $this->insertAuthorBook($b_id, $a_id_4);
                    }
                    if ($author_name5 != NULL && $author_name5 != "") {
                        $a_id_5 = $this->getAuthorId($author_name5);
                        $this->insertAuthorBook($b_id, $a_id_5);
                    }
                }
            }
        }
        $new_post_insert_data = array(
            'post_book_id' => $b_id,
            'post_book_edition' => $edition,
            'post_book_price' => $book_price,
            'post_ad_giver_id' => $u_id,
            'post_view_count' => 0,
            'post_image' => $image_path,
            'post_description' => $book_des,
            'post_status' => "pending"
        );

        $insert = $this->db->insert('post', $new_post_insert_data);
    }

    function getRequestCount($u_id) {
        $query = $this->db->query("SELECT post_id
        FROM post, post_request
        WHERE post_req_p_id = post_id
        AND post_ad_giver_id = " . $u_id . "
        AND post_status =  'active'
        ORDER BY date_time DESC , post_id");

        if ($query->num_rows >= 1) {
            foreach ($query->result_array() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        else
            return null;
    }

    function getAllPostList($status, $u_id) {

        $query = $this->db->query("SELECT * 
        FROM post, book_info, author_book, author, customer
        WHERE post_book_id = book_id
        AND post_ad_giver_id = customer_id
        AND book_id = b_id
        AND author_id = a_id
        AND customer_id = " . $u_id . "
        AND post_status =  '" . $status . "'
        ORDER BY date_time DESC, post_id");
        if ($query->num_rows >= 1) {
            foreach ($query->result_array() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        else
            return null;
    }

    function remove_wishlist($w_id){
        
        $this->db->where('w_book_id', $w_id);
        $this->db->delete('wishlist');
    }
    
    function remove_ad($post_id){
        $data = array(
            'post_status' => "removed"
        );
        $this->db->where('post_id', $post_id);
        $this->db->update('post', $data);
    }
    
    function delete_ad($post_id){
        $data = array(
            'post_status' => "deleted"
        );
        $this->db->where('post_id', $post_id);
        $this->db->update('post', $data);
    }
    
    function RequestedUser($p_id) {
        $query = $this->db->query("SELECT * 
        FROM customer, near_area, district, division, institute
        WHERE customer_id
        IN (
        SELECT post_req_c_id
        FROM post_request
        WHERE post_req_p_id =" . $p_id . " )
        AND customer.customer_near_area_id = near_area.near_area_id
        AND near_area.near_area_dis_id = district.district_id
        AND district.district_div_id = division.division_id
        AND customer.customer_ins_id = institute.institute_id
");
        if ($query->num_rows >= 1) {
            foreach ($query->result_array() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        else
            return null;
    }

    function insertRequest($pid, $cid) {
        $req_insert_data = array(
            'post_req_p_id' => $pid,
            'post_req_c_id' => $cid
        );

        $insert = $this->db->insert('post_request', $req_insert_data);
    }

    function deleteRequest($pid, $cid) {
        $this->db->where('post_req_p_id', $pid);
        $this->db->where('post_req_c_id', $cid);
        $this->db->delete('post_request');
    }

    function getNumberOfRequest($pid) {
        $query = $this->db->query("
            SELECT COUNT(*) as num_req
            FROM post_request
            WHERE post_request.post_req_p_id = " . $pid);
        $num_req = NULL;
        if ($query->result() > 0) {
            foreach ($query->result() as $row) {
                $num_req = $row->num_req;
            }
        }
        return $num_req;
    }

    function isRequested($pid, $c_id) {
        $query = $this->db->query("
            SELECT *
            FROM post_request
            WHERE post_request.post_req_c_id = " . $c_id .
                " AND post_request.post_req_p_id = " . $pid);
        $num_req = NULL;
        if ($query->result() > 0) {
            foreach ($query->result() as $row) {
                $num_req = "yes";
            }
        }
        return $num_req;
    }

    function getBookInfo($bid) {
        $query = $this->db->query("SELECT * 
        FROM author, author_book, book_info, post, category, customer, near_area, district, division,institute
        WHERE post.post_book_id = book_info.book_id
        AND post.post_ad_giver_id = customer.customer_id
        AND book_info.book_category_id = category.category_id
        AND book_id = b_id
        AND author_id = a_id
        AND post_id = " . $bid . "
        AND customer.customer_near_area_id = near_area.near_area_id
        AND near_area.near_area_dis_id = district.district_id
        AND district.district_div_id = division.division_id
        AND customer.customer_ins_id = institute.institute_id
        AND post_status =  'active'");
        if ($query->num_rows >= 1) {
            foreach ($query->result_array() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        else
            return null;
    }

    function getBookName($id) {
        $this->db->select('book_name');
        $this->db->from('book_info');
        $this->db->join('post', 'post.post_book_id = book_info.book_id');
        $this->db->where('post.post_id', $id);
        $query = $this->db->get();
        if ($query->result() > 0) {
            foreach ($query->result() as $row) {
                $title = $row->book_name;
            }
        }
        return $title;
    }

    function getFullRecentlyAddedBookList() { //ok
        $this->db->select('*');
        $this->db->from('author_book');
        $this->db->join('book_info', 'book_info.book_id = author_book.b_id');
        $this->db->join('author', 'author.author_id = author_book.a_id');
        //   $this->db->join('author', 'author.author_id = author_book.a_id');
        // $this->db->join('book_info', 'book_info.book_id = author_book.b_id');
        $this->db->join('post', 'post.post_book_id = book_info.book_id');
        //   $this->db->join('author', 'author.author_id = author_book.a_id');
        // $this->db->join('book', 'book.book_id = author_book.b_id');
        $this->db->where('post.post_status', 'Active');
        $this->db->order_by("date_time");
        $this->db->order_by("post_id");
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

    function getMostlyViewedBookList() { //ok
        $this->db->select('*');
        $this->db->from('author_book');
        $this->db->join('author', 'author.author_id = author_book.a_id');
        $this->db->join('book_info', 'book_info.book_id = author_book.b_id');
        $this->db->join('post', 'post.post_book_id = book_info.book_id');
        //  $this->db->join('author', 'author.author_id = author_book.a_id');
        //$this->db->join('book', 'book.book_id = author_book.b_id');
        $this->db->where('post.post_status', 'Active');
        $this->db->order_by("post_view_count DESC");
        $this->db->order_by("post_id");
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

    function getAllBookList($cid) { //ok
        $this->db->select('*');
        $this->db->from('book_info');
        $this->db->join('post', 'post.post_book_id = book_info.book_id');
        $this->db->join('author_book', 'book_info.book_id = author_book.b_id');
        $this->db->join('author', 'author.author_id = author_book.a_id');

        $this->db->join('category', 'category.category_id = book_info.book_category_id');
        // $this->db->join('category', 'category.category_id = book.book_id');
        //$this->db->join('author_book', 'book.book_id = author_book.b_id');
        //$this->db->join('author', 'author.author_id = author_book.a_id');
        $this->db->where('book_info.book_category_id', $cid);
        $this->db->where('post.post_status', 'Active');
        $this->db->order_by("date_time");
        $this->db->order_by("post_id");

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

    function getAuthorAllBookList($aid) {
        $this->db->select('*');
        $this->db->from('book_info');
        //   $this->db->join('author_book', 'book_info.book_id = author_book.b_id');
        // $this->db->join('author', 'author.author_id = author_book.a_id');
        $this->db->join('post', 'post.post_book_id = book_info.book_id');
        $this->db->join('category', 'category.category_id = book_info.book_category_id');
        //  $this->db->join('author_book', 'book.book_id = author_book.b_id');
        // $this->db->join('author', 'author.author_id = author_book.a_id');
        $this->db->where('author.author_id', $aid);
        $this->db->where('post.post_status', 'Active');
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

    function getAllBooks() { //ok
        $this->db->select('*');
        $this->db->from('book_info');
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

    function getAllBookNameList($name) { //ok
        $this->db->select('*');
        $this->db->from('book_info');
        $this->db->join('author_book', 'book_info.book_id = author_book.b_id');
        $this->db->join('author', 'author.author_id = author_book.a_id');
        $this->db->join('post', 'post.post_book_id = book_info.book_id');
        $this->db->join('category', 'category.category_id = book_info.book_category_id');
        //  $this->db->join('author_book', 'book.book_id = author_book.b_id');
        // $this->db->join('author', 'author.author_id = author_book.a_id');
        $this->db->where('book_info.book_name', $name);
        $this->db->where('post.post_status', 'Active');
        $this->db->order_by("date_time");
        $this->db->order_by("post_id");
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

    function getAllBookAuthorList($name) { //ok
        $query = $this->db->query("SELECT * 
FROM author, author_book, book_info, post
WHERE book_id = ( 
SELECT book_id
FROM author, author_book, book_info
WHERE book_info.book_id = author_book.b_id
AND post.post_book_id = book_info.book_id
AND author.author_id = author_book.a_id
AND author.author_name = '" . $name . "' ) 
AND book_info.book_id = author_book.b_id
AND author.author_id = author_book.a_id
AND author.author_id = author_book.a_id
AND post.post_status = 'Active'
ORDER BY date_time, post_id");
        if ($query->num_rows >= 1) {
            foreach ($query->result_array() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        else
            return null;
    }
    
    
    
    //esha
    function getWishlistPostBook($id){
      
           
         $query = $this->db->query("SELECT post_book_id 
            FROM post, wishlist
            WHERE w_book_id= post_book_id
            AND w_customer_id = " . $id . "
            AND post_status =  'active'
            ORDER BY w_book_id ");

        if ($query->num_rows >= 1) {
            foreach ($query->result_array() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        else
            return null;
        
        }
        
        function getAvailableBooks($wid){
        
        $query = $this->db->query("SELECT * 
            FROM post, wishlist,customer
            WHERE w_book_id= post_book_id
            AND wishlist_id = " . $wid . "
            AND post_status =  'active'
            ORDER BY w_book_id ");

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

<?php

class Book_model extends CI_Model {

    function getBookInfo($bid) {
        $this->db->select('*');
        $this->db->from('author_book');
        $this->db->join('author', 'author.author_id = author_book.a_id');
        $this->db->join('book_info', 'book_info.book_id = author_book.b_id');
        $this->db->join('post', 'post.post_book_id = book_info.book_id');
        $this->db->join('category', 'category.category_id = book_info.book_category_id');
        $this->db->join('ad_giver', 'post.post_ad_giver_id = ad_giver.ad_giver_id');
        $this->db->join('division', 'division.division_id = ad_giver.ad_giver_div_id');
        $this->db->join('district', 'district.district_id = ad_giver.ad_giver_dis_id');
        $this->db->join('near_area', 'near_area.near_area_id = ad_giver.ad_giver_near_area_id');
        $this->db->where('post.post_id', $bid);
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
        $this->db->order_by("post_view_count");
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
AND post.post_book_id = book_info.book_id
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

}

?>

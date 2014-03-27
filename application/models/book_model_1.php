<?php

class Book_model extends CI_Model {

function getBookId($book_name, $category) {
$this->db->select('institute_id');
$this->db->from('institute');
$this->db->where('institute_type', $institute);
$this->db->where('institute_name', $ins_name);
$query = $this->db->get();

if ($query->result() > 0) {
foreach ($query->result() as $row) {
$id = $row->institute_id;
}
return $id;
} else {
$new_institute_insert_data = array(
'institute_type' => $institute,
 'institute_name' => $ins_name
);

$this->db->trans_start();
$this->db->insert('institute', $new_institute_insert_data);
$insert_id = $this->db->insert_id();
$this->db->trans_complete();
return $insert_id;
}
}

function insertPost($book_name, $selected_category, $author_name1, $author_name2,
 $author_name3, $author_name4, $author_name5, $edition,
 $book_des, $book_price, $image_path, $data['id']){

$b_id = $this->getBookId($book_name, $category);
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

function RequestedUser($p_id){
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


function insertRequest($pid, $cid){
$req_insert_data = array(
'post_req_p_id' => $pid,
 'post_req_c_id' => $cid
);

$insert = $this->db->insert('post_request', $req_insert_data );
}

function deleteRequest($pid, $cid){
$this->db->where('post_req_p_id', $pid);
$this->db->where('post_req_c_id', $cid);
$this->db->delete('post_request');
}

function getNumberOfRequest($pid){
$query = $this->db->query("
            SELECT COUNT(*) as num_req
            FROM post_request
            WHERE post_request.post_req_p_id = " . $pid );
$num_req = NULL;
if ($query->result() > 0) {
foreach ($query->result() as $row) {
$num_req = $row->num_req;
}
}
return $num_req;
}

function isRequested($pid, $c_id){
$query = $this->db->query("
            SELECT *
            FROM post_request
            WHERE post_request.post_req_c_id = " . $c_id .
" AND post_request.post_req_p_id = " . $pid );
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
AND post.author_id = author_book.a_id
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
}
?>

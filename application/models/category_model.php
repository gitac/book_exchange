<?php

class Category_model extends CI_Model {

    function getcategoryId($c_name) {
        $this->db->select('category_id');
        $this->db->from('category');
        $this->db->where('category_name', $c_name);

        $query = $this->db->get();
        $id = NULL;
        if ($query->result() > 0) {
            foreach ($query->result() as $row) {
                $id = $row->category_id;
            }
        }
        return $id;
    }

    function getcategoryIdWithBook($c_id) {
        $query = $this->db->query("SELECT DISTINCT (
                book_category_id
                )
                FROM book_info
                WHERE book_category_id = $c_id");
        $id = NULL;
        if ($query->result() > 0) {
            foreach ($query->result() as $row) {
                $id = $row->book_category_id;
            }
        }
        return $id;
    }

    function addCategoryName($data) {
        $this->db->insert('category', $data);
        return true;
    }

    function deleteCategoryName($cname) {
        $this->db->where('category_name', $cname);
        $this->db->delete('category');

        return true;
    }

    function getAllDistrictList($did) {
        $this->db->select('*');
        $this->db->from('district');
        $this->db->where('district_div_id', $did);
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

    function getAllNearAreaList($did) {
        $this->db->select('*');
        $this->db->from('near_area');
        $this->db->where('near_area_dis_id', $did);
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

    function getAreaName($i_id) {
        $this->db->select('near_area_name');
        $this->db->from('near_area');
        $this->db->where('near_area_id', $i_id);
        $query = $this->db->get();
        if ($query->result() > 0) {
            foreach ($query->result() as $row) {
                $title = $row->near_area_name;
            }
        }
        return $title;
    }

    function getInstituteName($i_id) {
        $this->db->select('institute_name');
        $this->db->from('institute');
        $this->db->where('institute_id', $i_id);
        $query = $this->db->get();
        if ($query->result() > 0) {
            foreach ($query->result() as $row) {
                $title = $row->institute_name;
            }
        }
        return $title;
    }

    function getCategoryName($cid) {
        $this->db->select('category_name');
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

    function getAuthorName($aid) {
        $this->db->select('author_name');
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

    function getFullList($type) {
        $this->db->select('*');

        if ($type == "category") {
            $this->db->from('CATEGORY');
            $this->db->order_by("CATEGORY_NAME");
        } else if ($type == "division") {
            $this->db->from('DIVISION');
            $this->db->order_by("DIVISION_NAME");
        } else if ($type == "district") {
            $this->db->from('DISTRICT');
            $this->db->order_by("DISTRICT_NAME");
        } else if ($type == "near_area") {
            $this->db->from('near_area');
            $this->db->order_by("near_area_name");
        } else if ($type == "institute") {
            $this->db->from('institute');
            $this->db->order_by("institute_name");
        } else if ($type == "author") {
            $this->db->from('AUTHOR');
            $this->db->order_by("AUTHOR_NAME");
        } else {
            $this->db->from('INSTITUTE');
            $this->db->where('INSTITUTE_TYPE', $type);
            $this->db->order_by("institute_name");
        }
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

}

?>

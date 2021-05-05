<?php

class Praktikan_model extends CI_model
{

    public function get_where($table, $where)
    {

        return $this->db->get_where($table, $where);

    }
}
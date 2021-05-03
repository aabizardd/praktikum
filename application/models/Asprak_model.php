<?php

class Asprak_model extends CI_model
{

    public function insert($table, $data)
    {

        return $this->db->insert($table, $data);

    }

    public function get($table)
    {

        return $this->db->get($table);

    }

    public function get_where($table, $wehre)
    {

        return $this->db->insert($table, $wehre);

    }

    public function count_all_results($table)
    {

        return $this->db->count_all_results($table, false);

    }

}
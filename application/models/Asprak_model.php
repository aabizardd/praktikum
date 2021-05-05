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

        return $this->db->get_where($table, $wehre);
    }

    public function count_all_results($table)
    {

        return $this->db->count_all_results($table);
    }

    public function get_limit($table, $limit, $start, $keyword = null)
    {

        if ($keyword) {
            $this->db->like('judul_praktikum', $keyword);
        }

        return $this->db->get($table, $limit, $start);
    }

    public function num_rows($table)
    {

        return $this->db->get($table)->num_rows();
    }

    public function delete($table, $where)
    {
        return $this->db->delete($table, $where);
    }

    public function update($table, $data, $where)
    {

        return $this->db->update($table, $data, $where);
    }

    public function getDetailInfoAsprak()
    {
        $this->db->select('*');
        $this->db->from('tb_admin');
        $this->db->join('tb_user', 'tb_admin.id_user = tb_user.id_user');
        $this->db->where('tb_admin.id_user', $this->session->userdata('id_user'));
        return $this->db->get();

    }
}
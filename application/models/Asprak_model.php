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

        $this->db->order_by('id_praktikum', 'DESC');
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

    public function get_limit_kelas($table, $limit, $start, $keyword = null)
    {

        // if ($keyword) {
        //     $this->db->like('nama_kelas', $keyword);
        // }

        // $this->db->order_by('nama_kelas', 'ASC');
        // return $this->db->get($table, $limit, $start);

        $this->db->select('*, count(id_praktikan) jml_praktikan');
        $this->db->from('tb_praktikan');
        $this->db->join('tb_kelas', 'tb_praktikan.id_kelas = tb_kelas.id_kelas', 'right');
        // $this->db->where('id_role', 1);
        if ($keyword) {
            $this->db->like('nama_kelas', $keyword);
        }
        $this->db->group_by('tb_kelas.id_kelas');
        $this->db->order_by('nama_kelas', 'ASC');
        $this->db->limit($limit, $start);

        return $this->db->get();

    }

    public function getPraktikansAll()
    {
        $this->db->select('*');
        $this->db->from('tb_praktikan');
        $this->db->join('tb_user', 'tb_praktikan.id_user = tb_user.id_user');
        $this->db->join('tb_kelas', 'tb_praktikan.id_kelas = tb_kelas.id_kelas', 'left');
        $this->db->where('id_role', 1);
        $this->db->order_by('nama_kelas', 'DESC');
        // $this->db->limit(2, 0);
        return $this->db->get();

    }

    public function get_limit_dataadmin($table, $limit, $start, $keyword = null)
    {

        // if ($keyword) {
        //     $this->db->like('nama_lengkap', $keyword);
        // }

        // $this->db->order_by('id_admin', 'DESC');
        // return $this->db->get($table, $limit, $start);

        $this->db->select('*');
        $this->db->from('tb_admin');
        $this->db->join('tb_user', 'tb_admin.id_user = tb_user.id_user');
        // $this->db->where('id_role', 1);
        if ($keyword) {
            $this->db->like('nama_lengkap', $keyword);
        }

        $this->db->order_by('id_admin', 'DESC');
        $this->db->limit($limit, $start);

        return $this->db->get();

    }

    public function get_limit_praktikan($table, $limit, $start, $keyword = null, $id_kelas)
    {

        // if ($keyword) {
        //     $this->db->like('nama_kelas', $keyword);
        // }

        // $this->db->order_by('nama_kelas', 'ASC');
        // return $this->db->get($table, $limit, $start);

        // $this->db->select('*');
        // $this->db->from('tb_praktikan');
        // $this->db->join('tb_user', 'tb_praktikan.id_user = tb_user.id_user');
        // // $this->db->where('id_role', 1);
        // if ($keyword) {
        //     $this->db->like('nama_lengkap', $keyword);
        // }

        // $this->db->where('id_kelas', $id_kelas);
        // $this->db->order_by('id_praktikan', 'DESC');
        // $this->db->limit($limit, $start);

        // return $this->db->get();

        if ($keyword) {
            $this->db->like('nama_lengkap', $keyword);
        }

        $this->db->where('id_kelas', $id_kelas);
        $this->db->order_by('id_praktikan', 'DESC');
        return $this->db->get($table, $limit, $start);

    }
}
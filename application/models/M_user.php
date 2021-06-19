<?php
Class M_user extends CI_Model{

    protected $primary_table = 'tbl_user';
    protected $secondary_table = 'tbl_user_level';
    protected $third_table = 'tbl_key';

    public function __construct()
    {
        parent::__construct();
    }

    // Basic Universal CRUD
    public function insert($table, $data, $batch = false)
    {
        return $this->db->insert($table, $data);
    }

    public function update($table, $where, $data)
    {
        $this->db->where($where);
        return $this->db->update($table, $data);
    }

    public function delete($table, $where)
    {
        $this->db->where($where);
        return $this->db->delete($table);
    }

    // Get 
    public function get_all()
    {
        $this->db->select('us.username, us.id_user, lv.nama');
        $this->db->from($this->primary_table.' as us');
        $this->db->join($this->secondary_table.' as lv', 'us.user_level = lv.id');
        return $this->db->get();
    }

    public function get_all_lvl()
    {
        $this->db->select('lv.id, lv.nama, lv.date_modificate');
        $this->db->from($this->secondary_table.' as lv');
        return $this->db->get();
    }

    public function get_user_detail($where)
    {
        $this->db->from($this->primary_table);
        $this->db->where('id_user', $where);
        return $this->db->get();
    }

    public function get_user_key($where)
    {
        $this->db->select('k.id_key, k.public_key, k.private_key');
        $this->db->from($this->primary_table.' as u');
        $this->db->join($this->third_table.' as k', 'u.default_key = k.id_key');
        $this->db->where('u.id_user', $where);
        return $this->db->get();

    }

    public function get_level_detail($where)
    {
        $this->db->from($this->secondary_table);
        $this->db->where('id', $where);
        return $this->db->get();
    }

    public function get_all_signer()
    {
        $this->db->select('u.username, k.private_key');
        $this->db->from('tbl_user as u');
        $this->db->join('tbl_key as k', 'u.default_key = k.id_key');
        $this->db->where('u.user_level', 2);
        return $this->db->get();
    }

    // Auth
    public function validate($where, $id = null)
    {
        $this->db->where('username', $where);
        if($id) {
            $this->db->where_not_in('id_user', $id);
        }
        return $this->db->get($this->primary_table)->row_array();
    }

}
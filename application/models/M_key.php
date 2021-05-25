<?php
Class M_key extends CI_Model{

    protected $primary_table = 'tbl_key';
    // protected $secondary_table = 'tbl_user_level';
    // protected $third_table = 'tbl_key';

    public function __construct()
    {
        parent::__construct();
    }

    // Basic Universal CRUD
    public function insert($data, $batch = false)
    {
        $this->db->insert($this->primary_table, $data);
        return $this->db->insert_id(); 

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

}

?>
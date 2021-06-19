<?php
Class M_sign extends CI_Model{

    protected $primary_table = 'tbl_sign';
    protected $secondary_table = 'tbl_key';
    // protected $third_table = 'tbl_key';

    public function __construct()
    {
        parent::__construct();
    }

    // Basic Universal CRUD
    public function insert($data, $table, $batch = false)
    {
        if($batch != false){
            $this->db->insert_batch($table, $data);} 
        else {$this->db->insert($table, $data);}
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

    // Get 
    public function get_all_sign($where)
    {
        $this->db->from($this->primary_table.' as si');
        $this->db->join($this->secondary_table.' as ky', 'si.id_key = ky.id_key');
        $this->db->where('si.id_user', $where);
        return $this->db->get();
    }

    public function check_(Type $var = null)
    {
        # code...
    }

}

?>
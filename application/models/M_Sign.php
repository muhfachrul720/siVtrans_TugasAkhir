<?php
Class M_sign extends CI_Model{

    protected $primary_table = 'tbl_sign';
    protected $secondary_table = 'tbl_key';
    protected $third = 'tbl_user';
    protected $fourth = 'tbl_info_trans';
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
        $this->db->select('si.*, us.username');
        $this->db->from($this->primary_table.' as si');
        $this->db->join($this->third.' as us', 'si.id_user = us.id_user');
        // $this->db->join($this->secondary_table.' as ky', 'si.default_key = ky.id_key');
        $this->db->where('si.id_user', $where);
        return $this->db->get();
    }

    public function get_sign_info($where)
    {
        $this->db->select('target_whatsapp, file_name');
        $this->db->from($this->primary_table);
        $this->db->where('id', $where);
        return $this->db->get();
    }

    public function check_sign($id)
    {
        $this->db->select('us.username, in.nama_mhs_info, in.nim_mhs_info, in.nilai_ipk, in.jml_sks');
        $this->db->from($this->primary_table.' as si');
        $this->db->join($this->third.' as us', 'si.id_user = us.id_user');
        $this->db->join($this->fourth.' as in', 'si.id = in.id_sign');
        // $this->db->join($this->secondary_table.' as ky', 'si.default_key = ky.id_key');
        $this->db->where('id', $id);
        return $this->db->get();
    }
    
    public function get_pathfile($id)
    {
        $this->db->select('si.file_name');
        $this->db->from($this->primary_table.' as si');
        $this->db->where('id', $id);
        return $this->db->get();
    }

}

?>
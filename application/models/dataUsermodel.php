<?php 
class dataUsermodel extends CI_Model {
    function __construct()
    {
        parent::__construct();
        $this->tabel = "user";
    }
    function getUser() {
        $this->db->select('user, nama, level');
        $this->db->from($this->tabel);
        $this->db->order_by('nama', 'asc');
        $query = $this->db->get();
        $row = $query->result_array();
        return $row;
    }
    function save($data){
        $this->db->select('user');
        $this->db->from($this->tabel);
        $this->db->where('user', $data['user']);
        $query = $this->db->get();
        if($query->num_rows()>0){
            $msg = "Data gagal disimpan<br>Username sudah digunakan"; $stat = "danger";
        }else{
            if($this->db->insert($this->tabel,$data)){
                $msg="Data berhasil disimpan"; $stat = "success";
            }else{
                $msg="Data gagal disimpan<br>"; $stat="danger";
            }
        }
        return array($stat,$msg);
    }
    function update($data, $id) {
        $this->db->where('user', $id);
        if($this->db->update($this->tabel, $data)) {
            $msg="Data berhasil diubah"; $stat = "success";
        }else{
            $msg = "Data gagal diubah<br>"; $stat = "danger";
        }
        return array($stat,$msg);
    }
    function getData() {
        $this->db->select('user, nama, level');
        $this->db->from($this->tabel);
        $this->db->order_by('nama', 'asc');
        $query = $this->db->get(); $row = $query->result_array();
        return $row;
    }
    function deletedata($id) {
        $msg = "Data berhasil dihapus"; $stat="Success";
        $this->db->where('user', $id);
        $exe = $this->db->delete($this->tabel);
        if(!$exe){$msg = "Data gagal dihapus<br>"; $stat = "danger";}
        return array($stat,$msg);
    }
    function getDataById($data){
        $this->db->select('user, nama, level');
        $this->db->from($this->tabel);
        $this->db->where('user', $data);
        $query = $this->db->get(); $row = $query->result_array();
        return $row;
    }
}
?>
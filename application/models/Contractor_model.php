 <?php

class Contractor_model extends CI_Model {
    
//    nama tabel dan primary key
    private $table = 'Contractor';
    private $pk = 'contractNo';
    
//    tampilkan semua data
    public function getAll() {
        $q = $this->db->get($this->table);
        return $q;
    }
    
    public function getById($id) {
        $q = $this->db->where($this->pk,$id);
        $q = $this->db->get($this->table);
        return $q;
    }

    function data($number,$offset){
        return $query = $this->db->get($this->table,$number,$offset)->result();       
    }
    
    public function input_data($data){
        $this->db->insert($this->table,$data);
    }
    
    public function ubah($id,$data) {
        $this->db->set($data);
        $this->db->where($this->pk, $id);
        $this->db->update($this->table, $data); 
    }
    
    public function hapus($id) {
        $this->db->where($this->pk, $id);
        $this->db->delete($this->table); 
    }
    
   public function getPassById($id) {
        $query = $this->db->where($this->pk,$id);
        $query = $this->db->get($this->table);
        $query = $query->row();
        return $query ;
    }

}
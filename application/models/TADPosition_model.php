 <?php

class TADPosition_model extends CI_Model {
    
//    nama tabel dan primary key
    private $table = 'TadPosition';
    private $pk = 'Id_Position';
    
//    tampilkan semua data
    public function getAll() {
        $q = $this->db->order_by('DirectPos_ID','desc');
        $q = $this->db->get($this->table);
        return $q;
    } 

    public function getData() {
        $q = $this->db->get($this->table); 
        return $q; 
    }
    
    public function getById($id) {
        $q = $this->db->where('ID_Position',$id);    
        $q = $this->db->get($this->table);
        return $q;
    }

    public function getByOCFId($id) {
        $q = $this->db->where('type_id',$id);
        $q = $this->db->where('type','ocf_id');
        $q = $this->db->get($this->table);

        return $q;
    }

    public function getPosition() {
        $q = $this->db->select('ID_Position');
        $q = $this->db->select('PosTitle');
        $q = $this->db->order_by($this->pk);
        $q = $this->db->get($this->table);
        return $q;
    }

    public function getPositionJoin() {
        $q = $this->db->join('MRF','TADPosition.Id_Position = MRF.id_position');
        $q = $this->db->order_by('TADPosition.'.$this->pk);
        $q = $this->db->get($this->table);
        return $q;
    }

    public function getDirectPos() {
        $q = $this->db->select(array('ID_Position','Position','Name'));
        $q = $this->db->where_not_in('Person_Id','0');
        $q = $this->db->order_by($this->pk);
        $q = $this->db->get($this->table);
        return $q;
    }


    function data($number,$offset){
        return $query = $this->db->get($this->table,$number,$offset)->result();       
    }
    
    public function insert($data){
        $this->db->insert($this->table,$data);
    }
    
    public function update($id,$data) {
        $this->db->set($data);
        $this->db->where('Id_Position', $id);
        $this->db->update($this->table, $data); 
    }
    
    public function delete($id) {
        $this->db->where('Id_Position', $id);
        $this->db->delete($this->table); 
    }

    public function getExisting() {
        $q = $this->db->select('Division, Department, COUNT(Id_Position) as total');
        $q = $this->db->group_by('Division, Department');
        $q = $this->db->get($this->table)->result();
        return $q;
    }

}
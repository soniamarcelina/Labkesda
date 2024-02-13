 <?php

class empTKJP_model extends CI_Model {
    
//    nama tabel dan primary key
    private $table = 'TadEmployee';
    private $pk = 'Nopek';
    
//    tampilkan semua data
    public function getAll() {
        $q = $this->db->order_by($this->pk);
        $q = $this->db->get($this->table);
        return $q;
    }
    
    public function getById($id) {
        $q = $this->db->where($this->pk,$id);
        $q = $this->db->get($this->table);
        return $q;
    }

    function GetFilter($data){
        
        if ($data['Nama'] != '') {
            $query = $this->db->like('Nama',$data['Nama']);    
        }else{
            $query = $this->db->where('Nopek',$data['Nopek']);
        }
        
       return $query = $this->db->get($this->table)->result();     
    }

    function joinAO($id){
        //$q = $this->db->where('assignmentorder.id_personnel',$id);
        $q = $this->db->join('AssignmentOrder','assignmentOrder.id_personnel =TadEmployee.Nopek');
        $q = $this->db->join('MRF','assignmentOrder.mrf_id = MRF.id_mrf');
        $q = $this->db->join('TadPosition','MRF.id_position = TadPosition.Id_Position');
        $q = $this->db->join('Contractor','assignmentOrder.contractor_id = Contractor.contractNo');
        $q = $this->db->get($this->table); 
         return $q->result();    
    }
    
    public function input($data){
        $this->db->insert($this->table,$data);
    }
    
    public function update($id,$data) {
        $this->db->set($data);
        $this->db->where($this->pk, $id);
        $this->db->update($this->table, $data); 
    }
    
    public function delete($id) {
        $this->db->where($this->pk, $id);
        $this->db->delete($this->table); 
    }

}
 <?php

class OCF_model extends CI_Model {
    
//    nama tabel dan primary key
    private $table = 'OCF';
    
//    tampilkan semua data
    public function getAll() {
        $q = $this->db->get($this->table);
        return $q; 
    }

    public function getById($id) {
        $q = $this->db->where('id',$id);
        $q = $this->db->get($this->table);
        return $q;
    }

    public function getByYearId($year) {
        $q = $this->db->where('year(createdDate)',$year);
        $q = $this->db->where('status','Approved');
        $q = $this->db->order_by('yID','desc');
        $q = $this->db->get($this->table);
        return $q;
    }

    public function checkDraft($key) {
        $q = $this->db->where('status','Draft');
        $q = $this->db->where('tempKey',$key);
        $q = $this->db->get($this->table);
        return $q;
    }

    public function checkSubmit($key) {
        $q = $this->db->where('status','Routing');
        $q = $this->db->where('tempKey',$key);
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
        $this->db->where('id', $id);
        $this->db->update($this->table, $data); 
    }
    
    public function delete($id) {
        $this->db->where('id', $id);
        $this->db->delete($this->table); 
    }

    public function countPos()
    {
        $this->db->select('TP.Division, TP.Department, COUNT(OCF.PosTitle) AS TotalPositions');
        $this->db->from('ocf OCF');
        $this->db->join('masteremployee ME', 'OCF.DirectPos = ME.ID_Position');
        $this->db->join('tadposition TP', 'TP.DirectPos_ID = ME.ID_Position');
        $this->db->group_by('TP.Division, TP.Department');

        $query = $this->db->get();
        return $query->result();
    }

}
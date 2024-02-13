<?php

class performance_model extends CI_Model {
    
//    nama tabel dan primary key
    private $table = 'assignmentOrder';
    
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

    public function getPerformance($id, $select) {
            $select = array(
                // 'assignmentOrder.id as ao_id',
                '*',
    
            );
            $q = $this->db->select($select);
            $q = $this->db->where('assignmentOrder.id',$id);
            $q = $this->db->join('TadEmployee','assignmentOrder.id_personnel = TadEmployee.Nopek');
            $q = $this->db->join('MRF','assignmentOrder.mrf_id = MRF.id_mrf');
            $q = $this->db->join('TadPosition','MRF.id_position = TadPosition.Id_Position');
            $q = $this->db->join('Contractor','Contractor.contractNo = assignmentOrder.contractor_id');
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


}
<?php

class AO_model extends CI_Model {
    
//    nama tabel dan primary key
    private $table = 'assignmentOrder';
    
//    tampilkan semua data
    public function getAll() {
        $q = $this->db->get($this->table);
        return $q;
    }
    
    public function getAlljoin() {
        $q = $this->db->join('TadEmployee','assignmentOrder.id_personnel = TadEmployee.Nopek');
        $q = $this->db->join('MRF','assignmentOrder.mrf_id = MRF.id_mrf');
        $q = $this->db->join('TadPosition','MRF.id_position = TadPosition.Id_Position');
        $q = $this->db->join('Contractor','Contractor.contractNo = assignmentOrder.contractor_id');
        $q = $this->db->get($this->table);
        return $q;
    }

    public function getById($id) {
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

    public function getByIdSelect($id,$select) {
        $q = $this->db->select($select);
        $q = $this->db->where('assignmentOrder.id',$id);
        $q = $this->db->join('TadEmployee','assignmentOrder.id_personnel = TadEmployee.Nopek');
        $q = $this->db->join('MRF','assignmentOrder.mrf_id = MRF.id_mrf');
        $q = $this->db->join('TadPosition','MRF.id_position = TadPosition.Id_Position');
        $q = $this->db->join('Contractor','Contractor.contractNo = assignmentOrder.contractor_id');
        $q = $this->db->get($this->table);
        return $q;
    }

    public function getByMRFId($id) {
        $q = $this->db->where('mrf_id',$id);
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
        $this->db->select_max('id');
        $query = $this->db->get('assignmentorder');
        $result = $query->row();
        $lastId = $result->id;
        $newId = $lastId + 1;
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

    public function updateStatus($id_AO, $newStatus) {
        $data = array(
            'status' => $newStatus
        );

        $this->db->where('id', $id_ao);
        $this->db->update($this->table, $data);
    }

    public function getValidContracts() {
        $currentDate = date("Y-m-d"); 

        $this->db->select('*');
        $this->db->from('assignmentOrder'); 
        $this->db->where('end_date >=', $currentDate); 
    
        $query = $this->db->get();
        return $query->result();                                        
    }

    public function PersonnelCount() {
        $this->db->select('TP.Division, TP.Department, COUNT(AO.id_personnel) AS TotalPerson');
        $this->db->from('assignmentorder AO');
        $this->db->join('tadposition TP', 'TP.Id_Position = AO.PositionID');
        $this->db->join('mrf MRF', 'MRF.id_mrf = AO.mrf_id');
        $this->db->join('mrf_candidate CD', 'CD.mrf_id = MRF.id_mrf');
        $this->db->group_by('TP.Division, TP.Department');

        $query = $this->db->get();
        return $query->result();
    }

    // public function get_last_id() {
    //     // Mengambil ID terakhir dari tabel 'nama_tabel' di database
    //     $this->db->select_max('id');
    //     $query = $this->db->get('assignmentOrder');
    //     $result = $query->row_array();

    //     // Mendapatkan ID terakhir
    //     $last_id = $result['id'];

    //     return $last_id;
    // }

}
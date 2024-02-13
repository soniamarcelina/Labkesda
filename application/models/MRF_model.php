<?php

class MRF_model extends CI_Model {
    
//    nama tabel dan primary key
    private $table = 'MRF';
    
//    tampilkan semua data
    public function getAll() {
        $q = $this->db->get($this->table);
        return $q;
    }

    public function getAlljoinPos($status) {
        $q = $this->db->where('mrf.status',$status);
        $q = $this->db->join('TADPosition','TADPosition.Id_Position = MRF.id_position');
        $q = $this->db->join('MasterEmployee','TADPosition.DirectPos_ID = MasterEmployee.ID_Position');
        $q = $this->db->get($this->table);
        return $q;
    }

    public function getAlljoin() {
        $q = $this->db->join('TADPosition','TADPosition.Id_Position = MRF.id_position');
        $q = $this->db->join('MasterEmployee','TADPosition.DirectPos_ID = MasterEmployee.ID_Position');
        $q = $this->db->get($this->table);
        return $q;
    }
    
    public function getById($id,$select) {
        $q = $this->db->select($select);
        $q = $this->db->join('TADPosition','TADPosition.Id_Position = MRF.id_position');
        $q = $this->db->join('MasterEmployee','TADPosition.DirectPos_ID = MasterEmployee.ID_Position');
        $q = $this->db->where('id_mrf',$id);
        $q = $this->db->get($this->table);
        return $q;
    }

    public function getPerformance($id) {
        $q = $this->db->join('TADPosition','TADPosition.Id_Position = MRF.id_position');
        $q = $this->db->join('MasterEmployee','TADPosition.DirectPos_ID = MasterEmployee.ID_Position');
        $q = $this->db->join('AssignmentOrder','assignmentOrder.mrf_id = MRF.id_mrf');
        $q = $this->db->join('Contractor', 'contractor.contractNo = assignmentOrder.contractor_id');
        $q = $this->db->join('TadEmployee','assignmentOrder.id_personnel = TadEmployee.Nopek');
        $q = $this->db->where('id_mrf',$id);
        $q = $this->db->get($this->table);
        return $q;
    }


    public function getByPosition($id_pos) {
        $q = $this->db->where('id_position',$id_pos);
        $q = $this->db->order_by('end_date','desc');
        $q = $this->db->get($this->table);
        return $q;
    }

    public function getByYearId($year) {
        $q = $this->db->where('year(created_at)',$year);
        $q = $this->db->where('status','Approved');
        $q = $this->db->order_by('yID','desc');
        $q = $this->db->get($this->table);
        return $q;
    }

    public function checkDraft($key) {
        $q = $this->db->join('TADPosition','TADPosition.Id_Position = MRF.id_position');
        $q = $this->db->where('MRF.status','Draft');
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
        $this->db->where('id_mrf', $id);
        $this->db->update($this->table, $data); 
    }
    
    public function delete($id) {
        $this->db->where('id_mrf', $id);
        $this->db->delete($this->table); 
    }

    public function updateStatus($id_mrf, $newStatus) {
        $data = array(
            'status' => $newStatus
        );

        $this->db->where('id_mrf', $id_mrf);
        $this->db->update($this->table, $data);
    }

    public function getForm($id) {
        $currentDate = date("Y-m-d");
        $q = $this->db->join('TADPosition','TADPosition.Id_Position = MRF.id_position');
        $q = $this->db->join('MasterEmployee','TADPosition.DirectPos_ID = MasterEmployee.ID_Position');
        $q = $this->db->join('AssignmentOrder','assignmentOrder.mrf_id = MRF.id_mrf');
        $q = $this->db->join('TadEmployee','assignmentOrder.id_personnel = TadEmployee.Nopek');
        $q = $this->db->join('Contractor','Contractor.contractNo = assignmentOrder.contractor_id');
        $q = $this->db->where('id_mrf',$id);  
        $q = $this->db->where('AssignmentOrder.contract_end >=', $currentDate); 
        $q = $this->db->get($this->table);
        return $q;
    }

}
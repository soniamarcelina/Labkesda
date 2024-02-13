 <?php

class Candidate_model extends CI_Model {
    
    
//    tampilkan semua data
    public function getAll() {
        $q = $this->db->order_by($this->pk);
        $q = $this->db->get($this->table);
        return $q;
    }

    public function getById($id) {
        $q = $this->db->where('id',$id);
        $q = $this->db->get($this->table);
        return $q;
    }

    public function getCandidate($id,$select) {
        $q = $this->db->select($select);
        $q = $this->db->join('TadEmployee','MRF_Candidate.personnel_id = TadEmployee.Nopek');
        $q = $this->db->where('mrf_id',$id);
        $q = $this->db->get('MRF_Candidate');
        return $q;
    }

    public function getCandidateJoin($id,$select) {
        $q = $this->db->select($select);
        $q = $this->db->join('TadEmployee','MRF_Candidate.personnel_id = TadEmployee.Nopek');
        $q = $this->db->join('MRF','MRF_Candidate.mrf_id = MRF.id_mrf');
        $q = $this->db->where('mrf_id',$id);
        $q = $this->db->get('MRF_Candidate');
        return $q;
    }

    public function getCandidateId($id,$select) {
        $q = $this->db->select($select);
        $q = $this->db->join('TadEmployee','MRF_Candidate.personnel_id = TadEmployee.Nopek');
        $q = $this->db->where('MRF_Candidate.id',$id);
        $q = $this->db->get('MRF_Candidate');
        return $q;
    }

    public function getOnboard($mrf_id){
        $q = $this->db->where('mrf_id',$mrf_id);
        $q = $this->db->where('status','Onboard');
        $q = $this->db->get('MRF_Candidate');
        return $q;
    }

    public function getByPersMrf($mrf_id,$personnel_id) {
        $q = $this->db->where('mrf_id',$mrf_id);
        $q = $this->db->where('personnel_id',$personnel_id);
        $q = $this->db->get('MRF_Candidate');
        return $q;
    }

    public function getCandidateIdJoin($id,$select) {
        $q = $this->db->select($select);
        $q = $this->db->join('TadEmployee','MRF_Candidate.personnel_id = TadEmployee.Nopek');
        $q = $this->db->join('MRF','MRF_Candidate.mrf_id = MRF.id_mrf');
        $q = $this->db->join('TadPosition','MRF.id_position = TadPosition.Id_Position');
        $q = $this->db->where('MRF_Candidate.id',$id); 
        $q = $this->db->get('MRF_Candidate');
        return $q;
    }

    public function insertCandidate($data){
        $this->db->insert('MRF_Candidate',$data);
    }

    public function update($id,$data) {
        $this->db->set($data);
        $this->db->where('id', $id);
        $this->db->update('MRF_Candidate', $data); 
    }

    public function deleteCandidate($id) {
        $this->db->where('id', $id);
        $this->db->delete('MRF_Candidate'); 
    }

    public function updateStatus($id, $status) {
        $this->db->where('id', $id);
        $this->db->update('mrf_candidate', array('status' => $status));
    }

    public function blacklistCandidate($id) {
        $candidate = $this->db->get_where('mrf_candidate', array('id' => $id))->row();
        $personnel_id = $candidate->personnel_id;
    
        $this->db->where('id', $id);
        $this->db->update('mrf_candidate', array('status' => 'Blacklist'));
    
        $this->db->where('Nopek', $personnel_id);
        $this->db->update('tademployee', array('status' => 'Blacklist'));
    
    }

    public function PosCandidate() {
        $this->db->select('p.Division, p.Department, COUNT(mc.mrf_id) as pos_candidate');
        $this->db->from('mrf_candidate mc');
        $this->db->join('mrf m', 'm.id_mrf = mc.mrf_id', 'left');
        $this->db->join('tadposition p', 'p.Id_Position = m.id_position', 'left');
        $this->db->group_by('p.Division, p.Department');
        $query = $this->db->get();
        return $query->result();
    }
    
    public function PosisiCandidate() {
        $this->db->select('p.Division, p.Department, COUNT(m.id_position) as pos_candidate');
        $this->db->from('mrf m');
        $this->db->join('mrf_candidate m', 'm.id_mrf = mc.mrf_id', 'left');
        $this->db->join('tadposition p', 'p.Id_Position = m.id_position', 'left');
        $this->db->group_by('p.Division, p.Department');
        $query = $this->db->get();
        return $query->result();
    }

    public function getExisting() {
        $q = $this->db->select('Division, Department, COUNT(Id_Position) as total');
        $q = $this->db->group_by('Division, Department');
        $q = $this->db->get($this->table)->result();
        return $q;
    }

    
}
    
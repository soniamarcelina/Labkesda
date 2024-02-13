 <?php

class Approval_model extends CI_Model {
    
//    nama tabel dan primary key
    private $table = 'Approval';
    
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

    public function getbyType($type) {
        $q = $this->db->where('type',$type);
        $q = $this->db->get($this->table);
        return $q;
    }

    public function getByAOId($id) {
        $q = $this->db->where('type_id',$id);
        $q = $this->db->where('type','AO');
        $q = $this->db->order_by('approver_order','asc');
        $q = $this->db->get($this->table);

        return $q;
    }

    public function getbyApproveOrder($type,$type_id,$order) {
        $q = $this->db->where('type',$type);
        $q = $this->db->where('type_id',$type_id);
        $q = $this->db->where('approver_order',$order);
        $q = $this->db->get($this->table);
        return $q;
    }

    public function getByOCFId($id) {
        $q = $this->db->where('type_id',$id);
        $q = $this->db->where('type','OCF');
        $q = $this->db->order_by('approver_order','asc');
        $q = $this->db->get($this->table);

        return $q;
    }

    public function countApproveOCFId($id) {
        $q = $this->db->select('count(status) as total');
        $q = $this->db->where('type_id',$id);
        $q = $this->db->where('type','OCF');
        $q = $this->db->where('status','Approved');
        $q = $this->db->order_by('approver_order','asc');
        $q = $this->db->get($this->table);

        return $q;
    }

    public function getByMRFId($id) {
        $q = $this->db->where('type_id',$id);
        $q = $this->db->where('type','MRF');
        $q = $this->db->order_by('approver_order','asc');
        $q = $this->db->get($this->table);

        return $q;
    }

    public function countApproveMRFId($id) {
        $q = $this->db->select('count(status) as total');
        $q = $this->db->where('type_id',$id);
        $q = $this->db->where('type','MRF');
        $q = $this->db->where('status','Approved');
        $q = $this->db->order_by('approver_order','asc');
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
    
    public function deleteByTypeID($type,$type_id) {
        $this->db->where('type', $type);
        $this->db->where('type_id', $type_id);
        $this->db->delete($this->table); 
    }

    public function delete($id) {
        $this->db->where('id', $id);
        $this->db->delete($this->table); 
    }
    
    public function saveNewOrder($newOrder, $dataIds) {
        foreach ($newOrder as $index => $approvId) {
            $data = array(
                'approver_order' => $index + 1,
                'approver_role' => $this->input->post('approver_role')[$index], // Ganti 'approver_role' sesuai dengan input yang benar
                'status' => $this->input->post('status')[$index] // Ganti 'status' sesuai dengan input yang benar
                // ... (Tambahkan kolom lain yang perlu diperbarui)
            );
            $dataId = $dataIds[$index]; // Ambil data-id yang sesuai dengan urutan baru
    
            $this->db->where('data_id', $dataId); // Sesuaikan dengan nama kolom yang sesuai di tabel database
            $this->db->update('approval', $data);
        }
    
        return true;
    }
    

}
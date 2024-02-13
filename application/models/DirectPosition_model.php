 <?php

class DirectPosition_model extends CI_Model {
    
//    nama tabel dan primary key
    private $table = 'MasterEmployee';
    private $pk = 'ID_Position';
    
//    tampilkan semua data
    public function getAll() {
        $q = $this->db->order_by($this->pk);
        $q = $this->db->get($this->table);
        return $q;
    }

    public function checkVPGM($divisi,$subdivisi){
        if ($divisi != '') {
            $subdivisi = '';
        }
        $q = $this->db->where('Divisi',$divisi);
        $q = $this->db->where('Sub_Division',$subdivisi);
        $q = $this->db->get('vp_gm_sm');
        return $q;
    }

    public function getGL($no){
        $q = $this->db->where_not_in('Divisi','Dewan Komisaris PT Pertamina EP Cepu');
        $q = $this->db->where_in('GL',['GL2','GL3']);
        // $q = $this->db->where_or('GL','GL2');
        $q = $this->db->order_by('ID_Position','asc');
        $q = $this->db->get($this->table);
        return $q;
    }

    public function groupByChief($data){
        $q = $this->db->where_not_in('ID_Position',array('0','30166817'));
        $q = $this->db->select('*,count(*) as total');
        $q = $this->db->group_by('ID_Pos_Chief');
        $q = $this->db->get($this->table);
        //echo $this->db->last_query();
        return $q;
    }

    public function getChild($id){
        $q = $this->db->where('ID_Position_Atasan',$id);
        $q = $this->db->order_by('Position','desc');
        $q = $this->db->get($this->table);
        return $q;
    }

    public function getDiv($divisi,$ID_Position){
        $q = $this->db->like('Divisi', $divisi);
        $q = $this->db->where_not_in('ID_Position', $ID_Position);
        $q = $this->db->get($this->table);
        return $q;
    }

    public function getDivLimit($divisi,$ID_Position,$GL){
        $q = $this->db->like('Divisi', $divisi);
        $q = $this->db->where_not_in('GL', $GL);
        $q = $this->db->where_not_in('ID_Position', $ID_Position);
        $q = $this->db->get($this->table);
        return $q;
    }

    public function getSubDiv($divisi,$ID_Position){
        $q = $this->db->like('Sub_Division', $divisi);
        $q = $this->db->where_not_in('ID_Position', $ID_Position);
        $q = $this->db->get($this->table);
        return $q;
    }

    public function getSubDivLimit($divisi,$ID_Position){
        $q = $this->db->like('Sub_Division', $divisi);
        $q = $this->db->where_not_in('GL', array('GL8','GL7'));
        $q = $this->db->where_not_in('ID_Position', $ID_Position);
        $q = $this->db->get($this->table);
        return $q;
    }

    public function getDept($divisi){
        $q = $this->db->where('Departemen', $divisi);
        $q = $this->db->get($this->table);
        return $q;
    }

    public function getSection($divisi){
        $q = $this->db->like('Section', $divisi);
        $q = $this->db->get($this->table);
        return $q;
    }

    public function countbyAtasan($ID_Position){
        $q = $this->db->select('count(*) as total');
        $q = $this->db->where('ID_Position_Atasan', $ID_Position);
        $q = $this->db->get($this->table);
        return $q;
    }

    public function countbyChief($ID_Position){
        $q = $this->db->select('count(*) as total');
        $q = $this->db->where('ID_Pos_Chief', $ID_Position);
        $q = $this->db->get($this->table);
        return $q;
    }

    public function countDiv($divisi){
        $q = $this->db->select('count(*) as total_div');
        $q = $this->db->like('Divisi', $divisi);
        $q = $this->db->get($this->table);
        return $q;
    }

    public function countSubDiv($subdivisi){
        $q = $this->db->select('count(*) as total_div');
        $q = $this->db->like('Sub_Division', $subdivisi);
        $q = $this->db->get($this->table);
        return $q;
    }

    public function countDept($dept){
        $q = $this->db->select('count(*) as total_div');
        $q = $this->db->like('Departemen', $dept);
        $q = $this->db->get($this->table);
        return $q;
    }

    public function getPositions() {
        $q = $this->db->select('ID_Position');
        $q = $this->db->select('Position');
        $q = $this->db->order_by($this->pk);
        $q = $this->db->get($this->table);
        return $q;
    }

    public function getPositionsActive() {
        $q = $this->db->where_not_in('Person_Id','0');
        $q = $this->db->where_not_in('ID_Position','30166663');
        $q = $this->db->order_by($this->pk);
        $q = $this->db->get($this->table);
        return $q;
    }

    
    public function getById($id) {
        $q = $this->db->where($this->pk,$id);
        $q = $this->db->get($this->table);
        return $q;
    }

    public function getByPersonId($id) {
        $q = $this->db->where('Person_Id',$id);
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


    function GetFilter($number,$offset,$data){
        $query = $this->db->where($this->pk,$id);
        return $query = $this->db->get($this->table,$number,$offset)->result();       
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
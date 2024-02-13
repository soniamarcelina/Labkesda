<?php

class costumer_model extends CI_Model {
    
//    nama tabel dan primary key
    private $table = 'costumer';
    private $pk = 'id';

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

    function data($number,$offset){
        return $query = $this->db->get($this->table,$number,$offset)->result();       
    }
    
    public function input_data($data){
    
        $this->db->insert($this->table,$data);
    }

    public function update($id,$data) {
        $this->db->set($data);
        $this->db->where('id', $id);
        $this->db->update($this->table, $data); 
    }

    public function hapus($id) {
        $this->db->where($this->pk, $id);
        $this->db->delete($this->table); 
    }
    

    public function importData($id, $nama, $workExp, $minSal, $midSal, $maxSal, $minEdu) {
        $data = array(
            'id' => $id,
			'nomenklatur' =>$nom,
			'kompetensi'=>$komp,
			'WorkExp' => $workExp,
			'MinSalary' => $minSal,
			'MidSalary' => $midSal,
			'MaxSalary' => $maxSal,
			'MinEdu' => $minEdu,
        );

        $this->db->insert($this->table, $data); 
    }


}
<?php if (!defined('BASEPATH')) exit('No direct script allowed');

class dashboard_model extends CI_Model {

//  jumlah employee keseluruhan
public function countEmployee() {
	$q = $this->db->get('tademployee');
	if ($q->num_rows()>0) {
		return $q->num_rows();
	}
	else {
		return 0;
	}
}

// jumlah employee active
public function countEmpActive() {
	$this->db->where('tademployee.status', 'active'); 
	$this->db->join('assignmentOrder', 'assignmentOrder.id_personnel = tademployee.Nopek'); 
	$query = $this->db->get('tademployee'); 
	return $query->num_rows(); 
}

public function groupLastEdu(){
	$this->db->select('TadEmployee.Tingkat_Pendidikan as Edu,count(TadEmployee.Tingkat_Pendidikan) as total');
	$this->db->where('assignmentOrder.status', 'Approved'); 
	$this->db->join('assignmentOrder', 'assignmentOrder.id_personnel = tademployee.Nopek'); 
	$this->db->group_by('tademployee.Tingkat_Pendidikan'); 
	$query = $this->db->get('tademployee'); 
	return $query;
}

// // jumlah employee active
// public function countEmpActive() {
// 	$this->db->where('status', 'active'); 
// 	$query = $this->db->get('tademployee'); 
// 	return $query->num_rows(); 
// }

// jumlah employee candidat
public function countEmpCandidat() {
	$this->db->where('status', 'candidat'); 
	$query = $this->db->get('tademployee'); 
	return $query->num_rows(); 
}

// jumlah contractor keseluruhan
public function countContractor() {
	$q = $this->db->get('contractor');
	if ($q->num_rows()>0) {
		return $q->num_rows();
	}
	else {
		return 0;
	}
}



}
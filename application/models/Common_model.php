<?php
class Common_model extends CI_Model {
	public function __construct() {
		$this->load->database();

	}
	public function getAllRecordByArray($tbl_name, $array) {
		$this->db->order_by('id', 'desc');
		$query = $this->db->get_where($tbl_name, $array);
		return $query->result_array();
	}
	public function getAllRecordByArrayGroupBy($tbl_name, $group_by, $array) {
		$this->db->order_by('id', 'desc');
		$this->db->group_by($group_by);
		$query = $this->db->get_where($tbl_name, $array);
		return $query->result_array();
	}
	public function getRecordByArray($tbl_name, $array) {
		$this->db->order_by('id', 'desc');
		$query = $this->db->get_where($tbl_name, $array);
		return $query->row_array();
	}
	public function deleteRecordByID($del_id, $tbl_name) {
		// $this->db->delete($tbl_name, array('id' => $del_id));
		// return true;
		// return $this->db->error();
		if (!$this->db->delete($tbl_name, array('id' => $del_id))) {
			return $this->db->error();
		}
		return true;
	}
	public function deleteRecordByColoumn($tbl_name, $tbl_col, $value) {
		$this->db->delete($tbl_name, array($tbl_col => $value));
		return true;
	}
	public function recordDBCheck($del_id, $chkDB, $chkDBAtrr) {
		$query = $this->db->get_where($chkDB, array($chkDBAtrr => $del_id));
		return $query->row_array();
	}
	public function getImageNameById($del_id, $tbl_name) {
		$query = $this->db->get_where($tbl_name, array('id' => $del_id));
		return $query->row_array();
	}
	public function delImage($folderName, $imageName) {
		unlink(IMG_UPLOAD_PATH . $folderName . '/' . $imageName);
	}
	public function delFile($folderName, $fileName) {
		unlink('./assets/upload/' . $folderName . '/' . $fileName);
	}
	public function delImageFromGallery($folderName, $imageName) {
		unlink('./assets/upload/gallery/' . $folderName . '/' . $imageName);
	}
	public function getRecordById($id, $tbl_name) {
		$query = $this->db->get_where($tbl_name, array('id' => $id));
		return $query->row_array();
	}
	public function getRecordByColoumn($tbl_name, $tbl_col, $value) {
		$query = $this->db->get_where($tbl_name, array($tbl_col => $value));
		return $query->row_array();
	}
	public function getAllRecordByColoumn($tbl_name, $tbl_col, $value) {
		$this->db->order_by('id', 'desc');
		$query = $this->db->get_where($tbl_name, array($tbl_col => $value));
		return $query->result_array();
    }
    public function getCountAll($tbl_name){
        $counter = $this->db->count_all($tbl_name);
        return $counter;
    }
	public function getAllRecord($tbl_name) {

		$this->db->order_by('id', 'desc');
		if ($_SESSION['tbl_admin_role_id'] != 1) {
			$this->db->where('add_by', $_SESSION['admin_id']);}
		$query = $this->db->get($tbl_name);
		return $query->result_array();
	}
	public function getAllRecords($tbl_name) {
		$this->db->order_by('id', 'desc');
		$query = $this->db->get($tbl_name);
		return $query->result_array();
	}
	public function update_setting() {
		$insertion_date = strtotime($this->input->post('insertion_date'));
		$insertion_date = date('Y-m-d', $insertion_date);
		$increment_date = strtotime($this->input->post('increment_date'));
		$increment_date = date('Y-m-d', $increment_date);
		$data = array(
			'insertion_date' => $insertion_date,
			'increment' => $this->input->post('increment'),
			'increment_date' => $increment_date,
		);
		//XSS prevention
		$data = $this->security->xss_clean($data);
		//updation in db
		$this->db->where('id', $this->input->post('id'));
		return $this->db->update('tbl_setting', $data);
	}

}
?>
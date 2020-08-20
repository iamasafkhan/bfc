<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Scholarship extends MY_Controller {

	public function __construct() {
		error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
		parent::__construct();

		// if ($_SESSION['tbl_admin_role_id'] != '1') {
		// 	$this->session->sess_destroy();
		// 	redirect('admin', 'refresh');
		// }
	}
	public function add_scholarship_grant() {
        
		// if ($_SESSION['tbl_admin_role_id'] != '1') {
		// 	$this->session->sess_destroy();
		// 	redirect('admin', 'refresh');
		// }
		$data['page_title'] = 'Add New Scholarship Grant';
		$data['description'] = '...';
		$data['cases'] = $this->common_model->getAllRecordByArray('tbl_case_status', array('status' => '1'));
		$data['department'] = $this->common_model->getAllRecordByArray('tbl_department', array('status' => '1'));
        $data['payment_modes'] = $this->common_model->getAllRecordByArray('tbl_payment_mode', array('status' => '1'));
        $data['banks'] = $this->common_model->getAllRecordByArray('tbl_list_bank_branches', array('status' => '1'));

		if ($this->input->post('submit')) {

			$this->form_validation->set_rules('grantee_name', ucwords(str_replace('_', ' ', 'grantee_name')), 'required|xss_clean|trim|min_length[3]|max_length[20]');

			$this->form_validation->set_rules('father_name', ucwords(str_replace('_', ' ', 'father_name')), 'required|xss_clean|trim|min_length[3]|max_length[20]');

			$this->form_validation->set_rules('contact_no', ucwords(str_replace('_', ' ', 'contact_no')), 'required|xss_clean|trim|min_length[3]|max_length[20]|numeric');

			$this->form_validation->set_rules('marital_status', 'Selection', 'required|xss_clean');

			$this->form_validation->set_rules('cnic_no', ucwords(str_replace('_', ' ', 'cnic_no')), 'required|xss_clean|trim|min_length[13]|max_length[13]');

			$this->form_validation->set_rules('dob', ucwords(str_replace('_', ' ', 'Date of birth')), 'required|xss_clean|trim|min_length[3]|max_length[12]|alpha_dash', array('alpha_dash' => 'The %s field may only contain Date characters.'));

			$this->form_validation->set_rules('personnel_no', ucwords(str_replace('_', ' ', 'personnel_no')), 'xss_clean|trim|min_length[3]|max_length[20]');

			$this->form_validation->set_rules('tbl_department_id', 'Selection', 'required|xss_clean');

			$this->form_validation->set_rules('tbl_post_id', 'Selection', 'required|xss_clean');

			$this->form_validation->set_rules('pay_scale', ucwords(str_replace('_', ' ', 'pay_scale')), 'required|xss_clean|trim|min_length[3]|max_length[20]');
			$this->form_validation->set_rules('tbl_district_id', 'Selection', 'required|xss_clean');
			$this->form_validation->set_rules('office_address', ucwords(str_replace('_', ' ', 'office_address')), 'required|xss_clean|trim|min_length[3]');
			$this->form_validation->set_rules('other_address', ucwords(str_replace('_', ' ', 'other_address')), 'required|xss_clean|trim|min_length[3]');
			$this->form_validation->set_rules('status', 'Selection', 'required|xss_clean');

			$this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
			if ($this->form_validation->run() === FALSE) {
				$this->load->view('templates/header', $data);
				$this->load->view('emp_info/add_emp_info', $data);
				$this->load->view('templates/footer');
			} else {

				// to model
				$this->emp_info_model->add_emp_info();
				// set session message
				$this->session->set_flashdata('add', '!');
				redirect(base_url('view_emp_info'));
			}
		} else {
			$this->load->view('templates/header', $data);
			$this->load->view('scholarships/add_scholarship_grant');
			$this->load->view('templates/footer');
		}

	}

	public function getData($id) {
		$data = $this->grants_model->getRecordById($id);
		echo json_encode($data);
	}

	public function update_grants() {

		$json = array();

		// $this->form_validation->set_rules('id', 'grants ID', 'required|xss_clean');
		$this->form_validation->set_rules('name', ucwords(str_replace('_', ' ', 'grants name')), 'required|xss_clean|trim|min_length[3]|max_length[25]|alpha_numeric_spaces', array('alpha_numeric_spaces' => 'The %s field may only contain A-Z, a-z and 0-9 characters.'));
		$this->form_validation->set_rules('status', 'Selection', 'required|xss_clean');
		$this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');

		if ($this->form_validation->run() === FALSE) {

			$json = array(
				// 'id' => form_error('id'),
				'name' => form_error('name'),
				'status' => form_error('status'),
			);
			echo json_encode($json);

		} else {
			$result = $this->grants_model->update_grants();

			$json = array(
				'success' => false,
			);
			if ($result) {
				$json = array(
					'success' => true,
				);
			}

			echo json_encode($json);
		}
		// echo json_encode($json);

	}

	public function view_scholarship_grants() {

		$data['page_title'] = 'View All Scholarship Grants';
		$data['description'] = '...';
		$this->load->view('templates/header', $data);
		$this->load->view('scholarships/scholarship_grants', $data);
		$this->load->view('templates/footer');
	}

	public function get_scholarship_grants() {

		$data = $row = array();

		// Fetch Scholarship grants's records
		$scholarshipData = $this->grants_model->getRows($_POST);

		$i = $_POST['start'];
		foreach ($scholarshipData as $scholarshipInfo) {
			$i++;
			$status = ($scholarshipInfo->status == 1) ? '<span class="label label-success">Active</span>' : '<span class="label label-danger">Inactive</span>';

			$getRole = $this->admin->getRecordById($scholarshipInfo->record_add_by, $tbl_name = 'tbl_admin');
			$recordAddDate = $scholarshipInfo->record_add_date;
			$recordAddDate = date("d-M-Y", strtotime($recordAddDate));

			$add_by_date = '<i>Add by <strong>' . $getRole['name'] . '</strong> on <strong>' . $recordAddDate . '</strong></i>';

			$actionBtn = '<a href="' . site_url('common/logger/' . $scholarshipInfo->id . '/tbl_grants') . '">
                      <button type="button"class="btn btn-sm btn-xs btn-primary"><i class="fa fa-history"></i></button>
                      </a>' .
			'<a href="javascript:void(0)" onclick="getData(' . "'" . $scholarshipInfo->id . "'" . ')">
                      <button type="button" id="item_edit" class="item_edit btn btn-sm btn-xs btn-warning"><i class="fa fa-edit"></i></button>
                      </a>';
			// $actionBtn = '<a href="' . site_url('grants/edit_grants/' . $scholarshipInfo->id) . '">
			//                    <button type="button" class="item_edit btn btn-sm btn-xs btn-warning"><i class="fa fa-edit"></i></button>
			//                    </a>';
			$data[] = array($i, $scholarshipInfo->name, $status, $add_by_date, $actionBtn);
		}

		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->grants_model->countAll(),
			"recordsFiltered" => $this->grants_model->countFiltered($_POST),
			"data" => $data,
		);

		// Output to JSON format
		echo json_encode($output);
	}
}
?>

<?php
class Scholarship_model extends CI_Model {
	public function __construct() {
		$this->load->database();
		//////// ajax and ssp////////
		// Set table name
		$this->table = 'tbl_scholaarship_grant';
		// Set orderable column fields
		$this->column_order = array(null, 'std_name');
		// Set searchable column fields
		$this->column_search = array('std_name');
		// Set default order
		$this->order = array('id' => 'desc');
		//////// ajax and ssp////////
	}

	 

	public function add_scholarship_grant() {

        //echo 'in model'; exit();
		$result_date = date('Y-m-d', strtotime($this->input->post('result_date')));
 
		$data = array( 
            'parent_dept' => $this->input->post('tbl_department_id'),
            'duty_place' => $this->input->post('duty_place'),
            'std_name' => $this->input->post('std_name'),
            'class_pass' => $this->input->post('class_pass'),
            'exam_pass' => $this->input->post('exam_pass'),
            'result_date' => $this->input->post('result_date'),
            'mo' => $this->input->post('mo'),
            'tm' => $this->input->post('tm'),
            'percentage' => $this->input->post('percentage'),
            'institute_name' => $this->input->post('institute_name'),
            'institute_add' => $this->input->post('institute_add'),
            'grant_amount' => $this->input->post('grant_amount'),
            'deduction' => $this->input->post('deduction'),
            'net_amount' => $this->input->post('net_amount'),
            'tbl_case_status_id' => $this->input->post('tbl_case_status_id'),
            'tbl_payment_mode_id' => $this->input->post('tbl_payment_mode_id'),
            'tbl_list_bank_branches_id' => $this->input->post('tbl_list_bank_branches_id'),
            'account_no' => $this->input->post('account_no'),
            'std_signature' => $this->input->post('std_signature'),
            'gov_servent_sign' => $this->input->post('gov_servent_sign'),
            'seal_institute' => $this->input->post('seal_institute'),
            'head_institute' => $this->input->post('head_institute'),
            'office_seal_hod' => $this->input->post('office_seal_hod'),
            'hod_sign' => $this->input->post('hod_sign'),
            'bank_verification' => $this->input->post('bank_verification'),
            'payroll_lpc_attach' => $this->input->post('payroll_lpc_attach'),
            'dmc_attach' => $this->input->post('dmc_attach'),
            'cnic_attach' => $this->input->post('cnic_attach'),
            'grade_attach' => $this->input->post('grade_attach'),
            'boards_approval' => $this->input->post('boards_approval'),
            'sent_to_secretary' => $this->input->post('sent_to_secretary'),
            'approve_secretary' => $this->input->post('approve_secretary'),
            'ac_edit' => $this->input->post('ac_edit'),
            'sent_to_bank' => $this->input->post('sent_to_bank'),
            'feedback_website' => $this->input->post('feedback_website'), 
			'record_add_by' => $_SESSION['admin_id'],
			'record_add_date' => date('Y-m-d H:i:s'),
		);
		//XSS prevention
		$data = $this->security->xss_clean($data); 
		//insertion in db
		$this->db->insert($this->table, $data); 
        //$error = $this->db->error(); 
        //echo '<br>error = ' . $error;
        $last_insert_id = $this->db->insert_id();
        //echo '<br>insertID = '. $last_insert_id; exit;
        
		if ($this->db->affected_rows() > 0) {
			// this is for activity log of a record
            $getDept = $this->common_model->getRecordById($this->input->post('tbl_department_id'), $tbl_name = 'tbl_department');
			$this->logger
				->record_add_by($_SESSION['admin_id']) //Set UserID, who created this  Action
				->tbl_name($this->table) //Entry table name
				->tbl_name_id($last_insert_id) //Entry table ID
				->action_type('add') //action type identify Action like add or update
				->detail(
					'<tr>' .
					'<td><strong>' . 'Department' . '</strong></td><td>' . $getDept['name'] . '</td>' .
					'<td><strong>' . 'Duty place' . '</strong></td><td>' . $this->input->post('duty_place') . '</td>' .
					'<td><strong>' . 'std name' . '</strong></td><td>' . $this->input->post('std_name') . '</td>' .
					'</tr>' .
					'<tr>' .
					'<td><strong>' . 'Class pass' . '</strong></td><td>' . $this->input->post('class_pass') . '</td>' .
					'<td><strong>' . 'Exam pass' . '</strong></td><td>' . $this->input->post('exam_pass') . '</td>' .
					'<td><strong>' . 'Result date' . '</strong></td><td>' . $result_date . '</td>' .
					'</tr>' .
					'<tr>' .
					'<td><strong>' . 'Marks Obtained' . '</strong></td><td>' . $this->input->post('mo') . '</td>' .
					'<td><strong>' . 'Total Marks' . '</strong></td><td>' . $this->input->post('tm') . '</td>' .
					'<td><strong>' . 'Percentage' . '</strong></td><td>' . $this->input->post('percentage') . '</td>' .
					'</tr>' .
					'<tr>' .
					'<td><strong>' . 'Institute name' . '</strong></td><td>' . $this->input->post('institute_name') . '</td>' .
					'<td><strong>' . 'institute address' . '</strong></td><td>' . $this->input->post('institute_add') . '</td>' .
					'<td><strong>' . 'grant amount' . '</strong></td><td>' . $this->input->post('grant_amount') . '</td>' .
					'</tr>' .
                    '<td><strong>' . 'deduction' . '</strong></td><td>' . $this->input->post('deduction') . '</td>' .
					'<td><strong>' . 'net amount' . '</strong></td><td>' . $this->input->post('net_amount') . '</td>' .
					'<td><strong>' . 'tbl_case_status_id' . '</strong></td><td>' . $this->input->post('tbl_case_status_id') . '</td>' .
                    '</tr>' .
                    '<td><strong>' . 'tbl_payment_mode_id' . '</strong></td><td>' . $this->input->post('tbl_payment_mode_id') . '</td>' .
					'<td><strong>' . 'tbl_list_bank_branches_id' . '</strong></td><td>' . $this->input->post('tbl_list_bank_branches_id') . '</td>' .
					'<td><strong>' . 'account_no' . '</strong></td><td>' . $this->input->post('account_no') . '</td>' .
                    '</tr>' .
                    '<td><strong>' . 'std_signature' . '</strong></td><td>' . $this->input->post('std_signature') . '</td>' .
					'<td><strong>' . 'gov_servent_sign' . '</strong></td><td>' . $this->input->post('gov_servent_sign') . '</td>' .
					'<td><strong>' . 'seal_institute' . '</strong></td><td>' . $this->input->post('seal_institute') . '</td>' .
                    '</tr>' .
                    '<td><strong>' . 'head_institute' . '</strong></td><td>' . $this->input->post('head_institute') . '</td>' .
					'<td><strong>' . 'office_seal_hod' . '</strong></td><td>' . $this->input->post('office_seal_hod') . '</td>' .
					'<td><strong>' . 'hod_sign' . '</strong></td><td>' . $this->input->post('hod_sign') . '</td>' .
                    '</tr>' .
                    '<td><strong>' . 'bank_verification' . '</strong></td><td>' . $this->input->post('bank_verification') . '</td>' .
					'<td><strong>' . 'payroll_lpc_attach' . '</strong></td><td>' . $this->input->post('payroll_lpc_attach') . '</td>' .
					'<td><strong>' . 'dmc_attach' . '</strong></td><td>' . $this->input->post('dmc_attach') . '</td>' .
                    '</tr>' .
                    '<td><strong>' . 'cnic_attach' . '</strong></td><td>' . $this->input->post('cnic_attach') . '</td>' .
					'<td><strong>' . 'grade_attach' . '</strong></td><td>' . $this->input->post('grade_attach') . '</td>' .
					'<td><strong>' . 'boards_approval' . '</strong></td><td>' . $this->input->post('boards_approval') . '</td>' .
                    '</tr>' .
                    '<td><strong>' . 'sent_to_secretary' . '</strong></td><td>' . $this->input->post('sent_to_secretary') . '</td>' .
					'<td><strong>' . 'approve_secretary' . '</strong></td><td>' . $this->input->post('approve_secretary') . '</td>' .
					'<td><strong>' . 'ac_edit' . '</strong></td><td>' . $this->input->post('ac_edit') . '</td>' .
                    '</tr>' .
                    '<td><strong>' . 'sent_to_bank' . '</strong></td><td>' . $this->input->post('sent_to_bank') . '</td>' .
					'<td><strong>' . 'feedback_website' . '</strong></td><td>' . $this->input->post('feedback_website') . '</td>' .
					'<td><strong>' . 'submit' . '</strong></td><td>' . $this->input->post('submit') . '</td>' .
                    '</tr>'  
				) //detail
				->log(); //Add Database Entry

			return true;
		} else {
			return false;
		}
	}

	public function update_emp_info() {

		$dob = date('Y-m-d', strtotime($this->input->post('dob')));

		$data = array(
			'grantee_name' => $this->input->post('grantee_name'),
			'father_name' => $this->input->post('father_name'),
			'dob' => $dob,
			'contact_no' => $this->input->post('contact_no'),
			'tbl_department_id' => $this->input->post('tbl_department_id'),
			'tbl_post_id' => $this->input->post('tbl_post_id'),
			'pay_scale' => $this->input->post('pay_scale'),
			'tbl_district_id' => $this->input->post('tbl_district_id'),
			'office_address' => $this->input->post('office_address'),
			'other_address' => $this->input->post('other_address'),
			'cnic_no' => $this->input->post('cnic_no'),
			'personnel_no' => $this->input->post('personnel_no'),
			'marital_status' => $this->input->post('marital_status'),
			'status' => $this->input->post('status'),
		);
		//XSS prevention
		$data = $this->security->xss_clean($data);

		$this->db->where('id', $this->input->post('id'));
		$result = $this->db->update($this->table, $data);

		if ($result == true) {
			// this is for activity log of a record
			$dob = date('d-m-Y', strtotime($dob));

			if ($this->input->post('status') == '1') {$status = 'Active';} else { $status = 'Inactive';}
			$getPost = $this->common_model->getRecordById($this->input->post('tbl_post_id'), $tbl_name = 'tbl_post');
			$getDept = $this->common_model->getRecordById($this->input->post('tbl_department_id'), $tbl_name = 'tbl_department');
			$getDistrict = $this->common_model->getRecordById($this->input->post('tbl_district_id'), $tbl_name = 'tbl_district');

			$this->logger
				->record_add_by($_SESSION['admin_id']) //Set UserID, who created this  Action
				->tbl_name($this->table) //Entry table name
				->tbl_name_id($this->input->post('id')) //Entry table ID
				->action_type('update') //action type identify Action like add or update
				->detail(
					'<tr>' .
					'<td><strong>' . 'Grantee Name' . '</strong></td><td>' . $this->input->post('grantee_name') . '</td>' .
					'<td><strong>' . 'Father Name' . '</strong></td><td>' . $this->input->post('father_name') . '</td>' .
					'<td><strong>' . 'Contact No' . '</strong></td><td>' . $this->input->post('contact_no') . '</td>' .
					'</tr>' .
					'<tr>' .
					'<td><strong>' . 'Marital Status' . '</strong></td><td>' . $this->input->post('marital_status') . '</td>' .
					'<td><strong>' . 'CNIC No' . '</strong></td><td>' . $this->input->post('cnic_no') . '</td>' .
					'<td><strong>' . 'Date Of Birth' . '</strong></td><td>' . $dob . '</td>' .
					'</tr>' .
					'<tr>' .
					'<td><strong>' . 'Personnel No' . '</strong></td><td>' . $this->input->post('personnel_no') . '</td>' .
					'<td><strong>' . 'District' . '</strong></td><td>' . $getDistrict['name'] . '</td>' .
					'<td><strong>' . 'Status' . '</strong></td><td>' . $status . '</td>' .
					'</tr>' .
					'<tr>' .
					'<td><strong>' . 'Department' . '</strong></td><td>' . $getDept['name'] . '</td>' .
					'<td><strong>' . 'Post' . '</strong></td><td>' . $getPost['name'] . '</td>' .
					'<td><strong>' . 'Pay Scale' . '</strong></td><td>' . $this->input->post('pay_scale') . '</td>' .
					'</tr>' .
					'<tr>' .
					'<td><strong>' . 'Office Address' . '</strong></td><td>' . $this->input->post('office_address') . '</td>' .
					'<td><strong>' . 'Other Address' . '</strong></td><td>' . $this->input->post('other_address') . '</td>' .
					'</tr>'
				) //detail
				->log(); //Add Database Entry

			return true;
		} else {
			return false;
		}
	}

	public function getRecordById($id) {
		$this->db->from($this->table);
		$this->db->where('id', $id);
		$query = $this->db->get();

		return $query->row();
	}

	//////////////// below ajax and server side processing datatable ///////////

	/*
		     * Fetch members data from the database
		     * @param $_POST filter data based on the posted parameters
	*/
	public function getRows($postData) {
		$this->_get_datatables_query($postData);
		if ($postData['length'] != -1) {
			$this->db->limit($postData['length'], $postData['start']);
		}
		$query = $this->db->get();
		return $query->result();
	}

	/*
		     * Count all records
	*/
	public function countAll() {
		$this->db->from($this->table);
		return $this->db->count_all_results();
	}

	/*
		     * Count records based on the filter params
		     * @param $_POST filter data based on the posted parameters
	*/
	public function countFiltered($postData) {
		$this->_get_datatables_query($postData);
		$query = $this->db->get();
		return $query->num_rows();
	}

	/*
		     * Perform the SQL queries needed for an server-side processing requested
		     * @param $_POST filter data based on the posted parameters
	*/
	private function _get_datatables_query($postData) {

		$this->db->from($this->table);

		$i = 0;
		// loop searchable columns
		foreach ($this->column_search as $item) {
			// if datatable send POST for search
			if ($postData['search']['value']) {
				// first loop
				if ($i === 0) {
					// open bracket
					$this->db->group_start();
					$this->db->like($item, $postData['search']['value']);
				} else {
					$this->db->or_like($item, $postData['search']['value']);
				}

				// last loop
				if (count($this->column_search) - 1 == $i) {
					// close bracket
					$this->db->group_end();
				}
			}
			$i++;
		}

		if (isset($postData['order'])) {
			$this->db->order_by($this->column_order[$postData['order']['0']['column']], $postData['order']['0']['dir']);
		} else if (isset($this->order)) {
			$order = $this->order;
			$this->db->order_by(key($order), $order[key($order)]);
		}
	}
	//////////////// above ajax and server side processing datatable ///////////

}
?>
<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Apply extends CI_Controller {

	public function __construct() {
		error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
		parent::__construct();
        $this->load->model('scholarship_model');
		// if ($_SESSION['tbl_admin_role_id'] != '1') {
		// 	$this->session->sess_destroy();
		// 	redirect('admin', 'refresh');
        // }
        
        $this->load->library('Upload');
    }
    

	public function scholarship_grant() {
         
		$data['page_title'] = 'APPLICATION FORM FOR MERIT SCHOLARSHIP';
		$data['description'] = '(KHYBER PAKHTUNKHWA GOVT. SERVANTS B/FUND PART-I & PART-II)';
		//$data['cases'] = $this->common_model->getAllRecordByArray('tbl_case_status', array('status' => '1'));
		$data['department'] = $this->common_model->getAllRecordByArray('tbl_department', array('status' => '1'));
        //$data['payment_modes'] = $this->common_model->getAllRecordByArray('tbl_payment_mode', array('status' => '1'));
        $data['banks'] = $this->common_model->getAllRecordByArray('tbl_list_bank_branches', array('status' => '1'));
        //$data['employees'] = $this->common_model->getAllRecordByArray('tbl_emp_info', array('status' => '1'));
        $data['scholarship_classes'] = $this->common_model->getAllRecordByArray('tbl_scholarship_classes', array('status' => '1'));
         

		if ($this->input->post('submit')) {

            //echo '<pre>'; print_r($_POST); 
            //echo '<pre>'; print_r($_FILES);
            //exit();

			$this->form_validation->set_rules('tbl_department_id', ucwords(str_replace('_', ' ', 'tbl_department_id')), 'required|xss_clean|trim');

			$this->form_validation->set_rules('duty_place', ucwords(str_replace('_', ' ', 'duty_place')), 'required|xss_clean|trim');

			$this->form_validation->set_rules('std_name', ucwords(str_replace('_', ' ', 'std_name')), 'required|xss_clean|trim|min_length[3]|max_length[20]');

            $this->form_validation->set_rules('class_pass', ucwords(str_replace('_', ' ', 'class_pass')), 'required|xss_clean|trim');

            $this->form_validation->set_rules('exam_pass', ucwords(str_replace('_', ' ', 'exam_pass')), 'required|xss_clean|trim');
            
            $this->form_validation->set_rules('result_date', ucwords(str_replace('_', ' ', 'result_date')), 'required|xss_clean|trim|min_length[3]|max_length[12]|alpha_dash', array('alpha_dash' => 'The %s field may only contain Date characters.'));

            $this->form_validation->set_rules('mo', ucwords(str_replace('_', ' ', 'mo')), 'required|xss_clean|trim');

            $this->form_validation->set_rules('tm', ucwords(str_replace('_', ' ', 'tm')), 'required|xss_clean|trim');
            $this->form_validation->set_rules('percentage', ucwords(str_replace('_', ' ', 'percentage')), 'required|xss_clean|trim');
            $this->form_validation->set_rules('institute_name', ucwords(str_replace('_', ' ', 'institute_name')), 'required|xss_clean|trim');
            $this->form_validation->set_rules('institute_add', ucwords(str_replace('_', ' ', 'institute_add')), 'required|xss_clean|trim');
            //$this->form_validation->set_rules('grant_amount', ucwords(str_replace('_', ' ', 'grant_amount')), 'required|xss_clean|trim');
            //$this->form_validation->set_rules('deduction', ucwords(str_replace('_', ' ', 'deduction')), 'required|xss_clean|trim');
            //$this->form_validation->set_rules('net_amount', ucwords(str_replace('_', ' ', 'net_amount')), 'required|xss_clean|trim');
            //$this->form_validation->set_rules('tbl_case_status_id', ucwords(str_replace('_', ' ', 'tbl_case_status_id')), 'required|xss_clean|trim');
            $this->form_validation->set_rules('tbl_payment_mode_id', ucwords(str_replace('_', ' ', 'tbl_payment_mode_id')), 'required|xss_clean|trim');
            
            $this->form_validation->set_rules('tbl_list_bank_branches_id', ucwords(str_replace('_', ' ', 'tbl_list_bank_branches_id')), 'required|xss_clean|trim');
            $this->form_validation->set_rules('account_no', ucwords(str_replace('_', ' ', 'account_no')), 'required|xss_clean|trim');
            $this->form_validation->set_rules('std_signature', ucwords(str_replace('_', ' ', 'std_signature')), 'required|xss_clean|trim');
            $this->form_validation->set_rules('gov_servent_sign', ucwords(str_replace('_', ' ', 'gov_servent_sign')), 'required|xss_clean|trim');
            
            //$this->form_validation->set_rules('payroll_lpc_attach', ucwords(str_replace('_', ' ', 'payroll_lpc_attach')), 'required|xss_clean|trim');
            //$this->form_validation->set_rules('dmc_attach', ucwords(str_replace('_', ' ', 'dmc_attach')), 'required|xss_clean|trim');
            //$this->form_validation->set_rules('cnic_attach', ucwords(str_replace('_', ' ', 'cnic_attach')), 'required|xss_clean|trim');
            //$this->form_validation->set_rules('grade_attach', ucwords(str_replace('_', ' ', 'grade_attach')), 'required|xss_clean|trim');
            
            
            // echo 'payRoll = ' . $_FILES['payRoll']['name'];
            // echo '<br>dmc = ' . $_FILES['dmc']['name'];
            // echo '<br>cnic = ' . $_FILES['cnic_govt_servant']['name'];
            // echo '<br>percentage = ' . $_FILES['percentage_certificate']['name'];
            // exit;



            if ($_FILES['payRoll']['name'] == '') {
				$this->form_validation->set_rules('payRoll', 'Image', 'required|xss_clean');
            }
            if ($_FILES['dmc']['name'] == '') {
				$this->form_validation->set_rules('dmc', 'Image', 'required|xss_clean');
            }
            if ($_FILES['cnic_govt_servant']['name'] == '') {
				$this->form_validation->set_rules('cnic_govt_servant', 'Image', 'required|xss_clean');
            }
            if ($_FILES['percentage_certificate']['name'] == '') {
				$this->form_validation->set_rules('percentage_certificate', 'Image', 'required|xss_clean');
            }
            

            
            //$this->form_validation->set_rules('seal_institute', ucwords(str_replace('_', ' ', 'seal_institute')), 'required|xss_clean|trim');
            //$this->form_validation->set_rules('head_institute', ucwords(str_replace('_', ' ', 'head_institute')), 'required|xss_clean|trim');
            //$this->form_validation->set_rules('office_seal_hod', ucwords(str_replace('_', ' ', 'office_seal_hod')), 'required|xss_clean|trim');

            //$this->form_validation->set_rules('hod_sign', ucwords(str_replace('_', ' ', 'hod_sign')), 'required|xss_clean|trim');
            //$this->form_validation->set_rules('bank_verification', ucwords(str_replace('_', ' ', 'bank_verification')), 'required|xss_clean|trim');
            
            
            
            // $this->form_validation->set_rules('sent_to_secretary', ucwords(str_replace('_', ' ', 'sent_to_secretary')), 'required|xss_clean|trim');
            // $this->form_validation->set_rules('approve_secretary', ucwords(str_replace('_', ' ', 'approve_secretary')), 'required|xss_clean|trim');

            // $this->form_validation->set_rules('ac_edit', ucwords(str_replace('_', ' ', 'ac_edit')), 'required|xss_clean|trim');
            // $this->form_validation->set_rules('sent_to_bank', ucwords(str_replace('_', ' ', 'sent_to_bank')), 'required|xss_clean|trim');
            // $this->form_validation->set_rules('feedback_website', ucwords(str_replace('_', ' ', 'feedback_website')), 'required|xss_clean|trim'); 

  

			$this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
			if ($this->form_validation->run() === FALSE) {
				$this->load->view('templates/web-header', $data);
				$this->load->view('apply/scholarship_grant', $data);
				$this->load->view('templates/web-footer');
			} else {
                //echo 'i m here'; exit;
                // to model
                

                $fileUploadPayRoll = new \Verot\Upload\Upload($_FILES['payRoll']);
				if ($fileUploadPayRoll->uploaded) {
					$fileUploadPayRoll->file_auto_rename = true;
					$fileUploadPayRoll->mime_check = true; 
					$fileUploadPayRoll->process('./assets/upload/scholarships');
					if ($fileUploadPayRoll->processed == true) {
						$payRoll = $fileUploadPayRoll->file_dst_name;
						$fileUploadPayRoll->clean();
					} else {
						$this->session->set_flashdata('img_upload_error', $fileUploadPayRoll->error);
						redirect(base_url('apply-for-scholarship-grant'));
					}
				} else {
					$this->session->set_flashdata('img_upload_error', $fileUploadPayRoll->error);
					redirect(base_url('apply-for-scholarship-grant'));
                }



                $fileUploadDMC = new \Verot\Upload\Upload($_FILES['dmc']);
				if ($fileUploadDMC->uploaded) {
					$fileUploadDMC->file_auto_rename = true;
					$fileUploadDMC->mime_check = true; 
					$fileUploadDMC->process('./assets/upload/scholarships');
					if ($fileUploadDMC->processed == true) {
						$DMC = $fileUploadDMC->file_dst_name;
						$fileUploadDMC->clean();
					} else {
						$this->session->set_flashdata('img_upload_error', $fileUploadDMC->error);
						redirect(base_url('apply-for-scholarship-grant'));
					}
				} else {
					$this->session->set_flashdata('img_upload_error', $fileUploadDMC->error);
					redirect(base_url('apply-for-scholarship-grant'));
                }
                

                
                $fileUploadCNIC  = new \Verot\Upload\Upload($_FILES['cnic_govt_servant']);
				if ($fileUploadCNIC->uploaded) {
					$fileUploadCNIC->file_auto_rename = true;
					$fileUploadCNIC->mime_check = true; 
					$fileUploadCNIC->process('./assets/upload/scholarships');
					if ($fileUploadCNIC->processed == true) {
						$CNIC = $fileUploadCNIC->file_dst_name;
						$fileUploadCNIC->clean();
					} else {
						$this->session->set_flashdata('img_upload_error', $fileUploadCNIC->error);
						redirect(base_url('apply-for-scholarship-grant'));
					}
				} else {
					$this->session->set_flashdata('img_upload_error', $fileUploadCNIC->error);
					redirect(base_url('apply-for-scholarship-grant'));
                }
                

                $fileUploadGrade  = new \Verot\Upload\Upload($_FILES['percentage_certificate']);
				if ($fileUploadGrade->uploaded) {
					$fileUploadGrade->file_auto_rename = true;
					$fileUploadGrade->mime_check = true; 
					$fileUploadGrade->process('./assets/upload/scholarships');
					if ($fileUploadGrade->processed == true) {
						$Grade = $fileUploadGrade->file_dst_name;
						$fileUploadGrade->clean();
					} else {
						$this->session->set_flashdata('img_upload_error', $fileUploadGrade->error);
						redirect(base_url('apply-for-scholarship-grant'));
					}
				} else {
					$this->session->set_flashdata('img_upload_error', $fileUploadGrade->error);
					redirect(base_url('apply-for-scholarship-grant'));
                }
                
                $filesUploaded = array('payRoll'=>$payRoll, 'dmc' => $DMC, 'cnic' => $CNIC, 'grade' => $Grade);
                //echo '<pre>'; print_r($filesUploaded); exit;
                //$payRoll, $DMC, $CNIC, $Grade
				$this->scholarship_model->apply_scholarship_grant($filesUploaded);
				// set session message
				$this->session->set_flashdata('custom', 'Thank you for applying to the scholarship grant, application number has been sent to you in email.');
				redirect(base_url('apply-for-scholarship-grant'));
			}
		} else {
			$this->load->view('templates/web-header', $data);
			$this->load->view('apply/scholarship_grant');
			$this->load->view('templates/web-footer');
		}

    }
    

    public function edit_scholarship_grant($id = null) {
        
        
        //echo 'id = '. $id; exit();

		$data['page_title'] = 'Edit Scholarship Grant';
        $data['description'] = '...';
        $data['all'] = $this->common_model->getRecordById($id, 'tbl_scholaarship_grant');
		$data['cases'] = $this->common_model->getAllRecordByArray('tbl_case_status', array('status' => '1'));
		$data['department'] = $this->common_model->getAllRecordByArray('tbl_department', array('status' => '1'));
        $data['payment_modes'] = $this->common_model->getAllRecordByArray('tbl_payment_mode', array('status' => '1'));
        $data['banks'] = $this->common_model->getAllRecordByArray('tbl_list_bank_branches', array('status' => '1'));
        $data['employees'] = $this->common_model->getAllRecordByArray('tbl_emp_info', array('status' => '1'));
        $data['scholarship_classes'] = $this->common_model->getAllRecordByArray('tbl_scholarship_classes', array('status' => '1'));
          
        
        $data['emp_info'] = $this->emp_info_model->getRecordById($data['all']['tbl_emp_info_id']);
        //print_r($data['emp_info']); exit(); 

		if ($this->input->post('submit')) {

			$this->form_validation->set_rules('tbl_department_id', ucwords(str_replace('_', ' ', 'tbl_department_id')), 'required|xss_clean|trim');
            $this->form_validation->set_rules('duty_place', ucwords(str_replace('_', ' ', 'duty_place')), 'required|xss_clean|trim');
			$this->form_validation->set_rules('std_name', ucwords(str_replace('_', ' ', 'std_name')), 'required|xss_clean|trim|min_length[3]|max_length[20]');
            $this->form_validation->set_rules('class_pass', ucwords(str_replace('_', ' ', 'class_pass')), 'required|xss_clean|trim');
            $this->form_validation->set_rules('exam_pass', ucwords(str_replace('_', ' ', 'exam_pass')), 'required|xss_clean|trim');
            $this->form_validation->set_rules('result_date', ucwords(str_replace('_', ' ', 'result_date')), 'required|xss_clean|trim|min_length[3]|max_length[12]|alpha_dash', array('alpha_dash' => 'The %s field may only contain Date characters.'));
            $this->form_validation->set_rules('mo', ucwords(str_replace('_', ' ', 'mo')), 'required|xss_clean|trim');
            $this->form_validation->set_rules('tm', ucwords(str_replace('_', ' ', 'tm')), 'required|xss_clean|trim');
            $this->form_validation->set_rules('percentage', ucwords(str_replace('_', ' ', 'percentage')), 'required|xss_clean|trim');
            $this->form_validation->set_rules('institute_name', ucwords(str_replace('_', ' ', 'institute_name')), 'required|xss_clean|trim');
            $this->form_validation->set_rules('institute_add', ucwords(str_replace('_', ' ', 'institute_add')), 'required|xss_clean|trim');
            $this->form_validation->set_rules('grant_amount', ucwords(str_replace('_', ' ', 'grant_amount')), 'required|xss_clean|trim');
            $this->form_validation->set_rules('deduction', ucwords(str_replace('_', ' ', 'deduction')), 'required|xss_clean|trim');
            $this->form_validation->set_rules('net_amount', ucwords(str_replace('_', ' ', 'net_amount')), 'required|xss_clean|trim');
            $this->form_validation->set_rules('tbl_case_status_id', ucwords(str_replace('_', ' ', 'tbl_case_status_id')), 'required|xss_clean|trim');
            $this->form_validation->set_rules('tbl_payment_mode_id', ucwords(str_replace('_', ' ', 'tbl_payment_mode_id')), 'required|xss_clean|trim');
            
            $this->form_validation->set_rules('tbl_list_bank_branches_id', ucwords(str_replace('_', ' ', 'tbl_list_bank_branches_id')), 'required|xss_clean|trim');
            $this->form_validation->set_rules('account_no', ucwords(str_replace('_', ' ', 'account_no')), 'required|xss_clean|trim');
            $this->form_validation->set_rules('std_signature', ucwords(str_replace('_', ' ', 'std_signature')), 'required|xss_clean|trim');
            $this->form_validation->set_rules('gov_servent_sign', ucwords(str_replace('_', ' ', 'gov_servent_sign')), 'required|xss_clean|trim');
            $this->form_validation->set_rules('seal_institute', ucwords(str_replace('_', ' ', 'seal_institute')), 'required|xss_clean|trim');
            $this->form_validation->set_rules('head_institute', ucwords(str_replace('_', ' ', 'head_institute')), 'required|xss_clean|trim');
            $this->form_validation->set_rules('office_seal_hod', ucwords(str_replace('_', ' ', 'office_seal_hod')), 'required|xss_clean|trim');

            $this->form_validation->set_rules('hod_sign', ucwords(str_replace('_', ' ', 'hod_sign')), 'required|xss_clean|trim');
            $this->form_validation->set_rules('bank_verification', ucwords(str_replace('_', ' ', 'bank_verification')), 'required|xss_clean|trim');
            $this->form_validation->set_rules('payroll_lpc_attach', ucwords(str_replace('_', ' ', 'payroll_lpc_attach')), 'required|xss_clean|trim');
            $this->form_validation->set_rules('dmc_attach', ucwords(str_replace('_', ' ', 'dmc_attach')), 'required|xss_clean|trim');
            $this->form_validation->set_rules('cnic_attach', ucwords(str_replace('_', ' ', 'cnic_attach')), 'required|xss_clean|trim');
            $this->form_validation->set_rules('grade_attach', ucwords(str_replace('_', ' ', 'grade_attach')), 'required|xss_clean|trim');
            // $this->form_validation->set_rules('sent_to_secretary', ucwords(str_replace('_', ' ', 'sent_to_secretary')), 'required|xss_clean|trim');
            // $this->form_validation->set_rules('approve_secretary', ucwords(str_replace('_', ' ', 'approve_secretary')), 'required|xss_clean|trim');

            // $this->form_validation->set_rules('ac_edit', ucwords(str_replace('_', ' ', 'ac_edit')), 'required|xss_clean|trim');
            // $this->form_validation->set_rules('sent_to_bank', ucwords(str_replace('_', ' ', 'sent_to_bank')), 'required|xss_clean|trim');
            // $this->form_validation->set_rules('feedback_website', ucwords(str_replace('_', ' ', 'feedback_website')), 'required|xss_clean|trim'); 

  

			$this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
			if ($this->form_validation->run() === FALSE) {
				$this->load->view('templates/header', $data);
				$this->load->view('scholarships/edit_scholarship_grant', $data);
				$this->load->view('templates/footer');
			} else { 
				$this->scholarship_model->edit_scholarship_grant(); 
				$this->session->set_flashdata('updated', '!');
				redirect(base_url('view_scholarship_grants'));
			}
		} else {
			$this->load->view('templates/header', $data);
			$this->load->view('scholarships/edit_scholarship_grant');
			$this->load->view('templates/footer');
		}

	}


	public function getData($id) {
		$data = $this->scholarship_model->getRecordById($id);
		echo json_encode($data);
    }
    
    
    public function getAmountData($id) {
		$data = $this->scholarship_model->getAmountData($id);
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
		$scholarshipData = $this->scholarship_model->getRows($_POST);
        //echo '<pre>'; print_r($scholarshipData); exit;

		$i = $_POST['start'];
		foreach ($scholarshipData as $scholarshipInfo) {
			$i++;
			$status = ($scholarshipInfo->status == 1) ? '<span class="label label-success">Active</span>' : '<span class="label label-danger">Inactive</span>';

			$getRole = $this->admin->getRecordById($scholarshipInfo->record_add_by, $tbl_name = 'tbl_admin');
			$recordAddDate = $scholarshipInfo->record_add_date;
			$recordAddDate = date("d-M-Y", strtotime($recordAddDate));

            $class_pass = $scholarshipInfo->class_pass;
            $exam_pass = $scholarshipInfo->exam_pass;
            $result_date = $scholarshipInfo->result_date;

			$add_by_date = '<i>Add by <strong>' . $getRole['name'] . '</strong> on <strong>' . $recordAddDate . '</strong></i>';

			$actionBtn = '<a href="' . site_url('common/logger/' . $scholarshipInfo->id . '/tbl_scholaarship_grant') . '">
                      <button type="button"class="btn btn-sm btn-xs btn-primary"><i class="fa fa-history"></i></button>
                      </a>';
			// '<a href="javascript:void(0)" onclick="getData(' . "'" . $scholarshipInfo->id . "'" . ')">
            //           <button type="button" id="item_edit" class="item_edit btn btn-sm btn-xs btn-warning"><i class="fa fa-edit"></i></button>
            //           </a>';
			$actionBtn .= '<a href="' . site_url('scholarship/edit_scholarship_grant/' . $scholarshipInfo->id) . '">
			                   <button type="button" class="item_edit btn btn-sm btn-xs btn-warning"><i class="fa fa-edit"></i></button>
                               </a>';
             
            
            $getDept = $this->common_model->getRecordById($scholarshipInfo->parent_dept, $tbl_name = 'tbl_department');
			$data[] = array($i, $scholarshipInfo->std_name, $getDept['name'], $class_pass, $exam_pass, $result_date,  $status, $add_by_date, $actionBtn);
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

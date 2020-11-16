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
    

    public function track_application() {
         
		$data['page_title'] = 'TRACK YOUR APPLICATION';
        $data['description'] = '...';
        $appNo = $this->input->post('application_no');
        $data['application_no'] = $appNo;
        //echo '<pre>'; print_r($_POST); exit;
        if ($this->input->post('submit')) {

			$this->form_validation->set_rules('application_no', ucwords(str_replace('_', ' ', 'application_no')), 'required|xss_clean|trim');

            $this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
			if ($this->form_validation->run() === FALSE) {
				$this->load->view('templates/web-header', $data);
				$this->load->view('apply/track_application', $data);
				$this->load->view('templates/web-footer');
			} else {
                //echo 'i m here'; exit;
                $data['exists'] = $this->common_model->getRecordByColoumn('tbl_grants_has_tbl_emp_info_gerund', 'application_no', $appNo);
                //echo '<pre>'; print_r($app_table); exit;
                $this->load->view('templates/web-header', $data);
				$this->load->view('apply/track_application', $data);
				$this->load->view('templates/web-footer');
            }
            

        }
        else {
			$this->load->view('templates/web-header', $data);
			$this->load->view('apply/track_application');
			$this->load->view('templates/web-footer');
		}

    }
    
}


?>

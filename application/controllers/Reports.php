<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Reports extends MY_Controller {

	public function __construct() {
		error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
        parent::__construct(); 
        
        //$this->load->model('reports_model');
    } 
    
    
	 
	public function view_reports() { 
        
        $data['grants'] = $this->common_model->getAllRecords('tbl_grants');
        $data['statuses'] = $this->common_model->getAllRecords('tbl_case_status');
        $data['banks'] = $this->common_model->getAllRecords('tbl_list_bank_branches');
        $data['applications'] = $this->common_model->getAllRecordByArray('tbl_grants_has_tbl_emp_info_gerund', null);
        
		$data['page_title'] = 'View All Reports';
        $data['description'] = '...'; 

		$this->load->view('templates/header', $data);
		$this->load->view('reports/view_reports', $data);
		$this->load->view('templates/footer');
	}

	public function get_reports() {  
        $postData = $this->input->post();
        //echo '<pre>'; var_dump($postData);
        $data = $this->reports_model->get_listing_reports($postData);
		echo json_encode($data);
    }
    
    public function create_batch() {  
        $postData = $this->input->post();
        //echo '<pre>'; print_r($postData); //exit;

        if($postData['action'] == 'btnCreateBatch'){
            
            $countSelected = count($this->input->post('selectall'));
            //echo 'countSelected = '. $countSelected;
            if($countSelected > 0) {

                $this->reports_model->add_batch($this->input->post('selectall'));
				// set session message
				$this->session->set_flashdata('custom', 'Batch created successfully!');
				redirect(base_url('reports'));

            } else {
                $this->session->set_flashdata('error_custom', 'Please select some applications to proceed!');
				redirect(base_url('reports'));
            }
        } 
    }

}
?>

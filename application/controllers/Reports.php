<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Reports extends MY_Controller {

	public function __construct() {
		error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
		parent::__construct(); 
	} 
	 
	public function view_reports() {

		$data['page_title'] = 'View All Reports';
		$data['description'] = '...';
		$this->load->view('templates/header', $data);
		$this->load->view('reports/view_reports', $data);
		$this->load->view('templates/footer');
	}

	public function get_reports() {

		$data = $row = array();

		// Fetch district's records
		$districtData = $this->district_model->getRows($_POST);

		$i = $_POST['start'];
		foreach ($districtData as $districtInfo) {
			$i++;
			$status = ($districtInfo->status == 1) ? '<span class="label label-success">Active</span>' : '<span class="label label-danger">Inactive</span>';

			$getRole = $this->admin->getRecordById($districtInfo->record_add_by, $tbl_name = 'tbl_admin');
			$recordAddDate = $districtInfo->record_add_date;
			$recordAddDate = date("d-M-Y", strtotime($recordAddDate));

			$add_by_date = 'Add by <i><strong>' . $getRole['name'] . '</strong> on <strong>' . $recordAddDate . '</strong></i>';

			$actionBtn = '<a href="' . site_url('common/logger/' . $districtInfo->id . '/tbl_district') . '">
                      <button type="button"class="btn btn-sm btn-xs btn-primary"><i class="fa fa-history"></i></button>
                      </a>' .
			'<a href="javascript:void(0)" onclick="getData(' . "'" . $districtInfo->id . "'" . ')">
                      <button type="button" id="item_edit" class="item_edit btn btn-sm btn-xs btn-warning"><i class="fa fa-edit"></i></button>
                      </a>';
			// $actionBtn = '<a href="' . site_url('district/edit_district/' . $districtInfo->id) . '">
			//                    <button type="button" class="item_edit btn btn-sm btn-xs btn-warning"><i class="fa fa-edit"></i></button>
			//                    </a>';
			$data[] = array($i, $districtInfo->name, $status, $add_by_date, $actionBtn);
		}

		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->district_model->countAll(),
			"recordsFiltered" => $this->district_model->countFiltered($_POST),
			"data" => $data,
		);

		// Output to JSON format
		echo json_encode($output);
	}
}
?>

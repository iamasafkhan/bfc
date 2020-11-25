<?php
class Batches_model extends CI_Model {
	public function __construct() {
        $this->load->database();  
        //tbl_grants_has_tbl_emp_info_gerund
        $this->table = 'tbl_batches';
		// Set orderable column fields
		//$this->column_order = array(null, 'name', 'status');
		// Set searchable column fields
		//$this->column_search = array('name');
		// Set default order
		$this->order = array('id' => 'desc');
	}

    public function get_batches($postData = null) {
        //echo 'i m here'; exit;
        $this->db->select('COUNT(id) AS applications, batch_no, application_no, record_add_date, record_add_by, status');
        $this->db->from('tbl_batches');  
        $this->db->group_by('batch_no'); 
        $this->order = array('id' => 'desc');  
        $query = $this->db->get();
        return $query->result(); 
    }


    public function get_batch_applications($id = null) {
        //echo 'i m here';
        $this->db->from('tbl_batches'); 
        $this->db->where('batch_no', $id);    
        $this->order = array('id' => 'desc');  
        $query = $this->db->get();
        return $query->result(); 

    }


    public function add_transaction() {

		$data = array(
            'application_no' => $this->input->post('application_no'),
            'amount' => $this->input->post('amount'),
			'bank_transaction_id' => $this->input->post('bank_transaction_id'),
            'date_added' => date('Y-m-d'),
            'added_by' => $_SESSION['admin_id'], 
		);
		//XSS prevention
		$data = $this->security->xss_clean($data);

		//insertion in db
		$this->db->insert('tbl_transactions', $data);
		$last_insert_id = $this->db->insert_id();

		if ($this->db->affected_rows() > 0) {  
			return true;
		} else {
			return false;
		}
	}



    // Get DataTable data
	function get_listing_reports($postData = null) {
 
		$response = array();

		## Read value
		$draw = $postData['draw'];
		$start = $postData['start'];
		$rowperpage = $postData['length']; // Rows display per page
		$columnIndex = $postData['order'][0]['column']; // Column index
		$columnName = $postData['columns'][$columnIndex]['data']; // Column name
		$columnSortOrder = $postData['order'][0]['dir']; // asc or desc
		$searchValue = $postData['search']['value']; // Search value

		// Custom search filter
		$from_date = $postData['from_date'];
		$to_date = $postData['to_date']; 
		$tbl_grants_id = $postData['tbl_grants_id'];
		$status = $postData['status'];
        $from_app_no = $postData['from_app_no'];
        $to_app_no = $postData['to_app_no'];
        //$tbl_bank_id = $postData['tbl_bank_id'];
        //$keyword = $postData['keyword'];



		## Search
		$search_arr = array();
		$searchQuery = "";
 
		if ($from_date != '' && $to_date != '') {
			$from_date = date('Y-m-d', strtotime($postData['from_date']));
			$to_date = date('Y-m-d', strtotime($postData['to_date']));
			$search_arr[] = " date_added BETWEEN '" . $from_date . "' and '" . $to_date . "' ";
		}
		if ($status != '') {
			$search_arr[] = " status = '" . $status . "' ";
		}

		if ($tbl_grants_id != '') {
			$search_arr[] = " tbl_grants_id = '" . $tbl_grants_id . "' ";
        }
        
        if($from_app_no != '' && $to_app_no == '') {
            $search_arr[] = " application_no >= '" . $from_app_no . "'";
        }
        if($from_app_no == '' && $to_app_no != '') {
            $search_arr[] = " application_no <= '" . $to_app_no . "'";
        }
        if($from_app_no != '' && $to_app_no != '') {
            $search_arr[] = " application_no BETWEEN '" . $from_app_no . "' and '" . $to_app_no . "' ";
        }

		if (count($search_arr) > 0) {
			$searchQuery = implode(" and ", $search_arr);
        }
        
        


		## Total number of records without filtering
		$this->db->select('count(*) as allcount');
	 
		$records = $this->db->get('tbl_grants_has_tbl_emp_info_gerund')->result();
		$totalRecords = $records[0]->allcount;

		## Total number of record with filtering
		$this->db->select('count(*) as allcount');
		if ($searchQuery != '') {
			$this->db->where($searchQuery);
		}
	 
		$records = $this->db->get('tbl_grants_has_tbl_emp_info_gerund')->result();
		$totalRecordwithFilter = $records[0]->allcount;
		## Fetch records
		$this->db->select('*');
		if ($searchQuery != '') {
			$this->db->where($searchQuery);
		} 

		$this->db->order_by($columnName, $columnSortOrder);
		$this->db->limit($rowperpage, $start);
		$this->db->order_by('id', 'desc');
		$records = $this->db->get('tbl_grants_has_tbl_emp_info_gerund')->result();

        //echo '<pre>'; print_r($records); exit;

		$data = array();
		$i = 1;
		foreach ($records as $record) {

			if ($record->status == 1) {
				$status = '<span class="label label-primary">Inprocess</span>';
			} else if ($record->status == 2) {
				$status = '<span class="label label-success">Complete</span>';
			} else if ($record->status == 3) {
				$status = '<span class="label label-danger">Rejected / Not Approved</span>';
			} else if ($record->status == 4) {
                $status = '<span class="label label-success">Approved</span>';
            }
            
            

            $applicationNo = $record->application_no;

            $grantID = $record->tbl_grants_id; 
            $getGrantDetails = $this->common_model->getRecordByColoumn('tbl_grants', 'id', $grantID);
            $grant_type = $getGrantDetails['name'];
            //$grant_tbl_name = $getGrantDetails['tbl_name'];
            

            $empID = $record->tbl_emp_info_id;   
            $getGrant  = $this->common_model->getRecordByColoumn('tbl_emp_info', 'id', $empID);
            $applicant_name = $getGrant['grantee_name'];

            
            $recordAddDate = date("d-M-Y", strtotime($record->date_added)); 
 
            $input = '<input type="checkbox" name="selectall[]" id="selectall" value="'.$applicationNo.'">';
            
			$data[] = array(
                "checkbox" => $input, 
                "no" => $i, 
				"applicationNo" => $applicationNo,
				"GrantType" => $grant_type,
				"GranteeName" => $applicant_name, 
				"DateAdded" => $recordAddDate, 
				"status" => $status
			);
			$i++;
		}

		## Response
		$response = array(
			"draw" => intval($draw),
			"iTotalRecords" => $totalRecords,
			"iTotalDisplayRecords" => $totalRecordwithFilter,
			"aaData" => $data,
		);

		return $response;
	}

    function update_application_status() {
        
        //echo '<pre>'; print_r($this->input->post()); exit();
        $apps = $this->input->post('app_no');
        $btnSubmit = $this->input->post('btnSubmit');
        $batch_no = $this->input->post('batch_no');

        if($btnSubmit == 'approve') {
            $status = '4';
        } else if($btnSubmit == 'reject') {
            $status = '5';
        } else if($btnSubmit == 'cancel') {
            $status = '6';
        } 
        
        foreach ($apps as $key => $application_no) {
            $data = array( 
                'status' => $status,
            );
            //XSS prevention
            $data = $this->security->xss_clean($data);
            //updation in db
            $this->db->where('application_no', $application_no);
            $this->db->where('batch_no', $batch_no);
            $result = $this->db->update('tbl_batches', $data);
            if ($result == true) { 
                return true;
            } else {
                return false;
            }
        } 
        
    }

    //Create Batch
    function add_batch($postData = null) {
     
        $batch_no = date('YmdHisu');
       
        foreach ($postData as $key => $value) { 
            $data = array( 
                'batch_no'=> $batch_no, 
                'application_no' => $value,  
                'record_add_date' => date('Y-m-d H:i:s'),
                'record_add_by' => $_SESSION['admin_id'],
                'status' => '3',
            );
            $this->db->insert('tbl_batches', $data); 
        }

        return true;

        //echo '<pre>'; print_r()

        //$data = array('postData' => $postData);
        //$this->db->insert('tbl_batches', $data); 

    }
	  
	//////////////// below ajax and server side processing datatable ///////////

	/*
		     * Fetch members data from the database
		     * @param $_POST filter data based on the posted parameters
	*/
	public function getRows($postData) {
        //return $postData;

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
        if (!($_SESSION['tbl_admin_role_id'] == '1') && !($_SESSION['tbl_admin_role_id'] == '7') && !($_SESSION['tbl_admin_role_id'] == '2')) {
            $this->db->where('record_add_by', $_SESSION['admin_id']);
        }
		return $this->db->count_all_results();
	}

	/*
		     * Count records based on the filter params
		     * @param $_POST filter data based on the posted parameters
	*/
	public function countFiltered($postData) {
        $this->_get_datatables_query($postData);
        if (!($_SESSION['tbl_admin_role_id'] == '1') && !($_SESSION['tbl_admin_role_id'] == '7') && !($_SESSION['tbl_admin_role_id'] == '2')) {
            $this->db->where('record_add_by', $_SESSION['admin_id']);
        }
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
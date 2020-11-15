<?php
// $admin_detail = $this->admin->getRecordById($_SESSION['admin_id'], $tbl_name = 'tbl_admin');
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <?php $this->load->view('templates/alerts'); ?>

        <h1>
            <?php echo ucwords(str_replace('_', ' ', $page_title)); ?>
            <small><?php echo ucwords(str_replace('_', ' ', $description)); ?></small>
        </h1>

    </section>

    <section class="content" style="min-height: 0;">
        <div class="box box-success">
            <div class="box-body">
                <div class="row">
                    <!-- /.col -->
                    <div class="col-md-3">
                        <div class="form-group">
                            <label><?php echo $label = ucwords('from Date'); ?>:</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>

                                <input type="text" readonly autocomplete="off" value="" name="from_date" id="from_date" class="form-control validate[required,minSize[1]" placeholder="Enter <?php echo $label; ?>" />
                            </div><?php echo form_error('from_date'); ?>
                        </div>

                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label><?php echo $label = ucwords('to Date'); ?>:</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>

                                <input type="text" readonly autocomplete="off" value="" name="to_date" id="to_date" class="form-control validate[required,minSize[1]" placeholder="Enter <?php echo $label; ?>" />
                            </div><?php echo form_error('to_date'); ?>
                        </div>

                    </div>

                    <div class="col-md-3">

                        <div class="form-group">
                            <label><?php echo $label = ucwords('grants'); ?>:</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-user"></i>
                                </div>
                                <select name="tbl_grants_id" id="tbl_grants_id" class="form-control select2 validate[required]">
                                    <option value="">Select Grants</option>
                                    <?php foreach ($grants as $grant) : ?>
                                        <option value="<?php echo $grant['id']; ?>"><?php echo $grant['name']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div><?php echo form_error('tbl_grants_id'); ?>
                        </div>

                    </div>

                    <div class="col-md-3">

                        <div class="form-group">
                            <label><?php echo $label = ucwords('status'); ?>:</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-user"></i>
                                </div>

                                <select name="status" id="status" class="form-control select2 validate[required]">
                                    <option value="">Select Status</option>
                                    <option value="2">Pending/ Inprocess</option>
                                    <option value="1">Approve for Inspection</option>
                                    <option value="0">Rejected / Not Approved</option>
                                    <option value="4">Approved</option>
                                </select>
                            </div><?php echo form_error('status'); ?>
                        </div>

                    </div>

                </div>

                <div class="row">
                    <!-- /.col -->
                    <div class="col-md-3">
                        <div class="form-group">
                            <label><?php echo $label = ucwords('from Application No'); ?>:</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-file"></i>
                                </div>

                                <input type="text" autocomplete="off" value="" name="from_app_no" id="from_app_no" class="form-control" placeholder="Enter <?php echo $label; ?>" />
                            </div><?php echo form_error('from_app_no'); ?>
                        </div>

                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label><?php echo $label = ucwords('to Application No'); ?>:</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-file"></i>
                                </div>

                                <input type="text" autocomplete="off" value="" name="to_app_no" id="to_app_no" class="form-control" placeholder="Enter <?php echo $label; ?>" />
                            </div><?php echo form_error('to_app_no'); ?>
                        </div>

                    </div>

                    <div class="col-md-3">

                        <div class="form-group">
                            <label><?php echo $label = ucwords('Banks'); ?>:</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-building"></i>
                                </div>
                                <select name="tbl_bank_id" id="tbl_bank_id" class="form-control select2">
                                    <option value="">Select Banks</option>
                                    <?php foreach ($banks as $bank) : ?>
                                        <option value="<?php echo $bank['id']; ?>"><?php echo $bank['name']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div><?php echo form_error('tbl_bank_id'); ?>
                        </div>

                    </div>

                    <div class="col-md-3">

                        <div class="form-group">
                            <label><?php echo $label = ucwords('keyword'); ?>:</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-user"></i>
                                </div>

                                <input type="text" autocomplete="off" value="" name="keyword" id="keyword" class="form-control" placeholder="Enter <?php echo $label; ?>" />
                            </div><?php echo form_error('keyword'); ?>
                        </div>

                    </div>

                </div>

                <!-- /.row -->
            </div>

        </div>
    </section>


    
    <section class="content">
        <div class="box box-success">
            <div class="box-header">
                <h3 class="box-title pull-left"><?php echo ucwords(str_replace('_', ' ', 'Generated Report')); ?></h3>
                <input type="button" class="btn btn-sm btn-primary pull-right" value="Create Batch" name="create_batch">
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
                <table class="table no-margin">
                    <thead>
                        <tr>
                            <th><input type="checkbox" name="checkall" id="checkall" value="1"></th>
                            <th>Application No</th>
                            <th>Applicant Name</th>
                            <th>Grant Type</th>
                            <th>Status</th>
                            <th>Entry Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($applications as $application) {

                            $tbl_grants_id = $application['tbl_grants_id'];
                            $tbl_emp_info_id = $application['tbl_emp_info_id'];
                            $application_no = $application['application_no'];

                            $getTblName = $this->common_model->getRecordByColoumn('tbl_grants', 'id', $tbl_grants_id);
                            $grant_tbl_name = $getTblName['tbl_name'];
                            $grant_type = $getTblName['name'];

                            $getGrant  = $this->common_model->getRecordByColoumn($grant_tbl_name, 'application_no', $application_no);
                            $applicant_name = $getGrant['grantee_name'];
                            $entry_date = $getGrant['record_add_date'];
                            $tbl_case_status = $getGrant['tbl_case_status'];

                            $getStatus  = $this->common_model->getRecordByColoumn('tbl_case_status', 'id', $tbl_case_status);
                            $statusName = $getStatus['name'];
                            $statusLabel = $getStatus['label'];
                            $status = '<span class="' . $statusLabel . '">' . $statusName . '</span>';

                            //$applicant = $this->common_model->getRecordById($id, $tbl_name);
                        ?>
                            <tr>
                                <th><input type="checkbox" id="application_no" name="application_no[]" value="1" id="example-select-all"></th>
                                <td><a href="#"><?= $application['application_no']; ?></a></td>
                                <td><?= $applicant_name; ?></td>
                                <td><?= $grant_type; ?></td>
                                <td><?= $status; ?></td>
                                <td><?= $entry_date; ?></td>
                                <td>
                                    <div class="sparkbar" data-color="#00a65a" data-height="20"><canvas width="34" height="20" style="display: inline-block; width: 34px; height: 20px; vertical-align: top;"></canvas></div>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>

    
    <?php /* ?><?php */ ?>










    <? /* ?>
    <!-- Main content -->
    <section class="content">
        <div class="box box-success">
            <div class="box-header">
                <h3 class="box-title pull-left"><?php echo ucwords(str_replace('_', ' ', 'Generated Report')); ?></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
                <table id="ssp_datatable" class="table table-bordered table-striped table-hover table-condensed display dataTable">
                    <thead>
                        <tr>
                            <th width="2%"><?php echo ucwords(str_replace('_', ' ', 'Sr.')); ?></th>
                            <th width="8%"><?php echo ucwords(str_replace('_', ' ', 'Name of Grantee')); ?></th>
                            <th width="8%"><?php echo ucwords(str_replace('_', ' ', 'Govt Servant')); ?></th>
                            <th width="5%"><?php echo ucwords(str_replace('_', ' ', 'Designation')); ?></th>
                            <th width="8%"><?php echo ucwords(str_replace('_', ' ', 'CNIC')); ?></th>
                            <th width="8%"><?php echo ucwords(str_replace('_', ' ', 'Tran No')); ?></th>
                            <th width="8%"><?php echo ucwords(str_replace('_', ' ', 'Bank Branch')); ?></th>
                            <th width="8%"><?php echo ucwords(str_replace('_', ' ', 'Account No')); ?></th>
                            <th width="5%"><?php echo ucwords(str_replace('_', ' ', 'Amount')); ?></th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
            <!-- /.box-body -->
        </div>
    </section>
    <!-- /.content -->
    <? */ ?>
</div>



<!-- /.content-wrapper -->

<!-- for image / gallery -->
<script>
    baguetteBox.run('.tz-gallery');


    $(document).ready(function() {
        $('#checkall').click(function() { 
            var checked = $(this).prop('checked');
            $('#application_no').prop('checked', checked);
        });
    })

</script>

<script type="text/javascript">
    var save_method; //for save method string
    var sspDataTable;
    $(document).ready(function() {
        sspDataTable = $('#ssp_datatable').DataTable({
            // Processing indicator
            "processing": true,
            // DataTables server-side processing mode
            "serverSide": true,
            "serverMethod": "post",

            // Initial no order.
            "order": [],
            "filter": false,
            "searching": false,

            // Load data from an Ajax source
            "ajax": {
                "url": "<?php echo base_url('form_8a/get_form_8a_report/'); ?>",
                // "type": "POST"
                'data': function(data) {
                    data.tbl_district_id = $('#tbl_district_id').val();
                    data.from_date = $('#from_date').val();
                    data.to_date = $('#to_date').val();
                    data.status = $('#status').val();
                }
            },
            //Set column definition initialisation properties
            // "columnDefs": [{
            //     "targets": [0,5,6],
            //     "orderable": false
            // }]
            'columns': [{
                    data: 'no'
                },
                {
                    data: 'proprietor'
                },
                {
                    data: 'businessName'
                },
                {
                    data: 'district'
                },
                {
                    data: 'applicationDate'
                },
                {
                    data: 'approvalDate'
                },
                {
                    data: 'inspector'
                },
                {
                    data: 'inspectionDate'
                },
                {
                    data: 'status'
                },
            ],
            //Set column definition initialisation properties
            "columnDefs": [{
                "targets": [0, 1, 2, 3, 4, 5, 6, 7, 8],
                "orderable": false
            }]
        });


        $('#tbl_district_id,#status').change(function() {
            sspDataTable.draw();
        });

        $('#from_date').focusout(function() {
            sspDataTable.draw();
        });

        $('#to_date').focusout(function() {
            sspDataTable.draw();
        });

    });

    function reload_table() {
        ssp_datatable.ajax.reload(null, false); //reload datatable ajax
    }
</script>

<script type="text/javascript">
    $(function() {
        $('#from_date').datetimepicker({
            useCurrent: false,
            // defaultDate: null,
            format: "DD-MM-YYYY",
            showTodayButton: true,
            ignoreReadonly: true
        });
    });

    $(function() {
        $('#to_date').datetimepicker({
            useCurrent: false,
            format: "DD-MM-YYYY",
            showTodayButton: true,
            ignoreReadonly: true
        });
        // $('#to_date').val("");


    });
</script>
<?php
// $admin_detail = $this->admin->getRecordById($_SESSION['admin_id'], $tbl_name = 'tbl_admin');
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
    <?php $this->load->view('templates/alerts');?>

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
                    <option value="">Select district</option>

                    <?php foreach ($district as $districtInfo): ?>
                      <option value="<?php echo $districtInfo['id']; ?>"><?php echo $districtInfo['name']; ?></option>
                    <?php endforeach;?>
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
          <!-- /.row -->
        </div>

          </div>
    </section>


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
  </div>



  <!-- /.content-wrapper -->

<!-- for image / gallery -->
<script>
    baguetteBox.run('.tz-gallery');
</script>

<script type="text/javascript">

var save_method; //for save method string
var sspDataTable;
$(document).ready(function(){
    sspDataTable=$('#ssp_datatable').DataTable({
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
            'data': function(data){
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
        'columns': [
            { data: 'no' },
            { data: 'proprietor' },
            { data: 'businessName' },
            { data: 'district' },
            { data: 'applicationDate' },
            { data: 'approvalDate' },
            { data: 'inspector' },
            { data: 'inspectionDate' },
            { data: 'status' },
          ],
          //Set column definition initialisation properties
        "columnDefs": [{
            "targets": [0,1,2,3,4,5,6,7,8],
            "orderable": false
        }]
    });


    $('#tbl_district_id,#status').change(function(){
        sspDataTable.draw();
      });

      $('#from_date').focusout(function(){
        sspDataTable.draw();
      });

      $('#to_date').focusout(function(){
        sspDataTable.draw();
      });

        });

function reload_table()
    {
      ssp_datatable.ajax.reload(null,false); //reload datatable ajax
    }
  </script>

  <script type="text/javascript">
  $(function () {
        $('#from_date').datetimepicker({
            useCurrent: false,
            // defaultDate: null,
            format:"DD-MM-YYYY",
            showTodayButton:true,
            ignoreReadonly:true
        });
    });

  $(function () {
        $('#to_date').datetimepicker({
            useCurrent: false,
            format:"DD-MM-YYYY",
            showTodayButton:true,
            ignoreReadonly:true
        });
        // $('#to_date').val("");


    });
</script>

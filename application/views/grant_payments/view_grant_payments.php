<?php
$admin_detail = $this->admin->getRecordById($_SESSION['admin_id'], $tbl_name = 'tbl_admin');
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
    <!-- Main content -->
    <section class="content">
      <div class="box box-success">
            <div class="box-header">
              <h3 class="box-title pull-left"><?php echo ucwords(str_replace('_', ' ', 'Grants payments detail')); ?></h3>
             <!--  <h3 class="box-title pull-right">
                <a href="<?php echo base_url(); ?>add_admin" type="button" class="btn btn-block btn-danger btn-sm"><i class="fa fa-trash-o"> all </i></a></h3> -->

                <h3 class="box-title pull-right">

                  <?php if ($_SESSION['tbl_admin_role_id'] == '1') {?>
                    <button type="button" id="addBtn" onclick="add()" class="btn btn-block btn-success btn-sm">
                <i class="fa fa-plus"> New </i>
              </button>
              <?php }?>
              </h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <table id="ssp_datatable" class="table table-bordered table-striped table-hover table-condensed">
                <thead>
                <tr>
                  <th width="2%"><?php echo ucwords(str_replace('_', ' ', 'Sr.')); ?></th>
                  <th width="8%"><?php echo ucwords(str_replace('_', ' ', 'Grant')); ?></th>
                  <th width="8%"><?php echo ucwords(str_replace('_', ' ', 'Pay Scale')); ?></th>
                  <th width="8%"><?php echo ucwords(str_replace('_', ' ', 'from_date')); ?></th>
                  <th width="8%"><?php echo ucwords(str_replace('_', ' ', 'to_date')); ?></th>
                  <th width="8%"><?php echo ucwords(str_replace('_', ' ', 'amount')); ?></th>
                  <th width="3%"><?php echo ucwords(str_replace('_', ' ', 'status')); ?></th>
                  <th width="5%"><?php echo ucwords(str_replace('_', ' ', 'add by/date')); ?></th>
                  <th width="3%" class="no-print"><?php echo ucwords(str_replace('_', ' ', 'action')); ?></th>
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

 <!-- modal for add record -->

<div id="modal_form" class="modal fade" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><?php echo ucwords(str_replace('_', ' ', 'edit grant payments')); ?></h4>

      </div>
      <p class="jquery_alert_modal"></p>


        <?php echo validation_errors(); ?>
        <?php echo form_open_multipart('#', 'id="formID" class="form-horizontal"'); ?>
      <div class="modal-body">

            <div class="form-group">
                  <label class="label-control col-md-4"><?php echo $label = ucwords(str_replace('_', ' ', 'grants')); ?>:</label>
                  <div class="col-md-8">
                  <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-money"></i>
                  </div>
                  <select  name="tbl_grants_id" id="tbl_grants_id" class="form-control select2 validate[required]" style="width: 100%">
                    <option value="">Select Grants</option>

                    <?php foreach ($grants as $grantsInfo): ?>
                      <option value="<?php echo $grantsInfo['id']; ?>"><?php echo $grantsInfo['name']; ?></option>
                    <?php endforeach;?>


                  </select>
                </div><div id="error"></div>
                </div>
            </div>

            <div class="form-group">
                  <label class="label-control col-md-4"><?php echo $label = ucwords(str_replace('_', ' ', 'pay_scale')); ?>:</label>
                  <div class="col-md-8">
                  <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-money"></i>
                  </div>
                  <select  name="tbl_pay_scale_id" id="tbl_pay_scale_id" class="form-control select2 validate[required]" style="width: 100%">
                    <option value="">Select Pay Scale</option>

                    <?php foreach ($pay_scale as $pay_scaleInfo): ?>
                      <option value="<?php echo $pay_scaleInfo['id']; ?>"><?php echo $pay_scaleInfo['name']; ?></option>
                    <?php endforeach;?>


                  </select>
                </div><div id="error"></div>
                </div>
            </div>


            <div class="form-group">
                  <label class="label-control col-md-4"><?php echo $label = ucwords(str_replace('_', ' ', 'from date')); ?>:</label>
                  <div class="col-md-8">
                  <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="hidden" value="" name="id"/>

                  <input type="text" readonly autocomplete="off" value="<?php echo set_value('from_date'); ?>" name="from_date" id='from_date' class="form-control validate[required,minSize[3],maxSize[25]]" placeholder="Enter <?php echo $label; ?>" />

                </div><div id="error"></div>
                </div>

            </div>

            <div class="form-group">
                  <label class="label-control col-md-4"><?php echo $label = ucwords(str_replace('_', ' ', 'to date')); ?>:</label>
                  <div class="col-md-8">
                  <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" readonly autocomplete="off" value="<?php echo set_value('to_date'); ?>" name="to_date" id="to_date" class="form-control validate[required,minSize[3],maxSize[25]]" placeholder="Enter <?php echo $label; ?>" />
                </div><div id="error"></div>
                </div>

            </div>

            <div class="form-group">
                  <label class="label-control col-md-4"><?php echo $label = ucwords(str_replace('_', ' ', 'amount')); ?>:</label>
                  <div class="col-md-8">
                  <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-money"></i>
                  </div>
                  <input type="text" autocomplete="off" value="<?php echo set_value('amount'); ?>" name="amount" id="amount" class="form-control validate[required,minSize[3],maxSize[25]]" placeholder="Enter <?php echo $label; ?>" />
                </div><div id="error"></div>
                </div>

            </div>

            <div class="form-group">
                  <label class="label-control col-md-4"><?php echo $label = ucwords('status') ?>:</label>
                  <div class="col-md-8">
                  <div class="input-group">
                  <!-- <div class="input-group-addon">
                    <i class="fa fa-check"></i>
                  </div> -->
                    <input type="radio" id="status" name="status" value="1"> Active
                    <input type="radio" id="status" name="status" value="0"> Inactive
                  </div><div id="error"></div>
                </div>
            </div>
                    <!-- </div> -->

      </div>
          <?php echo form_close(); ?>

      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" onclick="save()" id="btnSave" name="btnSave" class="btn btn-primary  btn-sm"><i class="fa fa-plus"> </i> Save Record</button>
      </div>



    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
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
        // Initial no order.
        "order": [],
        // Load data from an Ajax source
        "ajax": {
            "url": "<?php echo base_url('grant_payments/get_grant_payments/'); ?>",
            "type": "POST"
        },
        //Set column definition initialisation properties
        "columnDefs": [{
            "targets": [0],
            "orderable": false
        }]
    });

            // for form error validation
            $('#error').html(" ");
            $('div[id=error]').html(" ");

            $('#formID input').on('keyup', function () {
                $(this).removeClass('is-invalid').addClass('is-valid');
                $(this).parents('.form-group').find('#error').html(" ");
            });
        });

function reload_table()
    {
      ssp_datatable.ajax.reload(null,false); //reload datatable ajax
    }

function save()
    {
      var url;
      if(save_method == 'add')
      {
        url = "<?php echo site_url('grant_payments/add_grant_payments') ?>";
      }
      else
      {
        url = "<?php echo site_url('grant_payments/update_grant_payments') ?>";
      }

       // ajax adding data to database
       $.ajax({

                    type: "POST",
                    url: url,
                    async: false,
                    data: $("#formID").serialize(),
                    dataType: "json",
                    success: function(data){

                        $.each(data, function(key, value) {
                          if(value==true){
                            $('#modal_form').modal('hide');
                            form_reset();
                            sspDataTable.ajax.reload(); //reload datatable ajax
                            $('.jquery_alert').html('<p class="alert alert-success">! Record has been successfully Added / Updated</p>').fadeIn().delay(4000).fadeOut('slow');
                          }
                          // else
                          else {
                            // if(value==false){
                            // $('.jquery_alert_modal').html('<p class="alert alert-danger"> <strong>Oops! </strong> Error in fields</p>').fadeIn().delay(4000).fadeOut('slow');
                          // }
                            $('#' + key).addClass('is-invalid');
                            $('#' + key).parents('.form-group').find('#error').html(value);
                          }
                        });
                    }
                });
     }

function form_reset()
    {
    $('#formID')[0].reset(); // reset form on modals
      $('#tbl_grants_id').val('').trigger('change');
      $('#tbl_pay_scale_id').val('').trigger('change');
      $('#error').html(" ");
      $('div[id=error]').html(" ");

 };
function add()
    {
      save_method = 'add';
      form_reset();
      $('#modal_form').modal('show'); // show bootstrap modal
      $('.modal-title').text('<?php echo ucwords(str_replace('_', ' ', 'add new grant payments')); ?>'); // Set Title to Bootstrap modal title


    }

// getData function for get data for editment and updating
  function getData(id)
  {
      form_reset();
      save_method = 'update';

      //Ajax Load data from ajax
      $.ajax({
        url : "<?php echo site_url('grant_payments/getData/') ?>/" + id,
        type: "post",
        dataType: "JSON",
        success: function(data)
        {

          $('[name="id"]').val(data.id);
          $('#tbl_grants_id').val(data.tbl_grants_id).trigger('change');
          $('#tbl_pay_scale_id').val(data.tbl_pay_scale_id).trigger('change');

          var fromDate = moment(data.from_date, "YYYY-MM-DD").format("DD-MM-YYYY");
          var toDate = moment(data.to_date, "YYYY-MM-DD").format("DD-MM-YYYY");
          $('[name="from_date"]').val(fromDate);
          $('[name="to_date"]').val(toDate);

          $('[name="amount"]').val(data.amount);
          $('input[name^="status"][value="'+data.status+'"').prop('checked',true);
          $('#modal_form').modal('show'); // show bootstrap modal when complete loaded


          },
          error: function (jqXHR, textStatus, errorThrown)
          {
            alert('Error get data from database');
          }

        });
    }

</script>

<script type="text/javascript">

$(function () {
        $('#from_date').datetimepicker({
            useCurrent: false,
            format:"DD-MM-YYYY",
            showTodayButton:true,
            ignoreReadonly:true
        });
        $('#to_date').datetimepicker({
            useCurrent: false,
            format:"DD-MM-YYYY",
            showTodayButton:true,
            ignoreReadonly:true

        });
        $("#from_date").on("dp.change", function (e) {
            $('#to_date').data("DateTimePicker").minDate(e.date);
        });
        $("#to_date").on("dp.change", function (e) {
            $('#from_date').data("DateTimePicker").maxDate(e.date);
        });
    });

</script>

<?php //$date = strtotime($all['add_date']);$date = date('d-m-Y', $date);?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">

        <?php $this->load->view('templates/alerts'); ?>

        <h1>
            <?php echo ucwords(str_replace('_', ' ', $page_title)); ?>
            <small><?php echo ucwords(str_replace('_', ' ', $description)); ?></small>
        </h1>

    </section>

    <!-- Main content -->
    <?php validation_errors(); ?>
    <?php echo form_open_multipart('add_scholarship_grant', 'id="formID"'); ?>

    <!--      <form id="formID" method="POST" action="" enctype="multipart/form-data"> -->
    <!-- Main content -->
    <section class="content">

        <div class="row">


            <div class="col-md-12">
 
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title"><?php echo ucwords('Scholarship Information'); ?></h3>
                        <br><i style="color: #9c0404;">use NA or not applicable, if information is not available</i>
                        <div class="box-tools pull-right">
                            <!-- <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button> -->
                            <?php /*?><button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button><?php */ ?>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label><?php echo $label = ucwords(str_replace('_', ' ', 'department')); ?>:</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-industry"></i>
                                        </div>

                                        <select name="tbl_department_id" id="tbl_department_id" class="form-control select2 validate[required]">
                                            <option value="">Select Department</option> 
                                            <?php foreach ($department as $departmentInfo) : ?>
                                                <option value="<?php echo $departmentInfo['id']; ?>"><?php echo $departmentInfo['name']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div><?php echo form_error('tbl_department_id'); ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label><?php echo $label = ucwords(str_replace('_', ' ', 'duty_place')); ?>:</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-industry"></i>
                                        </div>

                                        <input type="text" autocomplete="off" value="<?php echo set_value('duty_place'); ?>" name="duty_place" id="duty_place" class="form-control validate[required,minSize[3]" placeholder="Enter <?php echo $label; ?>" />
                                    </div><?php echo form_error('duty_place'); ?>
                                </div>
                            </div>
                        </div>

                        <div class="row"> 
                            <div class="col-md-6"> 
                                <div class="form-group">
                                    <label><?php echo $label = ucwords(str_replace('_', ' ', 'std_name')); ?>:</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-graduation-cap"></i>
                                        </div>

                                        <input type="text" autocomplete="off" value="<?php echo set_value('std_name'); ?>" name="std_name" id="std_name" class="form-control validate[required,minSize[3]" placeholder="Enter <?php echo $label; ?>" />
                                    </div><?php echo form_error('std_name'); ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label><?php echo $label = ucwords(str_replace('_', ' ', 'class_pass')); ?>:</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-home"></i>
                                        </div>

                                        <input type="text" autocomplete="off" value="<?php echo set_value('class_pass'); ?>" name="class_pass" id="class_pass" class="form-control validate[required,minSize[3]" placeholder="Enter <?php echo $label; ?>" />
                                    </div><?php echo form_error('class_pass'); ?>
                                </div>
                            </div>
                        </div>

                        <div class="row"> 
                            <div class="col-md-6"> 
                                <div class="form-group">
                                    <label><?php echo $label = ucwords(str_replace('_', ' ', 'exam_pass')); ?>:</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-file"></i>
                                        </div>

                                        <input type="text" autocomplete="off" value="<?php echo set_value('exam_pass'); ?>" name="exam_pass" id="exam_pass" class="form-control validate[required,minSize[3]" placeholder="Enter <?php echo $label; ?>" />
                                    </div><?php echo form_error('exam_pass'); ?>
                                </div>
                            </div>
                            <div class="col-md-6"> 
                                <div class="form-group">
                                    <label><?php echo $label = ucwords(str_replace('_', ' ', 'result_date')); ?>:</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>

                                        <input type="text" autocomplete="off" readonly value="<?php echo set_value('result_date'); ?>" name="result_date" id="result_date" class="form-control validate[required,minSize[3]" placeholder="Enter <?php echo $label; ?>" />
                                    </div><?php echo form_error('result_date'); ?>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">  
                                <div class="form-group">
                                    <label><?php echo $label = ucwords(str_replace('_', ' ', 'marks_obtained')); ?>:</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calculator"></i>
                                        </div>

                                        <input type="text" autocomplete="off" value="<?php echo set_value('mo'); ?>" name="mo" id="mo" class="form-control validate[required,minSize[3]" placeholder="Enter <?php echo $label; ?>" />
                                    </div><?php echo form_error('mo'); ?>
                                </div>
                            </div>
                            <div class="col-md-6"> 
                                <div class="form-group">
                                    <label><?php echo $label = ucwords(str_replace('_', ' ', 'total_marks')); ?>:</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calculator"></i>
                                        </div>

                                        <input type="text" autocomplete="off" value="<?php echo set_value('tm'); ?>" name="tm" id="tm" class="form-control validate[required,minSize[3]" placeholder="Enter <?php echo $label; ?>" />
                                    </div><?php echo form_error('tm'); ?>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6"> 
                                <div class="form-group">
                                    <label><?php echo $label = ucwords(str_replace('_', ' ', 'percentage')); ?>:</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-percent"></i>
                                        </div>

                                        <input type="text" autocomplete="off" value="<?php echo set_value('percentage'); ?>" name="percentage" id="percentage" class="form-control validate[required,minSize[3]" placeholder="Enter <?php echo $label; ?>" />
                                    </div><?php echo form_error('percentage'); ?>
                                </div>
                            </div>
                            <div class="col-md-6"> 
                                <div class="form-group">
                                    <label><?php echo $label = ucwords(str_replace('_', ' ', 'institute_name')); ?>:</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-building"></i>
                                        </div>

                                        <input type="text" autocomplete="off" value="<?php echo set_value('institute_name'); ?>" name="institute_name" id="institute_name" class="form-control validate[required,minSize[3]" placeholder="Enter <?php echo $label; ?>" />
                                    </div><?php echo form_error('institute_name'); ?>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">  
                                <div class="form-group">
                                    <label><?php echo $label = ucwords(str_replace('_', ' ', 'institute_address')); ?>:</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-map-marker"></i>
                                        </div>

                                        <input type="text" autocomplete="off" value="<?php echo set_value('institute_add'); ?>" name="institute_add" id="institute_add" class="form-control validate[required,minSize[3]" placeholder="Enter <?php echo $label; ?>" />
                                    </div><?php echo form_error('institute_add'); ?>
                                </div>
                            </div>
                            <div class="col-md-6"> 
                                <div class="form-group">
                                    <label><?php echo $label = ucwords(str_replace('_', ' ', 'grant_amount')); ?>:</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-money"></i>
                                        </div>

                                        <input type="text" autocomplete="off" value="<?php echo set_value('grant_amount'); ?>" name="grant_amount" id="grant_amount" class="form-control validate[required,minSize[3]" placeholder="Enter <?php echo $label; ?>" />
                                    </div><?php echo form_error('grant_amount'); ?>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">   
                                <div class="form-group">
                                    <label><?php echo $label = ucwords(str_replace('_', ' ', 'deduction')); ?>:</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-money"></i>
                                        </div>

                                        <input type="text" autocomplete="off" value="<?php echo set_value('deduction'); ?>" name="deduction" id="deduction" class="form-control validate[required,minSize[3]" placeholder="Enter <?php echo $label; ?>" />
                                    </div><?php echo form_error('deduction'); ?>
                                </div>
                            </div>
                            <div class="col-md-6"> 
                                <div class="form-group">
                                    <label><?php echo $label = ucwords(str_replace('_', ' ', 'net_amount')); ?>:</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-money"></i>
                                        </div>

                                        <input type="text" autocomplete="off" value="<?php echo set_value('net_amount'); ?>" name="net_amount" id="net_amount" class="form-control validate[required,minSize[3]" placeholder="Enter <?php echo $label; ?>" />
                                    </div><?php echo form_error('net_amount'); ?>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">   
                                <div class="form-group">
                                    <label><?php echo $label = ucwords(str_replace('_', ' ', 'case_status')); ?>:</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-eye"></i>
                                        </div>

                                        
                                        <select name="tbl_case_status_id" id="tbl_case_status_id" class="form-control select2 validate[required]">
                                            <option value="">Select Case Status</option> 
                                            <?php foreach ($cases as $case) : ?>
                                                <option value="<?php echo $case['id']; ?>"><?php echo $case['name']; ?></option>
                                            <?php endforeach; ?>
                                        </select>

                                    </div><?php echo form_error('tbl_case_status_id'); ?>
                                </div>
                            </div>
                            <div class="col-md-6">   
                                <div class="form-group">
                                    <label><?php echo $label = ucwords(str_replace('_', ' ', 'payment_mode')); ?>:</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-money"></i>
                                        </div>

                                        <select name="tbl_payment_mode_id" id="tbl_payment_mode_id" class="form-control select2 validate[required]">
                                            <option value="">Select Payment mode</option> 
                                            <?php foreach ($payment_modes as $payment_mode) : ?>
                                                <option value="<?php echo $payment_mode['id']; ?>"><?php echo $payment_mode['name']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                       
                                    </div><?php echo form_error('tbl_payment_mode_id'); ?>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6"> 
                                <div class="form-group">
                                    <label><?php echo $label = ucwords(str_replace('_', ' ', 'bank_branches')); ?>:</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-bank"></i>
                                        </div>
                                        <select name="tbl_list_bank_branches_id" id="tbl_list_bank_branches_id" class="form-control select2 validate[required]">
                                            <option value="">Select Bank</option> 
                                            <?php foreach ($banks as $bank) : ?>
                                                <option value="<?php echo $bank['id']; ?>"><?php echo $bank['name']; ?> (<?php echo $bank['branch_code']; ?>)</option>
                                            <?php endforeach; ?>
                                        </select>
                                        
                                    </div><?php echo form_error('tbl_list_bank_branches_id'); ?>
                                </div>
                            </div>

                            <div class="col-md-6"> 
                                <div class="form-group">
                                    <label><?php echo $label = ucwords(str_replace('_', ' ', 'account_no')); ?>:</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa fa-bank"></i>
                                        </div>

                                        <input type="text" autocomplete="off" value="<?php echo set_value('account_no'); ?>" name="account_no" id="account_no" class="form-control validate[required,minSize[3]" placeholder="Enter <?php echo $label; ?>" />
                                    </div><?php echo form_error('account_no'); ?>
                                </div>
                            </div>
                        </div>

                        <div class="row"> 
                            <div class="col-md-6"> 
                                <div class="form-group">
                                    <label><?php echo $label = ucwords(str_replace('_', ' ', 'std_signature')); ?>:</label>
                                    <br>
                                    <input type="radio" class="validate[required]" checked name="std_signature" id="std_signature" value="No"> No
                                    <input type="radio" class="validate[required]" name="std_signature" id="std_signature" value="Yes"> Yes
                                    <?php echo form_error('std_signature'); ?>
                                </div>
                            </div> 
                            <div class="col-md-6"> 
                                <div class="form-group">
                                    <label><?php echo $label = ucwords(str_replace('_', ' ', 'gov_servent_sign')); ?>:</label>
                                    <br>
                                    <input type="radio" class="validate[required]" checked name="gov_servent_sign" id="gov_servent_sign" value="No"> No
                                    <input type="radio" class="validate[required]" name="gov_servent_sign" id="gov_servent_sign" value="Yes"> Yes
                                    <?php echo form_error('gov_servent_sign'); ?>
                                </div>
                            </div>
                        </div>

                        <div class="row"> 
                            <div class="col-md-6"> 
                                <div class="form-group">
                                    <label><?php echo $label = ucwords(str_replace('_', ' ', 'seal_institute')); ?>:</label>
                                    <br>
                                    <input type="radio" class="validate[required]" checked name="seal_institute" id="seal_institute" value="No"> No
                                    <input type="radio" class="validate[required]" name="seal_institute" id="seal_institute" value="Yes"> Yes
                                    <?php echo form_error('seal_institute'); ?>
                                </div>
                            </div>  
                            <div class="col-md-6"> 
                                <div class="form-group">
                                    <label><?php echo $label = ucwords(str_replace('_', ' ', 'head_institute')); ?>:</label>
                                    <br>
                                    <input type="radio" class="validate[required]" checked name="head_institute" id="head_institute" value="No"> No
                                    <input type="radio" class="validate[required]" name="head_institute" id="head_institute" value="Yes"> Yes
                                    <?php echo form_error('head_institute'); ?>
                                </div>
                            </div>
                        </div>


                        <div class="row"> 
                            <div class="col-md-6"> 
                                <div class="form-group">
                                    <label><?php echo $label = ucwords(str_replace('_', ' ', 'office_seal_hod')); ?>:</label>
                                    <br>
                                    <input type="radio" class="validate[required]" checked name="office_seal_hod" id="office_seal_hod" value="No"> No
                                    <input type="radio" class="validate[required]" name="office_seal_hod" id="office_seal_hod" value="Yes"> Yes
                                    <?php echo form_error('office_seal_hod'); ?>
                                </div>
                            </div>  

                            <div class="col-md-6"> 
                                <div class="form-group">
                                    <label><?php echo $label = ucwords(str_replace('_', ' ', 'hod_sign')); ?>:</label>
                                    <br>
                                    <input type="radio" class="validate[required]" checked name="hod_sign" id="hod_sign" value="No"> No
                                    <input type="radio" class="validate[required]" name="hod_sign" id="hod_sign" value="Yes"> Yes
                                    <?php echo form_error('hod_sign'); ?>
                                </div>
                            </div>  

                        </div>


                        <div class="row">
                            <div class="col-md-6"> 
                                <div class="form-group">
                                    <label><?php echo $label = ucwords(str_replace('_', ' ', 'bank_verification')); ?>:</label>
                                    <br>
                                    <input type="radio" class="validate[required]" checked name="bank_verification" id="bank_verification" value="No"> No
                                    <input type="radio" class="validate[required]" name="bank_verification" id="bank_verification" value="Yes"> Yes
                                    <?php echo form_error('bank_verification'); ?>
                                </div>
                            </div>
                            <div class="col-md-6"> 
                                <div class="form-group">
                                    <label><?php echo $label = ucwords(str_replace('_', ' ', 'payroll_lpc_attach')); ?>:</label>
                                    <br>
                                    <input type="radio" class="validate[required]" checked name="payroll_lpc_attach" id="payroll_lpc_attach" value="No"> No
                                    <input type="radio" class="validate[required]" name="payroll_lpc_attach" id="payroll_lpc_attach" value="Yes"> Yes
                                    <?php echo form_error('payroll_lpc_attach'); ?>
                                </div>
                            </div>  
                        </div>

                        <div class="row">
                            <div class="col-md-6"> 
                                <div class="form-group">
                                    <label><?php echo $label = ucwords(str_replace('_', ' ', 'dmc_attach')); ?>:</label>
                                    <br>
                                    <input type="radio" class="validate[required]" checked name="dmc_attach" id="dmc_attach" value="No"> No
                                    <input type="radio" class="validate[required]" name="dmc_attach" id="dmc_attach" value="Yes"> Yes
                                    <?php echo form_error('dmc_attach'); ?>
                                </div>
                            </div>
                            <div class="col-md-6"> 
                                <div class="form-group">
                                    <label><?php echo $label = ucwords(str_replace('_', ' ', 'cnic_attach')); ?>:</label>
                                    <br>
                                    <input type="radio" class="validate[required]" checked name="cnic_attach" id="cnic_attach" value="No"> No
                                    <input type="radio" class="validate[required]" name="cnic_attach" id="cnic_attach" value="Yes"> Yes
                                    <?php echo form_error('cnic_attach'); ?>
                                </div>
                            </div>  
                        </div>

                        <div class="row">
                            <div class="col-md-6"> 
                                <div class="form-group">
                                    <label><?php echo $label = ucwords(str_replace('_', ' ', 'grade_attach')); ?>:</label>
                                    <br>
                                    <input type="radio" class="validate[required]" checked name="grade_attach" id="grade_attach" value="No"> No
                                    <input type="radio" class="validate[required]" name="grade_attach" id="grade_attach" value="Yes"> Yes
                                    <?php echo form_error('grade_attach'); ?>
                                </div>
                            </div>
                            <div class="col-md-6"> 
                                <div class="form-group">
                                    <label><?php echo $label = ucwords(str_replace('_', ' ', 'boards_approval')); ?>:</label>
                                    <br>
                                    <input type="radio" class="validate[required]" checked name="boards_approval" id="boards_approval" value="No"> No
                                    <input type="radio" class="validate[required]" name="boards_approval" id="boards_approval" value="Yes"> Yes
                                    <?php echo form_error('boards_approval'); ?>
                                </div>
                            </div>  
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6"> 
                                <div class="form-group">
                                    <label><?php echo $label = ucwords(str_replace('_', ' ', 'sent_to_secretary')); ?>:</label>
                                    <br>
                                    <input type="radio" class="validate[required]" checked name="sent_to_secretary" id="sent_to_secretary" value="No"> No
                                    <input type="radio" class="validate[required]" name="sent_to_secretary" id="sent_to_secretary" value="Yes"> Yes
                                    <?php echo form_error('sent_to_secretary'); ?>
                                </div>
                            </div>
                            <div class="col-md-6"> 
                                <div class="form-group">
                                    <label><?php echo $label = ucwords(str_replace('_', ' ', 'approve_secretary')); ?>:</label>
                                    <br>
                                    <input type="radio" class="validate[required]" checked name="approve_secretary" id="approve_secretary" value="No"> No
                                    <input type="radio" class="validate[required]" name="approve_secretary" id="approve_secretary" value="Yes"> Yes
                                    <?php echo form_error('approve_secretary'); ?>
                                </div>
                            </div>  
                        </div>

                        <div class="row">
                            <div class="col-md-6"> 
                                <div class="form-group">
                                    <label><?php echo $label = ucwords(str_replace('_', ' ', 'ac_edit')); ?>:</label>
                                    <br>
                                    <input type="radio" class="validate[required]" checked name="ac_edit" id="ac_edit" value="No"> No
                                    <input type="radio" class="validate[required]" name="ac_edit" id="ac_edit" value="Yes"> Yes
                                    <?php echo form_error('ac_edit'); ?>
                                </div>
                            </div>
                            <div class="col-md-6"> 
                                <div class="form-group">
                                    <label><?php echo $label = ucwords(str_replace('_', ' ', 'sent_to_bank')); ?>:</label>
                                    <br>
                                    <input type="radio" class="validate[required]" checked name="sent_to_bank" id="sent_to_bank" value="No"> No
                                    <input type="radio" class="validate[required]" name="sent_to_bank" id="sent_to_bank" value="Yes"> Yes
                                    <?php echo form_error('sent_to_bank'); ?>
                                </div>
                            </div>  
                        </div>

                        <div class="row">
                            <div class="col-md-12"> 
                                <div class="form-group">
                                    <label><?php echo $label = ucwords(str_replace('_', ' ', 'feedback_website')); ?>:</label>
                                    
                                    <textarea  autocomplete="off" name="feedback_website" id="feedback_website" class="form-control" placeholder="Enter <?php echo $label; ?>"><?php echo set_value('feedback_website'); ?></textarea>
                                    <?php echo form_error('feedback_website'); ?>
                                </div>
                            </div> 
                        </div>
 
  
                        <!-- /.row -->
                    </div>

                </div>
               

            </div>



        </div>

        <!-- /.box -->

        <div class="row">
            <!-- /.col -->
            <div class="col-xs-6">
                <button type="submit" value="submit" name="submit" class="btn btn-primary  btn-sm"><i class="fa fa-plus"> </i> Add Record</button>
                <a href="<?php echo base_url('dashboard'); ?>" class="btn btn-info  btn-sm" type="button"> <i class="fa fa-chevron-left"> </i> Cancel/Back</a>

            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->

    </section>
    </form>

    <!-- /.content -->
</div>

<script type="text/javascript">
     
    $(function() {
        $('#result_date').datetimepicker({
            useCurrent: false,
            format: "DD-MM-YYYY",
            showTodayButton: true,
            ignoreReadonly: true
        }); 
    });
</script>
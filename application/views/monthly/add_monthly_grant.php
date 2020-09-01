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
    <?php echo form_open_multipart('add_monthly_grant', 'id="formID"'); ?>

    <!--      <form id="formID" method="POST" action="" enctype="multipart/form-data"> -->
    <!-- Main content -->
    <section class="content">

        <div class="row">


            <div class="col-md-12">
 
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title"><?php echo ucwords('Monthly Grant Information'); ?></h3>
                        <br><i style="color: #9c0404;">use NA or not applicable, if information is not available</i>
                        <div class="box-tools pull-right">
                            <!-- <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button> -->
                            <?php /*?><button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button><?php */ ?>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label><?php echo $label = ucwords(str_replace('_', ' ', 'employee')); ?>:</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-user"></i>
                                        </div>

                                        <select name="tbl_emp_info_id" id="tbl_emp_info_id" class="form-control select2 validate[required]">
                                            <option value="">Select Employee</option> 
                                            <?php foreach ($employees as $employeeInfo) : ?>
                                                <option value="<?php echo $employeeInfo['id']; ?>"><?php echo $employeeInfo['grantee_name']; ?> - <?php echo $employeeInfo['cnic_no']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div><?php echo form_error('tbl_emp_info_id'); ?>
                                </div>
                            </div> 
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label><?php echo $label = ucwords(str_replace('_', ' ', 'record_no')); ?>:</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-industry"></i>
                                        </div>

                                        <input type="text" autocomplete="off" value="<?php echo set_value('record_no'); ?>" name="record_no" id="record_no" class="form-control validate[required,minSize[3]]" placeholder="Enter <?php echo $label; ?>" />
                                    </div><?php echo form_error('record_no'); ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label><?php echo $label = ucwords(str_replace('_', ' ', 'record_no_year')); ?>:</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-industry"></i>
                                        </div>

                                        <input type="text" autocomplete="off" value="<?php echo set_value('record_no_year'); ?>" name="record_no_year" id="record_no_year" class="form-control validate[required,minSize[3]]" placeholder="Enter <?php echo $label; ?>" />
                                    </div><?php echo form_error('record_no_year'); ?>
                                </div>
                            </div>
                        </div>

                        <div class="row"> 
                            <div class="col-md-6"> 
                                <div class="form-group">
                                    <label><?php echo $label = ucwords(str_replace('_', ' ', 'doa')); ?>:</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>

                                        <input type="text" autocomplete="off" value="<?php echo set_value('doa'); ?>" name="doa" id="doa" class="form-control validate[required,minSize[3]]" placeholder="Enter <?php echo $label; ?>" />
                                    </div><?php echo form_error('doa'); ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label><?php echo $label = ucwords(str_replace('_', ' ', 'dor')); ?>:</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>

                                        <input type="text" autocomplete="off" value="<?php echo set_value('dor'); ?>" name="dor" id="dor" class="form-control validate[required,minSize[3]]" placeholder="Enter <?php echo $label; ?>" />
                                    </div><?php echo form_error('dor'); ?>
                                </div>
                            </div>
                        </div>

                        <div class="row"> 
                            <div class="col-md-6"> 
                                <div class="form-group">
                                    <label><?php echo $label = ucwords(str_replace('_', ' ', 'los')); ?>:</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-file"></i>
                                        </div>

                                        <input type="text" autocomplete="off" value="<?php echo set_value('los'); ?>" name="los" id="los" class="form-control validate[required,minSize[3]]" placeholder="Enter <?php echo $label; ?>" />
                                    </div><?php echo form_error('los'); ?>
                                </div>
                            </div>
                            <div class="col-md-6"> 
                                <div class="form-group">
                                    <label><?php echo $label = ucwords(str_replace('_', ' ', 'dept_letter_no')); ?>:</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-file"></i>
                                        </div>

                                        <input type="text" autocomplete="off" value="<?php echo set_value('dept_letter_no'); ?>" name="dept_letter_no" id="dept_letter_no" class="form-control validate[required,minSize[3]]" placeholder="Enter <?php echo $label; ?>" />
                                    </div><?php echo form_error('dept_letter_no'); ?>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">  
                                <div class="form-group">
                                    <label><?php echo $label = ucwords(str_replace('_', ' ', 'dept_letter_no_date')); ?>:</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>

                                        <input type="text" autocomplete="off" value="<?php echo set_value('dept_letter_no_date'); ?>" name="dept_letter_no_date" id="dept_letter_no_date" class="form-control validate[required,minSize[3]]" placeholder="Enter <?php echo $label; ?>" />
                                    </div><?php echo form_error('dept_letter_no_date'); ?>
                                </div>
                            </div>
                            <div class="col-md-6">  
                                <div class="form-group">
                                    <label><?php echo $label = ucwords(str_replace('_', ' ', 'from_month')); ?>:</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>

                                        <input type="text" autocomplete="off" value="<?php echo set_value('from_month'); ?>" name="from_month" id="from_month" class="form-control validate[required]" placeholder="Enter <?php echo $label; ?>" />
                                    </div><?php echo form_error('from_month'); ?>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            
                            <div class="col-md-6"> 
                                <div class="form-group">
                                    <label><?php echo $label = ucwords(str_replace('_', ' ', 'to_month')); ?>:</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calculator"></i>
                                        </div>

                                        <input type="text" autocomplete="off" value="<?php echo set_value('to_month'); ?>" name="to_month" id="to_month" class="form-control validate[required]" placeholder="Enter <?php echo $label; ?>" />
                                    </div><?php echo form_error('to_month'); ?>
                                </div>
                            </div>
                            <div class="col-md-6"> 
                                <div class="form-group">
                                    <label><?php echo $label = ucwords(str_replace('_', ' ', 'total_month')); ?>:</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calculator"></i>
                                        </div>

                                        <input type="text" autocomplete="off" value="<?php echo set_value('total_month'); ?>" name="total_month" id="total_month" class="form-control validate[required]" placeholder="Enter <?php echo $label; ?>" />
                                    </div><?php echo form_error('total_month'); ?>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4"> 
                                <div class="form-group">
                                    <label><?php echo $label = ucwords(str_replace('_', ' ', 'grant_amount')); ?>:</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calculator"></i>
                                        </div>

                                        <input type="text" autocomplete="off" value="<?php echo set_value('grant_amount'); ?>" name="grant_amount" id="grant_amount" class="form-control validate[required]" placeholder="Enter <?php echo $label; ?>" />
                                    </div><?php echo form_error('grant_amount'); ?>
                                </div>
                            </div>
                            <div class="col-md-4"> 
                                <div class="form-group">
                                    <label><?php echo $label = ucwords(str_replace('_', ' ', 'deduction')); ?>:</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-money"></i>
                                        </div>

                                        <input type="text" autocomplete="off" value="<?php echo set_value('deduction'); ?>" name="deduction" id="deduction" class="form-control validate[required]" placeholder="Enter <?php echo $label; ?>" />
                                    </div><?php echo form_error('deduction'); ?>
                                </div>
                            </div>
                            <div class="col-md-4"> 
                                <div class="form-group">
                                    <label><?php echo $label = ucwords(str_replace('_', ' ', 'net_amount')); ?>:</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-building"></i>
                                        </div>

                                        <input type="text" autocomplete="off" value="<?php echo set_value('net_amount'); ?>" name="net_amount" id="net_amount" class="form-control validate[required]" placeholder="Enter <?php echo $label; ?>" />
                                    </div><?php echo form_error('net_amount'); ?>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">  
                                <div class="form-group">
                                    <label><?php echo $label = ucwords(str_replace('_', ' ', 'tbl_case_status_id')); ?>:</label>
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

                                        <input type="text" autocomplete="off" value="<?php echo set_value('account_no'); ?>" name="account_no" id="account_no" class="form-control validate[required]" placeholder="Enter <?php echo $label; ?>" />
                                    </div><?php echo form_error('account_no'); ?>
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
                                    <label><?php echo $label = ucwords(str_replace('_', ' ', 'sign_of_applicant')); ?>:</label>
                                    <br>
                                    <input type="radio" class="validate[required]" checked name="sign_of_applicant" id="sign_of_applicant" value="No"> No
                                    <input type="radio" class="validate[required]" name="sign_of_applicant" id="sign_of_applicant" value="Yes"> Yes
                                    <?php echo form_error('sign_of_applicant'); ?>
                                </div>
                            </div>
                        </div>

                        <div class="row"> 
                            <div class="col-md-6"> 
                                <div class="form-group">
                                    <label><?php echo $label = ucwords(str_replace('_', ' ', 's_n_office_dept_seal')); ?>:</label>
                                    <br>
                                    <input type="radio" class="validate[required]" checked name="s_n_office_dept_seal" id="s_n_office_dept_seal" value="No"> No
                                    <input type="radio" class="validate[required]" name="s_n_office_dept_seal" id="s_n_office_dept_seal" value="Yes"> Yes
                                    <?php echo form_error('s_n_office_dept_seal'); ?>
                                </div>
                            </div>  
                            <div class="col-md-6"> 
                                <div class="form-group">
                                    <label><?php echo $label = ucwords(str_replace('_', ' ', 's_n_dept_admin_seal')); ?>:</label>
                                    <br>
                                    <input type="radio" class="validate[required]" checked name="s_n_dept_admin_seal" id="s_n_dept_admin_seal" value="No"> No
                                    <input type="radio" class="validate[required]" name="s_n_dept_admin_seal" id="s_n_dept_admin_seal" value="Yes"> Yes
                                    <?php echo form_error('s_n_dept_admin_seal'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="row"> 
                            <div class="col-md-6"> 
                                <div class="form-group">
                                    <label><?php echo $label = ucwords(str_replace('_', ' ', 'cnic_attach')); ?>:</label>
                                    <br>
                                    <input type="radio" class="validate[required]" checked name="cnic_attach" id="cnic_attach" value="No"> No
                                    <input type="radio" class="validate[required]" name="cnic_attach" id="cnic_attach" value="Yes"> Yes
                                    <?php echo form_error('cnic_attach'); ?>
                                </div>
                            </div>  
                            <div class="col-md-6"> 
                                <div class="form-group">
                                    <label><?php echo $label = ucwords(str_replace('_', ' ', 'cnic_widow_attach')); ?>:</label>
                                    <br>
                                    <input type="radio" class="validate[required]" checked name="cnic_widow_attach" id="cnic_widow_attach" value="No"> No
                                    <input type="radio" class="validate[required]" name="cnic_widow_attach" id="cnic_widow_attach" value="Yes"> Yes
                                    <?php echo form_error('cnic_widow_attach'); ?>
                                </div>
                            </div>
                        </div>

                        <div class="row"> 
                            <div class="col-md-6"> 
                                <div class="form-group">
                                    <label><?php echo $label = ucwords(str_replace('_', ' ', 'dc_attach')); ?>:</label>
                                    <br>
                                    <input type="radio" class="validate[required]" checked name="dc_attach" id="dc_attach" value="No"> No
                                    <input type="radio" class="validate[required]" name="dc_attach" id="dc_attach" value="Yes"> Yes
                                    <?php echo form_error('dc_attach'); ?>
                                </div>
                            </div>  

                            <div class="col-md-6"> 
                                <div class="form-group">
                                    <label><?php echo $label = ucwords(str_replace('_', ' ', 'disc_attach')); ?>:</label>
                                    <br>
                                    <input type="radio" class="validate[required]" checked name="disc_attach" id="disc_attach" value="No"> No
                                    <input type="radio" class="validate[required]" name="disc_attach" id="disc_attach" value="Yes"> Yes
                                    <?php echo form_error('disc_attach'); ?>
                                </div>
                            </div>  

                        </div>
                        <div class="row"> 
                            <div class="col-md-6"> 
                                <div class="form-group">
                                    <label><?php echo $label = ucwords(str_replace('_', ' ', 'payroll_lpc_attach')); ?>:</label>
                                    <br>
                                    <input type="radio" class="validate[required]" checked name="payroll_lpc_attach" id="payroll_lpc_attach" value="No"> No
                                    <input type="radio" class="validate[required]" name="payroll_lpc_attach" id="payroll_lpc_attach" value="Yes"> Yes
                                    <?php echo form_error('payroll_lpc_attach'); ?>
                                </div>
                            </div>  
                            <div class="col-md-6"> 
                                <div class="form-group">
                                    <label><?php echo $label = ucwords(str_replace('_', ' ', 'retirement_attach')); ?>:</label>
                                    <br>
                                    <input type="radio" class="validate[required]" checked name="retirement_attach" id="retirement_attach" value="No"> No
                                    <input type="radio" class="validate[required]" name="retirement_attach" id="retirement_attach" value="Yes"> Yes
                                    <?php echo form_error('retirement_attach'); ?>
                                </div>
                            </div> 
                            
                        </div>

                        <div class="row">  
                            <div class="col-md-6"> 
                                <div class="form-group">
                                    <label><?php echo $label = ucwords(str_replace('_', ' ', 'bf_contribution_attach')); ?>:</label>
                                    <br>
                                    <input type="radio" class="validate[required]" checked name="bf_contribution_attach" id="bf_contribution_attach" value="No"> No
                                    <input type="radio" class="validate[required]" name="bf_contribution_attach" id="bf_contribution_attach" value="Yes"> Yes
                                    <?php echo form_error('bf_contribution_attach'); ?>
                                </div>
                            </div>
                            <div class="col-md-6"> 
                                <div class="form-group">
                                    <label><?php echo $label = ucwords(str_replace('_', ' ', 'invalidation_attach')); ?>:</label>
                                    <br>
                                    <input type="radio" class="validate[required]" checked name="invalidation_attach" id="invalidation_attach" value="No"> No
                                    <input type="radio" class="validate[required]" name="invalidation_attach" id="invalidation_attach" value="Yes"> Yes
                                    <?php echo form_error('invalidation_attach'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="row">  
                            <div class="col-md-6"> 
                                <div class="form-group">
                                    <label><?php echo $label = ucwords(str_replace('_', ' ', 'family_attach')); ?>:</label>
                                    <br>
                                    <input type="radio" class="validate[required]" checked name="family_attach" id="family_attach" value="No"> No
                                    <input type="radio" class="validate[required]" name="family_attach" id="family_attach" value="Yes"> Yes
                                    <?php echo form_error('family_attach'); ?>
                                </div>
                            </div>
                            <div class="col-md-6"> 
                                <div class="form-group">
                                    <label><?php echo $label = ucwords(str_replace('_', ' ', 'bf_contribution_attach_copy3')); ?>:</label>
                                    <br>
                                    <input type="radio" class="validate[required]" checked name="bf_contribution_attach_copy3" id="bf_contribution_attach_copy3" value="No"> No
                                    <input type="radio" class="validate[required]" name="bf_contribution_attach_copy3" id="bf_contribution_attach_copy3" value="Yes"> Yes
                                    <?php echo form_error('bf_contribution_attach_copy3'); ?>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">  
                            <div class="col-md-6"> 
                                <div class="form-group">
                                    <label><?php echo $label = ucwords(str_replace('_', ' ', 'no_marriage_attach')); ?>:</label>
                                    <br>
                                    <input type="radio" class="validate[required]" checked name="no_marriage_attach" id="no_marriage_attach" value="No"> No
                                    <input type="radio" class="validate[required]" name="no_marriage_attach" id="no_marriage_attach" value="Yes"> Yes
                                    <?php echo form_error('no_marriage_attach'); ?>
                                </div>
                            </div>
                            <div class="col-md-6"> 
                                <div class="form-group">
                                    <label><?php echo $label = ucwords(str_replace('_', ' ', 'undertaking_attach')); ?>:</label>
                                    <br>
                                    <input type="radio" class="validate[required]" checked name="undertaking_attach" id="undertaking_attach" value="No"> No
                                    <input type="radio" class="validate[required]" name="undertaking_attach" id="undertaking_attach" value="Yes"> Yes
                                    <?php echo form_error('undertaking_attach'); ?>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            
                            <div class="col-md-6"> 
                                <div class="form-group">
                                    <label><?php echo $label = ucwords(str_replace('_', ' ', 'boards_approval')); ?>:</label>
                                    <br>
                                    <input type="radio" class="validate[required]" checked name="boards_approval" id="boards_approval" value="0"> No
                                    <input type="radio" class="validate[required]" name="boards_approval" id="boards_approval" value="1"> Yes
                                    <?php echo form_error('boards_approval'); ?>
                                </div>
                            </div>  
                            <div class="col-md-6"> 
                                <div class="form-group">
                                    <label><?php echo $label = ucwords(str_replace('_', ' ', 'ac_edit')); ?>:</label>
                                    <br>
                                    <input type="radio" class="validate[required]" checked name="ac_edit" id="ac_edit" value="0"> No
                                    <input type="radio" class="validate[required]" name="ac_edit" id="ac_edit" value="1"> Yes
                                    <?php echo form_error('ac_edit'); ?>
                                </div>
                            </div>
                            
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6"> 
                                <div class="form-group">
                                    <label><?php echo $label = ucwords(str_replace('_', ' ', 'sent_to_secretary')); ?>:</label>
                                    <br>
                                    <input type="radio" class="validate[required]" checked name="sent_to_secretary" id="sent_to_secretary" value="0"> No
                                    <input type="radio" class="validate[required]" name="sent_to_secretary" id="sent_to_secretary" value="1"> Yes
                                    <?php echo form_error('sent_to_secretary'); ?>
                                </div>
                            </div>
                            <div class="col-md-6"> 
                                <div class="form-group">
                                    <label><?php echo $label = ucwords(str_replace('_', ' ', 'approve_secretary')); ?>:</label>
                                    <br>
                                    <input type="radio" class="validate[required]" checked name="approve_secretary" id="approve_secretary" value="0"> No
                                    <input type="radio" class="validate[required]" name="approve_secretary" id="approve_secretary" value="1"> Yes
                                    <?php echo form_error('approve_secretary'); ?>
                                </div>
                            </div>   
                        </div>

                        <div class="row">
                            
                            <div class="col-md-6"> 
                                <div class="form-group">
                                    <label><?php echo $label = ucwords(str_replace('_', ' ', 'sent_to_bank')); ?>:</label>
                                    <br>
                                    <input type="radio" class="validate[required]" checked name="sent_to_bank" id="sent_to_bank" value="0"> No
                                    <input type="radio" class="validate[required]" name="sent_to_bank" id="sent_to_bank" value="1"> Yes
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
        $('#doa').datetimepicker({
            useCurrent: false,
            format: "DD-MM-YYYY",
            showTodayButton: true,
            ignoreReadonly: true
        }); 
        $('#dor').datetimepicker({
            useCurrent: false,
            format: "DD-MM-YYYY",
            showTodayButton: true,
            ignoreReadonly: true
        }); 
        $('#dept_letter_no_date').datetimepicker({
            useCurrent: false,
            format: "DD-MM-YYYY",
            showTodayButton: true,
            ignoreReadonly: true
        });
    });
</script>
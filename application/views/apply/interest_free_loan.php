<div class="container">
    <!-- Content Header (Page header) -->
    <section class="content-header">

        <?php $this->load->view('templates/alerts'); ?>

        <h1>
            <?php echo ucwords(str_replace('_', ' ', $page_title)); ?> 
        </h1>
        <p><?php echo ucwords(str_replace('_', ' ', $description)); ?></p>
    </section>

    <!-- Main content -->
    <?php echo validation_errors(); ?>
    <?php echo form_open_multipart('apply-for-interest-free-loan', 'id="formID"'); ?>

    <!--      <form id="formID" method="POST" action="" enctype="multipart/form-data"> -->
    <!-- Main content -->
    <section class="content">
 
       
    <div class="row">
        
        <div class="col-md-6">
            <div class="form-group">
                <label><?php echo $label = ucwords(str_replace('_', ' ', 'District account office')); ?>:</label>
                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="fa fa-user"></i>
                    </div>

                    <input type="text" autocomplete="off" value="<?php echo set_value('dao'); ?>" name="dao" id="dao" class="form-control" placeholder="Enter <?php echo $label; ?>" />
                </div><?php echo form_error('dao'); ?>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label><?php echo $label = ucwords(str_replace('_', ' ', 'DDO_code')); ?>:</label>
                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="fa fa-user"></i>
                    </div>
                    <input type="text" autocomplete="off" value="<?php echo set_value('ddo_code'); ?>" name="ddo_code" id="ddo_code" class="form-control" placeholder="Enter <?php echo $label; ?>" />
                </div><?php echo form_error('ddo_code'); ?>
            </div>
        </div>
    </div>

    <div class="row">
        
        <div class="col-md-6">
            <div class="form-group">
                <label><?php echo $label = ucwords(str_replace('_', ' ', 'DDO_address')); ?>:</label>
                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="fa fa-user"></i>
                    </div>
                    <input type="text" autocomplete="off" value="<?php echo set_value('ddo_address'); ?>" name="ddo_address" id="ddo_address" class="form-control" placeholder="Enter <?php echo $label; ?>" />
                </div><?php echo form_error('ddo_address'); ?>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label><?php echo $label = ucwords(str_replace('_', ' ', 'personnel_no')); ?>:</label>
                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="fa fa-user"></i>
                    </div>

                    <input type="text" autocomplete="off" value="<?php echo set_value('personnelNo');?>" name="personnelNo" id="personnelNo" class="form-control" placeholder="Enter <?php echo $label; ?>" />
                </div><?php echo form_error('personnelNo'); ?>
            </div>
            <!-- <div class="form-group">
                <label><?php //echo $label = ucwords('marital status'); ?>:</label>
                <br>
                <input type="radio" class="validate[required]" checked name="marital_status" id="marital_status" value="married"> Married
                <input type="radio" class="validate[required]" name="marital_status" id="marital_status" value="unmarried"> Unmarried
                <?php //echo form_error('marital_status'); ?>
            </div> -->
        </div>
    </div> 

    <div class="row">
        
        <div class="col-md-6">
            <div class="form-group">
                <label><?php echo $label = ucwords(str_replace('_', ' ', 'loan_type')); ?>:</label>
                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="fa fa-money"></i>
                    </div> 
                        <select name="tbl_loan_type_id" id="tbl_loan_type_id" class="form-control" required>
                            <option value="">Select loan type</option> 
                            <?php foreach ($loan_types as $loanTypesInfo) : ?>
                                <option value="<?php echo $loanTypesInfo['id']; ?>"><?php echo $loanTypesInfo['title']; ?></option>
                            <?php endforeach; ?>
                        </select>
                </div><?php echo form_error('tbl_loan_type_id'); ?>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label><?php echo $label = ucwords(str_replace('_', ' ', 'grantee_name')); ?>:</label>
                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="fa fa-user"></i>
                    </div> 
                    <input type="text" value="<?php echo $emp_info->grantee_name;?>" name="grantee_name" id="grantee_name" class="form-control" placeholder="Enter <?php echo $label; ?>" />
                </div><?php echo form_error('grantee_name'); ?>
            </div>
        </div>
    </div>

    <div class="row">
        
        <div class="col-md-6">
            <div class="form-group">
                <label><?php echo $label = ucwords(str_replace('_', ' ', 'father_name')); ?>:</label>
                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="fa fa-user"></i>
                    </div> 
                    <input type="text" autocomplete="off" value="<?php echo $emp_info->father_name;?>" name="father_name" id="father_name" class="form-control" placeholder="Enter <?php echo $label; ?>" />
                </div><?php echo form_error('father_name'); ?>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label><?php echo $label = ucwords(str_replace('_', ' ', 'cnic_no')); ?>:</label>
                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                    </div>

                    <input type="text" autocomplete="off" value="<?php echo $emp_info->cnic_no;?>" name="cnic_no" id="cnic_no" class="form-control" placeholder="Enter <?php echo $label; ?>" />
                </div><?php echo form_error('cnic_no'); ?>
            </div>
        </div>
    </div>

     

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label><?php echo $label = ucwords(str_replace('_', ' ', 'department')); ?>:</label>
                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="fa fa-industry"></i>
                    </div>

                    <select name="tbl_department_id" id="tbl_department_id" class="form-control" required>
                        <option value="">Select Department</option>
                        <?php foreach ($department as $departmentInfo) : ?>
                            <option value="<?php echo $departmentInfo['id']; ?>" <?php if($emp_info->tbl_department_id == $departmentInfo['id']){ echo 'selected'; }?>><?php echo $departmentInfo['name']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div><?php echo form_error('tbl_department_id'); ?>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label><?php echo $label = ucwords(str_replace('_', ' ', 'Post Type')); ?>:</label>
                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="fa fa-building"></i>
                    </div>

                    <select name="tbl_post_id" id="tbl_post_id" class="form-control" required>
                        <option value="">Select Post</option>
                        <?php foreach ($posts as $postInfo) : ?>
                            <option value="<?php echo $postInfo['id']; ?>" <?php if($emp_info->tbl_post_id == $postInfo['id']){ echo 'selected'; }?>><?php echo $postInfo['name']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div><?php echo form_error('tbl_post_id'); ?>
            </div>
        </div>
    </div>

    <div class="row"> 
        <div class="col-md-6">  
            <div class="form-group">
                <label><?php echo $label = ucwords(str_replace('_', ' ', 'Date of birth')); ?>:</label>
                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                    </div>

                    <input type="date" autocomplete="off" value="<?php echo $emp_info->dob; ?>" name="dob" id="dob" class="form-control" placeholder="Enter <?php echo $label; ?>" />
                </div><?php echo form_error('dob'); ?>
            </div> 
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label><?php echo $label = ucwords(str_replace('_', ' ', 'Date of appointment')); ?>:</label>
                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                    </div>

                    <input type="date" onchange="getServiceLength()" autocomplete="off" value="<?php echo set_value('doa'); ?>" name="doa" id="doa" class="form-control" placeholder="Enter <?php echo $label; ?>" />
                </div><?php echo form_error('doa'); ?>
            </div>
        </div>
    </div>

    <div class="row"> 
        <div class="col-md-6">
            <div class="form-group">
                <label><?php echo $label = ucwords(str_replace('_', ' ', 'Date of Retirement')); ?>:</label>
                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                    </div>

                    <input type="date" onchange="getServiceLength()" autocomplete="off" value="<?php echo set_value('dor'); ?>" name="dor" id="dor" class="form-control" placeholder="Enter <?php echo $label; ?>" />
                </div><?php echo form_error('dor'); ?>
            </div>
        </div>
        <div class="col-md-6"> 
            <div class="form-group">
                <label><?php echo $label = ucwords(str_replace('_', ' ', 'Length Of Service')); ?>:</label>
                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="fa fa-file"></i>
                    </div>

                    <input type="text" autocomplete="off" value="<?php echo set_value('los'); ?>" name="los" id="los" class="form-control" placeholder="Enter <?php echo $label; ?>" />
                </div><?php echo form_error('los'); ?>
            </div>
        </div>
        
    </div>

  
    
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label><?php echo $label = ucwords(str_replace('_', ' ', 'present_address')); ?>:</label>
                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="fa fa-file"></i>
                    </div>

                    <input type="text"  autocomplete="off" value="<?php echo set_value('present_add'); ?>" name="present_add" id="present_add" class="form-control" placeholder="Enter <?php echo $label; ?>" />
                </div><?php echo form_error('present_address'); ?>
            </div>
        </div> 
        <div class="col-md-6">
            <div class="form-group">
                <label><?php echo $label = ucwords(str_replace('_', ' ', 'permanent_address')); ?>:</label>
                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="fa fa-file"></i>
                    </div>

                    <input type="text" autocomplete="off" value="<?php echo set_value('permanent_add'); ?>" name="permanent_add" id="permanent_add" class="form-control" placeholder="Enter <?php echo $label; ?>" />
                </div><?php echo form_error('permanent_address'); ?>
            </div>
        </div> 
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label><?php echo $label = ucwords(str_replace('_', ' ', 'duty_place')); ?>:</label>
                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="fa fa-file"></i>
                    </div>

                    <input type="text" autocomplete="off" value="<?php echo set_value('duty_place'); ?>" name="duty_place" id="duty_place" class="form-control" placeholder="Enter <?php echo $label; ?>" />
                </div><?php echo form_error('duty_place'); ?>
            </div>
        </div> 
        <div class="col-md-6">
            <div class="form-group">
                <label><?php echo $label = ucwords(str_replace('_', ' ', 'contact_no')); ?>:</label>
                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="fa fa-phone"></i>
                    </div>

                    <input type="text" autocomplete="off" value="<?php echo set_value('contact_no'); ?>" name="contact_no" id="contact_no" class="form-control" placeholder="Enter <?php echo $label; ?>" />
                </div><?php echo form_error('contact_no'); ?>
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
                    <select name="tbl_list_bank_branches_id" id="tbl_list_bank_branches_id" class="form-control">
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

                    <input type="text" autocomplete="off" value="<?php echo set_value('account_no'); ?>" name="account_no" id="account_no" class="form-control" placeholder="Enter <?php echo $label; ?>" />
                </div><?php echo form_error('account_no'); ?>
            </div>
        </div>
    </div>

    <!--<div class="row"> 
        <div class="col-md-6">
            <div class="form-group">
                <label><?php echo $label = ucwords(str_replace('_', ' ', 'applicant_sign')); ?>:</label>
                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="fa fa-user"></i>
                    </div>

                    <input type="text" autocomplete="off" value="<?php echo set_value('applicant_sign'); ?>" name="applicant_sign" id="applicant_sign" class="form-control" placeholder="Enter <?php echo $label; ?>" />
                </div><?php echo form_error('applicant_sign'); ?>
            </div>
        </div> 
    </div> -->

         
    <h4>Certified that:</h4>
    <p><strong>a.</strong> He/She has not been granted any loan from Government / any Bank / Financial Institution or any other
    source.</p>
    <p><strong>b.</strong> He/She will not be allowed to leave the service until full recovery of the advance is made from his / her
    or from his/her dues (GP Fund, Gratuity, Leave Encashment, Pension) with the Government.</p>
    <p><strong>c.</strong> The facts mentioned above are correct to the best of my knowledge and belief.</p>

    <div class="row">
        <!-- /.col -->
        <div class="col-xs-12">
            <button type="submit" value="submit" name="submit" class="btn btn-primary">SUBMIT</button> 
        </div>
        <!-- /.col -->
    </div>
     
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

    $(document).ready(function() {
        //alert('i m here');
        $('#personnelNo').on('change', function() {
            var base_url = "<?php echo base_url(); ?>";
            var personnelNo = $('#personnelNo').val();
            //alert(personnelNo); //return false; 
            if(personnelNo) { 

                $.ajax({
                    url: base_url +'apply/getDataByPersonnelNo/'+personnelNo, 
                    type: "post",
                    dataType: "json",
                    success:function(data) {    
                        alert(JSON.stringify(data));
                        if(data.empInfo != null) { 
                            $('#tbl_emp_info_id').val(data.empInfo.id);   
                            $('#tbl_department_id').val(data.empInfo.tbl_department_id);   
                            $('#pay_scale_id').val(data.empInfo.pay_scale_id);
                            $('#designation').val(data.designation.name);
                            $('#pay_scale').val(data.empInfo.pay_scale); 
                            $('#grantee_name').val(data.empInfo.grantee_name);
                        } else {
                            $('#pay_scale_id').val('');
                            $('#tbl_emp_info_id').val('');   
                            $('#designation').val('');
                            $('#pay_scale').val(''); 
                            $('#grantee_name').val('');
                            $('select[id="tbl_department_id"]').empty();
                        }

                    },
                    error: function(XMLHttpRequest, textStatus, errorThrown) { 
                        alert("Status: " + textStatus); alert("Error: " + errorThrown); 
                    }
                });

            }else{
                
                $('#pay_scale_id').val('');
                $('#designation').val('');
                $('#pay_scale').val(''); 
                $('#grantee_name').val('');
                $('select[id="tbl_department_id"]').empty();
                
            }
        });


        $('#dept_letter_no_date').datetimepicker({
            useCurrent: false,
            format: "DD-MM-YYYY",
            showTodayButton: true,
            ignoreReadonly: true
        });

        //$('#tbl_emp_info_id').onchange(function())
 
        $('#tbl_emp_info_id').change(function(){
            
            var base_url = "<?php echo base_url(); ?>";
            var tbl_emp_info_id = $(this).val();
            //alert( tbl_emp_info_id  ); 
              
            $.ajax({
                url: base_url +'emp_info/getEmpData/', 
                method: 'post',
                data: { emp_id: tbl_emp_info_id},
                dataType: 'json',
                success: function(response){
                    //alert(JSON.stringify(response));
                     
                    var len = response.id;
                      
                    if(len > 0){
                        // Read values 
                        var granteeName = response.grantee_name;
                        var fatherName = response.father_name;
                        var contact_no = response.contact_no;
                        var marital_status = response.marital_status;
                        var tbl_department_id = response.tbl_department_id;
                        var tbl_post_id = response.tbl_post_id;
                        var pay_scale = response.pay_scale;
                        var pay_scale_id = response.pay_scale_id;
                        var tbl_district_id = response.tbl_district_id;
                        var office_address = response.office_address;
                        var other_address = response.other_address;
                        var cnic_no = response.cnic_no;
                        var personnel_no = response.personnel_no;
                        var dob = response.dob; 
                         
                        //alert(response); 
                        $("#grantee_name").val(granteeName);
                        $("#father_name").val(fatherName);
                        $("#contact_no").val(contact_no);
                        //$("#marital_status").val(marital_status);
                        $("#tbl_department_id").val(tbl_department_id);
                        $('#tbl_department_id').select2().trigger('change');
                        //$("#tbl_department_id > [value=" + tbl_department_id + "]").attr("selected", "true");
                        $("#tbl_post_id").val(tbl_post_id);
                        $('#tbl_post_id').select2().trigger('change');
                        $("#pay_scale").val(pay_scale);
                        $('#pay_scale_id').val(pay_scale_id);
                         
                        $("#tbl_district_id").val(tbl_district_id);
                        $('#tbl_district_id').select2().trigger('change');
                        $("#office_address").val(office_address);
                        $("#other_address").val(other_address);
                        $("#cnic_no").val(cnic_no);
                        $("#personnel_no").val(personnel_no);
                        $("#dob").val(dob); 
                         
                        // $('#sname').text(name);
                        // $('#semail').text(email);
                
                    }
                }
            });
        });
 

        $('#deduction').on('keyup', function() {
            var base_url = "<?php echo base_url(); ?>";
            var deduction = $('#deduction').val(); 
            var grant_amount = $('#grant_amount').val();  

            if(deduction) {
                var net_amount = grant_amount-deduction;
                $('#net_amount').val(net_amount); 
            }else{
                $('#deduction').val(0);
            }
        });
        
        $('#doa, #dor, #tbl_loan_type_id').on('change', function() {
        
            //alert('i m here');
            
            var base_url = "<?php echo base_url(); ?>";
            var dateOfAppointment = $('#doa').val(); 
            var dateOfRetirement = $('#dor').val(); 
            var empScale = $('#pay_scale_id').val(); 
            var loanType  = $('#tbl_loan_type_id').val(); 
            var emp_id = $('#tbl_emp_info_id').val(); 
 
            //alert('loanType = '+ loanType);

            // startDate = new Date($('#doa').val());
            // endDate = new Date($('#dor').val());
  
            var formData = { doa: dateOfAppointment, dor: dateOfRetirement, empID: emp_id, 
            empScaleID: empScale, loanTypeID: loanType  };
            
            //alert(JSON.stringify(formData)); 
            //return false;
            // if(emp_id == '' || empScale == ''){
            //     alert('Please select employee to continue');
            //     $('#dor').val('');  
            //     return false;
            // } else if(empScale > 15) {
            //     alert('You are not elligible for the funeral grant.');
            //     return false;
            // }
            // else 
            
            // alert('loanType = '+ loanType);
            // alert('doa = '+ dateOfAppointment);
            // alert('dor = '+ dateOfRetirement);
            // alert('emp_id = '+ emp_id);
            


            if(loanType != '' && dateOfAppointment != '' && dateOfRetirement != '' && emp_id != ''){
                
                $.ajax({ 
                    url: base_url +'interest_free_loan/getAmountData/',  
                    type: "post",
                    data : formData,
                    dataType: "json",
                    success:function(response) {  
                        //alert('response = ' + JSON.stringify(response));
                        //alert('Status = '+response.status + ' Amount = ' + response.data.amount);
                        if(response.status == 'success')
                        { 
                            $('#grant_amount').val(response.data.amount);
                            $('#deduction').val(0);
                            $('#net_amount').val(response.data.amount); 
                        } else {
                            $('.msgBody').html(response.data);
                            $('#msgModal').modal('show'); 

                            $('#grant_amount').val('');
                            $('#deduction').val(0);
                            $('#net_amount').val(''); 
                        }
                        
                    }
                });

            } else {
                $('#grant_amount').empty();
                $('#deduction').empty(0);
                $('#net_amount').empty();
            }
        });


       

    });

</script> 

  

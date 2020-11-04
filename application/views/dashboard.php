<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <?php $this->load->view('templates/alerts'); ?>

        <h1>
            <?php echo $page_title; ?>
            <small><?php echo $description; ?></small>
            <i><small style="float: right;"><?php echo $rightDescription; ?></small></i>
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">

    <? //echo '<pre>'; print_r($_SESSION); exit; ?>
    
    <?php if($_SESSION['admin_id'] == 1) {  ?>
    
    <div class="row"> 
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <a href="<?php echo base_url('view_monthly_grants'); ?>">
                <div class="small-box bg-red">
                    <div class="inner">
                        <h3><?php echo $monthly_grants_applications; ?></h3> 
                        <p>Monthly Grants</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-pie-graph"></i>
                    </div>
                    <span class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></span>
                </div>
            </a>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <a href="<?php echo base_url('view_retirement_grants'); ?>">
                <div class="small-box bg-aqua">
                    <div class="inner">
                    <h3><?php echo $retirement_grants_applications; ?></h3> 
                    <p>Retirement Grants</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-map-marker"></i>
                    </div>
                    <span class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></span>
                </div>
            </a>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <a href="<?php echo base_url('view_scholarship_grants'); ?>">
                <div class="small-box bg-yellow">
                    <div class="inner">
                        <h3><?php echo $scholarship_grants_applications; ?></h3>  
                        <p>Scholarship Grants</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                    <span class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></span>
                </div>
            </a>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <a href="<?php echo base_url('view_funeral_grants'); ?>">
                <div class="small-box bg-green">
                    <div class="inner">
                        <h3><?php echo $funeral_grants_applications; ?></h3> 
                        <p>Funeral Grants</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>
                    <span class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></span>
                </div>
            </a>
        </div> 
            
    </div>



    <div class="row">
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <a href="<?php echo base_url('view_interest_free_loan_grants'); ?>">
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <h3><?php echo $interestfreeloan_grants_applications; ?></h3> 
                        <p>Interest Free Loan Grants</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-map-marker"></i>
                    </div>
                    <span class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></span>
                </div>
            </a>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <a href="<?php echo base_url('view_lumpsum_grants'); ?>">
                <div class="small-box bg-yellow">
                    <div class="inner">
                        <h3><?php echo $lumpsum_grants_applications; ?></h3>  
                        <p>Lumpsum Grants</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                    <span class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></span>
                </div>
            </a>
        </div> 
        
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <a href="<?php echo base_url('view_department'); ?>">
                <div class="small-box bg-green">
                    <div class="inner">
                        <h3><?php echo $departments; ?></h3> 
                        <p>Total Departments</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>
                    <span class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></span>
                </div>
            </a>
        </div>


        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <a href="<?php echo base_url('view_district'); ?>">
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <h3><?php echo $districts; ?></h3> 
                        <p>Total Districts</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-map-marker"></i>
                    </div>
                    <span class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></span>
                </div>
            </a>
        </div>
        
    </div>

    

    <div class="row">
        
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
                <!-- small box -->
            <a href="<?php echo base_url('view_emp_info'); ?>">
                <div class="small-box bg-yellow">
                    <div class="inner">
                        <h3><?php echo $usres; ?></h3>
                        <p>Registered Users</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                    <span class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></span>
                </div>
            </a>
        </div>
        
            
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <a href="<?php echo base_url('view_banks'); ?>">
                <div class="small-box bg-red">
                    <div class="inner">
                        <h3><?php echo $banks; ?></h3> 
                        <p>Total Banks</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-pie-graph"></i>
                    </div>
                    <span class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></span>
                </div>
            </a>
        </div>
        <!-- ./col -->
        <!-- ./col -->
        
        
    </div>

    <?php } ?>
 

    </section>
    <!-- /.content -->
</div>
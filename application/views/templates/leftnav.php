<?php
if ($_SESSION['admin_id']) {
	$admin_detail = $this->admin->getRecordById($_SESSION['admin_id'], $tbl_name = 'tbl_admin');
} elseif ($_SESSION['user_id']) {
	$admin_detail = $this->admin->getRecordById($_SESSION['user_id'], $tbl_name = 'tbl_user');
}
?>
<style type="text/css">
  .skin-blue .sidebar-menu>li.header {
    color: #ffffff;
    background: #367fa8;
    font-weight: bold;
}
</style>
<aside class="main-sidebar">

  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="<?php echo base_url() . IMG_UPLOAD_PATH . 'admin/' . $admin_detail['image']; ?>" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p><?php echo $admin_detail['name']; ?></p>
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>
    <!-- Sidebar Menu -->
    <ul class="sidebar-menu">
      <li class="header">Main Menu</li>
      <?php if (!empty($_SESSION['tbl_admin_role_id'])) {?>
        <li class="treeview">
        <a href="<?php echo base_url('dashboard'); ?>"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a>
      </li>
      <li class="treeview">
        <a href="#"><i class="fa fa-users"></i> <span>Users Manag.</span>
        <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>
        <ul class="treeview-menu">
          <li><a href="<?php echo base_url('admins/edit_admin/' . $admin_detail['id']); ?>"><i class="fa fa-user"></i> Your Profile</a></li>
          <?php if ($_SESSION['tbl_admin_role_id'] == 1) {?>
          <li><a href="<?php echo base_url('add_admin'); ?>"><i class="fa fa-plus"></i> Add</a></li>
          <?php }?>
          <li><a href="<?php echo base_url('view_admin'); ?>"><i class="fa fa-circle-o"></i> View </a></li>
                <?php if ($_SESSION['tbl_admin_role_id'] == 1) {?>

        <li>
        <a href="<?php echo base_url('view_admin_role'); ?>"><i class="fa fa-user"></i> <span>Role Manag.</span></a>
      </li>
    <?php }?>
        </ul>
      </li>

      <?php }?>
      <?php if ($_SESSION['tbl_admin_role_id'] == 1) {?>

        <li class="treeview">
        <a href="#"><i class="fa fa-info-circle"></i> <span>Miscellaneous</span>
        <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>
        <ul class="treeview-menu">
          <li class="">
        <a href="<?php echo base_url('view_district'); ?>"><i class="fa fa-building-o"></i> <span>District Manag.</span></a>
      </li>

      <li class="">
        <a href="<?php echo base_url('view_department'); ?>"><i class="fa fa-industry"></i> <span>Department Manag.</span></a>
      </li>

      <li class="">
        <a href="<?php echo base_url('view_case_status'); ?>"><i class="fa fa-check"></i> <span>Case Status Manag.</span></a>
      </li>

      <li class="">
        <a href="<?php echo base_url('view_pay_scale'); ?>"><i class="fa fa-balance-scale"></i> <span>Pay Scale Manag.</span></a>
      </li>

      <li class="">
        <a href="<?php echo base_url('view_post'); ?>"><i class="fa fa-tasks"></i> <span>Post Manag.</span></a>
      </li>
      <li class="">
        <a href="<?php echo base_url('view_payment_mode'); ?>"><i class="fa fa-credit-card"></i> <span>Payment Mode Manag.</span></a>
      </li>
        </ul>
      </li>

      <li class="treeview">
        <a href="#"><i class="fa fa-bank"></i> <span>Banks</span>
        <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>
        <ul class="treeview-menu">
           <li class="">
        <a href="<?php echo base_url('view_banks'); ?>"><i class="fa fa-bank"></i> <span>Banks Manag.</span></a>
      </li>

      <li class="">
        <a href="<?php echo base_url('view_bfc_bank_branch'); ?>"><i class="fa fa-bank"></i> <span>BFC Banks Manag.</span></a>
      </li>

      <li class="">
        <a href="<?php echo base_url('view_grantee_bank_branch'); ?>"><i class="fa fa-bank"></i> <span>Grantee Banks Manag.</span></a>
      </li>
        </ul>
      </li>

      <li class="treeview">
        <a href="#"><i class="fa fa-list"></i> <span>Grants</span>
        <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>
        <ul class="treeview-menu">
          <li class="">
        <a href="<?php echo base_url('view_grants'); ?>"><i class="fa fa-money"></i> <span>Grants Manag.</span></a>
      </li>

      <li class="">
        <a href="<?php echo base_url('view_grantee_type'); ?>"><i class="fa fa-list"></i> <span>Grantee Type Manag.</span></a>
      </li>
      <li class="">
        <a href="<?php echo base_url('view_grant_payments'); ?>"><i class="fa fa-money"></i> <span>Grants Payments Manag.</span></a>
      </li>
      <li class="">
        <a href="<?php echo base_url('view_emp_info'); ?>"><i class="fa fa-user"></i> <span>Emp Info Manag.</span></a>
      </li>
      <li class="">
        <a href="<?php echo base_url('scholarship_grant_manag'); ?>"><i class="fa fa-user"></i> <span>Scholarship Grant Manag.</span></a>
      </li>
        </ul>
      </li>



    <?php }?>

      <li class="headerr"></li>

      <!-- <li class="treeview">
        <a href="#"><i class="fa fa-gear"></i> <span>Setting</span>
        <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>
        <ul class="treeview-menu">
          <li><a href="<?php echo base_url('setting') ?>"><i class="fa fa-circle-o"></i> Site Setting </a></li>
        </ul>
      </li> -->
    </ul>
    <!-- /.sidebar-menu -->
  </section>
  <!-- /.sidebar -->
</aside>

<script type="text/javascript">
  $(document).ready(function(e){
var url=window.location
$('.treeview-menu a').each(function(e){
    var link = $(this).attr('href');
    if(link==url){
        $(this).parent('li').addClass('active');
        $(this).closest('.treeview').addClass('active');
    }
});

$('.treeview a').each(function(e){
    var link = $(this).attr('href');
    if(link==url){
        $(this).parent('li').addClass('active');
        $(this).closest('.treeview').addClass('active');
    }
});
});
</script>
<?php
if (isset($_SESSION['admin_id'])) {
	$admin_detail = $this->admin->getRecordById($_SESSION['admin_id'], $tbl_name = 'tbl_admin');
} elseif (isset($_SESSION['user_id'])) {
	$admin_detail = $this->admin->getRecordById($_SESSION['user_id'], $tbl_name = 'tbl_user');
}
?>
<div class="wrapper">
  <!-- Main Header -->
  <header class="main-header">
    <!-- Logo -->
    <a href="<?php echo base_url(); ?>dashboard" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>BFC</b></span>

      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Benevolent F/C</b></span>
    </a>
    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">

          <li class="dropdown user user-menu">
            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <!-- The user image in the navbar-->

              <?php
//include_once 'classes/class.database.php';
//$objAdmin = new adminManagement();
//$user= $objAdmin->getRecordById('userl_admin',$_SESSION['ADMIN_ID']);
// $user = $database->select("userl_admin", "*", ["id" => $_SESSION['ADMIN_ID']]);
//var_dump($user);

?>
              <img src="<?php echo base_url() . IMG_UPLOAD_PATH . 'admin/' . $admin_detail['image']; ?>"  class="user-image" alt="User Image">
              <!-- hidden-xs hides the username on small devices so only the image appears. -->
              <span class="hidden-xs"><?php echo $admin_detail['name']; ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- The user image in the menu -->
              <li class="user-header">
                <img src="<?php echo base_url() . IMG_UPLOAD_PATH . 'admin/' . $admin_detail['image']; ?>" class="img-circle" alt="User Image">

                <p>
                  <?php echo $admin_detail['email']; ?>
                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <?php if (isset($_SESSION['admin_id'])) {?>

                    <a href="<?php echo base_url('admins/edit_admin/' . $admin_detail['id']) ?>" class="btn btn-default btn-flat">Profile</a>
                  <?php } elseif (isset($_SESSION['user_id'])) {?>
                    <a href="<?php echo base_url('users/edit_user/' . $admin_detail['id']) ?>" class="btn btn-default btn-flat">Profile</a>
                  <?php }?>


                </div>
                <div class="pull-right">
                  <a href="<?php echo base_url('auth/logout'); ?>" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>

        </ul>
      </div>
    </nav>
  </header>

<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">BFC KP</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <!-- <li class="active"><a href="#">APPLY HERE <span class="sr-only">(current)</span></a></li> -->

        <li class="dropdown active">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">APPLY HERE <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="<?php echo base_url('apply-for-scholarship-grant'); ?>">FOR SCHOLARSHIP GRANT</a></li> 
            <li role="separator" class="divider"></li>
            <li><a href="#">INTEREST FREE LOAN</a></li> 
          </ul>
        </li>
 
         
      </ul>
      
      
      <form class="navbar-form navbar-right">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="ENTER APPLICATION ID">
        </div>
        <button type="button" class="btn btn-default">SEARCH</button>
      </form>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
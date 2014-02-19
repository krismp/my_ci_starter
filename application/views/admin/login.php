<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Login</title>
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="<?php echo base_url() ?>assets/admin/styles/bootstrap.css" rel="stylesheet">

    <!-- Bootstrap theme -->
    <link href="<?php echo base_url() ?>assets/admin/styles/bootstrap-theme.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?php echo base_url() ?>assets/admin/styles/theme.css" rel="stylesheet">

    <link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/styles/login.css">

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Le favicon -->
    <link rel="shortcut icon" href="<?php echo base_url() ?>assets/admin/images/favico.png">

  </head>

  <body>

    <div class="navbar navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <a class="navbar-brand" href="index.html"><img src="<?php echo base_url() ?>assets/admin/images/analytics_logo.png" alt=""></a>
        </div>
      </div>
    </div>

    <?php //dump($this->session->userdata, TRUE) ?>

    <div class="col-sm-4 col-sm-offset-4">
        <?php echo $this->session->flashdata('message'); ?>
        <?php echo validation_errors(); ?>
    </div>

    <div class="container">
        
        <div id="login-wraper">            
            <?php echo form_open('', array('role' => 'form', 'class' => 'form login-form')); ?>
                <legend>Sign in to <span class="blue">MyApp</span></legend>
                <div class="form-group">
                    <label for="Username">Username</label>
                    <input type="text" class="form-control" name="username">
                </div>
                <div class="form-group">
                    <label for="Password">Password</label>
                    <input type="password" class="form-control" name="password">
                </div>
                <br>
                <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
            <?php echo form_close(); ?>
        </div>

    </div>

    <footer class="white navbar-fixed-bottom">
      <div class="row">
        <div class="col-lg-12">
            <center>
                <p class="muted"><?php echo $this->config->item('app_copyright') ?></p>
            </center>
        </div>
     </div>
    </footer>

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="<?php echo base_url() ?>assets/admin/scripts/jquery-1.10.2.min.js"></script>
    <script src="<?php echo base_url() ?>assets/admin/scripts/bootstrap.js"></script>
    <script src="<?php echo base_url() ?>assets/admin/scripts/backstretch.min.js"></script>
    <script src="<?php echo base_url() ?>assets/admin/scripts/login.js"></script>

  </body>
</html>
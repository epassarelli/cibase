<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo $this->session->userdata('sitio'); ?> | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/themes/adminlte/bootstrap/css/bootstrap.min.css">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url('assets/themes/adminlte/css/AdminLTE.min.css')?>">

  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo base_url('assets/themes/adminlte/plugins/iCheck/square/blue.css')?>">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <?php echo $this->session->userdata('sitio'); ?>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg"><?php echo lang('forgot_password_heading');?></p>
    <?php echo validation_errors(); ?>
    <?php echo $this->session->flashdata('message');?>

    <p><?php echo sprintf(lang('forgot_password_subheading'), $identity_label);?></p>

    <div id="infoMessage"><?php echo $message;?></div>

    <?php echo form_open("auth/forgot_password");?>

          <p>
            <label for="identity"><?php echo (($type=='email') ? sprintf(lang('forgot_password_email_label'), $identity_label) : sprintf(lang('forgot_password_identity_label'), $identity_label));?></label> <br />
            <!-- <?php //echo form_input($identity);?> -->
            <input type="text" class="form-control" name="identity" id="identity">
          </p>

          <!-- <p><?php //echo form_submit('submit', lang('forgot_password_submit_btn'));?></p> -->
          <button type="submit" name="submit" class="btn btn-primary btn-block btn-flat"><?php echo lang('forgot_password_submit_btn');?></button>

    <?php echo form_close();?>

    <p>
          <br>      
          :: <a href="<?php echo site_url('auth/login'); ?>">Ir al login</a>
          <br>
          :: <a href="<?php echo site_url(); ?>">Volver al sitio</a>
    </p>

    <!-- /.social-auth-links -->

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 2.2.3 -->
<script src="<?php echo base_url('assets/themes/adminlte/plugins/jQuery/jquery-2.2.3.min.js')?>"></script>
<!-- Bootstrap 3.3.6 -->
<script src="<?php echo base_url('assets/themes/adminlte/bootstrap/js/bootstrap.min.js')?>"></script>
<!-- iCheck -->
<script src="<?=base_url('assets/themes/adminlte/plugins/iCheck/icheck.min.js')?>"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>
</body>
</html>


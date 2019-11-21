<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Intartica Super Admin - Login</title>

  <!-- Custom fonts for this template-->
  <link href="<?php echo base_url('vendor/fontawesome-free/css/all.min.css') ?>" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template-->
  <link href="<?php echo base_url('css/sb-admin.css') ?>" rel="stylesheet">

</head>

<body style="background-image:url(<?php echo base_url('front-end/login-image/login-image.jpg')?>);background-position:center;">
 
  <div class="container">

    <div class="card card-login mx-auto mt-5">
      <a class="text-center" href="<?php echo base_url() ?>">
        <img src="<?php echo base_url('front-end/image/intarticalogo.png')?>" style="height: 46px;">
      </a>
      <div class="card-header text-center text-primary">Super Admin Login</div>
      <?php if($this->session->flashdata('error')): ?>
        <?php echo $this->session->flashdata('error'); ?>
      <?php endif; ?>
      <div class="card-body">
        <form method="post" action="<?php echo base_url('superadmin/login/validate_admin') ?>">
          <div class="form-group">
            <div class="form-label-group">
              <input type="email" id="email" name="email" class="form-control" placeholder="Email address" required="required" autofocus="autofocus">
              <label for="email">Email address</label>
            </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
              <input type="password" id="password" name="password" class="form-control" placeholder="Enter Password" required="required">
              <label for="password">Password</label>
            </div>
          </div>
          <button class="btn btn-success btn-block" type="submit">Login</button>
        </form>
        <br>
        <div class="text-center">
          <a class="btn btn-danger btn-block" href="javascript:void(0)">Forgot Password?</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="<?php echo base_url('vendor/jquery/jquery.min.js') ?>"></script>
  <script src="<?php echo base_url('vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?php echo base_url('vendor/jquery-easing/jquery.easing.min.js') ?>"></script>

</body>

</html>

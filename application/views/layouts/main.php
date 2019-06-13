<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Errands</title>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/main.css">
    <script src="<?php echo base_url(); ?>assets/js/jquery.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>

    <script src="https://kit.fontawesome.com/2f735f386b.js"></script>
</head>
<body style="background-image: url('/assets/images/background.jpg')">

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
      <a class="navbar-brand" href="<?php base_url();?>/">Errands</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <?php if (!$this->session->userdata('loggedIn')) :?>
      <ul class="nav navbar-nav">
        <li><a href="<?php base_url();?>/">Login</a></li>
        <li><a class="toggle-text" href="<?php base_url();?>/users/register">Register</a></li>
      </ul>
      <?php endif; ?>

      <?php if ($this->session->userdata('loggedIn')) :?>
      <ul class="nav navbar-nav">
        <li><a href="<?php base_url();?>/users/login">Home</a></li>
        <li><a href="<?php base_url();?>/projects">Projects</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="<?php base_url();?>/users/logout">Logout</a></li>
      </ul>
      <?php endif; ?>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

<div class="container">
    <div class="col-xs-3">
        <?php $this->load->view($sidebar); ?>
    </div>

    <div class="col-xs-9">
        <?php $this->load->view($main); ?>
    </div>
</div>

</body>
</html>
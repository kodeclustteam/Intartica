<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Intartica User Panel - Dashboard</title>

  <!-- Custom fonts for this template-->
  <link href="<?php echo base_url('vendor/fontawesome-free/css/all.min.css') ?>" rel="stylesheet" type="text/css">

  <!-- fast select multiple select plugin -->
  <link rel="stylesheet" href="<?php echo base_url('dist/fastselect.css') ?>">
  
  <!-- Page level plugin CSS-->
  <link href="<?php echo base_url('vendor/datatables/dataTables.bootstrap4.css') ?>" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="<?php echo base_url('css/sb-admin.css') ?>" rel="stylesheet">

</head>

<body id="page-top">

  <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

    <a class="navbar-brand mr-1" href="<?php echo base_url('users/dashboard'); ?>">Intartica Website</a>

    <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
      <i class="fas fa-bars"></i>
    </button>
    
    <!-- Navbar Search -->
    <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
      <div class="input-group">
        <input type="text" class="form-control" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
        <div class="input-group-append">
          <button class="btn btn-primary btn-sm" type="button">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>

    <!-- Navbar -->
    <ul class="navbar-nav ml-auto ml-md-0">
      <!-- <li class="nav-item dropdown no-arrow mx-1">
        <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-bell fa-fw"></i>
          <span class="badge badge-danger">9+</span>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="alertsDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li> -->
      <!-- <li class="nav-item dropdown no-arrow mx-1">
        <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-envelope fa-fw"></i>
          <span class="badge badge-danger">7</span>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="messagesDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li> -->
      <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-user-circle fa-fw"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
          <a class="dropdown-item" href="javascript:void(0)">
            Logged as : <i class="text-warning"><?php echo ucfirst($this->session->userdata('user_type')) ?></i>
          </a>
          <a class="dropdown-item" href="javascript:void(0)">
            Hello.. <i class="text-danger"><?php echo ucwords($this->session->userdata('fname').' '.$this->session->userdata('lname')); ?></i>
          </a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">Logout</a>
        </div>
      </li>
    </ul>

  </nav>

  <div id="wrapper">
    <!-- admin roles -->
    <?php $user_type = $this->session->userdata('user_type'); ?>
    <!-- Sidebar -->
    <ul class="sidebar navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="<?php echo base_url('users/dashboard'); ?>">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span>
        </a>
      </li>
    <?php if($user_type == 'employee'): ?>

      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('users/profile') ?>">
          <i class="fa fa-info-circle"></i>
          <span>Employee Info</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="javascript:void(0)">
          <i class="fa fa-eye"></i>
          <span>View Payslip</span>  
        </a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-fw fa-folder"></i>
          <span>Pending Actions</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
          <!-- <h6 class="dropdown-header">Website Administration:</h6> -->
          <a class="dropdown-item" href="<?php echo base_url('users/leads') ?>">Assigned Leads</a>
          <a class="dropdown-item" href="javascript:void(0)">Assigned Projects</a>
          <a class="dropdown-item" href="javascript:void(0)">Approve Leave</a>

          <!-- <div class="dropdown-divider"></div>
          <h6 class="dropdown-header">Manage Projects:</h6>
          <a class="dropdown-item" href="<?php echo base_url('admin/projects/add') ?>">Add Project</a>
          <a class="dropdown-item" href="<?php echo base_url('admin/projects') ?>">All Projects</a> -->
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-fw fa-folder"></i>
          <span>My Leave</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
          <!-- <h6 class="dropdown-header">Website Administration:</h6> -->
          <a class="dropdown-item" href="<?php echo base_url('users/leaves') ?>">Apply Leave</a>

          <!-- <div class="dropdown-divider"></div>
          <h6 class="dropdown-header">Manage Projects:</h6>
          <a class="dropdown-item" href="<?php echo base_url('admin/projects/add') ?>">Add Project</a>
          <a class="dropdown-item" href="<?php echo base_url('admin/projects') ?>">All Projects</a> -->
        </div>
      </li>
    <?php elseif($user_type == 'vendor'): ?>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('users/profile') ?>">
          <i class="fa fa-info-circle"></i>
          <span>Vendor Info</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="javascript:void(0)">
          <i class="fa fa-shopping-cart"></i>
          <span>My Orders</span>
        </a>
      </li>
    <?php elseif($user_type == 'customer'): ?>

      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('users/profile') ?>">
          <i class="fa fa-info-circle"></i>
          <span>Customer Info</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="javascript:void(0)">
          <i class="fa fa-tasks"></i>
          <span>My Projects</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="javascript:void(0)">
          <i class="fa fa-shopping-cart"></i>
          <span>Shop Products</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="javascript:void(0)">
          <i class="fa fa-shopping-cart"></i>
          <span>My Products</span>
        </a>
      </li>
    <?php endif; ?>
      <!-- <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('admin/settings') ?>">
          <i class="fas fa-cog"></i>
          <span>Manage Settings</span></a>
      </li>
      -->
    </ul>

    <div id="content-wrapper">

      <div class="container-fluid">
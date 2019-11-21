<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Intartica Admin Panel - Dashboard</title>

  <!-- Custom fonts for this template-->
  <link href="<?php echo base_url('vendor/fontawesome-free/css/all.min.css') ?>" rel="stylesheet" type="text/css">

  <!-- fast select multiple select plugin -->
  <link rel="stylesheet" href="<?php echo base_url('dist/fastselect.css') ?>">
  
  <!-- Page level plugin CSS-->
  <link href="<?php echo base_url('vendor/datatables/dataTables.bootstrap4.css') ?>" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="<?php echo base_url('css/sb-admin.css') ?>" rel="stylesheet">

  <!-- bootstrap multiselect CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.15/css/bootstrap-multiselect.css" type="text/css">

</head>

<body id="page-top">

  <nav class="navbar navbar-expand navbar-dark bg-dark static-top">
    <?php if($this->session->has_userdata('id')): ?>
    <a class="navbar-brand mr-1" href="<?php echo base_url('admin/dashboard'); ?>">Intartica Website</a>
    <?php endif; ?>
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
      <?php if($this->session->has_userdata('id')): ?>
      <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-user-circle fa-fw"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
          <a class="dropdown-item" href="javascript:void(0)">Hello.. <i class="text-danger"><?php echo ucwords($this->session->userdata('fname').' '.$this->session->userdata('lname')); ?></i></a>
          <a class="dropdown-item" href="<?php echo base_url('admin/dashboard/profile') ?>">Edit Profile</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">Logout</a>
        </div>
      </li>
      <?php endif; ?>
    </ul>

  </nav>

  <div id="wrapper">
    <!-- admin roles -->
    <?php $roles_array = explode(',', $this->session->userdata('roles')); ?>
    <!-- Sidebar -->
    <ul class="sidebar navbar-nav">
      <?php if($this->session->has_userdata('id')): ?>
      <li class="nav-item active">
        <a class="nav-link" href="<?php echo base_url('admin/dashboard'); ?>">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span>
        </a>
      </li>
      <?php endif; ?>
    <?php if(in_array('crm', $roles_array)): ?>

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-fw fa-folder"></i>
          <span>Customer Manager</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
          <h6 class="dropdown-header">Customer Management:</h6>
          <a class="dropdown-item" href="<?php echo base_url('admin/customers') ?>">Manage Customers</a>
          <a class="dropdown-item" href="javascript:void(0)">Create Lead Sources</a>
          <a class="dropdown-item" href="<?php echo base_url('admin/leads') ?>">Manage New Leads</a>
          <a class="dropdown-item" href="<?php echo base_url('admin/subscribers') ?>">Manage Subscribers</a>
          <a class="dropdown-item" href="<?php echo base_url('admin/inquiry') ?>">Manage Inquiries</a>
          <div class="dropdown-divider"></div>
          <h6 class="dropdown-header">CRM Reports:</h6>
          <a class="dropdown-item" href="javascript:void(0)">Report 1</a>
          <a class="dropdown-item" href="javascript:void(0)">Report 2</a>
          <a class="dropdown-item" href="javascript:void(0)">Report 3</a>
        </div>
      </li>
    <?php endif; ?>
    
    <?php if(in_array('invm', $roles_array)): ?>

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-fw fa-folder"></i>
          <span>Purchase Manager</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
          <h6 class="dropdown-header">Vendor Management:</h6>
          <a class="dropdown-item" href="<?php echo base_url('admin/vendors') ?>">Manage Vendors</a>
          <a class="dropdown-item" href="<?php echo base_url('admin/categories') ?>">Manage Category</a>
          <a class="dropdown-item" href="javascript:void(0)">Manage Items</a>
          <div class="dropdown-divider"></div>
          <h6 class="dropdown-header">Inventory Reports:</h6>
          <a class="dropdown-item" href="javascript:void(0)">Report 1</a>
          <a class="dropdown-item" href="javascript:void(0)">Report 2</a>
          <a class="dropdown-item" href="javascript:void(0)">Report 3</a>
        </div>
      </li>
    <?php endif; ?>

    <?php if(in_array('hrms', $roles_array)): ?>

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-fw fa-folder"></i>
          <span>HRMS</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
          <h6 class="dropdown-header">Leave Management:</h6>
          <a class="dropdown-item" href="<?php echo base_url('admin/leaves') ?>">Manage Leave Type</a>
          <a class="dropdown-item" href="javascript:void(0)">Manage Leave Policy</a>
          <div class="dropdown-divider"></div>
          <h6 class="dropdown-header">Payroll Management:</h6>
          <a class="dropdown-item" href="javascript:void(0)">Manage Payroll Structure</a>
          <a class="dropdown-item" href="javascript:void(0)">Generate Payslip</a>
          <div class="dropdown-divider"></div>
          <h6 class="dropdown-header">Employee Management:</h6>
          <a class="dropdown-item" href="<?php echo base_url('admin/employees') ?>">Manage Employees</a>
          <a class="dropdown-item" href="<?php echo base_url('admin/holidays') ?>">Manage Holiday List</a>
          <div class="dropdown-divider"></div>
          <h6 class="dropdown-header">HRMS Reports:</h6>
          <a class="dropdown-item" href="javascript:void(0)">Report 1</a>
          <a class="dropdown-item" href="javascript:void(0)">Report 2</a>
          <a class="dropdown-item" href="javascript:void(0)">Report 3</a>
          <h6 class="dropdown-header">HRMS - Approvals:</h6>
          <a class="dropdown-item" href="javascript:void(0)">Leave Approvals</a>
        </div>
      </li>

    <?php endif; ?>

    <?php if(in_array('finm', $roles_array)): ?>

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-fw fa-folder"></i>
          <span>Finance Manager</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
          <h6 class="dropdown-header">Finance Management:</h6>
          <a class="dropdown-item" href="javascript:void(0)">Manage Tax Setup</a>
          <a class="dropdown-item" href="javascript:void(0)">Manage Accounts</a>
          <a class="dropdown-item" href="<?php echo base_url('admin/calender') ?>">Configure Calender Year</a>
          <div class="dropdown-divider"></div>
          <h6 class="dropdown-header">Finance Reports:</h6>
          <a class="dropdown-item" href="javascript:void(0)">Report 1</a>
          <a class="dropdown-item" href="javascript:void(0)">Report 2</a>
          <a class="dropdown-item" href="javascript:void(0)">Report 3</a>
        </div>
      </li>
    <?php endif; ?>

    <?php if(in_array('prjm', $roles_array)): ?>

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-fw fa-folder"></i>
          <span>Project Manager</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
          <h6 class="dropdown-header">Project Management:</h6>
          <a class="dropdown-item" href="javascript:void(0)">Manage Projects</a>
          <a class="dropdown-item" href="javascript:void(0)">Pending Project Creation</a>
          <div class="dropdown-divider"></div>
          <h6 class="dropdown-header">Project Reports:</h6>
          <a class="dropdown-item" href="javascript:void(0)">Report 1</a>
          <a class="dropdown-item" href="javascript:void(0)">Report 2</a>
          <a class="dropdown-item" href="javascript:void(0)">Report 3</a>
        </div>
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
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Dashboard | Solar Panel</title>
	<link rel="shortcut icon" href="assets/images/new-logo.png">
    <link href="assets/libs/alertify.js/css/alertify.css" rel="stylesheet" type="text/css">
    <!-- DataTables -->
    <link href="assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet"
        type="text/css" />

    <!-- Responsive datatable examples -->
    <link href="assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet"
        type="text/css" />
    <link href="assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<style>
		nav.navbar.navbar-expand-lg.bg-body-tertiary {
		    background-color: #141414;
		}
		nav.navbar a{
			color:#fff;
		}
		span.badge.badge-danger{
			background: #f11b1b;
		    border-color: #f11b1b;
		    font-size: 14px;
		}
		span.badge.badge-success {
		    background: #00b100;
		    border: #00b100;
		    font-size: 14px;
		}
		a.nav-link:hover{
			color: #0d6efd;
		}
		.navbar-nav .nav-link.active, .navbar-nav .show>.nav-link{
			color: #0d6efd;
		}
		span.badge.badge-primary{
			background: #1ba2f1;
		    padding: 6px 18px;
		    font-size: 14px;
		}
		span.badge.badge-warning {
		    background: #db1d1d;
		    padding: 6px 18px;
		    font-size: 14px;
		}
		ul#side-menu li a{
			font-size: 18px;
		}
		.rounded-circle.header-profile-user{
		    font-size: 28px;
		    font-weight: 700;
		    color: #093ed3;
		}
		pl-2{
			padding-left:2px ;
		}
	</style>
</head>
<body data-sidebar="dark">
	<div id="preloader">
	    <div id="status">
	        <div class="spinner"></div>
	    </div>
	</div>

	<div id="layout-wrapper">
	    <header id="page-topbar">
	        <div class="navbar-header">
	            <div class="d-flex">
	                <div class="navbar-brand-box text-center">
	                    <a href="index.html" class="logo logo-light">
	                        <span class="logo-sm">
	                            <img src="assets/images/new-logo.png.webp" class="img-thumbnail" alt="" width="150" style="background: #fff;padding: 14px;">
	                        </span>
	                        <span class="logo-lg">
	                            <img src="assets/images/new-logo.png.webp" alt="" width="150" style="background: #fff;padding: 14px;">
	                        </span>
	                    </a>
	                </div>

	                <button type="button" class="btn btn-sm px-3 font-size-24 header-item waves-effect" id="vertical-menu-btn">
	                    <i class="mdi mdi-menu"></i>
	                </button>
	            </div>

	            <div class="d-flex">
	                <div class="dropdown d-inline-block ms-2">
	                    <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	                        <div class="rounded-circle header-profile-user">
	                        	<?php 
	                        		if(isset($_SESSION['user_name'])): 
	                        			echo ucfirst(mb_substr($_SESSION['user_name'], 0, 1));
	                        		else:
	                        			echo "A";
	                        		endif;
	                        	?>
	                        </div>
	                    </button>
	                    <div class="dropdown-menu dropdown-menu-end">
	                        <div class="dropdown-divider"></div>
	                        <a class="dropdown-item" href="logout.php">
	                        	<i class="dripicons-exit font-size-16 align-middle me-2"></i>
	                            Logout
	                        </a>
	                    </div>
	                </div>
	            </div>
	        </div>
	    </header>

	    <!-- Left Sidebar Start -->
	    <?php include 'sidebar.php'; ?>
	    <!-- Left Sidebar End -->

	    <div class="main-content">
	    	<div class="page-content">
	        	<div class="container-fluid">

				
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Bootstrap Admin Theme</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url('asset/css/bootstrap_admin.min.css'); ?>" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="<?php echo base_url('asset/css/metisMenu.min.css'); ?>" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo base_url('asset/css/sb-admin-2.min.css'); ?>" rel="stylesheet">

    <!-- DataTables CSS -->
    <link href="<?php echo base_url('asset/css/dataTables.bootstrap.css'); ?>" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="<?php echo base_url('asset/css/dataTables.responsive.css'); ?>" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?php echo base_url('asset/css/font-awesome.min.css'); ?>" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

<div id="wrapper">

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?php echo base_url('admin')?>">Nascenia Project Admin Panel</a>
        </div>
        <!-- /.navbar-header -->

        <ul class="nav navbar-top-links navbar-right">
            <li>
                <a href="<?php echo base_url('/')?>"><i class="fa fa-home"></i> Nascenia Project</a>
            </li>
            <li>
                <a href="<?php echo base_url('login/logout')?>">Logout</a>
            </li>
        </ul>
        <!-- /.navbar-top-links -->

        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse">
                <ul class="nav" id="side-menu">
                    <li>
                        <a href="#"><i class="fa fa-wrench fa-fw"></i> Products<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="<?php echo base_url('admin/dashboard/product_list')?>">Product List</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url('admin/dashboard/create_product')?>">Create Product</a>
                            </li>
                        </ul>
                        <!-- /.nav-second-level -->
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-wrench fa-fw"></i> Categories<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="<?php echo base_url('admin/dashboard/category_list')?>">Category List</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url('admin/dashboard/create_category')?>">Create Category</a>
                            </li>
                        </ul>
                        <!-- /.nav-second-level -->
                    </li>
                    <li>
                        <a href="<?php echo base_url('admin/dashboard/reviews')?>"><i class="fa fa-table fa-fw"></i> Reviews & Ratings </a>
                    </li>

                </ul>
            </div>
            <!-- /.sidebar-collapse -->
        </div>
        <!-- /.navbar-static-side -->
    </nav>

    <div id="page-wrapper">
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>NasceniaProject - Shop Homepage</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="<?php echo base_url('asset/css/bootstrap.min.css'); ?>">

    <!-- Custom styles for this template -->
    <link href="<?php echo base_url('asset/css/shop-homepage.css'); ?>" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?php echo base_url('asset/css/font-awesome.min.css'); ?>" rel="stylesheet" type="text/css">

    <!-- Captcha -->
    <link type="text/css" rel="Stylesheet" href="<?php echo CaptchaUrls::LayoutStylesheetUrl() ?>" />

</head>

<body>

<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="<?php echo base_url('/'); ?>">Nascenia Project</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home
                        <span class="sr-only">(current)</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url('admin')?>">Admin</a>
                </li>
                <?php if(checkLoginStatus() == false): ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url('login')?>">Login</a>
                </li>
                <?php endif; ?>
                <?php if(checkLoginStatus() == true): ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url('login/logout')?>">Logout</a>
                </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>

<!-- Page Content -->
<div class="container">
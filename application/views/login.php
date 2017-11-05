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

<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="login-panel panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Please Sign In</h3>
                </div>
                <div class="panel-body">
                    <?php $error = $this->session->flashdata("error"); ?>
                    <div class="alert alert-<?php echo $error ? 'warning' : 'hide' ?> alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                        <?php echo $error ? $error : 'Enter your username and password' ?>
                    </div>
                    <?php echo form_open('login/login_process'); ?>
                    <fieldset>
                        <div class="form-group">
                            <input class="form-control" placeholder="Username" name="username" type="text" autofocus>
                        </div>
                        <div class="form-group">
                            <input class="form-control" placeholder="Password" name="password" type="password" value="">
                        </div>
                        <input type="hidden" name="honey_pot" value=""/>
                        <input type="submit" name="loginSubmit" value="Login" class="btn btn-lg btn-success btn-block"/>
                    </fieldset>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- jQuery -->
<script>window.jQuery || document.write('<script src="<?php echo base_url('asset/js/jquery.min.js'); ?>"><\/script>')</script>

<!-- Bootstrap Core JavaScript -->
<script src="<?php echo base_url('asset/js/bootstrap.bundle.min.js'); ?>"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="<?php echo base_url('asset/js/metisMenu.min.js'); ?>"></script>

<!-- Custom Theme JavaScript -->
<script src="<?php echo base_url('asset/js/sb-admin-2.js'); ?>"></script>

</body>

</html>

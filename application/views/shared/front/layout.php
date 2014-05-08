<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta charset="utf-8">
        <title>Sukhigal</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <link href="<?php echo base_url(); ?>assets/css/app.css" rel="stylesheet" type="text/css" />
    </head>
    <body class="innerbody">
        <div class="navbar navbar-inverse navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container-fluid">
                    <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="brand" href="<?php echo base_url(); ?>">Sukhigal</a>
                    <div class="nav-collapse collapse">
                        <?php $this->load->view('shared/front/notification_menu.php'); ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid"  id="masterPage">
            <div class="row-fluid">
                <div class="span2">
                    <div class=" sidebar-nav" id="profilePic"></div>
                </div>
                <div class="span7">
                    <div class="well-large"> 
                        <div class="row" id="buttonArea">

                        </div>
                        <?php echo $content; ?>
                    </div>
                </div>
                <div class="span3">
                    <?php $this->load->view('shared/front/right_menu.php'); ?>
                </div>
            </div>
<!--            <hr />-->
        </div>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-1.10.2.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.form.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.elastic.source.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/alertify.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.mCustomScrollbar.concat.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/underscore-min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/backbone-min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/app.js"></script>
    </body>
</html>
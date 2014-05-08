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

        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-1.10.2.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.elastic.source.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/alertify.min.js"></script>
    </head>
    <body>
        <div class="navbar-wrapper">
            <div class="container">
                <div class="navbar navbar-inverse navbar-fixed-top">
                    <div class="navbar-inner">

                        <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="brand" href="<?php echo base_url(); ?>">Sukhigal</a>
                        <div class="nav-collapse collapse">
                            <ul class="nav pull-right">
                                <li><a class="homeButton" href="#/">Welcome <?php echo $this->session->userdata('username'); ?></a></li>
                                <li>
                                    <a href="#/"><p class = "icon-home icon-white"></p></a>
                                </li>
                                <li class="dropdown">
                                    <a href="#" id="icn-wrench" class="dropdown-toggle" data-toggle="dropdown"><p class = "icon-wrench icon-white"></p></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="<?php echo base_url() . 'main/pingeneration/logout'; ?>"><i class="i"></i> Log Out</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid" style="padding-top: 70px; min-height: 423px;">

            <div class="row-fluid" id="homeImg">
                <div class="span1"></div>
                <div class="span10">
                    <?php echo $content; ?>
                </div>
                <div class="span1"></div>
            </div>
        </div>
        <section class="footer-wrapper">
            <div class="center">
                <div class="footer">
                    <ul>
                        <li>Terms</li>
                        <li><a href="/terms">Terms of Use</a></li>
                        <li><a href="/privacy-policy">Privacy Policy</a></li>
                    </ul>
                    <ul>
                        <li>About Us</li>
                        <li><a href="#/about-us">About Sukhigal</a></li>

                    </ul>

                    <ul>
                        <li>Support</li>
                        <li><a href="#/faq">FAQ</a></li>
                        <li><a href="#/contact">Contact Support</a></li>
                    </ul>
                    <ul class="ul-contact">
                        <li>
                            Office
                        </li>
                        <li>
                            Tistar Gate<br />
                            Tongi, Bangladesh<br /><br />
                            <!--                            E-mail :  <a href="mailto:info@loosemonkies.com">info@loosemonkies.com</a><br />-->
                            Phone : +8801921053375
                        </li>
                    </ul>
                </div>
            </div>

            <div class="clr"></div>

            <div class="copyright-wrapper">
                <div class="center">
                    <div class="fl">
                        Copyright &copy; 2013 Sukhigal
                    </div>

                    <div class="fr">
                        <a class="brand" href="#/">Sukhigal</a>
                    </div>
                </div>

                <div class="clr"></div>
            </div>

            <div class="clr"></div>
        </section>
    </body>
</html>
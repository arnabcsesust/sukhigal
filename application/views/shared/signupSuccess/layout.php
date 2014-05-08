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
                            <form id="homePageLogin" action="<?php echo base_url() . 'main/home/login' ?>" method="post" class="navbar-form pull-right">
                                <input class="span2" type="text" placeholder="Mob No / Email / Pin" name="pin" />
                                <input class="span2" type="password" placeholder="Password" name="password" />
                                <button type="submit" class="btn">Sign in</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid" style="padding-top: 70px; min-height: 423px;">

            <div class="row-fluid" id="homeImg">
                <?php
                if (isset($signupSuccess)) {
                    ?>
                    <div class="span2"></div>
                    <div class="span8">
                        <?php echo $content; ?>
                    </div>
                    <div class="span2"></div>
                    <?php
                } else {
                    ?>
                    <div class="span7">

                    </div>
                    <div class="span4">
                        <?php echo $content; ?>
                    </div>
                    <div class="span1"></div>
                    <?php
                }
                ?>

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
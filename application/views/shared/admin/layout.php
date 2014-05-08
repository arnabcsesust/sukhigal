<!DOCTYPE html>
<html lang="en-US">
    <head>
        <meta charset="utf-8">
        <title>:: Sukhigal Admin <?php if (isset($title)) {
    echo '-- ' . $title;
} ?> ::</title>
        <?php foreach ($css_files as $file): ?>
            <link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
        <?php endforeach; ?>
        <?php foreach ($js_files as $file): ?>
            <script src="<?php echo $file; ?>"></script>
<?php endforeach; ?>
        <link href="<?php echo base_url(); ?>assets/css/global.css" rel="stylesheet" type="text/css" />
    </head>
    <body>
                <?php $this->load->view('shared/admin/admin_top_menu.php'); ?>
        <div class="container-fluid">
            <div class="row-fluid">
                    <?php $this->load->view('shared/admin/admin_side_menu.php'); ?>
                <div class="span10">

<?php echo $content; ?>

                </div>
            </div>
        </div>
    </div>  
    <?php if (!isset($header)) {
        ?>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-2.0.3.min.js"></script>
        <?php
    }
    ?>
    <!--<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-2.0.3.min.js"></script>-->
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
</body>
</html>
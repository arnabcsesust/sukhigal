<script type ="text/template" id="permission">
    <form id="permissionForm" action="javascript:void(0);" method="POST">
        <div class="row">
            <div class="span12"><h4>Profile View Prmission</h4><hr /></div>
        </div>
        <div class="row">
            <!--<div class="span6">
                <input type="text" placeholder="How many amount do you need ?" class="input-block-level" name='amount' id='amount' />
            </div>-->
            <div class='span10'>
                <input type="submit" class="btn btn-block btn-large btn-success" value="Apply For 10 Permissions" />
            </div>
            <div class='span2' id="ajax-loader">
                <img src="<?php echo base_url() . 'assets/img/ajax-loader.gif'; ?>" />
            </div>
        </div>
        <div class="row">
            <div class="span12" id="permissionMessage"></div>
        </div>
    </form>
</script>

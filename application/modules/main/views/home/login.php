<form action="<?php echo base_url() . 'main/home/login' ?>" method="post" class="form-horizontal pull-right loginForm">
    <h3>Login</h3>
    <hr />
    <div class="control-group">
        <label class="control-label" for="pin">Pin</label>
        <div class="controls">
            <input type="text" name='pin' id="pin" placeholder="Pin" />
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="password">Password</label>
        <div class="controls">
            <input type="password" name='password' id="password" placeholder="Password" />
        </div>
    </div>
    <div class="control-group">
        <div class="controls">
            <button type="submit" class="btn">Sign in</button>
        </div>
    </div>
    <?php
    if (isset($error_message)) {
        ?>
        <div class="alert alert-error">
            <?php echo $error_message; ?>
        </div>
        <?php
    }
    ?>
    <p class="pull-right">Not Yet Registered. Please <a class="btn btn-success" href="<?php echo base_url(); ?>">Sign Up</a></p>
</form>

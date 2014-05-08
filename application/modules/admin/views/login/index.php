<?php 
    $attributes = array('class' => 'form-signin');
    echo form_open('admin/login/validate_credentials', $attributes);
    echo '<h3 class="form-signin-heading">Sukhigal Admin Login</h3><hr />';
    echo form_input('user_name', set_value('user_name'), 'placeholder="Username"');
    echo form_password('password', '', 'placeholder="Password"');
    if(isset($message_error) && $message_error){
        echo '<div class="alert alert-error">';
        echo '<a class="close" data-dismiss="alert">x</a>';
        echo '<strong>Oh snap!</strong> Your username and password is incorrect.';
        echo '</div>';             
    }
    echo validation_errors();
    echo "<br />";
    echo form_submit('submit', 'Login', 'class="btn btn-success"');
    echo form_close();
?>    
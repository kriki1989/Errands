<h2>Login Form</h2>

<?php
$attributes = array(
    'id' => 'login_form',
    'class' => 'form_horizontal'
);
if ($this->session->flashdata('error')) :
?>
<div style="color:red">
    <i><?php echo $this->session->flashdata('error'); ?></i>
</div>
<?php
endif;
echo form_open('users/login', $attributes);
?>

    <div class="form-group">
        <?php
        echo form_label('Username');
        $data = array(
            'class' => 'form-control',
            'name' => 'username',
            'placeholder' => 'Enter username'
        );
        echo form_input($data);
        ?>
    </div>

    <div class="form-group">
        <?php
        echo form_label('Password');
        $data = array(
            'class' => 'form-control',
            'name' => 'password',
            'placeholder' => 'Enter password'
        );
        echo form_password($data);
        ?>
    </div>

    <div class="form-group">
        <?php
        echo form_label('Confirm Password');
        $data = array(
            'class' => 'form-control',
            'name' => 'confirmPassword',
            'placeholder' => 'Confirm password'
        );
        echo form_password($data);
        ?>
    </div>

    <div class="form-group">
        <?php
        $data = array(
            'class' => 'btn btn-primary',
            'name' => 'submit',
            'value' => 'Login'
        );
        echo form_submit($data);
        ?>
    </div>

<?php
echo form_close();
?>
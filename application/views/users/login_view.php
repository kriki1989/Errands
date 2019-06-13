<?php if (!$this->session->userdata('loggedIn')) :?>

<h2>Login Form</h2>

<?php
$attributes = array(
    'id' => 'login_form',
    'class' => 'form_horizontal'
);

echo form_open('users/submitLogin', $attributes);
?>

    <div class="form-group">
        <?php
        echo form_label('Username');
        $data = array(
            'class' => 'form-control',
            'name' => 'username',
            'placeholder' => 'Enter username',
            'value' => $this->session->flashdata('username_value')
        );
        echo form_input($data);
        ?>
    </div>
    <div class="error">
        <i><?php echo $this->session->flashdata('username'); ?></i>
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
    <div class="error">
        <i><?php echo $this->session->flashdata('password'); ?></i>
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
    <div class="error">
        <i><?php echo $this->session->flashdata('confirmPassword'); ?></i>
    </div>

    <div class="form-group mb-5">
        <?php
        $data = array(
            'class' => 'btn btn-primary',
            'name' => 'submitLogin',
            'value' => 'Login'
        );
        echo form_submit($data);
        ?>
    </div>

<?php
echo form_close();
$attributes = array(
    'id' => 'to_register',
    'class' => 'form_horizontal'
);
echo form_open('users/register', $attributes);
?>
    <div class="form-group">
        <?php
        $data = array(
            'class' => 'btn btn-success',
            'name' => 'register',
            'value' => 'Register'
        );
        echo form_submit($data);
        ?>
    </div>
<?php
echo form_close();

else:

?>
    <h2>Hello <?php echo ucwords($this->session->userdata('username')); ?></h2>

    <p>
<?php
    $attributes = array(
        'id' => 'logout_form',
        'class' => 'form_horizontal'
    );
    echo form_open('users/logout', $attributes);

?>
    </p>

    <div class="form-group">
    <?php
    $data = array(
        'class' => 'btn btn-primary',
        'name' => 'logout',
        'value' => 'Logout'
    );
    echo form_submit($data);
    ?>
    </div>

<?php
    echo form_close();
endif;
?>
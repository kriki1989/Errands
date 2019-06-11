<?php if (!$this->session->userdata('loggedIn')) :?>

<h2>Register Form</h2>

<?php
$attributes = array(
    'id' => 'register_form',
    'class' => 'form_horizontal'
);
if ($this->session->flashdata('error')) :
?>
<div style="color:red">
    <i><?php echo $this->session->flashdata('error'); ?></i>
</div>
<?php
endif;

echo form_open('users/submitRegister', $attributes);
?>

    <div class="form-group">
        <?php
        echo form_label('First Name');
        $data = array(
            'class' => 'form-control',
            'name' => 'fname',
            'placeholder' => 'Enter First Name'
        );
        echo form_input($data);
        ?>
    </div>

    <div class="form-group">
        <?php
        echo form_label('Last Name');
        $data = array(
            'class' => 'form-control',
            'name' => 'lname',
            'placeholder' => 'Enter Last name'
        );
        echo form_input($data);
        ?>
    </div>

    <div class="form-group">
        <?php
        echo form_label('Email');
        $data = array(
            'class' => 'form-control',
            'name' => 'email',
            'placeholder' => 'Enter Email address'
        );
        echo form_input($data);
        ?>
    </div>

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
            'name' => 'submitRegister',
            'value' => 'Register'
        );
        echo form_submit($data);
        ?>
    </div>

<?php
echo form_close();
$attributes = array(
    'id' => 'to_login',
    'class' => 'form_horizontal'
);
echo form_open('users/login', $attributes);
?>
    <div class="form-group">
        <?php
        $data = array(
            'class' => 'btn btn-success',
            'name' => 'login',
            'value' => 'Login'
        );
        echo form_submit($data);
        ?>
    </div>
<?php
echo form_close();

else:

    redirect('users/login');

endif;
?>
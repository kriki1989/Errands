<h1>Welcome to Errands Application</h1>
<?php
    if ($this->session->flashdata('loginFail')) :
?>

<p class="bg-danger p-1">
    <?php echo $this->session->flashdata('loginFail'); ?>
</p>

<?php
    endif;
?>

<p>
    This application was created by Maria Karyda.
</p>
<h1>Hello this is a view</h1>

<?php
    if ($this->session->flashdata('loginSuccess')) :
?>

<p class="bg-success p-1">
    <?php echo $this->session->flashdata('message'); ?>
</p>

<?php
    endif;
    if ($this->session->flashdata('loginFail')) :
?>

<p class="bg-danger p-1">
    <?php echo $this->session->flashdata('message'); ?>
</p>

<?php
    endif;
?>
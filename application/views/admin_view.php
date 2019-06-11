<h1>Admin Home Page</h1>

<?php
    if ($this->session->flashdata('loginSuccess')) :
?>

<p class="bg-success p-1">
    <?php echo $this->session->flashdata('loginSuccess'); ?>
</p>

<?php
    endif;
?>
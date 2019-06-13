<div class="jumbotron text-center" style="background-color:#0066cc;  color:white">
    <h2>Welcome to Errands Application</h2>
</div>

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
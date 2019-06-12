<div class="jumbotron text-center">
    <h2>Welcome to Errands Application</h2>
</div>


<?php
    if ($this->session->flashdata('loginSuccess')) :
?>

<p class="bg-success p-1">
    <?php echo $this->session->flashdata('loginSuccess'); ?>
</p>

<?php
    endif;
?>

<p>From here you can navigate through your projects and tasks and modify them the way you like it. Feel free to enjoy!</p>
<br>

<h1>Projects</h1>
<table class="table table-hover">
    <thead>
        <tr>
            <th>
                Project Name
            </th>

            <th>
                Project Body
            </th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($projects as $project): ?>
        <tr>
            <td>
                <?php echo $project->name; ?>
            </td>
            <td>
                <?php echo $project->body; ?>
            </td>
            <td>
                <a href="<?php echo base_url();?>projects/display/<?php echo $project->id; ?>">
                    View
                </a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
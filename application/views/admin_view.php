<div class="jumbotron text-center" style="background-color:#0066cc;  color:white">
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

<?php if ($projects !== array()) { ?>

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

<?php } ?>

<?php if ($tasks !== array()) { ?>

<h1>Tasks</h1>
<table class="table table-hover">
    <thead>
        <tr>
            <th>
                Project Category
            </th>
            <th>
                Task Name
            </th>

            <th>
                Task Body
            </th>
            <th>
                Status
            </th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($tasks as $task): ?>
        <?php if ($task->status == '0') : ?>
            <tr style="background-color:#f2cbcb">
        <?php else : ?>
            <tr style="background-color:#deedbd">
        <?php endif; ?>
            <td>
                <?php echo $task->category; ?>
            </td>
            <td>
                <?php echo $task->name; ?>
            </td>
            <td>
                <?php echo $task->body; ?>
            </td>
            <td align="center">
                <?php
                if ($task->status == '0') :
                    echo '<i class="fas fa-times"></i>';
                else:
                    echo '<i class="fas fa-check"></i>';
                endif;
                ?>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php } ?>
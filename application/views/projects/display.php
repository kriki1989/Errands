<div class="col-xs-9">
    <h1>Project Name: <?php echo $project->name; ?></h1>
    <p>Date created: <?php echo nice_date($project->created_at, 'd-m-Y'); ?></p>
    <h3>Description</h3>
    <p><?php echo $project->body; ?></p>
    <br>


    <?php
        if ($this->session->flashdata('taskSuccess')) :
    ?>

    <p class="bg-success p-1">
        <?php echo $this->session->flashdata('taskSuccess'); ?>
    </p>

    <?php
        endif;
    ?>

    <?php
        if ($this->session->flashdata('taskFail')) :
    ?>

    <p class="bg-danger p-1">
        <?php echo $this->session->flashdata('taskFail'); ?>
    </p>

    <?php
        endif;
    ?>

    <?php if ($tasks !== array()) { ?>
    <h1>Task Display Mode</h1>

    <table class="table table-hover">
        <thead>
            <tr>
                <th>
                    Task Name
                </th>

                <th>
                    Task Body
                </th>
                <th>Date</th>
                <th>Due Date</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($tasks as $task): ?>
            <tr>
                <td>
                    <?php echo $task->name; ?><br>
                    <a class="task_edit" href="<?php echo base_url(); ?>tasks/edit/<?php echo $task->id; ?>/<?php echo $project->id; ?>">
                        Edit
                    </a>
                    |
                    <a class="task_delete" href="<?php echo base_url(); ?>tasks/delete/<?php echo $task->id; ?>/<?php echo $project->id; ?>">
                        Delete
                    </a>
                </td>
                <td width="40%">
                    <?php echo $task->body; ?>
                </td>
                <td>
                    <?php echo nice_date($task->created_at, 'd-m-Y H:m:s'); ?>
                </td>
                <td>
                    <?php echo nice_date($task->due_date, 'd-m-Y'); ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?php } ?>
</div>

<div class="col-xs-3 pull-right">
    <ul class="list-group">

        <h4>Project Actions</h4>

        <li class="list-group-item">
            <a href="<?php echo base_url(); ?>projects/edit/<?php echo $project->id ?>">
                Edit Project
            </a>
        </li>
        <li class="list-group-item">
            <a href="<?php echo base_url(); ?>projects/delete/<?php echo $project->id ?>">
                Delete Project
            </a>
        </li>

        <br>

        <h4>Task Action</h4>

        <li class="list-group-item">
            <a href="<?php echo base_url(); ?>tasks/create/<?php echo $project->id ?>">
                Create Task
            </a>
        </li>

    </ul>
</div>

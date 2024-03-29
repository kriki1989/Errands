<div class="row">
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
    </div>

    <div class="col-xs-3 pull-right">
        <ul class="list-group">

            <h4>Project Actions</h4>

            <a href="<?php echo base_url(); ?>projects/edit/<?php echo $project->id ?>" class="list-group-item list-group-item-warning">
                Edit Project
            </a>

            <a href="<?php echo base_url(); ?>projects/delete/<?php echo $project->id ?>" class="list-group-item list-group-item-danger">
                    Delete Project
            </a>

            <br>

            <h4>Task Action</h4>

            <a href="<?php echo base_url(); ?>tasks/create/<?php echo $project->id ?>" class="list-group-item list-group-item-success">
                Create Task
            </a>

        </ul>
    </div>

</div>

<div class="row">
    <div class="col-xs-12">

        <h1>Tasks</h1>
        <div class="panel panel-primary">
            <div class="panel-heading"><strong><h4>Active tasks</h4></strong></div>
            <?php if ($activeTasks !== array()) { ?>
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
                    <?php foreach($activeTasks as $task): ?>
                    <tr>
                        <td>
                            <?php echo $task->name; ?><br>
                            <a class="task_status" href="<?php echo base_url(); ?>tasks/status/<?php echo $task->id; ?>/<?php echo $project->id; ?>/<?php echo $task->status; ?>">
                                <i class="fas fa-check"></i>
                            </a>
                            |
                            <a class="task_edit" href="<?php echo base_url(); ?>tasks/edit/<?php echo $task->id; ?>/<?php echo $project->id; ?>">
                                <i class="fas fa-pen"></i>
                            </a>
                            |
                            <a class="task_delete" href="<?php echo base_url(); ?>tasks/delete/<?php echo $task->id; ?>/<?php echo $project->id; ?>">
                                <i class="fas fa-trash-alt"></i>
                            </a>
                        </td>
                        <td>
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
            <?php } else { ?>
                <table class="table">
                    <tr>
                        <td>
                            No active tasks
                        </td>
                    </tr>
                </table>
            <?php } ?>
        </div>

        <div class="panel panel-success">
            <div class="panel-heading"><strong><h4>Completed tasks</h4></strong></div>

                <?php if ($completedTasks !== array()) { ?>
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
                        <?php foreach($completedTasks as $task): ?>
                        <tr>
                            <td>
                                <?php echo $task->name; ?><br>
                                <a class="task_status" href="<?php echo base_url(); ?>tasks/status/<?php echo $task->id; ?>/<?php echo $project->id; ?>/<?php echo $task->status; ?>">
                                    <i class="fas fa-times"></i>
                                </a>
                                |
                                <a class="task_edit" href="<?php echo base_url(); ?>tasks/edit/<?php echo $task->id; ?>/<?php echo $project->id; ?>">
                                    <i class="fas fa-pen"></i>
                                </a>
                                |
                                <a class="task_delete" href="<?php echo base_url(); ?>tasks/delete/<?php echo $task->id; ?>/<?php echo $project->id; ?>">
                                    <i class="fas fa-trash-alt"></i>
                                </a>
                            </td>
                            <td>
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
                <?php } else { ?>
                <table class="table">
                    <tr>
                        <td>
                            No completed tasks
                        </td>
                    </tr>
                </table>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
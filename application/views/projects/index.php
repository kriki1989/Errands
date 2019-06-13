<a class="btn btn-primary pull-right" href="<?php echo base_url();?>projects/create">Create Project</a>
<br><br><br>
<div class="panel panel-primary">
    <div class="panel-heading"><strong><h4>Projects</h4></strong></div>
    <?php
        if ($this->session->flashdata('projectSuccess')) :
    ?>

    <p class="bg-success p-1">
        <?php echo $this->session->flashdata('projectSuccess'); ?>
    </p>

    <?php
        endif;
    ?>

    <?php
        if ($this->session->flashdata('projectFail')) :
    ?>

    <p class="bg-danger p-1">
        <?php echo $this->session->flashdata('projectFail'); ?>
    </p>

    <?php
        endif;
    ?>

    <?php if ($projects !== array()) { ?>
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
                    <a href="<?php echo base_url();?>projects/display/<?php echo $project->id; ?>">
                        <?php echo $project->name; ?>
                    </a>
                </td>
                <td>
                    <?php echo $project->body; ?>
                </td>
                <td>
                    <a class="btn btn-danger" href="<?php echo base_url(); ?>projects/delete/<?php echo $project->id ?>">
                        <span class="glyphicon glyphicon-remove"></span>
                    </a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?php } ?>
</div>
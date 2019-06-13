
<h2>Edit Project</h2>

<?php
$attributes = array(
    'id' => 'edit_project',
    'class' => 'form_horizontal'
);

echo form_open('projects/edit/'.$project->id, $attributes);
?>

    <div class="form-group mb-5">
        <?php
        echo form_label('Project Name');
        $data = array(
            'class' => 'form-control',
            'name' => 'name',
            'placeholder' => 'Enter Project Name',
            'value' => $project->name
        );
        echo form_input($data);
        ?>
    </div>

    <div class="form-group mb-5">
        <?php
        echo form_label('Description');
        $data = array(
            'class' => 'form-control',
            'name' => 'body',
            'placeholder' => 'Enter Description',
            'value' => $project->body
        );
        echo form_textarea($data);
        ?>
    </div>

    <div class="form-group">
        <?php
        $data = array(
            'class' => 'btn btn-primary',
            'name' => 'editProject',
            'value' => 'Edit Project'
        );
        echo form_submit($data);
        ?>
    </div>

<?php
echo form_close();
?>
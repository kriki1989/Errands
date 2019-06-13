
<h2>Create Project</h2>

<?php
$attributes = array(
    'id' => 'create_project',
    'class' => 'form_horizontal'
);

echo form_open('projects/create', $attributes);
?>

    <div class="form-group mb-5">
        <?php
        echo form_label('Project Name');
        $data = array(
            'class' => 'form-control',
            'name' => 'name',
            'placeholder' => 'Enter Project Name'
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
            'placeholder' => 'Enter Description'
        );
        echo form_textarea($data);
        ?>
    </div>

    <div class="form-group">
        <?php
        $data = array(
            'class' => 'btn btn-primary',
            'name' => 'createProject',
            'value' => 'Create Project'
        );
        echo form_submit($data);
        ?>
    </div>

<?php
echo form_close();
?>
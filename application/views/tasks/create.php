
<h2>Create Task</h2>

<?php
$attributes = array(
    'id' => 'create_task',
    'class' => 'form_horizontal'
);

echo form_open('tasks/create/' . $this->uri->segment(3), $attributes);
?>

    <div class="form-group">
        <?php
        echo form_label('Task Name');
        $data = array(
            'class' => 'form-control',
            'name' => 'name',
            'placeholder' => 'Enter Task Name'
        );
        echo form_input($data);
        ?>
    </div>

    <div class="form-group">
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
        echo form_label('Due Date');
        $data = array(
            'class' => 'form-control',
            'name' => 'due_date',
            'type' => 'date'
        );
        echo form_input($data);
        ?>
    </div>

    <div class="form-group">
        <?php
        $data = array(
            'class' => 'btn btn-primary',
            'name' => 'createTask',
            'value' => 'Create Task'
        );
        echo form_submit($data);
        ?>
    </div>

<?php
echo form_close();
?>

<h2>Edit Task</h2>

<?php
$attributes = array(
    'id' => 'edit_task',
    'class' => 'form_horizontal'
);

echo form_open('tasks/edit/'.$task->id .'/'. $this->uri->segment(4), $attributes);
?>

    <div class="form-group">
        <?php
        echo form_label('Task Name');
        $data = array(
            'class' => 'form-control',
            'name' => 'name',
            'placeholder' => 'Enter Task Name',
            'value' => $task->name
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
            'placeholder' => 'Enter Description',
            'value' => $task->body
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
            'type' => 'date',
            'value' => $task->due_date
        );
        echo form_input($data);
        ?>
    </div>

    <div class="form-group">
        <?php
        $data = array(
            'class' => 'btn btn-primary',
            'name' => 'edit_task',
            'value' => 'Edit Task'
        );
        echo form_submit($data);
        ?>
    </div>

<?php
echo form_close();
?>
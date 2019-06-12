<?php

class Tasks extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->isLogged('You are not allowed to access this sector');
    }

    public function create($projectId)
    {
        $this->form_validation->set_rules(
            'name',
            'Task Name',
            'trim|required'
        );
        $this->form_validation->set_rules(
            'body',
            'Task Description',
            'trim|required'
        );
        $this->form_validation->set_rules(
            'due_date',
            'Due Date',
            'trim|required'
        );

        // use this in case you don't want to preview errors
        if ($this->form_validation->run() == false) {
            $data['main'] = 'tasks/create';
            $data['sidebar'] = 'users/login_view';
            $this->load->view('layouts/main', $data);
        } else {
            $data = array(
                'name' => strtoupper($this->input->post('name')),
                'body' => $this->input->post('body'),
                'due_date' => $this->input->post('due_date'),
                'project_id' => $projectId
            );

            if ($this->Task->create($data)) {
                $this->session->set_flashdata('taskSuccess', 'Your task has been created');
                redirect('projects/display/' . $projectId);
            } else {
                $this->session->set_flashdata('taskFail', 'Your task failed to create');
                redirect('projects/display/' . $projectId);
            }
        }
    }

    public function edit($tasktId, $projectId)
    {
        $this->form_validation->set_rules(
            'name',
            'Task Name',
            'trim|required'
        );
        $this->form_validation->set_rules(
            'body',
            'Task Description',
            'trim|required'
        );
        $this->form_validation->set_rules(
            'due_date',
            'Due Date',
            'trim|required'
        );

        // use this in case you don't want to preview errors
        if ($this->form_validation->run() == false) {
            $data['task'] = $this->Task->getTask($tasktId);
            $data['main'] = 'tasks/edit';
            $data['sidebar'] = 'users/login_view';
            $this->load->view('layouts/main', $data);
        } else {
            $data = array(
                'id' => $tasktId,
                'name' => strtoupper($this->input->post('name')),
                'body' => $this->input->post('body'),
                'project_id' => $projectId,
                'due_date' => $this->input->post('due_date')
            );

            if ($this->Task->replace($data)) {
                $this->session->set_flashdata('taskSuccess', 'Your task has been edited');
                redirect('projects/display/' . $projectId);
            } else {
                $this->session->set_flashdata('taskFail', 'Your task failed to edit');
                redirect('projects/display/' . $projectId);
            }
        }
    }

    public function delete($taskId, $projectId) {
        if ($this->Task->delete($taskId)) {
            $this->session->set_flashdata('taskSuccess', 'The task was deleted successfully');
            redirect('projects/display/' . $projectId);
        } else {
            $this->session->set_flashdata('taskFail', 'The task failed to delete.');
            redirect('projects/display/' . $projectId);
        }
    }
}
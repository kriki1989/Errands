<?php

class Projects extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->isLogged('You are not allowed to access this sector');
    }

    public function index()
    {
        $userId = $this->session->userdata('userId');
        $data['projects'] = $this->Project->getProjects($userId);

        $data['main'] = 'projects/index';
        $data['sidebar'] = 'users/login_view';
        $this->load->view('layouts/main', $data);
    }

    public function display($projectId)
    {
        $data['project'] = $this->Project->getProject($projectId);

        $data['completedTasks'] = $this->Task->getTasks($projectId, 1);
        $data['activeTasks'] = $this->Task->getTasks($projectId, 0);

        $data['main'] = 'projects/display';
        $data['sidebar'] = 'users/login_view';
        $this->load->view('layouts/main', $data);
    }

    public function create()
    {
        $this->form_validation->set_rules(
            'name',
            'Project Name',
            'trim|required'
        );
        $this->form_validation->set_rules(
            'body',
            'Project Description',
            'trim|required'
        );

        // use this in case you don't want to preview errors
        if ($this->form_validation->run() == false) {
            $data['main'] = 'projects/create';
            $data['sidebar'] = 'users/login_view';
            $this->load->view('layouts/main', $data);
        } else {
            $data = array(
                'user_id' => $this->session->userdata('userId'),
                'name' => strtoupper($this->input->post('name')),
                'body' => $this->input->post('body')
            );

            if ($this->Project->create($data)) {
                $this->session->set_flashdata('projectSuccess', 'Your project has been created');
                redirect('projects/index');
            } else {
                $this->session->set_flashdata('projectFail', 'Your project failed to create');
                redirect('projects/index');
            }
        }
    }

    public function edit($projectId)
    {
        $this->form_validation->set_rules(
            'name',
            'Project Name',
            'trim|required'
        );
        $this->form_validation->set_rules(
            'body',
            'Project Description',
            'trim|required'
        );

        // use this in case you don't want to preview errors
        if ($this->form_validation->run() == false) {
            $data['project'] = $this->Project->getProject($projectId);
            $data['main'] = 'projects/edit';
            $data['sidebar'] = 'users/login_view';
            $this->load->view('layouts/main', $data);
        } else {
            $data = array(
                'user_id' => $this->session->userdata('userId'),
                'name' => strtoupper($this->input->post('name')),
                'body' => $this->input->post('body')
            );

            if ($this->Project->update($projectId, $data)) {
                $this->session->set_flashdata('projectSuccess', 'Your project has been edited');
                redirect('projects/index');
            } else {
                $this->session->set_flashdata('projectFail', 'Your project failed to edit');
                redirect('projects/index');
            }
        }
    }

    public function delete($projectId) {
        if ($this->Project->delete($projectId)) {
            $this->Task->deleteAll($projectId);
            $this->session->set_flashdata('projectSuccess', 'The project was deleted successfully');
            redirect('projects/index');
        } else {
            $this->session->set_flashdata('projectFail', 'The project failed to delete.');
            redirect('projects/index');
        }
    }

}
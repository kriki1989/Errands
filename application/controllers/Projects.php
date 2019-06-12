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

    public function display($id)
    {
        $data['project'] = $this->Project->getProject($id);
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

    public function edit($id)
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
            $data['project'] = $this->Project->getProject($id);
            $data['main'] = 'projects/edit';
            $data['sidebar'] = 'users/login_view';
            $this->load->view('layouts/main', $data);
        } else {
            $data = array(
                'id' => $id,
                'user_id' => $this->session->userdata('userId'),
                'name' => strtoupper($this->input->post('name')),
                'body' => $this->input->post('body')
            );

            if ($this->Project->replace($data)) {
                $this->session->set_flashdata('projectSuccess', 'Your project has been edited');
                redirect('projects/index');
            } else {
                $this->session->set_flashdata('projectFail', 'Your project failed to edit');
                redirect('projects/index');
            }
        }
    }

    public function delete($id) {
        if ($this->Project->delete($id)) {
            $this->session->set_flashdata('projectSuccess', 'The project was deleted successfully');
            redirect('projects/index');
        } else {
            $this->session->set_flashdata('projectFail', 'The project failed to delete.');
            redirect('projects/index');
        }
    }

}
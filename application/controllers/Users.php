<?php

class Users extends CI_Controller
{
    public function submitLogin()
    {
        $this->form_validation->set_rules(
            'username',
            'Username',
            'trim|required|min_length[3]'
        );
        $this->form_validation->set_rules(
            'password',
            'Password',
            'trim|required|min_length[4]'
        );
        $this->form_validation->set_rules(
            'confirmPassword',
            'Confirmed Password',
            'trim|required|min_length[4]|matches[password]'
        );

        if ($this->form_validation->run() == false) {
            $data = array(
                'error' => validation_errors()
            );

            $this->session->set_flashdata($data);

            redirect('home');
        } else {
            $username = $this->input->post('username');
            $password = $this->input->post('password');

            $userId = $this->User->loginUser($username, $password);

            if ($userId) {
                $userData = array(
                    'userId' => $userId,
                    'username' => $username,
                    'loggedIn' => true
                );

                $this->session->set_userdata($userData);
                $this->session->set_flashdata('loginSuccess', 'You are now logged in');
                redirect('users/login');
            } else {
                $this->session->set_flashdata('loginFail', 'Sorry you are not logged in');
                redirect('home');
            }

        }
    }

    public function submitRegister()
    {
        $this->form_validation->set_rules(
            'fname',
            'First Name',
            'trim|required|min_length[3]'
        );
        $this->form_validation->set_rules(
            'lname',
            'Last Name',
            'trim|required|min_length[3]'
        );
        $this->form_validation->set_rules(
            'email',
            'Email',
            'trim|required|valid_email'
        );
        $this->form_validation->set_rules(
            'username',
            'Username',
            'trim|required|min_length[3]'
        );
        $this->form_validation->set_rules(
            'password',
            'Password',
            'trim|required|min_length[4]'
        );
        $this->form_validation->set_rules(
            'confirmPassword',
            'Confirmed Password',
            'trim|required|min_length[4]|matches[password]'
        );

        if ($this->form_validation->run() == false) {
            $data = array(
                'error' => validation_errors()
            );

            $this->session->set_flashdata($data);

            redirect('users/register');
        } else {
            $first_name = $this->input->post('fname');
            $last_name = $this->input->post('lname');
            $email = $this->input->post('email');
            $username = $this->input->post('username');
            $password = $this->input->post('password');

            $options = ['cost => 12'];
            $hash_password = password_hash($this->input->post('password'), PASSWORD_BCRYPT, $options);

            $addUserData = array(
                'first_name' => $first_name,
                'last_name' => $last_name,
                'email' => $email,
                'username' => $username,
                'password' => $hash_password
            );

            if ($this->User->registerUser($addUserData)) {

                $userId = $this->User->loginUser($username, $hash_password);
                $data['projects'] = $this->Project->getProjects($userId);

                $userData = array(
                    'userId' => $userId,
                    'username' => $username,
                    'loggedIn' => true
                );
                $this->session->set_userdata($userData);
                $this->session->set_flashdata('loginSuccess', 'You registered successfully');
                redirect('users/login');
            } else {
                $this->session->set_flashdata('loginFail', 'Sorry your registration failed');
                redirect('home');
            }
        }
    }

    public function login()
    {
        $data['main'] = 'home_view';
        if ($this->session->userdata('loggedIn')) {
            $userId = $this->session->userdata('userId');
            $data['projects'] = $this->Project->getProjects($userId);
            $data['tasks'] = $this->Task->getAllTasks($userId);
            $data['main'] = 'admin_view';
        }
        $data['sidebar'] = 'users/login_view';
        $this->load->view('layouts/main', $data);
    }

    public function register()
    {
        $data['main'] = 'home_view';
        if ($this->session->userdata('loggedIn')) {
            $userId = $this->session->userdata('userId');
            $data['projects'] = $this->Project->getProjects($userId);
            $data['tasks'] = $this->Task->getAllTasks($userId);
            $data['main'] = 'admin_view';
        }
        $data['sidebar'] = 'users/register_view';
        $this->load->view('layouts/main', $data);
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('home');
    }

}
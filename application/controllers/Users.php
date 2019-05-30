<?php

class Users extends CI_Controller
{
    public function login()
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
                redirect('home');
            } else {
                $this->session->set_flashdata('loginFail', 'Sorry you are not logged in');
                redirect('home');
            }

        }
    }
}
<?php

class User extends CI_Model
{

    public function loginUser($username, $password)
    {
        $this->db->where('username', $username);

        $result = $this->db->get('users', 1);

        $db_password = $result->row(2)->password;

        if (password_verify($password, $db_password)) {
            return $result->row(0)->id;
        } else {
            return false;
        }
    }

    public function registerUser($data)
    {
        return $this->db->insert('users', $data, true);
    }

    public function usernameExists($username)
    {
        $this->db->where('username', $username);
        $result = $this->db->get('users');
        if ($result->result() != array()) {
            return true;
        }
        return false;
    }

    public function emailExists($email)
    {
        $this->db->where('email', $email);
        $result = $this->db->get('users');
        if ($result->result() != array()) {
            return true;
        }
        return false;
    }

}
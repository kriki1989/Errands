<?php

class User extends CI_Model
{

    public function loginUser($username, $password)
    {
        $this->db->where([
            'username' => $username,
            'password' => $password
            ]);
        $result = $this->db->get('users', 1);

        if ($result->num_rows() == 1) {
            return $result->row(0)->id;
        } else {
            return false;
        }
    }

}
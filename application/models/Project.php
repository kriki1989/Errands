<?php

class Project extends CI_Model
{

    public function getProjects()
    {
        $result = $this->db->get('projects');
        return $result->result();
    }

    public function getProject($id) {

        $this->db->where('id', $id);
        $result = $this->db->get('projects', 1);

        return $result->row();
    }

    public function create($data)
    {
        return $this->db->insert('projects', $data);
    }

    public function replace($data)
    {
        return $this->db->replace('projects', $data);
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('projects');
    }
}
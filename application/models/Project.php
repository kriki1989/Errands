<?php

class Project extends CI_Model
{

    public function getProjects($userId)
    {
        $this->db->where('user_id', $userId);
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

    public function update($projectId, $data)
    {
        $this->db->where('id', $projectId);
        return $this->db->update('projects', $data);
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('projects');
    }

    public function getProjectId($userId)
    {

    }
}
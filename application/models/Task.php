<?php

class Task extends CI_Model
{
    public function getTasks($projectId)
    {
        $this->db->where('project_id', $projectId);
        $query = $this->db->get('tasks');

        return $query->result();
    }

    public function getTask($taskId)
    {
        $this->db->where('id', $taskId);
        $result = $this->db->get('tasks', 1);

        return $result->row();
    }

    public function create($data)
    {
        return $this->db->insert('tasks', $data);
    }

    public function replace($data)
    {
        return $this->db->replace('tasks', $data);
    }

    public function deleteAll($projectId)
    {
        $this->db->where('project_id', $projectId);
        return $this->db->delete('tasks');
    }

    public function delete($taskId)
    {
        $this->db->where('id', $taskId);
        return $this->db->delete('tasks');
    }
}

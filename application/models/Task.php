<?php

class Task extends CI_Model
{
    public function getTasks($projectId, $status)
    {
        $this->db->where(array(
            'project_id' => $projectId,
            'status' => $status
        ));
        $query = $this->db->get('tasks');

        return $query->result();
    }

    public function getAllTasks($userId)
    {
        $this->db->select('tasks.id, tasks.name, tasks.body, tasks.status, projects.name as category');
        $this->db->from('tasks');
        $this->db->join('projects', 'projects.id = tasks.project_id', 'inner');
        $this->db->where('projects.user_id', $userId);
        $query = $this->db->get();

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

    public function status($taskId, $status)
    {
        $this->db->where('id', $taskId);
        return $this->db->update('tasks', array('status' => $status));
    }
}

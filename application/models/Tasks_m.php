<?php
class Tasks_m extends CI_Model {
    public function get_tasks()
    {
        // return $this->db->get('tasks')->result_array();
        $this->db->select('tasks.id, tasks.text, tasks.max_rating, tasks.id_test, tests.title');
                $this->db->from('tasks');
                $this->db->join('tests', 'tests.id = tasks.id_test');
                $this->db->order_by('tasks.id_test');
                return $this->db->get()->result_array();
    }
    public function get_tasks_group($id)
    {
        // return $this->db->get('tasks')->result_array();
        $this->db->select('tasks.id, tasks.text, tasks.max_rating, tasks.id_test, tests.title');
                $this->db->from('tasks');
                $this->db->where('id_test =', $id);
                $this->db->join('tests', 'tests.id = tasks.id_test');
                $this->db->order_by('tasks.id_test');
                return $this->db->get()->result_array();
    }
    public function get_task($id)
    {
        return $this->db->get_where('tasks', array('id'=> $id))->row_array();
    }
    public function get_tasks_user($id)
    {
        return $this->db->get_where('tasks', array('id_test'=> $id))->result_array();
    }

    public function set_task($data)
    {
        return $this->db->insert('tasks', $data);
    }

    public function update_task($data, $id)
    {
        $this->db->where('id', $id);
        $this->db->update('tasks', $data);
    }

    public function delete($id)
    {
        $this->db->delete('tasks', array('id' => $id));
    }
}
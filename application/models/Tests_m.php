<?php
class Tests_m extends CI_Model {
    public function get_tests($id_user = 1)
    {
        // return $this->db->get('tests')->result_array();
        $this->db->select('tests.id, tests.title, tests.time,  types.type');
                $this->db->from('tests');
                $this->db->join('types', 'types.id = tests.type');
                return $this->db->get()->result_array();
    }
    public function get_test($id)
    {
        return $this->db->get_where('tests', array('id'=> $id))->row_array();
    }
    public function get_test_group($id_group, $user = 2)
    {
         $this->db->get_where('tests', array('id_group'=> $id_group));
        
        return $this->db->join('answers', 'answers.id_test = test.id, answer.id_user = $id_user', 'left')
        ->result_array();
    }

    public function set_test($data)
    {
        return $this->db->insert('tests', $data);
    }

    public function update_test($data, $id)
    {
        $this->db->where('id', $id);
        $this->db->update('tests', $data);
    }

    public function delete($id)
    {
        $this->db->delete('tests', array('id' => $id));
    }
}
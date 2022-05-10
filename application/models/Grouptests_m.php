<?php
class Grouptests_m extends CI_Model {
    public function get_grouptests()
    {
        // return $this->db->get('grouptests')->result_array();
        $this->db->select('grouptests.id, grouptests.id_group, grouptests.id_test,  test.text');
                $this->db->from('grouptests');
                $this->db->join('test', 'test.id = grouptests.id_test');
                return $this->db->get()->result_array();
    }
    public function get_grouptest($id)
    {
        return $this->db->get_where('grouptests', array('id'=> $id))->row_array();
    }
    public function get_tests_group($id_group)
    {
        // return $this->db->get_where('grouptests', array('id_group'=> $id_group))->result_array();
        $this->db->select('grouptests.id, grouptests.id_group, grouptests.id_test,  tests.title, tests.time');
                $this->db->from('grouptests');
                $this->db->where('id_group', $id_group);
                $this->db->join('tests', 'tests.id = grouptests.id_test');
                // $this->db->join('answers', 'tests.id = ansvers.id_test');
                return $this->db->get()->result_array();
    }

public function raiting_test($user = 1)
{
    $this->db->select('SUM(rating) as sum, id_test, id_user')->from('answers');    
    $this->db->group_by('id_test');
    $this->db->where('id_user', $user);
    return $this->db->get()->result_array();
    
}

    public function set_grouptest($data)
    {
        return $this->db->insert('grouptests', $data);
    }

    public function update_grouptest($data, $id)
    {
        $this->db->where('id', $id);
        $this->db->update('grouptests', $data);
    }

    public function delete($id)
    {
        $this->db->delete('grouptests', array('id' => $id));
    }
}
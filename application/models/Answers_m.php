<?php
class Answers_m extends CI_Model {
    public function get_answers()
    {
        return $this->db->get('answers')->result_array();
    }

    public function get_answer($id)
    {
        return $this->db->get_where('answers', array('id'=> $id))->row_array();
    }
public function get_user_amswers($id_user)
{
    $this->db->select("answers.id, answers.text, answers.id_test, tests.title");
    $this->db->where( array('id_user'=>$id_user));
    $this->db->from('answers');
    $this->db->join('tests', 'tests.id = answers.id_test');
    return $this->db->get()->result_array();
}
public function get_user_amswers_test($id_user, $test)
{
    $this->db->select("answers.id, answers.text as answer, answers.rating,  tasks.text, tasks.max_rating");
    $this->db->where( array('id_user'=>$id_user, 'answers.id_test'=>$test));
    $this->db->from('answers');
    $this->db->join('tasks', 'tasks.id = answers.id_task');
    return $this->db->get()->result_array();
}
public function get_count_user_amswers($id_user)
{
    $this->db->select("answers.id_test, answers.id_user, tests.title, COUNT(answers.id_test) as count, SUM(answers.rating) as sum_raiting");
    $this->db->where( array('id_user'=>$id_user));
    $this->db->group_by('answers.id_test');
    $this->db->from('answers');
    $this->db->join('tests', 'tests.id = answers.id_test');
    return $this->db->get()->result_array();
}

public function get_count()
{
    $this->db->select("SUM(rating) as rating, id_user, users.name, users.lastName, users.id_group, users.id_role, groups.group ");
    $this->db->from('users');
    $this->db->where('users.id_role = 3');
    $this->db->order_by('rating','DESC');
    $this->db->order_by('id_group');
    $this->db->group_by('id_user');
    
    
    $this->db->join('answers', 'answers.id_user = users.id');
    $this->db->join('groups', 'groups.id = users.id_group');
    return $this->db->get()->result_array();

}
    public function set_answer($data)
    {
        return $this->db->insert('answers', $data);
    }

    public function update_answer($data, $id)
    {
        $this->db->where('id', $id);
        $this->db->update('answers', $data);
    }

    public function delete($id)
    {
        $this->db->delete('answers', array('id' => $id));
    }
}
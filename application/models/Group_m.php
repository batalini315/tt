<?php
class Group_m extends CI_Model {
    public function get_groups()
    {
        return $this->db->get('groups')->result_array();
    }
    public function get_group($id)
    {
        return $this->db->get_where('groups', array('id'=> $id))->row_array();
    }

    public function set_group()
    {
        $this->load->helper('url');

        $slug = url_title($this->input->post('title'), 'dash', TRUE);

        $data = array(
            'group' => $this->input->post('group')
        );

        return $this->db->insert('groups', $data);
    }

    public function update_group($data, $id)
    {
        $this->db->where('id', $id);
        $this->db->update('groups', $data);
    }

    public function delete($id)
    {
        $this->db->delete('groups', array('id' => $id));
        $this->db->delete('grouptests', array('id_group' => $id));
        // нужно ли удалять студентов?
    }
}
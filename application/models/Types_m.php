<?php
class Types_m extends CI_Model {
    public function get_types()
    {
        return $this->db->get('types')->result_array();
    }
    public function get_type($id)
    {
        return $this->db->get_where('types', array('id'=> $id))->row_array();
    }

    public function set_type($data)
    {
        return $this->db->insert('types', $data);
    }

    public function update_type($data, $id)
    {
        $this->db->where('id', $id);
        $this->db->update('types', $data);
    }

    public function delete($id)
    {
        $this->db->delete('types', array('id' => $id));
    }
}
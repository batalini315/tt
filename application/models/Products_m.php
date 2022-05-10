<?php
class Products_m extends CI_Model
{

    public function __construct()
    {
        $this->load->database();
    }
    public function get_products($id = null)
    {
        if ($id === null) {
            $query = $this->db->get('products');
            return $query->result_array();
        }

        $query = $this->db->get_where('users', array('id' => $id));
        return $query->row_array();
    }
    public function saveProduct($product)
    {
        $this->db->insert('products', $product);
    }

    public function updateProduct($id, $product)
    {
        $this->db->where('id' , $id)->update('products',$product);
    }
    public function deleteProduct($id)
    {
        $this->db->where('id' , $id)->delete('products');
    }
}

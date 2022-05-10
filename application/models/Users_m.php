<?php
class Users_m extends CI_Model {

        public function __construct()
        {
                $this->load->database();
        }
        public function get_users($id = FALSE)
        {
                if ($id === FALSE)
                {
                        return $this->student();
                }
                else 
                {
                $query = $this->db->get_where('users', array('id' => $id));
                return $query->row_array();
                }
        }
        public function validate($email, $password)
        {
        return $this->db->get_where('users',array('email'=> $email, 'password' => $password))->row_array() ;
        }

        public function role($email)
        {
        return $this->db->select('id_role')->get_where('users',array('email'=> $email))->row_array() ;
        }
        
        public function get_user($email)
        {
        return $this->db->get_where('users',array('email'=> $email))->row_array() ;
        }
        public function get_group_users($group)
        {
        return $this->db->select('id, name, lastName')->get_where('users',array('id_group'=> $group))->result_array() ;
        }

        public function student()
        {
                // return $this->db->get('users')->result_array();
                $this->db->select('users.id, users.email, users.country, users.city, users.school, users.class, users.name, users.lastName, groups.group');
                $this->db->from('users');
                $this->db->join('groups', 'groups.id = users.id_group');
                return $this->db->get()->result_array();
        }
        public function student_rating()
        {
                // return $this->db->get('users')->result_array();
                $this->db->select('users.country, users.city, users.school, users.class, users.name, users.lastName, groups.group');
                $this->db->from('users');
                $this->db->order_by('id_group');
                $this->db->join('groups', 'groups.id = users.id_group');
                return $this->db->get()->result_array();
        }
        public function teacher()
        {
                // return $this->db->get('users')->result_array();
                $this->db->select('id, email, country, city, school, class, name, lastName');
                
                return $this->db->get_where('users', array('id_role'=> 2))->result_array();
        }

        public function set_user(){
                $data = array(
                        'name' => $this->input->post('name'),
                        'lastName' => $this->input->post('lastName'),
                        'email' => $this->input->post('email'),
                        'country' => $this->input->post('country'),
                        'city' => $this->input->post('city'),
                        'school' => $this->input->post('school'),
                        'class' => $this->input->post('class'),
                        'id_group' => $this->input->post('id_group'),
                        'password' => $this->input->post('password'),
                        'id_role' => 3,
                );
        
                return $this->db->insert('users', $data);
        }
        public function set_teacher(){
                $data = array(
                        'name' => $this->input->post('name'),
                        'lastName' => $this->input->post('lastName'),
                        'email' => $this->input->post('email'),
                        'country' => $this->input->post('country'),
                        'city' => $this->input->post('city'),
                        'school' => $this->input->post('school'),
                        'class' => $this->input->post('class'),
                        'password' => $this->input->post('password'),
                        'id_role' => 2,
                );
        
                return $this->db->insert('users', $data);
        }

        public function getUser($id)
        {
                return $this->db->get_where('users', array('id'=> $id))->row_array();
        }
        public function getUserEmail($email)
        {
                return $this->db->get_where('users', array('email'=> $email))->row_array();
        }

        public function update_user($data, $id)
        {
                $this->db->where('id', $id);
                return $this->db->update('users', $data);
        }

        public function delete($id)
    {
        $this->db->delete('users', array('id' => $id));
        $this->db->delete('answers', array('id_user' => $id));
    }

}
<?php defined('BASEPATH') OR exit('No direct script access allowed'); 
class Group extends CI_Controller 
{
    function __construct()
    {
        parent::__construct();
        $email = $this->session->userdata('email');
        if(!$email)
        {            
            redirect('login');
        }
        else 
        {
            $this->load->model('Users_m');
            $role = $this->Users_m->role($email);
            if($role['id_role'] > 2) 
            // print_r ($role);
            redirect('cabinet');
        }            
    }
    public function create()
    {
        $this->load->helper('form');
        $this->load->library('form_validation');

        $data['title'] = 'Создание новой группы';
        $this->load->model('Users_m');
        $email = $this->session->userdata('email');
        $data['role'] = $this->Users_m->role($email);
        $this->load->model('Users_m');
        $email = $this->session->userdata('email');
        $data['role'] = $this->Users_m->role($email);

        $this->form_validation->set_rules('group', 'Название', 'required');

        if ($this->form_validation->run() === FALSE)
        {
            $data['view'] = 'newgroup';
            $this->load->view('admin/adminHeader', $data);
        }
        else
        {
            $this->load->model('Group_m');
            $this->Group_m->set_group();
            redirect('admin/groups');
        }
    }
    public function update($val = null)
    {
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('Group_m');

        $data['title'] = 'Новое название группы';
        $data['group'] = $this->Group_m->get_group($val);
        $this->load->model('Users_m');
        $email = $this->session->userdata('email');
        $data['role'] = $this->Users_m->role($email);

        $this->form_validation->set_rules('group', 'Название', 'required');

        if ($this->form_validation->run() === FALSE)
        {
            $data['view'] = 'group';
            $this->load->view('admin/adminHeader', $data);
        }
        else
        {
            $data1 = array(
                'group' => $this->input->post('group')
            );
            $id =$val;
            $data['group']=$this->Group_m->update_group($data1, $id);
            // $data['view'] = 'group';
            // $this->load->view('admin/adminHeader', $data);
            redirect('admin/groups');
        }
    }

    public function delete($id)
    {
        $this->load->model('Group_m');
        $this->Group_m->delete($id);
        redirect('admin/groups');
    }
}
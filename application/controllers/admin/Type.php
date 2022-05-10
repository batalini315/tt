<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Type extends CI_Controller 
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
            if($role['id_role'] != "1") 
            print_r ($role);
            // redirect('cabinet');
        }            
    }
    public function index()
    {
        $data['title'] = 'Типы';
        $data['view'] = 'types';
        $this->load->model('Types_m');
        $data['types'] = $this->Types_m->get_types();
        $this->load->model('Users_m');
        $email = $this->session->userdata('email');
        $data['role'] = $this->Users_m->role($email);
        $this->load->view('admin/adminHeader', $data);
    }
    
    public function new()
    {
        $this->load->helper('form');
        $this->load->library('form_validation');

        $data['title'] = 'Создание новоого типа';
        $this->load->model('Users_m');
        $email = $this->session->userdata('email');
        $data['role'] = $this->Users_m->role($email);

        $this->form_validation->set_rules('type', 'Название', 'required');

        if ($this->form_validation->run() === FALSE)
        {
            $data['view'] = 'type';
            $data['type'] = [];
            $this->load->view('admin/adminHeader', $data);
        }
        else
        {
            $data1['type'] = $this->input->post('type');
            $this->load->model('Types_m');
            $this->Types_m->set_type($data1);
            redirect('admin/types');
        }
    }
    public function update($val = null)
    {
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('Types_m');

        $data['title'] = 'Новое название группы';
        $data['type'] = $this->Types_m->get_type($val);
        $this->load->model('Users_m');
        $email = $this->session->userdata('email');
        $data['role'] = $this->Users_m->role($email);

        $this->form_validation->set_rules('type', 'Название', 'required');

        if ($this->form_validation->run() === FALSE)
        {
            $data['view'] = 'type';
            $this->load->view('admin/adminHeader', $data);
        }
        else
        {
            $data1 = array(
                'type' => $this->input->post('type')
            );
            $data['type']=$this->Types_m->update_type($data1, $val);
            // $data['view'] = 'type';
            // $this->load->view('admin/adminHeader', $data);
            redirect('admin/types');
        }
    }

    public function delete($id)
    {
        $this->load->model('Types_m');
        $this->Types_m->delete($id);
        redirect('admin/types');
    }
}
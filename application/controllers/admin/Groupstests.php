<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Groupstests extends CI_Controller 
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
            if($role['id_role'] >2) 
            // print_r ($role);
            redirect('cabinet');
        }            
    }
    public function index()
    {
        
        $data['title'] = 'Выбрать группу';
        $data['view'] = 'groupstests';
        $data['tests'] = [];
        $data['group'] = [];
        $this->load->model('Group_m');
        $data['groups'] = $this->Group_m->get_groups();
        $this->load->model('Users_m');
        $email = $this->session->userdata('email');
        $data['role'] = $this->Users_m->role($email);
        $this->load->view('admin/adminHeader', $data);
    }

    public function tests($val = null)
    {
        
        $data['view'] = 'groupstests';
        $this->load->model('Group_m');
        $group = $this->Group_m->get_group($val);
        $data['group'] = $group;
        $groups = $this->Group_m->get_groups();
        $data['groups'] = $groups;
        $data['title'] = 'Тесты группы '.$group['group'];
        $this->load->model('Grouptests_m');
        $this->load->model('Users_m');
        $email = $this->session->userdata('email');
        $data['role'] = $this->Users_m->role($email);
        $data['tests'] = $this->Grouptests_m->get_tests_group($val);
        $this->load->view('admin/adminHeader', $data);
        
    }
    public function create($group, $id_test = null)
    {
        $this->load->helper('form');
        $this->load->library('form_validation');

        $data['title'] = 'Выбор теста для группы ';
        $this->load->model('Users_m');
        $email = $this->session->userdata('email');
        $data['role'] = $this->Users_m->role($email);

        $this->form_validation->set_rules('id_group', 'Group', 'required');
        $this->form_validation->set_rules('id_test', 'Test', 'required');

        if ($this->form_validation->run() === FALSE)
        {
            $data['group'] = $group;
            $data['view'] = 'grouptest';
            $this->load->model('Tests_m');
            $data['tests'] = $this->Tests_m->get_tests();
            $this->load->view('admin/adminHeader', $data);
        }
        else
        {
            $data1['id_group'] =  $this->input->post('id_group');
            $data1['id_test'] =  $this->input->post('id_test');
            $this->load->model('Grouptests_m');
            $this->Grouptests_m->set_grouptest($data1);
            redirect('admin/grouptests/'.$group);
        }


        
    }
    
}
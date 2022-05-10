<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Groups extends CI_Controller 
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
        $data['title'] = 'Группы';
        $data['view'] = 'groups';
        $this->load->model('Group_m');
        $data['groups'] = $this->Group_m->get_groups();
        $this->load->model('Users_m');
        $email = $this->session->userdata('email');
        $data['role'] = $this->Users_m->role($email);
        $this->load->view('admin/adminHeader', $data);
    }
}
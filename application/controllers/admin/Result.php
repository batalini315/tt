<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Result extends CI_Controller 
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
    public function index()
    {
        $data['title'] = 'Admin Result';
        $data['view'] = 'rating';
        $this->load->model('Users_m');
        $email = $this->session->userdata('email');
        $data['role'] = $this->Users_m->role($email);
        $this->load->model('Answers_m');
        $data['rating']= $this->Answers_m->get_count();
        // $this->load->model('Users_m');
        // $data['users'] = $this->Users_m->student_rating();
        $this->load->view('admin/adminHeader', $data);
    }
}
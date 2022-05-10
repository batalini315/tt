<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Rating extends CI_Controller 
{
    function __construct()
    {
        parent::__construct();
        $email = $this->session->userdata('email');
        if(!$email)
        {            
            // echo "not email session";
            redirect('home');
        }
        // else{
        //     $this->load->model('Users_m');
        //     $role = $this->Users_m->role($email);
        //     // if($role == 3) 
        //     redirect('cabinet');
        //     // redirect('home');

        // }
                    
    }
    public function index()
    {
        $email = $this->session->userdata('email');
        $this->load->model('Users_m');
        $user= $this->Users_m->get_user($email);
        $data['user']= $user;
        $data['role'] = $this->Users_m->role($email);
        $this->load->model('Answers_m');
        $data['ratings']= $this->Answers_m->get_count();

        $data['title']= 'Результаты';
        $data['view']= 'rating';
        $this->load->view('user/userHeader',$data);
    }
}
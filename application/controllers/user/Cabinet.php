<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use Guzzle\Service\Resource\Model;

class Cabinet extends CI_Controller 
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
        $this->load->model('Grouptests_m');
        $data['tests']= $this->Grouptests_m->get_tests_group($user['id_group']);
        $data['raiting']= $this->Grouptests_m->raiting_test($user['id']);
        
        $data['title']= 'Личный кабинет';
        $data['view']= 'cabinet';
        $this->load->view('user/userHeader',$data);
    }

    public function asks($val = null)
    {
        $this->load->helper('form');
        $this->load->library('form_validation');
        
        $email = $this->session->userdata('email');
        $this->load->model('Users_m');
        $user= $this->Users_m->get_user($email);
        $data['user']= $user;
        $email = $this->session->userdata('email');
        $data['role'] = $this->Users_m->role($email);
        $data['val']= $val;
        $this->load->model('Tasks_m');
        $data['tasks']= $this->Tasks_m->get_tasks_user($val);
        $this->load->model('Tests_m');
        $data['test']= $this->Tests_m->get_test($val);
        
        $data['title']= 'Тест';
        $data['view']= 'ask';
        $this->load->view('user/userHeader',$data);
    }

    public function answer($test)
    {
        $data['ask'] = $asks =  $this->input->post();
        $data['test']= $test;

        $email = $this->session->userdata('email');
        $this->load->model('Users_m');
        $user= $this->Users_m->get_user($email);
        
        
        $this->load->model('Answers_m');
        foreach($asks as $key => $val)
        {
            $ask=array('id_user'=> $user['id'], 'id_test'=>$test, 'id_task'=>$key, 'text'=>$val);
            $this->Answers_m->set_answer($ask);
        }
        
        redirect('cabinet');
        // $data['title']= 'Тест';
        // $data['view']= 'answer';
        // $this->load->view('user/userHeader',$data);
    }
}
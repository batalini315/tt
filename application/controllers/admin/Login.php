<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Login extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        // if($this->session->userdata('admin'))
        // {
        //     redirect('admin/users');
        // }            
    }
    public function index()
    {
        
        $data= array('email'=> '', 'password' => '$password');
        $data['session']= $this->session->userdata('email');
        $data['title']='Login';
        $data['error']='';
        $data['view']='login';
        $this->load->model('Users_m');
        $email = $this->session->userdata('email');
        $data['role'] = $this->Users_m->role($email);

        $this->load->view('user/userHeader', $data);
        
    }
    public function verify()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $this->load->model('Users_m');
        $data['role']['id_role'] = 0;            
        $user = $this->Users_m->validate($email, $password);
        print_r($user);
        $data= array('email'=> $email, 'password' => $password, 'error'=>'');
        if($user !=[])
        {
            $this->session->set_userdata('email', $email);
            $isUser = $this->Users_m->getUserEmail($email);
            if($isUser !== []) 
            {
                $data['session'] =$this->session->userdata('email');
                $data['user']= $isUser;
                $dataH['title']= 'Личный кабинет';
                $dataH['is_ses']=$this->session->has_userdata('email');

                if($isUser['id_role'] < 3){
                    // redirect('home');
                    redirect('admin/users');
                }
                else redirect('cabinet');
                // else redirect('cabinet');
                // 
            }
            
            // $this->load->view('admin/error', $data);
            // print_r($check);
        }
        else
        {            
            $data= array('email'=> $email, 'password' => $password);
            $data['session']= $this->session->userdata('email');
            $data['title']='Login'.$user;
            $data['role']['id_role'] = 0;
            $data['error']='Неверный пароль или логин';
            $data['view']='login';

        $this->load->view('user/userHeader', $data);
            // redirect('login');
            // echo('NOT '.$email);
            // $this->load->view('admin/error',$data);
        }
    }
    public function outlogin()
    {
        $this->session->set_userdata('email', '');
        $this->session->unset_userdata('email');
        // $this->session->unset_userdata('email');
        redirect('home');
        // $this->session->unset_userdata('admin');// redirect('home');
    }
}
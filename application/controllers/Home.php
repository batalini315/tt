<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Home extends CI_Controller 
{
    public function index()
    {
        $data['title'] = 'Главная';
        $data['view'] = 'home';        
        $this->load->model('Users_m');
        $email = $this->session->userdata('email');
        $data['role'] = $this->Users_m->role($email);        
        $this->load->view('user/userHeader',$data);
    }
}
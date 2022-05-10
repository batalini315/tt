<?php
defined('BASEPATH') OR exit('No direct script access allowed'); 
class Admin extends CI_Controller 
{
    public function index()
    {
        $data['title'] = 'Admin Headle';
        $data['view'] = 'users';
        $this->load->model('Users_m');
        $data['users'] = $this->Users_m->users();
        $this->load->view('admin/adminHeader', $data);
    }
    
}
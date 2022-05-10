<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Users extends CI_Controller 
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
        $this->load->model('Users_m');
        $email = $this->session->userdata('email');
        $data['role'] = $this->Users_m->role($email);
        $data['users'] = $this->Users_m->student();
        $data['title']= "Студенты";
        $data['test']= $this->session->userdata('admin');
        
        $data['view'] = 'users';
        $this->load->view('admin/adminHeader', $data);       
        
    }

    public function get_users_group($group)
    {
        $this->load->model('Users_m');
        $res = $this->Users_m->get_group_users($group);
        $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode($res));
    }

    public function new()
    {
        $this->load->helper('form');
        $this->load->library('form_validation');
        
        $data['title'] = 'Новый студент';
        $data['user'] = [];
        $this->load->model('Users_m');
        $email = $this->session->userdata('email');
        $data['role'] = $this->Users_m->role($email);

        $this->form_validation->set_rules('name', 'Имя', 'required');
        $this->form_validation->set_rules('email', 'email', 'required');
        $this->form_validation->set_rules('country', 'Страна', 'required');
        $this->form_validation->set_rules('city', 'Город', 'required');
        $this->form_validation->set_rules('class', 'Класс', 'required');
        $this->form_validation->set_rules('lastName', 'Фамилия', 'required');
        $this->form_validation->set_rules('id_group', 'Группа', 'required');
        $this->form_validation->set_rules('school', 'Школа', 'required');
        $this->form_validation->set_rules('password', 'Пароль', 'required');

        if ($this->form_validation->run() === FALSE)
        {
            $data['view'] = 'newuser';
            $this->load->model('Group_m');
            $data['groups'] = $this->Group_m->get_groups();
            $this->load->view('admin/adminHeader', $data);
        }
        else
        {      
            $this->load->model('Users_m');      
            $this->Users_m->set_user();
            redirect('admin/users');
        }
    }
    public function update($val = null)
    {
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('Users_m');
        $email = $this->session->userdata('email');
        $data['role'] = $this->Users_m->role($email);

        $data['title'] = 'Редактирование';
        $data['user'] = $this->Users_m->getUser($val);

        $this->form_validation->set_rules('email', 'email', 'required');
        $this->form_validation->set_rules('name', 'Имя', 'required');
        $this->form_validation->set_rules('lastName', 'Фамилия', 'required');
        $this->form_validation->set_rules('country', 'Страна', 'required');
        $this->form_validation->set_rules('city', 'Город', 'required');
        $this->form_validation->set_rules('school', 'Школа', 'required');
        $this->form_validation->set_rules('class', 'Класс', 'required');
        $this->form_validation->set_rules('password', 'Паспорт', 'required');

        if ($this->form_validation->run() === FALSE)
        {
            $this->load->model('Group_m');
            $data['groups'] = $this->Group_m->get_groups();
            $data['view'] = 'newUser';
            $this->load->view('admin/adminHeader', $data);
        }
        else
        {
            $data1 = array(
                'email' => $this->input->post('email'),
                'name' => $this->input->post('name'),
                'lastName' => $this->input->post('lastName'),
                'country' => $this->input->post('country'),
                'city' => $this->input->post('city'),
                'school' => $this->input->post('school'),
                'class' => $this->input->post('class'),
                'password' => $this->input->post('password'),
                'bloking' => $this->input->post('bloking')
            );
            $data['user']=$this->Users_m->update_user($data1, $val);
            // $data['view'] = 'user';
            // $this->load->view('admin/adminHeader', $data);
            redirect('admin/users');
        }
    }

    public function delete($id)
    {
        $this->load->model('Users_m');
        $this->Users_m->delete($id);
        redirect('admin/users');
    }
}
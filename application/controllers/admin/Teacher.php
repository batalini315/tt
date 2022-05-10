<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Teacher extends CI_Controller 
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
        $data['users'] = $this->Users_m->teacher();
        $email = $this->session->userdata('email');
        $data['role'] = $this->Users_m->role($email);
        $data['title']= "Учителя";
        $data['test']= $this->session->userdata('admin');
        
        $data['view'] = 'teachers';
        $this->load->view('admin/adminHeader', $data);
        
        
    }

    public function new()
    {
        $this->load->helper('form');
        $this->load->library('form_validation');
        
        $data['title'] = 'Новый Учитель';
        $this->load->model('Users_m');
        $email = $this->session->userdata('email');
        $data['role'] = $this->Users_m->role($email);

        $this->form_validation->set_rules('name', 'Имя', 'required');
        $this->form_validation->set_rules('email', 'email', 'required');
        $this->form_validation->set_rules('country', 'Страна', 'required');
        $this->form_validation->set_rules('city', 'Город', 'required');
        $this->form_validation->set_rules('class', 'Класс', 'required');
        $this->form_validation->set_rules('lastName', 'Фамилия', 'required');
        $this->form_validation->set_rules('school', 'Школа', 'required');
        $this->form_validation->set_rules('password', 'Пароль', 'required');

        if ($this->form_validation->run() === FALSE)
        {
            $data['view'] = 'newTeacher';
            $data['user'] = array("id"=>'',"name"=>'',"email"=>'',"country"=>'',"city"=>'',"class"=>'',"lastName"=>'',"school"=>'',"password"=>'');
            $this->load->view('admin/adminHeader', $data);
        }
        else
        {      
            $this->load->model('Users_m');      
            $this->Users_m->set_teacher();
            redirect('admin/teachers');
        }
    }
    public function update($val = null)
    {
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('Users_m');

        $data['title'] = 'Редактирование';
        $data['user'] = $this->Users_m->getUser($val);
        $email = $this->session->userdata('email');
        $data['role'] = $this->Users_m->role($email);

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
            $data['view'] = 'newTeacher';
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
                'password' => $this->input->post('password')
            );
            $id =$val;
            $data['test']=$this->Users_m->update_user($data1, $id);
            // $data['view'] = 'teachers';
            // $this->load->view('admin/adminHeader', $data);
            redirect('admin/teachers');
        }
    }

    public function delete($id)
    {
        $this->load->model('Users_m');
        $this->Users_m->delete($id);
        redirect('admin/teachers');
    }
}
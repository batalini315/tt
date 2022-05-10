<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Task extends CI_Controller 
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
    public function index($val=null)
    {
        $data['title'] = 'Вопросы';
        $data['view'] = 'tasks';
        $this->load->model('Users_m');
        $email = $this->session->userdata('email');
        $data['role'] = $this->Users_m->role($email);
        if($val != null)
        {
            $this->load->model('Tasks_m');
            $data['tasks'] = $this->Tasks_m->get_tasks_group($val);
        }
        else         $data['tasks'] = [];

        $this->load->model('Tests_m');
        $data['tests'] = $this->Tests_m->get_tests();

        $this->load->view('admin/adminHeader', $data);
    }
    
    public function new()
    {
        $this->load->helper('form');
        $this->load->library('form_validation');

        $data['title'] = 'Создание вопроса';
        $this->load->model('Users_m');
        $email = $this->session->userdata('email');
        $data['role'] = $this->Users_m->role($email);

        $this->form_validation->set_rules('id_test', 'Тест', 'required');
        $this->form_validation->set_rules('text', 'Текст', 'required');
        $this->form_validation->set_rules('max_rating', 'Макс рейтинг', 'required');

        if ($this->form_validation->run() === FALSE)
        {
            $this->load->model('Tests_m');
            $data['tests'] = $this->Tests_m->get_tests();
            $data['view'] = 'task';
            $data['task'] = [];
            $this->load->view('admin/adminHeader', $data);
        }
        else
        {
            $data1 = array(
                'id_test' => $this->input->post('id_test'),
                'text' => $this->input->post('text'),
                'max_rating' => $this->input->post('max_rating')
            );
            $this->load->model('Tasks_m');
            $this->Tasks_m->set_task($data1);
            redirect('admin/tasks');
        }
    }
    public function update($val = null)
    {
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('Tasks_m');

        $data['title'] = 'Изменит вопрос';
        $data['task'] = $this->Tasks_m->get_task($val);
        $this->load->model('Users_m');
        $email = $this->session->userdata('email');
        $data['role'] = $this->Users_m->role($email);

        $this->form_validation->set_rules('id_test', 'Тест', 'required');
        $this->form_validation->set_rules('text', 'Текст', 'required');
        $this->form_validation->set_rules('max_rating', 'Макс рейтинг', 'required');

        if ($this->form_validation->run() === FALSE)
        {
            $this->load->model('Tests_m');
            $data['tests'] = $this->Tests_m->get_tests();
            $data['task'] =$this->Tasks_m->get_task($val);
            $data['view'] = 'task';
            $this->load->view('admin/adminHeader', $data);
        }
        else
        {
            $data1 = array(
                'id_test' => $this->input->post('id_test'),
                'text' => $this->input->post('text'),
                'max_rating' => $this->input->post('max_rating')
            );
            $data['task']=$this->Tasks_m->update_task($data1, $val);
            // $data['view'] = 'task';
            // $this->load->view('admin/adminHeader', $data);
            redirect('admin/tasks');
        }
    }

    public function delete($id)
    {
        $this->load->model('Tasks_m');
        $this->Tasks_m->delete($id);
        redirect('admin/tasks');
    }
}
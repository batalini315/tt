<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Test extends CI_Controller 
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
        $data['title'] = 'Тесты';
        $data['view'] = 'tests';
        $email = $this->session->userdata('email');
        $this->load->model('Users_m');
        $data['role'] = $this->Users_m->role($email);
        $this->load->model('Tests_m');
        $data['tests'] = $this->Tests_m->get_tests();
        $this->load->model('Types_m');
        $data['types'] = $this->Types_m->get_types();
        $this->load->view('admin/adminHeader', $data);
    }

    public function new()
    {
        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->load->model('Types_m');
        $data['types'] = $this->Types_m->get_types();
        $this->load->model('Users_m');
        $email = $this->session->userdata('email');
        $data['role'] = $this->Users_m->role($email);

        $data['title'] = 'Создание нового теста';

        $this->form_validation->set_rules('title', 'Название', 'required');
        $this->form_validation->set_rules('type', 'Тип', 'required');
        $this->form_validation->set_rules('time', 'Время', 'required');

        if ($this->form_validation->run() === FALSE)
        {
            
            $data['test']=[];
            $data['view'] = 'test';
            $this->load->view('admin/adminHeader', $data);
        }
        else
        {
            $data1['title'] =  $this->input->post('title');
            $data1['time'] =  $this->input->post('time');
            $data1['type'] =  $this->input->post('type');

            $this->load->model('Tests_m');
            $this->Tests_m->set_test($data1);
            redirect('admin/tests');
        }
    }
    public function update($val = null)
    {
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('Tests_m');

        $data['title'] = 'Изменить тест';
        $data['test'] = $this->Tests_m->get_test($val);
        $this->load->model('Users_m');
        $email = $this->session->userdata('email');
        $data['role'] = $this->Users_m->role($email);

        $this->form_validation->set_rules('title', 'Название', 'required');
        $this->form_validation->set_rules('type', 'Тип', 'required');
        $this->form_validation->set_rules('time', 'Время', 'required');

        if ($this->form_validation->run() === FALSE)
        {
            $this->load->model('Types_m');
            $data['types'] = $this->Types_m->get_types();
            $data['view'] = 'test';
            $this->load->view('admin/adminHeader', $data);
        }
        else
        {            
            $data1 = array(
                'title' => $this->input->post('title'),
                'time' => $this->input->post('time'),
                'type' => $this->input->post('type')
            );
            $data['test']=$this->Tests_m->update_test($data1, $val);
            // $data['view'] = 'test';
            // $this->load->view('admin/adminHeader', $data);
            redirect('admin/tests');
        }
    }

    public function delete($id)
    {
        $this->load->model('Tests_m');
        $this->Tests_m->delete($id);
        redirect('admin/tests');
    }
}
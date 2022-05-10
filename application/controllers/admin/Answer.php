<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php
class Answer extends CI_Controller 
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
            if($role['id_role'] != "1" && $role['id_role'] != "2") 
            print_r ($role);
            // redirect('cabinet');
        }            
    }
    public function index()
    {
        $data['title'] = 'Ответы';
        $data['view'] = 'answers';
        $this->load->model('Answers_m');
        $data['answers']= $this->Answers_m->get_answers();
        $this->load->model('Group_m');
        $data['groups']= $this->Group_m->get_groups();
        $this->load->model('Users_m');
        $email = $this->session->userdata('email');
        $data['role'] = $this->Users_m->role($email);
        
        $this->load->view('admin/adminHeader', $data);
    }
    public function result($test, $user)
    {
        $data['title'] = 'Ответ';
        $data['view'] = 'result';
        $this->load->model('Answers_m');
        $data['answers']= $this->Answers_m->get_user_amswers_test($user, $test);
        $this->load->model('Users_m');
        $email = $this->session->userdata('email');
        $data['role'] = $this->Users_m->role($email);
        
        $this->load->view('admin/adminHeader', $data);
    }

    public function user($id = null)
    {
        $this->load->model('Answers_m');
        // $res = $this->Answers_m->get_user_amswers($id);
        $res= $this->Answers_m->get_count_user_amswers($id);
        $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode($res));
    }
    
    public function create($test)
    {
        // $this->load->helper('form');
        // $this->load->library('form_validation');

        // $data['title'] = 'Создание новой группы';

        // $this->form_validation->set_rules('name', 'Название', 'required');

        // if ($this->form_validation->run() === FALSE)
        // {
        //     $data['view'] = 'answer';
        //     $this->load->view('admin/adminHeader', $data);
        // }
        // else
        // {
            $data =  $this->input->post();
            $this->load->model('Answers_m');
            $this->Answers_m->set_answer($data);
            redirect('user/cabinet');
        // }
    }
    public function update($val = null)
    {
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('Answers_m');

        $data['title'] = 'Новое название группы';
        $data['answer'] = $this->Answers_m->get_answer($val);
        $this->load->model('Users_m');
        $email = $this->session->userdata('email');
        $data['role'] = $this->Users_m->role($email);

        $this->form_validation->set_rules('answer', 'Название', 'required');

        if ($this->form_validation->run() === FALSE)
        {
            $data['view'] = 'answer';
            $this->load->view('admin/adminHeader', $data);
        }
        else
        {
            $data1 = [];
            $ddd =  $this->input->post();
            foreach($ddd as $key => $item)
            {
                $this->Answers_m->update_answer( array('rating'=>$item), $key);
            }
            $id =$val;
            $data['answer']=[];
            // $data['view'] = 'answer';
            // $this->load->view('admin/adminHeader', $data);
            redirect('admin/answers');
        }
    }

    public function delete($id)
    {
        $this->load->model('Answers_m');
        $this->Answers_m->delete($id);
        redirect('admin/answers');
    }
}
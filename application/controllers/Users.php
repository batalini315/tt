<?php
class Users extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->model('Users_m');
                $this->load->helper('url_helper');
        }

        public function index()
        {
                $data['users'] = $this->Users_m->get_users();
                $this->output
                    ->set_content_type('application/json')
                    ->set_output(json_encode($data));
        // $data['title'] = 'News archive';

        // $this->load->view('templates/header', $data);
        // $this->load->view('users/index', $data);
        // $this->load->view('templates/footer');

        }

        public function user($id = NULL)
        {
                $data['user_item'] = $this->news_model->get_users($id);
        }

        public function authenticate()
        {
                $res = [];
                $this->output
                    ->set_content_type('application/json')
                    ->set_output(json_encode($res));
        }
}
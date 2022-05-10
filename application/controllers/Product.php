<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Product extends CI_Controller
{

    public function index()
    {
        $res = '$id';
        $this->load->model('Products_m', 'Prod', TRUE);
        if ($this->input->method() == 'get'){
            $data = $this->input->get();
            if( $this->uri->segment(2) == null) {
                $res= $this->Prod->get_products() ;
            }
            else {
                $res= $this->Prod->get_products($this->uri->segment(2)) ;
            }    
        }
        if ($this->input->method() == 'post'){
            $data = json_decode($this->input->raw_input_stream, true);
            $this->Prod->saveProduct($data);
// $res['id'] = $this->uri->segment(2);
        }
        if ($this->input->method() == 'put'){
            $data = json_decode($this->input->raw_input_stream, true);
            $res = $this->Prod->updateProduct($this->uri->segment(2),$data);
$res['id'] = $this->uri->segment(2);
        }
        if ($this->input->method() == 'delete'){
            $res = $this->Prod->deleteProduct($this->uri->segment(2));
$res['id'] = $this->uri->segment(2);
        }
        
        $this->output
                    ->set_content_type('application/json')
                    ->set_output(json_encode($res));

                    // $this->output->set_header('HTTP/1.0 401 Unauthorized')
                    // ->set_output(json_encode(array('status' => 401, 'code' => 1002, 'message' => 'Invalid email or password')));
    }
}
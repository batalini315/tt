<?php
$dataH['is_ses']=$this->session->has_userdata('email');
// if($dataH['is_ses']) echo "yes"; else echo "NO";
$this->load->view('templates/header',$dataH);
$this->load->view('user/'.$view);
$this->load->view('templates/footer');
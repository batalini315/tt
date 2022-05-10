<?php
$dataH['is_ses']=$this->session->has_userdata('email');
$this->load->view('templates/header',$dataH);
$this->load->view('admin/menu');
$this->load->view('admin/'.$view);
$this->load->view('templates/footer');
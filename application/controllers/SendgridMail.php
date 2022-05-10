<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SendgridMail extends CI_Controller {
	
		public function index()
	{
		$this->load->library('sendgrid/sendgrid_php') ;
		 $this->sendgrid_php->index() ;
	

	}
	}
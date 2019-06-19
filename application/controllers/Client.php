<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Client extends CI_Controller {

	
	public function page1()
	{
        $this->session->message = "coucou";

		$this->load->view('header');
		$this->load->view('page1');
		$this->load->view('footer');
    }
    
    public function page2()
	{
        if ($this->session->user) {
            $this->session->username = 'johndoe';
            $this->session->email = 'johndoe@some-site.com';
            $this->session->logged_in = TRUE;
    
            $this->load->view('header');
            $this->load->view('page2');
            $this->load->view('footer');
        }
        else {
            redirect(site_url("site/login"));
        }

        
	}
}

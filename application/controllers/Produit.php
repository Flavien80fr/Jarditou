<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produit extends CI_Controller {

    public function index() {
        $this->load->view('header');
		$this->load->view('index');
		$this->load->view('footer');
    }

    public function liste() {

        $this->output->enable_profiler(TRUE);

        $data["liste"] = $this->db->query("select * from produits")->result();

        $this->load->view('header');
		$this->load->view('liste', $data);
		$this->load->view('footer');
    }

	
	public function page1()
	{

		$this->load->view('header');
		$this->load->view('page1');
		$this->load->view('footer');
    }
    
    public function page2()
	{
        if ($this->session->user) {
            
    
            $this->load->view('header');
            $this->load->view('page2');
            $this->load->view('footer');
        }
        else {
            redirect(site_url("site/login"));
        }

        
	}
}

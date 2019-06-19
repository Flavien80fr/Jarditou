<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax1 extends CI_Controller {

    

    public function demo() {

        $this->load->view('header');
		$this->load->view('ajax_demo');
		$this->load->view('footer');
    }

	public function cat1() {

        $data["cat1"] = $this->db->query("SELECT * FROM categories WHERE cat_parent IS null")->result();
        
        $this->load->view('ajax_cat1', $data);
    }

    public function cat2($cat_id) {

        $data["cat2"] = $this->db->query("SELECT * FROM categories WHERE cat_parent=?", $cat_id)->result();
        
        $this->load->view('ajax_cat2', $data);
    }
	
}

<?php

//  http://localhost/ci/index.php/Jardiland\formulaire_ajout2 25/04/2019
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax extends CI_Controller {

	public function cat1() {

        $data["cat1"] = $this->db->query("SELECT * FROM categories WHERE cat_parent IS null")->result();
        
        $this->load->view('ajax_cat1', $data);
    }

    public function cat2($cat_id) {

        $data["cat2"] = $this->db->query("SELECT * FROM categories WHERE cat_parent=?", $cat_id)->result();
        
        $this->load->view('ajax_cat2', $data);
    }
}

?>



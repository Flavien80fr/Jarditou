<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Panier extends CI_Controller {

    

    public function liste() {

        $this->load->view('header');
		$this->load->view('panier_liste');
		$this->load->view('footer');
    }

	public function add($id) {

        $pro = $this->db->query("select * from produits where pro_id=?", $id)->row();

        if ($this->session->panier == null) {
            $this->session->panier = array();
        }
        $tab = $this->session->panier;
        if (in_array($pro, $tab) == FALSE) {
            array_push($tab, $pro);
        }
        $this->session->panier = $tab;

        $this->output->enable_profiler(TRUE);

        redirect(site_url("panier/liste"));
    }

    public function clear() {

        $this->session->panier = array();
        

        redirect(site_url("panier/liste"));
    }
	
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produit extends CI_Controller {


	public function index()
	{

    }

    public function ajout()
	{
        $data = $this->input->post();

        if ($data != null) {
            echo "POST";
            print_r($data);
            //$this->load->database();

            // $this->db->query(
            //     "insert into client (cli_nom, cli_prenom, cli_ville) values (?, ?, ?)",
            //     array($data["nom"],$data["prenom"],$data["ville"])
            // );

            $this->db->insert("client", $data);

            //$nom[2]="toto";
            //$requete = "{$nom[2]}";

            //$this->db->query(
            //    "insert into client (cli_nom, cli_prenom, cli_ville) values ( '{$data["nom"]}','{$data["prenom"]}', '{$data["ville"]}'"
            //);
        }
        else {
            $this->load->view("ajout");
        }
    }


    public function ajout2()
	{
        $this->form_validation->set_rules('cli_nom', 'Nom du client', 'required');
        $this->form_validation->set_rules('cli_prenom', 'PrÃ©nom du client', 'required');

        if ($this->form_validation->run() == TRUE) {
            $data = $this->input->post();
            $this->db->insert("client", $data);
        }
        else {
            $this->load->view("ajout2");
        }
    }


}

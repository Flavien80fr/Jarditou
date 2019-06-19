<?php

//  http://localhost/ci/index.php/produits/ajout2
defined('BASEPATH') OR exit('No direct script access allowed');

class Produit extends CI_Controller {


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

            $this->db->insert("produits", $data);

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
echo"toto"; 

$this->load->view("ajout2");

         /*
        $this->form_validation->set_rules('pro_cat_id', 'pro_cat_id', 'required');
        $this->form_validation->set_rules('pro_ref', 'reference', 'required');
        $this->form_validation->set_rules('pro_libelle', 'Nom du libellé', 'required');
        $this->form_validation->set_rules('pro_description', 'Description', 'required');
        $this->form_validation->set_rules('pro_prix', 'Prix', 'required');
        $this->form_validation->set_rules('pro_stock', 'Nom du libellé', 'required');


        if ($this->form_validation->run() == TRUE) {
            $data = $this->input->post();
            $this->db->insert("produits", $data);
        }
        else {
            $this->load->view("ajout2");
        }
		*/
    }


}

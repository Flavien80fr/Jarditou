<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

   public function index()
   {
        $this->load->view('home');
   }

   public function democode()
	{
	   $this->load->helper('form');

	   if ($this->input->post())
	   {
	      // Récupère tout le tableau
	      $aPost = $this->input->post();


	        // Récupérer un champ en particulier
	        $nom = $this->input->post("nom");
	        $login = $this->input->post("login");

	        // Validation
	        $this->load->library('form_validation');

	        // Personnalisation des messages d'erreurs

	        // https://codeigniter.com/user_guide/libraries/form_validation.html#the-controller


	        // Règles de validation
	        $this->form_validation->set_rules('nom', 'toto', 'required');
	        $this->form_validation->set_rules('prenom', 'Prénom', 'required', array('required' => 'Le %s doit être renseigné.'));

	        if ($this->form_validation->run() == false)
	        {

	           // On réaffiche le formulaire
	           $this->load->view('formulaire');
	        }
	        else
	        {
	           // Si OK, on redirige où souhaité
	           redirect("home");
	        }
	   }
	   else
	   {
	      // Pas posté, on affiche le formulaire pour saisie
	      $this->load->view('formulaire');
	   }
	}
}

/* --------------------------------------------------------

   - Construction du formulaire
   - Chargement des helpers et librairies
   - Gestion des POST avec $this->input->post et $this->input->post("champ")
   - Validation
   - Redirection, affichage des erreurs

   -------------------------------------------------------- */

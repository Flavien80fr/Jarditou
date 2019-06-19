<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Upload extends CI_Controller
{
   public function index()
   {
    	   // $this->load->helper('form');
    	   $this->load->library('form_validation');

    	  lastInsertId();




    	   $this->db->insert_id();

    	   if ($this->input->post())
    	   {
        	   // Chargement de la librairie 'Upload'


        	   // Fichiers type images
        	   // On créé un tableau de configuration pour l'upload
        	   $config['upload_path'] = './assets/photos/'; // chemin où sera stocké le fichier
        	   $config['file_name'] = 'maphoto.jpg'; // nom du fichier final
        	   $config['allowed_types'] = 'gif|jpg|png'; // Types autorisés (ici des images)

        	   /*
        	   // Limites de poids, dimensions etc.
        	   $config['max_size'] = '100';
            $config['max_width'] = '1024';
            $config['max_height'] = '768';
        	   */

        	   /* Fichiers type document
        	   // On créé un tableau de configuration pour l'upload
        	   $config['upload_path'] = './assets/docs/'; // chemin où sera stocké le fichier
        	   $config['file_name'] = 'mondoc.docx'; // nom du fichier final
        	   $config['allowed_types'] = 'doc|docx|pdf'; // Types autorisés (ici des images)
        	   */

        	   $this->load->library('upload', $config);

        	   // Attention, sans la méthode initialize() on obtient le message d'erreur :
        	   // '<p>The upload path does not appear to be valid.</p>'
        	   $this->upload->initialize($config);


        	   // On charge la librairie 'upload' de CodeIgniter en lui envoyant la config

        	   // La méthode do_upload() effectue les validations sur l'attribut HTML 'name'
        	   // ('fichier' dans notre formulaire)
        	   // si OK, renomme et déplace le fichier tel que configuré
        	   if ( ! $this->upload->do_upload('fichier'))
        	   {
        	       // Echec, captation des erreurs, style par défaut entouré de '<p>'
        	       // $sErreurs = $this->upload->display_errors();

        	       // Echec, captation des erreurs, style personnalisé (ici Alert Bootstrap)
        	       $sErreurs = $this->upload->display_errors("<div class='alert alert-danger'>", "</div>");

        	       // Réaffiche le formulaire en passant les erreurs
        	       $aView["sErreurs"] = $sErreurs;

        	       // Récupérer les informations du fichier
        	       $info = array('upload_data' => $this->upload->data());

        	       var_dump($info);

        	       $this->load->view('upload', $aView);
        	   }
        	   else
        	   { // Succès, on redirige
        	       redirect('upload/display');
        	   }
    	   }
    	   else
    	   {
    	      // Affichage du formulaire
    	      $this->load->view('upload');
    	   }
	} // -- index()

	public function display()
	{
	   $this->load->view("display");
	} // -- display_photos()
} // -- classe Upload

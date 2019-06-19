<?php

//  http://localhost/ci/index.php/Jardiland\formulaire_ajout2 25/04/2019
defined('BASEPATH') OR exit('No direct script access allowed');

class Jardiland extends CI_Controller {

/**
* \ brief     Methode qui affiche la liste des produits
* \ $results  lecture de la base de données des produits
* \ $aListe2  Récuperation du resultat produit
* \ $aView    affiche la liste des produits
* \ auteur    flavien fregnac
* \ date      vendredi 26 avril 2019
*/
//  http://localhost/ci/index.php/Jardiland/liste_produits
    public function liste_produits()
    {
        // Charge la librairie 'database'
        $this->load->database();

        // Exécute la requête
        $results = $this->db->query("SELECT * FROM produits ORDER BY pro_id ASC");

        // Récupération des résultats
        $aListe2 = $results->result();

        // Ajoute des résultats de la requête au tableau des variables à transmettre à la vue
        $aView["liste_produits"] = $aListe2;

        // Appel de la vue avec transmission du tableau
        $this->load->view('liste_produits', $aView);
    }

    /**
    * \ brief     Methode qui affiche le formulaire de VISUALISATION
    * \ $aListeC  liste des catégories dans le model
    * \ $aView    affiche la liste des catégories
    * \ $pro_id   index retourner par la liste des produits
    * \ $results  lecture de la base de données produits par le $pro_id
    * \ $aListe2  recupération du resultat produit
    * \ auteur    flavien fregnac
    * \ date      vendredi 26 avril 2019
    */
//  http://localhost/ci/index.php/Jardiland/formulaire_visualisation
    public function formulaire_visu($pro_id)
    {
      // Charge la librairie 'database categorie'
      $this->load->model('categories_model');
      $aListeC = $this->categories_model->liste_categorie();
      $aView["liste_categorie"] = $aListeC;

      // Charge la librairie 'database produits'
      $this->load->database();
      // Exécute la requête
      $results = $this->db->query("SELECT * FROM produits WHERE pro_id = $pro_id");
      // Récupération des résultats
      $aListe2 = $results->row();
      // var_dump($aListe2);

      $aView["formulaire_visu"] = $aListe2;

      $this->load->view("formulaire_visu", $aView);

    }

//  http://localhost/ci/index.php/Jardiland/formulaire_ajout
    public function formulaire_ajout()
	{
      // Charge la librairie 'database categorie'
      $this->load->model('categories_model');
      $aListeC = $this->categories_model->liste_categorie();
      $aView["liste_categorie"] = $aListeC;

        // var_dump($aListeC);

        //$this->form_validation->set_rules('pro_cat_id', 'categorie', 'required',
        //array('required' => 'La %s est obligatoire'));
        $this->form_validation->set_rules('pro_ref', 'référence', 'required',
        array('required' => 'La %s est obligatoire'));
        $this->form_validation->set_rules('pro_libelle', 'Nom du libellé', 'required',
        array('required' => 'Le %s est obligatoire'));
        $this->form_validation->set_rules('pro_description', 'Description', 'required',
        array('required' => 'La %s est obligatoire'));
        $this->form_validation->set_rules('pro_prix', 'Prix', 'required',
        array('required' => 'Le %s est obligatoire'));
        $this->form_validation->set_rules('pro_stock', 'Stock', 'required',
        array('required' => 'le %s est obligatoire'));
        $this->form_validation->set_rules('pro_couleur', 'Couleur', 'required',
        array('required' => 'le %s est obligatoire'));
    //    $this->form_validation->set_rules('pro_bloque', 'Produit bloqué ou non bloqué', 'required',
    //    array('required' => 'le %s est obligatoire'));

        if ($this->form_validation->run() == TRUE)
        {
            $data = $this->input->post();
            $this->db->insert("produits", $data);
            redirect('Jardiland/liste_produits');
        }
        else
        {
            $this->load->view("formulaire_ajout", $aView);
              // var_dump($aView);
        }
    }


//  http://localhost/ci/index.php/Jardiland/formulaire_modification.php?pro_id=10
    public function formulaire_modif($pro_id)
{

  // Charge la librairie 'database categorie'
  $this->load->model('categories_model');
  $aListeC = $this->categories_model->liste_categorie();
  $aView["liste_categorie"] = $aListeC;

  if ($this->input->post())
  {
      $data = $this->input->post();
      $this->db->where('pro_id', $pro_id);
      $this->db->update('produits', $data);

      redirect('Jardiland/liste_produits');
  }
  else
   {
    //  $aListe = $this->db->query("SELECT * FROM produits WHERE id= ?", array($id));
      $results = $this->db->query("SELECT * FROM produits WHERE pro_id = $pro_id");

      $aView["formulaire_modif"] = $results->row(); // première ligne du résultat
      $aView["pro_id"] = $pro_id;
      $this->load->view('formulaire_modif', $aView);
   }
 }

    public function formulaire_suppression($pro_id)
    {
      // prepare le get de la base
      $data = $this->input->get();
      // charge le pro_id de la base
      $pro_id = $this->input->get("pro_id");
      // preparation de la requete sur le pro_id
      $this->db->where('pro_id',$pro_id);
      // requete de suppression
      $this->db->delete('produits', $data);

      redirect('liste_produits');
    }

    public function photo()
     {
      	   // $this->load->helper('form');
      	   $this->load->library('form_validation');

      	  //lastInsertId();

      	   $this->db->insert_id();

      	   if ($this->input->post())
      	   {
          	   // Chargement de la librairie 'Upload'


          	   // Fichiers type images
          	   // On créé un tableau de configuration pour l'upload
          	   $config['upload_path'] = './assets/photos/'; // chemin où sera stocké le fichier
          	   $config['file_name'] = '$maphoto.jpg'; // nom du fichier final
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


    public function test_photo()
    {
       // Chargement de la librairie 'Upload'
       $this->load->library('upload');

        // On créé un tableau de configuration pour l'upload
        $config['upload_path'] = './assets/photos/'; // chemin où sera stocké le fichier
        $config['upload_path'] = '1.jpg'; // nom du fichier final
        $config['allowed_types'] = 'gif|jpg|png'; // Types autorisés (ici pour des images)

        // On charge la librairie 'upload' de CodeIgniter en lui envoyant la config
        $this->load->library('upload', $config);

        // La méthode do_upload() effectue les validations sur l'attribut HTML 'name' ('fichier' dans notre formulaire) et si OK renomme et déplace le fichier tel que configuré
        if ( ! $this->upload->do_upload('fichier'))
        {
            // Echec,  on réaffiche le formulaire
            $this->load->view('jardiland/formulaire_ajout');
        }
        else
        { // Succès, on redirige sur la liste
            redirect('jardiland/liste_produits');
        }
     }

     //  http://localhost/ci/index.php/Jardiland/formulaire_modification.php?pro_id=10
/*
         public function formulaire_modif1($pro_id)
         {
           // Charge la librairie 'database'
           $this->load->library('categories');
           $aListeC = $this->categories->liste_categorie();
           $aView["liste_produit"] = $aListeC;


             $this->load->database();
             $liste = $this->db->query("SELECT * FROM produits WHERE id= ?", $pro_id);
             $model["produits"] = $liste_produits->row(); // première ligne du résultat
             $this->load->view('modif', $model);
         }
*/

}

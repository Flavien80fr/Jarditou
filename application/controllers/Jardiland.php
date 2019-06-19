<?php

//  http://localhost/ci/index.php/Jardiland\formulaire_ajout2 25/04/2019
defined('BASEPATH') OR exit('No direct script access allowed');

class Jardiland extends CI_Controller {

    public function inscription()
	{
        $regex_mail  = "^[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-
        ]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[az0-9])?";
        $regex_alpha = "/^['a-z','A-Z]";

        

        if ($data = $this->input->post()) 
        {   var_dump($data);
          $this->form_validation->set_rules('nom','Nom','required|alpha', array('required' => 'Champs Nom non rempli'));
          $this->form_validation->set_rules('prenom','prénom','required|alpha', array('required' => 'Prénom champs non rempli'));
          $this->form_validation->set_rules('email','email','required|valid_email', array('required' => 'Email champs non rempli'));
          $this->form_validation->set_rules('secret','secret','required|alpha_numeric', array('required' => 'Password champs non rempli'));
         
         // $this->form_validation->set_rules('secret','votre password','obligatoire');
         // $this->form_validation->set_rules( 'passconf' ,  'Confirmation du mot de passe' ,  'trim | required | correspond à [mot de passe]' ); 

          if ($this->form_validation->run() == TRUE)
              {

            $data["secret"] = password_hash($data["secret"], PASSWORD_DEFAULT);

            $this->db->insert("user", $data);

            redirect(site_url("jardiland/login")); 
              }
           else
           {
            $this->load->view('header');
            $this->load->view('inscription');
            $this->load->view('footer');   
           }   
        }
        else 
        {
            $this->load->view('header');
            $this->load->view('inscription');
            $this->load->view('footer');
        }
    }


    public function login()
	{

        $regex_email = "/^['a-z']";
        $regex_motpa = "/^['a-z']";
        //$regex_mail .= "([a-z0-9+!*(),;?&=\$_.-]+(\:[a-z0-9+!*(),;?&=\$_.-]+)?@)?"; // User and Pass 
        $regex_mail  = "^[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-
         ]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[az0-9])?";

        if ($data = $this->input->post()) {

          //  preg_match('/(a)(b)*(c)/', $email, $matches);
          //  var_dump($matches);
          //  preg_match('/(a)(b)*(c)/', $email, $matches, PREG_UNMATCHED_AS_NULL);

       //  var_dump($data);

            $email = $data["email"];
            $password = $data["secret"];

         //       $this-> form_validation -> set_message ('email_check', 'Adresse email incorrecte'); return true;

           if (!preg_match(regex_mail, $email)) { echo 'INCORRECT'; }
           else { redirect(site_url("jardiland/liste_produits")); }
                
            $user = $this->db->query("select * from user where email=?", $email)->row();
            
           // $result=$user->row();
            if ($user) {
                if (password_verify($password, $user->secret)) {
                   
                    $this->session->user = $user;
                    $this->session->message = "OK";
                    redirect(site_url("jardiland/liste_produits"));
                }
                else {
                    $this->session->user = null;
                    $this->session->message = "Mot de passe incorrect";
                    redirect(site_url("jardiland/login"));
                }
            }
            else {
                $this->session->user = null;
                $this->session->message = "Problème email";
                redirect(site_url("jardiland/login"));
            }
           
        }
        else {
            $this->load->view('header');
            $this->load->view('login');
            $this->load->view('footer');
        }
    }
    
    public function logout()
	{
        $this->session->user = null;
        $this->session->message = null;
        redirect(site_url("jardiland/login"));
    }

    public function test()
	{

        $h = password_hash("titi", PASSWORD_DEFAULT);

        echo $h . "<hr>" . password_verify("toto", $h);
    }
    

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

      $this->load->library('session');

        // Charge la librairie 'database'
        $this->load->database();

        // Exécute la requête
        $results = $this->db->query("SELECT * FROM produits ORDER BY pro_id ASC");

        // Récupération des résultats
        $aListe2 = $results->result();

        // Ajoute des résultats de la requête au tableau des variables à transmettre à la vue
        $aView = [];
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

// ------------------------ ajout photos     

          $config['upload_path'] = FCPATH .'/assets/photos/'; // chemin où sera stocké le fichier
          $config['file_name'] =  '.jpg'; // nom du fichier final
          $config['allowed_types'] = 'gif|jpg|png'; // Types autorisés (ici des images)
          $config['overwrite'] = TRUE;
          $this->load->library('upload', $config);
          $this->upload->initialize($config);
  
          if (!$this->upload->do_upload('pro_photo'))
          {
            $this->load->view('formulaire_ajout');
          }
          else
          {
          redirect('Jardiland/liste_produits');
        //  }
          }
          
// -------------------------  else

        // var_dump($aListeC);

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
           if (isset($cat2)) redirect('Jardiland/liste_produits');
            
            unset($cat1); unset($cat2);
            $data = $this->input->post();
            $this->db->insert("produits", $data);
            redirect('Jardiland/liste_produits');
        }
        else
        {
         //   $this->load->view("formulaire_ajout", $aView);
              // var_dump($aView);
        }
    }


//  http://localhost/ci/index.php/Jardiland/formulaire_modification.php?pro_id=10
    public function formulaire_modif($pro_id)
{
  //  $this->output->enable_profiler(TRUE); debogger

    // Charge la librairie 'database categorie'
    $this->load->model('categories_model');
    $aListeC = $this->categories_model->liste_categorie();
    $aView["liste_categorie"] = $aListeC;

    if ($this->input->post())
    {
        $data = $this->input->post();
        $this->db->where('pro_id', $pro_id);
        $this->db->update('produits', $data);

        $config['upload_path'] = FCPATH .'/assets/photos/'; // chemin où sera stocké le fichier
        $config['file_name'] =  $pro_id.'.jpg'; // nom du fichier final
        $config['allowed_types'] = 'gif|jpg|png'; // Types autorisés (ici des images)
        $config['overwrite'] = TRUE;
        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        if (!$this->upload->do_upload('pro_photo'))
        {
          $this->load->view('formulaire_modif');
        }
        else
        {
        redirect('Jardiland/liste_produits');
      //  }
        }
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


    public function formulaire_suppr($pro_id, $pro_photo)
    {
       // On arrive du formulaire de confirlmation
       //if ($this->input->post())
       //{
         // prepare le get de la base
         ///$data = $this->input->post();
         // charge le pro_id de la base
         //$pro_id = $this->input->post("pro_id");
         // preparation de la requete sur le pro_id

         $path = FCPATH.'assets/photos/'.$pro_id.'.'.$pro_photo;
         unlink($path);

         $this->db->where('pro_id',$pro_id);
         // requete de suppression
         //$this->db->delete('produits', $data);
          $this->db->delete('produits');


         redirect('Jardiland/liste_produits');
       //}
       //else
       //{ // on affiche d'abord le formulaire
      //      $this->load->view("formulaire_suppr");
       //}

    }

    public function display()
    {
       $this->load->view("display");
    } // -- display_photos()

    public function photo()
     {
      	   // $this->load->helper('form');
      	   $this->load->library('form_validation');

      	  //lastInsertId();

      	   $this->db->insert_id();

      	   if ($this->input->post())
      	   {
          	   // Chargement de la librairie 'Upload'
                $this->load->library('upload');

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

      public function liste() {
  
        $this->load->view('header');
        $this->load->view('panier_liste');
        $this->load->view('footer');
      }
                                                                                                                               
     public function add($id) {
  
          $pro = $this->db->query("select * from produits where pro_id=?", $id)->row();
          $pro->quantite=1;
  
          if ($this->session->panier == null) {
              $this->session->panier = array();
          }
          $tab = $this->session->panier;
          if (in_array($pro, $tab) == FALSE) {
              array_push($tab, $pro);
          }
          $this->session->panier = $tab;
  
          //$this->output->enable_profiler(TRUE);
  
          redirect("jardiland/liste");
      }
  
      public function clear() {
  
          $this->session->panier = array();
          
  
          redirect(site_url("jardiland/liste"));
      }
     

     public function creationpanier()
     {
      if (!isset($_SESSION['panier']))
      {
     $_SESSION['panier']=array();
     $_SESSION['panier']['libelleProduit'] = array();
     $_SESSION['panier']['qteProduit'] = array();
     $_SESSION['panier']['prixProduit'] = array();
     $_SESSION['panier']['verrou'] = false;
      }
  return true;
     }

     function ajouterArticle($libelleProduit,$qteProduit,$prixProduit)
     {

        //Si le panier existe
        if (creationPanier() && !isVerrouille())
        {
           //Si le produit existe déjà on ajoute seulement la quantité
           $positionProduit = array_search($libelleProduit,  $_SESSION['panier']['libelleProduit']);

           if ($positionProduit !== false)
           {
              $_SESSION['panier']['qteProduit'][$positionProduit] += $qteProduit ;
           }
           else
           {
              //Sinon on ajoute le produit
              array_push( $_SESSION['panier']['libelleProduit'],$libelleProduit);
              array_push( $_SESSION['panier']['qteProduit'],$qteProduit);
              array_push( $_SESSION['panier']['prixProduit'],$prixProduit);
           }
        }
        else
        echo "Un problème est survenu veuillez contacter l'administrateur du site.";
     }

     function supprimerArticle($libelleProduit){
        //Si le panier existe
        if (creationPanier() && !isVerrouille())
        {
           //Nous allons passer par un panier temporaire
           $tmp=array();
           $tmp['libelleProduit'] = array();
           $tmp['qteProduit'] = array();
           $tmp['prixProduit'] = array();
           $tmp['verrou'] = $_SESSION['panier']['verrou'];

           for($i = 0; $i < count($_SESSION['panier']['libelleProduit']); $i++)
           {
              if ($_SESSION['panier']['libelleProduit'][$i] !== $libelleProduit)
              {
                 array_push( $tmp['libelleProduit'],$_SESSION['panier']['libelleProduit'][$i]);
                 array_push( $tmp['qteProduit'],$_SESSION['panier']['qteProduit'][$i]);
                 array_push( $tmp['prixProduit'],$_SESSION['panier']['prixProduit'][$i]);
              }

           }
           //On remplace le panier en session par notre panier temporaire à jour
           $_SESSION['panier'] =  $tmp;
           //On efface notre panier temporaire
           unset($tmp);
        }
        else
        echo "Un problème est survenu veuillez contacter l'administrateur du site.";
     }

     function modifierQTeArticle($libelleProduit,$qteProduit){
   //Si le panier éxiste
   if (creationPanier() && !isVerrouille())
   {
      //Si la quantité est positive on modifie sinon on supprime l'article
      if ($qteProduit > 0)
      {
         //Recharche du produit dans le panier
         $positionProduit = array_search($libelleProduit,  $_SESSION['panier']['libelleProduit']);

         if ($positionProduit !== false)
         {
            $_SESSION['panier']['qteProduit'][$positionProduit] = $qteProduit ;
         }
      }
      else
      supprimerArticle($libelleProduit);
   }
   else
   echo "Un problème est survenu veuillez contacter l'administrateur du site.";
}

     public function liste_panier()
     {

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

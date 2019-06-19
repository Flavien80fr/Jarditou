
<?php
//  http://localhost/ci/index.php/produits1/liste1

defined('BASEPATH') OR exit('No direct script access allowed');

class Produits1 extends CI_Controller {

public function liste1()
 {
     // Déclaration du tableau associatif à tranmettre à la vue
     $aView = array();

     // Dans le tableau, on créé une donnée 'prénom' qui a pour valeur 'Dave'
     $aView["prenom"] = "Dave";
     $aView["nom"] = "Loper";
     // On crée un sous-tableau "aProduits" dans le tableau aView
     $aView["aProduits"]=["Aramis","Athos","Clatronic","Camping","Green"];

     // On passe le tableau en second argument de la méthode
     $this->load->view('liste1', $aView);
 }
}

?>

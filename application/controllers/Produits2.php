
<?php
//  http://localhost/ci/index.php/produits2/liste2

defined('BASEPATH') OR exit('No direct script access allowed');

class Produits2 extends CI_Controller {

  public function liste2()
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
      $this->load->view('liste2', $aView);
  }
}

?>

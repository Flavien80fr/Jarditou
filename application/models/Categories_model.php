<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categories_model extends CI_Model
{
  public function liste_categorie()
  {
    $this->load->database();

    // Exécute la requête
    $resultC = $this->db->query("SELECT * FROM categories");
    // Récupération des résultats
    $aListeC = $resultC->result();

    return $aListeC;
  }
}
?>

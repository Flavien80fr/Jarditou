
<?php
//  http://localhost/ci/index.php/controller1/exemple1

public function liste()
{
    // Déclaration du tableau associatif à tranmettre à la vue
    $aView = array();

    // Dans le tableau, on créé une donnée 'prénom' qui a pour valeur 'Dave'
    $aView["prenom"] = "Dave";

    // On passe le tableau en second argument de la méthode
    $this->load->view('liste', $aView);

?>

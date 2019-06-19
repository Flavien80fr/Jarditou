

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Liste des produits</title>
</head>
<body>
<h1>Liste des produits</h1>

<?php
echo "<table border=5 bgcolor=#4EA9A0";
foreach ($liste_produits as $row)
{
  echo"<tr>";
  echo"<td>".$row->pro_id."</td>";
  echo"<td>".$row->pro_ref."</td>";
  echo"<td>".$row->pro_libelle."</td>";
  echo"<td>".$row->pro_libelle."</td>";
  echo"<td>".$row->pro_description."</td>";
  echo "</tr>";
}
echo "</table>";
?>
</body>
</html>

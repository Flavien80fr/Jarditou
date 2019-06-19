$(document).ready(function() {
  $("#formulaire_visu_delete").click(function()
  {
      var r = confirm("Confirmer la suppression de ce produit ?");

     if (r == true) {
          return true;
     } else {
          return false;
    }
  });
});

<h1>Formulaire insertion produit</h1>

<form action="">

<select name="cat1" id="cat1">
    
</select>

<br>

<select name="cat2" id="cat2">
    <option value="">...</option>
</select>

</form>

<script>
    $("#cat2").hide();
    $("#cat1").load("http://127.0.0.1/index.php/ajax/cat1");
    
    $("#cat1").change(function() {
        $("#cat2").show();
        let cat_id = $("#cat1").val();
        $("#cat2").load("http://127.0.0.1/index.php/ajax/cat2/" + cat_id);
    });
</script>
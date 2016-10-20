<!DOCTYPE html>
<html>
    <head>
        <title>exo3</title>
        <link rel="stylesheet" href="style.css" />

    </head>
    <body>
    <?php
    $nomErr = $ageErr = $age1Err= $nom1Err = "";
    $nom = $nom1 = $age = $age1= "";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["nom"]))
    {
      $nomErr = "name is required";
    }else{
    $nom = test_input($_POST["nom"]);
    if (!preg_match("/^[a-zA-Z ]*$/",$destination)) {
      $nomErr = "Only letters and white space allowed"; 
  }
}
  if (empty($_POST["age"]))
    {
$ageErr = "a number place is required";
    }else{
    $age = test_input($_POST["age"]);
    if (!preg_match("/^[1-10]*$/",$age)) {
      $ageErr = "Only numbers 1-10"; 
  }
}
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
        <p>
        <H1> Détail Reservation </H1>
<<<<<<< HEAD
        <form method ="post" action="<?php echo CFG_FORM_ACTION; ?>?stage=<?php echo CFG_STAGE_ID+1; ?>">
        Nom : 
        <input type="text" name="nom" value="<?php echo $nom;?>"/> </p>
                <p>Age : 
                <input type="text" name="age" value="<?php echo $age;?>"/> </p>
                <p> Nom :
                <input type="text" name="nom1" value="<?php echo $nom1;?>"/> </p>
                <p>Age : 
                <input type="text" name="age1" value="<?php echo $age1;?>"/> </p>
				<input type="submit" name ="Next" value= "Retour" />
                <input type="submit" name ="Next1" value= "Suivant" />
				<input type="submit" name ="Cancel" value= "Annuler" />
=======
        <form method ="post">
        		<p>Nom : 
				<input type="text" name="nom" /> </p>
				<p>Age : 
				<input type="text" name="age" /> </p>
				<p>Nom : 
				<input type="text" name="nom1" /> </p>
				<p>Age : 
				<input type="text" name="age1" /> </p>
				<input type="submit" value= "Next" />
				<input type="submit" value= "Cancel" />
				<input type="submit" value= "Return" />
>>>>>>> 1d7acb4ecc54407c1cf31c0715d2f4a8ce1e61c1
				</form>
        	</p>
    </body>
</html>


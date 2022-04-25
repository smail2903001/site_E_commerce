<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="style.css" />
</head>
<body>
<?php
require('config.php');
if (isset($_REQUEST['username'], $_REQUEST['email'], $_REQUEST['password'])){
	// récupérer le nom d'utilisateur et supprimer les antislashes ajoutés par le formulaire
	$username = stripslashes($_REQUEST['username']);
	$username = mysqli_real_escape_string($conn, $username); 
	// récupérer l'email et supprimer les antislashes ajoutés par le formulaire
	$email = stripslashes($_REQUEST['email']);
	$email = mysqli_real_escape_string($conn, $email);
	// récupérer le mot de passe et supprimer les antislashes ajoutés par le formulaire
	$password = stripslashes($_REQUEST['password']);
	$password = mysqli_real_escape_string($conn, $password);
	//requéte SQL + mot de passe crypté
    $query = "INSERT into `user` (username, email, password)
              VALUES ('$username', '$email', '".hash('sha256', $password)."')";
	// Exécute la requête sur la base de données
    $res = mysqli_query($conn,$query);
    if($res){
       echo "<div class='sucess'>
             <h3>Vous êtes inscrit avec succès.</h3>
             <p>Cliquez ici pour vous <a href='login.php'>connecter</a></p>
			 </div>";
    }
}else{
?>
<form id="form" class="box" action="" method="post">
	<h1 class="box-logo box-title"><a href="../index.php">Livres Chtayba</a></h1>
    <h1 class="box-title">S'inscrire</h1>
	
	<input type="text" class="box-input" id="nom" name="username" placeholder="Nom d'utilisateur" required />
	<span id="msgName"></span><br><br>
    
	<input type="email" class="box-input" name="email"  placeholder="Email" required /><br><br><br>
    
	<input type="password" id="password" class="box-input" name="password" placeholder="Mot de passe" required />
	<span id="msgPass"></span><br><br>
    
	<input type="password" id="rePassword" class="box-input" name="rePassword" placeholder="Confirmer Mot de passe" required />
	<span id="msgRePass"></span><br><br>
    
	<input type="submit" name="submit" value="S'inscrire" class="box-button" />
    <p class="box-register">Déjà inscrit? <a href="login.php">Connectez-vous ici</a></p>
	<script src="script.js"></script>
</form>
<?php } ?>
</body>
</html>
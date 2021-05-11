<!DOCTYPE html>
<html lang="fr">

	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<title>Maxime Hauet Portfolio</title>
		<link rel="stylesheet" type="text/css" href="./css/index.css">
		<!-- JQuery-->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<!-- bootstrap css-->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

		<!-- bootstrap javascript-->
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
		<link rel="icon" type="image/png" href="./Img/star.svg">
		<link rel="stylesheet"  href="./Style/global.css">
		
	</head>

<body class="mt-5 pt-5" style="background-color: #D7E4E8;">

	
	<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top" id="ancre_contact">
		<div class="container-fluid">
			<span class="navbar-brand user-select-none"><h2 style="font-family: Arial;">Maxime Hauet</h2></span>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			  </button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav me-auto mb-2 mt-2 mx-auto">
				  <li class="nav-item">
					<a class="nav-link navbar-text" aria-current="page" href="./index.html"><h2>Accueil</h2></a>
				  </li>
				  <li class="nav-item">
					<a class="nav-link " aria-current="page" href="./cv_portfolio.html"><h2>CV</h2></a>
				  </li>
				  <li class="nav-item">
					<a class="nav-link " aria-current="page" href="./realisation.html"><h2>Réalisations</h2></a>
				  </li>
				  <li class="nav-item">
					<a class="nav-link " aria-current="page" href="./contact.php" style="color: red;"><h2>Contact</h2></a>
				  </li>
				</ul>  
			</div>

		</div>

	</nav>


	<!--<div class="contact">
<h1 style="text-align: center">Contact</h1>
	<address>
	<p class="lien_contact"><b>Cliquez <a href='https://mail.google.com/mail/u/0/#inbox?compose=CllgCKCBBkFHhxFRLhSSPRBfZBJLTsTrwJCjmXrjDGXlPpXGlFjNxxDVVflzwvrwqzbLTxmlCrg' target="_blank">ici</a> pour me contacter par mail</b></p>
	</address>

	</div>-->

		
	<div class="container mb-5 mt-5">
		<div class="row">
			<div class="col-2 col-md-3 col-lg-4 col-xxl-4"></div>
			<div class="col-10 col-md-9 col-lg-8 col-xxl-4"><h1><b>Formulaire de contact</b></h1></div> 
		</div>
		<?php
/* Page: contact.php */

$VotreAdresseMail="maximehauet1@gmail.com";//mettez ici votre adresse mail

if(isset($_POST['envoyer'])) { // si le bouton "Envoyer" est appuyé
    //on vérifie que le champ mail est correctement rempli
    if(empty($_POST['email'])) {
        echo "Le champ mail est vide";
		
    } else {
        //on vérifie que l'adresse est correcte
        if(!preg_match("#^[a-z0-9_-]+((\.[a-z0-9_-]+){1,})?@[a-z0-9_-]+((\.[a-z0-9_-]+){1,})?\.[a-z]{2,}$#i",$_POST['email'])){
            echo "L'adresse mail entrée est incorrecte";
			
        }else{
            //on vérifie que le champ sujet est correctement rempli
            if(empty($_POST['name'])) {
                echo "Le champ sujet est vide";
				
            }else{
                //on vérifie que le champ message n'est pas vide
                if(empty($_POST['msg'])) {
                    echo "Le champ message est vide";
					
                }else{
					
                    //tout est correctement renseigné, on envoi le mail
                    //on renseigne les entêtes de la fonction mail de PHP
                    $Entetes = "MIME-Version: 1.0\r\n";
                    $Entetes .= "Content-type: text/html; charset=UTF-8\r\n";
                    $Entetes .= "From: maximery15160@gmail.com <".$_POST['email'].">\r\n";//de préférence une adresse avec le même domaine de là où, vous utilisez ce code, cela permet un envoie quasi certain jusqu'au destinataire
                    $Entetes .= "Reply-To: maximery15160@gmail.com <".$_POST['email'].">\r\n";
                    //on prépare les champs:
                    $Mail=$_POST['email']; 
                    $Sujet = '=?UTF-8?B?'.base64_encode($_POST['name']).'?=';  //Cet encodage (base64_encode) est fait pour permettre aux informations binaires d'être manipulées par les systèmes qui ne gèrent pas correctement les 8 bits (=?UTF-8?B? est une norme afin de transmettre correctement les caractères de la chaine)

					$Sujet = "Portfolio: ".$Sujet;
					$Message=htmlentities($_POST['msg'],ENT_QUOTES,"UTF-8");//htmlentities() converti tous les accents en entités HTML, ENT_QUOTES Convertit en + les guillemets doubles et les guillemets simples, en entités HTML
                   
					$Message="<html><body>".$Message."</body></html>";
					//en fin, on envoi le mail
                    $test = mail($VotreAdresseMail,$Sujet,nl2br($Message),$Entetes);//la fonction nl2br permet de conserver les sauts de ligne et la fonction base64_encode de conserver les accents dans le titre
                        
						
						
                        
                    
                }
            }
        }
    }
}
?>
		<div class="row">
			<div class="col-xl-2 col-xxl-2"></div>
			<form method="post" class="col-xl-8 col-xxl-8">
				
				<div class="form-floating mb-3">
					
					<input class="form-control" id="name" type="text" name="name" placeholder="." required>
					<label for="name">Nom </label><br>
				</div>


				<div class="form-floating mb-3">
					
					<input class="form-control" id="email" type="email" name="email" placeholder="." required>
					<label for="email">e-mail </label><br>
				</div>
				<div class="form-floating mb-3">
					
					<textarea id="msg" name="msg" class="form-control" placeholder="." style="height: 100px;" required></textarea>
					<label for="msg">Message </label><br>
				</div>
				<div class="row">
					<div class="col-3 col-md-4 col-xxl-4"></div>
					
					<div class="col-3 col-md-2 col-xxl-2 px-3 px-md-5 px-xxl-3"><input class="btn btn-primary" type="submit" name="envoyer" value="Envoyer" onClick="<?php 
					if(isset($test) && $test == 1) {
						echo "alert('Le mail a été envoyé avec succès!')";
						
						
					}
					 
					?>"></div>
					<div class="col-3 col-xxl-2 "><input class="btn btn-danger" type="reset" name="Réinitilaiser"></div>
					<div class="col-12 text-center"><?php 
					if(isset($test) && $test == 1) {
						echo "<br><h5>Le mail a été envoyé avec succès!</h5>";
						
						
					}
					 
					?></div>
				</div>

				
			</form>
			
		</div>
	</div>
	
	<div class="container mb-5 pb-5">
		<div class="row justify-content-md-center">

			<div class="col-3 col-md-1 col-xxl-2"></div>
			<div class="col-4 col-xxl-4"><b><h1>Informations</h1></b></div>
			
			<div class="row justify-content-center">
				
				
					<div class=" col-sm-1 col-md-3 col-xl-4 col-xxl-4"></div>
					<div class="col-12 col-sm-11 col-md-8 col-xl-8 col-xxl-7"><h6>Mon adresse mail: maximehauet1@gmail.com</h6></div>
					
					
					<div class=" col-sm-1 col-md-3 col-xl-4 col-xxl-4"></div>
					<div class="col-12 col-sm-11 col-md-8 col-xl-8 col-xxl-7"><h6>Mon numéro téléphone: +33 6 52 66 74 18</h6></div>
					<div class=" col-sm-1 col-md-3 col-xl-4 col-xxl-4"></div>
					<div class="col-12 col-sm-11 col-md-8 col-xl-8 col-xxl-7" id=visible><h6>Mon Linkedin: <a style="text-decoration: none;" href="https://www.linkedin.com/in/maxime-hauet-476091198/">ici</a></h6></div>
			</div>
			
		</div>
		

			

	</div>	

		<a class="icone" id="icone" href="./contact.php"><img src="./Img/arrow-up-circle.svg" style="width: 50px; opacity: 75%; top: 75%;" class="position-fixed end-0 bottom-50 " alt="haut de page"></a>
        <a class="icone" id="icone" href="https://www.linkedin.com/in/maxime-hauet-476091198/" target="_blank"><img src="./Img/linkedin.svg" style="width: 50px; opacity: 75%;" class="position-fixed end-0 bottom-50" alt="linkedin"></a>
        <a class="icone" id="icone" href="https://mail.google.com/mail/u/0/?tab=rm&ogbl#inbox?compose=GTvVlcRzDflmfbQjgjgfXCCjdknrgzdclMVSCppkCXfvRDmLQmgWlLLhbRfRfpktkGXQPKkVlnHxD" target="_blank"><img src="./Img/envelope-fill.svg" style="width: 50px; opacity: 75%;" class="position-fixed end-0 top-50" alt="mail"></a> 


		<footer style="background-color: #C82D2D;">

			<div class="container-fluid">
				<div class="row">
					<h6 class="col-7 col-sm-6 text-end pt-5 mt-5">Conçu par Maxime Hauet<br>© Copyright 2021 - Portfolio</h6>
			
					<img class="col-5 col-sm-4 " src="./Img/upec.png" alt="logo upec"/>
				</div>
			</div>
		</footer>
</body>

</html>
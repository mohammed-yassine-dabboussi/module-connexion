<?php

// $mysqli = new mysqli('localhost', 'root', '', 'moduleconnexion');
$mysqli = new mysqli('localhost:3306', 'yassine', 'yassine123', 'mohammed-yassine-dabboussi_moduleconnexion');

session_start();

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style_mc/style.css"/>
    <link rel="shortcut icon" href="" >
    <title>Module Connexion-Inscription</title>
</head>


  
    <header>
        <div class="hGauche">
            <div class="bouton_header">Module connexion | Mohammed Yassine Dabboussi</div>
        </div>

        <div class="hDroite">
            <div class="bouton_header"><a href="index.php" >Accueil</a></div>
            <div class="bouton_header"><a href="inscription.php" >Inscription</a></div>
            <div class="bouton_header"><a href="connexion.php" >Connexion</a></div>
        </div>
    </header>

    <body>
        
        <div class="div_body">
            <div class="div_milieu"> 
                <form action="" method="post">
                    <h1>Inscription</h1>

                    <table>
                        <tr>
                            <td>Identifiant</td>
                            <td><input type="text" name="login" placeholder="Entrez votre identifiant !" size="25"/></td>
                        </tr>
                        <tr>
                            <td>Nom</td>
                            <td><input type="text" name="nom"  placeholder="Entrez votre nom !" size="25"/></td>
                        </tr>
                        <tr>
                            <td>Prénom</td>
                            <td><input type="text" name="prenom" placeholder="Entrez votre prénom !" size="25"/></td>
                        </tr>
                        <tr>
                            <td>Mot de Passe</td>
                            <td><input type="password" name="password" placeholder="Entrez votre mot de passe !" size="25"/></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><input type="password" name="password_confirmation" placeholder="Confirmez votre mot de passe !" size="25"/></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><input type="submit" value="ENVOYER" ></td>
                        </tr>
                    </table>
                </form>
                <!--Partie PHP -->
                <?php
                    if (isset($_POST['login']) && isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['password']) && isset($_POST['password_confirmation'])){
                        if ($_POST['login']!="" && $_POST['nom']!="" && $_POST['prenom']!="" && $_POST['password']!="" && $_POST['password_confirmation']!="" ){
                            if ($_POST['password'] === $_POST['password_confirmation']){  
                                //recuperer le contenu du formulaire 
                                $login=$_POST['login'];
                                $prenom=$_POST['nom'];
                                $nom=$_POST['prenom'];
                                $password1=$_POST['password'];
                                $password2=$_POST['password_confirmation']; 

                                $request = $mysqli -> query('SELECT COUNT(*) FROM `utilisateurs` WHERE `login`="'.$login.'"');
                                $result_fetch_array = $request -> fetch_array();
                                
                                
                                //vérifier si l'identifiant existe déja
                                 if ($result_fetch_array['COUNT(*)'] == 0){
                                    //   requête pour ajouter les données entré par l'utilisateur à la base des données  
                                     $request = $mysqli -> query("INSERT INTO `utilisateurs`(`id`, `login`, `prenom`, `nom`, `password`) VALUES (NULL,'$login','$nom','$prenom','$password1')");
                                     echo "<p style='color:rgb(0, 240, 44);'>Félicitations, vous êtes bien inscrit !</p>";
                                     echo "<h2><a a href='connexion.php'>&#10148;Connectez-vous:</a></h2>"; 

                                 }else{
                                        
                                     echo "<p style='color:rgb(160, 0, 0);'>L'idetifiant existe déja !</p>";
                                     }

                            }else {
                                echo "<p style='color:rgb(160, 0, 0);'>Les mots de passes ne sont pas identiques</p>";
                            }
                        }else {
                        echo "<p style='color:rgb(160, 0, 0);'>Veuillez remplir tout les champs !</p>";
                    }
                    }
                ?>
            </div>
        </div>
    </body> 

    <footer>
        <p><b>© Mohammed Yassine Dabboussi | La Plateforme | 2022-2023</b> </p>
    </footer> 

</html>


<?php

$mysqli = new mysqli('localhost', 'root', '', 'moduleconnexion');
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
    <title>Module Connexion</title>
</head>


  
    <header>
        <div class="hGauche">
            <div class="bouton_header">Module connexion | Mohammed Yassine Dabboussi</div>
        </div>

        <div class="hDroite">
            
            <div class="bouton_header"><a href="profil.php" ><?php foreach ($_SESSION as $key => $value) {
                                                         echo $_SESSION['user'][0] ;
                                                         } ?></a></div>
            <div class="bouton_header"><form action="" method="post"><input type="submit" value="Deconnexion" name="deconnexion"></form></div>
            <?php     if (isset($_POST['deconnexion'])) {   
                        session_destroy(); 
                        header('Location: index.php');
                      }?>
        </div>
    </header>

    <body>
        
        <div class="div_body">
            <div class="div_milieu"> 
            <form action="" method="post">
                    <h1>Modifiez votre profil</h1>

                    <table>
                        
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

                <?php

                    foreach ($_SESSION as $key => $value) {
                        $user = $_SESSION['user'][0] ;
                    }
                    $modification = 0;
                    if (isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['password']) && isset($_POST['password_confirmation'])){
                        if ($_POST['nom']!=""){
                            $nom=$_POST['nom'];
                            $modification = 1;
                            $mysqli->query('UPDATE `utilisateurs` SET `nom`="'.$nom.'" WHERE `login`="'.$user.'"');
                        }
                        if ($_POST['prenom']!=""){
                            $prenom=$_POST['prenom'];
                            $modification = 1;
                            $mysqli->query('UPDATE `utilisateurs` SET `prenom`="'.$prenom.'" WHERE `login`="'.$user.'"');
                        }
                        if ($_POST['password']!=""){
                            if ($_POST['password'] == $_POST['password_confirmation']){
                            $password=$_POST['password'];
                            $modification = 1;
                            $mysqli->query('UPDATE `utilisateurs` SET `password`="'.$password.'" WHERE `login`="'.$user.'"');

                            }else {
                                echo "<p style='color:rgb(160, 0, 0);'>Les mots de passes ne sont pas identiques</p>";
                            }
                        }
                        
                        
                        if($modification === 1){
                            echo "<p style='color:rgb(0, 240, 44);'>Vos données ont été mis à jour !</p>";

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


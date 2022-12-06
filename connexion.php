<?php

$mysqli = new mysqli('localhost', 'root', '', 'moduleconnexion');

$request = $mysqli -> query("SELECT * FROM `utilisateurs` ");
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
            <div class="bouton_header"><a href="index.php" >Accueil</a></div>
            <div class="bouton_header"><a href="inscription.php" >Inscription</a></div>
            <div class="bouton_header"><a href="connexion" >Connexion</a></div>
        </div>
    </header>

    <body>
        
        <div class="div_body">
            <div class="div_milieu"> 
                <form action="" method="post">
                    <h1>Connexion</h1>

                    <table>
                        <tr>
                            <td>Identifiant</td>
                            <td><input type="text" name="login" placeholder="Entrez votre identifiant !" size="25"/></td>
                        </tr>
                        <tr>
                            <td>Mot de Passe</td>
                            <td><input type="password" name="password" placeholder="Entrez votre mot de passe !" size="25"/></td>
                        </tr>
                            <td></td>
                            <td><input type="submit" value="Me connecter" ></td>
                        </tr>
                    </table>
                </form>
                <!--Partie PHP -->
                <?php
                    if (isset($_POST['login']) && isset($_POST['password'])){
                        if ($_POST['login']!="" && $_POST['password']!=""){
                            $login=$_POST['login'];
                            $password=$_POST['password']; 
                            
                            while(($result = $request -> fetch_array()) != null){
                                if ($login === $result['login']){  
                                    if($password === $result['password']){
                                        if ($login === 'admin'){
                                            $_SESSION['user'][]= $_POST['login'];
                                            header('Location: admin.php');
                                        }else{
                                            $_SESSION['user'][]= $_POST['login'];
                                            header('Location: profil.php');
                                            }
                                    }else {
                                        echo "<p style='color:rgb(160, 0, 0);'>Veuillez vérifier l'identifiant et le mot de passe !</p>";
                                        
                                    }
                                }
                                
                            }
                        }else {
                        echo "<p style='color:rgb(160, 0, 0);'>Veuillez entrez l'identifiant et le mot de passe !</p>";
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


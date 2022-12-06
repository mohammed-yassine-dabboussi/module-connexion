<?php 
session_start();
// $mysqli = new mysqli('localhost', 'root', '', 'moduleconnexion');
$mysqli = new mysqli('localhost:3306', 'yassine', 'yassine123', 'mohammed-yassine-dabboussi_moduleconnexion');
foreach ($_SESSION as $key => $value) {
    $user = $_SESSION['user'][0] ;
}

$request = $mysqli -> query("SELECT * FROM `utilisateurs` WHERE `login` = '".$user."' ");

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
                 <?php 
                    foreach ($_SESSION as $key => $value) {
                         echo "<h2 style='color:rgb(160, 0, 0);'>Bonjour ".$_SESSION['user'][0]."</h2>";
                    }
                    while(($result = $request -> fetch_array()) != null)
                            {
                                echo "Identifiant : ".$result['login'];
                                echo "<br>Prénom : ".$result['prenom'];
                                echo "<br>Nom : ".$result['nom'];
                            }

                ?>
                <h2><a a href="modif_profil.php">&#10148;Modifiez votre profil:</a></h2> 
            </div>
        </div>
    </body> 

    <footer>
        <p><b>© Mohammed Yassine Dabboussi | La Plateforme | 2022-2023</b> </p>
    </footer> 

</html>


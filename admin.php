<?php

// $mysqli = new mysqli('localhost', 'root', '', 'moduleconnexion');
$mysqli = new mysqli('localhost:3306', 'yassine', 'yassine123', 'mohammed-yassine-dabboussi_moduleconnexion');
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
                
                <div class="bouton_header"><a href="" ><?php foreach ($_SESSION as $key => $value) {
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
                    <table border : solid>
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Login</th>
                            <th>Prénom</th>
                            <th>Nom</th>
                            <th>Mot de passe</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            while(($result = $request -> fetch_array()) != null)
                            {
                                echo "<tr>";
                                echo "<td>".$result['id']."</td>";
                                echo "<td>".$result['login']."</td>";
                                echo "<td>".$result['prenom']."</td>";
                                echo "<td>".$result['nom']."</td>";
                                echo "<td>".$result['password']."</td>";
                                echo "</tr>";
                            }

                            
                        ?>
            </table>
            </div>
        </div>
    </body> 

    <footer>
        <p><b>© Mohammed Yassine Dabboussi | La Plateforme | 2022-2023</b> </p>
    </footer> 

</html>


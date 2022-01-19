<?php
require_once("codebase/grid_connector.php");

$login = $_POST['login'];
$mdp = $_POST['mdp'];
$ip = $_SERVER['REMOTE_ADDR'];

$pass = 'motdepasse';
if ( $_POST["mdp"] != $pass){
    header("Location: 404.html");
    exit();
}

$res = new PDO('mysql:host=localhost;dbname=userwilly;charset=utf8', 'userwilly', 'u47^pB!8S!');

// Petit test pour voir si la connexion est bonne
if ($res->connect_error) {
  die("Non connecté !" . $res->connect_error);
}
echo "Connecté !";



// Commande pour ajouter les variables présentes dans le formulaire POST
try {
    $res->query("INSERT INTO infoConnexion (loginCo, mdpCo, addrIP) VALUES ('$login', '$mdp', '$ip')");
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}





?>
<br>=== Debug ===
<br>
Le login est : <?php echo $login; ?><br>
Le mot de passe est : <?php echo $mdp; ?><br>
L'adresse IP est : <?php echo $ip; ?><br>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="dhtmlx/codebase/dhtmlx.js" type="text/javascript"></script> 
    <link rel="STYLESHEET" type="text/css" href="dhtmlx/codebase/dhtmlx.css"> 
    <title>Acceuil</title>
    <style>

    html, body {
        marginTop: 10px;
        width: 100%;      /*provides the correct work of a full-screen layout*/ 
        height: 80%;     /*provides the correct work of a full-screen layout*/
        overflow: hidden; /*hides the default body's space*/
        margin: 0px;      /*hides the body's scrolls*/
    }
</style>

</head>
<body>
<script type="text/javascript">
        dhtmlxEvent(window,"load",function(){ 
            var layout = new dhtmlXLayoutObject(document.body,"2E"); 
            layout.cells("a").setText("Tableau");
            layout.cells("a").setWidth(1100);
            layout.cells("a").setHeight(300);
            layout.cells("b").setText("InformationsIP"); 

            var infoCoGrid = layout.cells("a").attachGrid();
            infoCoGrid.setHeader("Login,Mot de Passe,@IP,Connexion Status");
            infoCoGrid.setColumnIds("login,mdp,ip,status");
            infoCoGrid.setInitWidths("250,250,*,250");  
            infoCoGrid.setColAlign("left,left,left");     
            infoCoGrid.setColTypes("ro,ro,ro");
            infoCoGrid.setColSorting("str,str,str");
            infoCoGrid.init();
            infoCoGrid.attachHeader("#text_filter");
            infoCoGrid.load("database.php");
        });
    </script>
</body>
</html>
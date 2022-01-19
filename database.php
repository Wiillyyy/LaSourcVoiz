<?php

// Connexion à la base de données, (conteur docker mysql crée par mes soins)
require("codebase/grid_connector.php");

try {
$res = new PDO('mysql:host=localhost;dbname=userwilly;charset=utf8', 'userwilly', 'u47^pB!8S!');

$conn = new GridConnector($res);
$conn->render_table("infoConnexion", "loginCo", "loginCo, mdpCo, addrIP");

    
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }


/* $res=mysql_connect("localhost","userwilly","u47^pB!8S!");
    	mysql_select_db("userwilly");
	
	$conn = new GridConnector($res, "infoConnexion");
	$conn->render_table("loginCo","mdpCo","addrIP");
 */
?>
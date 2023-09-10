<?php 
//Infos de connection à la BD 
$dbname = "film_api";
$host="localhost";
$username ="root";
$password="";

//Connection à la BD 
$con = mysqli_connect($host, $username, $password, $dbname); 
//Vérification
if(!$con)
{   
    echo("Message : Impossible de se connecter à la BD");
        die();
}
/*
1- Get
2- Insert
3- Update
4- Delete  
*/

?>
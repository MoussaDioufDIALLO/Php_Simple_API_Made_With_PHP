<?php
header('Content-Type: application/json');
require_once 'connection.php';

$reponse = array();

if(isset($_GET['id']))
{
        //executer la requète en recherchant l'élément concerné 
        $id = $_GET['id'];
        $query = $con->prepare("SELECT id, titre, description, langue, genre, date_de_sortie,  box_office,
        duree, nombre_etoile FROM films where id = ?");
        $query -> bind_param("s", $id);
        if($query->execute())
            {
                //succes 
                $query -> bind_result($id, $titre, $description, $langue, $genre, $date_de_sortie, $box_office, $duree, $nombre_etoile);
                $query ->fetch();

                $films = array(
                    'id' => $id, 
                    'titre'  => $titre,
                    'description'=> $description, 
                    'langue'=> $langue, 
                    'genre'=>$genre,
                    'date_de_sortie'=>$date_de_sortie,
                    'box_office'=>$box_office, 
                    'duree'=> $duree, 
                    'nombre_etoile'=>$nombre_etoile
                );
                $reponse['error']=false;
                $reponse['films']=$films;
                $reponse['message']="Le film recherche existe dans la base de données";
            }else{
                //erreur
                $reponse['error']=true;
                $reponse['message']="Le film recherché n'existe pas dans la base de donnée";
            
            }
}
else{
    //Aucun film ne sera retourné $reponse['error']=false; 
    $reponse['error'] = true; 
    $reponse['message']="Veuillez fournir l'id du film à rechercher";
}
    //Afficher le résultat 
   // echo json_encode ($reponse);
    print_r($reponse);
?>
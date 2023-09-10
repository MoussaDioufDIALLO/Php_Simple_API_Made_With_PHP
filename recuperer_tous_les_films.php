<?php 

//Vérifier le résultat de notre requète 
if($query->execute())
{
    //la requète a bien été executée 
    $films = array();
    $resultat = $query->get_result();
    while($elmt = $resultat->fetch_array(MYSQLI_ASSOC))
    {
        $films[] = $elmt; 
    }
    $reponse['error'] = false; 
    $reponse ['films'] = $films; 
    $reponse['message']="La commande a étéexecutée avec succés"; 
    //Fermeture de la connection 
    $query->close(); 
    print_r($reponse); 
}
    else
    {
        //Impossible d'executer cette partie
            $reponse['error'] = true; 
            $reponse['message'] = "Impossible d'executer cette requète";
    }  
?>
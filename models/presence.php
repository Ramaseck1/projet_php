<?php 
/* function listePresences(){ */



function listePresences($idPromo){

    $chemin = "../data/presence.csv";
    $fichier = fopen($chemin, "r");

    $presences = []; // Initialisation du tableau pour stocker les données de présence

    if ($fichier) {
        while (($ligne = fgetcsv($fichier)) !== false) {
            if ($ligne[8]==$idPromo) {
            // Ajouter chaque ligne lue du fichier CSV dans le tableau $presences
            $presences[] = ['Matricule'=>$ligne[0],'nom'=>$ligne[1],'prenom'=>$ligne[2],'telephone'=>$ligne[3],'referentiel'=>$ligne[4],
            "heure_d'arriver"=>$ligne[5],'status'=>$ligne[6],'date'=>$ligne[7],$ligne[8]=>'id','email'=>$ligne[9],'genre'=>$ligne[10],'active'=>$ligne[11]];
        }
    }
        fclose($fichier); // Fermer le fichier
    } else {
        echo "Impossible d'ouvrir le fichier.";

    }
    //afficher les etudiants par promotions


    return $presences;

}

function pagination($data, $page, $perPage){
    $total = count($data);
    $pages = ceil($total / $perPage);
    $offset = ($page - 1)  * $perPage;
    return array_slice($data, $offset, $perPage);
}
 
function referent($idPromo){
    $chemin = "../data/ref.csv";
    $fichier = fopen($chemin, "r");

    $refe= []; // Initialisation du tableau pour stocker les données de présence
    if ($fichier) {
        while (($ligne = fgetcsv($fichier)) !== false) {
            // Ajouter chaque ligne lue du fichier CSV dans le tableau $presences
            if ($ligne[2]==$idPromo) {
            $refe[] = ['refe'=>$ligne[0],'action'=>$ligne[1],'id'=>$ligne[2]];
        }}
        fclose($fichier); // Fermer le fichier
    } else {
        echo "Impossible d'ouvrir le fichier.";

    }

    return $refe;

 }   
  
   
  
  
?>



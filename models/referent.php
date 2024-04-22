<?php
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


 function ajouterReferentiel($libelle, $action, $idPromo) {
    $chemin = "../data/ref.csv";

    // Ouvrir le fichier en mode append (ajout)
    if (($fichier = fopen($chemin, "a")) !== false) {
        // Écrire les données du nouveau référentiel dans le fichier CSV
        fputcsv($fichier, [$libelle, $action, $idPromo]);
        fclose($fichier);
        return true;
    } else {
        return false;
    }
}
    




?>







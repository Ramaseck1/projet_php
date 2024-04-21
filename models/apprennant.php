<?php



function listesapps($idPromo) {
 /*  $chemin = "../data/appre.csv";
  $fichier = fopen($chemin, "r");

  $apps = []; // Initialisation du tableau pour stocker les données de présence

  if ($fichier) {
      while (($ligne = fgetcsv($fichier)) !== false) {
        if ($ligne[5]==$idPromo) {
          // Ajouter chaque ligne lue du fichier CSV dans le tableau $presences
          $apps[] = ['nom'=>$ligne[0],'prenom'=>$ligne[1],'email'=>$ligne[2],'genre'=>$ligne[3],'telephone'=>$ligne[4],'idPromo'=>$ligne[5]];
      }
    }
      fclose($fichier); // Fermer le fichier
  } else {
      echo "Impossible d'ouvrir le fichier.";

  }

  return $apps; */
  include "presence.php";
  $apprenant=listePresences($idPromo);


 

}
 
function referents($idPromo){
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
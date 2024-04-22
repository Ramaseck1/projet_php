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
            "heure_d'arriver"=>$ligne[5],'status'=>$ligne[6],'date'=>$ligne[7],$ligne[8]=>'id','email'=>$ligne[9],'genre'=>$ligne[10],'active'=>$ligne[11],'mdp'=>$ligne[12]];
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
            // Ajouter chaque ligne lue du fichier CSV dans le tableau $refe
            if ($ligne[2]==$idPromo) {
            $refe[] = ['refe'=>$ligne[0],'action'=>$ligne[1],'id'=>$ligne[2]];
        }}
        fclose($fichier); // Fermer le fichier
    } else {
        echo "Impossible d'ouvrir le fichier.";

    }

    return $refe;

 }   
  


 function validerDonneesLogin($login, $password)
{
    $erreur = [];

    if (empty($login)) {
        $erreur['emailError'] = "Veuillez renseigner votre email";
    } elseif (!filter_var($login, FILTER_VALIDATE_EMAIL)) {
        $erreur['emailError'] = "Le format de l'email n'est pas valide";
    }

    if (empty($password)) {
        $erreur['passwordError'] = "Veuillez renseigner votre mot de passe";
    }

    if (!empty($erreur)) {
        return $erreur;
    } else {
        return ['login' => $login, 'password' => $password];
    }
}

function login($users, $login, $password)
{
    $userConnect = false;

    foreach ($users as $user) {
        if ($user['email'] == $login && password_verify($password, $user['mot_de_passe'])) {
            if ($user["etat"] == "1") {
                $userConnect = $user;
                break; // Utilisateur trouvé et connecté, pas besoin de continuer la boucle
            } elseif ($user['etat'] == "0") {
                return "Compte suspendu, veuillez contacter l'administrateur.";
            }
        }
    }

    if ($userConnect === false) {
        return "Identifiant ou mot de passe incorrect.";
    }

    return ['userConnect' => $userConnect];
}
   
  
  
?>



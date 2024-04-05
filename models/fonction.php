<?php
function apprennant(string $app, array $listes):string {
    foreach($listes as $liste){
        if($app ===$liste['email']){
            return $liste['nom']. $user['prenom'];
        }
    }
    return 'error';

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../publics/css/connexion.css">
</head>
<body>
    <?php 

    
    // Inclure les fichiers PHP nécessaires
    include "../models/presence.php";
    include "../models/connexion.php";


// Vérifier si l'utilisateur est connecté
if (isset($_SESSION["utilisateur"])) {
    $nom_utilisateur = $_SESSION["utilisateur"]["nom"]; 
} else {
    echo "Vous n'êtes pas connecté.";
}
    
    // Vérifier si le formulaire a été soumis
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = $_POST["email"];
        $mdp = $_POST["mdp"];
        
        $utilisateurs = connexion();

        // Vérifier si l'email et le mot de passe correspondent à un utilisateur
        $identifiants_corrects = false;
        foreach ($utilisateurs as $utilisateur) {
            if ($utilisateur["email"] == $email && $utilisateur["mot_de_passe"] == $mdp) {
                // Les identifiants sont valides
                $identifiants_corrects = true;
                $_SESSION["utilisateur"] = $utilisateur;

                // Rediriger vers la page d'accueil ou effectuer d'autres actions
                if ($utilisateur["type"] == "apprenant") {
                    // Rediriger l'apprenant vers la page de présence
                    header("Location: index.php?page=pre");
                    exit();
                } else {
                    // Rediriger l'administrateur vers la page d'accueil
                    header("Location: index.php?page=accueil");
                    exit();
                }
            }
        }

        // Si aucun utilisateur correspondant n'est trouvé, afficher un message d'erreur
      
    }
    ?>

    <div class="container">
        <img src="../publics/img/logo.png" alt="" width="30%"> 
        <div class="content"> 
            <form action="" method="post">
                <p>        
                <?php
                // Vérifier si aucun utilisateur correspondant n'est trouvé
                if ($_SERVER["REQUEST_METHOD"] == "POST" && !$identifiants_corrects) {
                    echo "<div style='color: red; background-color: rgb(230, 193, 201); width:26vw'>Email ou mot de passe incorrect</div>";
                }
            ?>
                </p>
                <label for=""><span style="color: red;">*</span></label> <br>
                <input type="text" placeholder="Entrer email address" name="email" > <br>
                <?php
                // Vérifier si aucun utilisateur correspondant n'est trouvé
                if ($_SERVER["REQUEST_METHOD"] == "POST" && !$identifiants_corrects) {
                    echo "<div style='color: red; width:26vw'>Email  incorrect</div>";
                }
            ?> 
                <label for=""> Password</label> <br>
                <input type="password" id="" placeholder="Entrer votre mot de passe" name="mdp"> <br>
            </div>
            <div class="main">
                <div style="display: flex;">
                    <div style="position: relative; left: 7em;">
                        <input type="checkbox" name="remember">
                        <label for="">Remember me</label>
                    </div>
                    <div style="position: relative; left: 20em;">
                        <h4 style="color: #16A085; font-size: 1.3em;">Mot de passe oublié?</h4> 
                    </div>
                </div>
                <div class="a">
                    <button type="submit">Login</button>
                </div>
            </div>
        </form>
    </div>    
</body>
</html>

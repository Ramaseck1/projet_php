
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <link rel="stylesheet" href="../publics/css/style.css">
    <link href="/chemin-vers-fontawesome/css/all.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    

</head>

<style>
    /* Désactiver le hover pour les liens avec la classe 'clicked' */
    ol li a.clicked:hover {
        pointer-events: none; /* Désactive les événements de pointeur */
        cursor: default; /* Curseur par défaut */
        text-decoration: none; /* Supprimer la décoration de texte */
        background-color: none;
    }
</style>
<body style="background-color:whitesmoke">

<?php
       
//coneexion
if (!isset($_SESSION["utilisateur"])) {
    // Rediriger vers la page de connexion
    header("Location: index.php");
    exit(); // Assurez-vous de terminer le script après la redirection
}


// Fonction de déconnexion
function deconnexion() {
    // Détruire toutes les données de la session
    session_destroy();

    // Rediriger l'utilisateur vers la page de connexion
    header("Location: index.php");
    exit(); // Assurez-vous de terminer le script après la redirection
}

// Vérifier si le formulaire de déconnexion a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["deconnexion"])) {
    deconnexion();
}


    // Vérifier si l'utilisateur est connecté et s'il est appreanant
    $is_apprenant = isset($_SESSION["utilisateur"]) && $_SESSION["utilisateur"]["type"] === "apprenant";


?>

<input type="checkbox" name="" id="check">
    <div class="container" style="margin-top:-1em;     font-family: Verdana, Geneva, Tahoma, sans-serif; 
">
    
       <div class="label" style="display: flex; justify-content: space-between;">
        <label for="check" >
            <div class="fas fa-bars" id="bars" style="display: flex; ">
            </div>
        </label>

        <div class="para" >
            <p><img src="../publics/img/menu.png" alt="" width="25x" ></p>
            <input type="text" class="icon" name="searchG" placeholder="Rechercher par matricul" >
       
        </div>
       

        <div class="content" style="display: flex;"> 
            <p class="date"><i class="fa fa-calendar"> 12 08 2024</i> </p>
            <p class="user"> </p>
            <div class="users">
            <span><?php echo isset($_SESSION["utilisateur"]) ? $_SESSION["utilisateur"]["nom"] : "Utilisateur non connecté"; ?></span> <br>
        
    <div value="" class="option"><?php echo isset($_SESSION["utilisateur"]) ? $_SESSION["utilisateur"]["type"] : "<a href='index.php'>connexion</a>"; ?></div> </div>
</p>
            <?php if(isset($_SESSION["utilisateur"])) : ?>
            <form action="" method="POST">
                <button type="submit" name="deconnexion">Déconnexion</button>
            </form>
        <?php endif; ?>
               
</div>

    </div>

    <!-- menu -->
    <div class="head">

            <div class="logo"><img src="../publics/img/logo.png" alt="" width="130em"></div>
            <div style="position: relative;top: 4em;">
            <h3 class="fa fa" ><i class="material-icons"style="">remove</i>Menu</h3> <br> <br>
          

        <ol>
            
        <li <?php echo $is_apprenant ? 'class="disabled"' : ''; ?>>
        <a <?php echo $is_apprenant ? 'onclick="return false;"' : 'href="#"'; ?>>
            <i class="material-icons">format_align_right</i> Dashboard
        </a>
    </li>
    <!-- Promos -->
    <li <?php echo $is_apprenant ? 'class="disabled"' : ''; ?>>
        <a <?php echo $is_apprenant ? 'onclick="return false;"' : 'href="index.php?page=accueil"'; ?>>
            <i class="material-icons">border_top</i> Promos
        </a>
    </li>
            <li  <?php echo $is_apprenant ? 'class="disabled"' : ''; ?>>
            <a  <?php echo $is_apprenant ? 'onclick="return false;"' : 'href="index.php?page=ref"'; ?> >
            <i class="material-icons">person_outline</i>Référentiels </a></li>
            <li  <?php echo $is_apprenant ? 'class="disabled"' : ''; ?>>
            <a <?php echo $is_apprenant ? 'onclick="return false;"' : ' href="index.php?page=app"'; ?> >
            <i class="material-icons">person_outline</i>Utilisateurs</a></li>
            
            <li><a href="#"><i class="material-icons">person_outline</i>Visiteurs</a></li>

            <li  <?php echo $is_apprenant ? 'class="disabled"' : ''; ?>>
            <a <?php echo $is_apprenant ? 'onclick="return false;"' : ' href="index.php?page=admin"'; ?> >
            <i class="material-icons">person_outline</i>administrateur</a></li>    

            <li><a href="index.php?page=pre"><i class="material-icons">person_outline</i>Presences</a></li>
            <li><a href="#"><i class="material-icons ">date_range</i>Evenement</a></li>
        </ol>
        </div>


        <?php
    // Vérifie si la page actuelle n'est pas ref.html.php
    $current_page = basename(__FILE__);
    $is_ref_page = ($current_page === 'ref.html.php');

    // Si ce n'est pas la page ref, affiche le contenu
    if (!$is_ref_page) {
?>
     <div class="footer" style="margin-left:-1em">
        <p>copyright|sonatel academy</p>
        <p>
        <i class="material-icons" 
        style="background-color:#16A085;color:white; top:-2em;position:relative;left:26em;padding:20px;border-radius:100%;
        ">settings</i>

        </p>

        </div>

<?php } ?>
        </div>   
     































     <script>
    // Sélectionnez tous les liens dans la liste
    const links = document.querySelectorAll('ol li a');

    // Parcourez chaque lien et ajoutez un gestionnaire d'événement de clic
    links.forEach(link => {
        link.addEventListener('click', function() {
            // Ajoutez une classe 'clicked' au lien cliqué
            this.classList.add('clicked');
        });
    });
</script>""
  
        
       </body>
</html>

      
        
   



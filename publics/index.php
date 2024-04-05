<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/apprenant.css">
    <link href="/chemin-vers-fontawesome/css/all.css" rel="stylesheet">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>


    
</head>
<body >
<input type="checkbox" name="" id="check">
    <div class="container">
    <?php
       include "../templates/header.html.php";


    // verifie si le parametre 'page' est defini dans l'url
    if(isset($_GET['page'])){
        // recupere la valeur du parametre 'page'
        $page = $_GET['page'];

        switch($page){
            case '1':
                include"../templates/accueil.html.php";
                break;    
            case '2':
                include"../templates/promotion.html.php";
                break;
            case '3':
                include"../templates/apprenn.html.php";
                
                break;
                case '4':
                    include"../templates/presence.html.php";


        }

    }



    ?>
    </div>
</body>
</html>
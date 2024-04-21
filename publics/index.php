

    <?php

  session_start();
    // verifie si le parametre 'page' est defini dans l'url
    if(isset($_GET['page'])){
        // recupere la valeur du parametre 'page'
        $page = $_GET['page'];
        if ($page !== 'connexion') {
            require_once "../templates/header.html.php";
        }

        switch($page){
            case 'accueil':
                require_once"../templates/promo.html.php";

                break;    
            case 'promo':
                require_once"../templates/promotion.html.php";
                break;
            case 'app':
                require_once"../templates/apprenn.html.php";
                
                break;
                case 'pre':
                require_once"../templates/presence.html.php";

                    break;
                case 'ref':
                require_once"../templates/ref.html.php";
    
                    break;
                 case 'pro':
                    $_SESSION['']='promo';
                require_once"../templates/promo.html.php";
                    break;             
                }

    }
    else {
        // If 'page'n'existe pas , include connexion comme page par defaut
        include "../templates/connexion.html.php";
    }
             


    ?>











  

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <link rel="stylesheet" href="style.css">
</head>
<body style="overflow: hidden;">

    <!-- menu -->
      
    <main>
        <h2 style="display: flex; justify-content: space-between;" class="title">
            <p class="promot">Promotion</p>
            <p class="promos"> Promos  </p>
            <p class="promos"> <span>></span>creation</p>
           
           
        </h2>
        <div class="contenu">
            <div class="heade" style="display: flex;gap: 45em;"> 
            <h3>listes des Promotions</h3>
            <div class="search" style="display: flex; gap: 10em;" >
            <input type="text" class="icon prom"  placeholder="Rechercher par matricul" style="width: 15em;">
            <button><span>+</span> Nouveau</button>
            </div>
        </div> <br>
        <form action="" method="POST">
    <input type="hidden" name="page" value="pre">
           <div class="tablee" style="margin-left: ;width:104em">
            <table style="height: 1px;">
            <?php    include "../models/promo.php";

                    $promos=listePromo();
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        // Vérifier si une action a été définie
                        if (isset($_POST['action'])) {
                            // Vérifier l'action à effectuer
                            if ($_POST['action'] =='check') {
                                // Cocher la promotion
                                cocherPromotion($_POST['idPromo']);
                            } elseif ($_POST['action'] =='check') {
                                // Décocher la promotion
                                decocherPromotion($_POST['idPromo']);
                            }
                        } else {
                           
                            if (isset($_POST['promotions']) && is_array($_POST['promotions'])) {
                                // Parcourir chaque ID de promotion cochée
                                foreach ($_POST['promotions'] as $idPromo) {
                                    // Mettre à jour l'état de la promotion
                                    checkPromo($idPromo);
                                }
                            }
                        }
                    }   
   
                   
                ?>
                <tr>
                 <th></th>
                    <th>Libellé</th>
                    <th> Date Début</th>
                    <th> Date Fin</th>
                    <th>Actions</th>
                </tr>
                <?php foreach($promos as $promo){
                    if($promo['action']=='1'){
                        $_SESSION['idPromo']=$promo['idPromo'];
                    }else{
                        $_SESSION['action']='0';
                    }

                    ?>
                <tr > 
                 <td></td>
                    <td style="color: #16A085; fo;nt-weight: bold;">  <?php echo $promo['libelle'] ?>
                    </td>
                    <td><?php echo $promo['dd'] ?></td>
                    <td><?php echo $promo['df'] ?></td>
                    <td>  
                    <form action="" method="POST">
                            <h3 style="display: flex;">
                                <input type="checkbox" class="chek" style="visibility: visible;display: block;-webkit-appearance:button;margin-left:-30em;height:1em;margin-top:-3em"  
                                    onchange="this.form.submit()" value="<?= $promo['idPromo']?>" name="promotions[]" 
                                    <?=$promo['action']=='1' ? 'checked': 'unchecked'?>>
                                <input type="hidden" name="action" value="<?= $promo['action'] == '1' ? 'uncheck' : 'check' ?>">
                                <input type="hidden" name="idPromo" value="<?= $promo['idPromo'] ?>">
                            </h3>
                        </form>
                    </td>
                <?php } ?>

            </table>:
           </div>
            </div>



        </div>
        

    </main>
</div>  
</body>
</html>





































































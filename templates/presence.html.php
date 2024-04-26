

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
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">



    
</head>
<body>


<?php 
 

include "../models/presence.php";


$val=$_SESSION['idPromo'];

// filtre presence
/* $presences=listepresences($val);
 */$presencesj=listepresencesjs($val);
/* $apprenant=referent($val);
 */




$recup_date= isset($_POST['Date']) ? $_POST['Date'] : date('Y-m-d');
$recups_date= isset($_POST['Date']) ? $_POST['Date'] : date('d-m-Y');

               
            // verification si searc existe
          if(isset($_POST['status'])){
            $app=$_POST['status'];
           
         }

        if(!empty($app)){
            $listefiltre=array_filter($presencesj,function($appre) use ($app){
                return $appre['status']==$app;
            });
            // redefinir le tableau filtre
            $presencesj=array_values($listefiltre);



        }

        //filtre refrentiele
        if(isset($_POST['referentiel'])){
            $app=$_POST['referentiel'];
           
         }

        if(!empty($app)){
            $listefiltre=array_filter($presencesj,function($appre) use ($app){
                return $appre['referentiel']==$app;
            });
            // redefinir le tableau filtre
            $presencesj=array_values($listefiltre);
        } 
        //liste par defaut de la liste des presence 


        // Vérification si les filtres status et referentiel sont vides
       $statusFiltreVide = empty($_POST['status']) || $_POST['status'] == 'status';
        $referentielFiltreVide = empty($_POST['referentiel']) || $_POST['referentiel'] == 'referentiel';

        // Charger la liste complète des présences si les filtres sont vides
        if ($statusFiltreVide && $referentielFiltreVide) {
            $presencesj = listepresencesjs($val);
        }
    

        //filtre genenrel
      
        // filtre presence header
        if(isset($_POST['searchG'])){
          $search=$_POST['searchG'];
          

         
       }
       if(!empty($search)){
          $listefiltres=array_filter($presencesj,function($present) use ($search){
              return $present['nom']==$search;
          });
          // redefinir le tableau filtre
          $presencesj=array_values($listefiltres);
          
         
      } 
       //filtre par date
        // filtre presence header
      if(isset($_POST['Date'])){
            $dates=$_POST['Date'];
           
           
            
  
           
         }
         if(!empty($dates)){
            $Datefiltre=array_filter($presencesj,function($present) use ($dates){
                return $present['date']==$dates;
            });
            // redefinir le tableau filtre
            $presencesj=array_values($Datefiltre);
          

           
        }  

        if(isset($_POST['Date'])){
            $dates=$_POST['Date'];
        }
        // Si la date sélectionnée est égale à la date actuelle, filtre les présences pour obtenir celles d'aujourd'hui
        if(!empty($dates) && $dates == date('Y-m-d')){
            $presencesjAujourdhui = array_filter($presencesj,function($present) use ($dates){
                return $present['date']==$dates;
            });
            // Redéfinir le tableau de présences avec celles d'aujourd'hui
            $presencesj = array_values($presencesjAujourdhui);
        }
        //pagination
        //element par page
        $elementsParPage=10;
        $pages = isset($_GET['pages']) ? $_GET['pages'] : 1;
      

        $presencesjPaginees = pagination($presencesj, $pages, $elementsParPage);
   

        // Pagination des présences filtrées
/*                             $presencesjPaginees = array_slice($presencesjFiltrees, $decal, $elementsParPage);
*/   
?>
    
    <main>

        <h1></h1>
        <div class="contenu" style="height: 44em;">
        <form action="" method="POST">
    <input type="hidden" name="page" value="pre">
    <div class="entete" style="display:flex;">

        <div class="select1" style="margin-top:1em">
            <select name="status" >
                <option value="status" <?php if(isset($_POST['status']) && $_POST['status'] == 'status') echo 'selected'; ?>>status</option>
                <option value="Absent" <?php if(isset($_POST['status']) && $_POST['status'] == 'Absent') echo 'selected'; ?>>Absent</option>
                <option value="Present" <?php if(isset($_POST['status']) && $_POST['status'] == 'Present') echo 'selected'; ?>>Present</option>
            </select>
        </div>
        <div class="select2" style="margin-top:1em">
            <select name="referentiel">
                <option value="referentiel" <?php if(isset($_POST['referentiel']) && $_POST['referentiel'] == 'referentiel') echo 'selected'; ?>>referentiel</option>
                <?php foreach($apprenant as $select):?>

                <option value=<?php echo $select['refe'] ?> <?php if(isset($_POST['referentiel']) && $_POST['referentiel'] == $select['refe']) echo 'selected'; ?>><?= $select['refe']?></option>
                
                <?php endforeach?>
            </select>
            
        </div>
        <div class="datecl">
            <input type="date" name="Date" value="<?php echo $recup_date?>">
        </div>
        <div class="boutons">
            <button type="submit" style="background-color:#16A085;border:none">
                <p style="position:relative; top:10px;color:white;font-size:20px">Rechercher</p>
            </button>
        </div>
    </div>
</form> 


                <div class="tableau" style="margin-left: 8em; margin-top:2em">
                    <table class="table" style="line-height: 1em;">
                   
                        <tr>
                            <th>Matricule</th>
                            <th>Nom</th>
                            <th>Telephone</th>
                            <th>Referentiel</th>
                            <th>heure d'arrivé</th>
                            <th>status</th>
                            <th>Date</th>
                           
                        </tr>
                        <?php
                        foreach($presencesjPaginees as $presence):
                                // Afficher uniquement les informations pertinentes pour l'apprenant

                                
                        ?>
                        
                        ?>
                        
                        <tr>
                            <td><?php echo $presence['matricule']?></td>
                            <td><?php echo $presence['nom']?></td>
                            <td><?php echo $presence['telephone']?></td>
                            <td> <?php echo $presence['referentiel']?></td>
                            <td><span style="color: green;"><?php echo $presence["heure_a"]?></span></td>
                            <td><span style="background: rgb(231, 230, 230); color: green;padding: 10px;"><?php 
                               echo $presence['status']
                            ?></span></td>
                            <td><?php echo $recups_date?></td>
                            
                        </tr>
                           <?php
                        
                    endforeach
                    ?>
                      
                   

                 

       
    
     
     
                    </table>
                    <?php if ($pages = 1) : ?>
                        <a href="?page=pre&pages=<?php echo ($pages - 1) ?>" style="margin-left:45em;font-size:20px;text-decoration: none;" ><</a>
                <?php endif ?>
                <?php for ($i = 1; $i <= ceil(count($presencesj,) / $elementsParPage); $i++) : ?>
                    <a style="font-weight:bold; font-size:20px;text-decoration: none;color:grey " href="?page=pre&pages=<?php echo $i ?>" <?php if ($i == $pages) echo 'style="font-weight:bold; font-size:10px;"' ?> ><?php echo $i ?></a>
                <?php endfor ?>
                <?php if ($pages < ceil(count($presencesj,)  / $elementsParPage)) : ?>
                    <a href="?page=pre&pages=<?php echo ($pages + 1) ?>" style="font-size:20px ; text-decoration: none;">></a>
                <?php endif ?>

            
                      
        </div>
 </div>
                    
                <div class="footer" style="background-color: white; margin-top: -3em; display:flex; justify-content: center;">
                    <p style="text-align: center;">copy</p>
                    <p class="foot"><img src="classe.jpg" alt="" width="90px" height="50px" style="position: relative; left: 52em;"></p>

                </div>

           


        </div>
  


    </main>
</body>
</html>


                          
                           
                          
                           
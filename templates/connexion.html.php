<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../publics/css/connexion.css">
</head>
<body>
    <?php include "../models/presence.php" ;
    $connects=listePresences($val);
    $val=$_SESSION['idPromo'];


if (!empty($_POST)) {
    //$login = $_POST['login'];
    //$password = $_POST['password'];
    extract($_POST);
    $validator = validerDonneesLogin($email, $password);
    var_dump($validator);

    if (!empty($validator['login']) && !empty($validator['password'])) {
        extract($validator);
        $login = login($users, $login, $password);
        if (isset($login['userConnect'])) {
            $_SESSION['user'] = $login['userConnect'];
           // dd($_SESSION);
            header('Location: ?page=promotions');
        }
    }
}
    ?>

    <div class="container">

        <img src="../publics/img/logo.png" alt="" width="30%"> 
        <div class="content"> 
        <form action="index.php?page=accueil" method="Post">

            <p>Email et Mot de Passe requis</p>
                    <?php foreach($connects as $connect) ?>
                <label for=""><span style="color: red;">*</span></label> <br>
                <input type="text" placeholder="Entrer email address" name="email" value="<?= $connect['email']?>" required > <br>
                <label for=""> Password</label> <br>
                <input type="text" valure="<?= $connect['mdp']?>" id="" placeholder="Entre votre password" name="mdp" required>  <br>
      
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
<!--             <a href="index.php?page=accueil"> <p> Log in</p</a>

 -->       
                <button type="submit">Login</button>
 </div>
       

                </div>
          
                </form>
    </div>
    
</body>
</html>








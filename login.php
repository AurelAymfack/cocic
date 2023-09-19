<pre>

<?php

$infosSessionId = $_COOKIE['session'] ?? '';


print_r($_POST);
if ($_SERVER['REQUEST_METHOD'] === "POST") {

    $_POST = filter_input_array(INPUT_POST, [
        'email' => FILTER_SANITIZE_EMAIL,
        'tel' => FILTER_SANITIZE_SPECIAL_CHARS,
        'pwd' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
    ]);

    $email = $_POST['email'] ?? '';
    $tel = $_POST['tel'] ?? '';
    $pwd = $_POST['pwd'] ?? '';




    // si tout les champ sont vaide alors on passe à la recherche 
    $pdo = require_once './pdo.php';
    $stat = $pdo->prepare('SELECT * FROM user WHERE email=:email');
    $stat->bindvalue(':email', $email);
    $stat->execute();
    $user = $stat->fetch();



    if (password_verify($pwd, $user['mot_de_passe'])) {
        // $statSession = $pdo->prepare('INSERT INTO session Value( DEFAULT , :iduser)');
        // $statSession->bindvalue(':iduser', $user['iduser']);
        // $statSession->execute();

        // $sessionID = $pdo->lastInsertId();
        $sessionID = $user['iduser'];
        setcookie('session', $sessionID, time() + 60 * 60 * 24 * 24, "", "", false, true);
        header('location:/profil.php');
    }

    print_r($user);
}

echo $user['mot_de_passe'];
echo '<br>';
echo $pwd;

?>




</pre>




<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital@0;1&display=swap" rel="stylesheet">
        <link rel="stylesheet"
            href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,200,0,0" />
        <link rel="stylesheet" href="/public/style/style.css">
        <link rel="stylesheet" href="/public/style/login.css">
        <title>COCIC | ACCUIl</title>
    </head>

    <body>

        <!-- log in -->

        <section class="connected">
            <form action="/login.php" method="POST" class="login">
                <span class="material-symbols-outlined close">
                    close
                </span>
                <div class="zone"><span class="material-symbols-outlined">
                        account_circle
                    </span></div>

                <div class="btn-google " data-onsuccess="onSignIn"
                    data-scope="https://www.googleapis.com/auth/userinfo.email https://www.googleapis.com/auth/userinfo.profile"
                    data-clientid="YOUR_CLIENT_ID"> <img src="/image/google.png" alt=""> Continu avec Google
                </div>

                <div class="mini-text">
                    <p> Vous ne pocédez pas de compte?<a href="/connexion.php">S'INSCRIR </a></p>
                </div>
                <div class="choix">
                    <div class="contain_mail">
                        <label for="tel" class="mail">Utiliser un numéro de téléphone </label>
                        <input type="text" name="email" id="email" placeholder=" Votre Email">
                    </div>
                    <div class="contain_tel">
                        <label for="email" class="tel">Avec une adresse mail </label>
                        <input type="text" name="tel" id="tel" placeholder=" Votre telephone">
                    </div>
                </div>
                <input type="password" name="pwd" placeholder="Votre Mot de passe">
                <button class="btn form-connexion">CONNEXION</button>
            </form>


            <div class="retour">
                <a href="/">
                    <h3> Retour à l'Acceuil !</h3>
                </a>
            </div>
        </section>

        <script src="/public/js/login.js"></script>
    </body>

</html>
<pre>

<?php



print_r($_POST);

echo $_POST['anonym'];


if ($_SERVER['REQUEST_METHOD'] === "POST") {

    $_POST = filter_input_array(INPUT_POST, [
        'nom' => FILTER_SANITIZE_STRING,
        'prenom' => FILTER_SANITIZE_STRING,
        'email' => FILTER_SANITIZE_EMAIL,
        'tel' => FILTER_SANITIZE_SPECIAL_CHARS,
        'one-pwd' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
        'pwd' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
        'anonym' => FILTER_SANITIZE_STRING
    ]);


    $nom = $_POST['nom'] ?? '';
    $prenom = $_POST['prenom'] ?? '';
    $email = $_POST['email'] ?? '';
    $tel = $_POST['tel'] ?? '';
    $confirmPwd = $_POST['one-pwd'] ?? '';
    $pwd = password_hash($_POST['pwd'], PASSWORD_ARGON2I) ?? '';
    $anonym = $_POST['anonym'] ?? '';

    echo $nom, $prenom, $email, $tel, $confirmPwd, $anonym;

    echo $anonym;


    echo $pwd;




    // faire une condition pour savoir si tout est ok avant de tout envoyer dans la base de donnée




    // si nous sommes dans le cas d'un enregistrement avec numero de telephone 

    $pdo = require_once './pdo.php';


    $stat = $pdo->prepare('INSERT INTO user( nom , prenom , email , mot_de_passe ,anonym ) 
    VALUE(
        :nom,
        :prenom,
        :email,
        :mot_de_passe,
        :anonym )');

    $stat->bindvalue(':nom', $nom);
    $stat->bindvalue(':prenom', $prenom);
    $stat->bindvalue(':email', $email);
    $stat->bindvalue(':mot_de_passe', $pwd);
    $stat->bindvalue(':anonym', $anonym);


    $stat->execute();

}





// faire la gestion d'erreur
if (!$nom && !$prenom && !$confirmPwd && !$pwd) {
    if (!$email || !$tel) {
        echo '!!!!!!tout est vide !!!!!!!';
    }
}

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
        <link rel="stylesheet" href="/public/style/connexion.css">
        <title>COCIC | ACCUIl</title>
    </head>

    <body>

        <main>
            <section class="one-connexion">
                <div class="contain-one-connexion">
                    <div class="contain-one-logo">
                        <a href="/"><img src="/image/logo.jpeg" alt=""></a>
                    </div>
                </div>
            </section>


            <header>
                <div class="contain-header">
                    <nav>
                        <a href="/"><span class="material-symbols-outlined">
                                home
                            </span> ACCEUIL</a>
                    </nav>
                </div>

            </header>







            <!-- registration formulaire -->
            <section class="content_form">



                <form action="/connexion.php" method="POST" class="form_1">
                    <div class="new-form google">

                        <div class="zone"><span class="material-symbols-outlined">
                                account_circle
                            </span></div>
                        <!-- <div class="btn-google " data-onsuccess="onSignIn"
                                data-scope="https://www.googleapis.com/auth/userinfo.email https://www.googleapis.com/auth/userinfo.profile"
                                data-clientid="YOUR_CLIENT_ID"> <img src="/image/google.png" alt=""> Continu avec Google
                            </div> -->

                        <div class="error">
                            <?= $error['errorVide']; ?>
                        </div>

                        <div class="control-form">
                            <label for="nom">Nom*</label>
                            <input type="text" name="nom" id="nom" value="<?= $nom; ?>">
                        </div>

                        <div class="control-form">
                            <label for="prenom">Prenom*</label>
                            <input type="text" name="prenom" id="prenom" value="<?= $prenom; ?>">
                        </div>

                        <div class="control-form">
                            <label for="adresse">Entrez votre E-mail/téléphone *</label>
                            <input type="email" name="email" id="adresse" placeholder=" Votre E-mail">
                            <input type="text" name="tel" id="tel" placeholder=" +237 6__ ___ ___">
                        </div>

                        <div class="control-form">
                        </div>

                        <div class="control-form">
                            <label for="pwdone"> Entrez un MOt DE PASSE</label>
                            <input type="password" name="one-pwd" id="pwd-one">
                        </div>
                        <div class="control-form">
                            <label for="pwd">Confirmer le MOT DE PASSE</label>
                            <input type="password " name="pwd" id="pwd" value="<?= $pwd; ?>">
                        </div>

                    </div>
                    <div class="check">
                        <input type="checkbox" name="anonym" <?= $anonym ? 'checked' : ''; ?>> Vous pouvez
                        <i> préserver votre
                            identité et demeurer
                            'anonym'</i>
                    </div>

                    <button class="btn-form btn-pwd"> Envoyer </button>
                </form>
            </section>

        </main>

        <script src="/public/js/index.js"></script>
    </body>

</html>
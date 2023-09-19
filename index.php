<?php


$error = [
    "forTelPwd" => '',
    "forEmailPwd" => '',
    "forEmail" => '',
    "forPhone" => '',
    "forPwd" => '',
    "forDb" => ''
];

$infosSessionId = $_COOKIE['session'] ?? '';

if ($_SERVER['REQUEST_METHOD'] === "POST") {

    $_POST = filter_input_array(INPUT_POST, [
        'email' => FILTER_SANITIZE_EMAIL,
        'tel' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
        'pwd' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
    ]);

    $email = $_POST['email'] ?? '';
    $tel = $_POST['tel'] ?? '';
    $pwd = $_POST['pwd'] ?? '';


    if (!$pwd && !$email) {
        $error['forEmailPwd'] = 'Champs invalide !';
    }


    if (!$pwd && !$tel) {
        $error['forTelPwd'] = 'Champs invalide !';
    }


    if ($email) {
        try {
            $pdo = require_once './pdo.php';
            $stat = $pdo->prepare('SELECT * FROM user WHERE email=:email');
            $stat->bindvalue(':email', $email);
            $stat->execute();
            $user = $stat->fetch() ?? '';

            if (password_verify($pwd, $user['mot_de_passe'])) {
                // $statSession = $pdo->prepare('INSERT INTO session Value( DEFAULT , :iduser)');
                // $statSession->bindvalue(':iduser', $user['iduser']);
                // $statSession->execute();

                // $sessionID = $pdo->lastInsertId();
                $sessionID = $user['iduser'];
                setcookie('session', $sessionID, time() + 60 * 60 * 24 * 24, "", "", false, true);
                header('location:/profil.php');
            } else {
                $user ? $error['forPwd'] = 'mot de passe invalide !' : $error['forEmail'] = 'email invalide !';
            }

        } catch (PDOException $e) {
            $error['forDb'] = ' Pas de compte sur cet E-mail ';
        }
    }

    if ($tel) {

        try {
            $pdo = require_once './pdo.php';
            $stat = $pdo->prepare('SELECT * FROM user WHERE telephone=:tel');
            $stat->bindvalue(':tel', $tel);
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
            } else {
                $user ? $error['forPwd'] = 'mot de passe invalide !' : $error['forTel'] = 'numéro invalide !';
            }

        } catch (PDOException $e) {
            $error['forPhone'] = ' Pas de compte sur ce numéro  ';
        }
    }

}
?>





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
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Lora&family=Montserrat:wght@400;500&display=swap"
            rel="stylesheet">
        <link rel="stylesheet" href="/public/style/style.css">
        <title>COCIC | ACCUIl</title>
    </head>

    <body>

        <section class="tuto">
            <span class="material-symbols-outlined">
                close
            </span>
                    <video src="/video/tuto.webm" controls >
                    </section>
                <main>
            <section class="one">
                <div class="contain-one">
                    <div class="contain-one-logo">
                        <a href="/"><img src="/image/logo.jpeg" alt=""></a>
                        <h1> <span style=" color:rgb(0, 189, 0)">Á VOUS </span><span style=" color:#ff0000">LA
                            </span><span style=" color:rgb(255, 196, 0)">PAROLE</span> </h1>

                    </div>
                </div>
            </section>


            <header>
                <input type="text" class="search" placeholder="search">
                <div class="contain-header">
                    <nav>
                        <a href="/" class="active-nav">
                            <span class="material-symbols-outlined">
                                home
                            </span>
                            <span>ACCEUIL</span>
                        </a>
                        <a href="/a-propos.php">
                            <span>À PROPOS DE NOUS !</span>
                        </a>
                        <a href="<?= $infosSessionId ? '/contributions.php' : '/login.php' ?>"
                            class="<?= !$infosSessionId ? '' : 'contributeur'; ?>">
                            <span>CONTRIBUTIONS</span>
                        </a>
                        <a href="<?= $infosSessionId ? '/poste.php' : '/login.php' ?>"
                            class="<?= !$infosSessionId ? '' : 'poster'; ?>">
                            <span>POST</span>
                        </a>

                    </nav>
                </div>
                <div class="contain-one-action">
                    <?= $infosSessionId ? '' : ' <a href="/connexion.php"><button class="btn btn-singin"> S\'inscrir</button></a>'; ?>
                    <span class="material-symbols-outlined">
                        account_circle
                    </span>
                    <?= $infosSessionId ? ' <a href="/logout.php"><button class="btn btn-logout">Log out</button></a>' : ' <a href="/login.php" ><button class="btn btn-connexion">CONNEXION</button> </a>'; ?>
                </div>





                <!-- bon menu deroulant  -->
                <!-- <section class="lanceur">
                    <ul>
                        <li><span>science et technique</span> <span class="material-symbols-outlined">
                                keyboard_double_arrow_down
                            </span></li>
                        <li><span>science et technique</span> <span class="material-symbols-outlined">
                                keyboard_double_arrow_down
                            </span></li>
                        <li><span>science et technique</span> <span class="material-symbols-outlined">
                                keyboard_double_arrow_down
                            </span></li>
                        <li><span>science et technique</span> <span class="material-symbols-outlined">
                                keyboard_double_arrow_down
                            </span></li>
                        <li><span>science et technique</span> <span class="material-symbols-outlined">
                                keyboard_double_arrow_down
                            </span></li>
                        <li><span>science et technique</span> <span class="material-symbols-outlined">
                                keyboard_double_arrow_down
                            </span></li>
                        <li><span>Médecine /Santé</span><span class="material-symbols-outlined">
                                keyboard_double_arrow_down
                            </span></li>
                        <li class="active_lanceur"><span>Politique et constitution</span><span
                                class="material-symbols-outlined">
                                keyboard_double_arrow_down
                            </span></li>
                        <li><span>Education</span><span class="material-symbols-outlined">
                                keyboard_double_arrow_down
                            </span></li>
                        <li><span>Cultures et traditions</span><span class="material-symbols-outlined">
                                keyboard_double_arrow_down
                            </span></li>
                        <li><span>Economie</span><span class="material-symbols-outlined">
                                keyboard_double_arrow_down
                            </span></li>
                        <li><span>Autres</span><span class="material-symbols-outlined">
                                keyboard_double_arrow_down
                            </span></li>
                    </ul>
                    <hr class="hr_2">
                    <?php $med = ['djdj', 'djdj', 'jdjd', 'dhdu'];
                    $increment = 0;
                    while ($increment < count($med)): ?>
                        <div class="service">
                            <?php
                            static $i = 0;
                            foreach ($med as $li): ?>

                                <div class="service-x">
                                    <p class="module">
                                        <?= $li; ?>constitution national
                                    </p>
                                </div>;
                            <?php endforeach; ?>
                        </div>
                        <?php $increment++; endwhile; ?>
                </section> -->

            </header>




            <!-- ruban -->
            <div class="ruban">
                <div>
                    <P>LA RENAINSSANCE DU CAMEROUN COMMENCE PAR VOUS </P>
                </div>
                <div>
                    <P>THE MOVE THAT INSPIRE </P>
                </div>
            </div>



            <!-- cp -->
            <section class="cp">







                <div class="bannier">
                    <div class="bg_bannier"></div>
                    <img src="/image/logo-mrc.jpeg" alt="" class="bg-logo">
                    <div class="press">
                        <div class="all-text">
                            <h2>DESORMAIS LA PAROLE EST Á VOUS ! </h2>
                            <p>Le monde vous écoute dès à présent Soutennez vos propos sans influence exterieur</p>
                        </div>
                        <div class="all-text">
                            <h2> VOUS ETES LA VOIE DU PEUPLE
                            </h2>
                            <p>Le monde vous écoute dès à présent Soutennez </p>
                        </div>

                    </div>
                </div>



                <!-- two -->
                <div class="two">
                    <aside class="contenu-principal">

                        <h2>
                            <p>Thématiques</p>
                        </h2>

                        <div class="thematique">

                            <div class="contain-theme">

                                <div class="theme">
                                    <img src="/image/educationFond_2.jpeg" alt="" class="bg-theme">
                                    <a href="<?= $infosSessionId ? '/add-article.php?cat=1' : '/login.php' ?>">
                                        <h4> EDUCATION</h4>
                                    </a>
                                    <span class="material-symbols-outlined">
                                        keyboard_double_arrow_right
                                    </span>
                                </div>
                                <div class="theme-present">
                                    <a href="<?= $infosSessionId ? '/add-article.php?sous_cat=101' : '/login.php' ?>">
                                        <span>Enseignement Primaire</span>
                                    </a>
                                    <a href="<?= $infosSessionId ? '/add-article.php?sous_cat=102' : '/login.php' ?>">
                                        <span>Enseignement Secondaire</span>
                                    </a>
                                    <a href="<?= $infosSessionId ? '/add-article.php?sous_cat=103' : '/login.php' ?>">
                                        <span>Enseignement Technique</span>
                                    </a>
                                    <a href="<?= $infosSessionId ? '/add-article.php?sous_cat=104' : '/login.php' ?>">
                                        <span>Formation & Formation Professionnelle</span>
                                    </a>
                                </div>
                            </div>

                            <div class="contain-theme">
                                <div class="theme">
                                    <img src="/image/scienceFond_1.jpeg" alt="" class="bg-theme">
                                    <a href="<?= $infosSessionId ? '/add-article.php?cat=2' : '/login.php' ?>">
                                        <h4> SCIENCE & TECHNIQUE</h4>
                                    </a>
                                    <span class="material-symbols-outlined">
                                        keyboard_double_arrow_right
                                    </span>
                                </div>
                                <div class="theme-present">
                                    <a href="<?= $infosSessionId ? '/add-article.php?sous_cat=201' : '/login.php' ?>">
                                        <span> Science</span>
                                    </a>
                                    <a href="<?= $infosSessionId ? '/add-article.php?sous_cat=201' : '/login.php' ?>">
                                        <span> Technologie</span>
                                    </a>
                                    <a href="<?= $infosSessionId ? '/add-article.php?sous_cat=201' : '/login.php' ?>">
                                        <span> Recherche</span>
                                    </a>
                                    <a href="<?= $infosSessionId ? '/add-article.php?sous_cat=201' : '/login.php' ?>">
                                        <span> Innovation</span>
                                    </a>
                                </div>
                            </div>

                            <div class="contain-theme">
                                <div class="theme">
                                    <img src="/image/medecineFond_2.jpeg" alt="" class="bg-theme">
                                    <a href="<?= $infosSessionId ? '/add-article.php?cat=3' : '/login.php' ?>">
                                        <h4> MEDECINE & SANTE</h4>
                                    </a>
                                    <span class="material-symbols-outlined">
                                        keyboard_double_arrow_right
                                    </span>
                                </div>
                                <div class="theme-present">
                                    <a href="<?= $infosSessionId ? '/add-article.php?sous_cat=301' : '/login.php' ?>">
                                        <span> Santé</span>
                                    </a>
                                    <a href="<?= $infosSessionId ? '/add-article.php?sous_cat=301' : '/login.php' ?>">
                                        <span> Recherche Pharmacetique</span>
                                    </a>
                                    <a href="<?= $infosSessionId ? '/add-article.php?sous_cat=301' : '/login.php' ?>">
                                        <span> Recherche Vétérinaire</span>
                                    </a>
                                </div>
                            </div>


                            <div class="contain-theme">
                                <div class="theme">
                                    <img src="/image/politique.jpeg" alt="" class="bg-theme">
                                    <a href="<?= $infosSessionId ? '/add-article.php?cat=3' : '/login.php' ?>">
                                        <h4>POLIQUE</h4>
                                    </a>
                                    <span class="material-symbols-outlined">
                                        keyboard_double_arrow_right
                                    </span>
                                </div>
                                <div class="theme-present">
                                    <a href="<?= $infosSessionId ? '/add-article.php?sous_cat=301' : '/login.php' ?>">
                                        <span> </span>
                                    </a>
                                    <a href="<?= $infosSessionId ? '/add-article.php?sous_cat=301' : '/login.php' ?>">
                                        <span> Recherche Pharmacetique</span>
                                    </a>
                                    <a href="<?= $infosSessionId ? '/add-article.php?sous_cat=301' : '/login.php' ?>">
                                        <span> Recherche Vétérinaire</span>
                                    </a>
                                </div>
                            </div>


                            <div class="contain-theme">
                                <div class="theme">
                                    <img src="/image/diplomatieFond_2.jpeg" alt="" class="bg-theme">
                                    <a href="<?= $infosSessionId ? '/add-article.php?cat=4' : '/login.php' ?>">
                                        <h4>DIPLÒMATIE</h4>
                                    </a>
                                </div>
                            </div>

                            <div class="contain-theme">
                                <div class="theme">
                                    <img src="/image/amenagementFondRead_2.jpg" alt="" class="bg-theme">
                                    <a href="<?= $infosSessionId ? '/add-article.php?cat=5' : '/login.php' ?>">
                                        <h4> AMÈNAGEMENT & INFRASTRUCTURE</h4>
                                    </a>
                                    <span class="material-symbols-outlined">
                                        keyboard_double_arrow_right
                                    </span>
                                </div>
                                <div class="theme-present">
                                    <a href="<?= $infosSessionId ? '/add-article.php?sous_cat=501' : '/login.php' ?>">
                                        <span> Téritoire</span>
                                    </a>
                                    <a href="<?= $infosSessionId ? '/add-article.php?sous_cat=501' : '/login.php' ?>">
                                        <span> infrastructure</span>
                                    </a>
                                    <a href="<?= $infosSessionId ? '/add-article.php?sous_cat=501' : '/login.php' ?>">
                                        <span> C.T.D</span>
                                    </a>
                                </div>
                            </div>

                            <div class="contain-theme">
                                <div class="theme">
                                    <img src="/image/defenceFond_3.jpeg" alt="" class="bg-theme">
                                    <a href="<?= $infosSessionId ? '/add-article.php?cat=6' : '/login.php' ?>">
                                        <h4> DEFENCE & SECURITE</h4>
                                    </a>
                                </div>
                            </div>

                            <div class="contain-theme">
                                <div class="theme">
                                    <img src="/image/economieFond_1.jpeg" alt="" class="bg-theme">
                                    <a href="<?= $infosSessionId ? '/add-article.php?cat=7' : '/login.php' ?>">
                                        <h4>ECONOMIE</h4>
                                    </a>
                                    <span class="material-symbols-outlined">
                                        keyboard_double_arrow_right
                                    </span>
                                </div>
                                <div class="theme-present">
                                    <a href="<?= $infosSessionId ? '/add-article.php?sous_cat=701' : '/login.php' ?>">
                                        <span> Production</span>
                                    </a>
                                    <a href="<?= $infosSessionId ? '/add-article.php?sous_cat=701' : '/login.php' ?>">
                                        <span> Transformation</span>
                                    </a>
                                    <a href="<?= $infosSessionId ? '/add-article.php?sous_cat=701' : '/login.php' ?>">
                                        <span> Distribution</span>
                                    </a>
                                </div>
                            </div>

                            <div class="contain-theme">
                                <div class="theme">
                                    <img src="/image/cultureFond_1.jpeg" alt="" class="bg-theme">
                                    <a href="<?= $infosSessionId ? '/add-article.php?cat=8' : '/login.php' ?>">
                                        <h4>CULTURE</h4>
                                    </a>
                                    <span class="material-symbols-outlined">
                                        keyboard_double_arrow_right
                                    </span>
                                </div>
                                <div class="theme-present">
                                    <a href="<?= $infosSessionId ? '/add-article.php?sous_cat=801' : '/login.php' ?>">
                                        <span> Tourisme</span>
                                    </a>
                                    <a href="<?= $infosSessionId ? '/add-article.php?sous_cat=801' : '/login.php' ?>">
                                        <span> Musique</span>
                                    </a>
                                    <a href="<?= $infosSessionId ? '/add-article.php?sous_cat=801' : '/login.php' ?>">
                                        <span> Art & Culture</span>
                                    </a>
                                </div>
                            </div>

                            <div class="contain-theme">
                                <div class="theme">
                                    <img src="/image/sportFond_2.jpeg" alt="" class="bg-theme">
                                    <a href="<?= $infosSessionId ? '/add-article.php?cat=9' : '/login.php' ?>">
                                        <h4>SPORT</h4>
                                    </a>
                                </div>
                            </div>



                            <div class="contain-theme">
                                <div class="theme add-theme">
                                    <a href="<?= $infosSessionId ? '/add-article.php?cat=new_cat' : '/login.php' ?>">
                                        <h4>PROPOSER <br>UN <br>THEME</h4>
                                    </a>
                                </div>
                            </div>

                        </div>









                        <div class="new-content-1">
                            <div class="contenu-1">
                                <h2>Partagez votre opinion et découvrez celui des autres !
                                </h2>
                                <p> Vous pouvez partager votre expérience, donner
                                    votre opinion , Ici , la liberté d'expression est un droit fondamental qui permet à
                                    chacun de s'exprimer librement sans craindre de représailles ou de censure. Elle est
                                    essentielle pour garantir la diversité des opinions et des idées, ainsi que pour
                                    promouvoir la transparence et la responsabilité
                                </p>
                            </div>



                            <h2 class="new-h2">
                                <p> Quelques avis </p>
                            </h2>

                            <!-- mini temoignage -->

                            <div class="texto">
                                <div class="horiz"></div>
                                <div class="all-message">
                                    <div class="contain-texto">
                                        <img src="/image/profil.png" alt="">
                                        <div class="texto-message">
                                            <div class="mes">
                                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi, sint
                                                totam. Assumenda esse atque consectetur est eos, quo, rerum iure a, vel
                                                commodi deleniti iste ex perspiciatis beatae nesciunt exercitationem.
                                            </div>
                                            <div class="infos-texto">
                                                <h4>Joe Birthon</h4>
                                                <p>
                                                    <span>il a<span>
                                                            <span>
                                                                <?= '2 jour '; ?>
                                                            </span>
                                                </p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="contain-texto">
                                        <img src="/image/profil.png" alt="">
                                        <div class="texto-message">
                                            <div class="mes">
                                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi, sint
                                                totam. Assumenda esse atque consectetur est eos, quo, rerum iure a, vel
                                                commodi deleniti iste ex perspiciatis beatae nesciunt exercitationem.
                                            </div>
                                            <div class="infos-texto">
                                                <h4>Joe Birthon</h4>
                                                <p>
                                                    <span>il a<span>
                                                            <span>
                                                                <?= '2 jour '; ?>
                                                            </span>
                                                </p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="contain-texto">
                                        <img src="/image/profil.png" alt="">
                                        <div class="texto-message">
                                            <div class="mes">
                                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi, sint
                                                totam. Assumenda esse atque consectetur est eos, quo, rerum iure a, vel
                                                commodi deleniti iste ex perspiciatis beatae nesciunt exercitationem.
                                            </div>
                                            <div class="infos-texto">
                                                <h4>Joe Birthon</h4>
                                                <p>
                                                    <span>il a<span>
                                                            <span>
                                                                <?= '2 jour '; ?>
                                                            </span>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="contenu-1">
                                <h2>Nous soutenons votre voie </h2>
                                <ul>
                                    <li class="member"><img src="/image/member_2.jpeg" alt=""></li>
                                    <li class="member"><img src="/image/member_1.jpeg" alt=""></li>
                                    <li class="member"><img src="/image/member_3.jpeg" alt=""></li>
                                    <li class="member"><img src="/image/member_4.jpeg" alt=""></li>
                                    <li class="member"><img src="/image/member_5.jpeg" alt=""></li>
                                </ul>
                            </div>
                        </div>
                    </aside>






                    <!-- aside form -->
                    <aside class="contain-presentation">


                        <?php

                        $connexionZone = <<<"text"
                     <form action="/" method="POST">

                            <div class="zone"><span class="material-symbols-outlined">
                                    account_circle
                                </span></div>

                            <div class="btn-google " data-onsuccess="onSignIn"
                                data-scope="https://www.googleapis.com/auth/userinfo.email https://www.googleapis.com/auth/userinfo.profile"
                                data-clientid="YOUR_CLIENT_ID"> <img src="/image/google.png" alt=""> Continu avec Google
                            </div>

                            <div class="mini-text">
                                <hr>
                                <p>Simple connexion</p>
                                <hr>
                            </div>

                            <input type="text" name="email" placeholder=" Votre Email">
                            <input type="text" name="tel" placeholder=" Votre telephone">
                            <input type="password" name="pwd" class="pwd"placeholder="Votre Mot de passe">
                            <button class="btn form-connexion">CONNEXION</button>
                        </form>

                    text;

                        echo $infosSessionId ? ' <img src="/image/rester-anonym.png"/>' : $connexionZone;

                        ?>




                        <div class="text_about">



                            <h2>Pourquoi choisir votre Avis ?</h2>
                            <br><br>
                            <p>Nous considèrons votre avis et ,tenons à ce qu'il ne sois plus qu'une simple opignion
                                mais une
                                action
                                réel et implémentable pour l'avancement et le développement du Camenoun.
                            <p>
                            <h3>Nous sommes au service du plus grand nombre et vous pouvez y être compté comme membre
                            </h3>
                        </div>
                    </aside>

                </div>





            </section>









            <!-- tree -->
            <section class="tree">
                <div class="contain-tree">

                    <h3>Laissez votre opignion sur toute vos observations !....
                        <a href="<?= $infosSessionId ? '/profil.php' : '/connexion.php' ?>"
                            class="<?= !$infosSessionId ? '' : 'inscription'; ?>">
                            <button class="btn btn-singin">S'INSCRIR</button>
                        </a>
                    </h3>

                    <!-- <button class="btn btn-article"> Votre opignion </button> -->
                    <p>Et si vous êtes inspirez alors n'hèsitez pas proposer un nouveau thème
                        <a href="<?= $infosSessionId ? '/contributions.php' : '/login.php' ?>"
                            class="<?= !$infosSessionId ? '' : 'contributeur'; ?>">
                            <button class="btn btn-addTheme">CONTRIBUTIONS</button>
                        </a>
                    </p>

                </div>
            </section>








            <!-- 
            #####################
              footer
            #####################
        -->

            <footer>

                <div class="new">
                    <div class="text-new">
                        <h2> Notre new letter disponible</h2>
                        <p>Abonnez vous à notre new letter pour recevoir des conseils et connaitre le nouveautés sur les
                            normes en vigueurs</p>
                    </div>
                    <div class="abonnement">
                        <input type="text" placeholder="exemple@XYZ.com">
                        <button class="btn btn-yellow">S'ABONNER</button>
                    </div>
                </div>

                <hr>

                <div class="contain-footer">
                    <div class="about-footer">
                        <h3>À Propos de nous </h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Unde, doloribus nesciunt voluptatum
                            quod quisquam perspiciatis facere odit temporibus velit vero iusto illo facilis. Veritatis
                            iste,
                            tempora nam harum illo est.</p>
                    </div>


                    <div class="about-footer">
                        <h3>Notre compagnie </h3>
                        <button class="btn btn-simple">REJOINDRE NOTRE COMPAGNIE</button>
                        <img src="/image/bannier_1.jpeg" alt="">
                        <h4>travaillez quelque soit le domaine </h4>
                        <i>
                            <span class="material-symbols-outlined">
                                calendar_month
                            </span>
                            February 8, 2023
                        </i>
                    </div>
                    <div class="about-footer">
                        <h3>Plus d'infos </h3>
                        <div class="link">
                            <a href="/">Carrièr <span class="material-symbols-outlined fleche">
                                    arrow_outward
                                </span></a>
                            <a href="/">Service <span class="material-symbols-outlined fleche">
                                    arrow_outward
                                </span></a>
                            <a href="/">blog <span class="material-symbols-outlined fleche">
                                    arrow_outward
                                </span></a>
                            <a href="/">Gallerie <span class="material-symbols-outlined fleche">
                                    arrow_outward
                                </span></a>
                            <a href="/">Plus de contact <span class="material-symbols-outlined fleche">
                                    arrow_outward
                                </span></a>
                        </div>
                    </div>
                    <div class="about-footer">
                        <h3> Contact info </h3>


                        <div class="contact">
                            <span class="material-symbols-outlined">
                                schedule
                            </span>
                            <div>
                                <h5>Notre présence </h5>
                                <p> 7j / 7 de 7h30 à 18h30 </p>
                            </div>
                        </div>

                        <div class="contact">
                            <span class="material-symbols-outlined">
                                schedule
                            </span>
                            <div>
                                <h5> E-mail: compagnie@gmail.com</h5>
                            </div>
                        </div>

                        <div class="contact-map">
                            <div>
                                <span class="material-symbols-outlined">
                                    location_on
                                </span>
                                <h5> Notre position </h5>
                            </div>
                            <div class="map">
                                <iframe class="maping"
                                    src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d63692.52030815844!2d11.5113984!3d3.8567936!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sfr!2scm!4v1694607941104!5m2!1sfr!2scm"
                                    width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                                    referrerpolicy="no-referrer-when-downgrade"></iframe>
                            </div>
                        </div>
                    </div>
                </div>

                <hr>
                <div class="final-footer">
                    <div class="contain-final">
                        <img src="/image/icon/one_logo.png" alt="" class="mini-logo">
                        <div>
                            <div class="new-nav">
                                <a href="" class="active-footer">
                                    <h6>ACCEUIL</h6>
                                </a>
                                <a href="">
                                    <h6>AUTRE SERVICES</h6>
                                </a>
                                <a href="">
                                    <h6>PROJET</h6>
                                </a>
                                <a href="">
                                    <h6>GALLERIE</h6>
                                </a>
                                <a href="">
                                    <h6>À PROPOS DE NOUS ?</h6>
                                </a>
                                <a href="">
                                    <h6>CONTACT</h6>
                                </a>
                            </div>
                            <p class="corpiright"> Par CamCode &#169;Tout droit reservé </p>
                        </div>
                    </div>
                    <div class="social-media">

                    </div>
                </div>

            </footer>
        </main>

        <script src="/public/js/index.js"></script>
    </body>

    </html>
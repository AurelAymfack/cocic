

<?php

$infosSessionId = $_COOKIE['session'] ?? '';

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
        <link rel="stylesheet" href="/public/style/style.css">
        <title>COCIC | ACCUIl</title>
    </head>

    <body>

        <!-- log in -->

        <section class="connected">
            <form action="/" method="POST" class="login">
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
                    <hr>
                    <p>Simple connexion</p>
                    <hr>
                </div>

                <input type="text" name="email" placeholder=" Votre Email">
                <input type="text" name="tel" placeholder=" Votre telephone">
                <input type="password" name="pwd" placeholder="Votre Mot de passe">
                <button class="btn form-connexion">CONNEXION</button>
            </form>
        </section>


        <main>

            <section class="one">
                <div class="contain-one">
                    <div class="contain-one-logo">
                        <a href="/"><img src="/image/logo.jpeg" alt=""></a>
                        <h1> <span style=" color:rgb(0, 189, 0)">Á VOUS </span><span style=" color:#ff0000">LA
                            </span><span style=" color:rgb(255, 196, 0)">PAROLE</span> </h1>

                    </div>

                    <div class="contain-one-action">
                        <?= $infosSessionId ? '' : ' <a href="/connexion.php"><button class="btn btn-inscription"> S\'inscrir</button></a>'; ?>
                        <span class="material-symbols-outlined">
                            account_circle
                        </span>
                        <?= $infosSessionId ? ' <a href="/logout.php"><button class="btn btn-logout">Log out</button></a>' : ' <button class="btn connexion">Log in</button>'; ?>
                    </div>
                </div>
            </section>


            <header>
                <div class="contain-header">
                    <nav>
                        <a href="/">
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

            </header>







            <!-- cp -->
            <section class="cp">

                <div class="new-content-1">
                    <!-- <div class="contenu-1">
                        <h2>Partagez votre opinion et découvrez celui des autres !
                        </h2>
                        <p>Ici, vous pouvez partager vos expériences, donner
                            votre opinion car , La liberté d'expression est un droit fondamental qui permet à
                            chacun de s'exprimer librement sans craindre de représailles ou de censure. Elle est
                            essentielle pour garantir la diversité des opinions et des idées, ainsi que pour
                            promouvoir la transparence et la responsabilité
                        </p>
                    </div>
 -->

                    <div class="contenu-1">
                        <h2>Nous soutenons votre voie </h2>
                        <p>Ici, vous pouvez partager vos expériences, donner
                            votre opinion car , La liberté d'expression est un droit fondamental qui permet à
                            chacun de s'exprimer librement sans craindre de représailles ou de censure. Elle est
                            essentielle pour garantir la diversité des opinions et des idées, ainsi que pour
                            promouvoir la transparence et la responsabilité
                        </p>
                        <ul>
                            <li class="member"><img src="/image/member_2.jpeg" alt=""></li>
                            <li class="member"><img src="/image/member_1.jpeg" alt=""></li>
                            <li class="member"><img src="/image/member_3.jpeg" alt=""></li>
                            <li class="member"><img src="/image/member_4.jpeg" alt=""></li>
                            <li class="member"><img src="/image/member_5.jpeg" alt=""></li>
                        </ul>
                        <h2>Unie pour la renaissance du Cameroun </h2>
                        <span class="material-symbols-outlined">
                            diversity_2
                        </span>
                    </div>
                </div>
                </div>
                </aside>






                <!-- aside form -->
                <!-- <aside class="contain-presentation">

                    </aside> -->

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
                        quod quisquam perspiciatis facere odit temporibus velit vero iusto illo facilis. Veritatis iste,
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
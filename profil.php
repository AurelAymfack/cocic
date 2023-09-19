

<?php

if ($sessionId = $_COOKIE['session']) {

    $pdo = require_once './pdo.php';
    $stat = $pdo->prepare('SELECT * FROM user WHERE iduser=:id');
    $stat->bindvalue(':id', $sessionId);


    $stat->execute();
    $user = $stat->fetch();


} else {
    header('location:/');
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

        <main>
            <section class="one">
                <div class="contain-one">
                    <div class="contain-one-logo">
                        <a href="/"><img src="/image/logo.jpeg" alt=""></a>
                        <h1> <span style=" color:rgb(0, 189, 0)">Á VOUS </span><span style=" color:#ff0000">LA
                            </span><span style=" color:rgb(255, 196, 0)">PAROLE</span> </h1>

                    </div>

                    <div class="contain-one-action">
                        <span class="material-symbols-outlined">
                            account_circle
                        </span>
                        <div>
                         <a href="/logout.php" ><button class="btn btn-logout">Log-out</button></a>
                        </div>
                    </div>
                </div>
            </section>


            <header>
                <div class="contain-header">
                    <nav>
                        <a href="/"><span class="material-symbols-outlined">
                                home
                            </span>ACCEUIL
                        </a>
                        <a href="/contributions.php" class="hot">CONTRIBUTIONS
                            <span class="material-symbols-outlined">
                                arrow_drop_down
                            </span>
                        </a>
                        <a href="/poste.php">Poste</a>

                    </nav>
                </div>
                <a href="/add-article.php" class="contain-header-action">
                    <button class="btn btn-article">Ècrir un article </button>
                </a>

            </header>













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
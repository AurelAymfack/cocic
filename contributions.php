<?php

$infosSessionId = $_COOKIE['session'];
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
        <link rel="stylesheet" href="public/style/add-article.css">
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
                            <a href="/logout.php"> <button class="btn btn-logout">Log-out</button></a>
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





            <!-- cp -->
            <section class="cp">










                <!-- two -->
                <div class="two">
                    <aside class="contenu-principal">

                        <h2>
                            <p>Les thématiques</p>
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

                        </div>


                    </aside>


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




            <!-- new footer -->

            <section class="new-footer">

            </section>
        </main>

        <script src="/public/js/index.js"></script>
    </body>

</html>
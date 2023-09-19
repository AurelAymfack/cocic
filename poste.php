<?php

// print_r($_COOKIE['session']);
$infosSessionId = $_COOKIE['session'];
$dns = 'mysql:host=localhost;dbname=cocic';
$user = 'aurel10';
$pwd = 'Aurel10Motdepasse;';

try {

    $pdo = new PDO($dns, $user, $pwd, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);

    $statement = $pdo->prepare('SELECT user.nom ,user.prenom ,articles.* FROM  articles join user ON user.iduser=articles.auteur');
    // $statement->bindValue(':id', $infosSessionId);
    $statement->execute();
    $article = $statement->fetchall();

} catch (PDOException $e) {
    echo 'error : ' . $e;
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
                <!-- <a href="/add-article.php" class="contain-header-action">
                    <button class="btn btn-article">Ècrir un article </button>
                </a> -->

            </header>





            <!-- cp -->
            <section class="cp">







                <div class="bannier">
                    <div class="bg_bannier"></div>
                    <img src="/image/logo-mrc.jpeg" alt="" class="bg-logo">
                    <div class="press">
                        <div class="all-text">
                            <h2>Désormais la parole est à vous ! </h2>
                            <p>Le monde vous écoute dès à présent Soutennez vos propos sans influence exterieur</p>
                        </div>
                        <div class="all-text">
                            <h2> Soyez libre ,dites ce que vous pensé
                            </h2>
                            <p>Le monde vous écoute dès à présent Soutennez </p>
                        </div>

                    </div>
                </div>



                <!-- two -->
                <div class="two">
                    <aside class="contenu-principal">

                        <h2>
                            <p> Quelques article </p>
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


                        <div class="mini-actu">

                            <div class="article">
                                <div class="article-info">
                                    <span class="article-author">Auteur :
                                        <?= $article['nom'], $article['prenom'] ?>
                                    </span>
                                </div>
                                <div class="article-content">
                                    <p>
                                        <?= $article['contenu'] ?>
                                    </p>
                                </div>
                                <div class="article-footer">
                                    <span class="article-category">Théme :
                                        <?= $article['categorie'] ?>
                                    </span>
                                    <span class="article-date">Publié le :
                                        <?= $article['dates'] ?>
                                    </span>
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
        </main>

        <script src="/public/js/index.js"></script>
    </body>

</html>
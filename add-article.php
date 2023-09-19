<pre>

<?php


$error = [
    'errorVide' => '',
    'errorContenu' => ''
];

$infosSessionId = $_COOKIE['session'];


$cat = $_GET['cat'] ? $_GET['cat'] : '';
$sous_cat = $_GET['sous_cat'] ? $_GET['sous_cat'] : '';

echo $cat, $sous_cat;

$dns = 'mysql:host=localhost;dbname=cocic';
$user = 'aurel10';
$pwd = 'Aurel10Motdepasse;';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_POST = filter_input_array(INPUT_POST, [
        'titre' => FILTER_SANITIZE_STRING,
        'categorie' => FILTER_SANITIZE_STRING,
        'contenu' => [
            'filter' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
            'flag' => FILTER_FLAG_NO_ENCODE_QUOTES
        ],
    ]);

    $titre = $_POST['titre'] ?? '';
    $categorie = $_POST['categorie'] ?? '';
    $contenu = $_POST['contenu'] ?? '';
    $date = date('d/m/Y  à  G:i:s');

    if (!$titre || !$contenu) {
        $error['errorVide'] = 'Renseigner tout les champs s\'il vous plaît';
    } else {
        $error['errorVide'] = '';
    }

    if (mb_strlen($contenu) < 30 && $contenu !== '') {
        $error['errorContenu'] = 'votre contenu est trop petit <br> il doit faire au moin  30 caractères';
    } else {
        $error['errorContenu'] = '';
    }

    echo $date;
    if (!$error['errorVide'] && !$error['errorContenu']) {


        try {
            $pdo = new PDO($dns, $user, $pwd, [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                pdo::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
            ]);

            $statement = $pdo->prepare('INSERT INTO articles(
                titre, categorie , contenu ,auteur, dates
            ) VALUES(
                :titre, :categorie, :contenu, :auteur ,:dates
            )');
            $statement->bindvalue(':titre', $titre);
            $statement->bindvalue(':categorie', $categorie);
            $statement->bindvalue(':contenu', $contenu);
            $statement->bindvalue(':auteur', $infosSessionId);
            $statement->bindValue(':dates', $date);

            $statement->execute();


            $titre = '';
            $categorie = '';
            $contenu = '';

            header('location:/poste.php');

        } catch (PDOException $e) {
            echo 'error : faire quelque chose' . $e;
        }

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
                         <a href="/logout.php">   <button  class="btn btn-logout">Log-out</button></a>
                        </div>
                    </div>
                </div>
            </section>


            <header>
                <div class="contain-header">
                    <nav>
                        <a href="/"><span class="material-symbols-outlined">
                                home
                            </span>TABLEAU DE BORD
                        </a>
                    </nav>
                </div>
                <!-- <a href="/add-article.php" class="contain-header-action">
                    <button class="btn btn-article">Ècrir un article </button>
                </a> -->

            </header>





            <!-- read article -->



            <section class="read-article">

                <form action="/add-article.php<?= '?id=' . $id; ?>" method="POST">

                    <h3>
                        <?= $pdoUser['nom']; ?>
                        <p>
                            <?= $pdoUser['email']; ?>
                        </p>
                    </h3>

                    <div class="all-input">
                        <div class="error">
                            <?= $error['errorVide']; ?>
                        </div>

                        <input type="text" name="titre" placeholder="Titre de l'article" value="<?= $titre; ?>">

                        <select name="categorie">

                            <!-- categorie politique -->
                            <option value="politique" <?= $cat === '10' ? 'selected ' : ''; ?>>--Politique et
                                constitution--</option>


                            <!-- categorie science  -->
                            <option value="science" <?= $cat === '2' ? 'selected' : ''; ?>>
                                -- Science/Tehnique--
                            </option>
                            <option value="science" <?= $sous_cat === '201' ? 'selected ' : ''; ?>>Science
                            </option>
                            <option value="science" <?= $sous_cat === '201' ? 'selected ' : ''; ?>>Technique
                            </option>
                            <option value="science" <?= $sous_cat === '201' ? 'selected ' : ''; ?>>Recherche
                            </option>
                            <option value="science" <?= $sous_cat === '201' ? 'selected ' : ''; ?>>Innovation
                            </option>




                            <option value="diplomatie" <?= $cat === '4' ? 'selected ' : ''; ?>>--Diplômatie--
                            </option>


                            <!-- catégorie medecine -->
                            <option value="medecine" <?= $cat === '3' ? 'selected ' : ''; ?>>--Médécine et Santé--
                            </option>
                            <option value="medecine" <?= $sous_cat === '301' ? 'selected ' : ''; ?>>Santé
                            </option>
                            <option value="medecine" <?= $sous_cat === '301' ? 'selected ' : ''; ?>>Recherche
                                Pharmacetique
                            </option>Enseignement primaire
                            <option value="medecine" <?= $sous_cat === '301' ? 'selected ' : ''; ?>>Recherche Vétérinaire
                            </option>


                            <!-- categorie amenagement -->
                            <option value="amenagement" <?= $cat === '5' ? 'selected ' : ''; ?>>--Aménagnement et
                                infrastructure--
                            </option>
                            <option value="amenagement" <?= $sous_cat === '501' ? 'selected ' : ''; ?>>Térritoire
                            </option>
                            <option value="amenagement" <?= $sous_cat === '501' ? 'selected ' : ''; ?>>Infrastructure
                            </option>
                            <option value="amenagement" <?= $sous_cat === '501' ? 'selected ' : ''; ?>>C.T:D
                            </option>


                            <option value="defence_secur" <?= $cat === '6' ? 'selected ' : ''; ?>>--Defence et securité--
                            </option>


                            <option value="sport" <?= $cat === '9' ? 'selected ' : ''; ?>>--Sport--
                            </option>


                            <!-- catégorie education -->
                            <option value="education" <?= $cat === '1' ? 'selected ' : ''; ?>>--Education--
                            </option>
                            <option value="education" <?= $sous_cat === '101' ? 'selected ' : ''; ?>>Enseignement primaire
                            </option>
                            <option value="education" <?= $sous_cat === '102' ? 'selected ' : ''; ?>>Enseignement
                                secondaire
                            </option>
                            <option value="education" <?= $sous_cat === '103' ? 'selected ' : ''; ?>>Enseignement technique
                            </option>
                            <option value="education" <?= $sous_cat === '104' ? 'selected ' : ''; ?>>Formartion
                                professionnelle
                            </option>




                            <!-- categorie culture -->
                            <option value="culture" <?= $cat === '8' ? 'selected ' : ''; ?>>--Cultures--
                            </option>
                            <option value="culture" <?= $sous_cat === '803' ? 'selected ' : ''; ?>>Tourisme
                            </option>
                            <option value="culture" <?= $sous_cat === '803' ? 'selected ' : ''; ?>>Musique
                            </option>
                            <option value="culture" <?= $sous_cat === '803' ? 'selected ' : ''; ?>>Art et culture
                            </option>
                            <option value="culture" <?= $sous_cat === '803' ? 'selected ' : ''; ?>>Tradittion et culture
                            </option>


                            <option value="economie" <?= $cat === '7' ? 'selected ' : ''; ?>>--Economie--</option>


                            <option value="autres" <?= $cat === '0' ? 'selected ' : ''; ?>>--Autres--</option>
                        </select>


                        <textarea name="contenu" placeholder="Ecrir l'article"><?= $contenu ?></textarea>

                        <div class="errorContenu">
                            <?= $error['errorContenu']; ?>
                        </div>

                    </div>
                    <div class="contain-btn">
                        <button class="btn btn-submit">Publier l'article</button>

                    </div>
                    <!-- <i>La passion de l'écriture ! et l'écriture qui passione </i> -->
                </form>
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
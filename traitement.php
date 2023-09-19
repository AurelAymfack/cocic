
<?php
session_start();

// Tableau associatif des utilisateurs (simulé pour l'exemple)
$utilisateurs = [
    [
        'id' => 1,
        'nom_utilisateur' => 'alice',
        'mot_de_passe' => 'alice123'
    ],
    [
        'id' => 2,
        'nom_utilisateur' => 'bob',
        'mot_de_passe' => 'bob456'
    ]
];

// Configuration de la base de données (simulée pour l'exemple)
$bdd_host = 'localhost';
$bdd_nom_utilisateur = 'votre_nom_utilisateur';
$bdd_mot_de_passe = 'votre_mot_de_passe';
$bdd_nom_base_de_donnees = 'votre_base_de_donnees';

// Vérifier si l'utilisateur est déjà connecté
// if (isset($_SESSION['user_id'])) {
//     // Rediriger l'utilisateur vers la page de connexion
//     header("Location: /index.php");
//     exit;
// }

// Vérifier si le formulaire de connexion a été soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérer les données du formulaire
    $username = $_POST['name'];
    $password = $_POST['pwd'];

    // Vérifier les informations d'identification de l'utilisateur
    foreach ($utilisateurs as $utilisateur) {
        if ($utilisateur['nom_utilisateur'] === $username && $utilisateur['mot_de_passe'] === $password) {
            // Authentification réussie

            // Stocker l'ID de l'utilisateur dans la session
            $_SESSION['user_id'] = $utilisateur['id'];

            // Rediriger l'utilisateur vers la page de tableau de bord
            header("Location: /profil.php");
            exit;
        }
    }

    // Authentification échouée
    echo 'Erreur d\'authentification. Veuillez vérifier vos informations d\'identification.';
}






// Récupérer les données du formulaire d'inscription
$nom = $_POST['nom'];
$email = '10aurelaymfack@gmail.com';

// Générer un code de confirmation unique
$code_confirmation = md5(uniqid());

// Enregistrer le code de confirmation dans la base de données
$code = $code_confirmation;

// Envoyer l'e-mail de confirmation
$destinataire = $email;
$sujet = "Confirmation d'inscription sur notre site";
$message = "Bonjour $nom,\n\n";
$message .= "Merci de vous être inscrit sur notre site. Pour activer votre compte, veuillez cliquer sur le lien suivant :\n\n";
$message .= "http://www.monsite.com/confirmation.php?code=$code_confirmation\n\n";
$message .= "Cordialement,\n";
$message .= "L'équipe de monsite.com";

$headers = "From: webmaster@monsite.com\r\n";
$headers .= "Reply-To: webmaster@monsite.com\r\n";
$headers .= "Content-Type: text/plain; charset=\"utf-8\"\r\n";
$headers .= "Content-Transfer-Encoding: 8bit\r\n";

mail($destinataire, $sujet, $message, $headers);
?>

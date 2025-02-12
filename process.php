<?php

session_start();
$countries = require './config/countries.php';
require './core/validation.php';


check_required('email');
check_required('vemail');
check_email('email');
check_phone('phone');
var_dump($_SESSION);
die();
check_same('veamil', 'email');
// check_min('phone', 9);
check_in_collection('country', 'countries');

/*
 * Valider les champs
 */
$email = '';
$vemail = '';

// Email
if (array_key_exists('email', $_REQUEST)) {
    $email = trim($_REQUEST['email']);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['errors']['email'] = 'L’email doit être un email';
    }
} else {
    $_SESSION['errors']['email'] = 'L’email est requis';
}

// Vemail
if (array_key_exists('vemail', $_REQUEST)) {
    $vemail = trim($_REQUEST['vemail']);
    if ($email !== $vemail) {
        $_SESSION['errors']['vemail'] = 'L’email doit être confirmé';
    }
} else {
    $_SESSION['errors']['vemail'] = 'L’email de confirmation est requis';
}

// Phone
if (array_key_exists('phone', $_REQUEST)) {
    if (strlen($_REQUEST['phone']) >= 9 ||
        !is_numeric(str_replace(['+', '(', ')', ' '], '', $_REQUEST['phone']))) {
        $_SESSION['errors']['phone'] = 'Le numéro de téléphone doit être valide';
    }
}

// Country
if (array_key_exists('country', $_REQUEST)) {
    /** @var array $countries */
    if (!array_key_exists($_REQUEST['country'], $countries)) {
        $_SESSION['errors']['country'] = 'Le pays sélectionné n’est pas valide';
    }
}

/*
 * S’il y a des erreurs, on redirige vers la page du formulaire, en mémorisant le temps d'une requête les erreurs et les anciennes données
 */

if (isset($_SESSION['errors'])) {
    $_SESSION['old'] = $_REQUEST;
    header('Location: /index.php');
    exit;
}


/*
 * Assurer le rendu récapitulatif des données soumises
 */

?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="description"
          content="Récapitulatif de votre déclaration de perte de votre animal">
    <meta name="keywords"
          content="animal, animal perdu, déclaration">
    <meta name="author"
          content="Camara Mohamed">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible"
          content="ie=edge">
    <title>Récupitulatif de votre déclaration de perte d’un animal</title>
</head>
<body>
<h1>Récapitulatif des données soumises</h1>
<dl>
    <div>
        <dt>Email&nbsp;:</dt>
        <dd><?= $email ?></dd>
        <dt>Numéro de téléphone&nbsp;:</dt>
        <dd><?= $phone ?></dd>
        <dt>Pays&nbsp;:</dt>
        <dd></dd>
    </div>
</dl>
</body>
</html>
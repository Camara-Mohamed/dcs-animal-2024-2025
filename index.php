<?php

session_start() ?>
    <!DOCTYPE html>
    <html lang="fr">

    <head>
        <meta charset="utf-8">
        <meta name="description"
              content="Vous avez perdu un animal ? Signalez-le nous via ce formulaire">
        <meta name="keywords"
              content="animal, animal perdu, déclaration">
        <meta name="author"
              content="Camara Mohamed">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible"
              content="ie=edge">
        <title>J’ai perdu mon animal</title>
    </head>
    <body>
    <h1>Déclaration de perte d'animal</h1>
    <form action="/process.php"
          method="post">
        <fieldset>
            <legend>Vos coordonnées</legend>

            <!--Email-->
            <div>
                <label for="email"><abbr title="requis">*</abbr>&nbsp;Email</label>
                <input type="email"
                       name="email"
                       id="email"
                    <?php
                    if (isset($_SESSION['old']['email'])): ?>
                        value="<?= $_SESSION['old']['email'] ?>"
                    <?php
                    endif; ?>
                       required>
            </div>
            <?php
            if (isset($_SESSION['errors']['email'])): ?>
                <div><p><?= $_SESSION['errors']['email'] ?></p></div>
            <?php
            endif; ?>

            <!--Vérification Email-->
            <div>
                <label for="vemail"><abbr title="requis">*</abbr>&nbsp;Retapez votre email une seconde
                    fois</label>
                <input type="email"
                       name="vemail"
                       id="vemail"
                    <?php
                    if (isset($_SESSION['old']['vemail'])): ?>
                        value="<?= $_SESSION['old']['vemail'] ?>"
                    <?php
                    endif; ?>
                       required>
            </div>
            <?php
            if (isset($_SESSION['errors']['vemail'])): ?>
                <div><p><?= $_SESSION['errors']['vemail'] ?></p></div>
            <?php
            endif; ?>

            <!--Téléphone-->
            <div>
                <label for="phone">Téléphone</label>
                <input type="tel"
                       name="phone"
                       id="phone"
                    <?php
                    if (isset($_SESSION['old']['phone'])): ?>
                        value="<?= $_SESSION['old']['phone'] ?>"
                    <?php
                    endif; ?>
                       pattern="^\+?[0-9]{7,15}$">
            </div>
            <?php
            if (isset($_SESSION['errors']['phone'])): ?>
                <div><p><?= $_SESSION['errors']['phone'] ?></p></div>
            <?php
            endif; ?>

            <!-- Pays -->
            <div>
                <label for="country">Pays</label>
                <select name="country" id="country">
                    <option value="">Sélectionnez votre pays</option>
                    <option value="BE" <?= isset($_SESSION['old']['country']) ?>>Belgique</option>
                    <option value="FR" <?= isset($_SESSION['old']['country']) ?>>France</option>
                    <option value="NL" <?= isset($_SESSION['old']['country']) ?>>Pays-Bas</option>
                    <option value="DE" <?= isset($_SESSION['old']['country']) ?>>Allemagne</option>
                    <option value="LU" <?= isset($_SESSION['old']['country']) ?>>Luxembourg</option>
                </select>
                <?php
                if (isset($_SESSION['errors']['country'])): ?>
                    <div><p><?= $_SESSION['errors']['country'] ?></p></div>
                <?php
                endif; ?>
            </div>
        </fieldset>
        <button type="submit">Déclarer mon animal</button>
    </form>
    </body>
    </html>
<?php
$_SESSION['errors'] = null;
$_SESSION['old'] = null;
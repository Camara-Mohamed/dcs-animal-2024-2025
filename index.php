<?php session_start() ?>

    <!DOCTYPE html>
    <html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="description" content="Description">
        <meta name="keywords" content="Keywords">
        <meta name="author" content="Author">
        <title>J’ai perdu mon animal</title>
    </head>
    <body>
    <h1>Déclaration de perte d'animal</h1>
    <form action="/process.php" method="post">
        <fieldset>
            <legend>Vos coordonnées&nbsp;:</legend>
            <div>
                <label for="email">*Email</label>
                <input type="email"
                       name="email"
                       id="email"
                    <?php
                    if (isset($_SESSION['errors']['email'])): ?>
                        value="<?php $_SESSION['old']['email'] ?>"
                    <?php endif; ?>
                       required>
            </div>
            <?php if (isset($_SESSION['errors']['email'])): ?>
                <div><p><?= $_SESSION['errors']['email'] ?></p></div>
            <?php endif; ?>
            <div>
                <label for="vemail">*Retapez votre email une seconde fois</label>
                <input type="email"
                       name="vemail"
                       id="vemail"
                    <?php
                    if (isset($_SESSION['errors']['vemail'])): ?>
                        value="<?php $_SESSION['old']['vemail'] ?>"
                    <?php endif; ?>
                       required>
            </div>
            <?php if (isset($_SESSION['errors']['vemail'])): ?>
                <div><p><?= $_SESSION['errors']['vemail'] ?></p></div>
            <?php endif; ?>
        </fieldset>
        <button type="submit">Déclarer mon animal</button>
    </form>
    </body>
    </html>

<?php
$_SESSION['errors'] = null;
$_SESSION['old'] = null;
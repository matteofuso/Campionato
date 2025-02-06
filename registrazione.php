<?php
require 'utils/Database.php';
require 'utils/Helpers.php';
$config = require 'config.php';
$title = 'Registrazione';
Database::connect($config);
?>

<?php require 'componenti/header.php';?>
<?php require 'componenti/alert.php';?>

<section>
    <form method="post" action="actions/inserisci_pilota.php">
        <h1>Registrazione</h1>
        <p>Inserisci i dati del pilota</p>
        <?php require 'form/pilota.php';?>
        <input type="submit" class="btn btn-primary" value="Registra il pilota">
    </form>
</section>

<script src="scripts/form.js"></script>
<?php require 'componenti/footer.php'; ?>

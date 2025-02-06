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
    <form method="post" action="actions/inserisci_gara.php">
        <h1>Creazione gare</h1>
        <p>Inserisci i dati della gara</p>
        <?php require 'form/gara.php';?>
        <input type="submit" class="btn btn-primary" value="Inserisci la gara">
    </form>
</section>

<script src="scripts/form.js"></script>
<?php require 'componenti/footer.php'; ?>

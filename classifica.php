<?php
require 'utils/Database.php';
require 'utils/Helpers.php';
$config = require 'config.php';
Database::connect($config);
?>

<?php require 'componenti/header.php';?>
<?php require 'componenti/alert.php';?>

<section>
    <h1>Classifica generale</h1>
    <?php
    try{
        $gare = Database::select(<<<SQL
            select dense_rank() over (order by punteggio desc), p2.nome, p2.cognome, p2.nazionalita, p2.casa_automobilistica, sum(p.punteggio) as punteggio from partecipazioni p
            join piloti p2 on p.pilota = p2.numero
            join gare g on g.id = p.gara
            group by p.pilota;
        SQL);
        Helpers::printTable(['Posizione', 'Nome', 'Cognome', 'Nazionalità', 'Scuderia', 'Punteggio'], $gare);
    } catch (Exception $e) {
        echo '<p>Errore nel recupero dei dati</p>';
    }
    ?>
</section>

<?php require 'componenti/footer.php'; ?>

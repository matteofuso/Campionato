<section class="mb-4">
    <h1>Gestisci i piloti</h1>
    <p>Seleziona il pilota per da iscriverlo ad'una gare</p>
    <?php
    try {
        $piloti = Database::select("select p.*, ca.livrea from piloti p join case_automobilistiche ca on p.casa_automobilistica = ca.nome;");
        Helpers::printTable(['ID', 'Nome', 'Cognome', 'Nazionalità', 'Scuderia', 'Colore livrea', 'Azione'], $piloti, [
            function($row) {return '<button class="btn btn-primary btn-sm me-2 px-2" onclick="window.location=\'?pilota=' . $row->numero . '\'"><i class="bi bi-box-arrow-in-right"></i></button>';}
        ]);
    } catch (Exception $e) {
        echo '<p>Errore nel recupero dei dati</p>';
    }
    ?>
</section>

<section>
    <form method="post" action="actions/inserisci_pilota.php">
        <h1>Registrazione</h1>
        <p>Manca un pilota? Aggiungilo</p>
        <?php require 'form/pilota.php';?>
        <input type="submit" class="btn btn-primary" value="Registra il pilota">
    </form>
</section>

<script src="scripts/form.js"></script>
<section class="mb-4">
    <h1>Classifiche per gara</h1>
    <p>Visualizza i dati di ogni gara</p>
    <?php
    try {
        $gare = Database::select("select g.id, g.circuito, g.data, g.tempo_migliore from gare g;");
        Helpers::printTable(['ID', 'Circuito', 'Data', 'Tempo migliore', 'Classifica'], $gare, [
            function($row) {return '<button class="btn btn-secondary btn-sm me-2 px-2" onclick="window.location=\'?gara=' . $row->id . '\'"><i class="bi bi-box-arrow-in-right"></i></button>';},
            function($row) {return '<button class="btn btn-primary btn-sm me-2 px-2" onclick=""><i class="bi bi-pencil"></i></button>';},
            function($row) {return '<button class="btn btn-danger btn-sm me-2 px-2" onclick=""><i class="bi bi-trash"></i></button>';}
        ]);
    } catch (Exception $e) {
        echo '<p>Errore nel recupero dei dati</p>';
    }
    ?>
</section>

<section>
    <h1>Creazione gare</h1>
    <p>Non vedi una gara? Aggiungila</p>
    <form method="post" action="actions/inserisci_gara.php">
        <?php require 'form/gara.php';?>
        <input type="submit" class="btn btn-primary" value="Inserisci la gara">
    </form>
</section>

<script src="scripts/form.js"></script>
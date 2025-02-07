<section class="mb-4">
    <h1>Classifiche per gara</h1>
    <p>Visualizza i dati di ogni gara</p>
    <?php
    try {
        $gare = Database::select("select g.id, g.circuito, g.data, g.tempo_migliore from gare g;");
        Helpers::printTable(['ID', 'Circuito', 'Data', 'Tempo migliore', 'Classifica'], $gare, [
            function ($row) {
                return '<button class="btn btn-secondary btn-sm me-2 px-2" onclick="window.location=\'?gara=' . $row->id . '\'"><i class="bi bi-box-arrow-in-right"></i></button>';
            },
            function ($row) {
                return '<button class="btn btn-primary btn-sm me-2 px-2" data-bs-toggle="modal" data-bs-target="#edit" onclick="edit_gara(this, ' . $row->id . ')"><i class="bi bi-pencil"></i></button>';
            },
            function ($row) {
                return '<button class="btn btn-danger btn-sm me-2 px-2" data-bs-toggle="modal" data-bs-target="#delete" onclick="delete_gara(' . $row->id . ')"><i class="bi bi-trash"></i></button>';
            }
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
        <?php require 'form/gara.php'; ?>
        <input type="submit" class="btn btn-primary" value="Inserisci la gara">
    </form>
</section>

<form method="post" action="actions/elimina_gara.php" class="modal faded" id="delete" tabindex="-1"
      aria-labelledby="deleteFormTitle" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="deleteFormTitle">Elimina la gara</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <p class="modal-body" id="deleteFormText">
                Sei sicuro di voler eliminare la gara? L'azione non è reversibile ed eliminerà anche la classifica nella partita
            </p>
            <div class="modal-footer">
                <input name="id" id="deleteFormId" type="hidden" value="">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Chiudi</button>
                <button type="submin" class="btn btn-danger">Elimina</button>
            </div>
        </div>
    </div>
</form>

<form method="post" action="actions/edit_gara.php" class="modal faded" id="edit" tabindex="-1"
      aria-labelledby="editLibroTitle" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="editTitle">Modifica i dati nella gara</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="deleteFormText">
                <label for="edit-data" class="form-label">Data della gara</label>
                <input type="date" class="form-control" id="edit-data" name="data" required>
                <label for="edit-tempo-migliore" class="form-label">Tempo migliore</label>
                <input type="time" class="form-control" id="edit-tempo-migliore" name="tempo-migliore" step="0.001" min="0"
                       required>
            </div>
            <div class="modal-footer">
                <input name="id" id="editFormId" type="hidden" value="">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Chiudi</button>
                <button type="submin" class="btn btn-primary">Modifica</button>
            </div>
        </div>
    </div>
</form>

<script src="scripts/modifica_gare.js"></script>
<script src="scripts/form.js"></script>
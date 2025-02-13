<section>
    <h1>Iscriziona alla gara</h1>
    <?php
    /**@var $pilota */
    try {
        $pilota = Database::select("select * from piloti where numero = :numero", ['numero' => $pilota])[0];
        echo '<p>Il pilota selezionato è ' . $pilota->numero . ' - ' . $pilota->nome . ' ' . $pilota->cognome . '</p>';
    } catch (Exception $e) {
        Log::errlog($e);
        echo '<p>Errore nel recupero dei dati</p>';
    }
    ?>
    <h3>Il pilota partecipa già alle seguenti gare</h3>
    <?php
    try {
        $gare = Database::select('select g.id, g.circuito, g.data, p.punteggio from partecipazioni p join gare g on g.id = p.gara where p.pilota = :pilota;', ['pilota' => $pilota->numero]);
        Helpers::printTable(['ID', 'Circuito', 'Data', 'Punteggio', 'Azioni'], $gare, [
            function ($row) {
                global $pilota;
                return '<button class="btn btn-primary btn-sm me-2 px-2" data-bs-toggle="modal" data-bs-target="#edit" onclick="edit_gp(' . $row->punteggio . ", " . $row->id . ", " . $pilota->numero . ')"><i class="bi bi-pencil"></i></button>';
            },
            function ($row) {
                global $pilota;
                return '<button class="btn btn-danger btn-sm me-2 px-2" data-bs-toggle="modal" data-bs-target="#delete" onclick="delete_gp(' . $row->id . ", " . $pilota->numero . ')"><i class="bi bi-trash"></i></button>';
            }
        ]);
    } catch (Exception $e) {
        Log::errlog($e);
        echo '<p>Errore nel recupero dei dati</p>';
    }
    ?>
</section>
<section>
    <h3>Iscrivi il pilota ad un'altra gara</h3>
    <form method="post" action="actions/iscrivi_pilota.php">
        <input type="hidden" name="pilota" value="<?php echo $pilota->numero; ?>">
        <div class="row">
            <div class="mb-3 col-md-6">
                <label for="gara" class="form-label">Seleziona la gara</label>
                <select name="gara" id="gara" class="form-select" required>
                    <option value="" selected disabled hidden class="text-secondary">Seleziona la gara</option>
                    <?php
                    try {
                        $gare = Database::select('select * from gare g left join partecipazioni p on g.id = p.gara and p.pilota = :pilota where p.pilota IS NULL;', ['pilota' => $pilota->numero]);
                        foreach ($gare as $g) {
                            echo "<option value=\"$g->id\">$g->circuito - $g->data</option>";
                        }
                    } catch (Exception $e) {
                        Log::errlog($e);
                        echo '<option value="" disabled>Errore nel recupero dei dati</option>';
                    }
                    ?>
                </select>
            </div>
            <div class="mb-3 col-md-6">
                <label for="punteggio" class="form-label">Punteggio</label>
                <input type="number" class="form-control new-circuito" id="punteggio" name="punteggio" placeholder="16">
            </div>
        </div>
        <input type="submit" class="btn btn-primary" value="Iscrivi il pilota alla gara">
    </form>
</section>

<form method="post" action="actions/elimina_gara_pilota.php" class="modal faded" id="delete" tabindex="-1" aria-labelledby="deleteFormTitle" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="deleteFormTitle">Rimuovi dalla gara</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <p class="modal-body" id="deleteFormText">
                Sei sicuro di voler rimuovere il pilota dalla gara? L'azione non è reversibile
            </p>
            <div class="modal-footer">
                <input name="id" id="deleteFormId" type="hidden" value="">
                <input name="codice" id="deleteFormCodice" type="hidden" value="">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Chiudi</button>
                <button type="submin" class="btn btn-danger">Elimina</button>
            </div>
        </div>
    </div>
</form>

<form method="post" action="actions/edit_gara_pilota.php" class="modal faded" id="edit" tabindex="-1" aria-labelledby="editLibroTitle" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="editTitle">Modifica i dati nella gara</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="deleteFormText">
                <label for="punteggio" class="form-label">Inserisci il punteggio</label>
                <input type="number" class="form-control new-circuito" id="editFormPunteggio" name="punteggio" placeholder="16">
            </div>
            <div class="modal-footer">
                <input name="id" id="editFormId" type="hidden" value="">
                <input name="codice" id="editFormCodice" type="hidden" value="">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Chiudi</button>
                <button type="submin" class="btn btn-primary">Modifica</button>
            </div>
        </div>
    </div>
</form>

<script src="scripts/modifica_piloti.js"></script>
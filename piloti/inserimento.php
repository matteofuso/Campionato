<section class="mb-4">
    <h1>Gestisci i piloti</h1>
    <p>Seleziona il pilota per da iscriverlo ad'una gare</p>
    <?php
    try {
        $piloti = Database::select("select p.*, ca.livrea from piloti p join case_automobilistiche ca on p.casa_automobilistica = ca.nome;");
        Helpers::printTable(['Numero', 'Nome', 'Cognome', 'Nazionalità', 'Scuderia', 'Colore livrea', 'Azioni'], $piloti, [
            function($row) {return '<button class="btn btn-secondary btn-sm me-2 px-2" onclick="window.location=\'?pilota=' . $row->numero . '\'"><i class="bi bi-box-arrow-in-right"></i></button>';},
            function($row) {return '<button class="btn btn-primary btn-sm me-2 px-2" data-bs-toggle="modal" data-bs-target="#edit" onclick="edit_pilota(this, ' . $row->numero . ')"><i class="bi bi-pencil"></i></button>';},
            function($row) {return '<button class="btn btn-danger btn-sm me-2 px-2" data-bs-toggle="modal" data-bs-target="#deleteForm" onclick="delete_pilota(' . $row->numero . ')"><i class="bi bi-trash"></i></button>';}
        ]);
    } catch (Exception $e) {
        Log::errlog($e);
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

<form method="post" action="actions/elimina_pilota.php" class="modal faded" id="deleteForm" tabindex="-1" aria-labelledby="deleteFormTitle" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="deleteFormTitle">Elimina il pilota</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <p class="modal-body" id="deleteFormText">
                Sei sicuro di voler eliminare il pilota selezionato? L'azione non è reversibile
            </p>
            <div class="modal-footer">
                <input name="numero" id="deleteFormId" type="hidden" value="">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Chiudi</button>
                <button type="submin" class="btn btn-danger">Elimina</button>
            </div>
        </div>
    </div>
</form>

<form method="post" action="actions/edit_pilota.php" class="modal faded" id="edit" tabindex="-1" aria-labelledby="editLibroTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="editTitle">Modifica Pilota</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="deleteFormText">
                <?php $prefix = 'edit-'; require 'form/pilota.php'; ?>
            </div>
            <div class="modal-footer">
                <input name="old-numero" id="editFormId" type="hidden" value="">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Chiudi</button>
                <button type="submin" class="btn btn-primary">Modifica</button>
            </div>
        </div>
    </div>
</form>

<script src="scripts/form.js"></script>
<script src="scripts/modifica_piloti.js"></script>
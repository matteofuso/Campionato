<?php
require 'utils/Database.php';
require 'utils/Helpers.php';
$config = require 'config.php';
Database::connect($config);
?>

<?php require 'componenti/header.php';?>
<?php require 'componenti/alert.php';?>

<section class="mb-4">
    <h1>Le case automobilistiche partecipanti</h1>
    <?php
    try{
        $case_automobilistiche = Database::select('select * from case_automobilistiche');
        Helpers::printTable(['Nome', 'Colore della livrea', 'Azioni'], $case_automobilistiche, [
            function($row) {return '<button class="btn btn-primary btn-sm me-2 px-2" data-bs-toggle="modal" data-bs-target="#edit" onclick="edit_ca(this, \'' . $row->nome . '\')"><i class="bi bi-pencil"></i></button>';},
            function($row) {return '<button class="btn btn-danger btn-sm me-2 px-2" data-bs-toggle="modal" data-bs-target="#delete" onclick="delete_ca(\'' . $row->nome . '\')"><i class="bi bi-trash"></i></button>';}
        ]);
    } catch (Exception $e) {
        Log::errlog($e);
        echo '<p>Errore nel recupero dei dati</p>';
    }
    ?>
</section>

<section>
    <form method="post" action="actions/inserisci_ca.php">
        <h1>Inserimento Casa Automobilistica</h1>
        <div class="row">
            <div class="mb-3 col-md-6">
                <label for="nome" class="form-label">Nome della casa automobilistica</label>
                <input type="text" class="form-control new-casa-automobilistica" id="nome" name="nome" placeholder="Ferrari">
            </div>
            <div class="mb-3 col-md-6">
                <label for="livrea" class="form-label">Colore della livrea</label>
                <input type="text" class="form-control" id="livrea" name="livrea" placeholder="Rosso">
            </div>
        </div>
        <button type="submin" class="btn btn-primary">Inserisci</button>
    </form>
</section>

<form method="post" action="actions/elimina_ca.php" class="modal faded" id="delete" tabindex="-1" aria-labelledby="deleteFormTitle" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="deleteFormTitle">Elimina casa automobilistica</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <p class="modal-body" id="deleteFormText">
                Sei sicuro di voler eliminare la casa automobilistica? L'azione non è reversibile
            </p>
            <div class="modal-footer">
                <input name="nome" id="deleteFormId" type="hidden" value="">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Chiudi</button>
                <button type="submin" class="btn btn-danger">Elimina</button>
            </div>
        </div>
    </div>
</form>

<form method="post" action="actions/edit_ca.php" class="modal faded" id="edit" tabindex="-1" aria-labelledby="editLibroTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="editTitle">Modifica Casa Automobilistica</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body row" id="deleteFormText">
                <div class="mb-3 col-md-6">
                    <label for="ca-nome" class="form-label">Nome della casa automobilistica</label>
                    <input type="text" class="form-control new-casa-automobilistica" id="ca-nome" name="ca-nome" placeholder="Ferrari">
                </div>
                <div class="mb-3 col-md-6">
                    <label for="new-livrea" class="form-label">Colore della livrea</label>
                    <input type="text" class="form-control new-livrea" id="new-livrea" name="ca-livrea" placeholder="Rosso">
                </div>
            </div>
            <div class="modal-footer">
                <input name="nome" id="editFormId" type="hidden" value="">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Chiudi</button>
                <button type="submin" class="btn btn-primary">Modifica</button>
            </div>
        </div>
    </div>
</form>

<script src="scripts/modifica_ca.js"></script>
<script src="scripts/form.js"></script>
<?php require 'componenti/footer.php'; ?>

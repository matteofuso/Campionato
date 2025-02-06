<div class="row">
    <div class="mb-3 col-md-6">
        <label for="numero" class="form-label">Numero del pilota</label>
        <input type="number" class="form-control" id="numero" name="numero" placeholder="23" required>
    </div>
    <div class="mb-3 col-md-6">
        <label for="nome" class="form-label">Nome del pilota</label>
        <input type="text" class="form-control" id="nome" name="nome" placeholder="Mario" required>
    </div>
    <div class="mb-3 col-md-6">
        <label for="cognome" class="form-label">Cognome del pilota</label>
        <input type="text" class="form-control" id="cognome" name="cognome" placeholder="Rossi" required>
    </div>
    <div class="mb-3 col-md-6">
        <label for="nazionalita" class="form-label">Nazionalità del pilota</label>
        <select name="nazionalita" id="nazionalita" class="form-select form-select-insert" data-insert-target="new-nazionalita" required>
            <option value="" selected disabled hidden class="text-secondary">Seleziona la nazionalità</option>
            <?php
            try {
                $nazionalita = Database::select('select * from nazionalita n;');
                foreach ($nazionalita as $n) {
                    echo "<option value=\"$n->nazionalita\">$n->nazionalita</option>";
                }
            } catch (Exception $e) {
                Log::errlog($e, '../log/inserisci.log');
            }
            ?>
            <option value="-1">Inserisci un'altra nazionalità...</option>
        </select>
    </div>
    <div class="mb-3 col-md-6 d-none">
        <label for="new-nazionalita" class="form-label">Nazionalità del pilota</label>
        <input type="text" class="form-control new-nazionalita" id="new-nazionalita" name="new-nazionalita" placeholder="Italiana">
    </div>
    <div class="mb-3 col-md-6">
        <label for="casa-automobilistica" class="form-label">Casa automobilistica del pilota</label>
        <select name="casa-automobilistica" id="casa-automobilistica" class="form-select form-select-insert" data-insert-target="new-casa-automobilistica" required>
            <option value="" selected disabled hidden class="text-secondary">Seleziona la casa automobilistica del pilota</option>
            <?php
            try {
                $case_automobilistiche = Database::select('select * from case_automobilistiche n;');
                foreach ($case_automobilistiche as $c) {
                    echo "<option value=\"$c->nome\">$c->nome ($c->livrea)</option>";
                }
            } catch (Exception $e) {
                Log::errlog($e, '../log/inserisci.log');
            }
            ?>
            <option value="-1">Inserisci un'altra casa automobilistica...</option>
        </select>
    </div>
    <div class="mb-3 col-md-6 d-none">
        <label for="new-ca-nome" class="form-label">Nome della casa automobilistica</label>
        <input type="text" class="form-control new-casa-automobilistica" id="new-ca-nome" name="new-ca-nome" placeholder="Ferrari">
    </div>
    <div class="mb-3 col-md-6 d-none">
        <label for="new-ca-livrea" class="form-label">Livrea della casa automobilistica</label>
        <select name="new-ca-livrea" id="new-ca-livrea" class="form-select form-select-insert new-casa-automobilistica" data-insert-target="new-livrea" required>
            <option value="" selected disabled hidden class="text-secondary">Seleziona la livrea della casa automobilistica</option>
            <?php
            try {
                $livree = Database::select('select * from livree l;');
                foreach ($livree as $l) {
                    echo "<option value=\"$l->colore\">$l->colore</option>";
                }
            } catch (Exception $e) {
                Log::errlog($e, '../log/inserisci.log');
            }
            ?>
            <option value="-1">Inserisci un'altro colore...</option>
        </select>
    </div>
    <div class="mb-3 col-md-6 d-none">
        <label for="new-livrea" class="form-label">Colore della livrea</label>
        <input type="text" class="form-control new-livrea" id="new-livrea" name="new-livrea" placeholder="Rosso">
    </div>
</div>
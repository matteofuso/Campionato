<?php $prefix = $prefix?? ''?>
<div class="row">
    <div class="mb-3 col-md-6">
        <label for="<?=$prefix?>numero" class="form-label">Numero del pilota</label>
        <input type="<?=$prefix?>number" class="form-control" id="<?=$prefix?>numero" name="numero" placeholder="23" required>
    </div>
    <div class="mb-3 col-md-6">
        <label for="<?=$prefix?>nome" class="form-label">Nome del pilota</label>
        <input type="text" class="form-control" id="<?=$prefix?>nome" name="nome" placeholder="Mario" required>
    </div>
    <div class="mb-3 col-md-6">
        <label for="<?=$prefix?>cognome" class="form-label">Cognome del pilota</label>
        <input type="text" class="form-control" id="<?=$prefix?>cognome" name="cognome" placeholder="Rossi" required>
    </div>
    <div class="mb-3 col-md-6">
        <label for="<?=$prefix?>nazionalita" class="form-label">Nazionalità del pilota</label>
        <select name="nazionalita" id="<?=$prefix?>nazionalita" class="form-select form-select-insert" data-insert-target="<?=$prefix?>new-nazionalita" required>
            <option value="" selected disabled hidden class="text-secondary">Seleziona la nazionalità</option>
            <?php
            try {
                $nazionalita = Database::select('select * from nazionalita n;');
                foreach ($nazionalita as $n) {
                    echo "<option value=\"$n->nazionalita\">$n->nazionalita</option>";
                }
            } catch (Exception $e) {
                Log::errlog($e);
            }
            ?>
            <option value="-1">Inserisci un'altra nazionalità...</option>
        </select>
    </div>
    <div class="mb-3 col-md-6 d-none">
        <label for="<?=$prefix?>new-nazionalita" class="form-label">Nazionalità del pilota</label>
        <input type="text" class="form-control <?=$prefix?>new-nazionalita" id="<?=$prefix?>new-nazionalita" name="new-nazionalita" placeholder="Italiana">
    </div>
    <div class="mb-3 col-md-6">
        <label for="<?=$prefix?>casa-automobilistica" class="form-label">Casa automobilistica del pilota</label>
        <select name="casa-automobilistica" id="<?=$prefix?>casa-automobilistica" class="form-select form-select-insert" data-insert-target="<?=$prefix?>new-casa-automobilistica" required>
            <option value="" selected disabled hidden class="text-secondary">Seleziona la casa automobilistica del pilota</option>
            <?php
            try {
                $case_automobilistiche = Database::select('select * from case_automobilistiche n;');
                foreach ($case_automobilistiche as $c) {
                    echo "<option value=\"$c->nome\">$c->nome ($c->livrea)</option>";
                }
            } catch (Exception $e) {
                Log::errlog($e);
            }
            ?>
            <option value="-1">Inserisci un'altra casa automobilistica...</option>
        </select>
    </div>
    <div class="mb-3 col-md-6 d-none">
        <label for="<?=$prefix?>new-ca-nome" class="form-label">Nome della casa automobilistica</label>
        <input type="text" class="form-control <?=$prefix?>new-casa-automobilistica" id="<?=$prefix?>new-ca-nome" name="new-ca-nome" placeholder="Ferrari">
    </div>
    <div class="mb-3 col-md-6 d-none">
        <label for="<?=$prefix?>new-ca-livrea" class="form-label">Colore della livrea</label>
        <input type="text" class="form-control <?=$prefix?>new-casa-automobilistica" id="<?=$prefix?>new-livrea" name="new-livrea" placeholder="Rosso">
    </div>
</div>
<div class="row">
    <div class="mb-3 col-md-6">
        <label for="circuito" class="form-label">Circuito della gare</label>
        <select name="circuito" id="circuito" class="form-select form-select-insert" data-insert-target="new-circuito" required>
            <option value="" selected disabled hidden class="text-secondary">Seleziona il circuito della gara</option>
            <?php
            try {
                $circuiti = Database::select('select * from circuiti c;');
                foreach ($circuiti as $c) {
                    echo "<option value=\"$c->luogo\">$c->luogo</option>";
                }
            } catch (Exception $e) {
                Log::errlog($e, '../log/inserisci.log');
            }
            ?>
            <option value="-1">Inserisci un'altro circuito...</option>
        </select>
    </div>
    <div class="mb-3 col-md-6 d-none">
        <label for="new-circuito" class="form-label">Nuovo circuito</label>
        <input type="text" class="form-control new-circuito" id="new-circuito" name="new-circuito" placeholder="Montecarlo">
    </div>
    <div class="mb-3 col-md-6">
        <label for="data" class="form-label">Data della gara</label>
        <input type="date" class="form-control" id="data" name="data" required>
    </div>
    <div class="mb-3 col-md-6">
        <label for="tempo-migliore" class="form-label">Tempo migliore</label>
        <input type="time" class="form-control" id="tempo-migliore" name="tempo-migliore" step="0.001" min="0" required>
    </div>
</div>
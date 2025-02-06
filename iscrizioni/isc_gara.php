<section>
    <h1>Iscriziona alla gara</h1>
    <?php
        /**@var $pilota */
        try {
            $pilota = Database::select("select * from piloti where numero = :numero", ['numero' => $pilota])[0];
            echo '<p>Il pilota selezionato è ' . $pilota->numero . ' - ' . $pilota->nome . ' ' . $pilota->cognome . '</p>';
        } catch (Exception $e) {
            echo '<p>Errore nel recupero dei dati</p>';
        }
    ?>
    <h3>Il pilota partecipa già alle seguenti gare</h3>
    <?php
        try{
            $gare = Database::select('select g.id, g.circuito, g.data, p.punteggio from partecipazioni p join gare g on g.id = p.gara where p.pilota = :pilota;', ['pilota' => $pilota->numero]);
            Helpers::printTable(['ID', 'Circuito', 'Data', 'Punteggio'], $gare);
        } catch (Exception $e) {
            echo '<p>Errore nel recupero dei dati</p>';
        }
    ?>
    <h3>Iscrivi il pilota ad un'altra gara</h3>
    <form method="post" action="actions/iscrivi_pilota.php">
        <input type="hidden" name="pilota" value="<?php echo $pilota->numero;?>">
        <div class="row">
            <div class="mb-3 col-md-6">
                <label for="gara" class="form-label">Seleziona la gara</label>
                <select name="gara" id="gara" class="form-select" required>
                    <option value="" selected disabled hidden class="text-secondary">Seleziona la gara</option>
                    <?php
                    try {
                        $gare = Database::select('select * from gare g left join partecipazioni p on g.id = p.gara and p.pilota = 1 where p.pilota IS NULL;;');
                        foreach ($gare as $g) {
                            echo "<option value=\"$g->id\">$g->circuito - $g->data</option>";
                        }
                    } catch (Exception $e) {
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
</section>
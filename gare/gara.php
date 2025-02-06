<section>
    <h1>Classifica gara</h1>
    <?php
    try{
        $gara = Database::select('select * from gare where id = :id', [':id' => $gara])[0];
        echo "<p>$gara->circuito - $gara->data</p>";
        $gare = Database::select(<<<SQL
        select dense_rank() over (order by p.punteggio desc), p2.nome, p2.cognome, p2.nazionalita, p2.casa_automobilistica, p.punteggio from partecipazioni p
        join piloti p2 on p.pilota = p2.numero
        join gare g on g.id = p.gara
        where g.id = $gara->id
        order by p.punteggio desc;
        SQL);
        Helpers::printTable(['Posizione', 'Nome', 'Cognome', 'Nazionalità', 'Scuderia', 'Punteggio', ], $gare);
    } catch (Exception $e) {
        echo '<p>Errore nel recupero dei dati</p>';
    }
    ?>
</section>
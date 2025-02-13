<?php

if (!Database::isConnected())
{
    $_GET['err'] = '0';
}

if (isset($_GET['err'])) {
    $errors = [
        '-1' => 'Errore generico',
        '0' => 'Impossibile connettersi al database',
        '1' => 'Impossibile iserire la nazionalità, controlla che non esisti di già',
        '2' => 'Impossibile iserire la casa automobilistica, controlla che non esisti già',
        '3' => 'Errore nell\'inserimento del pilota, controlla non ci siano numeri duplicati',
        '4' => 'Errore nella modifica del pilota, controlla non ci siano numeri duplicati',
        '5' => 'Errore nell\'eliminazione del pilota, controlla che non sia presente in alcune gare',
        '6' => 'Errore nella modifica della casa automobilistica, controlla non ci siano case con lo stesso nome',
        '7' => 'Errore nell\'eliminazione della casa automobilistica, controlla non ci siano giocatori iscritti',
        '8' => 'Errore nell\'iscrizione del pilota nella gara',
        '9' => 'Errore nella modifica del punteggio',
        '10' => 'Errore nell\'eliminazione della partecipazione',
        '11' => 'Errore nell\'inserimento del circuito, controlla che non esisti già',
        '12' => 'Errore nell\'inserimento della gara',
        '13' => 'Errore nella modifica della gara',
        '14' => 'Errore nell\'eliminazione della gara',
    ];
    $err = $_GET['err'];
    if (!array_key_exists($err, $errors)) {
        $err = '-1';
    }
    echo "<div class='alert alert-danger alert-dismissible' role='alert'>
          <p class='flex-grow-1 my-0 align-baseline'><i class='bi bi-exclamation-triangle me-2'></i>$errors[$err]</p>
          <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
    </div>";
}

if (isset($_GET['succ'])){
    $successes = [
        '-1' => 'Operazione completata con successo',
        '1' => 'Inserimento del pilota completata con successo',
        '2' => 'Modifica del pilota eseguita con successo',
        '3' => 'Eliminazione del pilota eseguita con successo',
        '4' => 'Modifica della casa automobilistica eseguita con successo',
        '5' => 'Eliminazione della casa automobilistica eseguita con successo',
        '6' => 'Iscrizione del pilota eseguita con successo',
        '7' => 'Punteggio modificato nel successo',
        '8' => 'Partecipazione rimossa con successo',
        '9' => 'Gara inserita con successo',
        '10' => 'Gara modificata con successo',
        '11' => 'Gara eliminata con successo',
    ];
    $succ = $_GET['succ'];
    if (!array_key_exists($succ, $successes)) {
        $succ = '-1';
    }
    echo "<div class='alert alert-success alert-dismissible' role='alert'>
          <p class='flex-grow-1 my-0 align-baseline'><i class='bi bi-check-circle me-2'></i>$successes[$succ]</p>
          <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
    </div>";
}
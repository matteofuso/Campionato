<?php
include "../utils/Database.php";
include_once "../utils/Log.php";
$config = require '../config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $old_numero = $_POST['old-numero'] ?? "";
    $numero = $_POST['numero'] ?? "";
    $nome = $_POST['nome'] ?? "";
    $cognome = $_POST['cognome'] ?? "";
    $nazionalita = $_POST['nazionalita'] ?? "";
    $new_nazionalita = $_POST['new-nazionalita'] ?? "";
    $casa_automobilistica = $_POST['casa-automobilistica'] ?? "";
    $new_ca_nome = $_POST['new-ca-nome'] ?? "";
    $new_ca_livrea = $_POST['new-ca-livrea'] ?? "";
    $new_livea = $_POST['new-livrea'] ?? "";

    if(empty($old_numero) || empty($numero) || empty($nome) || empty($cognome) || empty($nazionalita) || empty($casa_automobilistica)){
        http_response_code(400);
        exit;
    }

    if ($nazionalita == "-1" && empty($new_nazionalita)){
        http_response_code(401);
        exit;
    }

    if ($casa_automobilistica == "-1" && (empty($new_ca_nome) || empty($new_ca_livrea))){
        http_response_code(402);
        exit;
    }

    if ($new_ca_livrea == "-1" && empty($new_livea)){
        http_response_code(403);
        exit;
    }

    if (!Database::connect($config)){
        header('Location: ../piloti.php?err=0');
    }

    try {
        if ($nazionalita == "-1"){
            $new_nazionalita = ucwords($new_nazionalita);
            Database::query("insert into nazionalita (nazionalita) values (:nazionalita);", [':nazionalita' => $new_nazionalita]);
            $nazionalita = $new_nazionalita;
        }

        if ($new_ca_livrea == "-1"){
            $new_livea = ucwords($new_livea);
            Database::query("insert into livree (colore) values (:colore);", [':colore' => $new_livea]);
            $new_ca_livrea = $new_livea;
        }

        if ($casa_automobilistica == "-1"){
            $new_ca_nome = ucwords($new_ca_nome);
            Database::query("insert into case_automobilistiche (nome, livrea) values (:nome, :livrea);", [':nome' => $new_ca_nome, ':livrea' => $new_ca_livrea]);
            $casa_automobilistica = $new_ca_nome;
        }

        Database::query("update piloti set numero = :numero, nome = :nome, cognome = :cognome, nazionalita = :nazionalita, casa_automobilistica = :casa_automobilistica where numero = :old_numero;", [':numero' => $numero, ':nome' => $nome, ':cognome' => $cognome, ':nazionalita' => $nazionalita, ':casa_automobilistica' => $casa_automobilistica, ':old_numero' => $old_numero]);
        header('Location: ../piloti.php?succ=-1');
    } catch (Exception $e) {
        Log::errlog($e, '../log/inserisci.log');
        header('Location: ../piloti.php?err=-1');
    }
} else{
    http_response_code(405);
}
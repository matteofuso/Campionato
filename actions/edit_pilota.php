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
    $new_livrea = $_POST['new-livrea'] ?? "";

    if(empty($old_numero) || empty($numero) || empty($nome) || empty($cognome) || empty($nazionalita) || empty($casa_automobilistica)){
        http_response_code(400);
        exit;
    }

    if ($nazionalita == "-1" && empty($new_nazionalita)){
        http_response_code(401);
        exit;
    }

    if ($casa_automobilistica == "-1" && (empty($new_ca_nome) || empty($new_livrea))){
        http_response_code(402);
        exit;
    }

    if (!Database::connect($config)){
        header('Location: ../piloti.php?err=0');
    }

    if ($nazionalita == "-1"){
        $new_nazionalita = ucwords($new_nazionalita);
        try
        {
            Database::query("insert into nazionalita (nazionalita) values (:nazionalita);", [':nazionalita' => $new_nazionalita]);
            $nazionalita = $new_nazionalita;
        } catch (Exception $e)
        {
            Log::errlog($e);
            header('Location: ../piloti.php?err=1');
        }
    }

    if ($casa_automobilistica == "-1"){
        $new_ca_nome = ucwords($new_ca_nome);
        try
        {
            Database::query("insert into case_automobilistiche (nome, livrea) values (:nome, :livrea);", [':nome' => $new_ca_nome, ':livrea' => $new_livrea]);
            $casa_automobilistica = $new_ca_nome;
        } catch (Exception $e)
        {
            Log::errlog($e);
            header('Location: ../piloti.php?err=2');
        }
    }

    try {
        Database::query("update piloti set numero = :numero, nome = :nome, cognome = :cognome, nazionalita = :nazionalita, casa_automobilistica = :casa_automobilistica where numero = :old_numero;", [':numero' => $numero, ':nome' => $nome, ':cognome' => $cognome, ':nazionalita' => $nazionalita, ':casa_automobilistica' => $casa_automobilistica, ':old_numero' => $old_numero]);
        header('Location: ../piloti.php?succ=2');
    } catch (Exception $e) {
        Log::errlog($e);
        header('Location: ../piloti.php?err=4');
    }
} else{
    http_response_code(405);
}
<?php
include "../utils/Database.php";
include_once "../utils/Log.php";
$config = require '../config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $old_name = $_POST['nome'] ?? "";
    $name = $_POST['ca-nome'] ?? "";
    $livrea = $_POST['ca-livrea'] ?? "";

    if(empty($old_name) || empty($name) || empty($livrea)){
        http_response_code(400);
        exit;
    }

    if (!Database::connect($config)){
        header('Location: ../case_automobilistiche.php?err=0');
    }

    try {
        Database::query("update case_automobilistiche set nome = :nome, livrea = :livrea where nome = :old_nome;", [':nome' => $name, ':livrea' => $livrea, ':old_nome' => $old_name]);
        header('Location: ../case_automobilistiche.php?succ=4');
    } catch (Exception $e) {
        Log::errlog($e);
        header('Location: ../case_automobilistiche.php?err=6');
    }
} else {
    http_response_code(405);
}
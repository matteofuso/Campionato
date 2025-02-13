<?php
include "../utils/Database.php";
include_once "../utils/Log.php";
$config = require '../config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'] ?? "";
    $livrea = $_POST['livrea'] ?? "";

    if (empty($nome) || empty($livrea)){
        http_response_code(400);
        exit;
    }

    if (!Database::connect($config)){
        header('Location: ../case_automobilistiche.php?err=0');
    }

    try {
        Database::query("insert into case_automobilistiche (nome, livrea) values (:nome, :livrea);", [':nome' => $nome, ':livrea' => $livrea]);
        header('Location: ../case_automobilistiche.php?succ=12');
    } catch (Exception $e) {
        Log::errlog($e);
        header('Location: ../case_automobilistiche.php?err=2');
    }
} else{
    http_response_code(405);
}
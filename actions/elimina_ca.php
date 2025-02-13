<?php
include "../utils/Database.php";
include_once "../utils/Log.php";
$config = require '../config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['nome'] ?? "";
    if(empty($name)){
        http_response_code(400);
        exit;
    }

    if (!Database::connect($config)){
        header('Location: ../case_automobilistiche.php?err=0');
    }

    try {
        Database::query("delete from case_automobilistiche where nome = :nome;", [':nome' => $name]);
        header('Location: ../case_automobilistiche.php?succ=5');
    } catch (Exception $e) {
        Log::errlog($e);
        header('Location: ../case_automobilistiche.php?err=7');
    }
} else {
    http_response_code(405);
}
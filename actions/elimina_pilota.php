<?php
include "../utils/Database.php";
include_once "../utils/Log.php";
$config = require '../config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $numero = $_POST['numero'] ?? "";

    if(empty($numero)){
        http_response_code(400);
        exit;
    }

    if (!Database::connect($config)){
        header('Location: ../piloti.php?err=0');
    }

    try {
        Database::query("delete from piloti where numero = :numero;", [':numero' => $numero]);
        header('Location: ../piloti.php?succ=3');
    } catch (Exception $e) {
        Log::errlog($e);
        header('Location: ../piloti.php?err=5');
    }
} else{
    http_response_code(405);
}
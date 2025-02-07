<?php
include "../utils/Database.php";
include_once "../utils/Log.php";
$config = require '../config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $codice = $_POST['codice'] ?? "";
    $id = $_POST['id'] ?? "";

    if(empty($codice) || empty($id)){
        http_response_code(400);
        exit;
    }

    if (!Database::connect($config)){
        header("Location: ../piloti.php?pilota={$codice}&err=0");
    }

    try{
        Database::query("delete from partecipazioni where pilota = :codice and gara = :id;", [':codice' => $codice, ':id' => $id]);
        header("Location: ../piloti.php?pilota={$codice}&succ=1");
    } catch (Exception $e) {
        header("Location: ../piloti.php?pilota={$codice}&err=-1");
    }
} else{
    http_response_code(405);
}
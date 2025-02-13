<?php
include "../utils/Database.php";
include_once "../utils/Log.php";
$config = require '../config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $codice = $_POST['codice'] ?? "";
    $id = $_POST['id'] ?? "";
    $punteggio = $_POST['punteggio'] ?? "";

    if(empty($codice) || empty($id) || empty($punteggio)){
        http_response_code(400);
        exit;
    }

    if (!Database::connect($config)){
        header("Location: ../piloti.php?pilota=$codice&err=0");
    }

    try{
        Database::query("update partecipazioni set punteggio = :punteggio where pilota = :codice and gara = :id;", [':punteggio' => $punteggio, ':codice' => $codice, ':id' => $id]);
        header("Location: ../piloti.php?pilota=$codice&succ=7");
    } catch (Exception $e) {
        Log::errlog($e);
        header("Location: ../piloti.php?pilota=$codice&err=9");
    }
} else{
    http_response_code(405);
}
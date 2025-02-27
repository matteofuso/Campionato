<?php
include "../utils/Database.php";
include_once "../utils/Log.php";
$config = require '../config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $gara = $_POST['gara'] ?? "";
    $pilota = $_POST['pilota'] ?? "";
    $punteggio = $_POST['punteggio'] ?? "";

    if(empty($gara) || empty($pilota) || empty($punteggio)){
        http_response_code(400);
        exit;
    }

    if (!Database::connect($config)){
        Log::errlog($e);
        header("Location: ../piloti.php?pilota=$pilota&err=0");
    }

    try {
        Database::query("insert into partecipazioni (gara, pilota, punteggio) values (:gara, :pilota, :punteggio);", [':gara' => $gara, ':pilota' => $pilota, ':punteggio' => $punteggio]);
        header("Location: ../piloti.php?pilota=$pilota&succ=6");
    } catch (Exception $e) {
        Log::errlog($e);
        header("Location: ../piloti.php?pilota=$pilota&err=8");
    }
} else{
    http_response_code(405);
}
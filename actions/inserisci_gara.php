<?php
include "../utils/Database.php";
include_once "../utils/Log.php";
$config = require '../config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $circuito = $_POST['circuito'] ?? "";
    $new_circuito = $_POST['new-circuito'] ?? "";
    $data = $_POST['data'] ?? "";
    $tempo_migliore = $_POST['tempo-migliore'] ?? "";

    if(empty($circuito) || empty($data) || empty($tempo_migliore)){
        http_response_code(400);
        exit;
    }

    if ($circuito == "-1" && empty($new_circuito)){
        http_response_code(401);
        exit;
    }

    if (!Database::connect($config)){
        header('Location: ../gare.php?err=0');
    }

    try {
        if ($circuito == "-1"){
            $new_circuito = ucwords($new_circuito);
            Database::query("insert into circuiti (luogo) values (:luogo);", [':luogo' => $new_circuito]);
            $circuito = $new_circuito;
        }

        Database::query("insert into gare (circuito, data, tempo_migliore) values (:circuito, :data, :tempo_migliore);", [':circuito' => $circuito, ':data' => $data, ':tempo_migliore' => $tempo_migliore]);
        header('Location: ../gare.php?succ=-1');
    } catch (Exception $e) {
        header('Location: ../gare.php?err=-1');
    }

} else{
    http_response_code(405);
}
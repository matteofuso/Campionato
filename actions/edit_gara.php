<?php
include "../utils/Database.php";
include_once "../utils/Log.php";
$config = require '../config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $date = $_POST['data'] ?? '';
    $id = $_POST['id'] ?? '';
    $time = $_POST['tempo-migliore'] ?? '';

    if (empty($date) || empty($id) || empty($time)) {
        http_response_code(400);
        exit;
    }

    if (!Database::connect($config)){
        header('Location: ../piloti.php?err=0');
    }

    try{
        Database::query("update gare set data = :data, tempo_migliore = :tempo_migliore where id = :id;", [':data' => $date, ':tempo_migliore' => $time, ':id' => $id]);
        header('Location: ../gare.php?succ=10');
    } catch (Exception $e){
        Log::errlog($e);
        header('Location: ../gare.php?err=13');
    }
} else{
    http_response_code(405);
}
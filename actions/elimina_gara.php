<?php
include "../utils/Database.php";
include_once "../utils/Log.php";
$config = require '../config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'] ?? '';

    if (empty($id)) {
        http_response_code(400);
        exit;
    }

    if (!Database::connect($config)){
        header('Location: ../piloti.php?err=0');
    }

    try{
        Database::query("delete from gare where id = :id;", [':id' => $id]);
        header('Location: ../gare.php?succ=11');
    } catch (Exception $e){
        Log::errlog($e);
        header('Location: ../gare.php?err=14');
    }
} else{
    http_response_code(405);
}
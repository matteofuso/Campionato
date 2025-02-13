<?php
require 'utils/Database.php';
require 'utils/Helpers.php';
$config = require 'config.php';
Database::connect($config);
?>

<?php require 'componenti/header.php';?>
<?php require 'componenti/alert.php';?>

<?php
$pilota = $_GET['pilota'] ?? "";
if (!$pilota){
    require 'piloti/inserimento.php';
}
else {
    require 'piloti/iscrizione.php';}
?>

<?php require 'componenti/footer.php'; ?>

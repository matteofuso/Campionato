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
    require 'iscrizioni/sel_pilota.php';
}
else {
    require 'iscrizioni/isc_gara.php';}
?>

<?php require 'componenti/footer.php'; ?>

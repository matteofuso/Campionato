<?php
require 'utils/Database.php';
require 'utils/Helpers.php';
$config = require 'config.php';
Database::connect($config);
?>

<?php require 'componenti/header.php';?>
<?php require 'componenti/alert.php';?>

<?php
$gara = $_GET['gara'] ?? "";
if (!$gara){
    require 'gare/sel_gare.php';
}
else {
    require 'gare/gara.php';}
?>

<?php require 'componenti/footer.php'; ?>

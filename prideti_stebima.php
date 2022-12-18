<?php
if (!isset($_GET['id'])){
    header("Location: PagrindinisPuslapis.php");
    exit;
}

include("config.php");

$id = $_GET['id'];
session_start();
$query = "INSERT IGNORE INTO stebi (fk_Aukcionasid_Aukcionas, fk_Vartotojasid_Vartotojas)
          VALUES ('" . $_GET['id'] . "','".$_SESSION['userid']."')";
mysqli_query($db, $query);

header("Location: Aukciono_langas.php?id=" . $id);
?>
<?php
if (!isset($_GET['id'])){
    header("PagrindinisPuslapis.php");
    exit;
}

include("config.php");

$id = $_GET['id'];

$query = "UPDATE aukcionas SET statusas=2 WHERE id_Aukcionas=" . $id;
mysqli_query($db, $query);
header("Location: PagrindinisPuslapis.php");
?>
<?php
if (!isset($_GET['id'])){
    header("/isp_aukcionai/PagrindinisPuslapis.php");
    exit;
}

include($_SERVER['DOCUMENT_ROOT']."/isp_aukcionai/include/config.php");

$id = $_GET['id'];

$query = "UPDATE aukcionas SET statusas=2 WHERE id_Aukcionas=" . $id;
mysqli_query($db, $query);
header("Location: /isp_aukcionai/PagrindinisPuslapis.php");
?>
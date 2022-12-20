<?php
if (!isset($_GET['id'])){
    header("Location: PagrindinisPuslapis.php");
    exit;
}

include($_SERVER['DOCUMENT_ROOT']."/isp_aukcionai/include/config.php");

$id = $_GET['id'];
session_start();

$query = "DELETE IGNORE from stebi 
            WHERE (fk_Aukcionasid_Aukcionas, fk_Vartotojasid_Vartotojas) = 
            ('" . $_GET['id'] . "','".$_SESSION['userid']."')";
mysqli_query($db, $query);

header("Location: stebimi.php");
?>
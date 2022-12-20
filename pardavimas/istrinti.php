<?php

include($_SERVER['DOCUMENT_ROOT']."/isp_aukcionai/include/header.php");

$query = "SELECT nuoroda from nuotrauka WHERE fk_Prekeid_Preke=" . $_GET['id'];
$result = mysqli_query($db, $query);
$row = mysqli_fetch_row($result);

$link = implode($row);
$status = unlink($link);
if($status){
    $query = "DELETE from nuotrauka WHERE fk_Prekeid_Preke=" . $_GET['id'];
    mysqli_query($db, $query);
    $query = "DELETE from preke WHERE id_Preke=" . $_GET['id'];
    mysqli_query($db, $query);
    header("Location: manoPrekes.php");
    exit;
}
?>
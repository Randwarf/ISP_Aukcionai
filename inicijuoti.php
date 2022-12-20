<?php
include("header.php");

$query= "SELECT statusas FROM aukcionas WHERE id_Aukcionas=".$_GET['id'];
$result = mysqli_query($db, $query);

$result = mysqli_fetch_assoc($result);

if($result != NULL && $result['statusas'] == 1){
    $query= "UPDATE aukcionas SET statusas=4";
    $result = mysqli_query($db, $query);
    header("Location:Aukciono_langas.php?id=".$_GET['id']);
    exit;
}
?>
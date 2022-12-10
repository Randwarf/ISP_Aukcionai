<?php

include("header.php");
$query = "UPDATE aukcionas SET statusas=1 WHERE fk_Prekeid_Preke=" . $_GET['id'];
mysqli_query($db, $query);
header("Location: nepatvirtintos.php");

?>
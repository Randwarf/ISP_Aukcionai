<?php

include($_SERVER['DOCUMENT_ROOT']."/isp_aukcionai/include/header.php");
$query = "UPDATE aukcionas SET statusas=1, fk_Administratoriusid_Administratorius=".$USERINFO['fk_Administratorius']." WHERE fk_Prekeid_Preke=" . $_GET['id'];
echo $query;
mysqli_query($db, $query);
header("Location: nepatvirtintos.php");

?>
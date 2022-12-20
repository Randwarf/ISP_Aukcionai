<?php
use LDAP\Result;
if (!isset($_GET['id'])){
    header("Location: PagrindinisPuslapis.php");
    exit;
}

include($_SERVER['DOCUMENT_ROOT']."/isp_aukcionai/include/config.php");

$id = $_GET['id'];
session_start();
$query = "SELECT * FROM stebi WHERE fk_Aukcionasid_Aukcionas='" . $id . "' AND fk_Vartotojasid_Vartotojas='".$_SESSION['userid']."'";
$stebimi = mysqli_query($db, $query);
if (mysqli_num_rows($stebimi) < 1){
    $query = "INSERT IGNORE INTO stebi (fk_Aukcionasid_Aukcionas, fk_Vartotojasid_Vartotojas)
          VALUES ('" . $_GET['id'] . "','".$_SESSION['userid']."')";
    mysqli_query($db, $query);
}
else{
    $query = "DELETE IGNORE from stebi 
            WHERE (fk_Aukcionasid_Aukcionas, fk_Vartotojasid_Vartotojas) = 
            ('" . $_GET['id'] . "','".$_SESSION['userid']."')";
    mysqli_query($db, $query);
}

header("Location: Aukciono_langas.php?id=" . $id);
?>
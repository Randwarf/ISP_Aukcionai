<?php
include($_SERVER['DOCUMENT_ROOT']."/isp_aukcionai/include/header.php");
$_SESSION['aukciono_pradzia'] = $_POST['aukciono_pradzia'];
$_SESSION['aukciono_pabaiga'] = $_POST['aukciono_pabaiga'];
$_SESSION['min_sum'] = $_POST['min_sum'];
$_SESSION['max_sum'] = $_POST['max_sum'];
$_SESSION['aukciono_pradzia_error']="";
$_SESSION['aukciono_pabaiga_error']="";
$_SESSION['min_sum_error']="";
$_SESSION['max_sum_error']="";
$_SESSION['aukciono_statuso_error']="";

if($_POST['min_sum'] == ""){
    $_SESSION['min_sum_error']="Įveskite mažiausią statymo sumą.";
    header("Location:Aukciono_kurimas.php.php?id=".$_POST['id']);
    exit;
}
if($_POST['max_sum'] == ""){
    $_SESSION['max_sum_error']="Įveskite išpirkimo sumą.";
    header("Location:Aukciono_kurimas.php.php?id=".$_POST['id']);
    exit;
}
if($_POST['max_sum'] <= $_POST['min_sum']){
    $_SESSION['max_sum_error']="Išpirkimo suma turi būti didesnė už minimalaus statymo sumą.";
    header("Location:Aukciono_kurimas.php.php?id=".$_POST['id']);
    exit;
}
$query = "INSERT INTO aukcionas (pradzia, pabaiga, min, max, galutine_kaina, statusas,fk_Vartotojasid_Vartotojas, fk_Prekeid_Preke)
VALUES('" .$_POST['aukciono_pradzia']." 00:00:00','" .$_POST['aukciono_pabaiga']." 23:59:59','".$_POST['min_sum']."','".$_POST['max_sum']."',0, 3, '".$_SESSION["userid"]."', ".$_POST['id']." )";
if(mysqli_query($db, $query)){
    $_SESSION['aukciono_statuso_error'] = "good";
    $query = "SELECT id_Aukcionas FROM aukcionas WHERE fk_Prekeid_Preke=".$_POST['id'].";";
    $result = mysqli_query($db, $query);
    $row = mysqli_fetch_assoc($result);
    $_SESSION['aukciono_pradzia'] = "";
    $_SESSION['aukciono_pabaiga'] = "";
    $_SESSION['min_sum'] = "";
    $_SESSION['max_sum'] = "";
    $_SESSION['aukciono_pradzia_error']="";
    $_SESSION['aukciono_pabaiga_error']="";
    $_SESSION['min_sum_error']="";
    $_SESSION['max_sum_error']="";
    $_SESSION['aukciono_statuso_error']="";
    header("Location: /isp_aukcionai/pirkimas/Aukciono_langas.php?id=".$row['id_Aukcionas']);
    exit;
}
else{
    $_SESSION['aukciono_statuso_error'] = "bad";
    header("Location:Aukciono_kurimas.php?id=".$_POST['id']);
    exit;
}

?>
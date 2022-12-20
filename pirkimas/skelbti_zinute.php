<?php
if (!isset($_GET['id']) || !isset($_POST['message'])){
    header("Location: PagrindinisPuslapis.php");
    exit;
}

include($_SERVER['DOCUMENT_ROOT']."/isp_aukcionai/include/config.php");
$db = mysqli_connect(config::DB_SERVER, config::DB_USERNAME, config::DB_PASSWORD, config::DB_NAME);

$id = $_GET['id'];
session_start();
$query = "INSERT INTO zinute (tekstas, fk_Aukcionasid_Aukcionas, fk_Vartotojasid_Vartotojas)
          VALUES ('" . $_POST['message'] . "','" . $_GET['id'] . "','".$_SESSION['userid']."')";
mysqli_query($db, $query);

header("Location: Aukciono_langas.php?id=" . $id);
?>
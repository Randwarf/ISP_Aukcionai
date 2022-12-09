<?php
if (!isset($_GET['id'])){
    header("Location: http://localhost/ISP_Aukcionai/PagrindinisPuslapis.php");
    exit;
}

include("config.php");
$db = mysqli_connect(config::DB_SERVER, config::DB_USERNAME, config::DB_PASSWORD, config::DB_NAME);

$id = $_GET['id'];
$back = $_GET['back'];

$query = "DELETE FROM komentaras WHERE id_Komentaras=" . $id;
mysqli_query($db, $query);
header("Location: http://localhost/ISP_Aukcionai/Aukciono_langas.php?id=" . $back);
?>
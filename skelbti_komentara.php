<?php
if (!isset($_GET['id']) || !isset($_POST['comment'])){
    header("Location: PagrindinisPuslapis.php");
    exit;
}

include("config.php");
$db = mysqli_connect(config::DB_SERVER, config::DB_USERNAME, config::DB_PASSWORD, config::DB_NAME);

$id = $_GET['id'];

//Vartotojas įhardcodintas, nes neturim prisijungimo
$query = "INSERT INTO komentaras (tekstas, fk_Aukcionasid_Aukcionas, fk_Vartotojasid_Vartotojas)
          VALUES ('" . $_POST['comment'] . "','" . $_GET['id'] . "','3')";
mysqli_query($db, $query);

header("Location: Aukciono_langas.php?id=" . $id);
?>
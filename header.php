<?php 
include("config.php");
session_start();
$db = mysqli_connect(config::DB_SERVER, config::DB_USERNAME, config::DB_PASSWORD, config::DB_NAME);

if (isset($_SESSION['userid'])){
    $query = "SELECT * FROM vartotojas WHERE id_Vartotojas=" . $_SESSION['userid'];
    $result = mysqli_query($db, $query);
    $result = mysqli_fetch_assoc($result);
}

?>
<div class ="jumbotron text-center">
    <a href="PagrindinisPuslapis.php"><h1>ISP - AUKCIONAI</h1></a>
    <div display: flex;
    justify-content: space-between;
    align="right">
        <?php echo "Vartotojas: ".$result['vardas'] . " " . $result['pavarde'];?>
        <a href="naudotojoPuslapis.php">Naudotojo puslapis</a>
        <a href="signin.php">Registracija</a>
        <a href="login.php">Prisijungimas</a>
        <a href="adminPage.php">Administravimo langas</a>
        <a href="logout.php">Atsijungti</a>
    </div>
</div>
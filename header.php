<?php 
include("config.php");
session_start();

if (isset($_SESSION['userid'])){
    $query = "SELECT * FROM vartotojas WHERE id_Vartotojas=" . $_SESSION['userid'];
    $USERINFO = mysqli_query($db, $query);
    $USERINFO = mysqli_fetch_assoc($USERINFO);
}

?>
<div class ="jumbotron text-center">
    <a href="PagrindinisPuslapis.php"><h1>ISP - AUKCIONAI</h1></a>
    <div display: flex;
    justify-content: space-between;
    align="right">
        <?php 
        if (isset($USERINFO))
        {
            echo "Vartotojas: ".$USERINFO['vardas'] . " " . $USERINFO['pavarde'];
            echo "<a href='naudotojoPuslapis.php'>Naudotojo puslapis</a>";
            echo "<a href='logout.php'>Atsijungti</a>";
        }
        else{
            echo "<a href='signin.php'>Registracija</a>";
            echo "<a href='login.php'>Prisijungimas</a>";
        }
        ?>
        <a href="adminPage.php">Administravimo langas</a>
    </div>
</div>

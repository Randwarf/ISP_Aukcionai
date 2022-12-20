<?php 
include($_SERVER['DOCUMENT_ROOT']."/isp_aukcionai/include/config.php");
session_start();

if (isset($_SESSION['userid'])){
    $query = "SELECT * FROM vartotojas WHERE id_Vartotojas=" . $_SESSION['userid'];
    $USERINFO = mysqli_query($db, $query);
    $USERINFO = mysqli_fetch_assoc($USERINFO);
}

?>
<div class ="jumbotron text-center">
    <a href="/isp_aukcionai/PagrindinisPuslapis.php"><h1>ISP - AUKCIONAI</h1></a>
    <div display: flex;
    justify-content: space-between;
    align="right">
        <?php 
        if (isset($USERINFO))
        {
            echo "Likutis:" . $USERINFO['likutis']."€ ";
            if($USERINFO['fk_Administratorius'] != null){
                echo "Administratorius: ".$USERINFO['vardas'] . " " . $USERINFO['pavarde']." ";
                echo "<a href='/isp_aukcionai/administravimas/adminPage.php'>Administravimo langas </a>";
            }
            else{
                echo "Vartotojas: ".$USERINFO['vardas'] . " " . $USERINFO['pavarde'];
            }
            echo "<a href='/isp_aukcionai/naudotojoPuslapis.php'>Naudotojo puslapis </a>";
            echo "<a href='/isp_aukcionai/prisijungimas/"."logout.php'>Atsijungti </a>";
        }
        else{
            echo "<a href='/isp_aukcionai/prisijungimas/"."signup.php'>Registracija </a>";
            echo "<a href='/isp_aukcionai/prisijungimas/"."login.php'>Prisijungimas </a>";
        }
        ?>
    </div>
</div>

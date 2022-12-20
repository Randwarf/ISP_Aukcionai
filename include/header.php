<?php 
include($_SERVER['DOCUMENT_ROOT']."/isp_aukcionai/include/config.php");
session_start();

if (isset($_SESSION['userid'])){
    $query = "SELECT * FROM vartotojas WHERE id_Vartotojas=" . $_SESSION['userid'];
    $USERINFO = mysqli_query($db, $query);
    $USERINFO = mysqli_fetch_assoc($USERINFO);
}

?>
<head>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Roboto:ital@0;1&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">    
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Noto+Sans:ital,wght@0,800;1,400&family=Roboto:ital,wght@0,400;1,300;1,400&display=swap" rel="stylesheet">
<style > 
    Asgard {
    font-family: 'Roboto', sans-serif;
    }
  .container2 {
    position: relative;
    botton: 5px;
    max-width: 180px;
  }
  .overlay {
    position: absolute;
    top: 24px;
    left: 9px;
    z-index: 1;
    pointer-events:none;
    opacity: 0.7;
  }
</style>
</head>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container">
        <a class="navbar-brand" style="font-family:'Roboto'" href="/isp_aukcionai/PagrindinisPuslapis.php">ISP - AUKCIONAI</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
          <?php 
            if (isset($USERINFO))
            {
                if($USERINFO['fk_Administratorius'] != null){
                    echo '<li class="nav-item">';
                    echo  '<a class="nav-link" href="/isp_aukcionai/administravimas/adminPage.php">Administravimas</a>';
                    echo '</li>';
                }
                echo '<li class="nav-item active">';
                echo "<a class='nav-link item' href='/isp_aukcionai/naudotojoPuslapis.php'><i style='padding-right: 5px;'class='fa fa-cog' aria-hidden='true'></i>".$USERINFO['vardas']." ".$USERINFO['pavarde']."</a>";
                echo '</li>';

                echo '<li class="nav-item">';
                echo '<a class="nav-link" href="/isp_aukcionai/mokejimas/Mokejimo_duomenu_redagavimo_puslapis.php"><i style="padding-right: 5px;" class="fa fa-credit-card" aria-hidden="true"></i>'.$USERINFO['likutis'].'€</a>';
                echo '</li>';

                echo '<li class="nav-item">';
                echo  "<a class='nav-link' href='/isp_aukcionai/prisijungimas/"."logout.php'>Atsijungti</a>";
                echo '</li>';
            }
            else{
                echo '<li class="nav-item">';
                echo  "<a class='nav-link' href='/isp_aukcionai/prisijungimas/"."signup.php'>Registracija</a>";
                echo '</li>';

                echo '<li class="nav-item">';
                echo  "<a class='nav-link' href='/isp_aukcionai/prisijungimas/"."login.php'>Prisijungimas</a>";
                echo '</li>';
            }
            
            ?>
            </li>
          </ul>
        </div>
      </div>
    </nav>
<div class ="jumbotron text-center">
    <h1 style="font-family: 'Noto Sans', sans-serif;">ISP - AUKCIONAI</h1>
    <div display: flex;
    justify-content: space-between;
    align="right">
    <h3 style="text-align:center">„Gaukite geriausius pasiūlymus mūsų aukcione – nepraleiskite!“</h3>
    </div>
</div>

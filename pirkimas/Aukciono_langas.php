<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Bootstrap Example</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <style>
          .btn {
            background-color: DodgerBlue;
            border: none;
            color: white;
            padding: 12px 16px;
            font-size: 16px;
            cursor: pointer;
          }
          .btna {
  border: none;
  background-color: inherit;
  font-size: 16px;
  cursor: pointer;
  display: inline-block;
}
          
          /* Darker background on mouse-over */
          .btn:hover {
            background-color: RoyalBlue;
          }
          </style>
      </head>

    <body>
    <?php include($_SERVER['DOCUMENT_ROOT']."/isp_aukcionai/include/header.php");?>

    <?php

    $db = mysqli_connect(config::DB_SERVER, config::DB_USERNAME, config::DB_PASSWORD, config::DB_NAME);

    if (!isset($_GET['id'])){
      echo "NĖRA AUKCIONO ID";
      exit;
    }
    $id = $_GET['id'];

    $query = "SELECT *, kategorija.name as name2, preke.pavadinimas as pavadinimas, aukcionas.fk_Vartotojasid_Vartotojas as kurejas
              FROM aukcionas
              LEFT JOIN preke ON preke.id_Preke=aukcionas.fk_Prekeid_Preke
              LEFT JOIN nuotrauka ON nuotrauka.fk_Prekeid_Preke=preke.id_Preke
              LEFT JOIN kategorija ON kategorija.id_KATEGORIJA=preke.kategorija
              LEFT JOIN statusas ON statusas.id_STATUSAS=aukcionas.statusas
              LEFT JOIN vartotojas ON preke.fk_Vartotojasid_Vartotojas=vartotojas.id_Vartotojas
              WHERE aukcionas.id_Aukcionas=".$id;
    $result = mysqli_query($db, $query);
    $result = mysqli_fetch_assoc($result);
    ?>

        <div class="container">
              <div class="col-12 card card-body bg-light p-4">
                <div class="row"> 
                  <div class="col-4">
                    <img style="max-width:100%; max-height:100%;"src=<?php echo "'/isp_aukcionai/".$result['nuoroda']."'";?> alt="Blue toy">
                </div>
                <div class="col-8">
                  <!-- Savininkas-->
                  <div class="div-group">
                    <label>Savininkas:</label>
                    <label><?php echo "<a href='/isp_aukcionai/naudotojoPuslapis.php?id=".$result['id_Vartotojas']."'>".$result['vardas']." ".$result['pavarde']."</a>";?></label>
                  </div>
                  <!-- Data-->
                  <div class="div-group">
                    <label>Aukciono gyvavimo trukmė:</label>
                    <label style="font-weight: bold;"><?php echo $result['pradzia'];?></label>
                    <label> - </label>
                    <label style="font-weight: bold;"><?php echo $result['pabaiga'];?></label>
                  </div>
                  <!-- Pavadinimas-->
                  <div class="div-group">
                    <label>Prekės pavadinimas:</label>
                    <label><?php echo $result['pavadinimas'];?></label>
                  </div>
                  <!-- Kategorija-->
                  <div class="div-group">
                    <label for="kategorija">Kategorija: </label>
                    <label><?php echo $result['name2'];?></label>
                  </div>
                  <!-- Aprasymas-->
                  <div class="div-group">
                    <label for="aprasymas">Aprašymas:</label>
                      <div class="input-group">
                        <textarea readonly placeholder="$aprasymas" id="aprasymas" class="form-control"><?php echo $result['aprasymas'];?></textarea>
                      </div>
                  </div>
                  <!-- Statusas-->
                  <div class="div-group" style="margin-top: 10px">
                    <label for="status">Aukciono būsena:</label>
                    <label for="status"><?php echo $result['name'];?></label>
                    <?php 
                    if(isset($_SESSION['userid']) && $result['kurejas'] == $_SESSION['userid']){
                      $button_state = "";
                      if($result['statusas']!=1){ 
                        $button_state = "disabled";
                      }
                      $locationsteb2 = "window.location.href='/isp_aukcionai/pardavimas/inicijuoti.php?id=" . $_GET['id']."'";
                        echo "<button class='btn btn-secondary btn-sm' style='margin-right:10px;' onclick=\"".$locationsteb2."\"  ".$button_state.">Inicijuoti aukcioną</button>";
                    } ?>
                  </div>
                  <!-- Dabartinis Statymas-->
                  <div class="div-group">
                    <?php
                    $query = "SELECT * FROM statymas 
                     INNER JOIN vartotojas ON vartotojas.id_Vartotojas=statymas.fk_Vartotojasid_Vartotojas
                     WHERE fk_Aukcionasid_Aukcionas='" . $id . "' ORDER BY verte desc LIMIT 1";
                    $statymas = mysqli_query($db, $query);
                    $statymas = mysqli_fetch_assoc($statymas);
                    ?>
                    <label for="kaina">Dabartinė kaina:</label>
                    <label for="kaina"><?php 
                    if (isset($statymas)){
                      echo $statymas['verte'];  
                    }
                    else{
                      echo "-";
                    }
                    ?>€</label><br>

                    <?php
                    
                    if (isset($_SESSION['userid']) && $_SESSION['userid']==$result['id_Vartotojas'] && isset($statymas)){
                      //jei žiūri savininkas
                      echo "<label>Pirkėjas:</label>";
                      echo "<label><a href='/isp_aukcionai/naudotojoPuslapis.php?id=".$statymas['id_Vartotojas']."'>".$statymas['vardas']." ".$statymas['pavarde']."</a></label>";
                    }
                    
                    ?>
                  </div>
                  <!-- Min/Max-->
                  <form method='post' action="Aukciono_langas_statymas.php" >
                    <?php
                      $current_max_bid = $result['galutine_kaina'] == null ? $result['min']+1 : ($result['galutine_kaina'] <= $result['min']+1 ? $result['min']+1 : $result['galutine_kaina']+1);
                    ?>
                    <label for="bid_size">Statoma suma: (min <?php echo $current_max_bid; ?> max <?php echo $result['max'];?>):</label>
                    <input type="number" name="bid_size" step='.01' min='<?php echo $current_max_bid; ?>' max='<?php echo $result['max'];?>' required <?php if($current_max_bid > $result['max']) echo 'disabled';?>>
                    <input type="hidden" name="auction_id" value='<?php echo $id ?>'>
                    <input class='btn btn-secondary btn-sm' style="margin-top: -6px;" type="submit" name="submit_bid" value="Statyti" <?php if($current_max_bid > $result['max']) echo 'disabled';?>>
                   </form>
                   <?php 
                    $fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

                        if (strpos($fullUrl, "bid_size=insufficient_funds") == true){
                      echo "<p style='color:red;'>Klaida: Neturite pakankamai lėšų";
                    }
                    ?>
                </div>
            </div>
              <br>
              <!-- Grįzti atgal į puslapi mygtukas-->
              <div class="row">

                 <form action='/isp_aukcionai/PagrindinisPuslapis.php'>
                        <button style="margin-right:10px; margin-left:10px" class="btn btn-secondary">Grįžti</button>
                  </form>
                 
                 <?php 
                if (isset($_SESSION['userid'])){
                $query = "SELECT * FROM stebi WHERE fk_Aukcionasid_Aukcionas='" . $id . "' AND fk_Vartotojasid_Vartotojas='".$_SESSION['userid']."'";
                $stebimi = mysqli_query($db, $query);
                if (mysqli_num_rows($stebimi) < 1){
                  if(isset($_SESSION['userid'])){
                    $locationsteb = "window.location.href='prideti_stebima.php?id=" . $_GET['id']."'";
                    echo "<button style='margin-right:10px;' onclick=\"".$locationsteb."\" class='btn'><i class='fa fa-star-o'></i></button>";
                  }
                }
                else{
                  if(isset($_SESSION['userid'])){
                    $locationsteb = "window.location.href='prideti_stebima.php?id=" . $_GET['id']."'";
                    echo "<button style='margin-right:10px' onclick=\"".$locationsteb."\" class='btn'><i class='fa fa-star'></i></button>";
                  }
                }
              }
                 ?> 
                
                 <?php
                 if (isset($USERINFO) && $USERINFO['fk_Administratorius'] != null) {
                  echo "<button style='margin-right:10px' onclick=\"window.location.href='/isp_aukcionai/administravimas/prasytiAtaskaitos.php?id=" . $_GET['id'] . "'\" class ='btn'><i class='fa fa-line-chart'></i></button>";
                  $location = "window.location.href='/isp_aukcionai/administravimas/istrinti_aukciona.php?id=" . $_GET['id']."'";
                  echo "<button style='margin-right:10px' onclick=\"".$location."\" class='btn'><i class='fa fa-trash'></i></button>";
                }
                 ?>
              </div>
              
            </div>
            <div class="col-12 card card-body bg-light p-4">
              <?php

              $query = "SELECT * FROM komentaras
                        INNER JOIN vartotojas ON komentaras.fk_Vartotojasid_Vartotojas=vartotojas.id_Vartotojas
                        WHERE fk_Aukcionasid_Aukcionas=" . $id."
                        AND vartotojas.blokuotas=0
                        ORDER BY laiko_zyme desc";

              $result = mysqli_query($db, $query);

              foreach ($result as $row){
                echo "<div class='div-group'>
                <div style='font-weight: bolder;'><a href='/isp_aukcionai/naudotojoPuslapis.php?id=".$row['id_Vartotojas']."'>".$row['vardas']." ".$row['pavarde']."</a></div>
                <div style='font-weight: lighter;'>".$row['tekstas']."</div>";

                if (isset($USERINFO) && $USERINFO['fk_Administratorius'] != null){
                  echo "<button onclick=\"window.location.href='/isp_aukcionai/administravimas/trinti_komentara.php?id=".$row['id_Komentaras']."&back=".$_GET['id']."';\" class='btna'>Delete</button>";
                }
                echo "</div>";
              }

              if (mysqli_num_rows($result) <= 0){
                echo "Komentarų dar nėra. Būk pirmas!";
              }

              ?>
              <!-- Komentaro paskelbimas-->
              <form method="post" action="skelbti_komentara.php?id=<?php echo $id;?>">
                <br>
                <input <?php if(!isset($_SESSION['userid']) || $USERINFO['blokuotas']==1){echo "type='hidden'";}?> required name="comment" id="comment" type="text" placeholder="Įveskite savo komentarą" class="form-control">
                <input <?php if(!isset($_SESSION['userid']) || $USERINFO['blokuotas']==1){echo "type='hidden'";}?> type="submit" value="Paskelbti komentarą" class="form-control">
              </form>

              <form method="post" action="skelbti_zinute.php?id=<?php echo $id;?>">
                <br>
                <input style="background-color:powderblue;" <?php if(!isset($_SESSION['userid']) || $USERINFO['blokuotas']==1){echo "type='hidden'";}?> required name="message" id="message" type="text" placeholder="Rašyti privačia žinute" class="form-control">
                <input style="background-color:powderblue;"<?php if(!isset($_SESSION['userid']) || $USERINFO['blokuotas']==1){echo "type='hidden'";}?> type="submit" value="Siųsti" class="form-control">
              </form>
              <?php
              ?>
            </div>
          </div>

    </body>
</html>

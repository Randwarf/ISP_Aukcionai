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
    <?php include("header.php");?>

    <?php

    $db = mysqli_connect(config::DB_SERVER, config::DB_USERNAME, config::DB_PASSWORD, config::DB_NAME);

    if (!isset($_GET['id'])){
      echo "NĖRA AUKCIONO ID";
      exit;
    }
    $id = $_GET['id'];

    $query = "SELECT *, kategorija.name as name2
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
                    <img style="max-width:100%; max-height:100%;"src=<?php echo "'".$result['nuoroda']."'";?> alt="Blue toy">
                </div>
                <div class="col-8">
                  <!-- Savininkas-->
                  <div class="div-group">
                    <label>Savininkas:</label>
                    <label><?php echo "<a href='naudotojoPuslapis.php?id=".$result['id_Vartotojas']."'>".$result['vardas']." ".$result['pavarde']."</a>";?></label>
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
                  <div class="div-group">
                    <label for="status">Aukciono būsena:</label>
                    <label for="status"><?php echo $result['name'];?></label>
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
                    
                    if ($_SESSION['userid']==$result['id_Vartotojas'] && isset($statymas)){
                      //jei žiūri savininkas
                      echo "<label>Pirkėjas:</label>";
                      echo "<label>".$statymas['vardas']." ".$statymas['pavarde']."</label>";
                    }
                    
                    ?>
                  </div>
                  <!-- Min/Max-->
                  <form>
                    <label for="quantity">Statoma suma: (min <?php echo $result['min'];?> max <?php echo $result['max'];?>):</label>
                    <input type="number" id="quantity" name="quantity" min="100" max="500">
                    <input type="submit" value="Statyti">
                   </form>
                </div>
            </div>
              <br>
              <!-- Grįzti atgal į puslapi mygtukas-->
              <div class="row">
                <form>
                  <input style="margin-right:10px; margin-left:10px" type="button" class="btn btn-primary" value="Grįžti" onclick="history.back()">
                 </form>
                 <button style="margin-right:10px" class="btn"><i class="fa fa-star"></i></button>
                 <?php
                 if (isset($USERINFO) && $USERINFO['fk_Administratorius'] != null) {
                  echo "<button style='margin-right:10px' onclick=\"window.location.href='prasytiAtaskaitos.php?id=" . $_GET['id'] . "'\" class ='btn'><i class='fa fa-line-chart'></i></button>";
                  $location = "window.location.href='istrinti_aukciona.php?id=" . $_GET['id']."'";
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
                <div style='font-weight: bolder;'><a href='naudotojoPuslapis.php?id=".$row['id_Vartotojas']."'>".$row['vardas']." ".$row['pavarde']."</a></div>
                <div style='font-weight: lighter;'>".$row['tekstas']."</div>";

                if (isset($USERINFO) && $USERINFO['fk_Administratorius'] != null){
                  echo "<button onclick=\"window.location.href='trinti_komentara.php?id=".$row['id_Komentaras']."&back=".$_GET['id']."';\" class='btna'>Delete</button>";
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
                <input <?php if(!isset($_SESSION['userid']) || $USERINFO['blokuotas']==1){echo "type='hidden'";}?> name="comment" id="comment" type="text" placeholder="Įveskite savo komentarą" class="form-control">
                <input <?php if(!isset($_SESSION['userid']) || $USERINFO['blokuotas']==1){echo "type='hidden'";}?> type="submit" value="Paskelbti komentarą" class="form-control">
              </form>

              <?php
              ?>
            </div>
          </div>

    </body>
</html>
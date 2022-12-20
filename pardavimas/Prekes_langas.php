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
      </head>

    <body>
    <?php 
    
    include($_SERVER['DOCUMENT_ROOT']."/isp_aukcionai/include/header.php");
    $query= "SELECT *, preke.pavadinimas as ppavadinimas, preke.fk_Vartotojasid_Vartotojas as kurejas, aukcionas.statusas as statusas FROM preke
             LEFT JOIN nuotrauka ON preke.id_Preke=nuotrauka.fk_Prekeid_Preke
             LEFT JOIN kategorija ON preke.kategorija=kategorija.id_KATEGORIJA
             LEFT JOIN aukcionas ON preke.id_Preke=aukcionas.fk_Prekeid_Preke
             WHERE id_Preke=".$_GET['id'];
    $result = mysqli_query($db, $query);
    $result = mysqli_fetch_assoc($result);

    $initiate_auction_button_state=" ";
    $query= "SELECT statusas FROM aukcionas WHERE fk_Prekeid_Preke=".$_GET['id'].";";
    $res = mysqli_query($db, $query);
    if($res && mysqli_num_rows($res) >0){
      $initiate_auction_button_state = "disabled";
    }

    ?>

        <div class="container">
              <div class="col-12 card card-body bg-light p-4">
                <div class="row"> 
                  <div class="col-4">
                    <!-- Foto-->
                  <div class="div-group">
                  </div>
                    <img style="max-width:100%; max-height:100%;"src="/isp_aukcionai/<?php echo $result['nuoroda'];?>" alt="Red dot" />
                  </div>
                  <div class="col-8">
                    <!-- Pavadinimas-->
                  <div class="div-group">
                    <label for="pavadinimas">Prekės pavadinimas:</label>
                    <label><?php echo $result['ppavadinimas'];?></label>
                  </div>
                  <!-- Kategorija-->
                  <div class="div-group">
                    <label for="kategorija">Kategorija:</label>
                      <label><?php echo $result['name'];?></label>
                  </div>
                  <!-- Aprasymas-->
                  <div class="div-group">
                    <label for="aprasymas">Aprašymas:</label>
                      <div class="input-group">
                        <textarea readonly placeholder="$aprasymas" id="aprasymas" class="form-control"><?php echo $result['aprasymas'];?></textarea>
                      </div>
                  </div>
                  </div>
            </div>
            <!-- Grizti atgal į puslapi mygtukas-->
            <br>
            <div class="row">
              <form>
                <input type="button" class="btn btn-primary" value="Grįžti" onclick="history.back()">
               </form>
                <?php
                
                if (isset($USERINFO) && $USERINFO['fk_Administratorius']!= null && $result['statusas']==3){
                  echo "<form>
                  <input type='button' class='btn btn-primary' value='Patvirtinti' onclick=\"window.location.href='/isp_aukcionai/administravimas/patvirtinti.php?id=".$_GET['id']."'\">
                 </form>
    
                 <form>
                  <input type='button' class='btn btn-primary' value='Atmesti' onclick=\"window.location.href='/isp_aukcionai/administravimas/atmesti.php?id=".$_GET['id']."'\">
                 </form>";
                }
                if($result['kurejas'] == $_SESSION['userid']){

                  $locationsteb = "window.location.href='istrinti.php?id=" . $_GET['id']."'";
                  echo "<button style='margin-right:10px' onclick=\"".$locationsteb."\" class='btn btn-primary' ".$initiate_auction_button_state.">Ištrinti</button>";
                  
                  $locationsteb2 = "window.location.href='redaguoti.php?id=" . $_GET['id']."'";
                  echo "<button style='margin-right:10px' onclick=\"".$locationsteb2."\" class='btn btn-primary' ".$initiate_auction_button_state.">Redaguoti</button>";
                  
                  $locationsteb2 = "window.location.href='Aukciono_kurimas.php?id=" . $_GET['id']."'";
                  echo "<button style='margin-right:10px' onclick=\"".$locationsteb2."\" class='btn btn-primary' ".$initiate_auction_button_state.">Kurti aukcioną</button>";

                }
                ?>

               <?php
               if ($result['statusas']==1){
                 echo "<form>";
                 echo "<input type='button' class='btn btn-primary' value='Inicijuoti' onclick=\"window.location.href='inicijuoti.php?id=" . $_GET['id'] . "'\"\>";
                 echo "</form>";
               }
               ?>
            </div>
          </div>

    </body>
</html>
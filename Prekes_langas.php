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
    
    include("header.php");
    $query= "SELECT *, preke.pavadinimas as ppavadinimas FROM preke
             LEFT JOIN nuotrauka ON preke.id_Preke=nuotrauka.fk_Prekeid_Preke
             LEFT JOIN kategorija ON preke.kategorija=kategorija.id_KATEGORIJA
             LEFT JOIN aukcionas ON preke.id_Preke=aukcionas.fk_Prekeid_Preke
             WHERE id_Preke=".$_GET['id'];

    $result = mysqli_query($db, $query);
    $result = mysqli_fetch_assoc($result);

    ?>

        <div class="container">
              <div class="col-12 card card-body bg-light p-4">
                <div class="row"> 
                  <div class="col-4">
                    <!-- Foto-->
                  <div class="div-group">
                  </div>
                    <img style="max-width:100%; max-height:100%;"src="<?php echo $result['nuoroda'];?>" alt="Red dot" />
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
                    <label for="aprasymas">aprasymas:</label>
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
  
               <form>
                <input type="button" class="btn btn-primary" value="Patvirtinti" onclick="window.location.href='patvirtinti.php?id=<?php echo $_GET['id'];?>'">
               </form>
  
               <form>
                <input type="button" class="btn btn-primary" value="Atmesti" onclick="window.location.href='atmesti.php?id=<?php echo $_GET['id'];?>'">
               </form>

               <?php
               if ($result['statusas']==1){
                 echo "<form>";
                 echo "<input type='button' class='btn btn-primary' value='Inicijuoti' onclick='window.location.href='Aukciono_iniciavimas.php?id=" . $_GET['id'] . "\>";
                 echo "</form>";
               }
               ?>
            </div>
          </div>

    </body>
</html>
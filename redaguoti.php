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
        $query = "SELECT preke.pavadinimas, preke.kategorija, preke.aprasymas, nuotrauka.pavadinimas AS photo_name FROM preke JOIN nuotrauka ON nuotrauka.fk_Prekeid_Preke=".$_GET['id']." WHERE preke.id_Preke=".$_GET['id'];
        $result = mysqli_query($db, $query);
        $row = mysqli_fetch_assoc($result);
    ?>

<?php
    ?>

      <div class="container">
            <div class="col-12 card card-body bg-light p-4">
              <form method="post" action="Prekes_redagavimo_duomenu_patikrinimas.php" enctype="multipart/form-data">
                <!-- Pavadinimas-->
                <div class="form-group">
                  <label for="pavadinimas">Prekės pavadinimas:</label>
                  <input type="text" class="form-control" name="pavadinimas" id="pavadinimas" placeholder="$pavadinimas" <?php if(isset($_SESSION['pavadinimas'])) {echo "value=".$_SESSION['pavadinimas'];}
                  else{echo "value=".$row['pavadinimas'];} ?>>
                    <?php if(isset($_SESSION['name_error'])){echo "<p style=\"color:red\">".$_SESSION['name_error']."</p>"; unset($_SESSION['name_error']);}?>
                    
                    <input type="text" style="visibility:hidden" name="id" id="id" value="<?php echo $_GET['id']; ?>" >
                </div>
                <!-- Kategorija-->
                <div class="form-group">
                  <label for="kategorija">Kategorija:
                    <select id="kategorija" name="kategorija" required>
                      <option value="0" <?php if(isset($_SESSION['kategorija']) && $_SESSION['kategorija'] == 0) {echo "selected";}else if($row['kategorija']==0){echo "selected";} ?>>-----</option>
                      <option value="1" <?php if(isset($_SESSION['kategorija']) && $_SESSION['kategorija'] == 1) {echo "selected";}else if($row['kategorija']==1){echo "selected";}  ?>>Automobiliai</option>
                      <option value="2" <?php if(isset($_SESSION['kategorija']) && $_SESSION['kategorija'] == 2) {echo "selected";}else if($row['kategorija']==2){echo "selected";} ?>>Antikvaras</option>
                      <option value="4" <?php if(isset($_SESSION['kategorija']) && $_SESSION['kategorija'] == 4) {echo "selected";}else if($row['kategorija']==4){echo "selected";}  ?>>Baldai</option>
                      <option value="3" <?php if(isset($_SESSION['kategorija']) && $_SESSION['kategorija'] == 3) {echo "selected";}else if($row['kategorija']==3){echo "selected";}  ?>>Elektronika</option>
                      <option value="6" <?php if(isset($_SESSION['kategorija']) && $_SESSION['kategorija'] == 6) {echo "selected";}else if($row['kategorija']==6){echo "selected";}  ?>>Laisvalaikis</option>
                      <option value="5" <?php if(isset($_SESSION['kategorija']) && $_SESSION['kategorija'] == 5) {echo "selected";}else if($row['kategorija']==5){echo "selected";}  ?>>Kita</option>
                    </select>
                  </label>
                  <p> 
                    <?php if(isset($_SESSION['category_error'])){echo "<p style=\"color:red\">".$_SESSION['category_error']."</p>"; unset($_SESSION['category_error']);}?>
                  </p>
                </div>
                <!-- Foto ikelimas-->
                <div class="form-group">
                  <label for="nuotrauka">Pasirinkite nuotrauką:</label>  
                  <input type="file" name="fileToUpload" id="fileToUpload">
                  <?php if(isset($_SESSION['photo_error'])){echo "<p style=\"color:red\">".$_SESSION['photo_error']."</p>"; unset($_SESSION['photo_error']);}?>
                </div>
                <!-- Aprasymas-->
                <div class="form-group">
                  <label for="aprasymas">Aprašymas:</label>
                  <?php if(isset($_SESSION['description_error'])){echo "<p style=\"color:red\">".$_SESSION['description_error']."</p>"; unset($_SESSION['description_error']);}?>
                    <div class="input-group">
                      <textarea placeholder="$aprasymas" id="aprasymas" name="aprasymas" class="form-control"><?php if(isset($_SESSION['aprasymas'])) {echo $_SESSION['aprasymas'];}else{echo $row['aprasymas'];} ?></textarea>
                    </div>
                </div>
                <!-- Siusti mygtukas-->
                <button type="submit" class="btn btn-primary">Patvirtinti</button>
            </form>
            <br>
            <form>
                  <input type='button' class='btn btn-primary' value='Atmesti' onclick='window.location.href="manoPrekes.php?"'>
            </form>
          </div>
        </div>

    </body>
</html>
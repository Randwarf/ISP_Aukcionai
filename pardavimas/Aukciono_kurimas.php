<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Aukciono kūrimas</title>
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
      $query = "SELECT nuoroda from nuotrauka WHERE fk_Prekeid_Preke=" . $_GET['id'];
      $result = mysqli_query($db, $query);
      $photo = mysqli_fetch_row($result);
      $query = "SELECT * from preke WHERE id_Preke=" . $_GET['id'];
      $result = mysqli_query($db, $query);
      $preke = mysqli_fetch_assoc($result);
      $query = "SELECT * from kategorija WHERE id_KATEGORIJA=" .$preke['kategorija'];
      $result = mysqli_query($db, $query);
      $kategorija = mysqli_fetch_assoc($result); 
    ?>

        <div class="container">
              <div class="col-12 card card-body bg-light p-4">
                <form action="kurti_aukciona.php" method="post">
                  
                <div class="row"> 
                  <div class="col-4">
                    <img style="max-width:100%; max-height:100%;"src="/isp_aukcionai/<?php echo implode($photo); ?>">
                </div>
                  <div class="col-8">
                    <!-- Pavadinimas-->
                    <div class="div-group">
                      <label>Prekės pavadinimas:</label>
                      <label><?php echo $preke['pavadinimas']; ?></label>
                    </div>
                    <!-- Kategorija-->
                    <div class="div-group">
                      <label for="kategorija">Kategorija: </label>
                      <label><?php echo $kategorija['name']; ?></label>
                    </div>
                    <!-- Aprasymas-->
                    <div class="div-group">
                      <label for="aprasymas">Aprašymas:</label>
                        <div class="input-group">
                          <textarea readonly placeholder="$aprasymas" id="aprasymas" class="form-control"> <?php echo $preke['aprasymas']; ?></textarea>
                        </div>
                    </div>
                    <!-- Data-->
                    <br>
                      <label>Aukciono gyvavimo trukmė</label>
                    <div class="div-group">
                      <label>Aukciono pradžia: </label>
                      <input type="date" name="aukciono_pradzia" value=<?php echo date("Y-m-d")." "; echo "min=".date("Y-m-d");?> >
                    </div>
                    <div class="div-group">
                      <label>Aukciono pabaiga: </label>
                      <input type="date" name="aukciono_pabaiga" value=<?php echo date('Y-m-d', strtotime(date("Y-m-d") . ' +1 day')); ?> >
                    </div>
                    <br>
                    <!-- Min/Max-->
                    <label>Statymų rėžiai </label>
                    <div class="div-group">
                      <label for="quantity">Mažiausia statymo suma:</label>
                      <input name="min_sum" id="uintTextBox1" <?php if(isset($_SESSION['min_sum'])){ echo "value=".$_SESSION['min_sum']; unset($_SESSION['min_sum']); } ?>>
                      <p style="color:red;"> <?php if(isset($_SESSION['min_sum_error'])){echo $_SESSION['min_sum_error']; unset($_SESSION['min_sum_error']);} ?> </p>
                    </div>
                    <div class="div-group">
                      <label for="quantity">Išpirkimo suma:</label>
                      <input name="max_sum" id="uintTextBox2" <?php if(isset($_SESSION['max_sum'])){ echo "value=".$_SESSION['max_sum']; unset($_SESSION['max_sum']); } ?>>
                      <p style="color:red;"> <?php if(isset($_SESSION['max_sum_error'])){echo $_SESSION['max_sum_error']; unset($_SESSION['max_sum_error']); } ?> </p>
                    </div>
                    <!-- div'as skirtas nusiusti prekes id formai -->
                    <div class="div-group" style="visibility:hidden"> <input type=text name="id" value="<?php echo $_GET['id']; ?>" ></div>
                  </div>
                  
            </div>
              <br>
              <!-- Grįzti atgal į puslapi mygtukas-->
              
              <button type="submit" class="btn btn-primary">Kurti aukcioną</button>
				<form>
					<input type="button" class="btn btn-primary" value="Grįžti" onclick="history.back()">
					
				</form>
            </div>
          </div>

          <script>
            // Restricts input for the given textbox to the given inputFilter.
            function setInputFilter(textbox, inputFilter, errMsg) {
              ["input", "keydown", "keyup", "mousedown", "mouseup", "select", "contextmenu", "drop", "focusout"].forEach(function(event) {
                textbox.addEventListener(event, function(e) {
                  if (inputFilter(this.value)) {
                    // Accepted value
                    if (["keydown","mousedown","focusout"].indexOf(e.type) >= 0){
                      this.classList.remove("input-error");
                      this.setCustomValidity("");
                    }
                    this.oldValue = this.value;
                    this.oldSelectionStart = this.selectionStart;
                    this.oldSelectionEnd = this.selectionEnd;
                  } else if (this.hasOwnProperty("oldValue")) {
                    // Rejected value - restore the previous one
                    this.classList.add("input-error");
                    this.setCustomValidity(errMsg);
                    this.reportValidity();
                    this.value = this.oldValue;
                    this.setSelectionRange(this.oldSelectionStart, this.oldSelectionEnd);
                  } else {
                    // Rejected value - nothing to restore
                    this.value = "";
                  }
                });
              });
            }


            // Install input filters.
            setInputFilter(document.getElementById("uintTextBox1"), function(value) {
              return /^\d*$/.test(value); }, "Skaičius turi būti teigiamas");
            setInputFilter(document.getElementById("uintTextBox2"), function(value) {
              return /^\d*$/.test(value); }, "Skaičius turi būti teigiamas");
            </script>
    </body>
</html>

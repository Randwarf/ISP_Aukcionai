<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Aukciono iniciavimas</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
      </head>

    <body>
    <?php include($_SERVER['DOCUMENT_ROOT']."/isp_aukcionai/include/header.php");?>

        <div class="container">
              <div class="col-12 card card-body bg-light p-4">
                <div class="row"> 
                  <div class="col-4">
                    <img style="max-width:100%; max-height:100%;"src="https://upload.wikimedia.org/wikipedia/commons/thumb/3/32/African_child.jpg/1200px-African_child.jpg" alt="Blue toy">
                </div>
                <div class="col-8">
                  <!-- Data-->
                  <div class="div-group">
                    <label>Aukciono gyvavimo trukmė:</label>
                    <label style="font-weight: bold;">2000-05-10</label>
                    <label> - </label>
                    <label style="font-weight: bold;">2022-11-05</label>
                  </div>
                  <!-- Pavadinimas-->
                  <div class="div-group">
                    <label>Prekės pavadinimas:</label>
                    <label>Prekė 1</label>
                  </div>
                  <!-- Kategorija-->
                  <div class="div-group">
                    <label for="kategorija">Kategorija: </label>
                    <label>Kita</label>
                  </div>
                  <!-- Aprasymas-->
                  <div class="div-group">
                    <label for="aprasymas">Aprašymas:</label>
                      <div class="input-group">
                        <textarea readonly placeholder="$aprasymas" id="aprasymas" class="form-control">Parduodamas mėlynas mažai naudotas žaislas vos tik 5 eur.</textarea>
                      </div>
                  </div>
                  <!-- Statusas-->
                  <div class="div-group">
                    <label for="nuotrauka">Aukciono būsena:</label>
                    <label for="nuotrauka">Laukiama patvirtinimo</label>
                  </div>
                  <!-- Min/Max-->
                  <form>
                    <label for="quantity">Statoma suma: (min 100 max 500):</label>
					</form>
                </div>
            </div>
              <br>
              <!-- Grįzti atgal į puslapi mygtukas-->
				<form>
					<input type="button" class="btn btn-primary" value="Grįžti" onclick="history.back()">
					<input href="Aukciono_langas.php" class="btn btn-primary" value="Kurti" onclick="window.location.href='Aukciono_langas.php'"\>
					
				</form>
            </div>
          </div>

    </body>
</html>

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
    <?php include("header.php");?>

        <div class="container">
              <div class="col-12 card card-body bg-light p-4">
                <form>
                  <!-- Pavadinimas-->
                  <div class="form-group">
                    <label for="pavadinimas">Prekės pavadinimas:</label>
                    <input type="text" class="form-control" id="pavadinimas" placeholder="$pavadinimas">
                  </div>
                  <!-- Kategorija-->
                  <div class="form-group">
                    <label for="kategorija">Kategorija:
                      <select id="kategorija" name="kategorija" required>
                        <option value="automobiliai">Automobiliai</option>
                        <option value="antikvaras">Antikvaras</option>
                        <option value="baldai">Baldai</option>
                        <option value="elektronika">Elektronika</option>
                        <option value="laisvalaikis">Laisvalaikis</option>
                        <option value="kita">Kita</option>
                      </select>
                    </label>
                  </div>
                  <!-- Foto ikelimas-->
                  <div class="form-group">
                    <label for="nuotrauka">Pasirinkite nuotrauką:</label>
                    <input type="file" id="nuotrauka" name="filename">
                  </div>
                  <!-- Aprasymas-->
                  <div class="form-group">
                    <label for="aprasymas">aprasymas:</label>
                      <div class="input-group">
                        <textarea placeholder="$aprasymas" id="aprasymas" class="form-control"></textarea>
                      </div>
                  </div>
                  <!-- Siusti mygtukas-->
                  <button type="submit" class="btn btn-primary">Patvirtinti</button>
              </form>
              <br>
              <!-- Grizti atgal i pagrindini puslapi mygtukas-->
              <form action="https://google.com">
                <input type="submit" class="btn btn-primary" value="Atšaukti" />
              </form>
            </div>
          </div>

    </body>
</html>
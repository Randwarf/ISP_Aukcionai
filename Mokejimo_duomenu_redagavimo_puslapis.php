<!DOCTYPE html>
<html>
    <head>
        <title>Pagrindinis Puslapis</title>
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
            <div class="container">
                <form>
                  <div class="col-12 card card-body bg-light p-4">
                      <div class="row"> 
                        <div class="col-4">
                            <h3>Mokėjimo duomenys</h3>
                            <br><label for="fname"><i class="fa fa-user"></i>Kortelės numeris</label><br>
                            <input type="text" id="fname" name="firstname"><br><br>
                            <label for="email"><i class="fa fa-envelope"></i>Vardas Pavardė</label><br>
                            <input type="text" id="email" name="email"><br><br>
                            <label for="adr"><i class="fa fa-address-card-o"></i> Kortelės galiojimo data</label><br>
                            <input type="text" id="adr" name="address" ><br><br>
                            <label for="city"><i class="fa fa-institution"></i>CVC</label><br>
                            <input type="text" id="city" name="city"><br><br>
                            <button>Išsaugoti</button>
                        </div>
                    </div>
                  </div>
                </form>
            </div>
        </div>
    </body>
</html>
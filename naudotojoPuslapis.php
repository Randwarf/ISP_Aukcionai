<!DOCTYPE html>
<html>
    <head>
        <title>Naudotojo puslapis</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
        <style>
            .button {
                background-color: #ffffff; /* Green #6292f8*/
                border-color: #6292f8;
                color: rgb(0, 0, 0);
                padding: 16px 32px;
                text-align: center;
                text-decoration: none;
                display: inline-block;
                font-size: 16px;
                margin: 4px 2px;
                transition-duration: 0.4s;
                cursor: pointer;
                border-radius: 12px;
                width: 100%;
            }

            .button:hover {
            background-color: #6292f8; /* Green #aac5fd*/
            color: rgb(0, 0, 0);
            }
        </style>
      </head>

    <body>
    <?php include("header.php");?>
        <h2 style="background-color: #2b2d33;color:white;  padding:10px">Naudotojo puslapis</h2>

        <div class="container-fluid">
            <div class="row justify-content-start">
                <div class="col-3">
                    <form action="Žinutės_Puslapis.php">
                        <button class="button" >Žinutės</button>
                    </form>
                    <form action="Adreso_atnaujinimo_puslapis.php">
                        <button class="button">Atnaujinti adresą</button>
                    </form>
                    <form action="Atsiskaitymo_puslapis.php">
                        <button class="button">Atsiskaitymai</button>
                    </form>
                    <form action="Mokejimo_duomenu_redagavimo_puslapis.php">
                        <button class="button">Redaguoti mokėjimo duomenis</button>
                    </form>
                    <form action="blokavimoPuslapis.php">
                        <button class="button">Blokavimo puslapis</button>
                    </form>
                    <form action="stebimi.php">
                        <button class="button">Stebimi aukcionai</button>
                    </form>
                    <form action="manoPrekes.php">
                        <button class="button">Mano prekes</button>
                    </form>
                </div>
                <div class="col-9">
                    <!--future php goes here-->
                </div>
            </div>
        </div>
            
    </body>
</html>
<head>
        <title>Bootstrap Example</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

        <style>
          .center {
  margin: auto;
  width: 50%;
  padding: 10px;
}
          </style>
</head>

<body>
    <?php 
    include($_SERVER['DOCUMENT_ROOT']."/isp_aukcionai/include/header.php");;?>
    <div class='center'>
    <?php
    if (isset($_POST)){
      echo "<a href='/isp_aukcionai/pirkimas/Aukciono_langas.php?id=" . $_POST['id'] . "'>Atgal</a> <hr>";
      
      if(isset($_POST['vidurkis'])){
        $query = "SELECT AVG(verte) as average FROM statymas WHERE fk_Aukcionasid_Aukcionas=" . $_POST['id']." GROUP BY fk_Aukcionasid_Aukcionas";
        $average = mysqli_query($db, $query);
        $average = mysqli_fetch_assoc($average);
        if (isset($average)){
          echo "Statymų vidurkis: " . round($average['average'], 2)."€";
        }
        else{
          echo "Statymų vidurkis neegzistuoja: dar nebuvo statymų";
        }
      }

      if(isset($_POST['statymai'])){
        echo "<hr>";

        echo "Statymai: <br>";
        echo '<div id="statymai" style="width:100%; max-width:600px; height:500px;"></div>';
      }
      
      if(isset($_POST['komentarai'])){
        echo "<hr>";

        echo "Komentarai: <br>";
        echo '<div id="myChart" style="width:100%; max-width:600px; height:500px;"></div>';
        echo "<hr>";

      }

      if(isset($_POST['aktyviausias'])){
        $query = "SELECT id_Vartotojas, vardas, pavarde, count(fk_Vartotojasid_Vartotojas) as result 
        FROM komentaras
        LEFT JOIN vartotojas ON vartotojas.id_Vartotojas=komentaras.fk_Vartotojasid_Vartotojas 
        WHERE komentaras.fk_Aukcionasid_Aukcionas=".$_POST['id']." 
        GROUP BY fk_Vartotojasid_Vartotojas 
        ORDER BY result desc 
        LIMIT 1";
        $mostActive = mysqli_query($db, $query);
        $mostActive = mysqli_fetch_assoc($mostActive);

        if(isset($mostActive)){
          echo "Aktyviausias vartotojas (".$mostActive['result']."komentarai): <br>";
          echo "<a href='naudotojoPuslapis.php?id=".$mostActive['id_Vartotojas']."'>".$mostActive['vardas']." ".$mostActive['pavarde']."</a>";
        }
        else{
          echo "Aktyviausio vartotojo nėra, kol nėra komentarų";
        }

      }
    }
    ?>

  </div>
<script>
google.charts.load('current',{packages:['corechart']});
google.charts.setOnLoadCallback(drawChart);

<?php

$query = "SELECT * FROM komentaras WHERE fk_Aukcionasid_Aukcionas='" . $_POST['id']."' ORDER BY laiko_zyme asc";
$result = mysqli_query($db, $query);

?>

function drawChart() {
// Set Data
var data = google.visualization.arrayToDataTable([
  ['Data', 'Kiekis']
  <?php
  $i = 0;
  foreach($result as $row){
      echo ",";
      echo "[";

      echo "new Date(";
      $datetime = new DateTime($row['laiko_zyme']);
      echo $datetime->format('o, n, j, H, i, s');
      echo ")";
      echo ",";

      $i += 1;
      echo $i;

      echo "]";
  }
  ?>
]);

// Set Options
var options = {
  title: 'Komentarų kiekis nuo laiko',
  hAxis: {title: 'Laikas'},
  vAxis: {title: 'Parašyti komentarai'},
  legend: 'none'
};
// Draw
if (data.getNumberOfRows() <= 0){
  data.addRows([[0,0],[1,0]]);
}
var chart = new google.visualization.LineChart(document.getElementById('myChart'));
chart.draw(data, options);
}
</script>

<script>
google.charts.load('current',{packages:['corechart']});
google.charts.setOnLoadCallback(drawChart);

<?php

$query = "SELECT * FROM statymas WHERE fk_Aukcionasid_Aukcionas='" . $_POST['id']."' ORDER BY laiko_zyme asc";
$result = mysqli_query($db, $query);

?>

function drawChart() {
// Set Data
var data = google.visualization.arrayToDataTable([
  ['Data', 'Kiekis']
  <?php
  foreach($result as $row){
      echo ",";
      echo "[";

      echo "new Date(";
      $datetime = new DateTime($row['laiko_zyme']);
      echo $datetime->format('o, n, j, H, i, s');
      echo ")";
      echo ",";

      echo $row['verte'];

      echo "]";
  }
  ?>
]);
// Set Options
var options = {
  title: 'Statymo vertė nuo laiko',
  hAxis: {title: 'Laikas'},
  vAxis: {title: 'Statymo vertė, €'},
  legend: 'none'
};
// Draw
if (data.getNumberOfRows() <= 0){
  data.addRows([[0,0],[1,0]]);
}
var chart = new google.visualization.LineChart(document.getElementById('statymai'));
chart.draw(data, options);
}
</script>


</body>
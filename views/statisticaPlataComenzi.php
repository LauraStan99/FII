<!DOCTYPE html>
 <html>

 <head>
      <link href="<?php echo URL; ?>public/css/statisticaComenzi.css" rel="stylesheet" />
      <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
      <script type="text/javascript">
           google.charts.load('current', {
                'packages': ['corechart']
           });
           google.charts.setOnLoadCallback(drawChart);

           function drawChart() {
                var data = google.visualization.arrayToDataTable([
                     ['Modalitate plata', 'Nr. comenzi/ modalitate plata'],
                     <?php
                         while ($row = $this->result->fetch()) {
                              echo "['" . $row["metoda_plata"] . "', " . $row["number"] . "],";
                         }
                         ?>
                ]);
                var options = {
                    pieHole: 0.5
                };
                var chart = new google.visualization.PieChart(document.getElementById('piechart'));
                chart.draw(data, options);
           }
      </script>
 </head>

 <body>
      <header>
           <?php
               require 'header.php';
               ?>
      </header>
      <br /><br />
      <main>
           <div>
                <h1>Statistica comenzilor efectuate in luna mai</h1>
                <hr>
           </div>
           <div id="piechart"></div>

      </main>
      <footer>
           <?php
               require 'footer.php'
               ?>
      </footer>
 </body>

 </html>
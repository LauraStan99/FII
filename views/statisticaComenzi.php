 <!DOCTYPE html>
 <html>

 <head>
      <link href="<?php echo URL; ?>public/css/statisticaComenzi1.css" rel="stylesheet" />
      <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
      <script type="text/javascript">
           google.charts.load('current', {
                'packages': ['corechart']
           });
           google.charts.setOnLoadCallback(drawChart);

           function drawChart() {
                var data = google.visualization.arrayToDataTable([
                     ['Data plasare', 'Numar comenzi/zi'],
                     <?php
                         while ($row = $this->result->fetch()) {
                              echo "['" . $row["data_plasare"] . "', " . $row["number"] . "],";
                         }
                         ?>
                ]);
                var options = {
                     is3D: true
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
           <div class="butoane">
                <form method="post" action="<?php echo URL ?>admin/createCsv">
                     <button type="submit" name="Export" class="exportAsCsv">EXPORT CSV</button>
                </form>
           </div>
      </main>
      <footer>
           <?php
               require 'footer.php'
               ?>
      </footer>
 </body>

 </html>
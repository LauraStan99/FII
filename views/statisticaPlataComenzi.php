<!DOCTYPE html>
<html>

<head>
     <link href="<?php echo URL; ?>public/css/statisticaComenzi.css" rel="stylesheet" />
     <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

     <script src="https://www.gstatic.com/charts/loader.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.5/jspdf.min.js"></script>

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
                    pieHole: 0.5,
                    slices: {
                         0: {
                              color: 'pink'
                         },
                         1: {
                              color: 'violet'
                         }
                    }
               };
               var chart = new google.visualization.PieChart(document.getElementById('piechart'));
               chart.draw(data, options);

               var btnSave = document.getElementById('save-pdf');
               google.visualization.events.addListener(chart, 'ready', function() {
                    btnSave.disabled = false;
               });
               btnSave.addEventListener('click', function() {
                    var doc = new jsPDF('l', 'mm', [297, 350]);
                    doc.addImage(chart.getImageURI(), 0, 40);

                    doc.text("Statistica comenzilor in functie de plata", 40, 30);
                    doc.save('chart.pdf');
               }, false);
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
               <h1>Statistica platilor efectuate in luna mai</h1>
               <hr>
          </div>
          <div id="piechart"></div>

          <form method="post" class="csv">
               <button type="submit" name="Export" id="exportAsCsv" formaction="<?php echo URL ?>admin/createCsvStatisticaPlataComenzi">EXPORT CSV</button>
          </form>
          <button id="save-pdf">SAVE AS PDF</button>

     </main>
     <footer>
          <?php
          require 'footer.php'
          ?>
     </footer>
</body>

</html>
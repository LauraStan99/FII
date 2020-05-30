<!DOCTYPE html>
<html>

<head>
    <!-- <link href="<?php echo URL; ?>public/css/statisticaProduseFemei1.css" rel="stylesheet" /> -->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script src="https://www.gstatic.com/charts/loader.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.5/jspdf.min.js"></script>

    <script src="https://www.gstatic.com/charts/loader.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.5/jspdf.min.js"></script>


    <script type="text/javascript">
        google.charts.load('current', {
            packages: ['corechart', 'bar']
        });
        google.charts.setOnLoadCallback(drawStacked);

        function drawStacked() {
            var data = google.visualization.arrayToDataTable([
                ['Categorie produs', 'Numar produse vandute', {
                    role: 'style'
                }],
                <?php
                while ($row = $this->result->fetch()) {
                    echo "['" . $row["categorie"] . "', " . $row["number"] . ", 'color:pink' ],";
                }
                ?>
            ]);

            var options = {
                chartArea: {
                    width: '50%'
                },
                isStacked: true,
                hAxis: {
                    format: '0',
                    title: 'Numar produse vandute',
                    minValue: 0,
                },
                vAxis: {
                    title: 'Categorie'
                },
                legend: 'none'

            };
            var chart = new google.visualization.BarChart(document.getElementById('chart_div'));
            chart.draw(data, options);

            var btnSave = document.getElementById('save-pdf');
            google.visualization.events.addListener(chart, 'ready', function() {
                btnSave.disabled = false;
            });
            btnSave.addEventListener('click', function() {
                var doc = new jsPDF('l', 'mm', [297, 350]);
                doc.addImage(chart.getImageURI(), 'JPEG', 0, 0);
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
            <h1>Statistica produselor (femei) vandute din fiecare categorie</h1>
            <hr>
        </div>
        <div id="chart_div"></div>
        <form method="post" action="<?php echo URL ?>admin/createCsvStatisticaProduseFemei">
            <button type="submit" name="Export" class="exportAsCsv">EXPORT CSV</button>
        </form>
        <button id="save-pdf">SAVE AS PDF</button>
        <br />

    </main>
    <footer>
        <?php
        require 'footer.php'
        ?>
    </footer>
</body>

</html>
<!DOCTYPE html>
<html>

<head>
    <link href="<?php echo URL; ?>public/css/statisticaProduseFemei.css" rel="stylesheet" />
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {
            packages: ['corechart', 'bar']
        });
        google.charts.setOnLoadCallback(drawStacked);

        function drawStacked() {
            var data = google.visualization.arrayToDataTable([
                ['Categorie produs', 'Numar produse vandute', {role:'style'}],
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
                    format:'0',
                    title: 'Numar produse vandute',
                    minValue: 0,
                },
                vAxis: {
                    title: 'Categorie'
                },
                legend:'none'
                
            };
            var chart = new google.visualization.BarChart(document.getElementById('chart_div'));
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
            <h1>Statistica produselor (femei) vandute din fiecare categorie</h1>
            <hr>
        </div>
        <div id="chart_div"></div>
        <br/>

    </main>
    <footer>
        <?php
        require 'footer.php'
        ?>
    </footer>
</body>

</html>
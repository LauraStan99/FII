<!DOCTYPE html>
<html>

<head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {
            packages: ['corechart', 'bar']
        });
        google.charts.setOnLoadCallback(drawStacked);

        function drawStacked() {
            var data = google.visualization.arrayToDataTable([
                ['Categorie produs', 'Numar produse vandute'],
                <?php
                         while ($row = $this->result->fetch()) {
                              echo "['" . $row["categorie"] . "', " . $row["number"] . "],";
                         }
                         ?>
            ]);

            var options = {
                chartArea: {
                    width: '50%'
                },
                isStacked: true,
                hAxis: {
                    title: 'Numar produse ',
                    minValue: 0,
                },
                vAxis: {
                    title: 'Categorie'
                }
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
            <h1>Statistica comenzilor efectuate in luna mai</h1>
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
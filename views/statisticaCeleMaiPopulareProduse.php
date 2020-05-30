<!DOCTYPE html>
<html>

<head>
    <link href="<?php echo URL; ?>public/css/statisticaComenzi.css" rel="stylesheet" />
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load("current", {
            packages: ["corechart"]
        });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['Produs', 'Numar achizitii'],
                <?php
                while ($row = $this->result->fetch()) {
                    echo "['" . $row["nume"] . "', " . $row["nr_accesari"] . "],";
                }
                ?>

            ]);

            var options = {
                pieSliceText: 'label',
                slices: {
        
                    2: {
                        offset: 0.2
                    },
                    5: {
                        offset: 0.2
                    },
                   
                    6: {
                        offset: 0.4
                    },
                    
                },
            };

            var chart = new google.visualization.PieChart(document.getElementById('piechart'));
            chart.draw(data, options);
        }
    </script>

<body>
    <header>
        <?php
        require 'header.php';
        ?>
    </header>
    <br /><br />
    <main>
        <div>
            <h1>Statistica celor mai vandute produse</h1>
            <hr>
        </div>
        <div id="piechart" ></div>
        <form method="post" action="<?php echo URL ?>admin/createCsvStatisticaCeleMaiPopulareProduse">
                <div class="form-group">
                     <div>
                          <input type="submit" name="Export" value="export to excel" />
                     </div>
                </div>
           </form>
        <br />

    </main>
    <footer>
        <?php
        require 'footer.php'
        ?>
    </footer>
</body>

</html>
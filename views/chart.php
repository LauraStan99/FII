<?php
$connect = mysqli_connect("localhost:3308", "dba", "sql", "impressed");  
$query = "SELECT data_plasare, count as number FROM comanda GROUP BY data_plasare";  
$result = mysqli_query($connect, $query);  
?>

<html>

<head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {
            packages: ['corechart', 'bar']
        });
        google.charts.setOnLoadCallback(drawDualX);

        function drawDualX() {
            var data = google.visualization.arrayToDataTable([
                ['City', '2010 Population', '2000 Population'],
                <?php  
                          while($row = mysqli_fetch_array($result))  
                          {  
                               echo "['".$row["data_plasare"]."', ".$row["number"]."],";  
                          }  
                          ?>
            ]);

            var materialOptions = {
                chart: {
                    title: 'Population of Largest U.S. Cities',
                    subtitle: 'Based on most recent and previous census data'
                },
                hAxis: {
                    title: 'Total Population'
                },
                vAxis: {
                    title: 'City'
                },
                bars: 'horizontal',
                series: {
                    0: {
                        axis: '2010'
                    },
                    1: {
                        axis: '2000'
                    }
                },
                axes: {
                    x: {
                        2010: {
                            label: '2010 Population (in millions)',
                            side: 'top'
                        },
                        2000: {
                            label: '2000 Population'
                        }
                    }
                }
            };
            var materialChart = new google.charts.Bar(document.getElementById('chart_div'));
            materialChart.draw(data, materialOptions);
        }
    </script>
</head>

<body>
    <br /><br />
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <div id="chart_div"></div>

</body>

</html>
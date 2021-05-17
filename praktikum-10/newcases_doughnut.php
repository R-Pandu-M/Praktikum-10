<?php
    include('koneksi.php'); 
    $query = mysqli_query($koneksi,"select * from nation_covid"); 
    while($row = mysqli_fetch_array($query)){ 
        $country[] = $row['country'];
        $new_cases[] = $row['new_cases'];
    }
?>
<html>
    <head>
        <title>Doughnut Chart of New Cases</title>
        <script type="text/javascript" src="Chart.js"></script> 
    </head>
    <body>
        <div id="canvas-holder" style="width:50%">
            <canvas id="chart-area"></canvas> 
        </div>
        <script>
            var config = {
                type: 'doughnut', 
                data: {
                    datasets: [{
                        data:<?php echo json_encode($new_cases); ?>, 
                        backgroundColor: [ 
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(251, 235, 217)',
                            'rgba(220, 220, 220)',
                            'rgba(100, 149, 237)',
                            'rgba(11, 29, 52, 1)',
                            'rgba(235, 299, 102, 2)',
                            'rgba(215, 199, 32, 1)'
                        ],
                        borderColor: [
                            'rgba(255,99,132,1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(255, 99, 132, 0.2)'
                        ],
                        label: 'Kasus Covid-19'
                    }],
                    labels: <?php echo json_encode($country); ?>}, 
                    options: {
                        responsive: true
                    }
                };
                window.onload = function() {
                    var ctx = document.getElementById('chart-area').getContext('2d');
                    window.myPie = new Chart(ctx, config);
                };
                document.getElementById('randomizeData').addEventListener('click', function() {
                    config.data.datasets.forEach(function(dataset) {
                        dataset.data = dataset.data.map(function() {
                            return randomScalingFactor();
                        });
                    });
                    window.myPie.update();
                });
                var colorNames = Object.keys(window.chartColors);
                document.getElementById('addDataset').addEventListener('click', function() {
                    var newDataset = {
                        backgroundColor: [],
                        data: [],
                        label: 'New dataset ' + config.data.datasets.length,
                    };
                    for (var index = 0; index < config.data.labels.length; ++index) {
                        newDataset.data.push(randomScalingFactor());

                        var colorName = colorNames[index % colorNames.length];
                        var newColor = window.chartColors[colorName];
                        newDataset.backgroundColor.push(newColor);
                    }
                    config.data.datasets.push(newDataset);
                    window.myPie.update();
                });
                document.getElementById('removeDataset').addEventListener('click', function() {
                    config.data.datasets.splice(0, 1);
                    window.myPie.update();
                });
        </script>
    </body>
</html>
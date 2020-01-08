<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Scoreboard</title>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="../assets/style.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <title>Document</title>
</head>
<body>
    <?php 
        require_once "../template/nav.php"; 
        require_once "../template/connection.php";
    ?>
    <div class="container">
    <div id="chart"></div>
        <table class="striped centered">
            <thead>
                <tr>
                    <th>Place</th>
                    <th>Name</th>
                    <th>Score</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $no = 1;
                    $sql = "SELECT users.username, SUM(challenges.poin) AS poin FROM users 
                            INNER JOIN solves ON users.id_user = solves.id_user 
                            INNER JOIN challenges ON solves.id_chall = challenges.id_chall 
                            WHERE solves.status = 1 
                            GROUP BY users.id_user 
                            ORDER BY poin DESC";
                    $result = $conn->query($sql);
                    while($row = $result->fetch_assoc()){
                ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $row['username']; ?></td>
                    <td><?php echo $row['poin']; ?></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <script>
 var options = {
        series: [
        <?php 
            $sql = "SELECT solves.id_user, users.username, challenges.title, challenges.poin FROM `solves`
                    INNER JOIN `users`
                    ON solves.id_user = users.id_user
                    INNER JOIN challenges
                    ON challenges.id_chall = solves.id_chall
                    WHERE solves.status = 1
                    ORDER BY users.id_user, challenges.poin"    
        ?>
          {
            name: "High - 2013",
            data: [0, 29, 33, 36, 32, 32, 33]
          },
          {
            name: "Low - 2013",
            data: [0, 11, 14, 18, 17, 13, 13]
          }
        ],
        chart: {
          height: 350,
          type: 'line',
          shadow: {
            enabled: true,
            color: '#000',
            top: 18,
            left: 7,
            blur: 10,
            opacity: 1
          },
          toolbar: {
            show: false
          }
        },
        colors: ['#77B6EA', '#545454'],
        dataLabels: {
          enabled: true,
        },
        stroke: {
          curve: 'smooth'
        },
        title: {
          text: 'Average High & Low Temperature',
          align: 'left'
        },
        grid: {
          borderColor: '#e7e7e7',
          row: {
            colors: ['#f3f3f3', 'transparent'], // takes an array which will be repeated on columns
            opacity: 0.5
          },
        },
        markers: {
          size: 1
        },
        xaxis: {
          categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul'],
          title: {
            text: 'Month'
          }
        },
        yaxis: {
          title: {
            text: 'Temperature'
          },
          min: 0,
          max: 40
        },
        legend: {
          position: 'top',
          horizontalAlign: 'right',
          floating: true,
          offsetY: -25,
          offsetX: -5
        }
      };

      var chart = new ApexCharts(document.querySelector("#chart"), options);
      chart.render();
        $('#scoreboard').addClass('active');
    </script>
</body>
</html>
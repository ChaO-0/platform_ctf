<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="../assets/style.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <title>Profile</title>
</head>
<body>
    <?php 
        require_once '../template/nav.php';
        require_once '../template/connection.php';
        $id = $_SESSION['id'];
        $sql = "SELECT users.username, challenges.id_chall, challenges.title, category.category , challenges.poin FROM solves 
                INNER JOIN challenges ON solves.id_chall = challenges.id_chall 
                INNER JOIN category ON category.id_category = challenges.id_category 
                INNER JOIN users ON users.id_user = solves.id_user
                WHERE users.id_user=$id AND solves.status=1
                GROUP BY challenges.id_chall";
        $points = $conn->query($sql);
        $get_uname = $conn->query($sql)->fetch_assoc();
        $uname = $get_uname['username'];
        $score = 0;
    ?>
    <div class="container">
        <h2 class="center-align"><?php echo $uname; ?></h2>
        <?php
            while($row = $points->fetch_assoc()){
                $score += $row['poin'];
            }
        ?>
        <h5 class="center-align"><?php echo $score . " Points"; ?></h5>

        <div class="row">
            <div class="col l6">
                <h5 class="center-align">Solves Percentages</h5>
                <div id="submission_chart"></div>
            </div>
            <div class="col l6">
                <h5 class="center-align">Category Breakdown</h5>
                <div id="solve_chart"></div>
            </div>
        </div>

        <h3 class="bud">Solves</h3>
        <table class="striped centered">
            <thead>
                <tr>
                    <th>Challenge</th>
                    <th>Category</th>
                    <th>Score</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $result = $conn->query($sql);
                    while($row = $result->fetch_assoc()){
                ?>
                <tr>
                    <td><?php echo $row['title']; ?></td>
                    <td><?php echo $row['category']; ?></td>
                    <td><?php echo $row['poin']; ?></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
        <br>
        <br>
    </div>
    <script>
        let labels = new Array();
        let series = new Array();
        <?php
            $sql = "SELECT users.username, challenges.id_chall, challenges.title, category.category , challenges.poin 
                    FROM solves 
                    INNER JOIN challenges ON solves.id_chall = challenges.id_chall 
                    INNER JOIN category ON category.id_category = challenges.id_category 
                    INNER JOIN users ON users.id_user = solves.id_user
                    WHERE users.id_user=$id 
                    GROUP BY category.category";
            $labels = $conn->query($sql);
            while($row = $labels->fetch_array()){
        ?>
            labels.push('<?php echo $row['category']; ?>');
        <?php    
            }
            $sql_bud = "SELECT solves.id_user, category.category, SUM(challenges.poin) as score
                        FROM solves
                        INNER JOIN challenges
                        ON solves.id_chall = challenges.id_chall
                        INNER JOIN category
                        ON category.id_category = challenges.id_category
                        WHERE solves.id_user=$id AND solves.status=1
                        GROUP BY category";
            $series = $conn->query($sql_bud);
            while($row = $series->fetch_array()){
        ?>
            series.push('<?php echo $row['score']; ?>');
            series = series.map(Number);
        <?php } ?>
        let options = {
            chart: {
                type: 'pie'
            },
            series: series,
            labels: labels
        }

        <?php
            $get_correct = "SELECT COUNT(status) as correct FROM solves
                            WHERE id_user = $id AND status=1";
            $correct = $conn->query($get_correct);
            $correct = $correct->fetch_assoc()['correct'];

            $get_incorrect = "SELECT COUNT(status) as incorrect FROM solves
                                WHERE id_user = $id AND status = 0";
            $incorrect = $conn->query($get_incorrect);
            $incorrect = $incorrect->fetch_assoc()['incorrect'];
        ?>

        let submissions = new Array();

        submissions.push('<?php echo $correct; ?>');
        submissions.push('<?php echo $incorrect; ?>');

        submissions = submissions.map(Number);

        let options2 = {
            chart: {
                type: 'pie'
            },
            series: submissions,
            labels: ['Correct', 'Incorrect'],
            colors: ['#00e673', '#F44336']
        }

        let chart = new ApexCharts(document.querySelector("#solve_chart"), options);
        chart.render();

        let chart2 = new ApexCharts(document.querySelector("#submission_chart"), options2);
        chart2.render();

        $(document).ready(function(){
            $('.sidenav').sidenav();
            $('#profile').addClass('active');
        });
    </script>
</body>
</html>
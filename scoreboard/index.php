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
    <title>Document</title>
</head>
<body>
    <?php 
        require_once "../template/nav.php"; 
        require_once "../template/connection.php";
    ?>
    <div class="container">
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
        $('#scoreboard').addClass('active');
    </script>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="../assets/style.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
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
                    <th>No. </th>
                    <th>Name</th>
                    <th>Affiliation</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $no = 1;
                    $sql = "SELECT * FROM users";
                    $result = $conn->query($sql);
                    while($row = $result->fetch_assoc()){
                ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $row['username']; ?></td>
                    <td><?php echo $row['affiliation']; ?></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <script>
        $('#users').addClass('active');
    </script>
</body>
</html>
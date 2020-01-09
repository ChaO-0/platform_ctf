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
        
        $sql = "SELECT title, description FROM `notification`";
        $result = $conn->query($sql);
        $no = 1
    ?>
    <div class="container">

        <div class="row">
            <?php
                if($result->num_rows > 0){ 
                while($row = $result->fetch_assoc()){
            ?>
            <div class="col s12 m12">
                <div class="card">
                    <div class="card-content ">
                        <span class="card-title"> <?php echo $no++ . ". " . $row['title']; ?></span>
                        <?php echo $row['description']; ?>
                    </div>
                </div>
            </div>
            <?php } 
                }else{
            ?>
            <div class="col s12 m12">
                <div class="card">
                    <div class="card-content ">
                        <span class="card-title">NO NOTIFICATIONS YET</span>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>

    </div>
    <script>
        $('#notification').addClass('active');
    </script>
</body>
</html>
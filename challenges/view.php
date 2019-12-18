<?php 
    require_once "../template/connection.php";
    if(!empty($_GET['id'])){
        $id = $_GET['id'];
    }else{
        $id = '0';
    }

    if($id != 0){
        $sql = "SELECT * FROM challenges WHERE id_category=$id";
        $result = $conn->query($sql);
        while($row = $result->fetch_assoc()){
?>    
    <a href="#">
        <div class="chall-card">
            <div class="card blue-grey darken-1">
                <div class="card-content white-text">
                    <span class="card-title"><?php echo $row['title']; ?></span>
                    <p><?php echo $row['poin']; ?></p>
                </div>
            </div>
        </div>
    </a>
    <?php 
            }
        }
    else{
        $sql = "SELECT * FROM challenges";
        $result = $conn->query($sql);
        while($row = $result->fetch_assoc()){ ?>
        <a href="#">
        <div class="chall-card">
            <div class="card blue-grey darken-1">
                <div class="card-content white-text">
                    <span class="card-title"><?php echo $row['title']; ?></span>
                    <p><?php echo $row['poin']; ?></p>
                </div>
            </div>
        </div>
    </a>
    <?php 
        }
    }
    ?>
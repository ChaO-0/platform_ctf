<?php 
    require_once "../template/connection.php";
    if(!empty($_GET['id'])){
        $id = $_GET['id'];
    }else{
        $id = '0';
    }
    error_reporting(E_ERROR | E_PARSE);
    session_start();
    $user = $_SESSION['id'];

    if($id == 0){
        $sql = "SELECT * FROM challenges ORDER BY poin ASC";
        $result = $conn->query($sql);
        while($row = $result->fetch_assoc()){
            $id = $row['id_chall'];
            $findsolve = "SELECT id_user, status FROM `solves` WHERE id_chall='$id' AND id_user='$user' AND status=1";
            $solved = $conn->query($findsolve);
?>    
    <a href="#<?php echo "chall" . $row['id_chall']; ?>" class="modal-trigger">
        <div class="chall-card">
            <div id="<?php echo "card" . $row['id_chall']; ?>" class="card blue-grey darken-1 <?php while($data = $solved->fetch_assoc()){if($data['status'] == 1)echo "teal accent-3"; } ?>">
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
        $sql = "SELECT * FROM challenges WHERE id_category=$id ORDER BY poin ASC";
        $result = $conn->query($sql);
        while($row = $result->fetch_assoc()){
            $id = $row['id_chall'];
            $findsolve = "SELECT id_user, status FROM `solves` WHERE id_chall='$id' AND id_user='$user' AND status=1";
            $solved = $conn->query($findsolve);
    ?>
    <a href="#<?php echo "chall" . $row['id_chall']; ?>" class="modal-trigger">
        <div class="chall-card">
            <div class="card blue-grey darken-1 <?php while($data = $solved->fetch_assoc()){if($data['status'] == 1)echo "teal accent-3"; } ?>">
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
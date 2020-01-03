<thead>
    <tr>
        <th>No. </th>
        <th>Name</th>
        <th>Affiliation</th>
    </tr>
</thead>
<tbody>
    <?php
        require_once '../template/connection.php';
        $limit = 2;
        $page = isset($_GET['page']) ? $_GET['page'] : 1;
        $start = $page > 1 ? ($page * $limit) - $limit : 0;
        $no = 1;
        $sql = "SELECT * FROM users WHERE role=0";
        $view = $conn->query($sql);
        $total = $view->num_rows;
        $pages = ceil($total / $limit);
        $new_sql = "SELECT * FROM users WHERE role=0 LIMIT $start, $limit";
        $result = $conn->query($new_sql);
        while($row = $result->fetch_assoc()){
            if($row['role'] != 1){
    ?>
    <tr>
        <td><?php echo $no++; ?></td>
        <td><?php echo $row['username']; ?></td>
        <td><?php echo $row['affiliation']; ?></td>
    </tr>
    <?php 
            } 
        }
    ?>
</tbody>
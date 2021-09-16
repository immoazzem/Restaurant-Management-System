<?php
$mysqli = new mysqli('localhost', 'root', '', 'wdpf47_rms') or die('error');

$id = $_POST['pid'];

    $sql = "SELECT * FROM products WHERE id = '$id'";
    $result = $mysqli->query($sql);
    while($row = $result->fetch_assoc()){
        echo $row['price'];
    }


?>
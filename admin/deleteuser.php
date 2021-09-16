<?php
$mysqli = new mysqli('localhost', 'root', '', 'wdpf47_rms') or die('error');


    $msg = '';
    $id = $_REQUEST['id'];
    $sql = "DELETE FROM users WHERE id='$id'";
    $mysqli->query($sql);
    if($mysqli->affected_rows){
            $msg = "Deleted Successfully";
            header("location:managestores.php");
        }
?>  
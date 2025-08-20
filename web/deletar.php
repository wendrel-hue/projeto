<?php include_once "config.php";?>
<?php
$id = $_GET['id'];
$sql = "DELETE FROM tbclientes WHERE id='$id'";
if (mysqli_query($conn, $sql)) {
    header("location: addtbc.php");
}else{
    echo 'deu erro';
}
?>
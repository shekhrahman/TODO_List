<?php 
include "connection.php";
$id=$_GET['id_delete'];
$delete=mysqli_query($con,"delete from todo_list where id=$id");
echo "<script>
window.open('index.php','_self');</script>";
?>
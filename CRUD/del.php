<?php
    include "db.php";
    $id=$_GET['id']; 
    $sql="DELETE FROM `users` WHERE id = '$id'";
    

   
    //if(isset($_POST['submit'])){
        $del= mysqli_query($conn, $sql);

        header("location:records.php");
    //}
?>



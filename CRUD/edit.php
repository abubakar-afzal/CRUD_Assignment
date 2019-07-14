<?php
    include "db.php";
    $id=$_GET['id'];
    $error[]='';
    $sql="SELECT * FROM `users` WHERE id='$id'";
    $result=mysqli_query($conn, $sql);
    $old_record=mysqli_fetch_array($result);

    if(isset($_POST['submit'])){
        
        $first_name=trim($_POST['first_name']);
        $last_name=trim($_POST['last_name']);
        $e_mail=trim($_POST['e_mail']);
        $ph_num=trim($_POST['ph_num']);
        
        //CONDITION IF USER DONT ENTER FIRST NAME
        if (isset($_POST['first_name']) && $_POST['first_name'] != '') {
            $first_name = $_POST['first_name'];
        } else {
            $error[] = 'First Name is missing';
            
        }
        //CONDITION IF USER DONT ENTER LAST NAME
        if (isset($_POST['last_name']) && $_POST['last_name'] != '') {
            $last_name = $_POST['last_name'];
        } else {
            $error[] = 'Last Name is missing';
            
        }
        //CONDITION IF USER DONT ENTER EMAIL 
        if (isset($_POST['e_mail']) && $_POST['e_mail'] != '') {
            $e_mail = $_POST['e_mail'];
        } else {
            $error[] = 'Email is missing';
            
        }
        //CONDITION IF USER DONT ENTER PHONE NUMBER
        if (isset($_POST['ph_num']) && $_POST['ph_num'] != '') {
            $ph_num = $_POST['ph_num'];
        } else {
            $error[] = 'Phone Number is missing';
            
        }

        if (count($error)>1) {
            // LIST ALL MISSING FIELDS
            
            foreach ($error as $value) {
                
                echo $value;
                echo '<br>';
            }
        }
        else{
            $sql="UPDATE `users` SET `First Name`='$first_name',`Last Name`='$last_name',`E-mail`='$e_mail',`Phone`='$ph_num' WHERE id='$id'";
            
            if (mysqli_query($conn, $sql)) {
                //echo "record edited successfully"."<br>";
                header("location:records.php");
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
            
            mysqli_close($conn);
        }
    }    
?>



<html>
    <head>
            <title> Assignment 1 </title>
            <h1>Phone Directory </h1>
    </head>

    <body>
        
        <fieldset>
            <form action="" method="POST">
                <table>
                    <tr>
                        <td>First Name :</td>
                        <td><input type="text" placeholder="First Name" name='first_name' value="<?php  echo $old_record['First Name'];?>"></td>
                        
                    </tr>
                    <tr>
                        <td>Last Name :</td>
                        <td><input type="text" placeholder="Last Name" name='last_name' value="<?php  echo $old_record['Last Name'];?>"></td>
                        
                    </tr>
                    <tr>
                        <td>Email :</td>
                        <td><input type="mail" placeholder="abc@xyz.com" name='e_mail' value="<?php  echo $old_record['E-mail'];?>"></td>
                        
                    </tr>
                    <tr>
                        <td>Contact No :</td>
                        <td><input type="Phone" placeholder="03xx-xxxxxxx" name='ph_num' value="<?php echo $old_record['Phone'];?>"></td>
                        
                    </tr>
                </table>
                <input type="Submit" name="submit" value="Update Record">
                
            </form>
        </fieldset>
    </body>
</html>



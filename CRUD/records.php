<?php
    include "db.php"
?>

<html>
    <head>
            <title> Assignment 1 </title>
            <h1>All Contacts</h1>
    </head>

    <body>
        <fieldset>
            <table border="2">
            
                <tr>
                    <th>Id</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>

                <?php
                    $sql="SELECT * FROM `users` ";
                    $result = mysqli_query($conn, $sql);
                    
                    if (mysqli_num_rows($result) > 0) {
                        while($row = mysqli_fetch_assoc($result)) {
                ?>
                        <tr>
                            <td><?php echo $row["Id"];?> </td>
                            <td><?php echo $row["First Name"];?> </td>
                            <td><?php echo $row["Last Name"];?> </td>
                            <td><?php echo $row["E-mail"];?> </td>
                            <td><?php echo $row["Phone"];?> </td>
                            <td><a href="edit.php?id=<?php echo $row["Id"];?>">Edit </a></td>
                            <td><a href="del.php?id=<?php echo $row["Id"];?>">Delete</td>
                        </tr>
                <?php   }
                    } else {
                        echo "0 results";
                    }
                    
                    mysqli_close($conn);
                ?>
            </table>
            <a href="create.php"> Add New Contact</a>
        </fieldset>
    </body>
</html>
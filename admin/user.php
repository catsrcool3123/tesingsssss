<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>
<body>
    <?php
    include 'mystore.php';
    $con = mysqli_connect('localhost','root','','project');
    $query = mysqli_query($con, "SELECT * FROM `users`");
    $row_count=mysqli_num_rows($query);
    ?>

    <div class="container mt-2">
        <div class="row">
            <div class="col-md-12">

          

    <table class="table table-secondary table-bordered" >
        <thead class="text-center">
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Delete</th>
            
        
        </thead>
        <tbody class="text-dark text-center">
            <?php
                   $i =  0;
               while($row = mysqli_fetch_array($query)){
                    echo "
                    <tr>
                    <td>";?><?php echo ++$i;?><?php echo "</td>
                    <td>$row[Username]</td>
                    <td>$row[Email]</td>
                    <td><a href='delete.php? ID=$row[ID]' class='btn btn-outline-danger'>Delete</a></td>
                </tr>
                    ";
                }
            ?>
        </tbody>
    </table>
    
</body>
</html>
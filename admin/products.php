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
  ?>
    <div class="container mt-5">
    <div class="row">
        <div class="col-md-10 m-auto">
            <table class="table table-hover table-striped border border-dark text-center">
                <thead class="bg-dark text-white fs-9 ">
                    <tr>
                        <th>ID</th>
                        <th>Product Name</th>
                        <th>Product Price</th>
                        <th>Product Image</th>
                        <th>Product Type</th>
                        <th>Product Description</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include 'product/Config.php';
                    $query = mysqli_query($con, "SELECT * FROM `product`");
                    while ($row = mysqli_fetch_array($query)) {
                        $id = $row['ID'];
                        $pname = $row['PName'];
                        $pprice = $row['PPrice'];
                        $pimage = $row['PImage'];
                        $ptype = $row['PType'];
                        $pdesc = $row['PDesc'];
                        echo "<tr>
                                <td>$id</td>
                                <td>$pname</td>
                                <td>$pprice</td>
                                <td><img src='product/$pimage' height='100px' width='100px'></td>
                                <td>$ptype</td>
                                <td>$pdesc</td>
                                <td>
                                    <a href='product/delete.php?id=$id' class='btn btn-danger btn-sm' onclick=\"return confirm('Are you sure you want to delete this product?');\">Delete</a>
                                </td>
                            </tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
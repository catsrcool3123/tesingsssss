<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>product-page</title>

    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">

</head>

<body>


    <div class="container">
        <div class="row">
            <div class="col-md-6 m-auto mt-3 border">


                <form action="insert.php" method="POST" enctype="multipart/form-data">

                    <div class="mb-3">

                        <p class="text-center fw-bold fs-3 text-grass">Product Details</p>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Product Name:</label>
                        <input type="text" name="PNAME" class="form-control" placeholder="Enter product name">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Product Price:</label>
                        <input type="text" name="PPRICE" class="form-control" placeholder="Enter product price">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Add Product Image:</label>
                        <input type="file" name="PIMAGE" class="form-control">
                    </div>


                    <div class="mb-3">
                        <label class="form-label" size="10">Product Type</label>
                        <select class="form-select" name="PTYPE">
                            <option value="fruit">fruit</option>
                            <option value="vegtable">vegetable</option>
                            <option value="dairy">dairy</option>
                            <option value="drinks">drinks</option>
                            <option value="soda">soda</option>


                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Add Product Description:</label>
                        <input type="text" name="PDesc" class="form-control" placeholder="Enter product description">
                    </div>
                    <button name="SUBMIT" class="bg-info fs-4 fw-bold my-3 form-control">Upload</button>

                </form>
            </div>
        </div>
    </div>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6 m-auto">
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
                        include 'Config.php';
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
                                    <td><img src='$pimage' height = '150px' width = '150px'></td>
                                    <td>$ptype</td>
                                    <td>$pdesc</td>
                                    <td>
                                        <a href='delete.php?id=$id' class='btn btn-danger btn-sm' onclick=\"return confirm('Are you sure you want to delete this product?');\">Delete</a>
                                    </td>
                                </tr>
                                ";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>
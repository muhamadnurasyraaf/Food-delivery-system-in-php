<?php
    require_once 'config.php';
    session_start();

    $merchid = $_SESSION['merchant_id'];

    $merch = mysqli_fetch_assoc($conn->query("SELECT * FROM merchant WHERE id = '$merchid';"));

    if(isset($_POST['submit'])){
        $allowed_ext = array('jpg','png','jpeg','webp');
        if(!empty($_FILES['upload']['name'])){
            $file_name = $_FILES['upload']['name'];
            $file_size = $_FILES['upload']['size'];
            $file_tmp = $_FILES['upload']['tmp_name'];
            $target_dir = "merch-icon/$file_name";

            //get file extension

            $file_ext = explode('.',$file_name);
            $file_ext = strtolower(end($file_ext));

            if(in_array($file_ext,$allowed_ext)){
                if($file_size <= 1000000){
                    move_uploaded_file($file_tmp,$target_dir);
                    $message = "<p style='color:green;'>Image uploaded , refresh to see the uploaded image</p>";
                    $upload = $conn->query("UPDATE merchant SET image = '$file_name' WHERE id = '$merchid';");
                    if(!$upload){
                        echo"
                        <script>
                            alert('Failed to insert the image to database');
                        </script>
                        ";
                    }
                }
            }
            else{
                $message = "<p style='color:red;'>Invalid File Type</p>";
            }
        }else{
            $message = "<p style='color:red;'>Please choose a file</p>";
        }
    }


    if(isset($_POST['add'])){
        $productname = htmlspecialchars($_POST['productname']);
        $description = htmlspecialchars($_POST['description']);
        $price = floatval($_POST['price']);
        $allowed_ext = array('jpg','png','jpeg');
        if(!empty($_FILES['image']['name'])){
            $file_name = $_FILES['image']['name'];
            $file_size = $_FILES['image']['size'];
            $file_tmp = $_FILES['image']['tmp_name'];
            $target_dir = "product-img/$file_name";

            //get file extension

            $file_ext = explode('.',$file_name);
            $file_ext = strtolower(end($file_ext));

            if(in_array($file_ext,$allowed_ext)){
                if($file_size <= 1000000){
                    move_uploaded_file($file_tmp,$target_dir);
                    $message = "<p style='color:green;'>Image uploaded , refresh to see the uploaded image</p>";
                    $upload = $conn->query("INSERT INTO product(merchant_id,product_name,description,image,price) VALUES($merchid,'$productname','$description','$file_name',$price);");
                    if(!$upload){
                        echo"
                        <script>
                            alert('Failed to register product : ' + $message);
                        </script>
                        ";
                    }else{
                        
                            echo"
                            <script>
                                alert('Product registration succeed');
                            </script>
                            ";
                    }
                }
            }
            else{
                $message = "<p style='color:red;'>Invalid File Type</p>";
            }
        }else{
            $message = "<p style='color:red;'>Please choose a file</p>";
        }
    
    }
    $data = mysqli_fetch_assoc($conn->query("SELECT * FROM merchant WHERE id = $merchid;"));
    $image_url = $data['image'];

    $product = $conn->query("SELECT * FROM product WHERE merchant_id = '$merchid;'");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="delivery-man.png" type="image/x-icon">
    <link rel="stylesheet" href="/styles/merchantpage.css">
    <title>Merchant Page</title>
</head>
<body>
    
    <div class="sidebar">
        <div class="sidebar-header">
            <img src="delivery-man.png" class="spice-icon">
            Spice Boy
        </div>
    </div>
    <div class="profile" id="profile">
        <h3>Dashboard</h3>
        <?php echo $message ??null;?>
       <div class="pfp">
         <form action="" method="post" enctype="multipart/form-data" class="pfp">
            <?= is_null($merch['image']) ?"<label for='file'>Select an image to upload</label> <input type='file' id='file' name='upload'> <br> <input type='submit' name='submit'>" : "<img src='merch-icon/$image_url' class='merch-icon'> " ?> 
         </form> 
       </div>
       <div class="info">
            <div>
                <label for="brand">Branding : </label>
                <p id="brand"><?= $merch['brand'];?></p> 
            </div>
           
            <div>
                <label for="username">Username : </label>
                <p id="username"><?= $merch['username'];?></p> 
            </div>
            
            <div>
                <label for="email">Email : </label>
                <p id="email"><?= $merch['email'];?></p> 
            </div>
            
       </div>
    </div>

    <span>Product Section</span>
    <div class="product">
        <div>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data" class="add-product">
                    <div>
                        <input type="file" name="image" id="">
                    </div>
                <div> 
                    <label for="">Product Name:</label>
                    <input type="text" name="productname">
                </div>
                <div> 
                    <label>Description : </label>
                    <textarea name="description" id="" cols="30" rows="10"></textarea>
                </div>
                <div>
                    <label>Price(RM) : </label>
                    <input type="text" name="price">
                </div>

                <div>
                    <input type="submit" value="Add Product" name="add">
                </div>
            </form>
        </div>
       <div class="existing-product">
            <table class="styled-table">
                <thead>
                    <tr>
                        <th>Product ID</th>
                        <th>Product Image</th>
                        <th>Product Name</th>
                        <th>Description</th>
                        <th>Price(RM)</th>
                    </tr>
                </thead> 
                <?php while($pdata = mysqli_fetch_assoc($product)) : ?>
                 <tr>
                    <td><?= !is_null($pdata) ? $pdata['id'] : 'Null'?></td>
                    <td><img src="product-img/<?= $pdata['image'];?>" class="product-image"></td>
                    <td><?= $pdata['product_name'];?></td>
                    <td><?= !empty($pdata['description']) ? $pdata['description'] : 'No description';?></td>
                    <td><?= $pdata['price'];?></td>
                </tr>
                <?php endwhile; ?>
            </table>
       </div>
       <a href="order.php" class="order-btn">Orders</a>
       <input type="submit" value="Sign Out" name="logout">
    </div>
</body>
</html>
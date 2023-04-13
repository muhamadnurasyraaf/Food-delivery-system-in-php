<?php 
    require_once 'config.php';
    session_start();
    $currentid = $_SESSION['id'];

    $data = mysqli_fetch_assoc($conn->query("SELECT * FROM address WHERE user_id = '$currentid';"));
    if(isset($_POST['submit'])){
        $line1 = $_POST['line1'];
        $line2 = $_POST['line2'];
        $postcode = $_POST['postcode'];
        $area = $_POST['area'];
        $state = $_POST['state'];
        $country = $_POST['country'];
        $qry = "INSERT INTO address(user_id,address_line1,address_line2,postcode,area,state,country)VALUES('$currentid','$line1','$line2','$postcode','$area','$state','$country');";

        $result = $conn->query($qry);
        if($result){
            echo"
                <script>
                    alert('Address successfully added');
                </script>
            ";
            header("Location: userprofile.php");
        }
        else{
            echo"
                <script>
                    alert('Address failed to add');
                </script>
            ";
        }
    }

    if(isset($_POST['update'])){
        $line1 = htmlspecialchars($_POST['line1']);
        $line2 = htmlspecialchars($_POST['line2']);
        $postcode = htmlspecialchars($_POST['postcode']);
        $area = htmlspecialchars($_POST['area']);
        $state = htmlspecialchars($_POST['state']);
        $country = htmlspecialchars($_POST['country']);
        $qry = "UPDATE address SET address_line1 = '$line1',address_line2 = '$line2',postcode = '$postcode',area = '$area',state = '$state',country = '$country' WHERE user_id = '$currentid';";

        $result = $conn->query($qry);
        if($result){
            echo"
                <script>
                    alert('Address successfully updated');
                </script>
            ";
            header("Location: userprofile.php");
        }
        else{
            echo"
                <script>
                    alert('Address failed to update');
                </script>
            ";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="delivery-man.png" type="image/x-icon">
    <link rel="stylesheet" href="/styles/set-address.css">
    <title>Edit Address</title>
</head>
<body>
    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
    <div class="form">
        <h3>USER ADDRESS</h3>
        <input type="text" name="line1" placeholder="Address Line 1" autocomplete="off">
        <input type="text" name="line2" placeholder="Address Line 2" autocomplete="off">
        <input type="text" name="postcode" placeholder="PostCode" autocomplete="off">
        <input type="text" name="area" placeholder="Area" autocomplete="off">
        <input type="text" name="state" placeholder="State" autocomplete="off">
        <input type="text" name="country" placeholder="Country" autocomplete="off">
        <?=  is_null($data) ? '<input type="submit" value="Submit" name="submit" class="submit-btn">' : '<input type="submit" value="update" name="update" class="submit-btn">'?>
    </div>
    <div class="submit-btn">
        <a href="userprofile.php"> &larr; Back to your profile</a>
    </div>
        
    </form>
</body>
</html>
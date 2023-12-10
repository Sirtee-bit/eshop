<?php
session_start();
// session_destroy();
if (!isset($_SESSION['username'])) {
    header("location: login.php?error=not_logged_in");
}

$conn = mysqli_connect("localhost", "root", "", "eshop");

if (isset($_POST['name'])) {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    $category = $_POST['category'];
    $image = "550x750.png";

    if ($name == "") {
        header("location: upload-product.php?empty=name");
    } else if ($price == "") {
        header("location: upload-product.php?empty=price");
    } else if ($description == "") {
        header("location: upload-product.php?empty=description");
    } else if ($category == "") {
        header("location: upload-product.php?empty=category");
    } else {
        $sql = "INSERT INTO products (image, name, price, description, category) VALUES ('$image', '$name', '$price', '$description', '$category');";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            header("location: upload-product.php?status=success");
        } else {
            header("location: upload-product.php?status=failed");
        }
    }
}

?>

<h1>Upload Product</h1>
<?php

if (isset($_GET['status'])) {
    $status = $_GET['status'];

    if ($status == "success") {
        echo "<span style='margin-bottom:10px;width:auto;padding:10px;background:mediumseagreen;color:white;border-radius:5px;'>Upload successful!</span><br><br>";
    } else if ($status == "failed") {
        echo "<span style='margin-bottom:10px;padding:10px;background:red;color:white;border-radius:5px;'>Upload failed!, try again.</span><br><br>";
    }
}

if (isset($_GET['empty'])) {
    $empty = $_GET['empty'];
    echo "<div style='margin-bottom:10px;padding:10px;background:red;color:white;border-radius:5px;'>" . $empty . " cannot be empty!</div>";
}
?>
<form action="" method="POST">
    <input type="text" placeholder="name" name="name" required="true"> <br>
    <input type="text" placeholder="price" name="price"> <br>
    <textarea name="description" placeholder="description"></textarea> <br>
    <select name="category">
        <option value="">Select Category</option>
        <option>Men</option>
        <option>Women</option>
    </select> <br>
    <button>Upload</button>
</form>
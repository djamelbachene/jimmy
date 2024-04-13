<?php
$db = mysqli_connect("localhost", "root", "", "project.db");
$msg = "";

if (isset($_POST['upload'])) {
    $image = $_FILES['image']['name'];
    $image_price = mysqli_real_escape_string($db, $_POST['prod_price']);
    $image_name = mysqli_real_escape_string($db, $_POST['prod_name']);
    $image_id = mysqli_real_escape_string($db, $_POST['prod_id']);
    $target = "images/" . basename($image);

    if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
        $sql = "INSERT INTO products (prod_id, prod_name, prod_price, image) VALUES ('$image_id','$image_name','$image_price', '$image')";
        if (mysqli_query($db, $sql)) {
            $msg = "Image uploaded successfully";
        } else {
            $msg = "Error: " . mysqli_error($db);
        }
    } else {
        $msg = "Failed to upload image";
    }
}

$result = mysqli_query($db, "SELECT * FROM products");
?>

  <!DOCTYPE html>
  <html>
  <head>
  <title>Image Upload</title>
  <style type="text/css">
     #content{
          width: 50%;
          margin: 20px auto;
          border: 1px solid #cbcbcb;
     }
     form{
          width: 50%;
          margin: 20px auto;
     }
     form div{
          margin-top: 5px;
     }
     #img_div{
          width: 80%;
          padding: 5px;
          margin: 15px auto;
          border: 1px solid #cbcbcb;
     }
     #img_div:after{
          content: "";
          display: block;
          clear: both;
     }
     img{
          float: left;
          margin: 5px;
          width: 300px;
          height: 140px;
     }
  </style>
  </head>
  <body>
  <div id="content">
    <?php
      while ($row = mysqli_fetch_array($result)) {
          echo "<div id='img_div'>";
          echo "<img src='images/".$row['image']."' >";
          echo "<p>".$row['prod_id']."</p>";
          echo "<p>".$row['prod_name']."</p>";
          echo "<p>".$row['prod_price']."</p>";
        echo "</div>";
      }
    ?>
    <form method="POST" action="index.php" enctype="multipart/form-data">
          <input type="number" name="prod_id" placeholder="id" >
          <input type="text" name="prod_price" placeholder="price" >
          <input type="text" name="prod_name" placeholder="name">
          <div>
            <input type="file" name="image">
          </div>
          <div>
        
          </div>
          <div>
                  <button type="submit" name="upload">POST</button>
          </div>
    </form>
  </div>
  </body>
  </html>

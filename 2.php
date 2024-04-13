<?php
    require_once("connection.php");
    @$view_all = $_GET["view_all"];
    $sql="SELECT * FROM products";
    $all_product=$conn->query($sql);




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"> 
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet"> 
    <link rel="stylesheet" href="khaled.css">
    <title>Document</title>

    <style>
      .payment-container {
        position: fixed;
        width: 30%;
        height: auto;
        top: 50%;
        left: 50%;
        transform: scale(1.05);
        transform: translate(-50%, -50%);
        background-color: #f8f9fa;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        z-index: 1000;
        transition: all 1ms ease;
    }
    .payment-container h3 {
        text-align: center;
        margin-bottom: 20px;
    }
    .payment-container form {
        text-align: center;
    }
    .payment-container label {
        display: block;
        margin-bottom: 10px;
    }
    .payment-container input {
        width: 100%;
        padding: 10px;
        margin-bottom: 15px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }
    .payment-container button {
        background-color: #007bff;
        color: #fff;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s;
    }
    .payment-container button:hover {
        background-color: #0056b3;
    }
   </style>
</head>




<body style="background-color: rgb(0, 0, 0);">
    <nav class="navbar navbar-expand-lg navbar-dark bg-black"> 
        <div class="container-fluid"> 
          <a class="navbar-brand" href="#" style="color: red;">SHOPI.NET</a> 
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"> 
            <span class="navbar-toggler-icon"></span> 
          </button> 
          <div class="collapse navbar-collapse" id="navbarSupportedContent"> 
            <ul class="navbar-nav me-auto mb-2 mb-lg-0"> 
              <li class="nav-item"> 
                <a class="nav-link active" aria-current="page" href="#">HOME</a> 
              </li> 
              <li class="nav-item"> 
                <a class="nav-link active" href="#">CART</a> 
              </li> 
            </ul> 
            <div class="d-flex"> 
              <button class="btn btn-outline-light me-2" type="button">Login</button> 
              <button class="btn btn-danger" type="button">Sign Up</button> 
            </div> 
          </div> 
        </div> 
      </nav>
<main>
<div class="payment-container" id="paymentContainer">
    <h3>Payment Details</h3>
    <form>
        <label for="cardNumber">Card Number:</label>
        <input type="text" id="cardNumber" name="cardNumber" required><br><br>
        <label for="expiry">Expiry Date:</label>
        <input type="text" id="expiry" name="expiry" required><br><br>
        <label for="cvv">CVV:</label>
        <input type="text" id="cvv" name="cvv" required><br><br>
        <button type="submit">Pay Now</button>
    </form>
</div>
    <?php 
    while ($row=mysqli_fetch_assoc($all_product)){
    
    ?>


      
   
    <div class="up">
        <div class="filter">
            <ion-icon name="filter" class="filter-icon"></ion-icon>
            <select id="choices" onchange="filter()">
                <option selected hidden>Filter..</option>
                <option value="1"></option>
                <option value="2"></option>
                <option value="3"></option>
                <option value="4"></option>
            </select>
        </div>
        <div class="search-bar">
            <input type="text" placeholder="Search products...">
            <button name="search-outline">search</button>
    </div>
     
        
    <div class="all-product">    
        <div class="sco">
        <div class="container">
            <div class="product-card" id="<?php echo $row["prod_id"];?>">
            <?php   echo "<img src='images/".$row['image']."' >";?>
                <div class="prod-details">
                    <div class="prod-name"><?php echo $row["prod_name"];?></div>
                    <div class="prod-price"><?php echo $row["prod_price"];?></div>
                    <div class="demande">
                        <button class="buy" onclick="togglePaymentContainer()">Buy Now</button>
                        <button class="add">Add</button>
                    </div>
                </div>
            </div>
        </div>
        </div>
   </div>



<footer class="footer">
    <div class="container-foot">
        <div class="row">
            <div class="">
                <h5>Follow Us</h5>
                <ul class="list-inline">
                    <li class="list-inline-item"><a href="#"><i class="fab fa-facebook"></i></a></li>
                    <li class="list-inline-item"><a href="#"><i class="fab fa-twitter"></i></a></li>
                    <li class="list-inline-item"><a href="#"><i class="fab fa-instagram"></i></a></li>
                    <li class="list-inline-item"><a href="#"><i class="fab fa-linkedin"></i></a></li>
                </ul>
            </div>
            <div class="">
                <h5>Contact Us</h5>
                <li><i class="fas fa-envelope"></i> shopi.net@gmaill.com</li>
                <li><i class="fas fa-phone-alt"></i> +1234567890</li>
                <li><i class="fas fa-map-marker-alt"></i> University Yahya Fares, Medea, Algeria</li>
            </div>
            
        </div>
    </div>
    <div class="container-foot text-center">
        <span class="text-muted">&copy; 2024 Your Company. All rights reserved.</span>
    </div>
</footer>
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
   <?php
    }
   ?>
</main> 
</body> 
</html>

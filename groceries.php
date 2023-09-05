<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css" />
    <link rel="icon" href="https://www.pngmart.com/files/7/Cart-PNG-Clipart.png" />
    <title>YourCart - Groceries</title>
    <style>
      hr{
        padding-top: 05px;
      }
      img {
        width: 150px;
        height: 150px;
        margin-top: -70px;
        margin-left: 10px;
      }
      .cart-button{
        background-color: #0002ff;
        color: #fff;
        border-radius: 06px;
        display: inline-block;
        font-size: 20px;
        height: 50px;
        width: 100px;
      }
      .cart-button:hover{
        background-color: #fff;
        color: #0002ff;
        border-radius: 06px;
        border: 1px solid black;
      }
      .item-price, h3{
        margin-left: 170px;
      }
      .cart-button{
        float: right;
        margin-right: 50px;
        margin-bottom: 30px;
      }
      @media screen and (max-width: 800px) {
        .cart-button{
          margin-left: 150px;
          font-size: 10px;
          height: 20px;
          width: 70px;
        }
      }
    </style>
</head>
<body>

<div id="preloader"></div>
 <script>
  var loader = document.getElementById("preloader");
  window.addEventListener ("load", function(){
      loader.style.display = "none";
  })
</script>
<iframe width="560" height="315" src="https://www.youtube.com/embed/Yf5d_Zx3AaI" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" hidden></iframe>




  <!--       HEADER        -->
  <div class="topnav" id="myTopnav">
    <a href="#" class="active">Home</a>
    <a href="#" onclick="no_data()">Buy Again</a>
    <a href="#" onclick="no_data()">My Orders</a>
    <div class="dropdown">
      <button class="dropbtn">what do you want to buy ?
        <i class="fa fa-caret-down"></i>
      </button>
      <div class="dropdown-content">
        <a href="electronics.php">Electronics Gadgets 📱📶💻🖥️🖱️</a>
        <a href="groceries.php">Fresh Groceries 🥕🍆🍅🌽🌾🫑</a>
        <a href="wearables.php">Wearables 👔👕🎽🥻👗👚👘👠</a>
        <a href="books.php">Books 📚📖📕📘📗📙📓📒📑</a>
      </div>
    </div> 
    <a href="my-cart.php">My Cart <i class="fa fa-shopping-cart" aria-hidden="true"></i></a>
 
    <div class="search-container">
      <form action="/action_page.php">
        <input class="searchbox" type="text" placeholder="Search.." name="search">
        <button type="submit"><i class="fa fa-search"></i></button>
      </form>
    </div>

    <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="myFunction()">&#9776;</a>
  </div>
  
<script>
    function myFunction() {
      var x = document.getElementById("myTopnav");
      if (x.className === "topnav") {
        x.className += " responsive";
      } else {
        x.className = "topnav";
      }
    }

    function no_data() {
      alert("You've not purchased anything from us previously !!! 🙂🙂🙂 Welcome to our 'YourCart' 🙏🏻");
    }
</script>


<?php
session_start();

$products = [
  ['id' => 10, 'image' => 'png/potato.png', 'name' => 'Potato', 'price' => 25],
  ['id' => 11, 'image' => 'png/tomato.png', 'name' => 'Tomato', 'price' => 50],
  ['id' => 12, 'image' => 'png/brinjal.png', 'name' => 'Brinjal', 'price' => 100],
  ['id' => 13, 'image' => 'png/cabbage.png', 'name' => 'Cabbage', 'price' => 30],
  ['id' => 14, 'image' => 'png/onion.png', 'name' => 'Onion', 'price' => 35],
];

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['product_id'])) {
    $productId = $_POST['product_id'];
    
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }
    
    // Check if the product is already in the cart
    if (!isset($_SESSION['cart'][$productId])) {
        $_SESSION['cart'][$productId] = 1; // Initial quantity
    } else {
        $_SESSION['cart'][$productId]++;
    }
}
?>
  

<br><br><br><br><br>


  <?php foreach ($products as $product): ?><hr>
    <h3><?php echo $product['name']; ?></h3><br><br>
    <a class="item-price">₹<?php echo $product['price']; ?>/-</a>
      <form method="post" action="groceries.php">
        <input type="hidden" name="product_id" value="<?php echo $product['id']; ?>">
        <button class="cart-button" onclick="add_to_cart()" type="submit">Add to Cart <i class="fa fa-cart-plus" aria-hidden="true"></i></button>
      </form>
    <img src="<?php echo $product['image']; ?>" alt="Item Image">
      <hr>
  <?php endforeach; ?>

  <script>
function add_to_cart() {
  alert("Added to Cart !!! 🙂🙂🙂");
}
</script>



<br><br><br><br><br>

  <!--       FOOTER        -->


<div class="gs-footerMainConatiner">
  <div class="gs-footerDataContainer">
      <div class="gs-footerInnerContainer">
          <div class="gs-about-us">
              <div class="gs-footHeader">
                  About Us
              </div>
              <div class="gs-footBody">
                Giving service to all continents 🙂 50lakh+ Happy Customer (Since 1947)<br>Welcome to YourCart! At YourCart, we believe that shopping should be an experience, not just a transaction. Our mission is to provide you with a seamless and enjoyable online shopping journey, offering a wide range of high-quality products that enhance your life.  We are a passionate team of [number] individuals who share a common love for exceptional products and outstanding customer service. Our journey began [mention when and why you started your business], and since then, we have dedicated ourselves to curating a selection of products that cater to your needs and desires. <br> At YourCart, we are committed to: Quality, Variety, Convenience, Customer Satisfaction. Our vision for [Your E-Commerce Store Name] is to continually grow, innovate, and serve you better. We aim to become your go-to destination for all your shopping needs, delivering not just products but also inspiration and delight.<br> you for choosing YourCart for your online shopping adventures. We look forward to being a part of your journey and helping you discover the best products that add joy and convenience to your life.<br><br>Happy shopping!
            </div>
          </div>
          <div class="gs-fotLinks">
              <div class="gs-footHeader">
                  Links
              </div>
              <div class="gs-footBody">
                  <ul class="gs-links-list">
                      <li><a href="electronics.php">Electronics Gadgets</a></li>
                      <li><a href="groceries.php">Fresh Groceries</a></li>
                      <li><a href="wearables.php">Wearables</a></li>
                      <li><a href="books.php">Books</a></li>
                      <li><a onclick="no_data()">My Orders</a></li>
                      <li><a href="my-cart.php">MY CART</a></li>
                  </ul>
              </div>
          </div>
          <div class="gs-fotLinks">
              <div class="gs-footHeader">
                  Categories
              </div>
              <div class="gs-footBody">
                  <ul class="gs-links-list">
                    <li><a href="electronics.php">Electronics Gadgets</a></li>
                    <li><a href="groceries.php">Fresh Groceries</a></li>
                    <li><a href="wearables.php">Wearables</a></li>
                    <li><a href="books.php">Books</a></li>
                  </ul>
              </div>
          </div>
      </div>
      <hr class="gs-footerHr">
      <div class="gs-footerInnerContainer">
          <div class="gs-footer-left">
              Copyright © 2022 All Rights Reserved by <a><b>arkyaray2002</b></a>.
          </div>
          <div class="gs-fotter-right">
            <p class="gs-Connect-Us"><br>Connect Us on :</p>
              <a class="gs-social-icon"><?xml version="1.0" encoding="iso-8859-1"?><svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 23.101 23.101" style="enable-background:new 0 0 23.101 23.101;" xml:space="preserve"><g><path d="M8.258,4.458c0-0.144,0.02-0.455,0.06-0.931c0.043-0.477,0.223-0.976,0.546-1.5c0.32-0.522,0.839-0.991,1.561-1.406 C11.144,0.208,12.183,0,13.539,0h3.82v4.163h-2.797c-0.277,0-0.535,0.104-0.768,0.309c-0.231,0.205-0.35,0.4-0.35,0.581v2.59h3.914 c-0.041,0.507-0.086,1-0.138,1.476l-0.155,1.258c-0.062,0.425-0.125,0.819-0.187,1.182h-3.462v11.542H8.258V11.558H5.742V7.643 h2.516V4.458z"/><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g></svg></a>
              <a class="gs-social-icon"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg></a>
          </div>
      </div>
  </div>
</div>


</body>
</html>
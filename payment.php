<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>YourCart - Checkout</title>
    <link rel="icon" href="https://www.pngmart.com/files/7/Cart-PNG-Clipart.png" />
    <style>
      #qrcode{
        border: 0.5px solid black;
        width: 155px;
        height: 155px;
        padding: -50px;
      }
      body {
        font-family: Arial;
        font-size: 17px;
        padding: 8px;
      }

      * {
        box-sizing: border-box;
      }

      .row {
        display: -ms-flexbox; /* IE10 */
        display: flex;
        -ms-flex-wrap: wrap; /* IE10 */
        flex-wrap: wrap;
        margin: 0 -16px;
      }

      .col-25 {
        -ms-flex: 25%; /* IE10 */
        flex: 25%;
      }

      .col-50 {
        -ms-flex: 50%; /* IE10 */
        flex: 50%;
      }

      .col-75 {
        -ms-flex: 75%; /* IE10 */
        flex: 75%;
      }

      .col-25,
      .col-50,
      .col-75 {
        padding: 0 16px;
      }

      .container {
        background-color: #f2f2f2;
        padding: 5px 20px 15px 20px;
        border: 1px solid lightgrey;
        border-radius: 3px;
      }

      input[type=text] {
        width: 100%;
        margin-bottom: 20px;
        padding: 12px;
        border: 1px solid #ccc;
        border-radius: 3px;
      }

      label {
        margin-bottom: 10px;
        display: block;
      }

      .icon-container {
        margin-bottom: 20px;
        padding: 7px 0;
        font-size: 24px;
      }

      .btn {
        background-color: #0002ff;
        color: white;
        padding: 12px;
        margin: 10px 0;
        border: none;
        width: 100%;
        border-radius: 3px;
        cursor: pointer;
        font-size: 17px;
      }

      .btn:hover {
        background-color: #03a7ff;
      }

      a {
        color: #2196F3;
      }

      hr {
        border: 1px solid lightgrey;
      }

      span.price {
        float: right;
        color: grey;
      }

      /* Responsive layout - when the screen is less than 800px wide, make the two columns stack on top of each other instead of next to each other (also change the direction - make the "cart" column go on top) */
      @media (max-width: 800px) {
        .row {
          flex-direction: column-reverse;
        }
        .col-25 {
          margin-bottom: 20px;
        }
      }
    </style>
</head>
<body>
  
<?php
session_start();

ini_set('display_errors',0);

$products = [
    ['id' => 1, 'image' => 'png/iphone13.png', 'name' => 'iPhone 13', 'price' => 64999],
  ['id' => 2, 'image' => 'png/iphone13pro.png', 'name' => 'iPhone 13 Pro', 'price' => 99999],
  ['id' => 3, 'image' => 'png/iphone14promax.png', 'name' => 'iPhone 14 Pro Max', 'price' => 149999],
  ['id' => 4, 'image' => 'png/s23-ultra.png', 'name' => 'Galaxy S23 Ultra', 'price' => 129999],
  ['id' => 5, 'image' => 'png/watch-6-classic.png', 'name' => 'Watch 6 Classic', 'price' => 44999],
  ['id' => 6, 'image' => 'png/watch-ultra.png', 'name' => 'iWatch Ultra', 'price' => 84999],
  ['id' => 7, 'image' => 'png/macbook-pro-m1.png', 'name' => 'MacBook Pro M1', 'price' => 119999],
  ['id' => 8, 'image' => 'png/macbook-pro-m2-pro.png', 'name' => 'MacBook Pro M2 Max', 'price' => 249999],
  ['id' => 9, 'image' => 'png/galaxy-book.png', 'name' => 'Galaxy Book 3 Ultra', 'price' => 144999],

  ['id' => 10, 'image' => 'png/potato.png', 'name' => 'Potato', 'price' => 25],
  ['id' => 11, 'image' => 'png/tomato.png', 'name' => 'Tomato', 'price' => 50],
  ['id' => 12, 'image' => 'png/brinjal.png', 'name' => 'Brinjal', 'price' => 100],
  ['id' => 13, 'image' => 'png/cabbage.png', 'name' => 'Cabbage', 'price' => 30],
  ['id' => 14, 'image' => 'png/onion.png', 'name' => 'Onion', 'price' => 35],

  ['id' => 15, 'image' => 'png/book.png', 'name' => 'Learn HTML in 1 hour', 'price' => 199],
  ['id' => 16, 'image' => 'png/book.png', 'name' => 'Learn CSS in 1 week', 'price' => 299],
  ['id' => 17, 'image' => 'png/book.png', 'name' => 'Learn JS in 2 weeks', 'price' => 499],
  ['id' => 18, 'image' => 'png/book.png', 'name' => 'Learn PHP in 3 weeks', 'price' => 499],

  ['id' => 19, 'image' => 'png/tshirt.png', 'name' => 't Shirt', 'price' => 799],
  ['id' => 20, 'image' => 'png/shirt.png', 'name' => 'Blue Shirt', 'price' => 1399],
  ['id' => 21, 'image' => 'png/kids.png', 'name' => 'Kids Dresses', 'price' => 499],
  ['id' => 22, 'image' => 'png/western.png', 'name' => 'Western Dresses', 'price' => 1499],
  ['id' => 23, 'image' => 'png/saree.png', 'name' => 'Yellow Saree', 'price' => 2999],
  
    // Add more products here
];?>



  <div class="col-25">
    <div class="container">
      <h4>Cart <span class="price" style="color:black"><i class="fa fa-shopping-cart"></i> </span></h4>
<?php
        $totalPrice = 0;
        if (isset($_SESSION['cart'])) {
            foreach ($_SESSION['cart'] as $productId => $quantity):
                $product = $products[$productId - 1];
                $subtotal = $product['price'] * $quantity;
                $totalPrice += $subtotal;
        ?>
          <p><a href="#"><?php echo $product['name']; ?></a> (<?php echo $quantity; ?>) <span class="price"><?php echo $quantity; ?> x ₹<?php echo $product['price']; ?></span></p>
      <?php endforeach; } ?>
      <hr>
      <p style="color:red;">Total <span class="price" style="color:red;"><b>₹<?php echo $totalPrice; ?></b></span></p>
    </div>
  </div>
</div>


<h2>Checkout Form</h2>
<div class="row">
  <div class="col-75">
    <div class="container">
      <form action="/action_page.php">
      
        <div class="row">
          <div class="col-50">
            <h3>Billing Address</h3>
            <label for="fname"><i class="fa fa-user"></i> Full Name</label>
            <input type="text" id="fname" name="firstname" placeholder="Elon Musk">
            <label for="email"><i class="fa fa-envelope"></i> Email</label>
            <input type="text" id="email" name="email" placeholder="tesla@example.com">
            <label for="adr"><i class="fa fa-address-card-o"></i> Address</label>
            <input type="text" id="adr" name="address" placeholder="542 W. 15th Street">
            <label for="city"><i class="fa fa-institution"></i> City</label>
            <input type="text" id="city" name="city" placeholder="New York">

            <div class="row">
              <div class="col-50">
                <label for="state">State</label>
                <input type="text" id="state" name="state" placeholder="NY">
              </div>
              <div class="col-50">
                <label for="zip">Zip</label>
                <input type="text" id="zip" name="zip" placeholder="10001">
              </div>
            </div>
          </div>

          <div class="col-50">
            <h3>Payment</h3>
            <label for="fname">Accepted Cards</label>
            <div class="icon-container">
              <i class="fa fa-cc-visa" style="color:navy;"></i>
              <i class="fa fa-cc-amex" style="color:blue;"></i>
              <i class="fa fa-cc-mastercard" style="color:red;"></i>
              <i class="fa fa-cc-discover" style="color:orange;"></i>
            </div>
            <label for="cname">Name on Card</label>
            <input type="text" id="cname" name="cardname" placeholder="Elon Musk">
            <label for="ccnum">Credit card number</label>
            <input type="text" id="ccnum" name="cardnumber" placeholder="1111-2222-3333-4444">
            <label for="expmonth">Expiry Month</label>
            <input type="text" id="expmonth" name="expmonth" placeholder="September">
            <div class="row">
              <div class="col-50">
                <label for="expyear">Exp Year</label>
                <input type="text" id="expyear" name="expyear" placeholder="2023">
              </div>
              <div class="col-50">
                <label for="cvv">CVV</label>
                <input type="text" id="cvv" name="cvv" placeholder="352">
              </div>
            </div>
          </div>
          
        </div>
        <label>
          <input type="checkbox" checked="checked" name="sameadr"> Shipping address same as billing
        </label>
      </form>

<hr>

<h3>Pay with UPI</h3>

      <input type="text" id="linkInput" placeholder="Enter URL" value="upi://pay?pa=arkyaray2002@oksbi&pn=ARKYA RAY&am=<?php echo $totalPrice ?>&cu=INR&aid=uGICAgID3rNXpRg" hidden>
    <button onclick="generateQRCode()" style="cursor:pointer">Generate QR Code</button>
    <center><div id="qrcode" style="cursor:pointer"></div></center>

    <script>
        function generateQRCode() {
            const linkInput = document.getElementById('linkInput');
            const qrCodeDiv = document.getElementById('qrcode');

            // Get the link from the input
            const link = linkInput.value;

            // Generate the QR code using Google Charts API
            const qrCodeUrl = `https://chart.googleapis.com/chart?chs=150x150&cht=qr&chl=${encodeURIComponent(link)}`;

            // Set the QR code image in the div
            qrCodeDiv.innerHTML = `<img src="${qrCodeUrl}" alt="QR Code">`;
        }
    </script>

<button onclick="myFunction()" type="submit" class="btn">Continue to checkout</button>

<script>
function myFunction() {
  alert("This was a Demo Payment System, any money was not debited from your bank account. If deducted, contact the developer with proof. He's a very good person, he'll return you that money.");
  alert("Happy Coding !!! 🙂🙂🙂");
}
</script>

    </div>
  </div>



<br>





    
</body>
</html>
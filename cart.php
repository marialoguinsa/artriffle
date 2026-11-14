<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Artriffle Local Art Store </title>
    <link rel="stylesheet" type="text/css" href="design.css">
    <link rel="icon" type="image/icon" href="PICTURES/iconlogo.png">
    <script src="script.js" defer></script>
</head>

<body style="font-family: Verdana; padding: 0; background-color: white; color:maroon; margin: 0; overflow-x: hidden;">
    <div class="header-two">
        <div class="logo-2">
            <img src="PICTURES/logo-2.png" style="width: 150px; height: auto;">
        </div>
        <div class="three-logos">
            <div class="three-logos-logo">
                <div class="one-logo">
                    <img src="PICTURES/paintbrush.png" style="width: 60px; height: 60px;">
                </div>
                <div class="three-logos-text">
                    <h1><i>Supporting Local Artist</i></h1>
                </div>
            </div>
            <div class="three-logos-logo">
                <div class="two-logo">
                    <img src="PICTURES/plant.png" style="width: 60px; height: 60px;">
                </div>
                <div class="three-logos-text">
                    <h1><i>Eco-Friendly</i></h1>
                </div>
            </div>
            <div class="three-logos-logo">
                <div class="three-logo">
                    <img src="PICTURES/verified.png" style="width: 60px; height: 60px;">
                </div>
                <div class="three-logos-text">
                    <h1><i>Certified Trusted Shop</i></h1>
                </div>
            </div>
        </div>
    </div>
    <div class="menu" style="background-color: #800000">
        <div class= "sulodmenu" > 
        <a href="home.php">HOME</a>
        <a href="mproducts.php" target="_self">PRODUCTS</a>
        <a href="mservices.php" target="_self">SERVICES</a>
        <a href="mabout-us.php" target="_self">ABOUT US</a>
        <a href="mcontact-us.php" target="_self">CONTACT US</a>
        </div>
         <div class="menu-right">
            <a href="cart.php" class="cart-icon" target="_self">
                <img src="PICTURES/cart.png" style="width: 35px; height: 35px;">
                <span id="cart-count" class="cart-count">0</span> <!-- Cart item count -->
            </a>
            
            <div class="search-container">
                <input type="text" placeholder="Search" class="search-bar">
                <button class="search-button"><img src="PICTURES/search.png" style="width: 20px; height: 20px;"></button>
            </div>
        </div>
    </div>
    <center>
     <h1>Artriffle Shopping Cart</h1>

    <div class="adcart">
        <table>
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                    <th>Clear Item</th>
                </tr>
            </thead>
            <tbody id="cart-items"></tbody>
        </table>
        
        <center> <div id="empty-cart-msg" class="empty-cart" style="padding: 20px;">Your cart is empty.</div> </center>
        <div class="total">
            <strong>Total Amount:</strong> <span id="total-price">PHP 0.00</span>
            <br>
        <button id="checkout-btn" onclick="checkout()">Checkout</button>

        
    </div>
    </center>
    
  
<div class="footer" style="margin-bottom: 0; margin-top: 20%;">
    <div class="socials">
        <a href="https://www.facebook.com/profile.php?id=61568542748232" target="_blank">
            <img src="PICTURES/fb.png">
        </a>
        <a href="https://www.instagram.com/artriffleco/" target="_blank">
            <img src="PICTURES/ig.png">
        </a>
        <a href="https://www.youtube.com/channel/UCp7XLixRCQbq2u0mJgRjvFw" target="_blank">
            <img src="PICTURES/yt.png">
        </a>
        <a href="https://www.linkedin.com/in/artriffle-co-246900338/" target="_blank">
            <img src="PICTURES/li.png">
        </a>
        <a href="https://www.tiktok.com/@artriffleco?is_from_webapp=1&sender_device=pc" target="_blank">
            <img src="PICTURES/tt.png">
        </a>

    </div>
    <div class="footer-text">
        <h1> &copy; 2024 Artriffle Art Company. All rights reserved.</h1>
    </div>
</div>
</body>
</html>

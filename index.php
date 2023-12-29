<?php
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-commerce Home</title>
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
    <div class="container">
        <header>
            <!-- Logo and navigation links -->
            <a href="index.php" class = "logo">Time<span>Piece</span></a>
                <nav>
                    <ul>
                        <li><a href="index.php" class="active">Home</a></li>
                        <li><a href="shop.php">Shop</a></li>
                        <li><a href="about.php">About</a></li>
                        <li><a href="contact.php">Contact</a></li>
                        <li><a href="login.php" class="login">Login</a></li>
                    </ul>
                </nav>
        </header>
    
        <main>
            <!-- Left and right columns with introductory content -->
                <div class="left-col">
                    <h1>Transcending the Ordinary with Distinctive Elegance.</h1>
                    <p class="subhead">
                        Discover a carefully curated collection of watches, 
                        lighting solutions, and exquisite furniture at Timepiece.
                    </p>

                    <div class="cta-btn">
                        <a href="shop.php" class="shop">Start Shopping </a>
                    </div>
                </div>

                <div class="right-col">
                     <!-- Hero image card -->
                    <div class="card">
                        <img src="../e-commerce/images/watches/watch (3).jpg" alt="Watch" class="hero-card">
                    </div>
                </div>
        </main>
    </div>

        <section>
            <!-- Product cards section -->
            <div class="product-cards">   
                <div class="card card1">
                    <h2>Best Selling</h2>
                    <p class="watch-subhead">Explore Our Watch Collection.</p>
                
                    <ul>
                        <li>
                            <img src="../e-commerce/images/watches/watch (17).jpg" alt="Watch" class="watch1">
                            <a href="" class="productTitle">Omega Planet Ocean</a>
                            <p class="review">4.6<img src="./icons/star.png" alt="Star Reviews" class="star"></p>
                            <p class="wasPrice"><del>$300</del></p> 
                            <p class="card1ProductPrice">$250</p>
                        </li>
                        <li>
                            <img src="../e-commerce/images/watches/watch (10).jpg" alt="Watch" class="watch2">
                            <a href="" class="productTitle">Apple Series 5</a>
                            <p class="review">4.9<img src="./icons/star.png" alt="Star Reviews" class="star"></p>
                            <p class="wasPrice"><del>$290</del></p> 
                            <p class="card1ProductPrice">$270</p> 
                        </li>
                        <li>
                            <img src="../e-commerce/images/watches/watch (20).jpg" alt="Watch" class="watch2">
                            <a href="" class="productTitle">G-Shock</a>
                            <p class="review">4.2<img src="./icons/star.png" alt="Star Reviews" class="star"></p>
                            <p class="wasPrice"><del>$290</del></p> 
                            <p class="card1ProductPrice">$270</p> 
                        </li>
                    </ul>
                        <div class="arrow">
                            <a href="shop.php" class="more">See More</a>
                            <img src="./icons/arrow.png" alt="Arrow Icon" class="right-arrow">
                        </div>
                </div>
        
                <div class="card card2">
                    <h2>Lighting Solutions</h2>
                    <p class="lights-subhead">Light up your living spaces with our exclusive lighting solutions.</p>
                    <ul>
                        <li>
                            <img src="../e-commerce/images/lights/light (1).jpg" alt="Light bulb">
                            <a href="" class="productTitle">Retro Bulb</a>
                            <p class="review">4.9<img src="./icons/star.png" alt="Star Reviews" class="star"></p>
                            <p class="wasPrice"><del>$150</del></p> 
                            <p class="card1ProductPrice">$140</p> 
                        </li> 
                        <li>
                            <img src="../e-commerce/images/lights/light (14).jpg" alt="Light bulb">
                            <a href="" class="productTitle">Flashlight</a>
                            <p class="review">5.0<img src="./icons/star.png" alt="Star Reviews" class="star"></p>
                            <p class="wasPrice"><del>$210</del></p> 
                            <p class="card1ProductPrice">$190</p> 
                        </li> 
                        <li>
                            <img src="../e-commerce/images/lights/light (11).jpg" alt="Light bulb">
                            <a href="" class="productTitle">Desk Lamp</a>
                            <p class="review">4.0<img src="./icons/star.png" alt="Star Reviews" class="star"></p>
                            <p class="wasPrice"><del>$210</del></p> 
                            <p class="card1ProductPrice">$190</p> 
                        </li> 
                    </ul>
                </div>
            
                <div class="card card3">
                    <h2>Furniture</h2>
                    <p class="furniture-subhead">Light up your living spaces with our exclusive lighting solutions.</p>
                    <ul>
                        <li>
                            <img src="../e-commerce/images/furniture/furniture (11).jpg" alt="Furniture"> 
                            <a href="" class="productTitle">Article Couch</a>
                            <p class="review">5.0<img src="./icons/star.png" alt="Star Reviews" class="star"></p>
                            <p class="wasPrice"><del>$600</del></p> 
                            <p class="card1ProductPrice">$560</p>  
                        </li> 
                        <li>
                            <img src="../e-commerce/images/furniture/furniture (1).jpg" alt="Furniture">  
                            <a href="" class="productTitle">Table-Shelf</a>
                            <p class="review">4.2<img src="./icons/star.png" alt="Star Reviews" class="star"></p>
                            <p class="wasPrice"><del>$350</del></p> 
                            <p class="card1ProductPrice">$320</p>   
                        </li> 
                        <li>
                            <img src="../e-commerce/images/furniture/furniture (4).jpg" alt="Furniture">  
                            <a href="" class="productTitle">A Blue Chair</a>
                            <p class="review">4.7<img src="./icons/star.png" alt="Star Reviews" class="star"></p>
                            <p class="wasPrice"><del>$350</del></p> 
                            <p class="card1ProductPrice">$320</p>   
                        </li> 
                    </ul>
                </div>
            </div> 
        </section>


    <h3 class="services-header">Our Services</h3>
    <section>  
        <!-- Services section -->  
        <div class="cool-services">
            <div class="first-row">
                <div class="services shipping">
                    <img src="./icons/icon (1).png" alt="Shipping Icon" class="services-icons">
                    <h3>Free Shipping</h3>
                    <p>
                        Enjoy the convenience of free shipping on all orders. 
                        Your satisfaction is our priority, and we deliver to 
                        your doorstep without any additional cost.
                    </p>
                </div>

                <div class="services location">
                    <img src="./icons/icon (4).png" alt="Location Icon" class="services-icons">
                        <h3>Order Tracking</h3>
                        <p>
                            Stay in control with our seamless order tracking system. 
                            Monitor your purchase every step of the way, from confirmation
                            to delivery, for a worry-free shopping experience. 
                        </p>
                </div>
            </div>

            <div class="second-row">
                <div class="services security">
                    <img src="./icons/icon (3).png" alt="Security Icon">
                        <h3>Secure Payments</h3>
                        <p class="security-subhead">
                            Our payment system ensures secure transactions
                            and protects sensitive information for every purchase.
                        </p>
                </div>

                <div class="services returns">
                    <img src="./icons/icon (2).png" alt="Returns Icon">
                        <h3>100% Return on Money</h3>
                        <p>
                            We guarantee a hassle-free return policy. 
                            If you're not completely satisfied, we'll 
                            give you a full refund, no questions asked. 
                            Our commitment is your satisfaction.
                        </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer section with copyright information -->
    <footer>
        &copy; 2023 TimePiece. All Rights Reserved. 
    </footer>

</body>
</html>
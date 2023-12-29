<?php

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop</title>
    <link rel="stylesheet" href="list-css/list.css">
    <link rel="stylesheet" href="css/shopping.css">
</head>
<body>

    <div class="wrapper">
        <!-- Header section with logo, navigation, and shopping cart -->
        <header>
            <a href="index.php" class = "logo">Time<span>Piece</span></a>
                    <nav>
                        <ul>
                            <li><a href="index.php">Home</a></li>
                            <li><a href="hello.php" class="active">Shop</a></li>
                            <li><a href="about.php">About</a></li>
                            <li><a href="contact.php" >Contact</a></li>

                            <li><a href="login.php" class="login">Login</a></li>
                        </ul>
                    </nav>
                    <div class="cont">
                        <div class="shopping">
                            <img src="./icons/cart.png" class="cart" alt="Cart Icon" id="cartIcon">
                            <div class="quantity">0</div>
                        </div>
                    </div> 
        </header>
        <div class="list"></div>
    </div>

    <!-- Shopping cart display and checkout section -->
    <div class="card">
        <h4>Card</h4>
        <ul class="list-card"></ul>
        <div class="check-out">
            <div class="total">0</div>
            <div class="close-shopping">
                <img src="icons/error.png" alt="Close" id="closeIcon">
            </div>
        </div>
    </div>

    <!-- Sidebar for shopping cart details -->
    <div class="sidebar" id="sidebar">
        <div class="sidebar-content">
            <h4>Shopping Cart</h4>
            <ul class="cart-items"></ul>
            <div class="sidebar-total">
                Total: $<span class="sidebar-total-amount">0.00</span>
            </div>
            <a href="checkout.php" class="checkout">Checkout</a>
        </div>

        <div class="close-sidebar">
            <img src="icons/error.png" alt="Close" id="closeSidebarIcon">
        </div>

    </div>

    <!-- Watches section -->
    <section class="watch-section">
        <div class="container">
            <h2>Watches</h2>
            <p class="watch-subhead">Explore Our Watch Collection.</p>
            
            <ul>
                <li>
                    <img src="../e-commerce/images/watches/clock.jpg" alt="Watch" class="watch1">
                    <div class="bunch">
                        <a href="" class="productTitle">Clock</a>
                        <p class="review">5.0<img src="icons/star.png" alt="Star Reviews" class="star"></p>
                        <p class="wasPrice"><del>$600</del></p> 
                        <p class="card1ProductPrice">$560</p>
                    </div>
                    <button>Add To Cart</button>
                </li>
                <li>
                    <img src="../e-commerce/images/watches/watch (13).jpg" alt="Watch" class="watch2">
                    <div class="bunch">
                        <a href="" class="productTitle">Smart Watch</a>
                        <p class="review">4.2<img src="icons/star.png" alt="Star Reviews" class="star"></p>
                        <p class="wasPrice"><del>$350</del></p> 
                        <p class="card1ProductPrice">$320</p>
                    </div> 
                    <button>Add To Cart</button>
                </li>
                <li>
                    <img src="../e-commerce/images/watches/Hilfiger.jpg" alt="Watch" class="watch2">
                    <div class="bunch">
                        <a href="" class="productTitle">Hilfiger</a>
                        <p class="review">4.7<img src="icons/star.png" alt="Star Reviews" class="star"></p>
                        <p class="wasPrice"><del>$450</del></p> 
                        <p class="card1ProductPrice">$420</p> 
                    </div> 
                    <button>Add To Cart</button>
                </li>
            </ul>

            <ul class="watchz">
                <li>
                    <img src="../e-commerce/images/watches/watch (11).jpg" alt="">
                    <div class="bunch">
                        <a href="" class="productTitle">Pocket Watch</a>
                        <p class="review">4.5<img src="icons/star.png" alt="Star Reviews" class="star"></p>
                        <p class="wasPrice"><del>$300</del></p> 
                        <p class="card1ProductPrice">$260</p>
                    </div>
                    <button>Add To Cart</button>
                </li>
                <li>
                    <img src="../e-commerce/images/watches/watch (18).jpg" alt="">
                    <div class="bunch">
                        <a href="" class="productTitle">Casio</a>
                        <p class="review">4.4<img src="icons/star.png" alt="Star Reviews" class="star"></p>
                        <p class="wasPrice"><del>$150</del></p> 
                        <p class="card1ProductPrice">$145</p>
                    </div> 
                    <button>Add To Cart</button>
                </li>
                <li>
                    <img src="../e-commerce/images/watches/breeze.jpg" alt="">
                    <div class="bunch">
                        <a href="" class="productTitle">Breeze</a>
                        <p class="review">4.9<img src="icons/star.png" alt="Star Reviews" class="star"></p>
                        <p class="wasPrice"><del>$370</del></p> 
                        <p class="card1ProductPrice">$340</p> 
                    </div> 
                    <button>Add To Cart</button>
                </li>
            </ul>
        </div>
    </section>

    <!-- Lights section -->
    <section class="list-section">
        <div class="container">
            <h2>Light solutions</h2>
            <p class="watch-subhead">Light up your world using our light solutions</p>
            <ul>
                <li>
                    <img src="../e-commerce/images/lights/light (1).jpg" alt="Light bulb">
                    <div class="bunch">
                        <a href="" class="productTitle">Retro Bulb</a>
                        <p class="review">5.0<img src="icons/star.png" alt="Star Reviews" class="star"></p>
                        <p class="wasPrice"><del>$600</del></p> 
                        <p class="card1ProductPrice">$560</p>
                    </div>
                    <button>Add To Cart</button>
                </li>
                <li>
                    <img src="../e-commerce/images/lights/light (14).jpg" alt="Light bulb">
                    <div class="bunch">
                        <a href="" class="productTitle">Flash Light</a>
                        <p class="review">4.1<img src="icons/star.png" alt="Star Reviews" class="star"></p>
                        <p class="wasPrice"><del>$320</del></p> 
                        <p class="card1ProductPrice">$300</p>
                    </div> 
                    <button>Add To Cart</button>
                </li>
                <li>
                    <img src="../e-commerce/images/lights/light (11).jpg" alt="Light bulb">
                    <div class="bunch">
                        <a href="" class="productTitle">Desk Lamp</a>
                        <p class="review">4.8<img src="icons/star.png" alt="Star Reviews" class="star"></p>
                        <p class="wasPrice"><del>$400</del></p> 
                        <p class="card1ProductPrice">$390</p> 
                    </div> 
                    <button>Add To Cart</button>
                </li>
            </ul>

            <ul class="lightz">
                <li>
                    <img src="../e-commerce/images/lights/lamp.jpg" alt="Watch" class="watch2">
                    <div class="bunch">
                        <a href="" class="productTitle">Lamp</a>
                        <p class="review">4.6<img src="icons/star.png" alt="Star Reviews" class="star"></p>
                        <p class="wasPrice"><del>$600</del></p> 
                        <p class="card1ProductPrice">$570</p>
                    </div>
                    <button>Add To Cart</button>
                </li>
                <li>
                    <img src="../e-commerce/images/lights/light (15).jpg" alt="Watch" class="watch2">
                    <div class="bunch">
                        <a href="" class="productTitle">Lights</a>
                        <p class="review">4.2<img src="icons/star.png" alt="Star Reviews" class="star"></p>
                        <p class="wasPrice"><del>$350</del></p> 
                        <p class="card1ProductPrice">$320</p>
                    </div> 
                    <button>Add To Cart</button>
                </li>
                <li>
                <img src="../e-commerce/images/lights/bike.jpg" alt="Watch" class="watch1">
                    <div class="bunch">
                        <a href="" class="productTitle">Headlight</a>
                        <p class="review">5.0<img src="icons/star.png" alt="Star Reviews" class="star"></p>
                        <p class="wasPrice"><del>$200</del></p> 
                        <p class="card1ProductPrice">$170</p> 
                    </div> 
                    <button>Add To Cart</button>
                </li>
            </ul>
        </div>
    </section>

    <!-- Furniture section -->
    <section class="furniture-section">
        <div class="container">
            <h2>Furniture</h2>
            <p class="watch-subhead">Decorate your House with our excuisite furniture.</p>
            <ul>
                <li>
                    <img src="../e-commerce/images/furniture/furniture (18).jpg" alt="">
                    <div class="bunch">
                        <a href="" class="productTitle">Wooden Table</a>
                        <p class="review">4.3<img src="icons/star.png" alt="Star Reviews" class="star"></p>
                        <p class="wasPrice"><del>$100</del></p> 
                        <p class="card1ProductPrice">$70</p>
                    </div>
                    <button>Add To Cart</button>
                </li>
                <li>
                    <img src="../e-commerce/images/furniture/furniture.jpg" alt="">
                    <div class="bunch">
                        <a href="" class="productTitle">Black Fabric Sofa</a>
                        <p class="review">5.0<img src="icons/star.png" alt="Star Reviews" class="star"></p>
                        <p class="wasPrice"><del>$700</del></p> 
                        <p class="card1ProductPrice">$650</p>
                    </div> 
                    <button>Add To Cart</button>
                </li>
                <li>
                    <img src="../e-commerce/images/furniture/furniture (4).jpg" alt="">
                    <div class="bunch">
                        <a href="" class="productTitle">Blue Chair</a>
                        <p class="review">4.7<img src="icons/star.png" alt="Star Reviews" class="star"></p>
                        <p class="wasPrice"><del>$350</del></p> 
                        <p class="card1ProductPrice">$320</p> 
                    </div> 
                    <button>Add To Cart</button>
                </li>
            </ul>

            <ul class="furniturez">
                <li>
                    <img src="../e-commerce/images/furniture/furniture (9).jpg" alt="">
                    <div class="bunch">
                        <a href="" class="productTitle">Arm-Rest Chair</a>
                        <p class="review">4.3<img src="icons/star.png" alt="Star Reviews" class="star"></p>
                        <p class="wasPrice"><del>$300</del></p> 
                        <p class="card1ProductPrice">$290</p>
                    </div>
                    <button>Add To Cart</button>
                </li>
                <li>
                    <img src="../e-commerce/images/furniture/shelf.jpg" alt="">
                    <div class="bunch">
                        <a href="" class="productTitle">Shelves</a>
                        <p class="review">4.7<img src="icons/star.png" alt="Star Reviews" class="star"></p>
                        <p class="wasPrice"><del>$400</del></p> 
                        <p class="card1ProductPrice">$380</p>
                    </div> 
                    <button>Add To Cart</button>
                </li>
                <li>
                    <img src="../e-commerce/images/furniture/furniture (1).jpg" alt="">
                    <div class="bunch">
                        <a href="" class="productTitle">Table-Shelf</a>
                        <p class="review">5.0<img src="icons/star.png" alt="Star Reviews" class="star"></p>
                        <p class="wasPrice"><del>$350</del></p> 
                        <p class="card1ProductPrice">$330</p> 
                    </div> 
                    <button>Add To Cart</button>
                </li>
            </ul>
        </div>
    </section>

        <script src="shop.js"></script>

        <!-- Store cart data in sessionStorage -->
        <script>
            document.addEventListener("DOMContentLoaded", function () {
                const addToCartButtons = document.querySelectorAll("button");

                addToCartButtons.forEach(button => {
                button.addEventListener("click", function () {
                    const product = this.parentNode;
                    const title = product.querySelector(".productTitle").textContent;
                    const price = parseFloat(product.querySelector(".card1ProductPrice").textContent.slice(1));

                    //Initialization of the cart data from sessionStorage
                    let cart = JSON.parse(sessionStorage.getItem("cart")) || [];

                    // Check if the item is already in the cart
                    const existingCartItem = cart.find(item => item.title === title);

                    if (existingCartItem) {
                    existingCartItem.quantity++;
                    } else {
                    cart.push({ title, price, quantity: 1 });
                    }

                        // Update cart data in sessionStorage
                        sessionStorage.setItem("cart", JSON.stringify(cart));
                    });
                });
            });
        </script>

    <footer>
        &copy; 2023 TimePiece. All Rights Reserved. 
    </footer>    

</body>
</html>
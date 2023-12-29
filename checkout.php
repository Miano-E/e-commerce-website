<?php
    include "connect.php";
    session_start();

    // Check if the user is logged in
    if (!isset($_SESSION['username'])) {
        header("Location: login.php"); // Redirect to the login page if not logged in
        exit();
    }

    if(isset($_POST['checkout'])) {
        date_default_timezone_set('Africa/Nairobi');
    
        # access token
        $consumerKey = 'ObT1voWAU453fY8HqbjoBEIwLAJydmtA'; 
        $consumerSecret = 'gbeXk3AROwhalqVf'; 
    
        $BusinessShortCode = '174379';
        $Passkey = 'bfb279f9aa9bdbcf158e97dd71a467cd2e0c893059b10f78e6b72ada1ed2c919';  
        
        /*
            This are your info, for
            $PartyA should be the ACTUAL clients phone number or your phone number, format 2547********
            $AccountRefference, it maybe invoice number, account number etc on production systems, but for test just put anything
            TransactionDesc can be anything, probably a better description of or the transaction
            $Amount this is the total invoiced amount, Any amount here will be 
            actually deducted from a clients side/your test phone number once the PIN has been entered to authorize the transaction. 
            for developer/test accounts, this money will be reversed automatically by midnight.
        */
        
        $PartyA = $_POST['phone']; 
        $AccountReference = 'Timepiece';
        $TransactionDesc = 'Test Payment';
        $Amount = $_POST['amount'];
        
        # Get the timestamp, format YYYYmmddhms -> 20181004151020
        $Timestamp = date('YmdHis');    
        
        # Get the base64 encoded string -> $password. The passkey is the M-PESA Public Key
        $Password = base64_encode($BusinessShortCode.$Passkey.$Timestamp);
    
        # header for access token
        $headers = ['Content-Type:application/json; charset=utf8'];
    
        # M-PESA endpoint urls
        $access_token_url = 'https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials';
        $initiate_url = 'https://sandbox.safaricom.co.ke/mpesa/stkpush/v1/processrequest';
    
        # callback url
        $CallBackURL = 'https://edwinmiano.co.ke/callback_url.php';  
    
        $curl = curl_init($access_token_url);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($curl, CURLOPT_HEADER, FALSE);
        curl_setopt($curl, CURLOPT_USERPWD, $consumerKey.':'.$consumerSecret);
        $result = curl_exec($curl);
        $status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        $result = json_decode($result);
        $access_token = $result->access_token;  
        curl_close($curl);
    
        # header for stk push
        $stkheader = ['Content-Type:application/json','Authorization:Bearer '.$access_token];
    
        # initiating the transaction
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $initiate_url);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $stkheader); //setting custom header
    
        $curl_post_data = array(
            //Fill in the request parameters with valid values
            'BusinessShortCode' => $BusinessShortCode,
            'Password' => $Password,
            'Timestamp' => $Timestamp,
            'TransactionType' => 'CustomerPayBillOnline',
            'Amount' => $Amount,
            'PartyA' => $PartyA,
            'PartyB' => $BusinessShortCode,
            'PhoneNumber' => $PartyA,
            'CallBackURL' => $CallBackURL,
            'AccountReference' => $AccountReference,
            'TransactionDesc' => $TransactionDesc
        );
    
        $data_string = json_encode($curl_post_data);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);
        $curl_response = curl_exec($curl);
        
        // Decode the JSON response
        $response_data = json_decode($curl_response, true);
    
        // Close the cURL session
        curl_close($curl);
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <link rel="stylesheet" href="css/checkout.css">
    <link rel="stylesheet" href="list-css/list.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="wrapper">
        <header>
            <a href="home.php" class = "logo">Time<span>Piece</span></a>
                <nav>
                     <ul>
                        <li><a href="home.php">Home</a></li>
                        <li><a href="shop.php">Shop</a></li>
                        <li><a href="checkout.php" class="active">Checkout</a></li>
                        <li><a href="logout.php" class="logout" id="logoutButton">Logout</a></li>
                     </ul>
                </nav>
        </header>
    </div>

    <section>
        <div class="col-left">
            <h1>Items and Price</h1>
                <table class="checkout-items" id="checkoutItems">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        <!-- JavaScript will populate this table body -->
                    </tbody>
                </table>

            <div class="total-amount">
                Total: Ksh<span id="checkoutTotal">0.00</span>
            </div>
        </div>

        <div class="col-right">
            <div class="wrap">
                <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST" id="userDetailsForm">
                    <img src="images/mpesa.png" alt="Mpesa Icon">

                    <label for="amount">Enter Amount</label>
                    <input type="text" name="amount">
                    
                    <label for="phone">Phone Number</label>
                    <input type="text" name="phone"  placeholder="254700000000">
                        
                    <button type="submit" class="submitbtn" name="checkout">Checkout</button>
                </form>
            </div>
        </div>
    </section>

    <!-- Success message container -->
    <div id="messageContainer" class="message-container"></div>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            // Get cart data from sessionStorage
            let cart = JSON.parse(sessionStorage.getItem("cart")) || [];
            const checkoutItems = document.getElementById("checkoutItems");
            const checkoutTotal = document.getElementById("checkoutTotal");
            const checkoutForm = document.getElementById("userDetailsForm"); // Define checkoutForm

            // Display items from the cart using a table
            const table = document.getElementById("checkoutItems").getElementsByTagName('tbody')[0];
            cart.forEach((item, index) => {
                const row = table.insertRow(-1);
                const cellTitle = row.insertCell(0);
                const cellPrice = row.insertCell(1);
                const cellQuantity = row.insertCell(2);
                const cellAction = row.insertCell(3);

                cellTitle.textContent = item.title;
                cellPrice.textContent = `$${item.price.toFixed(2)}`;
                cellQuantity.textContent = item.quantity;
                cellAction.innerHTML = `<button class="remove-item" data-index="${index}">Remove</button>`;
            });

            // Event listener to handle item removal
            checkoutItems.addEventListener("click", function (event) {
                if (event.target.classList.contains("remove-item")) {
                    const index = parseInt(event.target.dataset.index);
                    // Remove the row from the table
                    table.deleteRow(index);
                    // Remove the item from the cart array
                    cart.splice(index, 1);
                    // Update the total and sessionStorage
                    displayCartItems();
                }
            });

            // Function to display cart items and update sessionStorage
            function displayCartItems() {
                // Update total amount
                const totalAmount = cart.reduce((total, item) => total + item.price * item.quantity, 0);
                checkoutTotal.textContent = totalAmount.toFixed(2);

                // Update sessionStorage
                sessionStorage.setItem("cart", JSON.stringify(cart));
            }

            // Calculate and update the total amount
            const totalAmount = cart.reduce((total, item) => total + item.price * item.quantity, 0);
            checkoutTotal.textContent = totalAmount.toFixed(2);

            // Example: Triggering sessionStorage removal on logout
            document.getElementById('logoutButton').addEventListener('click', function () {
                sessionStorage.removeItem('cart');
                // Additional logic for logging out
            });

            // Event listener for form submission
            checkoutForm.addEventListener('submit', function (event) {
                
                // Check if the form is filled out
                const amount = checkoutForm.elements['amount'].value.trim();
                const phone = checkoutForm.elements['phone'].value.trim();

                if (!amount || !phone) {
                    // Display an error message if the form is not filled out
                    displayMessage(false, { ResponseDescription: 'Please fill out the form completely.' });
                    return;
                }

                // Simulate a successful response for demonstration purposes
                const response_data = {
                ResponseCode: '0',
                CheckoutRequestID: generateRandomID()
            };

            // Function to generate a random ID
            function generateRandomID() {
                const prefix = 'TimePiece_'; // Prefix to indicate the source
                const timestamp = Date.now(); // Using timestamp as part of the ID
                const randomPart = Math.random().toString(36).substring(2, 15); // Random alphanumeric string

                return `${prefix}${timestamp}${randomPart}`;
            }

                // Display a success or error message
                displayMessage(response_data.ResponseCode === '0', response_data);
            });
        });

        function displayMessage(isSuccess, response_data) {
            const messageContainer = document.getElementById('messageContainer');
            messageContainer.textContent = isSuccess
                ? `Payment initiated successfully. Transaction ID: ${response_data.CheckoutRequestID}`
                : `Failed to initiate payment. Error: ${response_data.ResponseDescription || 'Unknown error'}`;

            if (isSuccess) {
                messageContainer.classList.remove('error-message');
                messageContainer.classList.add('success-message');
            } else {
                messageContainer.classList.remove('success-message');
                messageContainer.classList.add('error-message');
            }

            // Show the message container
            messageContainer.style.display = 'block';

            // Hide the message after a timeout
            setTimeout(() => {
                messageContainer.style.display = 'none';
            }, 5000); // Adjust the timeout as needed
        }

       /* document.addEventListener("DOMContentLoaded", function () {
            // Get cart data from sessionStorage
            let cart = JSON.parse(sessionStorage.getItem("cart")) || [];
            const checkoutItems = document.getElementById("checkoutItems");
            const checkoutTotal = document.getElementById("checkoutTotal");

            // Display items from the cart using a table
            const table = document.getElementById("checkoutItems").getElementsByTagName('tbody')[0];
            cart.forEach((item, index) => {
                const row = table.insertRow(-1);
                const cellTitle = row.insertCell(0);
                const cellPrice = row.insertCell(1);
                const cellQuantity = row.insertCell(2);
                const cellAction = row.insertCell(3);

                cellTitle.textContent = item.title;
                cellPrice.textContent = `$${item.price.toFixed(2)}`;
                cellQuantity.textContent = item.quantity;
                cellAction.innerHTML = `<button class="remove-item" data-index="${index}">Remove</button>`;
            });

            // Event listener to handle item removal
            checkoutItems.addEventListener("click", function (event) {
                if (event.target.classList.contains("remove-item")) {
                    const index = parseInt(event.target.dataset.index);
                    // Remove the row from the table
                    table.deleteRow(index);
                    // Remove the item from the cart array
                    cart.splice(index, 1);
                    // Update the total and sessionStorage
                    displayCartItems();
                }
            });

            // Function to display cart items and update sessionStorage
            function displayCartItems() {
                // Update total amount
                const totalAmount = cart.reduce((total, item) => total + item.price * item.quantity, 0);
                checkoutTotal.textContent = totalAmount.toFixed(2);

                // Update sessionStorage
                sessionStorage.setItem("cart", JSON.stringify(cart));
            }

            // Calculate and update the total amount
            const totalAmount = cart.reduce((total, item) => total + item.price * item.quantity, 0);
            checkoutTotal.textContent = totalAmount.toFixed(2);

            // Example: Triggering sessionStorage removal on logout
            document.getElementById('logoutButton').addEventListener('click', function () {
                sessionStorage.removeItem('cart');
                // Additional logic for logging out
            });
        });*/
   </script>
    
</body>
</html>




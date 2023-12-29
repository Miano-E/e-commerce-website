<?php
// Include the connection file and start the session
include("connect.php");
session_start();

// Check if the form is submitted using POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
     // Get username and password from the form
    $myusername = mysqli_real_escape_string($con, $_POST['username']);
    $mypassword = $_POST['password'];

    // Validate username and password
    if (empty($myusername)) {
        header("Location: login.php?error=Username required");
        exit();
    } else if(empty($mypassword)) {
        header("Location: login.php?error=Password required");
        exit();
    }else {
        // Prepare and execute a SQL query to fetch user details
        $sql = "SELECT * FROM ecommerce_table WHERE username = ?";
        $stmt = mysqli_prepare($con, $sql);

        mysqli_stmt_bind_param($stmt, "s", $myusername);
        mysqli_stmt_execute($stmt);

        $result = mysqli_stmt_get_result($stmt);
        $row = mysqli_fetch_assoc($result);

        // If password is correct, create a session and redirect to checkout
        if ($row && password_verify($mypassword, $row['password'])) {
            $sessionToken = bin2hex(random_bytes(32));
            $_SESSION['username'] = $row['username'];
            header("Location: checkout.php");
            exit();
        } else {
            header("Location: login.php?error=Incorrect Username or Password");
            exit();
        }

        // Close the prepared statement
        mysqli_stmt_close($stmt);
    }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="stylesheet" href="form-css/login.css">
    <link rel="stylesheet" href="list-css/list.css">
</head>
<body>

    <div class="wrapper">
    <!-- Header section with logo and navigation -->
        <header>
            <a href="index.php" class = "logo">Time<span>Piece</span></a>
                <nav>
                    <ul>
                        <li><a href="index.php">Home</a></li>
                        <li><a href="shop.php">Shop</a></li>
                        <li><a href="about.php">About</a></li>
                        <li><a href="login.php" class="active">Login</a></li>
                    </ul>
                </nav>
        </header>
    </div>

    <!-- Login form section -->
    <div class="logincontainer">
        <form action="" method="post">
            <h2>Login To Checkout</h2>

            <!-- Display error message if present in the URL -->
            <?php if (isset($_GET['error'])) { ?>
				<p class = "error"><?php echo $_GET['error']; ?></p>
			<?php }?>

            <label for="username">Username</label>
            <input type="text" name="username">

            <label for="password">Password</label>
            <input type = "password" name = "password" id = "myInput">
                    
		    <input type = "checkbox" onclick = "myFunction()">Show Password
					
			<button type = "submit" name = "login" class = "submitbtn">Login</button>
            
			<p class = "check">Don't have an account? <a href = "signup.php">Register</a></p>

            <p class="demo">Demo Account: demo | Demo@123</p>
		</form>
	</div>

    <!-- JavaScript function to toggle password visibility -->
        <script>
			function myFunction(){
				var a = document.getElementById("myInput");
				if(a.type === "password"){
					a.type = "text";
				}else{
					a.type = "password";
				}
			}
		</script>
</body>
</html>
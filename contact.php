<?php
include_once("connect.php");

   $name = "";
   $email = "";
   $message="";

   if(isset($_POST['submitbtn'])) {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    $errors = array();

    if($name == "") {
        $errors['name'] = "Name field required";
    }else if(preg_match("#[0-9]+#", $name)) {
        $errors['name'] = "Name cannot contain numbers";
    }

    if($email == "") {
        $errors['email'] = "Email field required";
    }else if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "Input a valid email";
    }else if(!empty($email)) {
        $stmt = $con->prepare("SELECT email FROM contact_table WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();
        
        if($stmt->num_rows > 0) {
            $errors['email'] = "Email already exists";
        }
    }

    if($message == "") {
        $errors['message'] = "Message field required";
    }
    

    if(empty($errors)) {

        $stmt = $con->prepare("INSERT INTO contact_table(name, email, message) VALUES (?, ?, ?)");
        $stmt -> bind_param("sss", $name, $email, $message);

        if($stmt->execute()) {

            $name = "";
            $email = "";
            $message = "";

           $successMessage = "";
        } else {
            // Set an error message if execution fails
            $successMessage = "";
        }
        
        $stmt->close();
        $con->close();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-commerce Home</title>
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="form-css/contact.css">

</head>
<body>
    <div class="container">
        <header>
            <!-- Logo and navigation links -->
            <a href="index.php" class = "logo">Time<span>Piece</span></a>
                <nav>
                    <ul>
                        <li><a href="index.php">Home</a></li>
                        <li><a href="shop.php">Shop</a></li>
                        <li><a href="about.php">About</a></li>
                        <li><a href="contact.php" class="active">Contact</a></li>
                        <li><a href="login.php" class="login">Login</a></li>
                    </ul>
                </nav>
        </header>
    </div>

    <section>
        <div class="left-col">
            <h3>Contacts</h3>
            <ul>
                <li>
                    <img src="icons/name.png" alt="Name icon">
                    <strong>Full Name:</strong> <p class="sub">John Doe</p>
                </li>
                <li>
                    <img src="icons/address.png" alt="Address Icon">
                    <strong>Address:</strong> <p class="sub">123 Street</p> 
                </li>
                <li>
                   <img src="icons/phone.png" alt="Phone Icon">
                    <strong>Phone:</strong> <p class="sub">+1 (555) 4567</p>
                </li>
                <li>
                    <img src="icons/email.png" alt="Email Icon">
                    <strong>Email:</strong> <p class="sub">contact@example.com</p>
                </li>
            </ul>
        </div>
       
        <div class="right-col">
            <div class="wrapper">
                <h3>Get in touch</h3>
                <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST" id="contactForm">
                    <label for="Name">Name</label>
                    <input type="text" name="name" value="<?php echo isset($name) ? $name : ''; ?>">
                    <p class="error"><?php if(isset($errors["name"])) echo $errors["name"]; ?></p>

                    <label for="email">Email</label>
                    <input type="email" name="email" value="<?php echo isset($email) ? $email : ''; ?>">
                    <p class="error"><?php if(isset($errors["email"])) echo $errors["email"]; ?></p>

                    <label for="message">Message</label>
                    <textarea name="message" id="message" cols="30" rows="10"></textarea>

                    <button type="submit" name="submitbtn" class="submitbtn">Send</button>
                </form>
            </div>
        </div>
        
    </section>

    <!-- Footer section with copyright information -->
    <footer>
        &copy; 2023 TimePiece. All Rights Reserved. 
    </footer>

</body>
</html>
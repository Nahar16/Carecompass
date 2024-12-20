<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup Page</title>
</head>

<body class="bg-light" style="background-image: url('https://png.pngtree.com/background/20221202/original/pngtree-medical-healthcare-hospital-theme-background-picture-image_1978478.jpg');">
    <center>
        <div class="container">
            <h1>Sign up before placing your order</h1> <br>
            <?php if (isset($_SESSION['message'])): ?>
                <p><?php echo $_SESSION['message']; unset($_SESSION['message']); ?></p>
            <?php endif; ?>            
            <form id="registrationForm" action="connection_access.php" method="post">
                <label for="first_name">First Name:</label><br>
                <input type='text' name='first_name' id="first_name" placeholder="First Name" required /><br>
                
                <label for="last_name">Last Name:</label><br>
                <input type='text' name='last_name' id="last_name" placeholder="Last Name" required /><br>
                
                <label for="phone">Phone:</label><br>
                <input type='tel' name='phone' id="phone" placeholder="Your phone number" required /><br>
                
                <label for="city">City:</label><br>
                <input type='text' name='city' id="city" placeholder="Your city" required /><br>
                
                <label for="area">Area:</label><br>
                <input type='text' name='area' id="area" placeholder="Your area" required /><br>
                
                <label for="house_no">House No:</label><br>
                <input type='text' name='house_no' id="house_no" placeholder="House number" required /><br>
                
                <label for="road_no">Road No:</label><br>
                <input type='text' name='road_no' id="road_no" placeholder="Road number" required /><br>
                
                <label for="email">Email:</label><br>
                <input type='email' name='email' id="email" placeholder="Your email" required /><br>
                
                <label for="password">Choose a Password:</label><br>
                <input type='password' name='password' id="password" placeholder="Your password" required /><br>
                
                <input type='submit' name='viewer_signup' value='Sign Up' /><br />
                <a href="./viewer_signup.php">Retry</a>
            </form>
            Already have an account?
            <a href="viewer_login.php" class="signin-link">Login</a><br>
            <a href="index.php" style="font-size: 24px;">Back</a>
        </div>
    </center>
</body>

</html>

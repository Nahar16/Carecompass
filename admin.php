<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CareCompass-Admin Page</title>
</head>

<body class="bg-light" style="background-image: url('https://png.pngtree.com/background/20221202/original/pngtree-medical-healthcare-hospital-theme-background-picture-image_1978478.jpg');">
    <div class="container">
        <center>
            <h1>Welcome to CareCompass Admin Page</h1>
            <img class="nav-logo" src="Medicare(1).png">
            <div class="form-container">
                <form name="form" action="connection_access.php" method="POST">
                    <label><i>UserName</i></label>
                    <input type="text" name="username" required><br>
                    <label><i>PassWord</i></label>
                    <input type="password" name="password" required><br><br>
                    <button type="submit" name="login">Login</button>
                </form>
                
            </div>
        </center>
    </div>
</body>

</html>
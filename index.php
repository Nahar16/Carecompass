<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      href="https://cdn.jsdelivr.net/npm/remixicon@3.4.0/fonts/remixicon.css"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="style.css" />
    <title>CareCompass</title>
  </head>
    <body>
    <div class="container">
            <nav class="navbar navbar-expand-lg bg-lightblue shadow-lg p-0">
                    <div class="nav__logo">CareCompass</div>
                    <ul class="nav__links">
                    <li class="link"><a href="index.php">Home</a></li>
                    <li class="link"><a href="hospital_viewer1.php">Hospital</a></li>
                    <li class="link"><a href="medicine_viewer.php">Medicine</a></li>
                    <li class="link"><a href="donor_viewer.php"> Blood Donor</a></li>
                    </ul>
                    <a href="admin.php" class="btn" style = "text-decoration:none">Admin Login</a>
            </nav>
      <header class="header">
        <div class="content">
          <h1><span>Get Quick</span><br />Medical Services</h1>
          <p>
            CareCompass is your online ally for Medicare, streamlining medication orders, locating blood donors and hospitals, and offering travel support. Experience personalized care and expert guidance, all through user-friendly interfaces designed to enhance your health and simplify your life.
          </p>
       <a href="hospital_viewer1.php" class="btn" style = "text-decoration:none">Hospital</a>
       <a href="medicine_viewer.php" class="btn" style = "text-decoration:none">Medicine</a>
       <a href="donor_viewer.php" class="btn" style = "text-decoration:none">Blood Donor</a>
        </div>
        <div class="image">
          <span class="image__bg"></span>
          <img src="header_image.png" alt="header image"/>
          <div class="image__content image__content__1">
            <span><i class="ri-user-3-line"></i></span>
            <div class="details">
              <h3>1520+</h3>
              <p>Active Clients</p>
            </div>
          </div>
          <div class="image__content image__content__2">
              <ul>
              <li>
                <span><i class="ri-check-line"></i></span>
                Get 20% off on every 1st month
              </li>
              <li>
                <span><i class="ri-check-line"></i></span>
                Nearby Best Hospitals
              </li>
            </ul>
          </div>
        </div>
      </header>
    </div>
  </body>
</html>
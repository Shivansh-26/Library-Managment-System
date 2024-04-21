<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="../Assets/lib-logo.jpg" />
    <title>Statistics</title>
    <link rel="stylesheet" href="style2.css" />
    <!--Font Awesome CDN link-->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
    />
  </head>
  <body>
    <div class="main">

      <div class="sidebar">
        <div class="logo">
          <img src="../Assets/lib-logo.jpg" class="imga" />
          <h2>LMS</h2>
        </div>

        <ul class="menu">
          <li>
            <a href="../Dashboard3/dashboard.php">
              <i class="fas fa-tachometer-alt"></i>
              <span>Dashboard</span>
            </a>
          </li>
          <li>
            <a href="../Dashboard3/profile.php">
              <i class="fas fa-user"></i>
              <span>Profile</span>
            </a>
          </li>
          <li class="active">
            <a href="#">
              <i class="fas fa-chart-bar"></i>
              <span>Statistics</span>
            </a>
          </li>
          <li class="logout">
            <a href="../LoginPage/logout.php">
              <i class="fas fa-sign-out-alt"></i>
              <span>Logout</span>
            </a>
          </li>
        </ul>
      </div>

      <div class="main--content">
        <div class="statistics--content">
          <div class="buttons">
            <button id ="booksBtn">Books</button>
            <button id ="studentsBtn">Students</button>
          </div>
          <table id = "booksTable"></table>
          <table id = "studentsTable"></table>
        </div>
      </div>
    </div>
    <script src="script2.js"></script>
  </body>
</html>
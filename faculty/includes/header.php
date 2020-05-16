<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Faculty</title>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
  <!-- Bootstrap core CSS -->
  <link href="../css/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="../css/mdb.min.css" rel="stylesheet">
  <!-- Your emptom styles (optional) -->
  <link href="../css/style.css" rel="stylesheet">  
  
</head>

<body>
  <header>
    <!--Navbar -->
    <nav class="mb-1 navbar navbar-expand-lg navbar-dark default-color">
      <a class="navbar-brand" href="index.php">FACULTY</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-333"
        aria-controls="navbarSupportedContent-333" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent-333">
        <ul class="navbar-nav mr-auto">
          <?php 
            if(!isset($_SESSION['email'])){
              echo "<li class='nav-item'><a href='../login.php' class='nav-link' style='border-radius: 10em;'>Student</a></li>";
            }
            else{
              echo "<li class='nav-item'><a href='myaccount.php' class='nav-link' style='border-radius: 10em;'>My Account</a></li>";
              echo "<li class='nav-item'><a href='logout.php' class='nav-link' style='border-radius: 10em;'>Logout</a></li>";
            }
          ?>
        </ul>
      </div>
    </nav>
    <!--/.Navbar -->
  </header>

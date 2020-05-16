<!DOCTYPE html>
<?php 
	session_start();
	include '../../core/init.php';
?>

<?php 
  if(!isset($_SESSION['email'])){
      echo "<script>window.open('login.php','_self')</script>";
    }else{
        echo "<script>window.open('','_self')</script>";
    }
?>

<?php
  $email = $_SESSION['email'];
  $name=$fid='';
  $sql = "SELECT * FROM facultylogin WHERE email = '$email'";
    $result = $conn->query($sql);
    while ($row_pro = mysqli_fetch_array($result)) {
      $name = $row_pro['fullname'];
      $fid = $row_pro['fid'];
    }
?>

<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Faculty</title>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
  <!-- Bootstrap core CSS -->
  <link href="../../css/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="../../css/mdb.min.css" rel="stylesheet">
  <!-- Your emptom styles (optional) -->
  <link href="../../css/style.css" rel="stylesheet">  
</head>
<body>

<nav class="mb-1 navbar navbar-expand-lg navbar-dark default-color">
  <a class="navbar-brand" href="../index.php"><?=$name;?></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-333"
    aria-controls="navbarSupportedContent-333" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent-333">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="../myaccount.php?edit_account">Edit Account</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../myaccount.php?change_password">Change Password</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../myaccount.php?delete_account">Delete Account</a>
      </li>
    </ul>
  </div>
</nav>

<div class="container-fluid p-2">
  <div class="card">
    <div class="card-header">
      <h3 class="h3-responsive p-2 text-center">Edit Account</h3>
    </div>
    <div class="card-body">
      <div class="container-fluid">
        <form class="p-3 grey-text" method="post" action="" enctype="multipart/form-data">
          <div class="row">         
            <div class="col-md-6">
                    <div class="md-form form-sm"> <i class="fa fa-envelope prefix"></i>
                      <input type="email" id="email" class="form-control form-control-sm" name="email" value="<?php echo $email;?>" required>
                      <label for="email">Email</label>
                    </div>
            </div>
            <div class="text-center mt-4">
                      <button class="btn btn-default" type="submit" name="update">Update<i class="fa fa-paper-plane-o ml-1"></i></button>
                  </div>          
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<?php
	if(isset($_POST['update'])){
    $email = $_POST['email'];

		$updateCus = "UPDATE facultylogin SET email = '$email' WHERE fid = '$fid'";
		$run_query = $conn->query($updateCus);
		if($run_query){
			$_SESSION['email']=$email;
			echo "<script>alert('Your account has been successfully updated!')</script>";
			echo "<script>window.open('../myaccount.php','_self')</script>";
		}
	}
?>

</body>
</html>
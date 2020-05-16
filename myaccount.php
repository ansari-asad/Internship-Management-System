<!DOCTYPE html>
<?php 
	session_start();
	include 'core/init.php';
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
	$name=$usn=$sem=$branch=$age=$gender=$phone='';
	$sql = "SELECT * FROM studentlogin WHERE email = '$email'";
    $result = $conn->query($sql);
    while ($row_pro = mysqli_fetch_array($result)) {
        $name = $row_pro['fullname'];
        $usn = $row_pro['usn'];
        $email = $row_pro['email'];
        $sem = $row_pro['semester'];
        $branch = $row_pro['branch'];
        $age = $row_pro['age'];
        $gender = $row_pro['gender'];
        $phone = $row_pro['phone'];
    }
?>

<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>my account</title>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
  <!-- Bootstrap core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="css/mdb.min.css" rel="stylesheet">
  <!-- Your emptom styles (optional) -->
  <link href="css/style.css" rel="stylesheet">  
</head>
<body>
	<nav class="mb-1 navbar navbar-expand-lg navbar-dark default-color">
      	<a class="navbar-brand" href="index.php"><?=$name;?></a>
        <!-- Collapse button -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#basicExampleNav"
        aria-controls="basicExampleNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      	</button>
	      <!-- Collapsible content -->
	      	<div class="collapse navbar-collapse" id="basicExampleNav">
	        <!-- Links -->
		        <ul class="navbar-nav mr-auto smooth-scroll">
          			<li class="nav-item">
            			<a class="nav-link" href="myaccount.php?edit_account">Edit Account</a>
          			</li>
          			<li class="nav-item">
            			<a class="nav-link" href="myaccount.php?change_password">Change Password</a>
          			</li>
          			<li class="nav-item">
            			<a class="nav-link" href="myaccount.php?delete_account">Delete Account</a>
          			</li>
		        </ul>
	    	</div>
		
	</nav>

	<?php 
			if (!isset($_GET['edit_account'])) {
				if(!isset($_GET['change_password'])){
					if(!isset($_GET['delete_account'])){
						echo 
						"
							<div class='card'>
								<div class='card-header'>
									<h3 class='h3-responsive p-2'>Hello $name</h3>
								</div>
						";
					}
				}
			}
		
	?>

	<?php
	$email = $_SESSION['email'];
	include 'dashboard.php';
	echo "<form action=\"\" method='post'>
									<div class=\"card-footer\">
										<div class=\"float-center\">
											<button type=\"submit\" id='addEntry' name=\"addEntry\" class=\"btn btn-black\" style=\"border-radius: 10em;background: #1c2a48\">Add Entry</button>
										</div>
									</div>
								</form>
							</div>";
	?>

	<?php
	if (isset($_POST['addEntry'])) {
		echo "<script>window.open('form.php','_self')</script>";
	}
	?>

	<?php
		if(isset($_GET['edit_account'])){
			echo '<script>window.open("student/edit_account.php","_self");</script>';
		}
		if(isset($_GET['change_password'])){
			echo '<script>window.open("student/change_password.php","_self");</script>';
		}
		if(isset($_GET['delete_account'])){
			echo '<script>window.open("student/delete_account.php","_self");</script>';
		}
	?>

</body>
</html>

<?php include 'includes/footer.php';?>
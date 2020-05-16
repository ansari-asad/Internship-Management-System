<?php 
	session_start();
	include 'core/init.php';
	include('includes/header.php'); 
?>

<div class="container-fluid p-2">
	<div class="card">
		<div class="card-header">
			<h3 class="h3-responsive p-2 text-center">Registration Form</h3>
		</div>
		<div class="card-body">
			<div class="container-fluid">
				<form class="p-3 grey-text" method="post" action="register.php">
					<div class="row">					
						<div class="col-md-6">
							<div class="md-form form-sm"> <i class="fa fa-id-badge prefix"></i>
				              <input type="text" id="usn" class="form-control form-control-sm" name="usn" required>
				              <label for="usn">USN</label>
				            </div>
							<div class="md-form form-sm"> <i class="fa fa-user prefix"></i>
				              <input type="text" id="fullname" class="form-control form-control-sm" name="fullname" required>
				              <label for="fullname">Full Name</label>
				            </div>
				            <div class="md-form form-sm"> <i class="fa"></i>
				              <input type="radio" id="gender" name="gender" value="male" checked>Male
				              <input type="radio" id="gender" name="gender" value="female">Female
				              <input type="radio" id="gender" name="gender" value="other">Other
				            </div>
				            <div class="md-form form-sm"> <i class="fa fa-envelope prefix"></i>
				              <input type="email" id="email" class="form-control form-control-sm" name="email" required>
				              <label for="email">Email</label>
				            </div>
				            <div class="md-form form-sm"> <i class="fa fa-th-list prefix"></i>
				              <input type="text" id="branch" class="form-control form-control-sm" name="branch" required>
				              <label for="branch">Branch</label>
				            </div>
				            <div class="md-form form-sm"> <i class="fa fa-indent prefix"></i>
				              <input type="number" id="sem" class="form-control form-control-sm" name="sem" min="1" max="8"required>
				              <label for="sem">Semester</label>
				            </div>
				            <div class="md-form form-sm"> <i class="fa fa-heart prefix"></i>
				              <input type="number" id="age" class="form-control form-control-sm" size="2" name="age" required>
				              <label for="age">Age</label>
				            </div>
				            <div class="md-form form-sm"> <i class="fa fa-phone prefix"></i>
				              <input type="number" id="phone" class="form-control form-control-sm" name="phone" required>
				              <label for="phone">Contact Number</label>
				            </div>
				            <div class="md-form form-sm"> <i class="fa fa-lock prefix"></i>
				              <input type="password" id="password" class="form-control form-control-sm" name="password" required>
				              <label for="password">Password</label>
				            </div>
				            <div class="text-center mt-4">
			              	<button class="btn btn-default" type="submit" name="submit">Submit <i class="fa fa-paper-plane-o ml-1"></i></button>
			            
									
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<?php
if(isset($_POST['submit'])){
	$fullname = $_POST['fullname'];
	$usn = $_POST['usn'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$sem = $_POST['sem'];
	$branch = $_POST['branch'];
	$age = $_POST['age'];
	$gender = $_POST['gender'];
	$phone = $_POST['phone'];
		
	$sql = "INSERT INTO studentlogin VALUES ('$usn','$fullname','$email','$password','$sem','$branch','$age','$gender','$phone')";

	if (mysqli_query($conn, $sql)) {
	   echo "<script>window.open('login.php', '_self');</script>";
	} else {
	    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}

	mysqli_close($conn);
}
?>

<?php include('includes/footer.php'); ?>
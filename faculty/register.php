<?php 
  session_start();
  require_once '../core/init.php';
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
							<div class="md-form form-sm"> <i class="fa fa-user prefix"></i>
				              <input type="text" id="fullname" class="form-control form-control-sm" name="fullname" required>
				              <label for="fullname">Name</label>
				            </div>
				            <div class="md-form form-sm"> <i class="fa fa-id-badge prefix"></i>
				              <input type="text" id="fid" class="form-control form-control-sm" name="fid" required>
				              <label for="fid">Faculty ID</label>
				            </div>
				            <div>
							<form action="">
							  <input type="radio" name="designation" id="IC" value="3" checked>Department Incharge<br>
							  <input type="radio" name="designation" id="HOD" value="2">Head of the Department<br>
							  <input type="radio" name="designation" id="MIC" value="1">Head Incharge
							</form>	
						</div>
				  
				            <div class="md-form form-sm"> <i class="fa fa-envelope prefix"></i>
				              <input type="email" id="email" class="form-control form-control-sm" name="email" required>
				              <label for="email">Email</label>
				            </div>
				            <div class="md-form form-sm"> <i class="fas fa-lock prefix"></i>
				              <input type="password" id="password" class="form-control form-control-sm" name="password" required>
				              <label for="password">Password</label>
				            </div>

											            
						
						<div class="text-center mt-4">
			              	<button class="btn btn-default" type="submit" name="submit">Submit<i class="fa fa-paper-plane-o ml-1"></i></button>
			            </div>					
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<?php
	if(isset($_POST['submit'])){
		
		$fullname = $_POST['fullname'];
		$designation = $_POST['designation'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		$fid = $_POST['fid'];
		$sql='SELECT designation from facultylogin';
		$result = $conn->query($sql);
		while ($row_pro = mysqli_fetch_array($result)) {
		    $des = $row_pro['designation'];
		    if ($des==$designation) {
		    	echo "<script>alert('Designation already present!');</script>";
		    	echo "<script>window.open('','_self');</script>";
		    	exit();
		    }
		}
		$insertEmp = "INSERT INTO facultylogin (fullname,email,password,designation,fid) VALUES ('$fullname','$email','$password','$designation','$fid')";
		if($conn->query($insertEmp)){
			echo "<script>alert('Account has been created successfully')</script>";
			echo "<script>window.open('login.php','_self')</script>";
		}else{
			echo "Error: " . $insertEmp . "<br>" . mysqli_error($conn);
		}
	}
?>

<?php include 'includes/footer.php';?>
<?php
include 'myaccount.php';
echo "<script>document.getElementById('addEntry').style.visibility='hidden';</script>";
?>

<div class="container-fluid p-2">
	<div class="card">
		<div class="card-header">
			<h3 class="h3-responsive p-2 text-center">Company Details</h3>
		</div>
		<div class="card-body">
			<div class="container-fluid">
				<form class="p-3 grey-text" method="post" action="" enctype="multipart/form-data">
					<div class="row">					
						<div class="col-md-6">
							<div class="md-form form-sm"> <i class="fa fa-address-book prefix"></i>
				              <input type="text" id="name" class="form-control form-control-sm" name="name" required>
				              <label for="name">Name</label>
				            </div>
							<div class="md-form form-sm"> <i class="fa fa-map-marker prefix"></i>
				              <input type="text" id="address" class="form-control form-control-sm" name="address" required>
				              <label for="address">Address</label>
				            </div>
				            <div class="md-form form-sm"> <i class="fa fa-id-card prefix"></i>
				              <input type="text" id="cname" class="form-control form-control-sm" name="cname" required>
				              <label for="cname">Contact Person Name</label>
				            </div>
				            <div class="md-form form-sm"> <i class="fa fa-users prefix"></i>
				              <input type="text" id="cdes" class="form-control form-control-sm" name="cdes" required>
				              <label for="cdes">Contact Person Designation</label>
				            </div>
				            <div class="md-form form-sm"> <i class="fa fa-phone prefix"></i>
				              <input type="number" id="cphone" class="form-control form-control-sm" name="cphone" required>
				              <label for="cphone">Contact Person Phone Number</label>
				            </div>
				            <div class="md-form form-sm"> <i class="fa fa-envelope prefix"></i>
				              <input type="email" id="cemail" class="form-control form-control-sm" name="cemail" required>
				              <label for="cemail">Contact Person Email</label>
				            </div>
				            <div class="md-form form-sm"> <i class="fa fa-th-list prefix"></i>
				              <input type="text" id="dept" class="form-control form-control-sm" name="dept" required>
				              <label for="dept">Department</label>
				            </div>
				            <div class="md-form form-sm"> <i class="fa fa-briefcase prefix"></i>
				              <input type="number" id="duration" class="form-control form-control-sm" name="duration" required>
				              <label for="duration">Duration (in weeks)</label>
				            </div>
				            <div class="md-form form-sm"> <i class="fa fa-calendar prefix"></i>
				              <input type="date" id="startdate" class="form-control form-control-sm" name="startdate" required>
				              <label for="startdate">Start Date</label>
				            </div>
				            <div class="md-form form-sm"> <i class="fa fa-calendar prefix"></i>
				              <input type="date" id="enddate" class="form-control form-control-sm" name="enddate" required>
				              <label for="enddate">End Date</label>
				            </div>
				            <div class="md-form form-sm"> <i class="fa fa-bullseye prefix"></i>
				              <input type="text" id="domain" class="form-control form-control-sm" name="domain" required>
				              <label for="domain">Domain</label>
				            </div>
				        </div>
					</div>
					<div class="card-footer">
						<div class="float-right">
							<input type="file" name="proof" class="btn btn-black" id="proof">
							<button type="submit" id='submit' name="submit" class="btn btn-black" style="border-radius: 10em;background: #1c2a48\">Submit</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<?php
if (isset($_POST['submit'])) {
	$cname = $_POST['name'];
	$cadd = $_POST['address'];
	$ccname = $_POST['cname'];
	$ccdes = $_POST['cdes'];
	$ccphone = $_POST['cphone'];
	$ccemail = $_POST['cemail'];
	$cdept = $_POST['dept'];
	$cdur = $_POST['duration'];
	$cstd = $_POST['startdate'];
	$cend = $_POST['enddate'];
	$cdom = $_POST['domain'];
	if ($cend<$cstd) {
		echo "<script>alert('Invalid Dates!');</script>";
		echo "<script>document.getElementById('startdate').value='';</script>";
		echo "<script>document.getElementById('enddate').value='';</script>";
	}
	$sql = "SELECT usn FROM studentlogin WHERE email = '$email'";
	$result = $conn->query($sql);
	while ($row_pro = mysqli_fetch_array($result)) {
	    $usn = $row_pro['usn'];
	include 'upload.php';
	if ($uploadOk == 1) {
		$email = $_SESSION['email'];
	    }

	    $sql = "INSERT INTO company VALUES('$cname','$cadd','$ccname','$ccdes','$ccphone','$ccemail','$cdept','$cdur','$cstd','$cend','$cdom',4,'$usn')";
	    if (mysqli_query($conn, $sql)) {
	    	echo "<script>alert('Database Updated!');</script>";
			echo "<script>window.open('myaccount.php', '_self');</script>";
		} else {
		    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
	}
}
?>

<?php include 'includes/footer.php'; ?>
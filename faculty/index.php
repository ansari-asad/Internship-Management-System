<?php
	session_start();
	require_once '../core/init.php';
	include 'includes/header.php'
?>

<?php
if (!isset($_SESSION['email'])) {
	echo "<script>window.open('login.php','_self');</script>";
}
?>

<main>
  <h3 class="text-center p-3">Student Internship Management</h3>
  <div class="container-fluid row">

  </div>
  <br>
</main>
<?php
	include 'includes/footer.php';
?>
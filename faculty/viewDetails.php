<!DOCTYPE html>
<?php 
	session_start();
  include '../core/init.php';
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
  $name=$des='';
  $sql = "SELECT * FROM facultylogin WHERE email = '$email'";
  $result = $conn->query($sql);
  while ($row_pro=$result->fetch_assoc()) {
    $name = $row_pro['fullname'];
    $des = $row_pro['designation'];
  }

  $address=$cname=$cdes=$cphone=$cemail=$dept=$dur=$std=$end=$dom=$status=$proof='';
  $sql = "SELECT * FROM company WHERE usn = '{$_GET['usn']}' and name = '{$_GET['company']}'";
  $result = $conn->query($sql);
  while ($row_pro = $result->fetch_assoc()) {
    $address=$row_pro['address'];
    $cname=$row_pro['cname'];
    $cdes=$row_pro['cdesignation'];
    $cphone=$row_pro['cphone'];
    $cemail=$row_pro['cemail'];
    $dept=$row_pro['department'];
    $dur=$row_pro['duration'];
    $std=$row_pro['startdate'];
    $end=$row_pro['enddate'];
    $dom=$row_pro['domain'];
    $status=$row_pro['status'];
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
  <link href="../css/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="../css/mdb.min.css" rel="stylesheet">
  <!-- Your emptom styles (optional) -->
  <link href="../css/style.css" rel="stylesheet">  
</head>
<body>

<nav class="mb-1 navbar navbar-expand-lg navbar-dark default-color">
  <a class="navbar-brand" href="index.php"><?=$name;?></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-333"
    aria-controls="navbarSupportedContent-333" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent-333">
    <ul class="navbar-nav mr-auto">
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
            "<div class='card'>
                <div class='card-header'>
                  <h3 class='h3-responsive p-2'>Hello $name</h3>
                </div>
              </div>
            ";
          }
        }
      }
  ?>

<div class='card'>
  <div class='card-body table-responsive'>
    <table class='table table-striped table-condensed' style='display: table'>
      
      <tr>
          <th>USN : </th>
          <td><?php echo $_GET['usn']; ?></td>
      </tr>
      <tr>
          <th>Company : </th>
          <td><?php echo $_GET['company']; ?></td>
      </tr>
      <tr>
          <th>Company Address : </th>
          <td><?php echo $address ?></td>
      </tr>
      <tr>
          <th>Contact Person : </th>
          <td><?php echo $cname ?></td>
      </tr>
      <tr>
          <th>Contact Person Designation : </th>
          <td><?php echo $cdes ?></td>
      </tr>
      <tr>
          <th>Contact Person Phone : </th>
          <td><?php echo $cphone ?></td>
      </tr>
      <tr>
          <th>Training Department : </th>
          <td><?php echo $dept ?></td>
      </tr>
      <tr>
          <th>Duration in weeks : </th>
          <td><?php echo $dur ?></td>
      </tr>
      <tr>
          <th>Start Date : </th>
          <td><?php echo $std ?></td>
      </tr>
      <tr>
          <th>End Date : </th>
          <td><?php echo $end ?></td>
      </tr>
      <tr>
          <th>Domain : </th>
          <td><?php echo $dom ?></td>
      </tr>
      <tr>
          <th>Supporting Document : </th>
          <td><form action="" method="post">
                    <div class='text-left mt-1'>
                        <button class='btn btn-default' type='submit' id='view' name='view'>Download<i class='fa fa-paper-plane-o ml-1'></i></button>
                    </div></td>
              </form>
          </td>
      </tr>
    </table>
  </div>
</div>

<?php
if (isset($_POST['view'])) {
  $nm=explode(' ',$_GET['company']);
  $ad="C:/xampp/htdocs/wtproj/uploads/".$_GET['usn'].'_'.$nm[0].'.pdf';
  if (file_exists($ad)) {
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Type: application/force-download');
    header('Content-Disposition: attachment; filename="'.basename($ad).'"');
    header('Expires: 0');
    header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
    header('Pragma: public');
    header('Content-Length: ' . filesize($file));
    ob_clean();
    flush();
    readfile($file);
  }
}
?>

<?php
if ($status==$des || $status==$des+1) {
echo '<form action="" method="post">
  <table class="table">
    <tr>
      <td>
      <div class="text-left mt-1">
          <button class="btn btn-danger" type="submit" id="reject" name="reject">Reject<i class="fa fa-paper-plane-o ml-1"></i></button>
      </div>
      </td>';
      if ($status!=$des){
      echo '
      <td>
      <div class="text-right mt-1">
          <button class="btn btn-success" type="submit" id="accept" name="accept">Accept<i class="fa fa-paper-plane-o ml-1"></i></button>
      </div>
      </td>';
      }
      echo '
    </tr>
  </table>
</form>';
}
?>

<?php
if (isset($_POST['accept'])) {
    $updateCus = "UPDATE company SET status = '$des' WHERE usn = '{$_GET['usn']}' and name = '{$_GET['company']}'";
    $run_query = $conn->query($updateCus);
    if($run_query){
      $_SESSION['email']=$email;
      echo "<script>alert('Internship Application Approved!')</script>";
      echo "<script>window.open('myaccount.php','_self')</script>";
    }
}
if (isset($_POST['reject'])) {
    $a=$des+1;
    $updateCus = "UPDATE company SET status = '$a' WHERE usn = '{$_GET['usn']}' and name = '{$_GET['company']}'";
    $run_query = $conn->query($updateCus);
    if($run_query){
      $_SESSION['email']=$email;
      echo "<script>alert('Internship Application Rejected!')</script>";
      echo "<script>window.open('myaccount.php','_self')</script>";
    }
}
?>

  <?php
    if(isset($_GET['edit_account'])){
      echo '<script>window.open("details/edit_account.php","_self");</script>';
    }
    if(isset($_GET['change_password'])){
      echo '<script>window.open("details/change_password.php","_self");</script>';
    }
    if(isset($_GET['delete_account'])){
      echo '<script>window.open("details/delete_account.php","_self");</script>';
    }
  ?>

</body>
</html>
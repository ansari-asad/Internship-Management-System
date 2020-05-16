<div class='card'>
  <div class='card-body table-responsive'>
    <table class='table table-striped table-condensed' style='display: table'>
      
      <tr>
          <th>USN</th>
          <th>Name</th>
          <th>Company</th>
          <th>IC</th>
          <th>HOD</th>
          <th>MIC</th>
          <th>Details</th>
      </tr>
      
<?php
include '../core/init.php';
$rows = array();
$sql = "SELECT company.usn,fullname,company.name,company.status FROM studentlogin,company where studentlogin.usn=company.usn  ORDER BY status DESC";
$runsql=$conn->query($sql);
if ($runsql->num_rows != 0) {
    // output data of each row
  $key=0;
    while($row=$runsql->fetch_assoc()) {
       echo "<tr>
                <td>{$row['usn']}</td>
                <td>{$row['fullname']}</td>
                <td>{$row['name']}</td>"
?>
                <td><?php echo ($row['status']<=3)?"&#10004":"&#10006"; ?></td>
                <td><?php echo ($row['status']<=2)?"&#10004":"&#10006"; ?></td>
                <td><?php echo ($row['status']<=1)?"&#10004":"&#10006"; ?></td>
                <td>
                  <form action="" method="post">
                    <div class='text-left mt-1'>
                        <button class='btn btn-default' type='submit' id=<?php echo 'viw'.$key; ?> name=<?php echo 'viw'.$key; ?>>View Details<i class='fa fa-paper-plane-o ml-1'></i></button>
                    </div></td>
                    <?php $key+=1 ?>
                  </form>
            </tr>

<?php
if (isset($_POST['viw'.($key-1)])) {
  echo "<script>window.open('viewDetails.php?company={$row['name']}&usn={$row['usn']}','_self');</script>";
}
?>

<?php
    }	
}
?>

    </table>
  </div>
</div>
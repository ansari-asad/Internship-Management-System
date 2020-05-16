<div class='card'>
  <div class='card-body table-responsive'>
    <table class='table table-striped table-condensed' style='display: table'>
      
      <tr>
          <th>Company</th>
          <th>IC</th>
          <th>HOD</th>
          <th>MIC</th>
          <th>Start</th>
          <th>End</th>
      </tr>
      
<?php
include 'core/init.php';

$sql = "SELECT company.usn,fullname,company.name,company.status,company.startdate,company.enddate FROM studentlogin,company where studentlogin.usn=company.usn ORDER BY status";
$runsql=$conn->query($sql);
if ($runsql->num_rows != 0) {
    // output data of each row
    while($row = $runsql->fetch_assoc()) {
       echo "<tr>
                <td>{$row['name']}</td>"
?>
                <td><?php echo ($row['status']<=3)?"&#10004":"&#10006"; ?></td>
                <td><?php echo ($row['status']<=2)?"&#10004":"&#10006"; ?></td>
                <td><?php echo ($row['status']<=1)?"&#10004":"&#10006"; ?></td>
                <td><?php echo ($row['startdate'])?></td>
                <td><?php echo ($row['enddate'])?></td>
            </tr>
<?php
}	
}
?>
    </table>
  </div>
</div>
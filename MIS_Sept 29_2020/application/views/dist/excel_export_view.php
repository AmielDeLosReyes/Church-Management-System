<html>
<head>
    <title>Export Data to Excel in Codeigniter using PHPExcel</title>
    
 <script src="<?php echo base_url(); ?>assets/jquery/2.2.0/jquery.min.js"></script>
 <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/3.3.6/bootstrap.min.css" />
 <script src="<?php echo base_url(); ?>assets/js/3.3.6/bootstrap.min.js"></script>
    
</head>
<body>
 <div class="container box">
  <h3 align="center">Export Data to Excel in Codeigniter using PHPExcel</h3>
  <br />
  <div class="table-responsive">
   <table class="table table-bordered">
    <tr>
     <th>Row</th>
     <th>Name</th>
     <th>Network</th>
     <!-- <th>Designation</th>
     <th>Age</th> -->
    </tr>
    <?php
    $rowCount = 1;
    foreach($eventAttendees as $row)
    {
     
     echo '
     <tr>
      <td>'. $rowCount .'</td>
      <td>'.$row->LAST_NAME.'</td>
      <td>'.$row->FIRST_NAME.'</td>
      <td>'.$row->NETWORK.'</td>
     </tr>
     ';
    $rowCount++;
    }
    ?>
   </table>
   <div align="center">
    <form method="post" action="<?php echo base_url(); ?>Events/exportExcel">
     <input type="submit" name="export" class="btn btn-success" value="Export" />
    </form>
   </div>
   <br />
   <br />
  </div>
 </div>
</body>
</html>
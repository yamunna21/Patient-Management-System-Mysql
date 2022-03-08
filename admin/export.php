<?php  
//export.php  
include('../class/Appointment.php');
$output = '';
if(isset($_POST["export"]))
{
 $query = "SELECT * FROM doctor_appointment order by 1 desc";
 $result = mysqli_query($con, $query);
 if(mysqli_num_rows($result) > 0)
 {
  $output .= '
   <table class="table" bordered="1">  
                    <tr>  
                         <th>S.L</th> 
                         <th>Patient ID</th>  
                         <th>Patient Name</th>  
                         <th>Patient Images</th>  
                         <th>Patient Phone Number</th>  
                         <th>Patient Address</th>  
                    </tr>
  ';
  $i = 0;
  while($row = mysqli_fetch_array($result))
  {
    $sl = ++$i;
   $output .= '
    <tr>  
                         <td > '.$sl.' </td>
                         <td>'.$row["patient_id"].'</td>  
                         <td>'.$row["patient_name"]  .$row["u_l_name"].'</td>  
                         <td>'.$row["patient_profile_image"].'</td>  
                         <td>'.$row["patient_phone_no"].'</td>  
                         <td>'.$row["patient_address"].'</td>  
                    </tr>
   ';
  }
  $output .= '</table>';
  header('Content-Type: application/xls');
  header('Content-Disposition: attachment; filename=FACID_Data.xls');
  echo $output;
 }
}
?>
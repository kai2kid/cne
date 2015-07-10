<?php 
  $rows = "";
  $data = $model->directory();
  foreach($data as $row ) {
    $tmp2 = explode(" - ",$row['route_title']);
    $tmp[] = $tmp2[0];
    $tmp[] = $tmp2[count($tmp2)-1];
    foreach ($tmp as $t) {
      $t = str_replace("ARRIVE","",$t);
      $t = str_replace("AIRPORT","",$t);
      $t = str_replace("FULL DAY","",$t);
      $t = str_replace("HALF DAY","",$t);
      $t = str_replace("TOUR","",$t);
      $t = str_replace("NO DRIVER","",$t);
      $t = str_replace("NO GUIDE","",$t);
      $t = str_replace(")","",$t);
      $t = str_replace("(","",$t);
      $t = trim($t);
      if ($t != "") {
        $rows[$t] = 1;
      }
    }
    
  }
  ksort($rows);
?>

<table border="1">
  <tr>
    <th>Location</th>
  </tr>
  <?php
    $ctr = 1; 
    foreach($rows as $key => $value) {
      $code = "LO" . str_pad($ctr++,4,"0",STR_PAD_LEFT);
      echo "<tr>";
        echo "<td>";
          echo $key;
        echo "</td>";
      echo"</tr>";
    }
  ?>
</table>

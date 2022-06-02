<?php
  // codes for the selection of set type

  include 'DBConnector.php';

  $sql = "SELECT * FROM stay_type";                                             // get the details for every set
  $result = $conn -> query($sql);

  // when done successfully
  if ($result -> num_rows > 0) {
    // print the set name together with their prices
    while ($row = $result -> fetch_assoc()) {
      echo "<option value ='".$row['Set_Type']."'>".$row['StayType']." - P".$row['Price']."</option>";
    }
  } else {
    echo "0 results";
  }

  $conn -> close();
?>

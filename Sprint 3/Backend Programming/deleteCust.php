<?php
  // codes to deleting the current entry in the customer and booking tables
  // this runs if the customers change their minds and cancel the pre-added booking details

  include 'DBConnector.php';
  session_start();

  $id = $_SESSION["id"];                                                        // get the id of the customer

  $sql = "DELETE FROM customer
          WHERE CustID='$id';";                                                 // delete the data from the customer table
  $deleteCust = $conn -> query($sql);

  // if deletion was successful
  if ($deleteCust) {
    $sql = "DELETE FROM booking
            WHERE CustID='$id';";                                               // delete the data from the booking table
    $deleteCust = $conn -> query($sql);

    $_SESSION["id"] = Null;                                                     // resets the session with id attribute
    header("Location:Book Now.php");                                            // go back to Book Now Page
  } else {
    echo "Error ".$sql . "<br/>" . $conn -> error;
  }

 ?>

<?php
  // codes for displaying the form with the currently added details for the bookings

  include 'DBConnector.php';
  session_start();

  $id = $_SESSION["id"];                                                        // get the id of the customer

  $sql = "SELECT *
          FROM customer
          WHERE CustID='$id';";                                                 // get all the data from customer id
  $get_cust = $conn -> query($sql);

  // when done successfully
  if ($get_cust -> num_rows > 0) {
    $value_cust = $get_cust -> fetch_assoc();                                   // use fetch so we can echo/print the data

    $query = "SELECT *
              FROM booking
              WHERE CustID='$id';";                                             // get all the data from booking id
    $get_booking = $conn -> query($query);

    // when done successfully
    if ($get_booking -> num_rows > 0) {
      $value_booking = $get_booking -> fetch_assoc();                           // use fetch so we can echo/print the data

      // displays the form with the saved data 
      echo "<form action='deleteCust.php' method='post'>".
          "<div class='info-form'>".
            "<h1>Reservation Details</h1>".
            "<div class='form-field'>".
              "<label for='name'>Full Name</label>".
              "<input type='text' id='name' value='".$value_cust["CustName"]."'>".
            "</div>".
            "<div class='form-field'>".
              "<label for='email'>Contact Number</label>".
              "<input type='text' id='email' value='".$value_cust["CustNo"]."'>".
            "</div>".
            "<div class='form-field'>".
              "<label for='adr'>Address</label>".
              "<input type='text' id='adr' value='".$value_cust["CustAddress"]."'>".
            "</div>".
            "<div class='form-field'>".
              "<label for='date'>Stay Date</label>".
              "<input type='date' value='".$value_booking["StayDate"]."'>".
            "</div>".
            "<div class='form-field'>".
              "<p>No. of Guest</p>".
              "<input type='number' value='".$value_booking["GuestNo"]."'>".
            "</div>".
            "<div class='form-field'>".
              "<p>Stay Type</p>".
              "<select class='expand' value='".$value_booking["Set_Type"]."'>".
                "<option value='' disabled=''>--Select Set--</option>";
                include 'allChoices.php';
              echo "</select>".
            "</div>".
            "<div class='submit'>".
              "<input type='text' style='display:none;' name='CustID' value='".$_SESSION['id']."'>".
              "<button type='cancel' name='disregard_change' class='btn'>Cancel</button>".
            "</div>".
          "</div>".
        "</form>";
    }
  } else {
    echo "0 results";
  }
?>

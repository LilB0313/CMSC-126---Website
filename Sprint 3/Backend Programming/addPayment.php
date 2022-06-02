<?php
  // code for adding the Payment Detail (in person or thru credit card) into the database

  include 'DBConnector.php';
  session_start();

  $pay = $_POST["payment"];                                                     // get the data needed for the insertion
  $id = $_SESSION["id"];
  $total = $_SESSION["total"];

  // if the users wants to pay in person
  if ($pay == 1) {
    $query = "INSERT INTO transaction (CustID, PaymentType, CardNo, Cost)
              VALUES ('$id', 'In Person', Null, '$total');";                    // add these details into the transaction table
    $save_transaction = $conn -> query($query);
  }

  // if they wish to pay via credit card
  if ($pay == 2) {
    $card = $_POST["cardname"];                                                 // get the card's information
    $number = $_POST["cardnumber"];                                             // data used for the insertion for the card tabel
    $month = $_POST["expmonth"];
    $year = $_POST["expyear"];
    $cvv = $_POST["cvv"];

    $sql = "INSERT INTO card (CardNo, CardName, ExpMonth, ExpYear, CVV)
            VALUES ('$number', '$name', '$month', '$year', '$cvv');";           // insert the data into the crad table
    $save_card = $conn -> query($sql);

    // if insertion was done successfully
    if ($save_card) {
      $query = "INSERT INTO transaction (CustID, PaymentType, CardNo, Cost)
                VALUES ('$id', 'Credit', '$number', '$total');";                // add these details into the transaction table
      $save_transaction = $conn -> query($query);
    }
  } else {
    echo "Failed to process.";
  }

  // after the transaction process was don successfully
  // proceed to the Booked page
  header("Location:Booked.php");

 ?>

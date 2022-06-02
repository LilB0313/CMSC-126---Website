<?php
  // code for adding Customer Details and Booking Details into their respective tables
  // also calculates for the total bill of the reservation

  include 'DBConnector.php';
  session_start();

  // get the date for reservation
  $date = $_POST["date"];

  // check if there are any exisitng bookings on that day
  $check = "SELECT StayDate
            FROM booking
            WHERE StayDate='$date';";
  $is_booked = $conn -> query($check);

  // if there is
  if ($is_booked -> num_rows > 0) {
    echo "<section class='features'>".
        "<h4>Sorry, Date Already Booked!</h4><br>".
      "</section>";
  } else {                                                                      // if the date they set is free
    $name = $_POST["name"];                                                     // get the data for the customer table
    $number = $_POST["number"];
    $address = $_POST["address"];

    $sql = "INSERT INTO customer (CustID, CustName, CustAddress, CustNo)
            VALUES (NULL, '$name', '$address', '$number');";                    // CustID is null because it is automatically incremented in the database (primary key)
    $save_cust = $conn -> query($sql);                                          // add it into the table

    // if the insertion of customer detail was successful
    if ($save_cust) {
      $last_id = $conn -> insert_id;                                            // get the data for the booking table
      $date = $_POST["date"];
      $stay = $_POST["stay"];
      $guest_no = $_POST["guest_no"];

      $_SESSION["id"] = "$last_id";                                             // save the CustID into a session as a place holder

      $query = "INSERT INTO booking (CustID, Set_Type, GuestNo, StayDate)
                VALUES ('$last_id', '$stay', '$guest_no', '$date');";           // add the data into the booking table
      $save_booking = $conn -> query($query);

      // if the insertion of booking detail was successful
      if ($save_booking) {
        $search = "SELECT Price, MaxPeople
                FROM stay_type
                WHERE Set_Type='$stay';";                                       // get the price and maximum number of people from the stay_type table
        $details = $conn -> query($search);                                     // the Set_Type is that of the customer's reservation

        // if the details were retrieved successfully
        if ($details) {
          $check_max = $details -> fetch_assoc();
          $max = $check_max["MaxPeople"];                                       // fetch these data
          $price = $check_max["Price"];

          // if the guest_no indicated by the users exceed the limit
          if ($guest_no > $max) {
            $add_on_guest = $guest_no - $max;                                   // count the number of extra people
            $add_on = $add_on_guest * 75;                                       // by default, the entrance fee is 75 pesos
            $total = $price + $add_on;                                          // add this to get the total bill of the customer

            $_SESSION["total"] = "$total";                                      // save the total in a session

            // if it is within the range
          } else {
            $_SESSION["total"] = "$price";                                      // save the total in a session
          }
        }
      }

      header("Location:reservation.php");                                       // go to the reservation page to continue the booking

    } else {
      echo "Error ".$sql . "<br/>" . $conn -> error;                            // runs if error was encountered
    }
  }
 ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Agahay Guesthouse Resort - Booking</title>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="OverAllStyle.css" type="text/css">
    <link rel="stylesheet" href="Booking.css" type="text/css">
    <link rel="stylesheet" href="CheckOut.css" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>

  <body>
    <!-- header -->
    <header>
      <div class="logo">
        <img src="images file\Logo.jpg">
      </div>
      <span>Agahay Guesthouse Resort</span>

      <!-- navigation -->
      <nav class="nav-links">
        <ul>
          <li><a href='Home Page.html'>Home</a></li>
          <li><a href='Booking Page.html'>Booking</a></li>
          <li><a href='Amenities Page.html'>Amenities</a></li>
          <li><a href='Home Page.html #About'>About Us</a></li>
          <button id="btn1" class="button">Book Now</button>
        </ul>
      </nav>
      <!-- end of navigation -->

    </header>
    <!-- end of header -->

    <!-- form for verification and transaction -->
    <div class="container" style="top:150px;">
      <?php
        include 'displayCust.php';                                              // displays the customer's details
       ?>

       <!-- the form for transaction -->
       <form action="http://localhost/website/addPayment.php" method="post">
         <div class="payment-form">
           <h1>Payment</h1>
           <div class="form-field">
             <label for="type">Payment Type</label>
             <label for="fname">Total Bill</label>
           </div>
           <div class="form-field">
             <select class="expand" name="payment">
               <option value="" disabled="">-- Select a Set Plan --</option>
               <option value="1">Pay in Person</option>
               <option value="2">Pay via Credit Card</option>
             </select>
             <?php
               $total = $_SESSION["total"];
               echo "P ".$total;
             ?>
           </div>

          <!-- this form is for the customer's card details -->
          <!-- for payment in person, the users can just skip this part -->
          <section class="credit">
            <h4>Credit Card Details</h4>
            <div class="form-field">
              <label for="cname">Name on Card</label>
              <input type="text" id="cname" name="cardname" placeholder="Enter Name">
            </div>
            <div class="form-field">
              <label for="ccnum">Credit Card Number</label>
              <input type="text" id="ccnum" name="cardnumber" placeholder="Enter Card Number">
            </div>
            <div class="form-field">
              <label for="expmonth">Exp Month</label>
              <input type="text" id="expmonth" name="expmonth" placeholder="Enter Month">
            </div>
            <div class="form-field">
              <label for="expyear">Exp Year</label>
              <input type="text" id="expyear" name="expyear" placeholder="Enter Year">
            </div>
            <div class="form-field">
              <label for="cvv">CVV</label>
              <input type="text" id="cvv" name="cvv" placeholder="Enter Pin">
            </div>
          </section>
        </div>

        <div class="submit">
          <button type="submit" name="reserve_stay" class="btn">Reserve Stay</button>
        </div>
      </form>
    </div>
    <!-- end of forms -->

    <!-- the footer -->
    <footer class="contactus" style="top: 200px;">
      <h2>Contact Us</h2>
      <!-- links and resort info -->
      <ul>
        <a href="http://fb.com/agahayguesthouse">
          <img src="images file\icon 1.png">
        </a>
        <li><a href='http://fb.com/agahayguesthouse'>http://fb.com/agahayguesthouse</a></li>
        <img src="images file\icon 2.png">
        <li>09988848418</li>
        <img src="images file\icon 3.jpg">
        <li>renzad@yahoo.com</li>
      </ul>

      <span><i>© 2022 by Agahay Guesthouse</i></span>
    </footer>
    <!-- end of footer-->
    <script src="btn.js" type="text/javascript"></script>
    <script src="reserve.js" type="text/javascript"></script>
  </body>
</html>

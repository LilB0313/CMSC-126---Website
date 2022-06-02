<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Agahay Guesthouse Resort - Booking</title>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="OverAllStyle.css" type="text/css">
    <link rel="stylesheet" href="Booking.css" type="text/css">
    <link rel="stylesheet" href="Gallery.css" type="text/css">
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

    <!-- fixed background -->
    <div id="slider">
      <ul id="slideWrap">
        <li><img src="images file\cover1.jpg" alt=""></li>
        <li><img src="images file\img 21.jpg" alt=""></li>
        <li><img src="images file\img 3.jpg" alt=""></li>
        <li><img src="images file\img 15.jpg" alt=""></li>
        <li><img src="images file\img 23.jpg" alt=""></li>
      </ul>

      <a id="prev" class="prev">&#10094;</a>
      <a id="next" class="next">&#10095;</a>
    </div>

    <!-- the form that contains the info of the guesthouse -->
    <div class="container">

      <!-- contains the details of the transaction and the customers reference id -->
      <div class="container-time">
        <h1>Transaction Details</h1>
        <hr>
        <?php
          session_start();

          $id = $_SESSION["id"];

          echo "<p><br>Thank you for your Patronage!</p>".
          "<p>Please note, your Customer Reference ID is ", $id, "</p><br>".
          "<p>This ID can be used for any future changes.</p>".
          "<p>For cancelation of reservation, contact us immediately.</p>".
          "<p>We cannot wait for your visit.</p><br>";
         ?>
        <hr>
       <br><h4>Call Us: 09988848418</h4>
      </div>

      <!-- holds the form for the entry of customer details -->
      <div class="container-form">
        <form action="http://localhost/website/addCust.php" method="post">
          <h1>Book Your Stay</h1>
          <div class="form-field">
            <p>Full Name</p>
            <input type="text" placeholder="Enter Name" name="name">
          </div>
          <div class="form-field">
            <p>Contact Number</p>
            <input type="text" placeholder="Enter Number" name="number">
          </div>
          <div class="form-field">
            <p>Address</p>
            <input type="text" placeholder="Enter Address" name="address">
          </div>
          <div class="form-field">
            <p>Stay Date</p>
            <input type="date" name="date">
          </div>
          <div class="form-field">
            <p>No. of Guest</p>
            <input type="number" placeholder="Enter Number" name="guest_no">
          </div>
          <div class="form-field">
            <p>Stay Type</p>
            <select class="expand" name="stay">
              <option value="" disabled="">-- Select a Set Plan --</option>
              <?php
                include 'allChoices.php';                                       // gets the list of sets available
              ?>
              <option value="" disabled="">-- Descriptions are in About Us --</option>
            </select>
          </div>
          <button type="submit" id="btn3" name="book">Book Now</button>
        </form>
      </div>
    </div>
    <!-- end of form -->

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
    <script src="slider.js" type="text/javascript"></script>
    <script src="book.js" type="text/javascript"></script>
  </body>
</html>

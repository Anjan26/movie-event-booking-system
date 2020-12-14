<?php
session_start();
$conn = new mysqli("localhost", "root","","interim");

if($conn->connect_error){
    die("connection error");
}
if(strlen($_SESSION['login'])==0){
    header('Location: login.php');
}

$email = $_SESSION['login'];
$account_query = "select * from users where email='$email'";
 $account_view = $conn ->query($account_query);
 while ($row = $account_view->fetch_assoc()){
   $name=$row['name'];
 }
?>



<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.1/css/bootstrap.min.css" integrity="sha384-VCmXjywReHh4PwowAiWNagnWcLhlEJLA5buUprzK8rxFgeH0kww/aWY76TfkUoSX" crossorigin="anonymous">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Macondo&display=swap" rel="stylesheet">
    <!-- footer part -->
    <link rel="stylesheet" type="text/css" href="footer/footer.css">

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.1/js/bootstrap.min.js" integrity="sha384-XEerZL0cuoUbHE4nZReLT7nx9gQrQreJekYhJD9WNWhH8nEW+0c5qq7aIo2Wl30J" crossorigin="anonymous"></script>

    <title>Booking Details</title>
  <link rel="shortcut icon" type="image/x-icon" href="../images/logo5.png" />
</head>

<style>
    .nav-link:hover {
        /* text-decoration: underline; */
        background-color: #006666;
        border-radius: 5px;
    }
    
    body {
        background-color: #ccccff;
    }
    
@media
only screen and (max-width: 760px), (min-device-width: 768px) 
  and (max-device-width: 1024px)   {
  table, thead, tbody, th, td, tr {
    display: block;
  }
  thead tr {
    position: absolute;
    top: -9999px;
    left: -9999px;
  }
  tr { border: 1px solid #ccc; }
  td {
    border: none;
    border-bottom: 1px solid #eee;
    position: relative;
    padding-left: 200px;
    margin-left: 150px;
  }
  td:before {
    position: absolute;
    top: 12px;
    left: 6px;
    width: 200px;
    padding-right: 40px;
    white-space: nowrap;
    margin-left: -150px;
  }
  td:nth-of-type(1):before { content: "#"; }
  td:nth-of-type(2):before { content: "Ticket Id"; }
  td:nth-of-type(3):before { content: "Name"; }
  td:nth-of-type(4):before { content: "Movie";}
  td:nth-of-type(5):before { content: "City"; }
  td:nth-of-type(6):before { content: "Theatre"; }
  td:nth-of-type(7):before { content: "Date "; }
  td:nth-of-type(8):before { content: "Time";}
  td:nth-of-type(9):before { content: "Seat"; }
  td:nth-of-type(10):before { content: "Amount"; }
  td:nth-of-type(8):before { content: "Print";}
}

    
    </style>
    <body>
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #13B2B8; padding-left:25px; width: 100%;">
        <a class="navbar-brand" href="index1.php" style="font-family: 'Poppins', sans-serif; font-size: 1.5vw; color: black;"><img src="../images/logo5.png" style="width: 7%;">&nbsp <b>Trend Talkies</b><br>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">

            <ul class="navbar-nav ml-auto">
                
                <li class="nav-item">
                    <a class="nav-link" href="index1.php" style="margin-right: 20px; font-weight: bold;color: white; ">Movies/Events </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="view_review&rating.php" style="margin-right: 20px; font-weight: bold;color: white;">Review&Rating</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contactus1.php" style="margin-right: 20px; font-weight: bold;color: white;">Contact Us</a>
                </li>
                <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"style="margin-right: 67px; font-weight: bold;color: white;font-family: 'Macondo', cursive;">
                <?php echo "$name"?>
                 </a>
                 <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <a class="dropdown-item" href="updateprofile.php">Update Profile</a>
                <a class="dropdown-item" href="booking_details.php">Bookings</a>
                <a class="dropdown-item" href="review_rating1.php">Give Review</a>
                <a class="dropdown-item" href="logout.php">Sign Out</a>
                </div>
                </li>

            </ul>
        </div>
    </nav>


    <br> 
    
    <div class="container">
        <h1 class="mt-4 mb-3" style="font-family: 'Poppins', sans-serif;">Booking Details</h1>

        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="index1.php">Home</a>
            </li>
            <li class="breadcrumb-item active">Ticket Information</li>
        </ol>
       
            <div style="background-color: #ffbb99;  padding: 2%; border-radius: 5px;">
                <div class="column">
                    <h4 style="font-family: 'Poppins', sans-serif;"><u>Movie Booking Details</u></h4>
                    <br>

                    
                    
				    <div class="panel-body"  style="padding: 2%; border-radius: 10px; border: 1px solid #00b3b3;">
                    <table role="table" class="table-striped table-bordered" style="width: 100%;" >
                      
									<thead role="rowgroup">
										<tr role="row">
                                            <th role="columnheader">#</th>
                                            <th role="columnheader">Ticket Id</th>
											<th role="columnheader">Name</th>
											<th role="columnheader">Movie</th>
											<th role="columnheader">City</th>
											<th role="columnheader">Theatre</th>
											<th role="columnheader">Date</th>
                                            <th role="columnheader">Time</th>
                                            <th role="columnheader">Seat</th>
                                            <th role="columnheader">Amount</th>
                                            <th role="columnheader">Print</th>
											
										</tr>
									</thead>
									
                                    <tbody role="rowgroup">
                                    <?php

                                    

                                        $query = "select * from booking_movie where email='$email'  ";
                                        $result = $conn->query($query);
                                        $cnt=1;
                                
                                    

                                        while($row = $result->fetch_assoc()){
                                        echo "<tr role='row'>";
                                        echo "<td role='cell'>$cnt</td>";
                                        echo "<td role='cell'>".$row["ticket_id"]."</td>";
                                        echo "<td role='cell'>".$row["customer_name"]."</td>";
                                        echo "<td role='cell'>".$row["movie_name"]."</td>";
                                        echo "<td role='cell'>".$row["city_name"]."</td>";
                                        echo "<td role='cell'>".$row["theatre_name"]."</td>";
                                        echo "<td role='cell'>".$row["date"]."</td>";
                                        echo "<td role='cell'>".$row["show_time"]."</td>";
                                        echo "<td role='cell'>".$row["no_of_seats"]."</td>";
                                        echo "<td role='cell'>".$row["amount"]."</td>";
                                        echo '<td><a  href="print.php?id='.$row['id'].'" ><input type="button" class="btn btn-light" name="print" value="Print"></a></td>';
                                
                                            
                                        echo"</tr>";
                                        
                                        ?>
                                    <?php $cnt=$cnt+1; } ?>  

                       
                                </tbody>
                            </table>
                      </div>
                </div>
                <br>
                <br>
                <br>

                <div class="column">
                    <h4 style="font-family: 'Poppins', sans-serif;"><u>Event Booking Details</u></h4>
                    <br>

                    
                    
				    <div class="panel-body"  style="padding: 2%; border-radius: 10px; border: 1px solid #00b3b3;">
                    <table role="table" class="table-striped table-bordered" style="width: 100%;" >
                      
									<thead role="rowgroup">
										<tr role="row">
                                            <th role="columnheader">#</th>
                                            <th role="columnheader">Ticket Id</th>
											<th role="columnheader">Name</th>
											<th role="columnheader">Event</th>
											<th role="columnheader">Type</th>
											<th role="columnheader">Location</th>
											<th role="columnheader">Date</th>
                                            <th role="columnheader">Time</th>
                                            <th role="columnheader">Seat</th>
                                            <th role="columnheader">Amount</th>
                                            <th role="columnheader">Print</th>
											
										</tr>
									</thead>
									
                                    <tbody role="rowgroup">
                                    <?php

                                    

                                        $query = "select * from booking_event where email='$email'  ";
                                        $result = $conn->query($query);
                                        $cnt=1;
                                
                                    

                                        while($row = $result->fetch_assoc()){
                                        echo "<tr role='row'>";
                                        echo "<td role='cell'>$cnt</td>";
                                        echo "<td role='cell'>".$row["ticket_id"]."</td>";
                                        echo "<td role='cell'>".$row["customer_name"]."</td>";
                                        echo "<td role='cell'>".$row["event_name"]."</td>";
                                        echo "<td role='cell'>".$row["event_type"]."</td>";
                                        echo "<td role='cell'>".$row["location"]."</td>";
                                        echo "<td role='cell'>".$row["date"]."</td>";
                                        echo "<td role='cell'>".$row["time"]."</td>";
                                        echo "<td role='cell'>".$row["no_of_seats"]."</td>";
                                        echo "<td role='cell'>".$row["amount"]."</td>";
                                        echo '<td><a  href="print.php?id='.$row['id'].'" ><input type="button" class="btn btn-light" name="print" value="Print"></a></td>';
                                
                                            
                                        echo"</tr>";
                                        
                                        ?>
                                    <?php $cnt=$cnt+1; } ?>  

                                    
                                    </tbody>
                                </table>
                                </div>
                            </div>
        
    </div>
    </div>
    <br>
    <br>
    <br>

    <?php
        include('footer/footer.php');      
    ?>
<script src="https://kit.fontawesome.com/d03fa9b461.js" crossorigin="anonymous"></script>
 
</body>
</html>
<?php
session_start();
$conn = new mysqli("localhost", "root","","interim");

if($conn->connect_error){
    die("connection error");
}
if(strlen($_SESSION['login'])==0){
    header("location: index.php");

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
    
    <link href="https://fonts.googleapis.com/css2?family=Bree+Serif&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Metal+Mania&family=Original+Surfer&display=swap" rel="stylesheet">
    

    <!-- Sidenav CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.0/animate.min.css">
    <script src="https://kit.fontawesome.com/d03fa9b461.js" crossorigin="anonymous"></script>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.1/js/bootstrap.min.js" integrity="sha384-XEerZL0cuoUbHE4nZReLT7nx9gQrQreJekYhJD9WNWhH8nEW+0c5qq7aIo2Wl30J" crossorigin="anonymous"></script>
   
   
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">

  <!-- Custom styles for this template -->
  <!-- <link href="css/simple-sidebar.css" rel="stylesheet"> -->
  <meta name="description" content="">
  <meta name="author" content="">
   <title>Manage Query</title>
  <link rel="shortcut icon" type="image/x-icon" href="../images/logo5.png" />
    
</head>
<style>
    
    #wrapper {
    overflow-x: hidden;
 }

#sidebar-wrapper {
  min-height: 100vh;
  margin-left: -15rem;
  -webkit-transition: margin .25s ease-out;
  -moz-transition: margin .25s ease-out;
  -o-transition: margin .25s ease-out;
  transition: margin .25s ease-out;
}

#sidebar-wrapper .sidebar-heading {
  padding: 0.875rem 1.25rem;
  font-size: 1.2rem;
}

#sidebar-wrapper .list-group {
  width: 15rem;
}

#page-content-wrapper {
  min-width: 100vw;
}

#wrapper.toggled #sidebar-wrapper {
  margin-left: 0;
}

@media (min-width: 768px) {
  #sidebar-wrapper {
    margin-left: 0;
  }

  #page-content-wrapper {
    min-width: 0;
    width: 100%;
  }

  #wrapper.toggled #sidebar-wrapper {
    margin-left: -15rem;
  }
}
#list{
    background-color: #13B2B8; 
    color: black;
}
#list:hover{    
    background-color: #ccccff;          
    }




/*
	Max width before this PARTICULAR table gets nasty. This query will take effect for any screen smaller than 760px and also iPads specifically.
	*/
	@media
	  only screen 
    and (max-width: 760px), (min-device-width: 768px) 
    and (max-device-width: 1024px)  {

		/* Force table to not be like tables anymore */
		table, thead, tbody, th, td, tr {
			display: block;
      
      
      
		}

		/* Hide table headers (but not display: none;, for accessibility) */
		thead tr {
			position: absolute;
			top: -9999px;
			left: -9999px;
		}

    tr {
      margin: 0 0 1rem 0;
      
    }
      
    tr:nth-child(odd) {
      background: #ccc;
    }
    
		td {
			/* Behave  like a "row" */
			
			border-bottom: 1px solid #eee;
			position: relative;
			padding-left: 50%;
    
		}

		td:before {
			/* Now like a table header */
			position: absolute;
			/* Top/left values mimic padding */
			top: 0;
			left: 6px;
			width: 45%;
			padding-right: 10px;
			white-space: nowrap;
		}

		/*
		Label the data
    You could also use a data-* attribute and content for this. That way "bloats" the HTML, this way means you need to keep HTML and CSS in sync. Lea Verou has a clever way to handle with text-shadow.
		*/
    td:nth-of-type(1):before { content: "#"; }
    td:nth-of-type(2):before { content: "Ticket Id"; }
		td:nth-of-type(3):before { content: "Name"; }
		td:nth-of-type(4):before { content: "Movie"; }
		td:nth-of-type(5):before { content: "City"; }
		td:nth-of-type(6):before { content: "Theatre"; }
		td:nth-of-type(7):before { content: "Date"; }
		td:nth-of-type(8):before { content: "Time"; }
    td:nth-of-type(9):before { content: "Seat"; }
		td:nth-of-type(10):before { content: "Amount"; }
    
	}


</style>

<body style="background-color: #ccccff;">

   
<div class="d-flex" id="wrapper">

<!-- Sidebar -->
<div class=" border-right" id="sidebar-wrapper"  style="background-color: #13B2B8;">
  <div class="sidebar-heading" style="color:black;"><u><b>Contents </b></u></div>
  <div class="list-group list-group-flush">
    <a href="dashboard.php" class="list-group-item list-group-item-action" id="list"><i class="fas fa-tachometer-alt"></i>&nbsp Dashboard</a>
    <a href="movieslist.php" class="list-group-item list-group-item-action" id="list"><i class="fas fa-list-ol"></i>&nbsp Movies List</a>
    <a href="eventslist.php" class="list-group-item list-group-item-action" id="list"><i class="fas fa-list-ol"></i>&nbsp Events List</a>
    <a href="theatrelist.php" class="list-group-item list-group-item-action" id="list"><i class="fas fa-desktop"></i>&nbsp Theatre List</a>
    <a href="user_bookings.php" class="list-group-item list-group-item-action" id="list"><i class="fas fa-users"></i>&nbsp User Bookings</a>
    <a href="managequery.php" class="list-group-item list-group-item-action" id="list"><i class="far fa-question-circle"></i>&nbsp Manage Query</a>
    <a href="changepassword.php" class="list-group-item list-group-item-action" id="list"><i class="fas fa-eye"></i>&nbsp Change Password</a>
    <a href="logout.php" class="list-group-item list-group-item-action" id="list"><i class="fas fa-power-off"></i>&nbsp Logout</a>
  </div>
</div>
<!-- /#sidebar-wrapper -->

<!-- Page Content -->
<div id="page-content-wrapper">

  <nav class="navbar navbar-expand-lg navbar-light border-bottom" style="background-color: #13B2B8;">
    <button class="btn btn-light" id="menu-toggle">Menu</button>

    <a class="navbar-brand" href="#" style="font-family: 'Poppins', sans-serif; font-size: 1.5vw; color: black;"><img src="../images/logo5.png" style="width: 7%; margin-left:2%;">&nbsp <b>Trend Talkies</b>
        </a>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
       
      </ul>
    </div>
  </nav>

<div class="container-fluid">
    <div class="row">
      
    <!--FOR EVENTS-->
		<div class="col-md-12">
            <h2 class="page-title" style="width:80%; padding:0.5%;margin-top:2%; padding-left: 1%; background-color:#336699;border-radius: 10px; box-shadow: 5px 5px #888888;color:#ffffcc;">Manage Query</h2><br>
            <div class="panel panel-default">
        <div class="panel-heading" style="font-size: 150%; margin-left:1%;font-family: 'Poppins', sans-serif;"><b>Movies Bookings Details</b></div><hr>
       
        <br>

				    <div class="panel-body"  style="padding: 2%; border-radius: 10px; border: 1px solid #00b3b3;">
                    <table role="table" class="table-striped table-bordered" style="width: 100%;" >
                      
									<thead role="rowgroup">
										<tr role="row">
                    <th role="columnheader">#</th>
                    <th role="columnheader">Ticket Id</th>
											<th role="columnheader">Name</th>
											<th role="columnheader">Movie Name</th>
											<th role="columnheader">City</th>
											<th role="columnheader">Theatre</th>
											<th role="columnheader">Date</th>
                      <th role="columnheader">Time</th>
                      <th role="columnheader">Seat</th>
											<th role="columnheader">Amount</th>
											
										</tr>
									</thead>
									
									<tbody role="rowgroup">
                    <?php

                        $query = "select * from booking_movie";
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
                   
                        echo"</tr>";
                        
                         ?>
                      <?php $cnt=$cnt+1; } ?>  

                       
                     </tbody>
                </table>

                  </div>
            </div>
        </div>

        <!--FOR EVENTS-->
        <div class="col-md-12"> 
            <div class="panel panel-default">
              <br>
        <div class="panel-heading" style="font-size: 150%; margin-left:1%;font-family: 'Poppins', sans-serif;"><b>Events Bookings Details</b></div><hr>
        
        <br>

				    <div class="panel-body"  style="padding: 2%; border-radius: 10px; border: 1px solid #00b3b3;">
                    <table role="table" class="table-striped table-bordered" style="width: 100%;" >
                      
									<thead role="rowgroup">
										<tr role="row">
                    <th role="columnheader">#</th>
                    <th role="columnheader">Ticket Id</th>
											<th role="columnheader">Name</th>
											<th role="columnheader">Event Name</th>
                      <th role="columnheader">Event Type</th>
                      <th role="columnheader">Location</th>
											<th role="columnheader">Date</th>
                      <th role="columnheader">Time</th>
                      <th role="columnheader">Seat</th>
											<th role="columnheader">Amount</th>
											
										</tr>
									</thead>
									
									<tbody role="rowgroup">
                    <?php

                        $query = "select * from booking_event";
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
 
                        echo"</tr>";
                        
                         ?>
                      <?php $cnt=$cnt+1; } ?>  

                       
                     </tbody>
                </table>

               

                  </div>
            </div>
        </div>
    </div>
</div>



  <script>
$("#menu-toggle").click(function(e) {
  e.preventDefault();
  $("#wrapper").toggleClass("toggled");
});
</script>
</body>
</html>

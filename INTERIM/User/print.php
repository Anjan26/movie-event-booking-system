<?php
session_start();
$conn = new mysqli("localhost", "root","","interim");

if($conn->connect_error){
    die("connection error");
}
if(strlen($_SESSION['login'])==0){
    header('Location: login.php');
}
?>
<?php
$email = $_SESSION['login'];
$account_query = "select * from users where email='$email'";
 $account_view = $conn ->query($account_query);
 while ($row = $account_view->fetch_assoc()){
   $name=$row['name'];
 }
//For Movie
$id=$_GET['id'];	
$res=("select * from booking_movie where id='$id'");
$res = $conn ->query($res);
 while ($row = $res->fetch_assoc()){
  }

//For Event
$id=$_GET['id'];	
$res=("select * from booking_event where id='$id'");
$res = $conn ->query($res);
 while ($row = $res->fetch_assoc()){
  }
?>

<html>
    <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Print Ticket</title>
        <link rel="shortcut icon" type="image/x-icon" href="../images/logo5.png" />
        <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Macondo&display=swap" rel="stylesheet">


    <style>
            th{
                text-align: left;
            }
            td{
                text-align: justify;
            }
    </style>
    </head>
<body>
    <form method="post" action="" id="myfrm">
        <fieldset>
        <legend style="text-align: center;"><b>E-ticket: Printout Not Required</b></legend>

    <div style="background-color: #13B2B8; border-radius: 5px;">
        <img src="../images/logo5.png" style="width: 5%; vertical-align:middle; margin-left: 2%;">
        <h3 style="display:inline-block;font-family: 'Poppins', sans-serif;">Trend Talkies</h3>
    </div>
    
<br>
<br>

<div class="container-fluid">
    <div class="row">
		<div class="col-md-12">
            <div class="panel panel-default">
        <div class="panel-heading" style="font-size: 150%; margin-left:1%;font-family: 'Poppins', sans-serif;"><b>Ticket Details </b></div><hr>
        
            <div class="panel-body"  style="padding: 2%; border-radius: 10px; border: 1px solid #00b3b3;">
                    <table role="table" class="table-striped table-bordered" style="width: 100%;" >
                      
									<thead role="rowgroup">
										<tr role="row">
                                            <th role="columnheader">#</th>
                                            <th role="columnheader">Ticket Id</th>
											<th role="columnheader">Name</th>
											<th role="columnheader">Show</th>
											<th role="columnheader">Location</th>
											<th role="columnheader">Date</th>
                                            <th role="columnheader">Time</th>
                                            <th role="columnheader">Seat</th>
                                            <th role="columnheader">Amount</th>
											
										</tr>
									</thead>
									
                                    <tbody role="rowgroup">
                                    <?php

                                    
                                        $query = "select * from booking_movie where id='$id'  ";
                                        $result = $conn->query($query);
                                        $cnt=1;
                                
                                    
                                        while($row = $result->fetch_assoc()){
                                        echo "<tr role='row'>";
                                        echo "<td role='cell'>$cnt</td>";
                                        echo "<td role='cell'>".$row["ticket_id"]."</td>";
                                        echo "<td role='cell'>".$row["customer_name"]."</td>";
                                        echo "<td role='cell'>".$row["movie_name"]."</td>";
                                        echo "<td role='cell'>".$row["city_name"].",".$row["theatre_name"]."</td>";
                                        // echo "<td role='cell'>".$row["theatre_name"]."</td>";
                                        echo "<td role='cell'>".$row["date"]."</td>";
                                        echo "<td role='cell'>".$row["show_time"]."</td>";
                                        echo "<td role='cell'>".$row["no_of_seats"]."</td>";
                                        echo "<td role='cell'>".$row["amount"]."</td>";
                                            
                                        echo"</tr>";
                                        
                                        ?>
                                    <?php $cnt=$cnt+1; } ?>  

                       
                                </tbody>
                            </table>
                      
                
                    <table role="table" class="table-striped table-bordered" style="width: 100%;" >
                      
                                    <tbody role="rowgroup">
                                    <?php

                                    

                                        $query = "select * from booking_event where id='$id'  ";
                                        $result = $conn->query($query);
                                        $cnt=1;
                                
                                        while($row = $result->fetch_assoc()){
                                        echo "<tr role='row'>";
                                        echo "<td role='cell'>$cnt</td>";
                                        echo "<td role='cell'>".$row["ticket_id"]."</td>";
                                        echo "<td role='cell'>".$row["customer_name"]."</td>";
                                        echo "<td role='cell'>".$row["event_name"]."</td>";
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

            <p style="font-weight: bold;">Terms and Conditions</p>
            <ul> 
                <li> Dear patron, the baggage counter facility is not available at this cinema. Inconvenience caused is deeply regretted.
                <li>Ticket is compulsory for children of 3 years & above.</li>
                <li>Person below the age of 18 years cannot be admitted for movies certified `A`.</li>
                <li>For 3D movies, ticket price includes charges towards usage of 3D glasses.</li>
                <li>Seat Layout Page for Trend Talkies is for representational purpose only and actual seat layout might vary.</li>
            </ul>

            <p style="font-weight: bold; color:red;">COVID-19: Rules and Regulations</p>
            <ul> 
                <li>Please maintain social distancing as per the Government guidelines.</li>
                <li>Use of face mask is compulsory, without that you would not be allowed to enter inside the hall.</li>
                <li>Follow the sanitization checking process strictly before entering into the hall.</li>
                <li>Please co-operate with our staff.</li>
                
            </ul>
<br>
<hr>
            <p style="font-weight: bold; color:blue; text-align: center;">***THANK YOU FOR YOUR VISIT***</p>
            
        </fieldset>
    <closeform></closeform></form>
    <p align="center"><input type="button" onclick="myPrint('myfrm')" value="print"></p>
    <script>
        function myPrint(myfrm) {
            var printdata = document.getElementById(myfrm);
            newwin = window.open("");
            newwin.document.write(printdata.outerHTML);
            newwin.print();
            newwin.close();
        }
    </script>
</body>
</html>
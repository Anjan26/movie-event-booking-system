<?php
session_start();
$conn = new mysqli("localhost", "root","","interim");

if($conn->connect_error){
    die("connection error");
}
if(strlen($_SESSION['login'])==0){
    header('Location: login.php');
}
$event_id=$_GET['event_id'];	
$res=("select * from events where event_id='$event_id'");
$res = $conn ->query($res);
 while ($row = $res->fetch_assoc()){
    $event_name=$row['event_name'];
    $event_type=$row['event_type'];
    $event_date=$row['event_date'];
    $time=$row['time'];
    $location=$row['location'];
    $cost=$row['cost'];

  }
  
$email = $_SESSION['login'];
$account_query = "select * from users where email='$email'";
 $account_view = $conn ->query($account_query);
 while ($row = $account_view->fetch_assoc()){
   $name=$row['name'];
 }

  
 if(isset($_POST['book']))
     {
         $bookid="BKID".rand(1000,9999);
         $name=$name;
         $email=$email;
         $event_name= $event_name;
         $event_type=$event_type;
         $location=$location;
         $date= $event_date;
         $time=$time;
         $seat=$_POST['seat'];
         $total = $_POST['total'];
       
         $sql="INSERT INTO booking_event (ticket_id,customer_name,email,event_name,event_type,location,date,time,no_of_seats,amount ) values('$bookid','$name','$email',' $event_name',' $event_type','$location','$date','$time','$seat','$total')";

         if (mysqli_query($conn, $sql)) {
            echo"<script>alert('Ticket Booked successfully!');window.location.href = 'booking_details.php'</script>";
      
         } else {
            echo "<b style='color:red;'>Error:</b> <b>Something is wrong!</b>";
         }
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
    <!-- footer part -->
    <link rel="stylesheet" type="text/css" href="footer/footer.css">

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.1/js/bootstrap.min.js" integrity="sha384-XEerZL0cuoUbHE4nZReLT7nx9gQrQreJekYhJD9WNWhH8nEW+0c5qq7aIo2Wl30J" crossorigin="anonymous"></script>

  <!-- CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">

  <title>Event details</title>
  <link rel="shortcut icon" type="image/x-icon" href="../images/logo5.png" />

  <script>
        function myCalculation(){
        var cost = document.getElementById('cost').value; 
        var seat = document.getElementById('seat').value;  
 
        document.getElementById('total').value = cost * seat;        // display the result of your calculation inside the <p>-Element with the id 'display'
        }
        
</script>
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
    </style>
    <body>

    <ol class="breadcrumb" style="background-color: #13B2B8;">
    <li class="breadcrumb-item">
        <a href="index1.php" style="color: black;font-family: 'Poppins', sans-serif;">Home</a>
    </li>
    <li class="breadcrumb-item">
        <a href="logout.php" style="color: black;font-family: 'Poppins', sans-serif;">Signout</a>
    </li>
    <li class="breadcrumb-item active" style="color: white;font-family: 'Poppins', sans-serif;">Event Details</li>
</ol>
<br>
    <div class="container">
		<div class="row">
			<div class="col-xs-12  toppad" >
				<div class="panel panel-info">
					<div class="panel-heading">
						<h3 class="panel-title">
							<?php 

							$event_id=$_GET['event_id'];	
							$_SESSION['event_id']=$event_id;
							$res=$conn->query("select * from events where event_id=$event_id;");
                            $row=$res->fetch_object();
                                                  
                            echo "".$row->event_name;
                            ?>
                            
						</h3>
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-md-4 col-lg-4 " align="center">
								<img alt="User Pic" src=<?php echo '"'.$row->image.'"';?> class=" img-responsive"> 
							</div>
							<div class=" col-md-8 col-lg-8 "> 
								<table class="table table-user-information">
									<tbody>
										<tr>
											<td><strong>Event Name:</strong></td>
											<td><?php echo "".$row->event_name;?> </td>
                                        </tr>
                                        <tr>
											<td><strong>Event Date:</strong></td>
											<td><?php echo "".$row->event_date;	?> </td>
                                        </tr>
                                        <tr>
											<td><strong>Event Time:</strong></td>
											<td><?php echo "".$row->time;	?> </td>
                                        </tr>
                                        <tr>
											<td><strong>Location:</strong></td>
											<td><?php echo "".$row->location;?> </td>
											</tr>
										<tr>
											<td><strong>Genre:</strong></td>
											<td> <?php echo "".$row->event_type;?> </td>
										</tr>
										<tr>
											<td><strong>Description:</strong></td>
											<td><?php echo "".$row->description;?> </td>
                                        </tr>
                                        <tr>
											<td><strong>Cost:</strong></td>
											<td><?php echo "".$row->cost;?> </td>
										</tr>

											</tbody>
										</table>


                                         <!--Select No. Of Seat Part -->
                                        <div class="row">
                                            <form method="post">
                                                <input class="form-control" type="hidden" id="cost" value="<?php echo $cost; ?>">
                                                <input class="form-control" type="number" name="seat" id="seat" placeholder="No.of Seat" onkeyup="myCalculation()" maxlength="1" required oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"  style="margin-left: 8%; width: 40%;">
                                                <b>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspTotal Amount: Rs<input name='total' id='total' style="border: none;margin-left: 8%;"></b>

                                                  <button class="btn btn-danger" type="submit" style="margin-left: 40%;margin-bottom:3% " name="book">Book</button>
                                            
                                            </form>
                                        </div>     
                                    </div>       
                                </div> 
                            </div>                                           
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
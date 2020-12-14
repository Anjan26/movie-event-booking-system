<?php
session_start();
$conn = new mysqli("localhost", "root","","interim");

if($conn->connect_error){
    die("connection error");
}
// if(strlen($_SESSION['login'])==0){
//     header('Location: login.php');
// }
if(!isset($_SESSION['login']))
{
	header('location:login.php');
}
// $movie_id=$_GET['movie_id'];            
// $_SESSION['location']= " ";
// $_SESSION['theatre_name']= "";
// $_SESSION['time']="";
// $_SESSION['date']="";
// $_SESSION['seat']="";
// $_SESSION['amount']="";

$email = $_SESSION['login'];
$account_query = "select * from users where email='$email'";
 $account_view = $conn ->query($account_query);
 while ($row = $account_view->fetch_assoc()){
   $name=$row['name'];
 }
$movie_id=$_GET['movie_id'];	
$res=("select * from movies where movie_id='$movie_id'");
$res = $conn ->query($res);
 while ($row = $res->fetch_assoc()){
    $movie_name=$row['movie_name'];
  }
  
 if(isset($_POST['final']))
     {
         $bookid="BKID".rand(1000,9999);
         $name=$name;
         $email=$email;
         $movie_name=$movie_name;
         $location=$_POST['location'];
         $theatre_name=$_POST['theatre_name'];
         $date=$_POST['date'];
         $time=$_POST['time'];
         $seat=$_POST['seat'];
         $total = $_POST['total'];
       
         $sql="INSERT INTO booking_movie (ticket_id,customer_name,email,movie_name,city_name,theatre_name,date,show_time,no_of_seats,amount ) values('$bookid','$name','$email','$movie_name','$location','$theatre_name','$date','$time','$seat','$total')";

         if (mysqli_query($conn, $sql)) {
        //  echo "<b style='color:#00b33c;'>Success:</b> <b>Record saved successfully!</b>";
         echo"<script>alert('Ticket Booked successfully!');window.location.href = 'booking_details.php'</script>";
      
         } else {
             echo "<b style='color:#00b33c;'>Error:</b> <b>Something is wrong!</b>";
            
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

  <title>Book details</title>
  <link rel="shortcut icon" type="image/x-icon" href="../images/logo5.png" />

  <script>
        function myCalculation(){
        var total = document.getElementById('seatno').value * 150;   // Get the Inputvalue and do your calculation (/7)
        document.getElementById('total').value = total;        // display the result of your calculation inside the <p>-Element with the id 'display'
        
        }
        function myCalculation2(){
        var total = document.getElementById('seatno').value * 250;   // Get the Inputvalue and do your calculation (/7)
        document.getElementById('total').value = total;   // display the result of your calculation inside the <p>-Element with the id 'display'
      
        }
        
        function myCalculation3(){
        var total = document.getElementById('seatno').value * 350;   // Get the Inputvalue and do your calculation (/7)
        document.getElementById('total').value = total;        // display the result of your calculation inside the <p>-Element with the id 'display'
        
        
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
    <li class="breadcrumb-item active" style="color: white;font-family: 'Poppins', sans-serif;">Movie Details</li>
</ol>
<br>
    <div class="container">
		<div class="row">
			<div class="col-xs-12  toppad" >
				<div class="panel panel-info">
					<div class="panel-heading">
						<h3 class="panel-title">
   
							<?php 

							$movie_id=$_GET['movie_id'];	
							$_SESSION['movie_id']=$movie_id;
							$res=$conn->query("select * from movies where movie_id=$movie_id;");
                            $row=$res->fetch_object();
                            //  $movie_name=$row['movie_name'];                     
                            echo "".$row->movie_name;
                            ?>
                           
						</h3>
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-md-4 col-lg-4 " align="center">
								<img alt="User Pic" src=<?php echo '"'.$row->image.'"';?> class=" img-responsive"> 
							</div>
							<div class=" col-md-8 col-lg-8 "> 										

                                    <!--Select Threatre Part -->
                                    <p class="mt-4 mb-3" style="font-family: 'Poppins', sans-serif; font-size:x-large; font-weight:bold">Search Theatre</p>
                                        <form  method="post" >
                                            <div style="padding: 2%; border-radius: 5px;">
                                                <div class="row">
                                                    <div class="col-lg-4 mb-4">
                                                        <div style="font-family: 'Poppins', sans-serif;">Select City<span style="color:red">*</span> </div>
               
               
                                                            <?php
                                                                echo '<select  required name="location" class="form-control" >
                                                                <option>None</option>';
                                                                
                                                                $sqli = "select * from location";
                                                                $result = mysqli_query($conn, $sqli);
                                                                while ($row = mysqli_fetch_array($result)) {
                                                                echo '<option>'.$row['city_name'].'</option>';
                                                                }
                                                                
                                                                echo '</select>';
                                                                
                                                                ?>
                                                        </div>
                                                    </div>

                                                        <div class="row">
                                                            <div class="col-lg-4 mb-4">
                                                                <div><input type="submit" name="submit" class="btn btn-primary" value="Search"></div>
                        
                                                            </div>
                                                        </div>
                                                </div>
                                        </form>

     

                                                <div class="row">
                                                    <?php
                                                    if(isset($_POST['submit']))
                                                    {
                                                    $location=$_POST['location'];
                                                    $sql = "select * from theatre where location='$location'";
                                                    if (mysqli_query($conn, $sql)) {
                                                        $result = $conn->query($sql);

                                                        while( $record = mysqli_fetch_assoc($result) ) {
                                                        ?>
                                                            <form method="post"  action="" >
                                                                <input type="hidden" name="location" value="<?php echo "$location" ;?>">
                                                            <?php
                                                                    echo '<select name="theatre_name" class="form-control" style="margin-left: 8%; margin-bottom:2%; border-radius: 5px;" required>
                                                                    <option required>Select Theatre</option>';
                                                                    
                                                                    $sqli = "select * from theatre where location='$location'";
                                                                    $result = mysqli_query($conn, $sqli);
                                                                    while ($row = mysqli_fetch_array($result)) {
                                                                    echo '<option required>'.$row['theatre_name'].'</option>';
                                                                    }
                                                                    
                                                                    echo '</select>';
                                                                    
                                                                    ?>

                                                                            <input type="date" name="date" placeholder="Select Date" class="form-control" value="Date" style="border-radius: 5px; margin-left: 8%;margin-bottom:2%;"required>

                                                                            <select name="time" style="border-radius: 5px; margin-left: 8%;margin-bottom:2%;"  class="form-control" required>
                                                                                <option value="">Select Show Time </option>
                                                                                <option value="9:00 AM">9:00 AM</option>
                                                                                <option value="11:30 AM">11:30 AM</option>
                                                                                <option value="4:30 PM">4:30 PM</option>
                                                                                <option value="9:00 PM">9:00 PM</option>
                                                                            </select>
                                        
                                                                        <p>
                                                                             <input class="form-control" type="number" name="seat" id="seatno" placeholder="No.of Seat" maxlength="1" required oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"  style="margin-left: 8%; ">
                                                                       </p>
                                                                        <p class="card-text"style="font-family: 'Poppins', sans-serif; font-weight:bold; padding-left:30px;" required>Class
                                        
                                                                            <input type="button" name="s" onclick="myCalculation()" class="btn btn-success" value="S-Rs.150">
                                                                            <input type="button" name="g"  onclick="myCalculation2()" class="btn btn-success" value="G-Rs.250">
                                                                            <input type="button" name="p"  onclick="myCalculation3()" class="btn btn-success" value="P-Rs.350">
                                                                    
                                                                        </p>
                                                                            <!-- <div id='display' style="font-family: 'Poppins', sans-serif; margin-left: 40%; margin-bottom:3% "></div> -->
                                                                                <!-- <div id='display' style="font-family: 'Poppins', sans-serif; margin-left: 40%; margin-bottom:3% "></div> -->
                                                                          <b>Total Amount: Rs<input type='text' name='total' id='total'  style="border:none; margin-left: 5%;margin-bottom:2%;"></b>
                                                                            <input type="submit" name="final" value="Book Now" class="btn btn-info" style="width:100%; margin-left: 8%;">
                                                                </form>
                                                                            
                                                            <?php } 
                                                        } else {
                                                            echo "No Record Found!";
                                                        }
                                                      
                                                        mysqli_close($conn);
                                                        }
                                                        
                                                    ?>
                                                   

                                                    </div>
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
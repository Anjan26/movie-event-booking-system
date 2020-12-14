<?php
include('config.php');
session_start();
// if(strlen($_SESSION['login'])==0){
//   header('Location: login.php');
// }
if(!isset($_SESSION['login']))
{
	header('location:login.php');
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

  <title>Movie details</title>
  <link rel="shortcut icon" type="image/x-icon" href="../images/logo5.png" />

  <script>
        function myCalculation(){
        var total = document.getElementById('seatno').value * 150;   // Get the Inputvalue and do your calculation (/7)
        document.getElementById('display').innerHTML = 'Your Total is:' +total;        // display the result of your calculation inside the <p>-Element with the id 'display'
        }
        function myCalculation2(){
        var total = document.getElementById('seatno').value * 250;   // Get the Inputvalue and do your calculation (/7)
        document.getElementById('display').innerHTML ='Your Total is:' + total;        // display the result of your calculation inside the <p>-Element with the id 'display'
        }
        function myCalculation3(){
        var total = document.getElementById('seatno').value * 350;   // Get the Inputvalue and do your calculation (/7)
        document.getElementById('display').innerHTML = 'Your Total is:' + total;        // display the result of your calculation inside the <p>-Element with the id 'display'
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
								<table class="table table-user-information">
									<tbody>
										<tr>
											<td><strong>Movie Name:</strong></td>
											<td><?php echo "".$row->movie_name;?> </td>
                                        </tr>
                                        <tr>
											<td><strong>Release Date:</strong></td>
											<td><?php echo "".$row->release_date;	?> </td>
											</tr>
										<tr>
											<td><strong>Genre:</strong></td>
											<td> <?php echo "".$row->movie_type;?> </td>
										</tr>
										<tr>
											<td><strong>Movie Cast:</strong></td>
											<td><?php echo "".$row->movie_cast;?> </td>
										</tr>
										<tr>
											<tr>
												<td><strong>IMDB:</strong></td>
												<td><?php echo "".$row->rating;?>⭐ </td>
											</tr>
											<tr>
												<td><strong>Director:</strong></td>
												<td><?php echo "".$row->director;	?> </td>
                                            </tr>
                                            <tr>
												<td><strong>Duration:</strong></td>
												<td><?php echo "".$row->duration;	?> </td>
                                            </tr>
                                            <tr>
												<td><strong> Trailer:</strong></td>
												<td><a target="_blank" href="<?php echo "".$row->link;?>"><button class="btn btn-danger">Watch Trailer</button></a></td>
											</tr>
										
											</tbody>
                                        </table>
<!--                                     
                                        <form action='SeatPreview/select.php' method='get' >
                                            <input type='hidden' name='movie_id' value="$_SESSION['movie_id']" >      -->
                                            <a href="SeatPreview/select.php?movie_id=<?php echo $_SESSION['movie_id'];?>"> <button   class='btn btn-danger' name='submit' style="margin-left: 31%;margin-top:5% ">Theatre Seat Preview </button></a>
                                        <!-- </form> 
                                       -->

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
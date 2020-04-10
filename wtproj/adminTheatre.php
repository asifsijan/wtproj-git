<?php 

include "includes/db_connect.inc.php"; 
$dbname= $theatreName = $theatreType = $totalSeat = $availableSeat = $soldSeat = "";

if($_SERVER["REQUEST_METHOD"]=="POST"){
    if(!empty($_POST['theatreName'])){
      $theatreName = mysqli_real_escape_string($conn, $_POST['theatreName']);
    }

    if(!empty($_POST['totalSeat'])){
      $totalSeat = mysqli_real_escape_string($conn, $_POST['totalSeat']);
      }

    if(!empty($_POST['availableSeat'])){
      $availableSeat = mysqli_real_escape_string($conn, $_POST['availableSeat']);
      }

    if(!empty($_POST['soldSeat'])){
      $soldSeat = mysqli_real_escape_string($conn, $_POST['soldSeat']);
      }

    if(!empty($_POST['theatreType'])){
        $theatreType = mysqli_real_escape_string($conn, $_POST['theatreType']);
        }

    $sqlTheatreCheck = "SELECT theatre_name FROM theatre WHERE theatre_name = '$theatreName'";
    $result = mysqli_query($conn, $sqlTheatreCheck);

    while($row = mysqli_fetch_assoc($result)){
      $dbname = $row['theatre_name'];
    }

    if($dbname == $theatreName){
      $err = "Theatre already exists!";
    }
    else{
      $sql = "INSERT INTO theatre (theatre_name, total_seat, available_seat, sold_seat, theatre_type)
              VALUES ('$theatreName', '$totalSeat', '$availableSeat', '$soldSeat', '$theatreType');";

  
      mysqli_query($conn, $sql);
 
    }



}


?>



<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Admin-Movie</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">


        <style>
        
        body {
          background-color: white;
        }
        .col, .col-1, .col-10, .col-11, .col-12, .col-2, .col-3, .col-4, .col-5, .col-6, .col-7, .col-8, .col-9, .col-auto, .col-lg, .col-lg-1, .col-lg-10, .col-lg-11, .col-lg-12, .col-lg-2, .col-lg-3, .col-lg-4, .col-lg-5, .col-lg-6, .col-lg-7, .col-lg-8, .col-lg-9, .col-lg-auto, .col-md, .col-md-1, .col-md-10, .col-md-11, .col-md-12, .col-md-2, .col-md-3, .col-md-4, .col-md-5, .col-md-6, .col-md-7, .col-md-8, .col-md-9, .col-md-auto, .col-sm, .col-sm-1, .col-sm-10, .col-sm-11, .col-sm-12, .col-sm-2, .col-sm-3, .col-sm-4, .col-sm-5, .col-sm-6, .col-sm-7, .col-sm-8, .col-sm-9, .col-sm-auto, .col-xl, .col-xl-1, .col-xl-10, .col-xl-11, .col-xl-12, .col-xl-2, .col-xl-3, .col-xl-4, .col-xl-5, .col-xl-6, .col-xl-7, .col-xl-8, .col-xl-9, .col-xl-auto {
    position: relative;
    width: 80%;
    padding-right: 0px;
    padding-left: 0px;
}



        .sidebar {
    margin: 0;
    padding: 0;
    
    background-color: #f1f1f1;
    
    height: 100%;
    overflow: hidden;
  }
  
  .sidebar a {
    display: block;
    color: black;
    padding: 26px;
    text-decoration: none;
      border-style: solid;
      border-width: 3px;
      
      border-color: white;
      border-radius: 10px;

  }
  .card a {
      padding: 10px;
      color: #f1f1f1;
      background-color: grey;
  }
  
  .card-body{
      padding: 0px;
  }
  .card-title {
     margin-bottom: 0px;
     padding: 6px;
}



  .sidebar a.active {
    background-color: black;
    color: white;
  }
  
  .sidebar a:hover:not(.active) {
    background-color: #555;
    color: white;
  }

  /*horizontal tab*/

  .tablink {
  background-color: #555;
  color: white;
  float: left;
 
  outline: none;
  cursor: pointer;
  padding: 25px 10px;
  font-size: 20px;
  width: 33.33%;
  border-style: solid;
  border-left-width: 7px;
  border-right-width: 7px;
  
  border-color: white;
  border-radius: 10px;
}



.tablink:hover {
  background-color: #777;
}

/* Style the tab content (and add height:100% for full page content) */
.tabcontent {

  color: black;
  display: none;
  padding: 0px 20px;
  height: 100%;
  background-color:white;
}

.taboptions {
  padding: 10px;
}

.mid {
  width: 80%;
}

  
        </style>



    </head>

<body>

    <div class="navhead" style="margin-bottom: 10px">
        <!--Header Section-->
        <header>
           <div class="d-flex flex-row flex-nowrap sm-flex-wrap  header-section ">
                <div class="p-2 mr-2">
                    <a href="#"><img src="CineCarnival.png" alt="No Image..."></a>
                </div>
                
                <div class="p-2 align-self-center d-sm-none d-md-block d-none d-sm-block mr-0 pr-0">
             
                </div>
                <div class="p-2 align-self-center  mr-auto d-sm-none d-md-block d-none d-sm-block ml-0 pl-0">

                </div>
                <div class="p-2 align-self-center header-anchor">
                  
                </div>

                <div class="p-2 align-self-center">
                    <a href="#" style="text-decoration: none;"><i class="fas fa-sign-out-alt"></i>  Sign Out</a>
                </div>
           </div>
        </header>

    </div>
  


<!--MID PANEL-->
    <div class="container-fluid mid">
        <div class="row">
            <div class="col-lg-3">
                <div class="sidebar">

                        <div class="card" style="width:100%">
                                
                                <div class="card-body">
                                  <h5 class="card-title" align="center"><i class='fas fa-address-book'></i> Admin1</h5>
                                 
                                  <a href="#" align="center">Edit Profile</a>
                                </div>
                              </div>

                    <a href="adminMovie.php">Manage Movies</a>
                    <a href="adminShow.php">Manage Shows</a>
                    <a class="active" href="adminTheatre.php">Manage Theatres</a>
                    <a href="adminOffer.php">Manage Offers</a>
                </div>
            </div>

            <div class="col-lg-9">

                    <button class="tablink" onclick="openPage('Dash', this, 'black')" id="defaultOpen"><i class='fas fa-stream'></i> Dash </button>
                    <button class="tablink" onclick="openPage('Insert', this, 'black')"><i class='fas fa-folder-plus'> </i> Insert </button>
                    <button class="tablink" onclick="openPage('Edit', this, 'black')"><i class='fas fa-eraser'></i> Edit </button>
                    
<!--========================================================DASH TAB=======================================-->


                    <div id="Dash" class="tabcontent">
                      <h3> Dash</h3>
                      

                    </div>
                    

<!--========================================================INSERT TAB=======================================-->


                    <div id="Insert" class="tabcontent">
                      
                      <form action="adminTheatre.php" method="POST">
                        <div class="row">
                          <div class="col-lg-6 pt-4">
                            
                            <div class="taboptions">
                                <input type="text" class="form-control form-control-sm" placeholder="Theatre name*" name="theatreName" value="" required>
                            </div>                 
                            <div class="taboptions">
                                <input type="number" class="form-control form-control-sm" placeholder="total seat*" name="totalSeat" value="" required>
                            </div>
                            <div class="taboptions">
                                <input type="number" class="form-control form-control-sm" placeholder="available seat*" name="availableSeat" value="" required>
                            </div>
                    
                          </div>
  
  
                          <div class="col-lg-6 pt-4">
                            
                                    
                              <div class="taboptions">
                                <input type="number" class="form-control form-control-sm" placeholder="sold seat*" name="soldSeat" value="" required>
                              </div>
 
  
                              <div class="taboptions">
                                <select name="theatreType" required>
                                  <option value="" disabled selected>theatreType</option>
                                  <option value="2D">2D</option>
                                  <option value="3D">3D</option>
                                </select>
                              </div>
  
                        </div>
                        </div>

                        <div class="pt-3" align="center">
                          <button type="submit" name="button"> insert <br></button>
                        </div>
                       
                      </form>
                      
                   
                    </div>
                    

<!--========================================================EDIT TAB=======================================-->


                    <div id="Edit" class="tabcontent">
                      <h3>Edit</h3>
                     
                    </div>
                    

            </div>
            
        </div>
    </div>




    <script>
            function openPage(pageName,elmnt,color) {
              var i, tabcontent, tablinks;
              tabcontent = document.getElementsByClassName("tabcontent");
              for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
              }
              tablinks = document.getElementsByClassName("tablink");
              for (i = 0; i < tablinks.length; i++) {
                tablinks[i].style.backgroundColor = "";
              }
              document.getElementById(pageName).style.display = "block";
              elmnt.style.backgroundColor = color;
            }
            
            // Get the element with id="defaultOpen" and click on it
            document.getElementById("defaultOpen").click();
    </script>
            


    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>


</body>



</html>








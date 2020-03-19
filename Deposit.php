<!DOCTYPE html>
<html>
  <head>

    <title>Deposit</title>
    <link rel="stylesheet" type="text/css" href="Style2.css">

    <div class="topnav">

      <a href="Login.php">DashBoard</a>
      <a class="active" href="Deposit.php">Deposit</a>
      <a href="Withdraw.php">Withdraw</a>
      <a href="Balance.php">Balance Status</a>
      <a href="Delect_account.php">Delect Account</a>
      <a id="logout" href="Login.php">Log out</a>
   
    </div>

  </head>
  <body>

    <br> 
    <br>

    <center><font color="Red"><h1>Alpha-Z 26 Bank Ltd.</h1></font></center>

    <div class="">

      <form class="form-signin" method="post" action="">  

        <h2 class="form-signin-heading">Deposit</h2>

        <input type="number" class="form-control" name="deposit" placeholder="Deposit Amount" required="" autofocus="" />

        <br>
        <br>

        <input type="text" class="form-control" name="contact" placeholder="Contact no" required=""/>
             
        
        <br>
        <br>

        <input type="submit" value="Deposit" name="searching">
        <input type="reset" value="Reset">

      </form>

    </div>

  </body>
</html>
<?php

    //$email = filter_input(INPUT_POST, 'email');
    $contact = filter_input(INPUT_POST, 'contact');
    $deposit = filter_input(INPUT_POST, 'deposit');
    //$pass = filter_input(INPUT_POST, 'pass');
    //$id=rand(1001,9999);

    $host = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "formfillup";
    
    $conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);

    if (mysqli_connect_error()){

      die('Connect Error ('. mysqli_connect_errno() .') '
      . mysqli_connect_error());

    }
    if(isset($_POST['searching'])){
        // Create connection
        $id2 = $_POST['contact'];
        $id3 = $_POST['deposit'];
        $sql2 = "SELECT * FROM pms WHERE Contact='$id2'";
        //echo $id2;
        $result = mysqli_query($conn, $sql2);
        if (mysqli_num_rows($result) ==1) {

          //header( "Location: DashBoard.php" ); die;
          $contact = $_POST['contact'];

          $sql = "SELECT * FROM pms WHERE Contact='$contact'";

          $result = mysqli_query($conn, $sql);

          if (mysqli_num_rows($result) > 0) {

              // output data of each row
              while($row = mysqli_fetch_assoc($result)) {

                  $up =  $row["Balance"] + $id3 + ($id3*0.05);
                  $sql = "UPDATE pms SET Balance='$up' WHERE Contact='$contact'";
                  if (mysqli_query($conn, $sql)) {

                    echo "<br><br><center><font color=Red>Congrats! Deposit successfully done.</font></center>";

                  } 
                  else {

                    //echo "Error updating record: " . mysqli_error($conn);

                  }
                
              }
          } 
          else {

              echo "No match! Please enter the right contact number";

          }

        }
        else{

          //echo '<script>alert("Wrong mobile number")</script>'; 
          echo "<br><br><center><font color=Red>Please enter the right Contact no</font></center>";

          die();

        }

      }

?>
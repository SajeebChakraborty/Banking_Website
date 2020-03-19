<!DOCTYPE html>
<html>
    <head>
      <title>DashBoard</title>

      <link rel="stylesheet" type="text/css" href="Style.css">

      <div class="topnav">

        <a class="active" href="LoginProcess.php">DashBoard</a>
        <a href="Deposit.php?contact='$contact'">Deposit</a>
        <a href="Withdraw.php">Withdraw</a>
        <a href="Balance.php">Balance Status</a>
        <a href="Delect_account.php">Delect Account</a>
        <a id="logout" href="Login.php">Log out</a>
       
      </div>

      <br>

      <marquee <font color="Red" behavior="alternate" direction="left" bgcolor-"Red">Welcome to Our Bank! Our office time from 10.00 AM to 4.00 PM. </font></marquee>

      <center><h1>Alpha-Z 26 Bank Ltd.</h1></center>

      <br>

    </head>
    <body>

    </body>
</html>
<?php

   //$email = filter_input(INPUT_POST, 'email');
   $contact = filter_input(INPUT_POST, 'contact');
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
    // Create connection
    $contact=$_GET['contact'];
    //$id2 = $_POST['contact'];

    $sql2 = "SELECT * FROM pms WHERE Contact='$contact'";

    //echo $id2;

    $result = mysqli_query($conn, $sql2);

    if (mysqli_num_rows($result) ==1) {

        //header( "Location: DashBoard.php" ); die;
        // $id = $_POST['contact'];
        $sql = "SELECT * FROM pms WHERE Contact='$contact'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {

            // output data of each row
            while($row = mysqli_fetch_assoc($result)) {
               

           

                echo " <h3><br> Name: " . $row["Name"]. "<br> ";
                echo " Account no: " . $row["Account_no"]. "<br> ";
                echo " Father Name: " . $row["Father_name"]. "<br> ";
                echo " Mother Name: " . $row["Mother_name"]. "<br> ";
                echo " NID: " . $row["NID"]. "<br> ";
                echo "   Birth Date: " . $row["Birth_Date"]. "<br>";
                echo "   Contact no: " . $row["Contact"]. "<br>";
                echo "  Email: " . $row["Email"]. "<br><br></h3>";



               
                /*echo "Today is " . date("Y/m/d") . "<br>";
        echo "Today is " . date("Y.m.d") . "<br>";
        echo "Today is " . date("Y-m-d") . "<br>";
        echo "Today is " . date("l");*/
            }

        } 
        else {
            echo "No match! Please enter the right bill number";
        }

    }
    else{

        //echo '<script>alert("Wrong mobile number")</script>'; 
        header("Location: two_step_verification2.php"); 
        die();

    }

?>
<!DOCTYPE html>
<html>
  <head>

    <title></title>

  </head>
  <body>

    <center>
        
        <br>
        <br>
        <br>
        <i><p> POWERED BY </p></i>
        <b><p>Sajeeb Chakraborty </p></b>

    </CENTER>
    


  </body>
</html>
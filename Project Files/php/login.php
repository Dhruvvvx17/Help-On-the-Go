<?php
    $email = $_POST['email'];
    $pwd = $_POST['pwd'];

    // echo $email;
    // echo "<br>";
    // echo $pwd;
    // echo "<br>";
 
  // database constructs
    $host = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbname = "testdb";

    // create connection
    $conn = new mysqli($host, $dbUsername, $dbPassword);
    
    if(mysqli_connect_error()){
        die('Connect Error ('. mysqli_connect_error().')'. mysqli_connect_error());
    }

    mysqli_select_db($conn,$dbname);
    
    echo "<br>Connected<br>";

    $query = "SELECT * FROM usersignup WHERE Email='$email';";
    $q = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($q);

    // echo "row:","$row";
    echo"<br>";

    if(!$row){
            echo '<script>alert("E-mail not registered")</script>';
            echo '<script>window.location.assign(\'../HTML/login.html\');</script>';
    }
    else{
        if($row['password'] != $_POST['pwd'] ){
            echo '<script>alert("E-mail Or Password Does Not Match")</script>';
            echo '<script>window.location.assign(\'../HTML/login.html\');</script>';
        }
        else{ //Registered credentials , User can login!
            //Start session
            echo '<script>window.location.assign(\'../HTML/services.html\');</script>';
        }
    }
?>
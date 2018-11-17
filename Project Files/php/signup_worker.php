<?php
        error_reporting(E_ALL);
        ini_set('display_errors', 1);
    // obatining all fields from the form
    // if(isset($_POST['SUBMIT'])){
        $firstname = $_POST['firstName'];
        $lastname = $_POST['lastName'];
        $gender = $_POST['gender'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $workArea = $_POST['workArea'];
        // $workArea = 'ITPL';
        $apartment = $_POST['apartment'];
        $workType = $_POST['workType'];
        $charges = $_POST['charges'];
        // $fromTime	 //doubts over here
        $hours = $_POST['hours'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        // echo "$firstname";
    // }



    // To check the form details once php script loads
    echo "$firstname";
    echo "<br>";
    echo $lastname;
    echo "<br>";
    echo $gender;
    echo "<br>";
    echo $email;
    echo "<br>";
    echo $phone;
    echo "<br>";
    echo $workArea;
    echo "<br>";
    echo $apartment;
    echo "<br>";
    echo $workType;
    echo "<br>";
    echo $charges;
    echo "<br>";
    echo $hours;
    echo "<br>";
    echo $username;
    echo "<br>";
    echo $password;
    echo "<br>";

    // Steps to run this php code:
    // 1.Turn on MYSQL through xampp server.xus
    // 2.Create a database called 'testdb'
    // 3.Create a table called 'usersignup'
    // 4.Run the 'signup_user.html' file on browser to fill the user signup form.

    // database constructs
    $host = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbname = "wtproj";

    // create connection
    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);

    if(mysqli_connect_error()){
        die('Connect Error ('. mysqli_connect_error().')'. mysqli_connect_error());
    }
    else{
        echo "<br>Connected<br>";
        $SELECT = "SELECT email From signup_worker Where email = ? Limit 1";
        $INSERT = "INSERT Into signup_worker (firstname,lastname,gender,phone,email,workArea,apartment,workType,charges,hours,username,password) values(?,?,?,?,?,?,?,?,?,?,?,?)";
    }

    // Prepare statement
    $stmt = $conn->prepare($SELECT);
    $stmt->bind_param("s",$email);
    $stmt->execute();
    $stmt->bind_result($email);
    $stmt->store_result();

    $rnum = $stmt->num_rows;

    if($rnum==0){
        $stmt->close();
        $stmt = $conn->prepare($INSERT);
        $stmt->bind_param("ssssisssiiss",$firstname,$lastname,$gender,$email,$phone,$workArea,$apartment,$workType,$charges,$hours,$username,$password);
        $stmt->execute();
        echo "New Record inserted successfully";
    }
    else{
        echo "Email ID already registered";
    }

    $stmt->close();
    $conn->close();
?>
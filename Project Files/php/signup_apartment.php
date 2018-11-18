<?php
       
        $apartment = $_POST['name'];
        $bda = $_POST['bda'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        $username = $_POST['username'];
        $password = $_POST['password'];



    // To check the form details once php script loads
    echo "$apartment";
    echo "<br>";
    echo $bda;
    echo "<br>";
    echo $email;
    echo "<br>";
    echo $phone;
    echo "<br>";
    echo $phone;
    echo "<br>";
    echo $address;
    echo "<br>";
    echo $username;
    echo "<br>";
    echo $password;

    // Steps to run this php code:
    // 1.Turn on MYSQL through xampp server.xus
    // 2.Create a database called 'testdb'
    // 3.Create a table called 'usersignup'
    // 4.Run the 'signup_user.html' file on browser to fill the user signup form.

    // database constructs
    $host = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbname = "testdb";

    // create connection
    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);

    if(mysqli_connect_error()){
        die('Connect Error ('. mysqli_connect_error().')'. mysqli_connect_error());
    }
    else{
        echo "<br>Connected<br>";
        $SELECT = "SELECT email From signup_apartment Where email = ? Limit 1";
        $INSERT = "INSERT Into signup_apartment (name,bda,email,phone,address,username,password) values(?,?,?,?,?,?,?)";
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
        $stmt->bind_param("sssisss",$apartment,$bda,$email,$phone,$address,$username,$password);
        $stmt->execute();
        echo "New Record inserted successfully";
        echo '<script>window.location.assign(\'../HTML/accConfirm.html\');</script>';
    }
    else{
        echo "Email ID already registered";
    }

    $stmt->close();
    $conn->close();
?>
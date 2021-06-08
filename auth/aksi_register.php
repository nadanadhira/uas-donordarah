<?php
include('../connection.php');
if (isset($_POST['register'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $level = $_POST['level'];

    //to prevent from mysqli injection  
    $email = stripcslashes($email);
    $password = stripcslashes($password);
    $email = mysqli_real_escape_string($conn, $email);
    $password = mysqli_real_escape_string($conn, $password);

    $sql = "INSERT INTO user(email,password,level) VALUES('$email','$password','$level')";

    
    if ($conn->query($sql) == TRUE) {                
        echo "<script> 
        window.alert('data user berhasil didaftarkan');
        window.location.href = 'login.php';
        </script>";    
        
    }
    else{
        echo "Error : " . $sql . "<br> " . $conn->error;
    }
}

?>
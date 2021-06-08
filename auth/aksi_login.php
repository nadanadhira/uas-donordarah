<?php
include('../connection.php');

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
  
    //to prevent from mysqli injection  
    $email = stripcslashes($email);
    $password = stripcslashes($password);
    $email = mysqli_real_escape_string($conn, $email);
    $password = mysqli_real_escape_string($conn, $password);
  
    $sql = "SELECT * FROM user WHERE email = '$email' and password = '$password'";
  
    $query = $conn->query($sql);
    if (mysqli_num_rows($query) == 1) {
      $data = $query->fetch_array();
      session_start();
      $_SESSION['email'] = $data['email'];
      // $_SESSION['name'] = $data['name'];
      $_SESSION['level'] = $data['level'];
      $_SESSION['id'] = $data['iduser'];
      echo $data['email'];
      if ($data['level'] == 'admin') {
        echo "<script> 
        window.alert('user berhasil login');
        window.location.href = '../admin';
        </script>";    
      }elseif ($data['level']=='user') {
        header('Location:../client');
      }
  
    } else {
      echo "<script>alert('Password atau email salah')</script>";
    }
  }
<?php
include('../../connection.php');

$id = $_GET['id'];        // Collecting data from query string
if(!is_numeric($id)) echo "Data Error"; // Checking data it is a number or not

$sql = "DELETE FROM pmi WHERE id_PMI=$id";

if ($conn->query($sql) === TRUE) {
  echo "<script> 
        window.alert('data pmi berhasil dihapus');
        window.location.href = 'pmi.php';
        </script>";    
} else {
  echo "Error deleting record: " . $conn->error;
}
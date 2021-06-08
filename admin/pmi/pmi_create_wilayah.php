<?php
include('../../connection.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bootstrap 5</title>

    <link rel="stylesheet" href="../../dist/css/style.css">
    <link rel="stylesheet" href="../../dist/icons/bootstrap-icons.css">
    <script src="../../dist/js/bootstrap.min.js"></script>
</head>

<body>
    <div class="container-fluid">
        <?php include_once('../layouts/header.php') ?>
        <div class="row">
            <div class="col-md-3">
                <?php include_once('layouts/sidebar.php') ?>
            </div>
            <div class="col">
                <main>
                <div class="card">
                        <div class="card-header text-primary fw-bold">
                            Tambah Wilayah PMI
                        </div>
                        <div class="card-body">
                            <form method="post" action="">
                                <div class="mb-3">
                                    <label for="wilayah" class="form-label">Nama Wilayah</label>
                                    <input type="text" name="wilayah" id="wilayah" placeholder="Nama Wilayah" class="form-control">
                                </div>                                
                                <button type="submit" name="create" class="btn btn-primary">Tambah</button>
                            </form>
                        </div>
                    </div>
                </main>
            </div>
        </div>
    </div>
</body>
</html>
<?php

if (isset($_POST['create'])) {
    $wilayah = $_POST['wilayah'];    

    $sql_insert = "INSERT INTO wilayah_pmi(nama_wilayah) 
    VALUES('$wilayah')";

    if ($conn->query($sql_insert) === TRUE) {
        echo "<script> 
        window.alert('wilayah pmi berhasil ditambahkan');
        window.location.href = 'pmi.php';
        </script>";    
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>
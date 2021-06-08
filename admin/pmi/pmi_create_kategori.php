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
                        <div class="card-header text-info fw-bold">
                            Tambah Kategori PMI
                        </div>
                        <div class="card-body">
                            <form method="post" action="">
                                <div class="mb-3">
                                    <label for="kategori" class="form-label">Nama Kategori</label>
                                    <input type="text" name="kategori" id="kategori" placeholder="Nama Kategori" class="form-control">
                                </div>                                
                                <button type="submit" name="create" class="btn btn-info">Tambah</button>
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
    $kategori = $_POST['kategori'];    

    $sql_insert = "INSERT INTO kategori_pmi(nama_kategori) 
    VALUES('$kategori')";

    if ($conn->query($sql_insert) === TRUE) {
        echo "<script> 
        window.alert('kategori pmi berhasil ditambahkan');
        window.location.href = 'pmi.php';
        </script>";    
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>
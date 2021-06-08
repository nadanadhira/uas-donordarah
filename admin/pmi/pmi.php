<?php

include('../../connection.php');
$sql = "SELECT * FROM pmi,wilayah_pmi,kategori_pmi WHERE wilayah_pmi.id_wilayah = pmi.id_wilayah AND pmi.id_kategori = kategori_pmi.id_kategori";

if ($conn->query($sql)) {
    $pmi = $conn->query($sql);
} else {
    echo ("Error description: " . $conn->error);
    die();
}
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
                <?php include('layouts/sidebar.php') ?>
            </div>
            <div class="col">
                <main>
                    <div class="card">
                        <div class="card-header">PMI List</div>
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Nomor PMI</th>
                                        <th scope="col">Nama PMI</th>
                                        <th scope="col">Wilayah PMI</th>
                                        <th scope="col">Instansi</th>
                                        <th scope="col">Kapasitas</th>
                                        <th scope="col">Kategori</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if (mysqli_num_rows($pmi) > 0) {
                                        while ($row = mysqli_fetch_array($pmi)) {
                                    ?>
                                    <tr>
                                    <td><?php echo $row['nomor_pmi'] ?></td>
                                    <td><?php echo $row['nama_pmi'] ?></td>
                                    <td><?php echo $row['nama_wilayah'] ?></td>
                                    <td><?php echo $row['instansi_pmi'] ?></td>
                                    <td><?php echo $row['kapasitas_pmi'] ?></td>
                                    <td><?php echo $row['nama_kategori'] ?></td>
                                    <td>
                                    <a href="pmi_edit.php?id=<?php echo $row['id_pmi'] ?>" class="btn btn-outline-success">Edit</a>
                                    <a href="pmi_delete.php?id=<?php echo $row['id_pmi'] ?>" class="btn btn-danger">Hapus</a>
                                    </td>
                                    </tr>
                                    <?php
                                        }
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </main>
            </div>
        </div>
    </div>
</body>

</html>
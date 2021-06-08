<?php
include('../../connection.php');
$sql = "SELECT * FROM wilayah_pmi ORDER BY id_wilayah DESC";
$sql2 = "SELECT * FROM kategori_pmi";
$wilayah = $conn->query($sql);
$kategori = $conn->query($sql2);

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
                        <div class="card-header text-success fw-bold">
                            Tambah Unit PMI
                        </div>
                        <div class="card-body">
                            <form method="post" action="">
                                <div class="mb-3">
                                    <label for="nama_pmi" class="form-label">Nama PMI</label>
                                    <input type="text" name="nama_pmi" id="nama_pmi" placeholder="Nama PMI" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="nomor_pmi" class="form-label">Nomor PMI</label>
                                    <input type="number" name="nomor_pmi" id="nomor_pmi" placeholder="Nomor PMI" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="wilayah" class="form-label">Wilayah</label>
                                    <select name="wilayah" id="wilayah" class="form-select">
                                        <?php
                                        if (mysqli_num_rows($wilayah) > 0) {
                                            while ($row = mysqli_fetch_array($wilayah)) {
                                        ?>
                                                <option value="<?php echo $row['id_wilayah'] ?>"><?php echo $row['nama_wilayah'] ?></option>
                                        <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="instansi_pmi" class="form-label">Instansi PMI</label>
                                    <input type="text" name="instansi_pmi" id="instansi_pmi" placeholder="Instansi PMI" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="kapasitas_pmi" class="form-label">Kapasitas PMI</label>
                                    <input type="number" name="kapasitas_pmi" id="kapasitas_pmi" placeholder="Kapasitas PMI" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="kategori" class="form-label">Kategori</label>
                                    <select name="kategori" id="kategori" class="form-select">
                                        <?php
                                        if (mysqli_num_rows($kategori) > 0) {
                                            while ($row = mysqli_fetch_array($kategori)) {
                                        ?>
                                                <option value="<?php echo $row['id_kategori'] ?>"><?php echo $row['nama_kategori'] ?></option>
                                        <?php
                                            }
                                        }
                                        ?>
                                    </select>
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
    $nama_pmi = $_POST['nama_pmi'];
    $nomor_pmi = $_POST['nomor_pmi'];
    $instansi_pmi = $_POST['instansi_pmi'];
    $kapasitas_pmi = $_POST['kapasitas_pmi'];
    $wilayah = $_POST['wilayah'];
    $kategori = $_POST['kategori'];

    $sql_insert = "INSERT INTO pmi(nama_pmi,nomor_pmi,instansi_pmi,kapasitas_pmi,id_wilayah,id_kategori) 
    VALUES('$nama_pmi','$nomor_pmi','$instansi_pmi','$kapasitas_pmi','$wilayah','$kategori')";

    if ($conn->query($sql_insert) === TRUE) {
        echo "<script> 
        window.alert('unit pmi berhasil ditambahkan');
        window.location.href = 'pmi.php';
        </script>";    
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>
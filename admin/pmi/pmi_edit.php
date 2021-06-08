<?php
include('../../connection.php');
$id = $_GET['id'];        // Collecting data from query string
if(!is_numeric($id)) echo "Data Error"; // Checking data it is a number or not

$sql = "SELECT * FROM wilayah_pmi";
$sql2 = "SELECT * FROM kategori_pmi";
$wilayah = $conn->query($sql);
$kategori = $conn->query($sql2);

$query = "SELECT * FROM pmi WHERE id_pmi =?";
$stmt = $conn->prepare($query);
$stmt->bind_param("s", $id);
$stmt->execute();
$result = $stmt->get_result();
$pmi = $result->fetch_assoc();

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
                                    <input type="text" name="nama_pmi" id="nama_pmi" placeholder="Nama PMI" class="form-control" value="<?php echo $pmi['nama_pmi'] ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="nomor_pmi" class="form-label">Nomor PMI</label>
                                    <input type="number" name="nomor_pmi" id="nomor_pmi" placeholder="Nomor PMI" class="form-control" value="<?php echo $pmi['nomor_pmi'] ?>">
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
                                    <input type="text" name="instansi_pmi" id="instansi_pmi" placeholder="Instansi PMI" class="form-control" value="<?php echo $pmi['instansi_pmi'] ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="kapasitas_pmi" class="form-label">Kapasitas PMI</label>
                                    <input type="number" name="kapasitas_pmi" id="kapasitas_pmi" placeholder="Kapasitas PMI" class="form-control" value="<?php echo $pmi['kapasitas_pmi'] ?>">
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
                                <button type="submit" name="update" class="btn btn-primary">Update</button>
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
if (isset($_POST['update'])) {
    $nama_pmi = $_POST['nama_pmi'];
    $nomor_pmi = $_POST['nomor_pmi'];
    $instansi_pmi = $_POST['instansi_pmi'];
    $kapasitas_pmi = $_POST['kapasitas_pmi'];
    $wilayah = $_POST['wilayah'];
    $kategori = $_POST['kategori'];

    $sql_update = "UPDATE pmi SET 
    nama_pmi = '$nama_pmi', 
    nomor_pmi = '$nomor_pmi', 
    instansi_pmi = '$instansi_pmi', 
    kapasitas_pmi = '$kapasitas_pmi', 
    id_wilayah='$wilayah',
    id_kategori = '$kategori'
    WHERE id_pmi = $id";

    if ($conn->query($sql_update) === TRUE) {
        echo "<script> 
        window.alert('unit pmi berhasil diupdate');
        window.location.href = 'pmi.php';
        </script>";    
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>
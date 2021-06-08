<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login.php</title>
    <!-- css -->
    <link rel="stylesheet" href="../dist/css/style.css">
    <link rel="stylesheet" href="../dist/icons/bootstrap-icons.css">
    <!-- js -->
    <script src="../dist/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js" defer></script>
</head>

<body class="bg-primary">
    <div class="container">
        <div class="card mt-5">
            <div class="card-header text-primary fw-bold">
                Login Page
            </div>
            <div class="card-body">
                <form action="aksi_login.php" method="post">
                    <div class="form-group">
                        <div class="row mb-4">
                            <div class="col">
                                <label for="">Email</label>
                                <input name="email" type="email" class="form-control" name="email" id="email" aria-describedby="emailHelpId" placeholder="Email">
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col">
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input name="password" type="password" class="form-control" name="password" id="password" placeholder="Password">
                                </div>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col">
                                <button type="submit" name="login" class="btn btn-success">Login</button>
                            </div>
                            <div class="col">
                                <a href="register.php" class="btn btn-dark float-end text-white">Register Here</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
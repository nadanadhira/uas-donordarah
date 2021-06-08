<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bootstrap 5</title>

    <!-- css -->
    <link rel="stylesheet" href="../dist/css/style.css">
    <link rel="stylesheet" href="../dist/icons/bootstrap-icons.css">
    <!-- js -->
    <script src="../dist/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js" defer></script>
</head>

<body class="bg-success">
    <div class="container">
    <div class="card mt-5">
        <div class="card-header text-primary fw-bold">
            Register Page
        </div>
        <div class="card-body">
            <form action="aksi_register.php" method="post">
            <div class="form-group">
                <div class="row mb-4">
                    <div class="col">
                        <label for="">Email</label>
                        <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelpId" placeholder="Email">                        
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col">
                        <div class="form-group">
                          <label for="password">Password</label>
                          <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                        </div>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col">
                        <div class="form-group">
                          <label for="level">Level</label>
                          <select name="level" id="level" class="form-select">
                            <option value="user">User</option>
                            <option value="admin">Admin</option>
                          </select>
                        </div>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col">
                        <button type="submit" name="register" class="btn btn-primary">Register</button>
                    </div>
                    <div class="col">
                        <a href="login.php" class="btn btn-dark float-end text-white">Login Here</a>
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>
    </div>    
</body>

</html>
<?php
session_start();
require 'elements/head.php';
?>

<body>
    <?php
    require 'elements/nav.php';
    ?>
    <?php
    require 'elements/dbconnect.php';
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $email = $_POST['email'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

        if (!$connection) {
            die("Connection failed : " . mysqli_connect_error());
        }

        $insertRecord = "INSERT INTO `$table_name` (`email`, `password`) VALUES ('$email', '$password');";
        $isRecordInserted = mysqli_query($connection, $insertRecord);
        if ($isRecordInserted) {
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Welcome!</strong> You are registered successfuly.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
        } else {
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Oh Sorry!</strong> There is a problem. '.mysqli_error($connection).'
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
        }
    }
    ?>
    <h3 class="text-center mt-5">Please provide details for signup</h3>
    <div class="container col-md-4 mt-3">
        <form action="/mysecure/signup.php" method="POST">
            <div class="mb-3">
                <label for="uname" class="form-label">Email</label>
                <input required type="email" maxlength="40" class="form-control" id="email" aria-describedby="emailHelp" name="email" onchange="confirmPass()">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input required type="password" maxlength="40" class="form-control" id="password" name="password" onchange="confirmPass()">
            </div>
            <div class="mb-3">
                <label for="cpassword" class="form-label"> Confirm password</label>
                <input required type="password" maxlength="40" class="form-control" id="cpassword" name="cpassword" onchange="confirmPass()">
            </div>
            <button type="submit" class="btn btn-primary" id="submit" disabled>Submit</button>
        </form>
    </div>
    <?php
    require 'elements/footer.php';
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script>
        function confirmPass() {
            if (document.getElementById('password').value ==
                document.getElementById('cpassword').value) {
                document.getElementById('submit').disabled = false;
            } else {
                document.getElementById('submit').disabled = true;
            }
        }
    </script>
</body>

</html>


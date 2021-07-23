<?php
session_start();
if(isset($_SESSION['loggedin'])){
    header("location: home.php");
    exit;
}
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
        $password = $_POST['password'];

        if (!$connection) {
            die("Connection failed : " . mysqli_connect_error());
        }

        $verified = false;
        $fetchRecord = "SELECT email, password FROM $table_name WHERE email = '".$email."'";
        $record = mysqli_query($connection, $fetchRecord);
        if(mysqli_num_rows($record) == 1 ){
            $row = mysqli_fetch_assoc($record);
            if(password_verify($password, $row['password'])){
                $verified = true;
                session_start();
                $_SESSION['loggedin'] = true;
                $_SESSION['email'] = $email;
                header("location: home.php");
                exit;
            }        
        }
        
        if(!$verified){
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Oh Sorry!</strong> Invalid credentials.'.mysqli_error($connection).'
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
        }
    }
    ?>
    <h3 class="text-center mt-5">Login</h3>
    <div class="container col-md-4 mt-3">
        <form action="/mysecure/login.php" method="POST">
            <div class="mb-3">
                <label for="uname" class="form-label">Email</label>
                <input required type="email" maxlength="40" class="form-control" id="email" aria-describedby="emailHelp" name="email">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input required type="password" maxlength="40" class="form-control" id="password" name="password">
            </div>
            <button type="submit" class="btn btn-primary" id="submit">Submit</button>
        </form>
    </div>
    <?php
    require 'elements/footer.php';
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>


<?php
    session_start();
    if(!isset($_SESSION['loggedin'])){
        header("location: login.php");
        exit;
    }
    require 'elements/head.php';
    ?>
<body>
    <?php
    require 'elements/nav.php';
    ?>
    <h1>Welcome <?php echo $_SESSION['email']?> </h1>
    <?php
    require 'elements/footer.php';
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
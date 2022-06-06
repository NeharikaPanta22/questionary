<?php

/*
This file contains database configuration assuming you are running mysql using user "root" and password ""
*/

define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'neharika');

// Try connecting to the Database
$conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

//Check the connection
if ($conn == false) {
    die('Error: Cannot connect');
}


$sql = "INSERT INTO qa (question) VALUES (?)";

        if ($stmt = mysqli_prepare($conn, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $question);

            // Set parameters
            $question= trim($_POST['question']);


            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                header("location:index.php");
            } else {
                echo "ERROR: Could not execute query: $sql. " . mysqli_error($conn);
            }
        } else {
            echo "ERROR: Could not prepare query: $sql. " . mysqli_error($conn);
        }

// Close statement
        mysqli_stmt_close($stmt);

// Close connection
        mysqli_close($conn);

?>




<html>
<head>
    <title>
        Questionary
    </title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script>

    .input {
        color: #8707ff;
        border: 2px solid #8707ff;
        border-radius: 10px;
        padding: 10px 25px;
        background: transparent;
        max-width: 190px;
    }

    .input:active {
        box-shadow: 2px 2px 15px #8707ff inset;
    }

</script>
</head>
<body>
<header>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"><span style="color: #fd4c66;"><u>Questionary</u> </span></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav me-auto mb-2 mb-md-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="question.php">Add Question</a>
                    </li>    <li class="nav-item">
                        <a class="nav-link" href="about.php">About Us</a>
                    </li>



                    <!--                    <p><a class="btn btn-lg btn-primary" href="register.php">Sign up</a></p>-->
                    <!--                    <p><a class="btn btn-lg btn-primary" href="login.php">login</a></p>-->
                    <p><a class="btn btn-lg btn-primary" href="signout.php">Sigh Out</a></p>

            </div>
        </div>
    </nav>
</header>
<br><br><br><br>
<h1> Add Question </h1>
<div class="container mt-3">

    <div class="row">
        <form action="question.php" method="post" >

            <input type="text" id="question" placeholder="Enter a question" name="question" class="form-control"><br>
             </div>
    <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
</body>
</html>


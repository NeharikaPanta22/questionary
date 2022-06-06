<?php
//

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


//getting id from url
$id = $_GET['id'];

//selecting data associated with this particular id
$sql = "SELECT * FROM qa WHERE id=$id";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);




if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $sql = "UPDATE persons SET question=?, answer=?,   WHERE id=?";
    if ($stmt = mysqli_prepare($conn, $sql)) {
        mysqli_stmt_bind_param($stmt, "ssi", $question,$answer, $id_param);
        $id_param= $id;
        $question = $_POST["question"];
        $answer = $_POST["answer"];


        if (mysqli_stmt_execute($stmt)) {
            // Records updated successfully. Redirect to landing page
            header("location: index.php");
            exit();
        } else {
            echo "Oops! Something went wrong. Please try again later.";
        }
    }
}
?>

<html>
<head>
    <title>Answer </title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</head>
<body>
<header>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"><span style="color: #fd4c66;"><B>Questionary</B></span></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav me-auto mb-2 mb-md-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="question.php">Question</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="about.php">About Us</a>
                    </li>
                </ul>


<!--                <p><a class="btn btn-lg btn-primary" href="sign_in.php">Sign up</a></p>-->
<!--                <p><a class="btn btn-lg btn-primary" href="login1.php">login</a></p>-->
<!--                <p><a class="btn btn-lg btn-primary" href="sign%20out.php">Sign Out</a></p>-->
            </div>
        </div>
    </nav>
</header>
<br><br><br><br><br><br>
<h1><u><b>Answer Page</b></u></h1>
<form method="post" action="update_details.php">
    <input type="text" name="question" value="<?php echo $row["question"] ?>"><br>
    <input type="text" name="answer" value="<?php echo $row["answer"] ?>"><br>

    <input type="submit" value="Update" placeholder="submit">
</form>
</body>
</html>
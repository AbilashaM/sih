<?php
include 'dbconn.php';
session_start();

$regno = "";
$username = "";
$usertype = "";
$pass = "";
$email="";

$errorMessage = "";
$successMessage = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Use the correct variable names in the POST data
    $regno = $_POST["regno"];
    $username = $_POST["username"];
    $usertype = $_POST["usertype"];
    $pass = $_POST["pass"];
    $email = $_POST["email"];

    do {
        if (empty($regno) || empty($username) || empty($usertype) || empty($pass) || empty($email)) {
            $errorMessage = "All the fields are required";
            break;
        }

        // Add new client to the database (use prepared statements to prevent SQL injection)
        $stmt = $con->prepare("INSERT INTO user (regno, username, password, usertype,email) VALUES (?, ?, ?, ?,?)");
        $stmt->bind_param("sssss", $regno, $username, $pass, $usertype, $email);

        if ($stmt->execute()) {
            $successMessage = "Client added successfully";
            // Redirect to another page after successful insert
            header("Location: page2.php");
            exit();
        } else {
            $errorMessage = "Error: " . $stmt->error;
        }

    } while (false);
}
?>




<html>
    <head>
        <title>SIH</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <div class="container my-5">
            <div class="head">
                <h2>New User</h2>
            </div>

            <?php
            if (!empty($errorMessage) ) {
                echo"
                <div class='alert alert-warning alert-dismissible fade show' role='alert'>
                    <strong>$errorMessage</strong>
                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                </div>
                ";
            }
            ?>


            <form method="post">
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">registration id</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="regno" value="<?php echo $regno;?>">
                    </div>
                </div>    
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">name</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="username" value="<?php echo $username;?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">Password</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="pass" value="<?php echo $pass;?>">
                    </div>
                </div> 

                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">usertype</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="usertype" value="<?php echo $usertype;?>">
                    </div>
                </div> 
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">Email</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="email" value="<?php echo $email;?>">
                    </div>
                </div>

                <?php
                if (!empty($successMessage) ){
                    echo"
                    <div class='row mb-3'>
                        <div class='offset-sm-3 col-sm-3 d-grid'>
                            <div class='alert alert-success alert-dismissible fade show' role='alert'>
                            <strong>$successMessage</strong>
                            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                            </div>
                        </div>
                    </div>
                    ";
                }
                ?>

                <div class="row mb-3">
                    <div class="offset-sm-3 col-sm-3 d-grid">
                        <button type="submit" class="btn btn-primary" style="background-color: #176f9b;">Submit</button>
                    </div>
                    <!-- <div class="col-sm-3 d-grid">
                        <a class="btn btn-outline-primary" href="/myshop/index.php" role="button" style="background-color: #ff2b2b;;
    color: white;">Cancel</a>
                    </div> -->
                </div> 
            </form>
        </div>
    </body>
</html>

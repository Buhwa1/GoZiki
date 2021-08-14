<?php
include 'header.php';
?>
        <!-- CONTENT BEGINS -->


        <div class="container mt-4">
            <h3 align="center" class="mt-4">Login Form</h3>
            <h5 align="center" class="mt-4">Please enter your login details to begin placing orders.</h5>

<?php


$connection = mysqli_connect("localhost","root","","amari");

if ($connection->connect_error) {
    die("Connection failed:" . $connection->connect_error);
}
if (isset($_POST["Login"])) {
    $email = $_POST["email"];
    $pass = $_POST["password"];
    $stmt = $connection->prepare("SELECT id,firstname,lastname,email,password FROM users WHERE email=?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($id, $fn, $ln, $em, $pw);

    if ($stmt->num_rows > 0) {
        $row = $stmt->fetch();
        if (password_verify($pass, $pw)) {
            session_start();
            $_SESSION["login"] = $l;
            $_SESSION["firstname"] = $fn;
            $_SESSION["id"] = $id;
            $_SESSION["email"] = $em;
            header("Location: index.php");
        } else {
            echo "<div class='alert alert-danger' role='alert'>
                	<strong>Wrong email or password.</strong>
             	 </div>";
        }
    }
}
?>
            <form class="mt-4" autocomplete="off" action="login.php" method="post">
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text">EMAIL</div>
                            </div>
                            <input autocomplete="off" name="email" type="text" class="form-control form-control-lg" id="inlineFormInputGroup" placeholder="Enter Email">
                        </div>
                    </div>
                    <div class="form-group col-md-12">
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text">PASSWORD<i class="ml-1 fa fa-lock"></i></div>
                            </div>
                            <input autocomplete="new-password" name="password" type="password" class="form-control form-control-lg" id="inlineFormInputGroup" placeholder="Enter Password">
                        </div>
                    </div>


                </div>
                <button type="submit" name="Login" class="btn btn-primary" style="font-size:20px;">Login</button>
                <h5 class="mt-2">Not registered? <a href="register.php">Register</a></h5>
            </form>
        </div>


        <!-- CONTENT ENDS -->



        <!-- FOOTER BEGINS -->
<?php 
include 'footer.php';
?>
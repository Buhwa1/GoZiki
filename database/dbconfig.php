
<?php

$server_name = "localhost";
$db_username ="root";
$db_password = "";
$db_name = "GoZiki";

$connection = mysqli_connect($server_name,$db_username,$db_password);
$dbconfig = mysqli_select_db($connection,$db_name);

if($dbconfig)
{
    // echo "database connected";
}else
{
    echo '
            <div class="container">
                <div class="row">
                    <div class="col-md-6 mr-auto ml-auto text-center py-5 mt-5">
                        <div class="card">
                            <div class="card-body">
                                <h1 class="card-title bg-danger text-white">
                                    Database connection failed
                                </h1>
                                <h2 class="card-title">Database failure</h2>
                                <p class="card-text">Please check your database connection</p>
                                <a href="index.php" class="btn btn-primary"> Go back to home page </a>
                            </div>
                        </div>
                    </div>
                        
                </div>
            </div>
    ';
}


?>
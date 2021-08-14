<?php
  require("database/dbconfig.php");
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="index.css">
  <link href="css/all.css" rel="stylesheet">
  <script src="js/jquery-3.6.0.min.js"></script>

  <script>
$(document).ready(function(){
    $('.search-box input[type="text"]').on("keyup input", function(){
        /* Get input value on change */
        var inputVal = $(this).val();
        var resultDropdown = $(this).siblings(".result");
        if(inputVal.length){
            $.get("backend-search.php", {term: inputVal}).done(function(data){
                // Display the returned data in browser
                resultDropdown.html(data);
            });
        } else{
            resultDropdown.empty();
        }
    });
    
    // Set search input value on click of result item
    $(document).on("click", ".result p", function(){
        $(this).parents(".search-box").find('input[type="text"]').val($(this).text());
        $(this).parent(".result").empty();
    });
});
</script>
</head>
<body class="min-vh-100">
<nav class="navbar navbar-expand-sm justify-content-center navbar-expand-lg" style="background-color: #1DA1F2;">
  <!-- <h2 align="center">jnf</h2> -->
  <h3 align="center" class="text-center" ><a class="navbar-brand text-center" href="index.php" style="align-content: center; color: white;font-family: cursive;font-size: 25px;">GoZiki <i class="fa fa-play"></i></a></h3>
</nav>

<div class="container" id="search">
<div class="row">
      <div class="col-md-12 mt-4">
          <div class="search-box">
          <div class="input-group">
            <input type="text" class="form-control w-75" style="height:45px;" autocomplete="off" placeholder="Search music" />
            <!-- <div class="input-group-append">
             <input type="submit" style="width:80px;" class="btn btn-success" value="Search">
          </div> -->
          <div class="result mt-1" style="width:660px;"></div>

        </div>
        </div>
      </div>
      </div>

</div>

